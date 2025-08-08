<?php

namespace App\Models\CheapBeer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeerPlace extends Model
{
    use HasFactory;

    protected $connection = 'cheap_beer';

    protected $fillable = [
            'beer_id',
            'place_id',
            'price',
            'collected_at'
    ];

    public function beer()
    {
        return $this->belongsTo(Beer::class);
    }
}
