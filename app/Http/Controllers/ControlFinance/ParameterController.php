<?php

namespace App\Http\Controllers\ControlFinance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ControlFinance\Parameter;



class ParameterController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function postParam(Request $request)
    {
        $parameter = Parameter::where('key', 'DARK_MODE')
            ->select('value')
            ->first();

        $action = !$parameter->value == $request->dark;

        $parameter->value = ($action) ? '1' : '0';
        $parameter->save();

        return redirect()->back();

    }
}
