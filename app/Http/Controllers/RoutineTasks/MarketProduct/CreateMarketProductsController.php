<?php

namespace App\Http\Controllers\RoutineTasks\MarketProduct;

use App\Http\Controllers\Controller;
use App\Models\RoutineTasks\MarketProduct;
use Illuminate\Http\Request;

class CreateMarketProductsController extends Controller
{
    public function __invoke(Request $request)
    {
        $checked = $request->marketProductDisabled ?? [];

        if (!isset($request->marketProduct)) {
            $request->session()->flash('info', 'Nenhum valor para atualizar!');
            return redirect()->back();
        }

        foreach ($request->marketProduct as $id => $price) {
            
            $priceDB = str_replace('.','', $price);

            $priceSave = str_replace(',','.', $priceDB);

            $marketProduct = MarketProduct::find($id);

            $check = (array_key_exists($id, $checked)) ? '1' : '0';
           
            if ($marketProduct && $marketProduct->price != $priceSave) {
                $marketProduct->update([
                    'price' => $priceSave
                ]);
            }
            
            if ($marketProduct && $marketProduct->checked != $checked) {
                $marketProduct->update([
                    'checked' => $check
                ]);
            }
        }

        foreach ($request->marketProductBuy as $id => $buy) {
                        
            $marketProduct = MarketProduct::find($id);

            if ($marketProduct && $marketProduct->buy != $buy) {
                $marketProduct->update([
                    'buy' => $buy
                ]);
            }
        }

        foreach ($request->marketProductQuantity as $id => $quantity) {
                        
            $marketProduct = MarketProduct::find($id);

            if ($marketProduct && $marketProduct->quantity != $quantity) {
                $marketProduct->update([
                    'quantity' => $quantity
                ]);
            }
        }

        foreach ($request->marketProductTotal as $id => $total) {

            $totalDB = str_replace('.','', $total);

            $totalSave = str_replace(',','.', $totalDB);
                        
            $marketProduct = MarketProduct::find($id);

            if ($marketProduct && $marketProduct->total != $totalSave) {
                $marketProduct->update([
                    'total' => $totalSave
                ]);
            }
        }

        if ($request->ajax) {

            return response()->json(['success' => 'Atualizado']);
        }

        return redirect()->back();
       
    }
}
