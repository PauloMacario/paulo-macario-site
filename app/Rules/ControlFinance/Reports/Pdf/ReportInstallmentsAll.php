<?php

namespace Rules\ControlFinance\Reports\Pdf;

use App\Models\ControlFinance\Installment;
use App\Models\ControlFinance\PaymentType;
use Illuminate\Support\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;

class ReportInstallmentsAll
{

    protected $dataSearch;

    protected $data;

    protected $dataReport;

    protected $paymentTypes;

    protected $lastDueDate;

    protected $dataStart;

    protected $debts;

    public function __construct(Request $request)
    {
        $this->dataSearch = (object)$request->all();
        $this->dataStart = $request->year . '-' . $request->month . '-01';
    }

    public function getDataReport()
    {                        
        $this->hasData();

        if (! $this->hasData()) {
            return $this->data;
        }
        
        return $this->generateDataReport();
    }

    public function hasData()
    {
        $query = Installment::join('debts', 'debts.id', '=','installments.debt_id')
            ->join('payment_types', 'payment_types.id', '=', 'debts.payment_type_id')
            ->where('installments.shopper_id', $this->dataSearch->shopper_id)
            ->where('due_date', '>=', $this->dataStart);
        
        $this->data = $query->get();

        if ($this->data->isEmpty()) {
            return false;
        }

        $this->paymentTypes = $query->select('payment_types.id')
            ->distinct()
            ->pluck('payment_types.id');

        $this->debts = $query->select('debts.id')
            ->distinct()
            ->pluck('debts.id');

        $lastInstallment = $query->select('installments.*')
            ->orderBy('installments.due_date', 'DESC')
            ->orderBy('installments.id', 'DESC')
            ->first();

        $this->lastDueDate = $lastInstallment->due_date ?? null;

        return true;
    }

    public function generateDataReport()
    {              
        $dtStart = Carbon::createFromFormat('Y-m-d', $this->dataStart);
        $dtEnd = Carbon::createFromFormat('Y-m-d', $this->lastDueDate);

        $rangeMonth = $dtStart->diffInMonths($dtEnd)+1;

        $months = [];

        for ($i = 1; $i <= $rangeMonth ; $i++) { 
            
            if ($i == 1) {
                $monthRef = $dtStart->format('Y-m');
                $months[$monthRef] = [];
                continue;
            }

            $monthRef = $dtStart->addMonth(1)->format('Y-m');
            $months[$monthRef] = [];
        }
        $debts = [];
        $paymentTypeId = [];
        $layout = [];
      
        foreach ($this->paymentTypes as $paymentType) {
            $query = Installment::join('debts', 'debts.id', '=','installments.debt_id')
                ->join('payment_types', 'payment_types.id', '=', 'debts.payment_type_id')
                ->where('debts.payment_type_id', $paymentType)
                ->where('installments.shopper_id', $this->dataSearch->shopper_id)
                ->where('due_date', '>=', $this->dataStart)
                ->where('due_date', '<=', $this->lastDueDate);

            $paymentTypeId = $query->distinct('payment_type_id')->pluck('payment_type_id')->toArray();
            $debts = $query->distinct('debt_id')->pluck('debt_id')->toArray();

            foreach ($paymentTypeId as $payType) {
                //$layout[$payType] = [];
                foreach ($debts as $debt) {
                    //$layout[$payType][$debt] = $months;
                    foreach ($months as $monthRef => $month) {
                        
                        $query = Installment::join('debts', 'debts.id', '=','installments.debt_id')
                            ->where('debt_id', $debt)
                            ->where('due_date', '>=', $monthRef.'-01')
                            ->where('due_date', '<=', $monthRef.'-31')
                            ->first();

                        $layout[$payType][$debt][$monthRef] = $query;                        
                    }
                }                
            }   
        }

        $reports['monts'] = array_keys($months);
        $reports['reports'] = $layout;

        return $reports;
    }

    public function getTotalValue($reportData)
    {
      /*   $totalValue = 0;

        foreach ($reportData as $item) {
            $totalValue += $item->value;
           
        }

        return $totalValue; */
    }
}