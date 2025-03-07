<?php

namespace App\Http\Controllers\AppInvest\Settings;

use App\Http\Controllers\Controller;
use App\Models\AppInvest\Investment;
use App\Models\AppInvest\Segment;
use App\Models\AppInvest\TypeInvestment;

class ShowSettingsInitialAppInvestController extends Controller
{   
    public function __invoke()
    {
        $data['typeInvestments'] = TypeInvestment::where('id', '>', 0)
            ->orderBy('order')
            ->get();

        $data['segments'] = Segment::where('id', '>', 0)
            ->orderBy('order')
            ->get();

        $data['investments'] = Investment::where('id', '>', 0)
            ->orderBy('order')
            ->get();

        return view('app-invest.setting.all', $data);
    }
}
