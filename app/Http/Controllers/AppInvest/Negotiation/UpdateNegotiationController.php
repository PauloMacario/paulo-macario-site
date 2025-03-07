<?php

namespace App\Http\Controllers\AppInvest\Negotiation;

use App\Http\Controllers\Controller;
use Rules\AppInvest\Negotiation\Update;
use Illuminate\Http\Request;

class UpdateNegotiationController extends Controller
{
    public function __invoke(Request $request)
    {
        $dados = $request->except('id');
        $id = $request->id;

        $response = (new Update())->execute($dados, $id) ;
        
        $request->session()
            ->flash($response['status'], $response['msg']);

        return redirect()->back();
    }
}
