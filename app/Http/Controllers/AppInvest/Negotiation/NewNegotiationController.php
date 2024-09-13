<?php

namespace App\Http\Controllers\AppInvest\Negotiation;

use App\Http\Controllers\Controller;
use App\Models\AppInvest\Investment;
use App\Models\AppInvest\TypeInvestment;
use Illuminate\Http\Request;

class NewNegotiationController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = [];
        $data['typeInvestments'] = TypeInvestment::where('id', '>', 0)->orderBy('order', 'asc')->get();
        $data['investments'] = Investment::where('id', '>', 0)->orderBy('name', 'asc')->get();
        
        return view('app-invest.negotiation.new', $data);
    }
}
