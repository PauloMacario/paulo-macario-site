@extends('adminlte::page')

@push('css')
    <style>
        a {
            color: rgb(20, 20, 20);
            text-decoration: none;
        }

        a:hover {
            color: #3d9970;
        }

        .font-10 {
            font-size: 10px;
        }
        .font-12 {
            font-size: 12px;
        }
        .font-14 {
            font-size: 14px;
        }
        .font-16 {
            font-size:16px;
        }
        .font-18 {
            font-size: 18px;
        }
        .font-20 {
            font-size: 20px;
        }
        .font-22 {
            font-size: 22px;
        }
        .value-paid {
            color: #b4b4b4;
            text-decoration: line-through;
        }
    </style>
@endpush


@section('title', 'Dívidas')

@section('content_header')
    @include('control-finance.components.alerts')
@stop

@section('content')
    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card card-olive mb-0">
                    <div class="card-header">
                        <h5 class="card-title">Compras do mês:<strong class="ml-2">{{ $yearMonthRef }}</strong></h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xs-12 col-md-10 col-lg-8">
                                <p class="text-right">
                                    <button class="btn bg-olive" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                      filtros
                                      <i class="fas fa-filter"></i>
                                    </button>
                                </p>
                                <div class="collapse" id="collapseExample">
                                    <div class="card card-body">
                                        <form action="{{ route('debtAllMonth_post') }}" method="GET">
                                            <div class="row">
                                                <div class="col-xs-12 col-md-2">
                                                    <div class="form-group">                                                                      
                                                        <select class="form-control" name="month" id="">
                                                            <option value="01" @if($month == '01') selected @endif>Jan</option>
                                                            <option value="02" @if($month == '02') selected @endif>Fev</option>
                                                            <option value="03" @if($month == '03') selected @endif>Mar</option>
                                                            <option value="04" @if($month == '04') selected @endif>Abr</option>
                                                            <option value="05" @if($month == '05') selected @endif>Mai</option>
                                                            <option value="06" @if($month == '06') selected @endif>Jun</option>
                                                            <option value="07" @if($month == '07') selected @endif>Jul</option>
                                                            <option value="08" @if($month == '08') selected @endif>Ago</option>
                                                            <option value="09" @if($month == '09') selected @endif>Set</option>
                                                            <option value="10" @if($month == '10') selected @endif>Out</option>
                                                            <option value="11" @if($month == '11') selected @endif>Nov</option>
                                                            <option value="12" @if($month == '12') selected @endif>Dez</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-md-2">
                                                    <div class="form-group">                                                                      
                                                        <select class="form-control" name="year" id="">
                                                            <option value="2020" @if($year == '2020') selected @endif>2020</option>
                                                            <option value="2021" @if($year == '2021') selected @endif>2021</option>
                                                            <option value="2022" @if($year == '2022') selected @endif>2022</option>
                                                            <option value="2023" @if($year == '2023') selected @endif>2023</option>
                                                            <option value="2024" @if($year == '2024') selected @endif>2024</option>
                                                            <option value="2025" @if($year == '2025') selected @endif>2025</option>
                                                            <option value="2026" @if($year == '2026') selected @endif>2026</option>
                                                            <option value="2027" @if($year == '2027') selected @endif>2027</option>
                                                            <option value="2028" @if($year == '2028') selected @endif>2028</option>
                                                            <option value="2029" @if($year == '2029') selected @endif>2029</option>
                                                            <option value="2030" @if($year == '2030') selected @endif>2030</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-md-3 col-lg-3">            
                                                    <div class="form-group">
                                                        <button class="btn bg-olive btn-block">
                                                            Filtrar
                                                            <i class="fas fa-search"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-md-3 col-lg-3">            
                                                    <div class="form-group">
                                                        <a href="{{ route('debtAll_get') }}" class="btn bg-warning btn-block">
                                                            Limpar
                                                            <i class="fas fa-broom"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-md-10 col-lg-8">
                                <table class="table table-sm table-borderless ">        
                                    @foreach ( $debts as $debt  )
                                    @php
                                        $total += $debt->total_value
                                    @endphp
                                    <tr>
                                        <td class="font-italic text-left font-12" width="35%">{{ $debt->paymentType->description }}</td>
                                        <td class="font-italic text-center font-12" width="35%" 
                                            @if(isset($debt->category->style->color))
                                                style="color:{{ $debt->category->style->color }};"    
                                            @endif
                                        >
                                            {{ $debt->category->description }}
                                        </td>
                                        <td class="font-italic text-center font-12" width="30%">{{ formatDateBR($debt->date) }}</td>
                                    </tr>
                                    <tr >
                                        <td colspan="2" class="font-weight-bold text-left font-14">
                                            <a href="{{ route('detailDebt_get', ['id' => $debt->id]) }}">
                                                {{ $debt->locality }}
                                                <span class="ml-2">
                                                    @if ($debt->number_installments > 1)
                                                        em {{ $debt->number_installments }} x
                                                    @endif
                                                </span>
                                            </a>
                                        </td>
                                        <td class="font-weight-bold text-center font-14 @if($debt->status == 'PM') value-paid @endif">
                                            R$ {{ formatMoneyBR($debt->total_value) }}
                                            @if($debt->status == 'PM')                                              
                                                <img src="{{ asset('./img/paid_red.png') }}" alt="" width="20px" height="20px">
                                            @endif
                                        </td>
                                    </tr>
                                    @if ($debt->prorated_debt == 1)                                
                                        <tr>
                                            <td class="font-italic text-left font-12">{{ $debt->shopper->name }}</td>
                                            <td class="font-weight-bold font-italic text-center text-info font-12"><i class="fas fa-users"></i>Rateio</td>
                                        </tr> 
                                    @else
                                        <tr>
                                            <td class="font-italic text-left font-12">{{ $debt->shopper->name }}</td>                                           
                                        </tr> 
                                    @endif  
                                        <tr>
                                            <td colspan="3" {{-- class="bg-teal" --}} style="background-color:#3d997054;"></td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-xs-12 col-md-10 col-lg-8">
                                <table class="table table-sm table-striped">
                                    <tr>
                                        <th colspan="4"><h4 class="text-center">TOTAL:</h4></th>
                                        <th><h4>R$ {{ formatMoneyBR($total) }}</h4></th>
                                    </tr>
                                </table>
                            </div>
                        </div>                                                  
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@push('js')
    <script src=""></script>
    <script>
        $(document).ready(function() {

        });
    </script>
@endpush
