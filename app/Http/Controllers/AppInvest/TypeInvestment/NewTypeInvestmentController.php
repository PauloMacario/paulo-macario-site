<?php

namespace App\Http\Controllers\AppInvest\TypeInvestment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewTypeInvestmentController extends Controller
{
    public function __invoke()
    {
        return view('app-invest.type-investment.new');
    }
}
