<?php

/**
* Created by GenCode.
*/

namespace App\Http\Requests\User;

use Illuminate\Contracts\Container\Container;
use Illuminate\Contracts\Validation\Factory as ValidationFactory;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Routing\Redirector;

class UserUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return  array
     */
    public function rules()
    {
        return [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'username' => 'required|string|unique:users,phone_number,'. $this->user->id .',id,deleted_at,NULL',
            'address' =>  'nullable|string',
            'email' => 'required|string|email|unique:users,phone_number,'. $this->user->id .',id,deleted_at,NULL',
            'phone_number' => 'required|string|unique:users,phone_number,'. $this->user->id .',id,deleted_at,NULL',
            'profile_photo' => 'nullable|image',
            'password' => 'nullable|min:8|confirmed',
            'status' => 'required|boolean',
        ];
    }

    public function messages()
    {
        return parent::messages(); // TODO: Change the autogenerated stub
    }

    public function attributes()
    {
        return parent::attributes(); // TODO: Change the autogenerated stub
    }
}
