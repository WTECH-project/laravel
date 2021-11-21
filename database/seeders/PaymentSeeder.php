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
        Payment::create(['type' => 'Credit card']);
        Payment::create(['type' => 'Paypal']);
        Payment::create(['type' => 'Cash on delivery']);
    }
}
