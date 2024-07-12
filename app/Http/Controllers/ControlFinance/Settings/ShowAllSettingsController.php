<?php

namespace App\Http\Controllers\ControlFinance\Settings;

use App\Http\Controllers\Controller;
use App\Models\ControlFinance\Category;
use App\Models\ControlFinance\PaymentType;
use App\Models\ControlFinance\Shopper;
use Illuminate\Http\Request;

class ShowAllSettingsController extends Controller
{
    public function __invoke(Request $request)
    {
        $data['categories'] = Category::all();
        $data['paymentTypes'] = PaymentType::all();
        $data['shoppers'] = Shopper::all();

        return view('control-finance.setting.all', $data);
    }
}
