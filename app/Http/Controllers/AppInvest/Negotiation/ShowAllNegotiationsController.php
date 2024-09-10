<?php

namespace App\Http\Controllers\AppInvest\Negotiation;

use App\Http\Controllers\Controller;
use App\Models\AppInvest\Negotiation;
use Illuminate\Http\Request;

class ShowAllNegotiationsController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = [];

        $data['negotiations'] = Negotiation::where('id', '>', 0)->with('investment')
            ->get();

        return view('app-invest.negotiation.all', $data);
    }
}
