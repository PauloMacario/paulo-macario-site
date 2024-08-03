<?php

namespace App\Http\Controllers\ControlFinance\Payment;

use App\Http\Controllers\Controller;
use Rules\ControlFinance\Payment\UpdateStatus;
use Illuminate\Http\Request;

class PayOneInstallmentController extends Controller
{
    public function __invoke(Request $request)
    {
        $updateStatus = new UpdateStatus();
        $response = $updateStatus->execute($request);

        return response()->json($response, $response['statusCode']);
    }
}
