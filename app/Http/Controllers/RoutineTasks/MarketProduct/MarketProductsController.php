<?php

namespace App\Http\Controllers\RoutineTasks\MarketProduct;

use App\Http\Controllers\Controller;
use App\Models\RoutineTasks\Market;
use App\Models\RoutineTasks\MarketProduct;
use App\Models\RoutineTasks\Product;
use Illuminate\Http\Request;

class MarketProductsController extends Controller
{   
    public function __invoke(Request $request)
    {
        $data = [];
       
        $data['marketsProducts'] = MarketProduct::where('id', '>', 0)
            ->orderBy('product_id', 'market_id')
            ->get();
        
        return view('routine-tasks.market-product.list', $data);
    }
}
