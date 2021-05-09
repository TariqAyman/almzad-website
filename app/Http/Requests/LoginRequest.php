<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
//            'phone_number' => 'required|string|regex:/^[+](966)(\d{9})$/',
            'phone_number' => 'required|string|regex:/^(\d{9})$/',
            'password' => 'required|min:6'
        ];
    }
}
