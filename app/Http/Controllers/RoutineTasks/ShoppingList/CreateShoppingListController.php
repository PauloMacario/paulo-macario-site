<?php

namespace App\Http\Controllers\RoutineTasks\Shoppinglist;

use App\Http\Controllers\Controller;
use App\Models\RoutineTasks\Shoppinglist;
use Illuminate\Http\Request;

class CreateShoppinglistController extends Controller
{
    public function __invoke(Request $request)
    {
        $dados = $request->except('_token');

        $list = Shoppinglist::create($dados);

        if ($list) {

            $request->session()->flash('success', 'cadastrado!');
            return redirect()->back();
        }

        $request->session()->flash('error', 'Ocorreu um erro :(');
        return redirect()->back();
    }
}
