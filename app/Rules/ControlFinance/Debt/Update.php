<?php

namespace Rules\ControlFinance\Debt;

use App\Models\ControlFinance\Debt;
use Rules\ControlFinance\Helpers\Money;

class Update
{
    public function execute($data)
    {   
        $debt = Debt::find($data['id']);

        if (!$debt) {
            return ["status" => "info" , "msg" => "Ocorreu algum erro.", "statusCode" => 400];
        }
        
        $debt->update([
                    "locality" => $data['locality'],
                    "locality_obs" =>  $data['locality_obs'],
                    "trade_name" =>  $data['trade_name'],
                    "category_id" => $data['category_id'],
                    "shopper_id" => $data['shopper_id'],
                    "date" => $data['date'],
                    "total_value" => Money::convertValue($data['total_value']),
                    "status" =>  $data['status']
                ]
            );

        return ["status" => "success" , "msg" => "Atualizado.", "statusCode" => 200];
    } 
}