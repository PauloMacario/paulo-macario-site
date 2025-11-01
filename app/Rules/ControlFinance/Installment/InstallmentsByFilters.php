<?php

namespace Rules\ControlFinance\Installment;

use App\Models\ControlFinance\Installment;
use App\Models\ControlFinance\PaymentType;
use Illuminate\Database\Eloquent\Builder;

class InstallmentsByFilters
{
    protected $filters;

    public function __construct($fiters)
    {
        $this->filters = (object)$fiters;
    }

    public function search()
    {
        $installments = Installment::whereYear('due_date', $this->filters->year)
            ->with('debt');

        if (isset($this->filters->month)) {
            $installments->whereMonth('due_date',  $this->filters->month);
        }

        if (isset($this->filters->shopper_id)) {
            $installments->where('shopper_id', $this->filters->shopper_id);
        } else {
            $shoppersUser = auth()
                ->user()
                ->shoppers
                ->pluck('id')
                ->toArray();
                
            $installments->whereIn('shopper_id', $shoppersUser);
        }
    
        if (isset($this->filters->payment_type_id)) {

            $payTypeId = $this->filters->payment_type_id;
            
            $installments->whereHas('debt', function (Builder $query) use ($payTypeId) {                
                $query->where('payment_type_id', $payTypeId);
            })->get();
        }
    
        if (isset($this->filters->category_id)) {

            $categoryId = $this->filters->category_id;

            $installments->whereHas('debt', function (Builder $query) use ($categoryId) {                
                $query->where('category_id', $categoryId);
            })->get();
        }
    
        if (isset($this->filters->status) && $this->filters->status != '') {
            if (is_array($this->filters->status)) {
                $installments->whereIn('status', $this->filters->status);          
            } else {
                $installments->where('status', $this->filters->status);        
            }
        }

        return $installments->orderBy('order', 'DESC')->get();
    }

    public function getPaymentTypesOnMonth()
    {   
        $query = Installment::select('debts.payment_type_id')
            ->join('debts', 'installments.debt_id', '=', 'debts.id')
            ->join('payment_types', 'debts.payment_type_id', '=', 'payment_types.id')
            ->whereYear('due_date', $this->filters->year)
            ->whereMonth('due_date', $this->filters->month);

            if (isset($this->filters->shopper_id)) {
                $query->where('installments.shopper_id', $this->filters->shopper_id);
            } else {
                $shoppersUser = auth()
                    ->user()
                    ->shoppers
                    ->pluck('id')
                    ->toArray();
                    
                    $query->whereIn('installments.shopper_id', $shoppersUser);
            }

            
        $payTypes = $query->orderBy('installments.order', 'desc')->distinct()->pluck('payment_type_id')->toArray();
        
        $data = [];

        foreach ($payTypes as $key => $payType) {

            $itens = PaymentType::where('id', $payType)->first();

            $this->filters->payment_type_id = $payType;

            $data[$itens->description]['installments'] = $this->search()->toArray();

            $data[$itens->description]['total_installments'] = $this->totalCalculate($data[$itens->description]['installments']);
            
            $data[$itens->description]['color'] = $itens->color;

        }

        return $data;
    }

    public function totalCalculate($data)
    {
        $total = 0;

        foreach ($data as $key => $value) {
            $total += $value['value'];
        }

        return $total;
    }
}
