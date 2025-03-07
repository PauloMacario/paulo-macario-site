<?php

namespace App\Http\Controllers\AppInvest\Segment;

use App\Http\Controllers\Controller;
use App\Models\AppInvest\TypeInvestment;
use Rules\AppInvest\Segment\Show;

class ShowSegmentController extends Controller
{
    public function __invoke($id)
    {
        $data['typeInvestments'] = TypeInvestment::all();

        $data['segment'] = (new Show())->get($id);
      
        return view('app-invest.segment.show', $data);
    }
}
