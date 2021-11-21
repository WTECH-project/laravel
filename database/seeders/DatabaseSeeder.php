<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\BrandSeeder;
use Database\Seeders\ColorSeeder;
use Database\Seeders\SizeSeeder;
use Database\Seeders\SexCategorySeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\PaymentSeeder;

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
            BrandSeeder::class,
            ColorSeeder::class,
            SizeSeeder::class,
            SexCategorySeeder::class,
            CategorySeeder::class,
            PaymentSeeder::class
        ]);
    }
}
