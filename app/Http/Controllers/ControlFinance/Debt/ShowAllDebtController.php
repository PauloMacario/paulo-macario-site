<?php

namespace App\Http\Controllers\ControlFinance\Debt;

use App\Http\Controllers\Controller;
use App\Models\ControlFinance\Category;
use App\Models\ControlFinance\PaymentType;
use App\Models\ControlFinance\Shopper;
use App\Models\ControlFinance\Debt;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class ShowAllDebtController extends Controller
{
    public function __invoke(Request $request)
    {      
        $data = [];
    
        $year = Carbon::now()->format("Y");
        $month = Carbon::now()->format("m");
        
        $data = [];
        $data['categories'] = Category::where('id', '>', 0)
            ->orderBy('order', 'asc')
            ->get();

        $data['paymentTypes'] = PaymentType::where('id', '>', 0)
            ->orderBy('order', 'asc')
            ->get();

        $data['shoppers'] = auth()
            ->user()
            ->shoppers;    

        $data['yearMonthRef'] = Carbon::now()->format('m/Y');
        
        if ($request['month']) {
            $month = $request->month;
            $year = $request->year;
            $data['yearMonthRef'] = "{$month}/{$year}";
        }
      
        $debts = Debt::whereYear('date', $year)
            ->whereMonth('date', $month)
            ->with('installments');
        
        if ($shopId = $request['shopper_id']) {
            $debts->where('shopper_id', $shopId);
        } else {
            $shoppersUser = auth()->user()->shoppers->pluck('id')->toArray();
            $debts->whereIn('shopper_id', $shoppersUser);
        }

        if ($payTypeId = $request['payment_type_id']) {
            $debts->where('payment_type_id', $payTypeId);
        }

        if ($categoryId = $request['category_id']) {
            $debts->where('category_id', $categoryId);
        }

        if ($status = $request['status']) {
            if ($status != '') {
                $debts->where('status', $status);
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
        $data['debts'] = $debts->get();
        $data['total'] = $this->getTotalValue($data['debts']);
        
        return view('control-finance.debt.all', $data);
    }

    public function getTotalValue($debts)
    {
        $total = 0.0;

        if (! $debts->count()) {
            return $total;
        }
        
        foreach ($debts as $debt) {
            $total += $debt->total_value;
        }

        return $total;
    }
}
