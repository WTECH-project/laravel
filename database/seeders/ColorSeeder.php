<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Color;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Color::create(['color' => 'Biela']);
        Color::create(['color' => 'Cierna']);
        Color::create(['color' => 'Hneda']);
    }
}
