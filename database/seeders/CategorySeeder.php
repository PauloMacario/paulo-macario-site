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

    public $categories = [
        0 => "Filho(a)",
        1 => "alimentação",
        2 => "educação",
        3 => "lazer",
        4 => "casa",
        5 => "carro",
        6 => "vestuário",
        7 => "pessoal",
        8 => "saúde",
        9 => "outros",
    ];

    public $colors = [
        'A','B','C','D','E','F','1','2','3','4','5','6','7','8','9'
    ];

    public $color;

    public function run(): void
    {
        for ($i = 0 ; $i < count($this->categories) ; $i++) { 

            DB::table('categories')->insert([
                'description' => "{$this->categories[$i]}",
                'style' => "{\"color\":\"{$this->generateColorCss()}\"}",
                'status' => "E",
            ]);
        }
    }

    public function generateColorCss()
    {   
        $this->color = "#";

        for ($i = 1; $i < 7; $i++) {
            $this->color .= $this->colors[rand(0,14)];
        }

        return $this->color;
    }
}
