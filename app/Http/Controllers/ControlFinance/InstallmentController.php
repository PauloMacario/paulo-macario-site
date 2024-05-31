<?php

namespace App\Http\Controllers\ControlFinance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ControlFinance\Category;
use App\Models\ControlFinance\PaymentType;
use App\Models\ControlFinance\Shopper;
use App\Models\ControlFinance\Installment;
use Illuminate\Support\Carbon;


class InstallmentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getAllInstallments(Request $request)
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

        $data['installments'] = Installment::whereYear('due_date', $year)
            ->whereMonth('due_date', $month)
            ->get();

        $data['total'] = 0;
        
        return view('control-finance.installment.all-installments', $data);
    }
}
