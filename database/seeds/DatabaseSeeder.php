<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RolePermissionSeeder::class,
            SettingsSeeder::class,
            TypeSeeder::class,
            CurrencySeeder::class,
            CategorySeeder::class,
            UserSeeder::class,
            AuctionSeeder::class,
            ReviewSeeder::class,
        ]);
    }
}
