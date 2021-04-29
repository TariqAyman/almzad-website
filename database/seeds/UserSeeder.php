<?php

use App\Models\User;
use Database\Factories\ReviewFactory;
use Database\Factories\StoreFactory;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (env('APP_ENV') != 'dev') return;

        User::factory()
            ->has(\App\Models\Store::factory()->count(1))
            ->count(10)
            ->create();
    }
}
