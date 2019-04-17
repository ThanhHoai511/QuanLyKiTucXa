<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SuaKhuNhaRequest extends FormRequest
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
            'ten' => 'required|string|unique:khunha,ten,' . $this->segment(4),
            'mo_ta' => 'nullable',
            'doi_tuong' => 'required'
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
            'ten.required' => 'Bạn phải nhập tên khu nhà!',
            'ten.string'  => 'Tên phải là chuỗi!',
            'ten.unique' => 'Tên đã tồn tại!',
            'doi_tuong.required' => 'Bạn phải chọn đối tượng!'
        ];
    }
}
