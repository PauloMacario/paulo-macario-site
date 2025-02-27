<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoutineTasks\GoalTasks\{
    NewGoalTasksController
};

Route::middleware('auth')
    ->prefix('routinetasks')
    ->group(function() {
       /*  Route::get('/meta',
            NewGoalTasksController::class
            )
            ->name('goal_get');

        Route::post('/meta',
            NewGoalTasksController::class
            )
            ->name('goal_get'); */
    });