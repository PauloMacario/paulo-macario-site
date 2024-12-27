<?php

namespace App\Http\Controllers\RoutineTasks\ShoppingList;

use App\Http\Controllers\Controller;
use App\Models\RoutineTasks\ShoppingList;
use Illuminate\Http\Request;

class ShowAllShoppingListsController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = [];
        $data['shoppingLists'] = ShoppingList::all();

        return view('routine-tasks.shopping-list.all', $data);
    }
}
