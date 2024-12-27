<?php

namespace App\Http\Controllers\RoutineTasks\ShoppingList;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewShoppingListController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = [];
               
        return view('routine-tasks.shopping-list.new', $data);
    }
}
