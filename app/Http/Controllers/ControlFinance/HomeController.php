<?php

namespace App\Http\Controllers\ControlFinance;

use App\Http\Controllers\Controller;
use App\Models\ControlFinance\Category;
use App\Models\ControlFinance\Debt;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::where('status', 'E')->get();

        $data = [];
        
        $data['grafico'] = false;

        if ($categories->count() > 0) {
            $grafico = $this->graphData($categories);
            $data['grafico'] = true;
            $data['labels'] = $grafico['labels'];
            $data['data'] = $grafico['data'];
            $data['backgroundColor'] = $grafico['backgroundColor'];
        }

        return view('control-finance.home', $data);
    }

    protected function graphData($categories)
    {
        $data = [];

        $labels = "[";
        $data = "[";
        $backgroundColor = "[";

        foreach ($categories as $category) {
            $labels .= "'{$category->description}',";
            $data .= "'{$this->getAmountDebtsByCategory($category->id)}',";

            if (isset($category->style->color)) {
                $backgroundColor .= "'{$category->style->color}',";            
            } else {
                $backgroundColor .= "'#b5b5b5',";            
            }              
        }

        $labels = substr($labels,0,-1);
        $data = substr($data,0,-1);
        $backgroundColor = substr($backgroundColor,0,-1);

        $labels .= "]";
        $data .= "]";
        $backgroundColor .= "]";

        $grafico['labels'] = $labels;
        $grafico['data'] = $data;
        $grafico['backgroundColor'] = $backgroundColor;

        return $grafico;
    }

    protected function getAmountDebtsByCategory($categoryId)
    {
        $debts = Debt::where('category_id', $categoryId)->get();

        return $debts->count();
    }
}
