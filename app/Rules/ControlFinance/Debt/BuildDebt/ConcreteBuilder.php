<?php

namespace Rules\ControlFinance\Debt\BuildDebt;

use App\Models\ControlFinance\PaymentType;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

class ConcreteBuilder implements DebtBuilder
{
    private $debt;

    private $data;

    public function __construct()
    {
        $this->reset();
    }

    public function reset()
    {
        $this->debt = new Debt();
    }

    public function buildDebt($data)
    {
        $this->data = $data;

        $this->data['debt']['number_installments'] = $this->data['debt']['number_installments'] ?? 1;
        $this->data['debt']['prorated_debt'] = 0;
        $this->data['debt']['date'] = $this->convertDate($this->data['debt']['date']);
        $this->data['debt']['total_value'] = $this->convertMoney($this->data['debt']['total_value']);
        $this->data['debt']['status'] = "E";

        $this->debt->parts['debt'] = $this->data['debt'];
    }

    public function buildInstalments()
    {
        $this->data['installments'] = [];

        $numberInstForCalculate = $this->data['debt']['number_installments'];

        if (Arr::exists($this->data, 'checkrateio')) {
            $numberInstForCalculate = count($this->data['checkrateio']) * $this->data['debt']['number_installments'];
        }

        $valueInstallment = $this->calculateInstallmentValue($this->data['debt']['total_value'], $numberInstForCalculate);

        $startDueDate = $this->generateDatesToInstallments();

        for ($i = 1 ; $i <= $this->data['debt']['number_installments'] ; $i++) {
            
            $dueDate = $startDueDate->format('Y-m-d');

            if ($i > 1) {
                $dueDate = $startDueDate->addMonth()->format('Y-m-d');

            }
          
            if (Arr::exists($this->data, 'checkrateio')) {

                $this->debt->parts['debt']['prorated_debt'] = 1;

                foreach ($this->data['checkrateio'] as $key => $shopper) {
                   
                    $fields = [
                        'debt_id' => null,
                        'shopper_id' => $key,
                        'number_installment' => $i,
                        'due_date' => $dueDate,
                        'value' => $valueInstallment,
                        'status' => "E"
                    ];

                    $this->data['installments'][] = $fields;
                }
            } else {
                $fields = [
                    'debt_id' => null,
                    'shopper_id' => $this->data['debt']['shopper_id'],
                    'number_installment' => $i,
                    'due_date' => $dueDate,
                    'value' => $valueInstallment,
                    'status' => "E"
                ];  
                
                $this->data['installments'][] = $fields;
            }

        }

        $this->debt->parts['installments'] = $this->data['installments'];
    }

    public function convertDate($date)
    {
        return Carbon::createFromFormat('Y-m-d', $date);
    }

    public function convertMoney($value)
    {
        $clenValue = Str::of($value)->remove('.');

        $valueConvert = Str::replaceFirst(',', '.', $clenValue);

        return $valueConvert;
    }

    public function calculateInstallmentValue($value, $numberInst)
    {
        return number_format($value / $numberInst, 2, '.', '');
    }

    public function generateDatesToInstallments()
    {
        $dateDebt = $this->data['debt']['date'];

        $paymenttypeId = $this->data['debt']['payment_type_id'];
        
        $paymentType = PaymentType::where('id', $paymenttypeId)
            ->where('installment_enable', 1)
            ->first();       

        if ($paymentType == null) {
            return $dateDebt;
        }
       
        $payDate = Carbon::createFromFormat('Y-m-d', $paymentType->next_payment);
      
        if ($dateDebt >= $paymentType->next_processing) {
            $nextPayment = Carbon::createFromFormat('Y-m-d', $paymentType->next_payment);
            $payDate = $nextPayment->addMonth();
        } 

        return $payDate;
    }

    public function getDebt()
    {        
        $debt = $this->debt;
        
        $this->reset();
        
        return $debt;
    }
}