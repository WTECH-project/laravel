<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Size;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($size = 36.0; $size <= 48.0; $size += 0.5) {
            Size::create(['size' => $size]);
        }
    }
}
