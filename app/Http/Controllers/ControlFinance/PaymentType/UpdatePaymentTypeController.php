<?php

namespace App\Http\Controllers\ControlFinance\PaymentType;

use App\Http\Controllers\Controller;
use Rules\ControlFinance\PaymentType\Update;
use Illuminate\Http\Request;

class UpdatePaymentTypeController extends Controller
{
    public function __invoke(Request $request)
    {
        $updatePaymentType = new Update();
        $response = $updatePaymentType->execute($request);
       
        $request->session()->flash($response['status'], $response['msg']);

        return redirect()->back();
    }
}
