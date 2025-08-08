<?php

namespace Rules\CheapBeer\Helpers;

use App\Models\CheapBeer\BeerPlace;
use Illuminate\Support\Carbon;

class BeerPlaceHelper
{
    public static function getPriceToday($beerId, $placeId)
    {
        return BeerPlace::where('beer_id', $beerId)
            ->where('place_id', $placeId)
            ->where('collected_at', now()->format('Y-m-d'))
            ->first();
    }
}