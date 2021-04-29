<?php
namespace Database\seeds;

use Illuminate\Database\Seeder;

class ContactUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (env('APP_ENV') != 'dev') return;

        \App\Models\ContactUs::factory()->count(5)->create();
    }
}
