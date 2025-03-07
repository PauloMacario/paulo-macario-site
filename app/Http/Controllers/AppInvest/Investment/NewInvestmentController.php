<?php

namespace App\Http\Controllers\AppInvest\Investment;

use App\Http\Controllers\Controller;
use App\Models\AppInvest\Segment;
use Illuminate\Http\Request;

class NewInvestmentController extends Controller
{
    public function __invoke()
    {
        $dados['segments'] = Segment::all();

        return view('app-invest.investment.new', $dados);
    }
}
