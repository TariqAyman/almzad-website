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

class UserStoreRequest extends FormRequest
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
            'username' => 'required|string|unique:admins,username,NULL,id,deleted_at,NULL',
            'address' =>  'required|string',
            'email' => 'required|string|email|unique:admins,email,NULL,id,deleted_at,NULL',
            'phone_number' => 'required|string|unique:admins,phone_number,NULL,id,deleted_at,NULL',
            'profile_photo' => 'required|image',
            'password' => 'required|string',
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
