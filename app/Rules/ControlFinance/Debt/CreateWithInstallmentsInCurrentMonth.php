<?php

namespace Rules\ControlFinance\Debt;

use App\Models\ControlFinance\Debt;
use Rules\ControlFinance\Installment\Create;
use Rules\ControlFinance\Installment\InstallmentStructure;
use Illuminate\Support\Carbon;

class CreateWithInstallmentsInCurrentMonth
{
    protected $data;

    protected $debt;

    public function __construct($dataDebt)
    {
        $this->data = $dataDebt;
    }

    public function execute()
    {
        if (isset($this->data['checkrateio'])) {
            $this->data['prorated_debt'] = 1;
        }

        $this->debt = Debt::create($this->data);

        $startDate = Carbon::createFromFormat('Y-m-d', $this->debt->paymentType->next_payment);
      
        $installmentStructure = new InstallmentStructure($this->debt, $this->data);
        $installments = $installmentStructure->execute($startDate);

        if (! $installments) {
            return ["status" => "info" , "msg" => "Ocorreu algum erro ao montar o parcelamento.", "statusCode" => 400];
        }
        
        $installmetsCreated = (new Create($installments))->execute();
        
        if ($installmetsCreated) {
            return ["status" => "success" , "msg" => "Nova forma de pagamento criada.", "statusCode" => 200];
        }

        return ["status" => "info" , "msg" => "Ocorreu algum erro.", "statusCode" => 400];
    }
}