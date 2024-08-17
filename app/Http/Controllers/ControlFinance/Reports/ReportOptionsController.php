<?php

namespace App\Http\Controllers\ControlFinance\Reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportOptionsController extends Controller
{   
    public function __invoke(Request $request)
    {
        $data = [];

        return view('control-finance.report.options', $data);
    }
}
