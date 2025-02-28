<?php

namespace App\Models\RoutineTasks;

use Illuminate\Database\Eloquent\Factories\HasFactory;


class GoalTask extends RoutineTasksModel
{
    use HasFactory;

    protected $fillable = [
        'id',
        'goal_id',
        'description',
        'date',
        'week',
        'completed',
    ];

    public function goal() 
    {
        return $this->belongsTo(Goal::class);
    }
}
