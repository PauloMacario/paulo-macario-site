<?php

namespace App\Models\RoutineTasks;

use Illuminate\Database\Eloquent\Factories\HasFactory;


class Category extends RoutineTasksModel
{
    use HasFactory;

    protected $fillable = [
        'description',       
        'color'
    ];

    public function products() 
    {
        return $this->hasMany(Product::class);
    }
}
