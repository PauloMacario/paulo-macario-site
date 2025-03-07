<?php

namespace App\Http\Controllers\AppInvest\Negotiation;

use App\Http\Controllers\Controller;
use App\Models\AppInvest\Investment;
use Illuminate\Http\Request;

class NewNegotiationController extends Controller
{
    public function __invoke(Request $request)
    {
        $data['investments'] = Investment::all();
        
        return view('app-invest.negotiation.new', $data);
    }
}
