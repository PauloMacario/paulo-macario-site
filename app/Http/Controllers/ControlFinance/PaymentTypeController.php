<?php

namespace App\Http\Controllers\ControlFinance;

use App\Http\Controllers\Controller;
use App\Models\ControlFinance\PaymentType;
use Rules\ControlFinance\PaymentType\Update;
use Rules\ControlFinance\PaymentType\Create;
use Illuminate\Http\Request;

class PaymentTypeController extends Controller
{
    /* public function newPaymentType()
    {
        return view('control-finance.payment-type.new');
    }

    public function postPaymentType(Request $request)
    {             
        $createPaymentType = new Create();
        $response = $createPaymentType->execute($request);

        $request->session()->flash($response['status'], $response['msg']);
        return redirect()->back();
    }

    public function getDetailPaymentType($id)
    {
        $data['paymentType'] = PaymentType::find($id);
        $data['paymentTypes'] = PaymentType::where('status', 'E')->get();

        return view('control-finance.payment-type.detail', $data);
    }
    
    public function postUpdatePaymentType(Request $request)
    {
        $updatePaymentType = new Update();
        $response = $updatePaymentType->execute($request);
       
        $request->session()->flash($response['status'], $response['msg']);

        return redirect()->back();
    } */
}
