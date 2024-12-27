<?php

namespace App\Models\RoutineTasks;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class MarketProduct extends RoutineTasksModel
{
    use HasFactory;

    protected $fillable = [
        'shopping_list_id',
        'market_id',
        'product_id',
        'price',
        'quantity',
        'total',
        'buy',
        'checked'
    ];

    public function product() 
    {
        return $this->belongsTo(Product::class);
    }

    public function market() 
    {
        return $this->belongsTo(Market::class);
    }

    public function shoppinglist() 
    {
        return $this->belongsTo(ShoppingList::class);
    }
}
