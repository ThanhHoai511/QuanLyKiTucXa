<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CoSoVatChatRequest extends FormRequest
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
            'tien_cong' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'ten.required' => 'Bạn phải nhập tên cơ sở vật chất!',
            'gia.required' => 'Bạn phải nhập giá cơ sở vật chất!',
            'gia.numeric' => 'Bạn chỉ được nhập số vào giá!',
            'tien_cong.required' => 'Bạn phải nhập tiền công sửa chữa cơ sở vật chất!',
            'tien_cong.numeric' => 'Bạn chỉ được nhập số vào tiền công!'
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'gia' => str_replace(',', '', $this->get('gia')),
            'tien_cong' => str_replace(',', '', $this->get('tien_cong'))
        ]);
    }

}
