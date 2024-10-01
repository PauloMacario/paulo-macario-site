<?php

namespace App\Http\Controllers\RoutineTasks\Market;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewMarketController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('routine-tasks.market.new');
    }
}
