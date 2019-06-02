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
            'chu_thich' => 'nullable',
            'ma_phong' => 'required|numeric',
            'ma_dich_vu' => 'required|numeric',
        ];
    }
}
