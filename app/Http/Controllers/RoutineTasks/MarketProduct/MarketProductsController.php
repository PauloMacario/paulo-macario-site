<?php

namespace App\Http\Controllers\RoutineTasks\MarketProduct;

use App\Http\Controllers\Controller;
use App\Models\RoutineTasks\Market;
use App\Models\RoutineTasks\MarketProduct;
use App\Models\RoutineTasks\Product;
use Illuminate\Http\Request;

class MarketProductsController extends Controller
{   
    public function __invoke(Request $request, $shoppingListId)
    {
        $data = [];

        $data['filterMarket'] = null;
        $data['filterBuy'] = null;

        $markets = MarketProduct::where('shopping_list_id', $shoppingListId)->pluck('market_id');
        $markets = Market::whereIn('id', $markets)->get();

        $data['markets'] = $markets;

        $data['marketsProducts'] = null;
       
        $marketsProducts = MarketProduct::where('id', '>', 0)
            ->orderBy('price')
            ->orderBy('product_id')
            ->orderBy('market_id');
       
        $marketsProducts->where('shopping_list_id', $shoppingListId); 
        $data['shoppingListId'] = $shoppingListId;        
        
        if($request->filterMarket) {
            $marketsProducts->where('market_id', $request->filterMarket);
            $data['filterMarket'] = $request->filterMarket;
        }

        if($request->filterBuy) {
            $marketsProducts->where('buy', $request->filterBuy);
            $data['filterBuy'] = $request->filterBuy;
        }
        

        $data['marketsProducts'] = $marketsProducts->get();

        $data['total'] = 0;
       
        return view('routine-tasks.market-product.list', $data);
    }
}
