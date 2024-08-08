<?php

namespace App\Http\Controllers\ControlFinance;

use App\Http\Controllers\Controller;
use App\Models\ControlFinance\Category;
use App\Models\ControlFinance\Debt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeControlFinanceController extends Controller
{
    public function index()
    {
        return view('control-finance.home');
    }

    public function graphicPerCategories()
    {
        $categories = Category::where('status', 'E')->get();

        $data = [];
        
        foreach ($categories as $key => $category) {
            $data['labels'][$key] = $category->description;
            $data['data'][$key] = $this->getAmountDebtsByCategory($category->id);
            $data['backgroundColor'][$key] = (isset($category->style->color)) ? $category->style->color : '#cdcdcd';
        }

        return $data;
    }

    public function graphicPerCategoriesDebtsSumValues()
    {
        $categories = Category::where('status', 'E')->get();

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
            $data['backgroundColor'][$key] = (isset($category->style->color)) ? $category->style->color : '#cdcdcd';
        }

        return $data;
    }

    protected function graphValueData($categories)
    {
        foreach ($categories as $key => $category) {
            
            $data['labels'][$key] = $category->description;

            $data['backgroundColor'][$key] = (isset($category->style->color)) ? $category->style->color : '#cdcdcd';
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
