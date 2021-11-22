<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Delivery;

class DeliverySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Delivery::create([
            'name' => 'GLS',
            'price' => 3.20
        ]);

        Delivery::create([
            'name' => 'DPD',
            'price' => 4
        ]);

        Delivery::create([
            'name' => 'Personal collection',
            'price' => 1
        ]);

        Delivery::create([
            'name' => 'Mail package',
            'price' => 3.50
        ]);
    }
}
