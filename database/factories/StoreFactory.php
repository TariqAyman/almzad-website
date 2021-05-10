<?php

namespace Database\Factories;

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
        $random = rand(1, 4);

        return [
            'user_id' => \App\Models\User::inRandomOrder()->first()->id,
            'name_ar' => $this->faker->word,
            'name_en' => $this->faker->word,
            'description_ar' => $this->faker->text,
            'description_en' => $this->faker->text,
            'slug_ar' => $this->faker->slug,
            'slug_en' => $this->faker->slug,
            'phone_number' => $this->faker->phoneNumber,
            'email' => $this->faker->safeEmail,
            'identity' => $this->faker->iban('eg'),
            'image' => "frontend/img/new-mzad-0{$random}.png",
        ];
    }
}
