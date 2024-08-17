<?php

namespace App\Http\Controllers\ControlFinance\Reports;

use App\Http\Controllers\Controller;
use App\Models\ControlFinance\PaymentType;
use App\Models\ControlFinance\Shopper;
use Rules\ControlFinance\Reports\Pdf\ReportInstallmentsByShopper;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class ReportShopperController extends Controller
{
    public function __invoke(Request $request)
    {
        $year = Carbon::now()->format("Y");
        $month = Carbon::now()->format("m");
        
        $data = [];
        $data['actionFieldDisable'] = 1;

        $data['paymentTypes'] = PaymentType::where('id', '>', 0)->orderBy('order', 'asc')->get();
        $data['shoppers'] = Shopper::all();
        $data['yearMonthRef'] = Carbon::now()->format('m/Y');
        $data['reports'] = collect([]);

        if ($request['month']) {
            $month = $request->month;
            $year = $request->year;
            $data['yearMonthRef'] = "{$month}/{$year}";
        }

        if ($shopId = $request->shopper_id) {

            $data['actionFieldDisable'] = 0;

            $reportsPdf = new ReportInstallmentsByShopper($request);
            $data['reports'] = $reportsPdf->getDataReport(); 
        }

      

        $request->session()
            ->put('filters', $request->all());

        $data['year'] = $year;
        $data['month'] = $month;        
        $data['shopperId'] = $shopId ?? 0;
        $data['payTypeId'] = $payTypeId ?? 0;

        

        return view('control-finance.report.shopper', $data);
    }
}
