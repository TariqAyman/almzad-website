<?php

namespace Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Store;

class StoreFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var  string
    */
    protected $model = Store::class;

    /**
    * Define the model's default state.
    *
    * @return  array
    */
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::inRandomOrder()->first()->id,
            'name_ar' => $this->faker->word,
            'name_en' => $this->faker->word,
            'description_ar' => $this->faker->word,
            'description_en' => $this->faker->word,
            'slug_ar' => $this->faker->word,
            'slug_en' => $this->faker->word,
            'phone_number' => $this->faker->phoneNumber,
        ];
    }
}
