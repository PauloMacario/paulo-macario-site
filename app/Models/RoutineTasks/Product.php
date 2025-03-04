<?php

namespace App\Models\RoutineTasks;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends RoutineTasksModel
{
    use HasFactory;

    protected $fillable = [
        'item',
        'category_id'
    ];

    public function category() 
    {
        return $this->belongsTo(Category::class);
    }
}
