<?php

namespace Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Admin;

class AdminFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var  string
     */
    protected $model = Admin::class;

    /**
     * Define the model's default state.
     *
     * @return  array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->safeEmail,
            'phone_number' => $this->faker->phoneNumber,
            'profile_photo' => 'frontend/img/clint-pic.png',
            'email_verified_at' => $this->faker->dateTime(),
            'password' => bcrypt('123456789'),
            'status' => $this->faker->boolean,
            'remember_token' => Str::random(10),
        ];
    }
}
