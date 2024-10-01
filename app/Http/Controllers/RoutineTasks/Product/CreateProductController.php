<?php

namespace App\Http\Controllers\RoutineTasks\Product;

use App\Http\Controllers\Controller;
use App\Models\RoutineTasks\Product;
use Illuminate\Http\Request;

class CreateProductController extends Controller
{
    public function __invoke(Request $request)
    {               
        $dados = $request->except('_token');

        $product = Product::create($dados);

        if ($product) {

            $request->session()->flash('success', 'Produto cadastrado!');
            return redirect()->back();
        }

        $request->session()->flash('success', 'Ocorreu um erro :(');
        return redirect()->back();
    }
}
