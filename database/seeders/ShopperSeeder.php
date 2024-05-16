<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShopperSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('shoppers')->insert([
            'name' => 'Paulo Macario',
            'style' => '',
            'status' => 'E',
        ]);

        DB::table('shoppers')->insert([
            'name' => 'Bianca',
            'style' => '',
            'status' => 'E',
        ]);

        DB::table('shoppers')->insert([
            'name' => 'Heitor',
            'style' => '',
            'status' => 'E',
        ]);
    }
}
