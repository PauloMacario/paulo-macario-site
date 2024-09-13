<?php

namespace App\Http\Controllers\AppInvest\Negotiation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Rules\AppInvest\Negotiation\Create;

class CreateNegotiationController extends Controller
{
    
    public function __invoke(Request $request)
    {   

        $saveNegotiation = new Create();
        $response = $saveNegotiation->execute($request->all());

        $request->session()->flash($response['status'], $response['msg']);
        return redirect()->route('negotiationNew_get');
    }
}
