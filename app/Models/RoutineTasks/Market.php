<?php

namespace App\Models\RoutineTasks;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Market extends RoutineTasksModel
{
    use HasFactory;

    protected $fillable = [
        'name',
        'color',
        'img_name'
    ];
}
