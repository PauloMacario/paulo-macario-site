<?php

namespace App\Http\Controllers\ControlFinance\Payment;

use App\Http\Controllers\Controller;
use Rules\ControlFinance\Payment\UpdateStatus;
use Illuminate\Http\Request;

class SaveAllPayTypesController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = new \stdClass();

        $dataResponse = [];

        $updateStatus = new UpdateStatus();

        foreach ($request->installments as $id) {
            $data->id = $id;
            $data->status = 'PM';

            $response = $updateStatus->execute($data);

            array_push($dataResponse, $response);
        }

        $response = [
            "title" => "Sucesso :)",
            "icon" => "success",
            "msg" => "Pagamento realizado.",
            "statusCode" => 200
        ];

        return response()->json($response);

    }
}
