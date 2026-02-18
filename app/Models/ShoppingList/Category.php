<?php

namespace App\Models\ShoppingList;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $connection = 'db_list';

    protected $fillable = [
        'id',
        'name',
    ];
}
