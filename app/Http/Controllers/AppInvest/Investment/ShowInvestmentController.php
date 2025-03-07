<?php

namespace App\Http\Controllers\AppInvest\Investment;

use App\Http\Controllers\Controller;
use App\Models\AppInvest\Segment;
use Rules\AppInvest\Investment\Show;

class ShowInvestmentController extends Controller
{
    public function __invoke($id)
    {
        $data['segments'] = Segment::all();

        $data['investment'] = (new Show())->get($id);
        
        return view('app-invest.investment.show', $data);
    }
}
