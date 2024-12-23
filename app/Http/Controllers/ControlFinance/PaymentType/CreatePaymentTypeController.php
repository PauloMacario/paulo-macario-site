<?php

namespace App\Http\Controllers\ControlFinance\PaymentType;

use App\Http\Controllers\Controller;
use Rules\ControlFinance\PaymentType\Create;
use Illuminate\Http\Request;

class CreatePaymentTypeController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = $request->except('_token');
        $data['status'] = 'E';
        $data['user_id'] = auth()->user()->id;

        $createPaymentType = new Create();
        $response = $createPaymentType->execute($data);

        $request->session()->flash($response['status'], $response['msg']);
        return redirect()->back();
    }
}
