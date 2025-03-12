<?php

namespace App\Http\Controllers\ControlFinance\Reports;

use App\Http\Controllers\Controller;
use Rules\ControlFinance\Reports\Pdf\ReportInstallmentsByShopper;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use PDF;

class ReportMonthGeneratePdfController extends Controller
{
    public function __invoke(Request $request)
    {
        if ( ! isset($request['payment_type_id'])) {
            $error = ["status" => "error" , "msg" => "Não foi selecionado nenhum item para gerar o relatório.", "statusCode" => 400];
            $request['payment_type_id'] = $request['payment_type_id'] ?? 0;
            $request->session()->flash($error['status'], $error['msg']);            
            return redirect()->action([ReportShopperController::class], $request->all());
        }

        $request['payment_type_id'] = array_keys($request['payment_type_id']);

        $reportsPdf = new ReportInstallmentsByShopper($request);
        $data['reports'] = $reportsPdf->generateDataReport($request['payment_type_id']); 
        $data['view'] = false;
        
        if ($request['acao'] == 'view') {
            $data['view'] = true;
            $data['request'] = $request->except('_token');

            return view('control-finance.report.installment-by-month', $data);           
        }

        $nameArquivo = Str::snake($data['reports']['shopperName']);
        $date = Str::replace('/', '_', $data['reports']['dateRef']);

        if ($request['acao'] == 'generate') {            
            $pdf = PDF::loadView('control-finance.report.pdf.installment-by-month', $data);       
            return $pdf->stream("{$nameArquivo}_{$date}.pdf", $data);
        }

        if ($request['acao'] == 'download') {          
            $pdf = PDF::loadView('control-finance.report.pdf.installment-by-month', $data);

            return $pdf->download("{$nameArquivo}_{$date}.pdf");
        }        
    }
}
