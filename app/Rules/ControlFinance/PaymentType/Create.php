<?php

namespace Rules\ControlFinance\PaymentType;

use App\Models\ControlFinance\PaymentType;
use Illuminate\Support\Carbon;

class Create
{
    public function execute($request)
    {
        if (isset($request->next_processing)) {
            $nextProcessing = Carbon::createFromFormat('Y-m-d', $request->next_processing);
            $previousProcessing = $nextProcessing->subMonth()->format('Y-m-d');
            $request['previous_processing'] = $previousProcessing;

            $dayProcessing = $nextProcessing->format('d');
            $request['processing_day'] = $dayProcessing;

        }

        if (isset($request->next_payment)) {
            $nextPayment = Carbon::createFromFormat('Y-m-d', $request->next_payment);
            $previousPayment = $nextPayment->subMonth()->format('Y-m-d');
            $request['previous_payment'] = $previousPayment;

            $dayPayment = $nextPayment->format('d');
            $request['payment_day'] = $dayPayment;
        }

        $newPaymentType = PaymentType::create($request->except('_token'));

        if (!$newPaymentType) {
            return ["status" => "info" , "msg" => "Ocorreu algum erro.", "statusCode" => 400];
        }

        return ["status" => "success" , "msg" => "Nova forma de pagamento criada.", "statusCode" => 200];
    }
}