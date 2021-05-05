<?php

namespace Database\Factories;

use App\Models\Slider;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

class SliderFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var  string
    */
    protected $model = Slider::class;

    /**
    * Define the model's default state.
    *
    * @return  array
    */
    public function definition(): array
    {
        return [
            'name_ar' => $this->faker->word,
            'name_en' => $this->faker->word,
            'title_ar' => $this->faker->word,
            'title_en' => $this->faker->word,
            'sub_title_ar' => $this->faker->word,
            'sub_title_en' => $this->faker->word,
            'description_ar' => $this->faker->word,
            'description_en' => $this->faker->word,
            'status' => $this->faker->boolean,
        ];
    }
}
