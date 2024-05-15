<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            'description' => 'Alimentação',
            'style' => '{"color":"red"}',
            'status' => 'E',
        ]);

        DB::table('categories')->insert([
            'description' => 'Educação',
            'style' => '{"color":"green"}',
            'status' => 'E',
        ]);

        DB::table('categories')->insert([
            'description' => 'Lazer',
            'style' => '{"color":"blue"}',
            'status' => 'E',
        ]);
    }
}
