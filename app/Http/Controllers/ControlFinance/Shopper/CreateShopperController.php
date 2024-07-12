<?php

namespace App\Http\Controllers\ControlFinance\Shopper;

use App\Http\Controllers\Controller;
use Rules\ControlFinance\Shopper\Create;
use Illuminate\Http\Request;

class CreateShopperController extends Controller
{
    public function __invoke(Request $request)
    {
        $createShopper = new Create();
        $response = $createShopper->execute($request);

        $request->session()->flash($response['status'], $response['msg']);
        return redirect()->back();
    }
}
