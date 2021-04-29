<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var  string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return  array
     */
    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'username' => $this->faker->userName,
            'email' => $this->faker->safeEmail,
            'phone_number' => $this->faker->phoneNumber,
            'profile_photo' => 'frontend/img/clint-pic.png',
            'email_verified_at' => $this->faker->dateTime(),
            'password' => bcrypt($this->faker->password),
            'status' => $this->faker->boolean,
            'remember_token' => Str::random(10),
        ];
    }
}
