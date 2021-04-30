<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Auction;

class AuctionFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var  string
    */
    protected $model = Auction::class;

    /**
    * Define the model's default state.
    *
    * @return  array
    */
    public function definition(): array
    {
        return [
            'currency_id' => \App\Models\Currency::inRandomOrder()->first()->id,
            'type_id' => \App\Models\Type::inRandomOrder()->first()->id,
            'category_id' => \App\Models\Category::inRandomOrder()->first()->id,
            'user_id' => \App\Models\User::inRandomOrder()->first()->id,
            'name_ar' => $this->faker->word,
            'name_en' => $this->faker->word,
            'description_ar' => $this->faker->text,
            'description_en' => $this->faker->text,
            'conditions_ar' => $this->faker->text,
            'conditions_en' => $this->faker->text,
            'slug_ar' => $this->faker->word,
            'slug_en' => $this->faker->word,
            'status' => $this->faker->boolean,
            'start_from' => $this->faker->randomFloat(2,100,100000),
            'price' => $this->faker->randomFloat(2,100,100000),
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now()->subMonths(rand(1,3))->addMonths(rand(1,3)),
            'shipping' => $this->faker->boolean,
            'shippingFree' => $this->faker->boolean,
            'multi_auction' => $this->faker->boolean,
        ];
    }
}
