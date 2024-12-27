<?php

namespace App\Http\Controllers\RoutineTasks\ManagerShoppingList;

use App\Http\Controllers\Controller;
use App\Models\RoutineTasks\MarketProduct;
use Illuminate\Http\Request;

class ManagerShoppingListProductPostController extends Controller
{
    public function __invoke(Request $request)
    {
        $selectedMarkets = $request->markets ?? [];
        $selectedProducts = $request->products ?? [];
        $noSelectedMarkets = $request->nomarkets ?? [];
        $noSelectedProducts = $request->noproducts ?? [];

        $shoppingListId = $request->shoppingListId;

        if (!empty($selectedProducts) && empty($selectedMarkets)) {

            $response = ["status" => "info" , "msg" => "Para cadastrar produtos é necessário tem loja para vincular o produto.", "statusCode" => 400];

            $request->session()->flash($response['status'], $response['msg']);
            return redirect()->back();
        }

        $this->removeMarketsProductsFromList($noSelectedMarkets, $noSelectedProducts, $shoppingListId);

        if (!empty($selectedProducts) && !empty($selectedMarkets)) {
            $this->addMarketsProductsFromList($selectedMarkets, $selectedProducts, $shoppingListId);
        }

        $response = ["status" => "success" , "msg" => "Lista atualizada.", "statusCode" => 200];

        $request->session()->flash($response['status'], $response['msg']);
        return redirect()->back();

    }

    protected function removeMarketsProductsFromList($noSelectedMarkets, $noSelectedProducts, $shoppingListId)
    {
        if (! empty($noSelectedMarkets)) {
            $noSelectedMarkets = array_keys($noSelectedMarkets);

            MarketProduct::where('shopping_list_id', $shoppingListId)
                ->whereIn('market_id', $noSelectedMarkets)
                ->delete();
        }

        if (! empty($noSelectedProducts)) {
            $noSelectedProducts = array_keys($noSelectedProducts);

            MarketProduct::where('shopping_list_id', $shoppingListId)
                ->whereIn('product_id', $noSelectedProducts)
                ->delete();
        }      
    }

    protected function addMarketsProductsFromList($selectedMarkets, $selectedProducts, $shoppingListId)
    {       
        $selectedMarkets = array_keys($selectedMarkets);
        $selectedProducts = array_keys($selectedProducts);


        foreach ($selectedMarkets as $marketId) {
           
            foreach ($selectedProducts as $productId) {
                $produtoExist = MarketProduct::where('shopping_list_id', $shoppingListId)
                    ->where('market_id', $marketId)
                    ->where('product_id', $productId)
                    ->get();

                if ($produtoExist->count() == 0) {

                    $data = [
                        'shopping_list_id' => $shoppingListId,
                        'market_id' => $marketId,
                        'product_id' => $productId,
                        'price' => 0.00,
                        'quantity' => 1,
                        'total' => 0,
                        'buy' => 'N',
                        'checked' => '0'
                    ];
                   
                    MarketProduct::create($data);
                }
            }
        }
    }
}
