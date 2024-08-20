<?php

namespace Rules\ControlFinance\Reports\Pdf;

use App\Models\ControlFinance\Installment;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ReportInstallmentsByShopper
{

    protected $dataSearch;

    public function __construct(Request $request)
    {
        $this->dataSearch = (object)$request->all();
    }

    public function getDataReport()
    {
        $genereteReport = $this->canGenerateReport();

        if ($genereteReport->count() == 0) {
            return $genereteReport;
        }

        $paymentTypes = $this->searchDataReport();
        
        return $this->generateDataReport($paymentTypes);
    }

    public function canGenerateReport()
    {
        $installments = Installment::where('shopper_id', $this->dataSearch->shopper_id)
            ->whereYear('due_date', $this->dataSearch->year)
            ->whereMonth('due_date', $this->dataSearch->month)
            ->get();
    
        return $installments;           
           
    }

    public function searchDataReport()
    {
        $query = Installment::join('debts', 'debts.id', '=','installments.debt_id')
            ->join('payment_types', 'payment_types.id', '=', 'debts.payment_type_id')        
            ->select('payment_types.id')
            ->where('installments.shopper_id', $this->dataSearch->shopper_id)
            ->whereYear('installments.due_date', $this->dataSearch->year)
            ->whereMonth('installments.due_date', $this->dataSearch->month);
           
            
            
        if($this->dataSearch->payment_type_id) {
            $query->where('debts.payment_type_id', $this->dataSearch->payment_type_id);
        }

        $paymentTypes = $query->distinct()
            ->pluck('payment_types.id');

        return $paymentTypes;

    }

    public function generateDataReport($paymentTypes)
    {
        $report = [];

        $data = [];

        $qtdPaymentTypes = count($paymentTypes);

        foreach ($paymentTypes as $key => $paymentTypeId) {

            $loop = $key + 1;

            $reportData = Installment::join('debts', 'debts.id', '=','installments.debt_id')
                ->join('payment_types', 'payment_types.id', '=', 'debts.payment_type_id')        
                ->join('shoppers', 'shoppers.id', '=','installments.shopper_id')        
                ->where('installments.shopper_id', $this->dataSearch->shopper_id)
                ->where('debts.payment_type_id', $paymentTypeId)
                ->whereYear('installments.due_date', $this->dataSearch->year)
                ->whereMonth('installments.due_date', $this->dataSearch->month)
                ->select(
                    'debts.locality','debts.number_installments', 'debts.date', 'debts.payment_type_id',
                    'installments.number_installment', 'installments.due_date', 'installments.value', 'installments.shopper_id',
                    'payment_types.description',
                    'shoppers.name'
                )
                ->get();

            $data[$key]['paymentType'] = Str::title($reportData[0]->description);
            $data[$key]['reports'] = $reportData;

            if ($loop == $qtdPaymentTypes) {

                $report['shopperName'] = Str::title($data[$key]['reports'][0]->name);
                $report['dateRef'] = carbon::createFromFormat('Y-m', $this->dataSearch->year.'-'.$this->dataSearch->month)->format('m/Y');
                $report['data'] = $data;
            }

           
                
        }

        return $report;
    }
}