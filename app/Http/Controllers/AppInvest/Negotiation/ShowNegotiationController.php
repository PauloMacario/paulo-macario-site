<?php

namespace App\Http\Controllers\AppInvest\Negotiation;

use App\Http\Controllers\Controller;
use App\Models\AppInvest\Investment;
use App\Models\AppInvest\Negotiation;

class ShowNegotiationController extends Controller
{
    public function __invoke($id)
    {        
        $data['investments'] = Investment::all();

        $data['negotiation'] = Negotiation::where('id', $id)
            ->with('investment')
            ->first();

        return view('app-invest.negotiation.show', $data);
    }
}
