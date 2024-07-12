<?php

namespace App\Http\Controllers\ControlFinance\Debt;

use App\Http\Controllers\Controller;
use Rules\ControlFinance\Debt\Update;
use Illuminate\Http\Request;

class UpdateDebtController extends Controller
{
    public function __invoke(Request $request)
    {
        $updateDebt = new Update();
        $response = $updateDebt->execute($request->except('_token'));
       
        $request->session()->flash($response['status'], $response['msg']);
        return redirect()->back();
    }
}
