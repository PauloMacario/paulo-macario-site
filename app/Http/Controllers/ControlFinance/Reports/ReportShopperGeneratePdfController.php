<?php

namespace App\Http\Controllers\ControlFinance\Reports;

use App\Http\Controllers\Controller;
use App\Models\ControlFinance\PaymentType;
use App\Models\ControlFinance\Shopper;
use Rules\ControlFinance\Reports\Pdf\ReportInstallmentsByShopper;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use PDF;

class ReportShopperGeneratePdfController extends Controller
{
    public function __invoke(Request $request)
    {
        $request['payment_type_id'] = array_keys($request['payment_type_id']);

        $reportsPdf = new ReportInstallmentsByShopper($request);
        $data['reports'] = $reportsPdf->generateDataReport($request['payment_type_id']); 

        //return view('control-finance.report.pdf.installment-by-shopper', $data);

        $pdf = PDF::loadView('control-finance.report.pdf.installment-by-shopper', $data);
        return $pdf->stream('control-finance.report.pdf.installment-by-shopper', $data);
    }
}
