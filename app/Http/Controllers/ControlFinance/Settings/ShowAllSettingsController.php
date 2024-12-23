<?php

namespace App\Http\Controllers\ControlFinance\Settings;

use App\Http\Controllers\Controller;
use App\Models\ControlFinance\Category;
use App\Models\ControlFinance\PaymentType;
use App\Models\ControlFinance\Shopper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShowAllSettingsController extends Controller
{
    public function __invoke(Request $request)
    {
        $userId = Auth::user()->id;

        $data['categories'] = Category::where('user_id', $userId)
            ->orderBy('order', 'ASC')
            ->get();
        $data['paymentTypes'] = PaymentType::where('user_id', $userId)
            ->orderBy('order', 'ASC')
            ->get();
        $data['shoppers'] = Shopper::where('user_id', $userId)
            ->orderBy('order', 'ASC')
            ->get();

        return view('control-finance.setting.all', $data);
    }
}
