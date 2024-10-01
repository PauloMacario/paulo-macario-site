<?php

namespace App\Http\Controllers\RoutineTasks\Market;

use App\Http\Controllers\Controller;
use App\Models\RoutineTasks\Market;
use Illuminate\Http\Request;

class CreateMarketController extends Controller
{
    
    public function __invoke(Request $request)
    {
        $dados = $request->except('_token');

        $market = Market::create($dados);

        if ($market) {

            $request->session()->flash('success', 'cadastrado!');
            return redirect()->back();
        }

        $request->session()->flash('error', 'Ocorreu um erro :(');
        return redirect()->back();
    }
}
