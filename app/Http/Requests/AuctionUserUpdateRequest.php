<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuctionUserUpdateRequest extends FormRequest
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
            'currency_id' => 'required|numeric|integer',
            'type_id' => 'required|numeric|integer',
            'category_id' => 'required|numeric|integer',
            'name_ar' => 'required|string',
            'name_en' => 'required|string',
            'description_ar' => 'required|string',
            'description_en' => 'required|string',
            'conditions_ar' => 'required|string',
            'conditions_en' => 'required|string',
            'shipping_conditions_ar' => 'required|string',
            'shipping_conditions_en' => 'required|string',
            'start_from' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'shipping' => 'required|boolean',
            'shipping_free' => 'required|boolean',
            'multi_auction' => 'required|boolean',
            'images' => 'nullable|array|image'
        ];
    }
}
