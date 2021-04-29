<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\AuctionsUser;

class AuctionsUserFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var  string
    */
    protected $model = AuctionsUser::class;

    /**
    * Define the model's default state.
    *
    * @return  array
    */
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::inRandomOrder()->first()->id,
            'auction_id' => \App\Models\Auction::inRandomOrder()->first()->id,
            'price' => $this->faker->randomFloat(),
        ];
    }
}
