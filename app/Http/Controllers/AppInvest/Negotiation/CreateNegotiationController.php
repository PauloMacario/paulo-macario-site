<?php

namespace App\Http\Controllers\AppInvest\Negotiation;

use App\Http\Controllers\Controller;
use Rules\AppInvest\Negotiation\Create;
use Illuminate\Http\Request;

class CreateNegotiationController extends Controller
{
    public function __invoke(Request $request)
    {        
        $create = new Create();
        $response = $create->execute($request->all());

        $request->session()->flash($response['status'], $response['msg']);
        return redirect()->back();
    }
}
