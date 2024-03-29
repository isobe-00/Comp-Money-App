<?php

namespace Database\Seeders;

use App\Models\Area;
use App\Models\Route;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            // TestSeeder::class,
            // UserSeeder::class,
            // AreaSeeder::class,
            // ShopSeeder::class,
            // RouteSeeder::class,
            // RouteShopSeeder::class,
            ContactFormSeeder::class,   
            TransactionSeeder::class

        ]);

    \App\Models\ContactForm::factory(100)->create();
    }
}