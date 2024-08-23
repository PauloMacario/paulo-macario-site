<?php

namespace Rules\ControlFinance\Payment;

use App\Models\ControlFinance\Installment;

class UpdateStatus
{
    public function execute($data)
    {   
        $installment = Installment::find($data->id);

        if (! $installment) {
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

        $installment->update(
            [
                "status" => $data->status
            ]
        );

       
        return [
            "title" => "Sucesso :)", 
            "icon" => "success" , 
            "msg" => "Status da parcela ({$installment->debt->locality}) atualizado.", 
            "statusCode" => 200
        ];
        
    }
}