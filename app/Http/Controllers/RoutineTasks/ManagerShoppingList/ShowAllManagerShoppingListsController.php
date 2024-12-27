<?php

namespace App\Http\Controllers\RoutineTasks\ManagerShoppingList;

use App\Http\Controllers\Controller;
use App\Models\RoutineTasks\ShoppingList;
use Illuminate\Http\Request;

class ShowAllManagerShoppingListsController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = [];

        $data['shoppingLists'] = ShoppingList::all();
               
        return view('routine-tasks.manager-shopping-list.all', $data);
    }
}
