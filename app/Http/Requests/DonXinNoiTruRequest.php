<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DonXinNoiTruRequest extends FormRequest
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
            'ma_sinh_vien' => 'required|numeric|exists:sinhvienutc,ma_sinh_vien',
            'chu_thich' => 'nullable',
            'ma_loai_phong' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'ma_sinh_vien.required' => 'Bạn phải nhập mã sinh viên!',
            'ma_sinh_vien.numeric' => 'Mã sinh viên phải là số!',
            'ma_sinh_vien.exists' => 'Mã sinh viên của bạn không đúng! Vui lòng nhập lại!',
            'ma_loai_phong.required' => 'Bạn phải chọn loại phòng'
        ];
    }
}
