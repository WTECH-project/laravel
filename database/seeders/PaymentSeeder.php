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
        Payment::create(['type' => 'Kreditná karta', 'price' => 0]);
        Payment::create(['type' => 'Paypal', 'price' => 0]);
        Payment::create(['type' => 'Platba na dobierku', 'price' => 1]);
    }
}
