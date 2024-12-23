<?php

namespace App\Http\Controllers\ControlFinance\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingInitialController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = [];
        $data['user'] = Auth::user();

        return view('control-finance.shopper-not-exist', $data);
    }
}
