<?php

namespace App\Http\Controllers\AppInvest\Negotiation;

use App\Http\Controllers\Controller;
use Rules\AppInvest\Negotiation\ShowAll;
use Illuminate\Http\Request;

class ShowAllNegotiationsController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = (new ShowAll())->get();

        return view('app-invest.negotiation.all', $data);
    }
}
