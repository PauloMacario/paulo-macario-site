<?php

namespace App\Http\Controllers\ControlFinance;

use App\Http\Controllers\Controller;
use App\Models\ControlFinance\Category;
use App\Models\ControlFinance\PaymentType;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function getAllSettings()
    {
        $data['categories'] = Category::all();
        $data['paymentTypes'] = PaymentType::all();

        return view('control-finance.setting.all', $data);
    }
}
