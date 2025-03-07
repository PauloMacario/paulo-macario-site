<?php

namespace App\Http\Controllers\AppInvest\TypeInvestment;

use App\Http\Controllers\Controller;
use Rules\AppInvest\TypeInvestment\Show;

class ShowTypeInvestmentController extends Controller
{
    public function __invoke($id)
    {
        $data['typeInvestment'] = (new Show())->get($id);
        
        return view('app-invest.type-investment.show', $data);
    }
}
