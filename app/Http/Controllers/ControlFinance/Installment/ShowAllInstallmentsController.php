<?php

namespace App\Http\Controllers\ControlFinance\Installment;

use App\Http\Controllers\Controller;
use App\Models\ControlFinance\Category;
use App\Models\ControlFinance\PaymentType;
use App\Models\ControlFinance\Shopper;
use App\Models\ControlFinance\Installment;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ShowAllInstallmentsController extends Controller
{
    public function __invoke(Request $request)
    {
        $year = Carbon::now()->format("Y");
        $month = Carbon::now()->format("m");
        
        $data = [];
        $data['categories'] = Category::where('id', '>', 0)->orderBy('order', 'asc')->get();
        $data['paymentTypes'] = PaymentType::where('id', '>', 0)->orderBy('order', 'asc')->get();
        $data['shoppers'] = Shopper::all();
        $data['yearMonthRef'] = Carbon::now()->format('m/Y');

        if ($request['month']) {
            $month = $request->month;
            $year = $request->year;
            $data['yearMonthRef'] = "{$month}/{$year}";
        }

        $installments = Installment::whereYear('due_date', $year)
            ->whereMonth('due_date', $month)
            ->with('debt');

        if ($shopId = $request['shopper_id']) {
            $installments->where('shopper_id', $shopId);
        }

        if ($payTypeId = $request['payment_type_id']) {
            $installments->whereHas('debt', function (Builder $query) use ($payTypeId) {                
                $query->where('payment_type_id', $payTypeId);
            })->get();
        }
        
        $request->session()
            ->put('filters', $request->all());

        $data['year'] = $year;
        $data['month'] = $month;
        $data['shopperId'] = $shopId ?? 0;
        $data['payTypeId'] = $payTypeId ?? 0;
        $data['installments'] = $installments->get();
        $data['total'] = 0;
        
        return view('control-finance.installment.all', $data);
    }
}
