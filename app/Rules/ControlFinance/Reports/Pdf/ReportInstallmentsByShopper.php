<?php

namespace Rules\ControlFinance\Reports\Pdf;

use App\Models\ControlFinance\Installment;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
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
            ->whereMonth('due_date', $this->dataSearch->month);
    
        return $installments;           
           
    }

    public function searchDataReport()
    {
        $paymentTypes = Installment::join('debts', 'debts.id', '=','installments.debt_id')
            ->join('payment_types', 'payment_types.id', '=', 'debts.payment_type_id')        
            ->where('installments.shopper_id', $this->dataSearch->shopper_id)
            ->whereYear('installments.due_date', $this->dataSearch->year)
            ->whereMonth('installments.due_date', $this->dataSearch->month)
            ->select('payment_types.id')
            ->distinct()
            ->pluck('payment_types.id');

      return $paymentTypes;

    }

    public function generateDataReport($paymentTypes)
    {
        $reportData = [];

        foreach ($paymentTypes as $paymentTypeId) {
            $reportData[$paymentTypeId] = Installment::join('debts', 'debts.id', '=','installments.debt_id')
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
        }

        return $reportData;
    }
}