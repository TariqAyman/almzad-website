<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Wallet;

class WalletFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var  string
    */
    protected $model = Wallet::class;

    /**
    * Define the model's default state.
    *
    * @return  array
    */
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'auction_id' => \App\Models\Auction::factory(),
//            'currency_id' => \App\Models\Currency::factory(),
            'in' => $this->faker->randomNumber(),
            'out' => $this->faker->randomNumber(),
            'hold' => $this->faker->randomNumber(),
            'balance' =>$this->faker->randomNumber(),
        ];
    }
}
