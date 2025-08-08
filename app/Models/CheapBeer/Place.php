<?php

namespace App\Models\CheapBeer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;

    protected $connection = 'cheap_beer';

    protected $fillable = [
        'name',
        'addres'
    ];
    
}
