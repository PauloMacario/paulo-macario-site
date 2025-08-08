<?php

namespace App\Http\Controllers\CheapBeer;

use App\Http\Controllers\Controller;
use App\Models\CheapBeer\Beer;
use App\Models\CheapBeer\BeerPlace;
use App\Models\CheapBeer\Place;

use Illuminate\Http\Request;

class BeerPriceController extends Controller
{
    public function getFormBeearPrice()
    {
        $dataView['beers'] = Beer::all();
        $dataView['places'] = Place::all();

        return view('cheap-beer.form-bear-price', $dataView);
    }

    public function postFormBeearPrice(Request $request)
    {
        $data = [
            "beer_id" => $request->beer_id,
            "place_id" => $request->place_id,
            "price" => str_replace(',','.', $request->price),
            "collected_at" => now()->format('Y-m-d')
        ];

        $beerExists = BeerPlace::where('beer_id', $request->beer_id)
            ->where('place_id', $request->place_id)
            ->where('collected_at', now()->format('Y-m-d'))
            ->first();

        if ($beerExists) {
            $beerExists->update($data);

            return response()->json("update", 200);
        }

        $create = BeerPlace::create($data);

        if ($create) {
            return response()->json("success", 200);
        }

        return response()->json("error", 400);
    }
}
