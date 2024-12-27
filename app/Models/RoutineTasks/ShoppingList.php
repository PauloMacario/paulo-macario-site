<?php

namespace App\Models\RoutineTasks;

use Illuminate\Database\Eloquent\Factories\HasFactory;


class ShoppingList extends RoutineTasksModel
{
    use HasFactory;

    protected $fillable = [
        'name',       
        'image'
    ];

    public function marketProducts() 
    {
        return $this->hasMany(MarketProduct::class);
    }
}
