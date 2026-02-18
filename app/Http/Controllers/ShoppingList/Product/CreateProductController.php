<?php

namespace App\Http\Controllers\ShoppingList\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Rules\ShoppingList\Product\CreateProduct;

class CreateProductController extends Controller
{
    public function __invoke(Request $request)
    {
        $createProduct = (new CreateProduct($request->except('_token')))->execute();

        if ($createProduct) {
            $request->session()->flash('success', 'Cadastrado com sucesso.');
            return redirect()->back();
        }

        $request->session()->flash('error', 'Erro ao cadastrar.');
        return redirect()->back();

    }
}
