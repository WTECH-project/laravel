<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Size;

class ProductSizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $size_groups = array(
            array(
                "42",
                "43",
                "44",
                "45",
                "46",
            ),
            array(
                "40,5",
                "41",
                "42",
                "42,5",
                "43",
                "44",
                "44,5",
                "45",
                "46"
            ),
            array(
                "44",
                "45",
                "46",
            )
        );

        $products = Product::get();

        foreach($products as $product) {
            $size_set = $size_groups[rand(0, count($size_groups) - 1)];

            foreach ($size_set as $size) {
                $size_object = Size::where('size', $size)->first();
                $product->sizes()->attach($size_object);
            }
        }
    }
}
