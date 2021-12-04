<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Image;
use App\Models\Product;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dir = storage_path(config('app.images_path'));

        if(!is_dir($dir)) {
            return;
        }

        $image_groups = scandir($dir);
        unset($image_groups[0]);
        unset($image_groups[1]);

        $products = Product::get();

        foreach($products as $product) {
            $image_set = array();
            array_push($image_set, $image_groups[rand(2, count($image_groups) - 1)], $image_groups[rand(2, count($image_groups) - 1)]);

            foreach ($image_set as $image) {
                $product->images()->create([
                    'image_path' => $image
                ]);
            }
        }
    }
}
