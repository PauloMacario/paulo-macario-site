<?php

namespace App\Http\Controllers\ControlFinance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ControlFinance\Category;
use App\Models\ControlFinance\PaymentType;
use App\Models\ControlFinance\Shopper;
use App\Models\ControlFinance\Debt;
use Illuminate\Support\Carbon;
use Rules\ControlFinance\Debt\BuildDebt\Create;
use Rules\ControlFinance\Debt\Update;
use Rules\ControlFinance\Debt\Delete;
class DebtController extends Controller
{
    public function getAllDebts(Request $request)
    {
        $data = [];
    
        $year = Carbon::now()->format("Y");
        $month = Carbon::now()->format("m");
        
        $data['yearMonthRef'] = Carbon::now()->format('m/Y');
        
        if ($request['month']) {
            $month = $request->month;
            $year = $request->year;
            $data['yearMonthRef'] = "{$month}/{$year}";
        }
      
        $data['debts'] = Debt::whereYear('date', $year)
        ->whereMonth('date', $month)
        ->orderBy('date', 'DESC')
        ->get();
        
        $request->session()
        ->put('filters', $request->all());
        
        $data['year'] = $year;
        $data['month'] = $month;
        
        $data['total'] = 0;
        
        return view('control-finance.debt.all', $data);
    }
    
    public function newDebt()
    {
        $data = [];
        $data['categories'] = Category::where('id', '>', 0)->orderBy('order', 'asc')->get();
        $data['paymentTypes'] = PaymentType::where('id', '>', 0)->orderBy('order', 'asc')->get();
        $data['shoppers'] = Shopper::all();
        
        return view('control-finance.debt.new', $data);
    }
    
    public function postDebt(Request $request)
    {        
        $dataDebt = $request->except('_token');
             
        $saveDebt = (new Create())->execute($dataDebt);

        if ($saveDebt) {
            $request->session()->flash('success', 'Compra adicionada!');
            return redirect()->route('debt_get');
        }

        $request->session()->flash('error', 'Occoreu um erro!');
        return redirect()->route('debt_get');
    }

    public function addInstallments(Request $request)
    {
        //to do
    }


    public function getDetailDebt($id)
    {
        $data = [];

        $data['categories'] = Category::where('id', '>', 0)->orderBy('order', 'asc')->get();
        $data['shoppers'] = Shopper::where('id', '>', 0)->orderBy('order', 'asc')->get();
        $data['paymentTypes'] = PaymentType::where('id', '>', 0)->orderBy('order', 'asc')->get();
        $data['debt'] = Debt::find($id);

        return view('control-finance.debt.detail', $data);
    }

    public function postUpdateDebt(Request $request)
    {
        $updateDebt = new Update();
        $response = $updateDebt->execute($request->except('_token'));
       
        $request->session()->flash($response['status'], $response['msg']);
        return redirect()->back();
    }

    public function postDeleteDebt(Request $request)
    {
        $filters = $request->session()->get('filters');
        $request->session()->forget('filters');

        $deleteDebt = new Delete();
        $response = $deleteDebt->execute($request->id);
       
        $request->session()->flash($response['status'], $response['msg']);
        return redirect()->action(
            [DebtController::class, 'getAllDebts'], $filters
        );
    }
}
