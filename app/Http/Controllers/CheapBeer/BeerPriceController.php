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
        $dataG = [
            "beer_id" => $request->beer_id,
            "place_id" => $request->place_id,
            "type" => "G",
            "price" => str_replace(',','.', $request->priceG),
            "collected_at" => now()->format('Y-m-d')
        ];
        
        $dataP = [
            "beer_id" => $request->beer_id,
            "place_id" => $request->place_id,
            "type" => "P",
            "price" => str_replace(',','.', $request->priceP),
            "collected_at" => now()->format('Y-m-d')
        ];

        $beerPExists = BeerPlace::where('beer_id', $request->beer_id)
            ->where('place_id', $request->place_id)
            ->where('type', 'P')
            ->where('collected_at', now()->format('Y-m-d'))
            ->first();

        $beerGExists = BeerPlace::where('beer_id', $request->beer_id)
            ->where('place_id', $request->place_id)
            ->where('type', 'G')
            ->where('collected_at', now()->format('Y-m-d'))
            ->first();

        if ($beerPExists && $beerGExists) {
            $beerPExists->update($dataP);
            $beerGExists->update($dataG);

            return response()->json("update", 200);
        }

        $createP = BeerPlace::create($dataP);
        $createG = BeerPlace::create($dataG);

        if ($createP || $createG) {
            return response()->json("success", 200);
        }

        return response()->json("error", 400);
    }

    public function getRanking()
    {
        $dataView['beersPricers'] = BeerPlace::where('collected_at', now()->format('Y-m-d'))
            ->join('beers','beers.id','=','beer_places.beer_id')
            ->join('places','places.id','=','beer_places.beer_id')
            ->select(
                'beer_places.price',
                'beer_places.type',
                'beer_places.collected_at',
                'beers.name AS beer_name',
                'beers.img AS beer_img',
                'beers.color AS beer_color',
                'places.name AS place_name',
                'places.img AS place_img',
                'places.color AS place_color',

            )
            ->orderBy('type')
            ->orderBy('price')
            ->get();

        return view('cheap-beer.ranking', $dataView);
    }
}
