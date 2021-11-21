<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SexCategory;

class SexCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SexCategory::create(['name' => 'male']);
        SexCategory::create(['name' => 'female']);
    }
}
