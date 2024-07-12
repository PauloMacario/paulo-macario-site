<?php

namespace App\Http\Controllers\ControlFinance\Debt;

use App\Http\Controllers\Controller;
use Rules\ControlFinance\Debt\Delete;
use App\Http\Controllers\ControlFinance\Debt\ShowAllDebtController;
use Illuminate\Http\Request;

class DeleteDebtController extends Controller
{
    public function __invoke(Request $request)
    {
        $filters = $request->session()->get('filters');
        $request->session()->forget('filters');

        $deleteDebt = new Delete();
        $response = $deleteDebt->execute($request->id);
       
        $request->session()->flash($response['status'], $response['msg']);
        return redirect()->action(
            [ShowAllDebtController::class], $filters
        );
    }
}
