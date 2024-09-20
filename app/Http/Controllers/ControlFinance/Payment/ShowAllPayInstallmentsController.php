<?php

namespace App\Http\Controllers\ControlFinance\Payment;

use App\Http\Controllers\Controller;
use App\Models\ControlFinance\Installment;
use App\Models\ControlFinance\Category;
use App\Models\ControlFinance\PaymentType;
use App\Models\ControlFinance\Shopper;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class ShowAllPayInstallmentsController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = [];
    
        $year = Carbon::now()->format("Y");
        $month = Carbon::now()->format("m");
        
        $data = [];
        $data['categories'] = Category::where('id', '>', 0)->orderBy('order', 'asc')->get();
        $data['paymentTypes'] = PaymentType::where('id', '>', 0)->orderBy('order', 'asc')->get();
        $data['shoppers'] = auth()->user()->shoppers;

        $data['yearMonthRef'] = Carbon::now()->format('m/Y');

        if($request['month']) {
            $month = $request->month;
            $year = $request->year;
            $data['yearMonthRef'] = "{$month}/{$year}";
        }

        $installments = Installment::whereYear('due_date', $year)
            ->whereMonth('due_date', $month)
            ->with('debt');

        if ($shopId = $request['shopper_id']) {
            $installments->where('shopper_id', $shopId);
        } else {
            $shoppersUser = auth()->user()->shoppers->pluck('id')->toArray();
            $installments->whereIn('shopper_id', $shoppersUser);
        }

        if ($payTypeId = $request['payment_type_id']) {
            $installments->whereHas('debt', function (Builder $query) use ($payTypeId) {                
                $query->where('payment_type_id', $payTypeId);
            })->get();
        }

        if ($status = $request['status']) {
            if ($status != '') {
                $installments->where('status', $status);
            }
        }
        
        $request->session()
            ->put('filters', $request->all());
        
        $data['year'] = $year;
        $data['month'] = $month;
        $data['status'] = $request->status;
        $data['shopperId'] = $shopId ?? 0;
        $data['payTypeId'] = $payTypeId ?? 0;
        $data['categoryId'] = $categoryId ?? 0;
        $data['installments'] = $installments->paginate(50);
        
        return view('control-finance.payment.all-installments', $data);
    }
}
