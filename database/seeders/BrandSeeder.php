<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Brand::create(['name' => 'Adidas']);
        \App\Models\Brand::create(['name' => 'Jordan']);
        \App\Models\Brand::create(['name' => 'Nike']);
    }
}
