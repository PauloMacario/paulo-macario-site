<?php

namespace Rules\ControlFinance;

use App\Models\ControlFinance\Installment;
use App\Models\ControlFinance\PaymentType;
use Illuminate\Support\Carbon;

class SaveInstallment
{
    private $modelInstallment;

    private $modelPaymentType;

    private $partition;

    public function __construct()
    {
        $this->modelInstallment = new Installment();

        $this->modelPaymentType = new PaymentType();

        $this->partition = new SavePartition();
    }

    public function execute($debt, $partitionShoppers)
    {
        $valueInstallment = $this->calculateValueInstallments($debt->total_value, $debt->number_installments);

        $payDate = $this->generateStartPayDate($debt);

        $installments = $this->generateInstallments($debt, $valueInstallment ,$payDate);

        foreach ($installments as $installment) {
            
            $installment = $this->modelInstallment->create($installment);

            $partitions = null;

            if ($partitionShoppers) {

                $valuePartition = $this->calculateValueInstallments($valueInstallment, count($partitionShoppers));
                $partitions = $this->generatePartitions($installment, $valuePartition, $partitionShoppers);
            }

            if ($partitions == null) {
                continue;
            }

            foreach ($partitions as $partition) {
                $this->partition->execute($partition);
            }
        }
    }

    public function calculateValueInstallments($value, $number)
    {
        $value = Helper::convertValue($value);

        $resul = $value / $number;

        return number_format($resul, 2, '.', '');
    }


    public function generateStartPayDate($debt)
    {
        $debtDate = Carbon::createFromFormat('Y-m-d H:i:s', $debt->date . ' 00:00:00');
        
        $dayDebt = Carbon::createFromFormat('Y-m-d', $debt->date)->format('d');

        $paymentType = $this->modelPaymentType::where('id', $debt->payment_type_id)
            ->where('processing_day', '>', 0)
            ->select('processing_day', 'payment_day')
            ->first();
        
        if ($paymentType == null) {
            return $debtDate;
        }

        $dueDate = Carbon::createFromFormat('Y-m-d', $debt->date)->format("Y-m");

        $paymentDate = Carbon::createFromFormat('Y-m-d', $dueDate . '-' . $paymentType->payment_day);

        if ($dayDebt >= $paymentType->processing_day) {
            return $paymentDate->addMonth(); 
        }

        return $paymentDate;
    }

    public function generateInstallments($debt, $valueInstallment, $payDate)
    {
        $installments = [];

        for ($i = 1 ; $i <= $debt->number_installments ; $i++  ) {

            $installments[$i] = [
                "debt_id" => $debt->id,
                "number_installment" => $i,
                "due_date" => ($i == 1) ? $payDate->format("Y-m-d") : $payDate->addMonth()->format("Y-m-d"),
                "value" => $valueInstallment,
                "status" => "E"
            ];
        } 

        return $installments;
    }

    public function generatePartitions($installment, $valuePartition, $partitionShoppers)
    {
      
        $partitions = [];

        foreach ($partitionShoppers as $id => $p) {
            
            $partition = [
                'shopper_id' => $id,
                'installment_id' => $installment->id,
                'value' => $valuePartition,
                'status' => "E"
            ];

            array_push($partitions, $partition);
        }

        return $partitions;
    }


}