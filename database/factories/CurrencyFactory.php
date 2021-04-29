<?php

namespace Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Currency;

class CurrencyFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var  string
    */
    protected $model = Currency::class;

    /**
    * Define the model's default state.
    *
    * @return  array
    */
    public function definition(): array
    {
        return [
            'name_ar' => $this->faker->currencyCode,
            'name_en' => $this->faker->currencyCode,
            'symbol_ar' => $this->faker->currencyCode,
            'symbol_en' => $this->faker->currencyCode,
            'status' => $this->faker->boolean

        ];
    }
}
