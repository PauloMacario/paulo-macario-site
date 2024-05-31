<?php

namespace Rules\ControlFinance\Debt;

use App\Models\ControlFinance\PaymentType;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

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
        $this->data['debt']['date'] = $this->convertDate($this->data['debt']['date']);
        $this->data['debt']['total_value'] = $this->convertMoney($this->data['debt']['total_value']);
        $this->data['debt']['status'] = "E";

        $this->debt->parts['debt'] = $this->data['debt'];
    }

    public function buildInstalments()
    {
        $this->data['installments'] = [];

        $valueInstallment = $this->calculateInstallmentOrPartition($this->data['debt']['total_value'], $this->data['debt']['number_installments']);

        $startDueDate = $this->generateDatesToInstallments();

        for ($i = 1 ; $i <= $this->data['debt']['number_installments'] ; $i++) {
            $fields = [
                'debt_id' => null,
                'number_installment' => $i,
                'due_date' => $startDueDate,
                'value' => $valueInstallment,
                'status' => "E"
            ];  
            
            $this->data['installments'][] = $fields;
        }

        $this->debt->parts['installments'] = $this->data['installments'];
    }

    public function buildPartitions()
    {
        foreach ($this->debt->parts['installments'] as $installment) {

            $valuePartition = $this->calculateInstallmentOrPartition($installment['value'], count($this->data['checkrateio']));
           
            foreach ($this->data['checkrateio'] as $shopper => $s) {
                $fields[$shopper][$installment['number_installment']] = [
                    "shopper_id" => $shopper,
                    "installment_id" => null,
                    "value" => $valuePartition,
                    "status" => "E"
                ];

                $this->data['partitions'] = $fields;
            }
        }

        $this->debt->parts['partitions'] = $this->data['partitions'];
    }

    public function convertDate($date)
    {
        return Carbon::createFromFormat('d/m/Y', $date);
    }

    public function convertMoney($value)
    {
        $clenValue = Str::of($value)->remove('.');

        $valueConvert = Str::replaceFirst(',', '.', $clenValue);

        return $valueConvert;
    }

    public function calculateInstallmentOrPartition($value, $numberInst)
    {
        return number_format($value / $numberInst, 2, '.', '');
    }

    public function generateDatesToInstallments()
    {
        $date = $this->data['debt']['date'];

        $paymenttypeId = $this->data['debt']['payment_type_id'];
        
        $paymentType = PaymentType::where('id', $paymenttypeId)
            ->where('installment_enable', 1)
            ->first();

        if ($paymentType == null) {
            return $date;
        }

        $yearMonth = $date->format('Y-m');

        $payDay = $paymentType->payment_day;

        $processingDay = $paymentType->processing_day;

        $payDate = Carbon::createFromFormat('Y-m-d H:i:s', $yearMonth . '-' . $payDay . ' 00:00:00');

        $processingDate = Carbon::createFromFormat('Y-m-d H:i:s', $yearMonth . '-' . $processingDay . ' 00:00:00');

        if ($date->timestamp < $processingDate->timestamp) {
            return $payDate;
        }

        return $payDate->addMonth();
    }

    public function getDebt()
    {        
        $debt = $this->debt;
        
        $this->reset();
        
        return $debt;
    }
}