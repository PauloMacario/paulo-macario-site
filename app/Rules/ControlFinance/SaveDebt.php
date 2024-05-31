<?php

namespace Rules\ControlFinance;

use App\Models\ControlFinance\Debt;

class SaveDebt
{
    private $installment;
    
    public function __construct()
    {
        $this->installment = new SaveInstallment();
    }

    public function execute($data)
    {
        $data['debt']['total_value'] = Helper::convertValue($data['debt']['total_value']);
        $data['debt']['date'] = Helper::convertDate($data['debt']['date']);
        
        if (!isset($data['debt']['number_installments'])) {
            $data['debt']['number_installments'] = 1;
        }
        $debtSave = Debt::create($data['debt']);

        $partitions = (isset($data['checkrateio']) ? $data['checkrateio'] : null);

        $this->installment->execute($debtSave, $partitions);

    }
}