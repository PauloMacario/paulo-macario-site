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
        if (! $request->status) {
            $request['status'] = "PP";
        }

        $data = [];
        $data['categories'] = Category::where('id', '>', 0)
            ->orderBy('order', 'asc')
            ->get();

        $data['paymentTypes'] = PaymentType::where('id', '>', 0)
            ->orderBy('order', 'asc')
            ->get();
            
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
        $data['shopperId'] = $request['shopper_id'];
        $data['payTypeId'] =  $request['payment_type_id'];
        $data['categoryId'] =  $request['category_id'];
        $data['installments'] = $installments;
        
        $totalValue = $this->getTotalValue($installments, $request->status);
       
        $data['total'] = $totalValue['total'];
        $data['calculation'] = $totalValue['calculation'];
      
        return view('control-finance.installment.all', $data);
    }

    public function getTotalValue($installments, $status)
    {
        $total = 0.0;
        $calculation = '';
        if (! $installments->count()) {
            $totalValue['total'] = $total;
            $totalValue['calculation'] = [];
            return $totalValue;
        }
        
        foreach ($installments as $installment) {

            if ($status && $installment->status == $status) {
                $calculation .= (string)$installment->value .'#';
                $total += $installment->value;
            } else if(! $status && $installment->status == "PP"){               
                $calculation .= (string)$installment->value.'#';
                $total += $installment->value;
            }            
        }

        $calculation .= '#' . (string)$total;

        $totalValue['total'] = $total; 

        $totalValue['calculation'] = explode('#', $calculation); 

        return $totalValue;
    }
}
