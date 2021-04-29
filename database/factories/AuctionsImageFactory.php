<?php

namespace Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\AuctionsImage;

class AuctionsImageFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var  string
    */
    protected $model = AuctionsImage::class;

    /**
    * Define the model's default state.
    *
    * @return  array
    */
    public function definition(): array
    {
        $random = rand(1,4);

        return [
            'auction_id' => \App\Models\Auction::factory(),
            'image' => "frontend/img/new-mzad-0{$random}.png",
        ];
    }
}
