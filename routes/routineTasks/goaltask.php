<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoutineTasks\GoalTasks\{
    UpdateGoalTasksController
};

Route::middleware('auth')
    ->prefix('metas')
    ->group(function() {

        Route::post('/editar',
            UpdateGoalTasksController::class
        )
        ->name('goalTaskUpdate_post');

       /*  Route::get('/meta',
            NewGoalTasksController::class
            )
            ->name('goal_get');

        Route::post('/meta',
            NewGoalTasksController::class
            )
            ->name('goal_get'); */
    });