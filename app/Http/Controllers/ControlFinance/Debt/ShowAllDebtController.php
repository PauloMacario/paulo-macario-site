<?php

namespace App\Http\Controllers\ControlFinance\Debt;

use App\Http\Controllers\Controller;
use App\Models\ControlFinance\Debt;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class ShowAllDebtController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = [];
    
        $year = Carbon::now()->format("Y");
        $month = Carbon::now()->format("m");
        
        $data['yearMonthRef'] = Carbon::now()->format('m/Y');
        
        if ($request['month']) {
            $month = $request->month;
            $year = $request->year;
            $data['yearMonthRef'] = "{$month}/{$year}";
        }
      
        $data['debts'] = Debt::whereYear('date', $year)
        ->whereMonth('date', $month)
        ->orderBy('date', 'DESC')
        ->get();
        
        $request->session()
            ->put('filters', $request->all());
        
        $data['year'] = $year;
        $data['month'] = $month;
        
        $data['total'] = 0;
        
        return view('control-finance.debt.all', $data);
    }
}
