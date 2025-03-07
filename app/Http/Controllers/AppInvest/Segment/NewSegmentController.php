<?php

namespace App\Http\Controllers\AppInvest\Segment;

use App\Http\Controllers\Controller;
use App\Models\AppInvest\TypeInvestment;
use Illuminate\Http\Request;

class NewSegmentController extends Controller
{
    public function __invoke()
    {
        $dados['typeInvestments'] = TypeInvestment::all();

        return view('app-invest.segment.new', $dados);
    }
}
