<?php

namespace App\Http\Controllers\ControlFinance\Category;

use App\Http\Controllers\Controller;
use Rules\ControlFinance\Category\Create;
use Illuminate\Http\Request;

class CreateCategoryController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = $request->except('_token');
        $data['status'] = 'E';
        $data['user_id'] = auth()->user()->id;

        $createCategory = new Create();
        $response = $createCategory->execute($data);

        $request->session()->flash($response['status'], $response['msg']);
        return redirect()->back();
    }
}
