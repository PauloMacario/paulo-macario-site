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
use Rules\ControlFinance\Installment\Update;
use Rules\ControlFinance\Installment\Delete;


class InstallmentController extends Controller
{
    public function getAllInstallments(Request $request)
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

    public function getDetailInstallment(Request $request, $id)
    {
        $data = [];

        $data['categories'] = Category::where('id', '>', 0)->orderBy('order', 'asc')->get();
        $data['shoppers'] = Shopper::where('id', '>', 0)->orderBy('order', 'asc')->get();
        $data['installment'] = Installment::find($id);

        return view('control-finance.installment.detail', $data);
    }

    public function postUpdateInstallment(Request $request)
    {
        $updateIsntallment = new Update();
        $response = $updateIsntallment->execute($request->except('_token'));
       
        $request->session()->flash($response['status'], $response['msg']);
        return redirect()->back();

    }

    public function postDeleteInstallment(Request $request)
    {
        $filters = $request->session()->get('filters');
        $request->session()->forget('filters');
        
        $deleteInstallment = new Delete();
        $response = $deleteInstallment->execute($request->id);
       
        $request->session()->flash($response['status'], $response['msg']);
        return redirect()->action(
            [InstallmentController::class, 'getAllInstallments'], $filters
        );
    }
}
