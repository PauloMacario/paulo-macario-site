<?php

namespace App\Http\Controllers\ControlFinance\Installment;

use App\Http\Controllers\Controller;
use Rules\ControlFinance\Installment\Order;
use Illuminate\Http\Request;

class OrderInstallmentController extends Controller
{
    public function __invoke(Request $request)
    {                       
        $orderInstallment = new Order($request->except('_token'));
        
        try {
            $response = $orderInstallment->execute();

            return response()->json(["success" => "salvo com sucesso" ], 200);

        } catch (\Exception $e) {
            return response()->json(["error" => $e->getMessage() ], 400);
        }
    }
}
