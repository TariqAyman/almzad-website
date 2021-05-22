<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'name' => 'nullable',
            'email' => 'nullable|email|unique:users,email,' . (!empty($this->user) ? $this->user->id : auth()->user()->id).',id,deleted_at,NULL',
            'phone_number' => 'nullable|unique:users,phone_number,' . (!empty($this->user) ? $this->user->id : auth()->user()->id).',id,deleted_at,NULL',
            'username' => 'nullable|unique:users,username,' . (!empty($this->user) ? $this->user->id : auth()->user()->id).',id,deleted_at,NULL',
            'password' => 'nullable|confirmed|min:6'
        ];
    }
}
