<?php

namespace Database\Seeders;

use App\Models\Auction;
use App\Models\AuctionsImage;
use App\Models\AuctionsUser;
use App\Models\Comment;
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

        Auction::factory()
            ->has(AuctionsImage::factory()->count(10))
            ->has(AuctionsUser::factory()->count(10))
            ->has(Comment::factory()->count(100))
            ->count(100)
            ->create();

    }
}
