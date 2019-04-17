<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PhongRequest extends FormRequest
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
            'ten' => [
                'required', 'string',
                Rule::unique('phong', 'ten')->where('ma_khu', $this->get('ma_khu'))
            ],
            'ma_khu' => 'required',
            'ma_loai_phong' => 'required',
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
            'ten.unique' => "Khu nhà " . $this->get('ma_khu') . " đã có phòng " . $this->get('ten'),
            'ma_khu.required' => 'Bạn phải chọn khu nhà',
            'ma_loai_phong.required' => 'Bạn phải chọn loại phòng'
        ];
    }
}
