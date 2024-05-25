<?php

namespace App\Http\Controllers\ControlFinance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ControlFinance\Category;
use App\Models\ControlFinance\PaymentType;
use App\Models\ControlFinance\Shopper;
use App\Models\ControlFinance\Debt;
use App\Models\ControlFinance\Installment;
use Illuminate\Support\Carbon;
use Rules\ControlFinance\Debt\SaveDebt;
use Rules\ControlFinance\Debt\SaveDebtInstallments;

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
        $dataDebt = $request->except('_token');
        $existsInstallments = (array_key_exists('numberInstallments', $dataDebt));

        if ($existsInstallments) {

            dd(new SaveDebtInstallments());

            // Fazer fluxo do cálculo das parcelas
            // retornar view de confirmação/edição
        }

        dd(new SaveDebt());

        // salvar dívida s/ parcelas
        //retornar success ou error
    }

    public function postInstallmentDebt(Request $request)
    {
        $dataDebt = $request->except('_token');

        // fazer fluxo de salvar dívida com parcelamento
    }

    public function getAllDebts()
    {
        $month = Carbon::now()->format("Y-m");

        $data = [];
        $data['debts'] = Debt::whereBetween('date', [$month.'-01', $month.'-31'])
            ->get();
        
        $data['total'] = 0;
        
        return view('control-finance.debt.all-debts', $data);
    }
}
