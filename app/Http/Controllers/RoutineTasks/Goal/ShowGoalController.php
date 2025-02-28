<?php

namespace App\Http\Controllers\RoutineTasks\Goal;

use App\Http\Controllers\Controller;
use App\Models\RoutineTasks\Goal;
use Illuminate\Http\Request;

class ShowGoalController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = [];
        $data['goal'] = Goal::where('id', $request->id)
            ->with('goalTasks')
            ->first();

        return view('routine-tasks.goal.detail', $data);
    }
}
