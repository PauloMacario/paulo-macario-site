<?php

namespace App\Http\Controllers\RoutineTasks\Product;

use App\Http\Controllers\Controller;
use App\Models\RoutineTasks\Market;
use App\Models\RoutineTasks\Product;
use Illuminate\Http\Request;

class NewProductController extends Controller
{   
    public function __invoke(Request $request)
    {
        $data = [];
        $data['markets'] = Market::all();

        if ($data['markets']->count() == 0) {
            $request->session()->flash('warning', 'Não existem mercados para serem vinculados na lista.');
            return redirect()->back();
        }

        return view('routine-tasks.product.new', $data);
    }
}
