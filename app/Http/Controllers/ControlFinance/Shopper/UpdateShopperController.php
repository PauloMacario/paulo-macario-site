<?php

namespace App\Http\Controllers\ControlFinance\Shopper;

use App\Http\Controllers\Controller;
use Rules\ControlFinance\Shopper\Update;
use Illuminate\Http\Request;

class UpdateShopperController extends Controller
{
    public function __invoke(Request $request)
    {
        $updateShopper = new Update();
        $response = $updateShopper->execute($request);
       
        $request->session()->flash($response['status'], $response['msg']);
        return redirect()->back();
    }
}
