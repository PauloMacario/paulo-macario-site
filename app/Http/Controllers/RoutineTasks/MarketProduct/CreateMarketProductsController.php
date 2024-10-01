<?php

namespace App\Http\Controllers\RoutineTasks\MarketProduct;

use App\Http\Controllers\Controller;
use App\Models\RoutineTasks\MarketProduct;
use Illuminate\Http\Request;

class CreateMarketProductsController extends Controller
{  
    public function __invoke(Request $request)
    {          

        if (!isset($request->marketProduct)) {
            $request->session()->flash('info', 'Nenhum valor para atualizar!');
            return redirect()->back();
        }


        foreach ($request->marketProduct as $id => $price) {
            
            $priceDB = str_replace('.','', $price);

            $priceSave = str_replace(',','.', $priceDB);

            $marketProduct = MarketProduct::find($id);

            if ($marketProduct && $marketProduct->price != $priceSave) {
                $marketProduct->update([
                    'price' => $priceSave
                ]);
            }
        }

       
        /* $request->session()->flash('success', 'Atualizado!'); */
        return redirect()->back();
       
    }
}
