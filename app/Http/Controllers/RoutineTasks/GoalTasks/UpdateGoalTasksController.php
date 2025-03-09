<?php

namespace App\Http\Controllers\RoutineTasks\GoalTasks;

use App\Http\Controllers\Controller;
use App\Models\RoutineTasks\GoalTask;
use Illuminate\Http\Request;

class UpdateGoalTasksController extends Controller
{
    public function __invoke(Request $request)
    {
        
        $goalTask = GoalTask::find($request->id);

        if ($goalTask) {
            $goalTask->update([
                "completed" => $request->completed
            ]);

            return response()->json([
                    "status" => 200,
                    "msg" => 'Atualizado com sucesso.'
                ]
            );
        }

        return response()->json([
                "status" => 401,
                "msg" => 'Falhou.'
            ]
        );
    }
}
