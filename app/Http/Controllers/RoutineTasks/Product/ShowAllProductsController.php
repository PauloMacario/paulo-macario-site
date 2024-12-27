<?php

namespace App\Http\Controllers\RoutineTasks\Product;

use App\Http\Controllers\Controller;
use App\Models\RoutineTasks\Product;
use Illuminate\Http\Request;

class ShowAllProductsController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = [];
        $data['products'] = Product::all();

        return view('routine-tasks.product.all', $data);
    }
}
