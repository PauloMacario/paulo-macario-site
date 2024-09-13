<?php

namespace Rules\AppInvest\Negotiation;

use App\Models\AppInvest\Negotiation;
use Illuminate\Database\Eloquent\Builder;

class NegotiationsByFilters
{
    protected $filters;

    public function __construct($fiters)
    {
        $this->filters = (object)$fiters;
    }

    public function search()
    {   
        $limit = ($this->filters->per_page) ?? 100;

        $negotiations = Negotiation::where('id','>',0);
       
        if (isset($this->filters->month)) {
            $negotiations->whereMonth('date',  $this->filters->month);
        }

        if (isset($this->filters->year)) {
            $negotiations->whereYear('date',  $this->filters->year);
        }
        
        if (isset($this->filters->type_investment_id)) {

            $typeInvestmentId = $this->filters->type_investment_id;

            $negotiations->whereHas('investment', function (Builder $query) use ($typeInvestmentId) {                
                $query->where('type_investment_id', $typeInvestmentId);
            })->get();
        }

        if (isset($this->filters->type_negotiation)) {
            $negotiations->where('type_negotiation', $this->filters->type_negotiation);
        }
    
        return $negotiations
            ->limit($limit)
            ->get();
    }
}