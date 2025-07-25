<?php

namespace App\Http\Controllers\ControlFinance\Reports;

use App\Http\Controllers\Controller;
use App\Models\ControlFinance\PaymentType;
use Rules\ControlFinance\Reports\Pdf\ReportInstallmentsAll;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class ReportAllController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = [];
        $data['filter'] = '';
                     
        if (!empty($request->all())) {
            $data['filter'] = 'show';
        }

        $year = Carbon::now()->format("Y");
        $month = Carbon::now()->format("m");

        $data['paymentTypes'] = PaymentType::where('user_id', auth()->user()->id)
            ->orderBy('order', 'asc')
            ->get();
           
        $data['shoppers'] = auth()->user()->shoppers;
        $data['yearMonthRef'] = Carbon::now()->format('m/Y');
        $data['reports'] = collect([]);
        $data['view'] = false;

        if ($request['month']) {
            $month = $request->month;
            $year = $request->year;
            $data['yearMonthRef'] = "{$month}/{$year}";
        }

        if ($shopId = $request->shopper_id) {
            $reportsPdf = new ReportInstallmentsAll($request);
            $data['reports'] = $reportsPdf->getDataReport(); 
        }
        
        $request->session()
            ->put('filters', $request->all());

        $data['year'] = $year;
        $data['month'] = $month;        
        $data['shopperId'] = $shopId ?? 0;
        $data['paymentTypeId'] = $request->payment_type_id ?? 0;    
        
        return view('control-finance.report.month', $data);
    }
}
