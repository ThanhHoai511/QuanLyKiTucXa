<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TinTucRequest extends FormRequest
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
            'tieu_de' => 'required|string',
            'noi_dung' => 'required|string',
            'loai' => 'required|numeric',
            'trang_thai' => 'required|numeric',
            'noi_bat' => 'required|numeric',
        ];
    }
}
