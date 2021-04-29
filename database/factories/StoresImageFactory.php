<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\StoresImage;

class StoresImageFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var  string
    */
    protected $model = StoresImage::class;

    /**
    * Define the model's default state.
    *
    * @return  array
    */
    public function definition(): array
    {
        return [
            'store_id' => \App\Models\Store::inRandomOrder()->first()->id,
            'image' => 'frontend/img/clint-pic.png',
        ];
    }
}
