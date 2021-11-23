<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Payment;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Payment::create(['type' => 'Credit card', 'price' => 0]);
        Payment::create(['type' => 'Paypal', 'price' => 0]);
        Payment::create(['type' => 'Cash on delivery', 'price' => 1]);
    }
}
