<?php

namespace App\Http\Controllers\ControlFinance\Category;

use App\Http\Controllers\Controller;
use Rules\ControlFinance\Category\Update;
use Illuminate\Http\Request;

class UpdateCategoryController extends Controller
{
    public function __invoke(Request $request)
    {
        $updateCategory = new Update();
        $response = $updateCategory->execute($request);
       
        $request->session()->flash($response['status'], $response['msg']);
        return redirect()->back();
    }
}
