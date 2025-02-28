<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoutineTasks\Goal\{
    NewGoalController,
    CreateGoalController,
    ShowAllGoalsController,
    ShowGoalController
};

Route::middleware('auth')
    ->prefix('routinetasks')
    ->group(function() {
        Route::get('/meta',
            NewGoalController::class
            )
            ->name('goal_get');

        Route::post('/meta',
            CreateGoalController::class
            )
            ->name('goal_create');

        Route::get('/metas',
            ShowAllGoalsController::class
            )
            ->name('goal_showAll');

        Route::get('/meta/{id}/detalhes',
            ShowGoalController::class
        )->name('goal_show');
    });