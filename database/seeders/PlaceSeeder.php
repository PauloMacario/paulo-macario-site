<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CheapBeer\Place;

class PlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $places = [
            0 => ["name" => "Atacadão", "address" => "Suzano"],
            1 => ["name" => "Assaí", "address" => "Suzano"],
            2 => ["name" => "Nagumo", "address" => "Vila Mazza"],
            3 => ["name" => "Primos", "address" => "Vila Urupês"],
            4 => ["name" => "Semar", "address" => "Centro Suzano"],           
        ];

        foreach ($places as $place) {
            (new Place())->setConnection('cheap_beer')->create(
                [
                    "name" => $place['name'],
                    "address" => $place['address']
                ]
            );
        }
    }
}
