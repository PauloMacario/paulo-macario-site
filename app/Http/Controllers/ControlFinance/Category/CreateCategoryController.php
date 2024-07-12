<?php

namespace App\Http\Controllers\ControlFinance\Category;

use App\Http\Controllers\Controller;
use Rules\ControlFinance\Category\Create;
use Illuminate\Http\Request;

class CreateCategoryController extends Controller
{
    public function __invoke(Request $request)
    {
        $createCategory = new Create();
        $response = $createCategory->execute($request);

        $request->session()->flash($response['status'], $response['msg']);
        return redirect()->back();
    }
}
