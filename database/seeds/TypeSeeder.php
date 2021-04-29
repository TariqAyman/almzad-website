<?php
namespace Database\seeds;

use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (env('APP_ENV') != 'dev') return;

        \App\Models\Type::factory()->count(5)->create();
    }
}
