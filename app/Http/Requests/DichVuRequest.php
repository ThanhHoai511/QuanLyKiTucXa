<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DichVuRequest extends FormRequest
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
            'gia' => 'required|numeric',
            'mo_ta' => 'nullable'
        ];
    }

    public function messages()
    {
        return [
            'ten.required' => 'Bạn phải nhập tên dịch vụ',
            'gia.required' => 'Bạn phải nhập giá dịch vụ',
            'gia.numeric' => 'Bạn chỉ được nhập số vào giá'
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'gia' => str_replace(',', '', $this->get('gia')),
        ]);
    }
}
