<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ContactU;

class ContactUFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var  string
    */
    protected $model = ContactU::class;

    /**
    * Define the model's default state.
    *
    * @return  array
    */
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::inRandomOrder()->first()->id,
            'subject' => $this->faker->text,
            'email' => $this->faker->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'message' => $this->faker->text,
            'name' => $this->faker->name,
        ];
    }
}
