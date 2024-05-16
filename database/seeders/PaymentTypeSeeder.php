<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('payment_types')->insert([
            'description' => 'Débito',
            'processing_day' => null,
            'payment_day' => null,
            'installment_enable' => 0,
            'style' => '',
            'status' => 'E',
        ]);

        DB::table('payment_types')->insert([
            'description' => 'Credito Nubank',
            'processing_day' => 12,
            'payment_day' => 19,
            'installment_enable' => 1,
            'style' => '',
            'status' => 'E',
        ]);

        DB::table('payment_types')->insert([
            'description' => 'Credito Santander',
            'processing_day' => 12,
            'payment_day' => 19,
            'installment_enable' => 1,
            'style' => '',
            'status' => 'E',
        ]);

        DB::table('payment_types')->insert([
            'description' => 'Boleto',
            'processing_day' => null,
            'payment_day' => null,
            'installment_enable' => 0,
            'style' => '',
            'status' => 'E',
        ]);

        DB::table('payment_types')->insert([
            'description' => 'Pix',
            'processing_day' => null,
            'payment_day' => null,
            'installment_enable' => 0,
            'style' => '',
            'status' => 'E',
        ]);
    }
}
