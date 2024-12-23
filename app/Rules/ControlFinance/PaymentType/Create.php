<?php

namespace Rules\ControlFinance\PaymentType;

use App\Models\ControlFinance\PaymentType;
use Illuminate\Support\Carbon;

class Create
{
    public function execute($data)
    {
        if (isset($data['next_processing'])) {
            $nextProcessing = Carbon::createFromFormat('Y-m-d', $data['next_processing']);
            $previousProcessing = $nextProcessing->subMonth()->format('Y-m-d');
            $data['previous_processing'] = $previousProcessing;

            $dayProcessing = $nextProcessing->format('d');
            $data['processing_day'] = $dayProcessing;

        }

        if (isset($data['next_payment'])) {
            $nextPayment = Carbon::createFromFormat('Y-m-d', $data['next_payment']);
            $previousPayment = $nextPayment->subMonth()->format('Y-m-d');
            $data['previous_payment'] = $previousPayment;

            $dayPayment = $nextPayment->format('d');
            $data['payment_day'] = $dayPayment;
        }

        $newPaymentType = PaymentType::create($data);

        if (!$newPaymentType) {
            return ["status" => "info" , "msg" => "Ocorreu algum erro.", "statusCode" => 400];
        }

        return ["status" => "success" , "msg" => "Nova forma de pagamento criada.", "statusCode" => 200];
    }
}