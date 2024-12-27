<?php

namespace App\Http\Controllers\RoutineTasks\ShoppingList;

use App\Http\Controllers\Controller;
use App\Models\RoutineTasks\ShoppingList;
use Illuminate\Http\Request;

class CreateShoppingListController extends Controller
{
    public function __invoke(Request $request)
    {
        $dados = $request->except('_token');

        $list = ShoppingList::create($dados);

        if ($list) {

            $request->session()->flash('success', 'cadastrado!');
            return redirect()->back();
        }

        $request->session()->flash('error', 'Ocorreu um erro :(');
        return redirect()->back();
    }
}
