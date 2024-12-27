<?php

namespace App\Http\Controllers\RoutineTasks\Market;

use App\Http\Controllers\Controller;
use App\Models\RoutineTasks\Market;
use Illuminate\Http\Request;

class ShowAllMarketsController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = [];
        $data['markets'] = Market::all();

        return view('routine-tasks.market.all', $data);
    }
}
