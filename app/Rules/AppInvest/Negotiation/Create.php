<?php

namespace Rules\AppInvest\Negotiation;

use App\Models\AppInvest\Negotiation;
use Rules\AppInvest\Investment\Create as CreateInvestment;

class Create
{   
    public function execute($data)
    {
        if ($data['new-investment'] == "Y") {

            return $this->saveInvestmentAndNegotiation($data);
        }

        return $this->saveNegotiation($data);
    }
   
    public function saveNegotiation($data)
    {
        $dataNegotiation['investment_id'] = $data['investment-id'];
        $dataNegotiation['date'] = $data['date'];
        $dataNegotiation['type_negotiation'] = $data['type-negotiation'];
        $dataNegotiation['quantity'] = str_replace(',','.', $data['quantity']);
        $dataNegotiation['value'] = str_replace(',','.', $data['value']);

        $negociacao = Negotiation::create($dataNegotiation);

        if (!$negociacao) {
            return ["status" => "info" , "msg" => "Ocorreu algum erro.", "statusCode" => 400];
        }

        return ["status" => "success" , "msg" => "Nova negociação criada.", "statusCode" => 200];

    }

    public function saveInvestmentAndNegotiation($data)
    {     

        $dataInvest['name'] = $data['invest-name'];
        $dataInvest['type_investment_id'] = $data['invest-type'];
        $dataInvest['color'] = $data['invest-color'];

        $createInvestment = new CreateInvestment();
        $investment = $createInvestment->execute($dataInvest);

        $data['investment-id'] = $investment->id;

        return $this->saveNegotiation($data);        
    }
}