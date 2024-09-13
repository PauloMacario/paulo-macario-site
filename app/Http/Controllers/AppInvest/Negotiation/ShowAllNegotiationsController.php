<?php

namespace App\Http\Controllers\AppInvest\Negotiation;

use App\Http\Controllers\Controller;
use App\Models\AppInvest\TypeInvestment;
use Rules\AppInvest\Negotiation\NegotiationsByFilters;
use Illuminate\Http\Request;

class ShowAllNegotiationsController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = [];
        $data['year'] = $request['year'] ?? null;
        $data['month'] = $request['month'] ?? null;

        $data['typeInvestmentId'] = $request['type_investment_id'] ?? null;
        $data['typeNegotiation'] = $request['type_negotiation'] ?? null;
        $data['perPage'] = $request['per_page'] ?? null;
       
        $data['typeInvestments'] = TypeInvestment::where('id', '>', 0)
            ->orderBy('order', 'DESC')
            ->get();

        $negotiationsByFilters = new NegotiationsByFilters($request->all());
        $negotiations = $negotiationsByFilters->search();

        

        $data['negotiations'] = $negotiations;

        $totalValue = $this->getTotalValue($negotiations);

        $data['total'] = $totalValue['total'];
        $data['calculation'] = $totalValue['calculation'];

        return view('app-invest.negotiation.all', $data);
    }

    public function getTotalValue($negotiations)
    {
        $total = 0.0;
        $calculation = '';

        if (! $negotiations->count()) {
            $totalValue['total'] = $total;
            $totalValue['calculation'] = [];
            return $totalValue;
        }
        
        foreach ($negotiations as $negotiation) {
            $calculation .= (string)$negotiation->value .'#';
            $total += $negotiation->value;                  
        }

        $calculation .= '#' . (string)$total;

        $totalValue['total'] = $total; 

        $totalValue['calculation'] = explode('#', $calculation); 

        return $totalValue;
    }
}
