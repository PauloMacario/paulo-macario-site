<?php

namespace App\Http\Controllers\ControlFinance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ControlFinance\Category;
use App\Models\ControlFinance\PaymentType;
use App\Models\ControlFinance\Shopper;
use App\Models\ControlFinance\Debt;
use Illuminate\Support\Carbon;
use Rules\ControlFinance\Debt\Create;

class DebtController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function newDebt()
    {
        $data = [];
        $data['categories'] = Category::all();
        $data['paymentTypes'] = PaymentType::all();
        $data['shoppers'] = Shopper::all();

        return view('control-finance.debt.index', $data);
    }

    public function postDebt(Request $request)
    {
        dd($request->all());
        
        $dataDebt = $request->except('_token');
             
        $saveDebt = (new Create())->execute($dataDebt);

        if ($saveDebt) {
            $request->session()->flash('success', 'Compra adicionada!');
            return redirect()->route('debtAll_get');
        }

        $request->session()->flash('error', 'Occoreu um erro!');
        return redirect()->route('debtAll_get');
    }

    public function postInstallmentDebt(Request $request)
    {
        /* $dataDebt = $request->except('_token'); */

        // fazer fluxo de salvar dívida com parcelamento
    }

    public function getAllDebts(Request $request)
    {
        $data = [];

        $year = Carbon::now()->format("Y");
        $month = Carbon::now()->format("m");

        if ($request['month']) {
            $month = $request->month;
            $year = $request->year;
            $data['yearMonthRef'] = "{$month}/{$year}";
        }
      
        $data['debts'] = Debt::whereYear('date', $year)
            ->whereMonth('date', $month)
            ->orderBy('date', 'DESC')
            ->get();
        
        $data['year'] = $year;
        $data['month'] = $month;

        $data['total'] = 0;
        
        return view('control-finance.debt.all-debts', $data);
    }
}
