<?php

namespace App\Http\Controllers\ControlFinance\Payment;

use App\Http\Controllers\Controller;
use Rules\ControlFinance\Payment\GetInstallmetsByFilters;
use Rules\ControlFinance\Helpers\SearchFilters;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class ShowAllPayTypesController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = [];
    
        $request['month'] = ($request->month) ? $request->month : Carbon::now()->format("m");
        $request['year'] = ($request->year) ? $request->year : Carbon::now()->format("Y");
        
        $dataFilters = SearchFilters::get();

        $data = array_merge($data, $dataFilters);
           
        $data['paymentData'] = (new GetInstallmetsByFilters($request->all()))->execute();
       
        $request->session()
            ->put('filters', $request->all());        
       
        $data = array_merge($data, $request->all());
       
        return view('control-finance.payment.all-types', $data);
    }
}
