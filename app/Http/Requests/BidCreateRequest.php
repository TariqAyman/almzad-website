<?php

namespace App\Http\Requests;

use App\Models\Auction;
use Illuminate\Foundation\Http\FormRequest;

class BidCreateRequest extends FormRequest
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
        $auction = Auction::find($this->auction_id);

        $highest_price = $auction->highest_price;

        $min = intval($highest_price) + 1;

        return [
            'auction_id' => 'required',
            'price' => 'required|numeric|integer|min:' . $min,
        ];
    }
}
