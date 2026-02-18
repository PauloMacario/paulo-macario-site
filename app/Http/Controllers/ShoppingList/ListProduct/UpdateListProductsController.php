<?php

namespace App\Http\Controllers\ShoppingList\ListProduct;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Rules\ShoppingList\ListProduct\UpdateListProducts;

class UpdateListProductsController extends Controller
{
    public function __invoke(Request $request)
    {
        $response = (new UpdateListProducts($request->all()))->execute();

        if ($response) {
            return response()->json(
                [
                    "title" => "Sucesso :)",
                    "icon" => "success",
                    "msg" => "Pagamento realizado.",
                    "statusCode" => 200
                ]
            );
        }
        
        return response()->json(
            [
                "title" => "Erro :(",
                "icon" => "error",
                "msg" => "Erro ao atualizar.",
                "statusCode" => 500
            ]
        );
    }
}
