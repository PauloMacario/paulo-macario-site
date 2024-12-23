<?php

namespace App\Http\Controllers\ControlFinance\Installment;

use App\Http\Controllers\Controller;
use App\Models\ControlFinance\Category;
use App\Models\ControlFinance\Shopper;
use App\Models\ControlFinance\Installment;
use Illuminate\Http\Request;

class ShowInstallmentController extends Controller
{
    public function __invoke($id)
    {
        $data = [];

        $data['categories'] = Category::where('user_id', auth()->user()->id)
            ->orderBy('order', 'asc')
            ->get();

        $data['shoppers'] = auth()
            ->user()
            ->shoppers;
            
        $data['installment'] = Installment::find($id);

        return view('control-finance.installment.detail', $data);
    }
}
