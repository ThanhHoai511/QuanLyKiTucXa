<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HoaDonDichVuRequest extends FormRequest
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
            'ngay_bat_dau' => 'required|date',
            'ngay_ket_thuc' => 'required|date',
            'trang_thai' => 'required|numeric',
            'gia' => 'required|numeric',
            'so_tieu_thu_cho_phep' => 'required|numeric',
            'chu_thich' => 'nullable',
            'ma_phong' => 'required|numeric',
            'chi_so_dau' => 'required|numeric',
            'chi_so_cuoi' => 'required|numeric',
            'ma_dich_vu' => 'required|numeric',
            'nhan_vien_tao' => 'required|numeric',
            'tong_tien' => 'required|numeric'
        ];
    }
}
