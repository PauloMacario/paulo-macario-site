<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CheapBeer\Beer;

class BeerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bears = [
            "Spaten",
            "Brahma",
            "Amstel",
            "Eisenbahn",
            "Império",
            "Petra",
            "Original"
        ];

        foreach ($bears as $bear) {
            (new Beer())->setConnection('cheap_beer')->create(["name" => $bear]);
        }
    }
}
