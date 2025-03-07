<?php

namespace App\Http\Controllers\AppInvest\Segment;

use App\Http\Controllers\Controller;
use Rules\AppInvest\Segment\Create;
use Illuminate\Http\Request;

class CreateSegmentController extends Controller
{
    public function __invoke(Request $request)
    {
        $response = (new Create())->execute($request->all());
       
        $request->session()
            ->flash($response['status'], $response['msg']);

        return redirect()->back();
    }
}
