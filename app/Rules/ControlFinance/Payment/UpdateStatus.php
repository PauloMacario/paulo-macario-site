<?php

namespace Rules\ControlFinance\Payment;

use App\Models\ControlFinance\Installment;
use App\Models\ControlFinance\Debt;

class UpdateStatus
{
    protected $installment;

    public function execute($data)
    {  
        $this->installment = Installment::find($data->id);

        if (! $this->installment) {
            
            return [
                "title" => "Algo deu errado :(", 
                "icon" => "error" , 
                "msg" => "Parcela nao encontrada.", 
                "statusCode" => 404
            ];
        }

        if (!isset($data->status)) {
            
            return [
                "title" => "Algo deu errado :(", 
                "icon" => "error" , 
                "msg" => "Nenhuma ação foi selecionada.", 
                "statusCode" => 400
            ];
        }

        $this->installment->update(
            [
                "status" => $data->status
            ]
        );

        $this->updateDebtStatus();

        return [
            "title" => "Sucesso :)", 
            "icon" => "success" , 
            "msg" => "Status da parcela ({$this->installment->debt->locality}) atualizado.", 
            "statusCode" => 200
        ];
        
    }

    private function updateDebtStatus()
    {
        $installments = Installment::where('debt_id', $this->installment->debt->id)
            ->where('status', 'PP')
            ->get();

        if ($installments->count() == 0) {
            $this->installment->debt->update([
                'status' => 'PM'
            ]);

            return;
        }

        $this->installment->debt->update([
            'status' => 'PP'
        ]);

    }
}