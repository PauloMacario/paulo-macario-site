<?php

namespace App\Http\Controllers\ControlFinance\Payment;

use App\Http\Controllers\Controller;
use App\Models\ControlFinance\Installment;
use Illuminate\Http\Request;

class ShowAllPayInstallmentsController extends Controller
{
    public function __invoke(Request $request)
    {
        $installments = Installment::where('id','>', 0)->with('debt')->paginate(50);
        
        $data['installments'] = $installments;
        
        return view('control-finance.payment.all-installments', $data);
    }
}
