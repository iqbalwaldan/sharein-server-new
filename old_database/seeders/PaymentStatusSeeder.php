<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $payment_status = [
            [
                'status' => 'Pending',
            ],
            [
                'status' => 'Successfull',
            ],
            [
                'status' => 'Error',
            ],
        ];

        DB::table('payment_statuses')->insert($payment_status);
    }
}
