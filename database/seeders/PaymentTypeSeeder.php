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
            'description' => 'débito',
            'processing_day' => null,
            'payment_day' => null,
            'installment_enable' => 0,
            'style' => '',
            'status' => 'E',
        ]);

        DB::table('payment_types')->insert([
            'description' => 'crédito nubank',
            'processing_day' => 12,
            'payment_day' => 19,
            'installment_enable' => 1,
            'style' => '',
            'status' => 'E',
        ]);

        DB::table('payment_types')->insert([
            'description' => 'crédito santander',
            'processing_day' => 12,
            'payment_day' => 19,
            'installment_enable' => 1,
            'style' => '',
            'status' => 'E',
        ]);

        DB::table('payment_types')->insert([
            'description' => 'boleto',
            'processing_day' => null,
            'payment_day' => null,
            'installment_enable' => 0,
            'style' => '',
            'status' => 'E',
        ]);

        DB::table('payment_types')->insert([
            'description' => 'pix',
            'processing_day' => null,
            'payment_day' => null,
            'installment_enable' => 0,
            'style' => '',
            'status' => 'E',
        ]);

        DB::table('payment_types')->insert([
            'description' => 'financiamento apto',
            'processing_day' => 19,
            'payment_day' => 19,
            'installment_enable' => 1,
            'style' => '',
            'status' => 'E',
        ]);

        DB::table('payment_types')->insert([
            'description' => 'dinheiro',
            'processing_day' => null,
            'payment_day' => null,
            'installment_enable' => 0,
            'style' => '',
            'status' => 'E',
        ]);
    }
}
