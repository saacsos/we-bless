<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApartmentRequest extends FormRequest
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
            'name' => ['required', 'min:5', 'max:255'],
            'num_floor' => ['required', 'integer', 'min:1'],
            'num_room' => ['required', 'integer', 'min:1']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'ต้องการชื่อของอพาร์ตเมนต์',
            'num_floor.required' => 'กรุณาระบุจำนวนชั้น',
            'name.min' => 'ต้องการชื่ออย่างน้อย :min ตัวอักษร'
        ];
    }
}
