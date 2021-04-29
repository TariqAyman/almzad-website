<?php

/**
* Created by GenCode.
*/

namespace App\Http\Requests\AuctionsUser;

use Illuminate\Contracts\Container\Container;
use Illuminate\Contracts\Validation\Factory as ValidationFactory;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Routing\Redirector;

class AuctionsUserUpdateRequest extends FormRequest
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
            'user_id' => 'required|numeric|integer',
            'auction_id' => 'required|numeric|integer',
            'price' => 'required|boolean',
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
