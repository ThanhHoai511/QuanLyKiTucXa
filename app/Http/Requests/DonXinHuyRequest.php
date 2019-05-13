<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DonXinHuyRequest extends FormRequest
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
            'ma_sv_utc' => 'required|numeric',
            'ma_phong' => 'required|numeric',
            'trang_thai' => 'required|numeric'
        ];
    }
}
