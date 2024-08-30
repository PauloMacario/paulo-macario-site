<?php

namespace App\Http\Controllers\ControlFinance\Installment;

use App\Http\Controllers\Controller;
use App\Models\ControlFinance\Category;
use App\Models\ControlFinance\PaymentType;
use App\Models\ControlFinance\Shopper;
use Rules\ControlFinance\Installment\InstallmentsByFilters;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class ShowAllInstallmentsController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = [];
        $data['categories'] = Category::where('id', '>', 0)->orderBy('order', 'asc')->get();
        $data['paymentTypes'] = PaymentType::where('id', '>', 0)->orderBy('order', 'asc')->get();
        $data['shoppers'] = Shopper::all();
        
        $year = Carbon::now()->format("Y");
        $month = Carbon::now()->format("m");
        $yearMonthRef = '';

        if ($request->year) {
            $year = $request->year;
            $yearMonthRef = "/{$year}";
        }

        if ($request->year && !$request->month) {
            $month = null;
        }

        if ($request->year && $request->month) {
            $year = $request->year;
            $month = $request->month;

            $yearMonthRef = '/'.$month . $yearMonthRef;
        }

        if (!$request->year && !$request->month) {
            $request['year'] = $year;
            $request['month'] = $month;
        }

        

        $installmentsByFilters = new InstallmentsByFilters($request->all());
        $installments = $installmentsByFilters->search();
              
        $request->session()
            ->put('filters', $request->all());

        $data['year'] = $year;
        $data['month'] = $month;
        $data['yearMonthRef'] = $yearMonthRef;
        $data['status'] = $request->status;
        $data['shopperId'] = $request['shopper_id'] ?? 0;
        $data['payTypeId'] =  $request['payment_type_id'] ?? 0;
        $data['categoryId'] =  $request['category_id'] ?? 0;
        $data['installments'] = $installments;
        $data['total'] = $this->getTotalValue($data['installments']);
        
        return view('control-finance.installment.all', $data);
    }

    public function getTotalValue($installments)
    {
        $total = 0.0;

        if (! $installments->count()) {
            return $total;
        }
        
        foreach ($installments as $installment) {
            $total += $installment->value;
        }

        return $total;
    }
}
