<?php

namespace App\Models\ShoppingList;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListProduct extends Model
{
    use HasFactory;

    protected $connection = 'db_list';

    protected $fillable = [
        'id',
        'list_id',
        'products_id',
        'quantity',
        'price',
        'included',
        'purchased'
    ];
}
