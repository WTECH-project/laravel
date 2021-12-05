<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
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
        $dir = storage_path('app/' . config('app.images_path'));

        if(!is_dir($dir)) {
            return;
        }

        $image_groups = scandir($dir);
        unset($image_groups[0]);
        unset($image_groups[1]);

        $products = Product::get();

        print_r($image_groups);

        foreach($products as $product) {
            $image_set = array();
            array_push($image_set, $image_groups[rand(2, count($image_groups) - 1)], $image_groups[rand(2, count($image_groups) - 1)]);

            foreach ($image_set as $image) {
                $path_parts = pathinfo($image);

                $fileName = $product->id . '-' . md5($path_parts['basename']) . time() . '.' . $path_parts['extension'];

                if(file_exists($dir . $fileName)) {
                    $fileName = $product->id . '-' . md5($path_parts['basename']) . time() . Str::random(10) . '.' . $path_parts['extension'];
                }

                $copiedFile = copy($dir . $image, $dir . $fileName);

                if($copiedFile) {
                    $product->images()->create([
                        'image_path' => $fileName
                    ]);
                }
            }
        }
    }
}
