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
        $image_groups = array(
            array(
                "https://sizeer.sk/media/cache/gallery/rc/uweoirkv/adidas-superstar-panske-tenisky-biela-h05250.jpg",
                "https://sizeer.sk/media/cache/gallery/rc/ropik2ez/adidas-superstar-panske-tenisky-biela-h05250_2.jpg",
                "https://sizeer.sk/media/cache/gallery/rc/pwwlnkrn/adidas-superstar-panske-tenisky-biela-h05250_3.jpg",
                "https://sizeer.sk/media/cache/gallery/rc/euytnazo/adidas-superstar-panske-tenisky-biela-h05250_4.jpg",
                "https://sizeer.sk/media/cache/gallery/rc/qak1gw8n/adidas-superstar-panske-tenisky-biela-h05250_5.jpg"
            ),
            array(
                "https://sizeer.sk/media/cache/gallery/rc/dihfoecl/puma-rs-z-lth-panske-tenisky-cierna-38323201.jpg",
                "https://sizeer.sk/media/cache/gallery/rc/f9yakwgg/puma-rs-z-lth-panske-tenisky-cierna-38323201_2.jpg",
                "https://sizeer.sk/media/cache/gallery/rc/sglf9efz/puma-rs-z-lth-panske-tenisky-cierna-38323201_3.jpg",
                "https://sizeer.sk/media/cache/gallery/rc/bt1delms/puma-rs-z-lth-panske-tenisky-cierna-38323201_4.jpg"
            ),
            array(
                "https://sizeer.sk/media/cache/gallery/rc/0zzbxx11/adidas-niteball-panske-tenisky-cierna-h67360.jpg",
                "https://sizeer.sk/media/cache/gallery/rc/j4qdhltn/adidas-niteball-panske-tenisky-cierna-h67360_2.jpg",
                "https://sizeer.sk/media/cache/gallery/rc/kde8as05/adidas-niteball-panske-tenisky-cierna-h67360_3.jpg",
                "https://sizeer.sk/media/cache/gallery/rc/1lc8tpbc/adidas-niteball-panske-tenisky-cierna-h67360_4.jpg",
                "https://sizeer.sk/media/cache/gallery/rc/p4yirwga/adidas-niteball-panske-tenisky-cierna-h67360_5.jpg"
            )
            );

        for($id = 1; $id <= 100; $id ++) {
            $product = Product::find($id);

            $image_set = $image_groups[rand(0, count($image_groups) - 1)];

            foreach($image_set as $image) {
                $product->images()->create([
                    'image_path' => $image
                ]);
            }
        }
    }
}
