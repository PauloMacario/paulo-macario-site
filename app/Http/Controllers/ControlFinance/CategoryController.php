<?php

namespace App\Http\Controllers\ControlFinance;

use App\Http\Controllers\Controller;
use App\Models\ControlFinance\Category;
use Rules\ControlFinance\Category\Update;
use Rules\ControlFinance\Category\Create;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /* public function newCategory()
    {
        return view('control-finance.category.new');
    } */

    /* public function postCategory(Request $request)
    {             
        $createCategory = new Create();
        $response = $createCategory->execute($request);

        $request->session()->flash($response['status'], $response['msg']);
        return redirect()->back();
    } */

   /*  public function getDetailCategory($id)
    {
        $data['category'] = Category::find($id);
        $data['categories'] = Category::where('status', 'E')->get();

        return view('control-finance.category.detail', $data);
    } */

   /*  public function postUpdateCategory(Request $request)
    {
        $updateCategory = new Update();
        $response = $updateCategory->execute($request);
       
        $request->session()->flash($response['status'], $response['msg']);

        return redirect()->back();
    } */
}
