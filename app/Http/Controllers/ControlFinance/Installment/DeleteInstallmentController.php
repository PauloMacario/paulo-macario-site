<?php

namespace App\Http\Controllers\ControlFinance\Installment;

use App\Http\Controllers\Controller;
use Rules\ControlFinance\Installment\Delete;
use Illuminate\Http\Request;
use App\Http\Controllers\ControlFinance\Installment\ShowAllInstallmentsController;

class DeleteInstallmentController extends Controller
{
    public function __invoke(Request $request)
    {
        $filters = $request->session()->get('filters');
        $request->session()->forget('filters');
        
        $deleteInstallment = new Delete();
        $response = $deleteInstallment->execute($request->id);
       
        $request->session()->flash($response['status'], $response['msg']);
        return redirect()->action(
            [ShowAllInstallmentsController::class], $filters
        );
    }
}
