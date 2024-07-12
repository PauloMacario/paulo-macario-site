<?php

namespace App\Http\Controllers\ControlFinance\PaymentType;

use App\Http\Controllers\Controller;
use Rules\ControlFinance\PaymentType\Create;
use Illuminate\Http\Request;

class CreatePaymentTypeController extends Controller
{
    public function __invoke(Request $request)
    {
        $createPaymentType = new Create();
        $response = $createPaymentType->execute($request);

        $request->session()->flash($response['status'], $response['msg']);
        return redirect()->back();
    }
}
