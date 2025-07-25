<?php

namespace App\Http\Controllers\ControlFinance\Debt;

use App\Http\Controllers\Controller;
use Rules\ControlFinance\Debt\Create;
use Illuminate\Http\Request;

class CreateDebtController extends Controller
{
    public function __invoke(Request $request)
    {
        $dataDebt = $request->except('_token');
             
        $response = (new Create())->execute($dataDebt);

        $request->session()->flash($response['status'], $response['msg']);
        
        return redirect()->route('debt_get');
    }
}
