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
            'ten' => 'required|string',
            'ma_sinh_vien' => 'required|numeric',
            'gioi_tinh' => 'required',
            'ngay_sinh' => 'required|date',
            'noi_sinh' => 'required|string',
            'cmnd' => 'required|numeric|unique:donxinnoitru, cmnd',
            'sdt' => 'required|numeric|unique:donxinnoitru, sdt',
            'email' => 'required|unique:donxinnoitru,email',
            'chu_thich' => 'nullable',
            'ma_loai_phong' => 'required|numeric'
        ];
    }
}
