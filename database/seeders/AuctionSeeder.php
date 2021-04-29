<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AuctionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (env('APP_ENV') != 'dev') return;

        \App\Models\Auction::factory()->has(\App\Models\AuctionsImage::factory()->count(10))->count(100)->create();



    }
}
