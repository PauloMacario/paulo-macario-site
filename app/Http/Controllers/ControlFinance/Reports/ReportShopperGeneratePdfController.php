<?php

namespace App\Http\Controllers\ControlFinance\Reports;

use App\Http\Controllers\Controller;
use App\Models\ControlFinance\PaymentType;
use App\Models\ControlFinance\Shopper;
use Rules\ControlFinance\Reports\Pdf\ReportInstallmentsByShopper;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use PDF;

class ReportShopperGeneratePdfController extends Controller
{
    public function __invoke(Request $request)
    {
        if ( ! isset($request['payment_type_id'])) {
            $error = ["status" => "info" , "msg" => "Não foi selecionado nenhum item para gerar o relatório.", "statusCode" => 400];

            $request->session()->flash($error['status'], $error['msg']);            
            return redirect()->route('pdfReportShopper_get');
        }

        $request['payment_type_id'] = array_keys($request['payment_type_id']);

        $reportsPdf = new ReportInstallmentsByShopper($request);
        $data['reports'] = $reportsPdf->generateDataReport($request['payment_type_id']); 
        
        

        $pdf = PDF::loadView('control-finance.report.pdf.installment-by-shopper', $data);

        if (isset($request->download)) {

            $nameArquivo = Str::snake($data['reports']['shopperName']);
            $date = Str::replace('/', '_', $data['reports']['dateRef']);

            return $pdf->download("{$nameArquivo}_{$date}'.pdf");
        }

        return $pdf->stream('control-finance.report.pdf.installment-by-shopper', $data);
    }
}
