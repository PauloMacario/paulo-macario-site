<?php

namespace App\Models\RoutineTasks;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends RoutineTasksModel
{
    use HasFactory;

    protected $fillable = [
        'item'
    ];
}
