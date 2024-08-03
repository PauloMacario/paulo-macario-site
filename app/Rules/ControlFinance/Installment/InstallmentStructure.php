<?php

namespace Rules\ControlFinance\Installment;

use App\Models\ControlFinance\Debt;
use Illuminate\Support\Carbon;

class InstallmentStructure
{
    protected $debt;

    protected $data;

    protected $startDate;

    public function __construct(Debt $debt, array $data)
    {
        $this->debt = $debt;

        $this->data = $data;
    }

    private function setStartDate($startDate)
    {
        $this->startDate = $startDate;
    }

    public function execute($startDate)
    {
        $this->setStartDate($startDate);

        if (isset($this->data['checkrateio'])) {
            return $this->mountProrateInstallments();
        }

        return $this->mountSimpleInstallments();
    }

    public function mountSimpleInstallments()
    {
       
        $installments = collect([]);

        $valueInstallment = $this->generateValue();

        for ($item = 1; $item <= $this->debt->number_installments ; $item++) { 

            if ($item > 1) {
                $this->startDate->addMonth();
            }

            $installment = [
                'debt_id' => $this->debt->id, 
                'shopper_id' => $this->debt->shopper_id,
                'number_installment' => $item,
                'due_date' => $this->startDate->format('Y-m-d'),
                'value' => $valueInstallment,
                'status' => 'PP',
            ];
            
            $installments->push($installment);
        }

        return $installments;
    }

    public function mountProrateInstallments()
    {
        $baseSimpleInstallments = $this->mountSimpleInstallments();

        $proRatedInstallments = collect([]);

        foreach ($this->data['checkrateio'] as $shopperId => $on) {
            foreach ($baseSimpleInstallments as $installment) {
                $installment['shopper_id'] = $shopperId;

                $proRatedInstallments->push($installment);
            }
        }

        return $proRatedInstallments;
    }

    public function generateValue()
    {
        if (! $this->debt->number_installments) {
            return $this->debt->total_value;
        }

        if (isset($this->data['checkrateio'])) {
            return ( 
                $this->debt->total_value / count($this->data['checkrateio'])
                ) 
                / $this->debt->number_installments;
        }

        return $this->debt->total_value / $this->debt->number_installments;
    }
}