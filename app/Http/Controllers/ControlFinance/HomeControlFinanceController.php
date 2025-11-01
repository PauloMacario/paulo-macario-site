<?php

namespace App\Http\Controllers\ControlFinance;

use App\Http\Controllers\Controller;
use App\Models\ControlFinance\Category;
use App\Models\ControlFinance\Debt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Rules\ControlFinance\Installment\InstallmentsByFilters;

class HomeControlFinanceController extends Controller
{
    public function index(Request $request)
    {
        $data = [];
        $data['filter'] = '';
       
        if (!empty($request->all())) {
            $data['filter'] = 'show';
        }

        $data['filters'] = false;
            
        $data['shoppers'] = auth()->user()->shoppers;
        
        $year = now()->format("Y");
        $month = now()->format("m");
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
        $installments = $installmentsByFilters->getPaymentTypesOnMonth();
              
        $request->session()
            ->put('filters', $request->all());

        $data['year'] = $year;
        $data['month'] = $month;
        $data['yearMonthRef'] = $yearMonthRef;       
        $data['shopperId'] = $request['shopper_id'];       
        $data['installments'] = $installments;
       
        $data['total'] = $this->getTotalValue($installments, $request->status);
        $data['renda'] = 5100.00;
        
        return view('control-finance.home', $data);
    }

    public function getTotalValue($installments, $status)
    {
        $total = 0.0;

        if (count($installments) == 0) {
            $totalValue['total'] = $total;
            $totalValue['calculation'] = [];
            return $totalValue;
        }
        
        foreach ($installments as $installment) {
            $total += $installment['total_installments'];
        }

        return $total;
    }

    public function graphicPerCategories()
    {
        $categories = Category::where('user_id', auth()->user()->id)
            ->where('status', 'E')
            ->get();

        $data = [];
        
        foreach ($categories as $key => $category) {
            $data['labels'][$key] = $category->description;
            $data['data'][$key] = $this->getAmountDebtsByCategory($category->id);
            $data['backgroundColor'][$key] = (isset($category->color)) ? $category->color : '#cdcdcd';
        }

        return $data;
    }

    public function graphicPerCategoriesDebtsSumValues()
    {
        $categories = Category::where('user_id', auth()->user()->id)
            ->where('status', 'E')
            ->get();

        $data['graficoValue'] = false;

        if ($categories->count() > 0) {
            $graficoValue = $this->graphValueData($categories);      
            
            return $graficoValue;
        }

        return false;
    }
    
    protected function getAmountDebtsByCategory($categoryId)
    {
        $debts = Debt::where('category_id', $categoryId)->get();

        return $debts->count();
    }

    protected function graphData($categories)
    {
        $data = [];

        foreach ($categories as $key => $category) {
            $data['labels'][$key] = $category->description;
            $data['data'][$key] = $this->getAmountDebtsByCategory($category->id);
            $data['backgroundColor'][$key] = (isset($category->color)) ? $category->color : '#cdcdcd';
        }

        return $data;
    }

    protected function graphValueData($categories)
    {
        foreach ($categories as $key => $category) {
            
            $data['labels'][$key] = $category->description;

            $data['backgroundColor'][$key] = (isset($category->color)) ? $category->color : '#cdcdcd';
        }

        foreach ($categories as $key => $category) {

            $debtsSum = DB::select(
                "
                SELECT SUM(total_value) AS TOTAL FROM control_finance.debts WHERE category_id = {$category->id}
                "
            );            

            $data['data'][$key] = ($debtsSum[0]->TOTAL) ?? 0;
        }
       
        return $data;
    }
}
