<?php

namespace App\Models\RoutineTasks;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarketProduct extends RoutineTasksModel
{
    use HasFactory;

    protected $fillable = [
        'market_id',
        'product_id',
        'price',
        'quantity',
        'total',
        'buy'
    ];

    public function product() 
    {
        return $this->belongsTo(Product::class);
    }

    public function Market() 
    {
        return $this->belongsTo(Market::class);
    }
}
