<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($index = 0; $index < 100; $index ++) {
            Product::create([
                'name' => 'Topanka ' . $index,
                'description' => 'Popis topanky',
                'price' => rand(99, 120),
                'brand_id' => rand(1, 3),
                'color_id' => rand(1, 3),
                'sex_category_id' => rand(1, 2),
                'category_id' => rand(1, 3)
            ]);
        }
    }
}
