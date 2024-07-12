<?php

namespace App\Http\Controllers\ControlFinance\Installment;

use App\Http\Controllers\Controller;
use Rules\ControlFinance\Installment\Update;
use Illuminate\Http\Request;

class UpdateInstallmentController extends Controller
{
    public function __invoke(Request $request)
    {
        $updateIsntallment = new Update();
        $response = $updateIsntallment->execute($request->except('_token'));
       
        $request->session()->flash($response['status'], $response['msg']);
        return redirect()->back();
    }
}
