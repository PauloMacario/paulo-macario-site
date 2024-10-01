<?php

namespace App\Http\Controllers\RoutineTasks\MarketProduct;

use App\Http\Controllers\Controller;
use App\Models\RoutineTasks\Market;
use App\Models\RoutineTasks\MarketProduct;
use App\Models\RoutineTasks\Product;
use Illuminate\Http\Request;

class ManagerMarketProductsController extends Controller
{   
    public function __invoke(Request $request)
    {
        $data = [];

        $data['products'] = Product::all();
        $data['markets'] = Market::all();
        $data['marketsProducts'] = [];
        $marketsProducts = MarketProduct::all();

        foreach ($marketsProducts as $item) {
            $data['marketsProducts'][$item->market_id][] = $item->product_id;
        }

        return view('routine-tasks.market-product.manager', $data);
    }
}
