<?php

namespace App\Models\RoutineTasks;

use Illuminate\Database\Eloquent\Factories\HasFactory;


class Goal extends RoutineTasksModel
{
    use HasFactory;

    protected $fillable = [
        'objective',
        'start',
        'end',
        'completed',
    ];

    public function goalTasks() 
    {
        return $this->hasMany(GoalTask::class);
    }
}
