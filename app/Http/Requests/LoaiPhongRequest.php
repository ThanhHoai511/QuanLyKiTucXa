<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoaiPhongRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'ten' => 'required|string|unique:loaiphong,ten',
            'gia_phong' => 'required|numeric',
            'tien_cuoc_tai_san' => 'required|numeric',
            'so_luong_sv_toi_da' => 'required|numeric',
            'dien_tich' => 'required|string'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'ten.required' => 'Bạn phải nhập tên loại phòng!',
            'ten.string'  => 'Tên phải là chuỗi!',
            'ten.unique' => 'Tên đã tồn tại!',
            'gia_phong.required' => 'Bạn phải nhập giá phòng!',
            'gia_phong.numeric' => 'Giá phòng phải là số!',
            'tien_cuoc_tai_san.required' => 'Bạn phải nhập tiền cược tài sản!',
            'tien_cuoc_tai_san.numeric' => 'Tiền cược tài sản phải là số!',
            'so_luong_sv_toi_da.required' => 'Bạn phải nhập số lượng sinh viên tối đa!',
            'so_luong_sv_toi_da.numeric' => 'Số lượng sinh viên phải là số!',
            'dien_tich.required' => 'Bạn phải nhập diện tích!'
        ];
    }
}
