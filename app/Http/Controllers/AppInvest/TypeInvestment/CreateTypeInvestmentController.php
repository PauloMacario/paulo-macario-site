<?php

namespace App\Http\Controllers\AppInvest\TypeInvestment;

use App\Http\Controllers\Controller;
use Rules\AppInvest\TypeInvestment\Create;
use Illuminate\Http\Request;

class CreateTypeInvestmentController extends Controller
{
    public function __invoke(Request $request)
    {
        $create = new Create();
        $response = $create->execute($request->all());

        $request->session()
            ->flash($response['status'], $response['msg']);

        return redirect()->back();
    }
}
