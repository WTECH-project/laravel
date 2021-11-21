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
        for($index = 0; $index < 25; $index ++) {
            Product::create([
                'name' => 'Pojebana topanka ' . $index,
                'description' => 'Skurviacka spicena topanka, kde budes mat nohy',
                'price' => 99.99,
                'brand_id' => rand(1, 3),
                'color_id' => rand(1, 3),
                'sex_category_id' => rand(1, 2),
                'category_id' => rand(1, 3)
            ]);
        }
    }
}
