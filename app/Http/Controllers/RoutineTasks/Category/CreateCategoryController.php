<?php

namespace App\Http\Controllers\RoutineTasks\Category;

use App\Http\Controllers\Controller;
use App\Models\RoutineTasks\Category;
use Illuminate\Http\Request;

class CreateCategoryController extends Controller
{
    
    public function __invoke(Request $request)
    {
        $dados = $request->except('_token');

        $category = Category::create($dados);
       
        if ($category) {

            $request->session()->flash('success', 'cadastrado!');
            return redirect()->back();
        }

        $request->session()->flash('error', 'Ocorreu um erro :(');
        return redirect()->back();
    }
}
