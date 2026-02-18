<?php

namespace App\Http\Controllers\ShoppingList\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Rules\ShoppingList\Product\DeleteProduct;

class DeleteProductController extends Controller
{
    public function __invoke(Request $request)
    {
        $product = (new DeleteProduct($request->id))->execute();

        if ($product) {
            $request->session()->flash('success', 'Cadastrado com sucesso.');
            return redirect()->back();
        }

        $request->session()->flash('error', 'Erro ao cadastrar.');
        return redirect()->back();

    }
}
