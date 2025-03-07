<?php

namespace App\Http\Controllers\AppInvest\Investment;

use App\Http\Controllers\Controller;
use Rules\AppInvest\Investment\Create;
use Illuminate\Http\Request;

class CreateInvestmentController extends Controller
{
    public function __invoke(Request $request)
    {
        $response = (new Create())->execute($request->all());
       
        $request->session()
            ->flash($response['status'], $response['msg']);

        return redirect()->back();
    }
}
