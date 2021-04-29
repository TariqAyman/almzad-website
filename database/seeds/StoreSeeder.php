<?php
namespace Database\seeds;

use Illuminate\Database\Seeder;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (env('APP_ENV') != 'dev') return;

        \App\Models\Store::factory()->count(5)->create();
    }
}
