<?php

namespace App\Http\Controllers\ControlFinance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ControlFinance\Category;
use App\Models\ControlFinance\PaymentType;
use App\Models\ControlFinance\Shopper;
use App\Models\ControlFinance\Installment;
use App\Models\ControlFinance\Debt;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;


class InstallmentController extends Controller
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

    public function getAllInstallments(Request $request)
    {
        $data = [];
        $data['categories'] = Category::all();
        $data['paymentTypes'] = PaymentType::all();
        $data['shoppers'] = Shopper::all();

        $year = Carbon::now()->format("Y");
        $month = Carbon::now()->format("m");

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


        //dd($installments);


        if ($payTypeId = $request['payment_type_id']) {
            $installments->whereHas('debt', function (Builder $query) use ($payTypeId) {                
                $query->where('payment_type_id', $payTypeId);
            })->get();
        }
 
        $data['year'] = $year;
        $data['month'] = $month;
        $data['shopperId'] = $shopId ?? 0;
        $data['payTypeId'] = $payTypeId ?? 0;

        $data['installments'] = $installments->get();

        $data['total'] = 0;
        
        return view('control-finance.installment.all-installments', $data);
    }
}
/* 

$query = Installment::join('debts', 'debts.id', '=', 'installments.debt_id')
            ->join('shoppers', 'shoppers.id', '=', 'debts.shopper_id')
            ->join('payment_types', 'payment_types.id', '=', 'debts.payment_type_id')
            ->join('categories', 'categories.id', '=', 'debts.category_id')
            ->select(
                'installments.id AS int_id',
                'installments.number_installment AS int_number',
                'installments.due_date AS int_due_date',
                'installments.value AS inst_val',
                'installments.status AS inst_status',
                'debts.id AS debt_id',
                'debts.category_id AS debt_category ',
                'debts.payment_type_id AS debt_pay',
                'debts.shopper_id AS debt_Shop',
                'debts.date AS debt_date',
                'debts.locality AS debt_local',
                'debts.total_value AS debt_total',
                'debts.number_installments AS debt_number',
                'debts.status AS debt_status',
                'shoppers.name AS shop_name',
                'payment_types.description AS pay_desc',
                'payment_types.processing_day AS pay_proccess',
                'payment_types.payment_day AS pay_payment',
                'categories.description AS categ_desc'
                )
            ->whereYear('due_date', $year)
            ->whereMonth('due_date', $month);

        if ($shopId = $request['shopper_id']) {
            $query->where('debts.shopper_id', $shopId);
        }

        if ($payTypeId = $request['payment_type_id']) {
            $query->where('debts.payment_type_id', $payTypeId);
        }
        
dd($query->count());
        $installments = $query->get();
         */
