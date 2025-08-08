<?php

namespace App\Models\CheapBeer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beer extends Model
{
    use HasFactory;

    protected $connection = 'cheap_beer';

    protected $fillable = [
        'name'
    ];

    public function beerPlaces()
    {
        return $this->hasMany(BeerPlace::class);
    }
}
