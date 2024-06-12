<?php

namespace App\Http\Controllers\ControlFinance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ControlFinance\Category;
use App\Models\ControlFinance\PaymentType;
use App\Models\ControlFinance\Shopper;
use App\Models\ControlFinance\Installment;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Rules\ControlFinance\Installment\UpdateInstallment;


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

    public function getDetailInstallment($id)
    {
        $data = [];

        $data['categories'] = Category::all();
        $data['shoppers'] = Shopper::all();

        $data['installment'] = Installment::find($id);

        return view('control-finance.installment.detail-installments', $data);
    }

    public function postUpdateInstallment(Request $request)
    {
        $updateIsntallment = new UpdateInstallment();
        $response = $updateIsntallment->execute($request->except('_token'));
       
        $request->session()->flash($response['status'], $response['msg']);

        return redirect()->back();

    }
}
