<?php

namespace App\Http\Controllers\AppInvest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeAppInvestController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('app-invest.home');
    }
}