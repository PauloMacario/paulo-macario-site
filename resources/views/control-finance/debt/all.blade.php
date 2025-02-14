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

        .font-6 {
            font-size: 6px;
        }
        .font-8 {
            font-size: 8px;
        }
        .font-9 {
            font-size: 9px;
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
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <p class="text-right">
                                    <button class="btn bg-olive btn-sm" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                      filtros
                                      <i class="fas fa-filter"></i>
                                    </button>
                                </p>
                                <div class="collapse {{ $filter }}" id="collapseExample">
                                    <div class="card card-body">
                                        <form action="{{ route('debtAllMonth_post') }}" method="GET">
                                            <div class="row">
                                                <div class="col-6 col-sm-6 col-md-3 col-lg-3">
                                                    <div class="form-group">                                                                      
                                                        <select class="form-control form-control-sm" name="month" id="">
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
                                                <div class="col-6 col-sm-6 col-md-3 col-lg-3">
                                                    <div class="form-group">                                                                      
                                                        <select class="form-control form-control-sm" name="year" id="">
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
                                                <div class="col-6 col-sm-6 col-md-3 col-lg-3">
                                                    <div class="form-group">                                                                   
                                                        <select class="form-control form-control-sm" name="category_id" id="">
                                                            <option value="">Categorias</option>
                                                            @foreach ( $categories as $category )
                                                                <option value="{{ $category->id }}" style="color:{{ $category->color }};" @if($category->id  == $categoryId) selected @endif>{{ $category->description }}</option>                                                
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-6 col-sm-6 col-md-3 col-lg-3">
                                                    <div class="form-group">                                                                   
                                                        <select class="form-control form-control-sm" name="payment_type_id" id="">
                                                            <option value="">Tipos</option>
                                                            @foreach ( $paymentTypes as $payType )
                                                                <option value="{{ $payType->id }}" style="color:{{ $payType->color }};" @if($payType->id  == $payTypeId) selected @endif>{{ $payType->description }}</option>                                                
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-6 col-sm-6 col-md-3 col-lg-3">
                                                    <div class="form-group">
                                                        @if($shoppers->count() > 1)
                                                            <select class="form-control form-control-sm" name="shopper_id" id="">
                                                                <option value="">Compradores</option>
                                                                @foreach ( $shoppers as $shopper )
                                                                    <option value="{{ $shopper->id }}" style="color:{{ $shopper->color }};" @if($shopper->id  == $shopperId) selected @endif>{{ $shopper->name }}</option>                                                
                                                                @endforeach
                                                            </select>
                                                        @else
                                                            <input type="text" class="form-control form-control-sm"  name="" id="" value="{{ $shoppers[0]->name }}" readonly>
                                                            <input type="hidden" class="form-control form-control-sm"  name="shopper_id" id="shopper_id" value="{{ $shoppers[0]->id }}">
                                                        @endif                       
                                                    </div>
                                                </div>
                                                <div class="col-6 col-sm-6 col-md-3 col-lg-3">
                                                    <div class="form-group">
                                                        <select 
                                                            class="form-control form-control-sm" 
                                                            name="status" 
                                                            id="status" 
                                                        >
                                                            <option value="PM" @if($status  == 'PM') selected @endif>Pagamento feito</option>
                                                            <option value="PP" @if($status  == 'PP') selected @endif>Pendente pagamento</option>
                                                    </select>                
                                                    </div>
                                                </div>
                                                <div class="col-6 col-sm-6 col-md-3 col-lg-3">            
                                                    <div class="form-group">
                                                        <button class="btn bg-olive btn-block btn-sm">
                                                            Filtrar
                                                            <i class="fas fa-search"></i>
                                                        </button>
                                                    </div>
                                                </div>          
                                                <div class="col-6 col-sm-6 col-md-3 col-lg-3">            
                                                    <div class="form-group">
                                                        <a href="{{ route('debtAll_get') }}" class="btn bg-warning btn-block btn-sm">
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
                            <div class="col-sm-12 col-md-6 col-lg-6">                              
                                @if ($debts->count() > 0)
                                    <table class="table table-sm table-striped mb-2">
                                        <tr>
                                            <th colspan="4"><h5 class="text-center">TOTAL:</h5></th>
                                            <th><h5 class="text-center">R$ {{ formatMoneyBR($total) }}</h5></th>
                                        </tr>
                                    </table>
                                    <table class="table table-sm table-borderless ">        
                                        @foreach ( $debts as $debt  )
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
                                                    @if ($debt->trade_name || $debt->locality_obs)
                                                        <div class="accordion" id="accordionExample">                                                           
                                                            <div >
                                                                <div id="heading{{ $debt->id }}">
                                                                    <a href="{{ route('detailDebt_get', ['id' => $debt->id]) }}">
                                                                        @if ($debt->trade_name)
                                                                            {{ $debt->trade_name }}
                                                                        @else
                                                                            {{ $debt->locality }}
                                                                        @endif
                                                                        <span class="ml-2">
                                                                            @if ($debt->number_installments > 1)
                                                                                em {{ $debt->number_installments }} x
                                                                            @endif
                                                                        </span>
                                                                    </a>
                                                                    <button class="btn btn-link btn-sm text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse{{ $debt->id }}" aria-expanded="false" aria-controls="collapseTwo">
                                                                        <i class="fas fa-caret-square-down" data-toggle="modal" data-target="#modal-default" style="color:#3d9970; cursor: pointer;"></i>
                                                                    </button>                                                                       
                                                                </div>
                                                                <div id="collapse{{ $debt->id }}" class="collapse" aria-labelledby="heading{{ $debt->id }}" data-parent="#accordionExample">
                                                                    @if ($debt->trade_name)
                                                                        <div class="font-italic">
                                                                            {{ $debt->locality }}
                                                                        </div>
                                                                    @endif

                                                                    @if ($debt->locality_obs)
                                                                        <div class="font-italic font-9">
                                                                            <i class="fas fa-info-circle mr-2" style="color:#3d9970;"></i>
                                                                            {{ $debt->locality_obs }}
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>                                                          
                                                        </div>
                                                    @else
                                                        <a href="{{ route('detailDebt_get', ['id' => $debt->id]) }}">
                                                            {{ $debt->locality }}
                                                            <span class="ml-2">
                                                                @if ($debt->number_installments > 1)
                                                                    em {{ $debt->number_installments }} x
                                                                @endif
                                                            </span>
                                                        </a>                                 
                                                    @endif
                                                </td>
                                                <td class="font-weight-bold text-center font-14 @if($debt->status == 'PM') value-paid @endif">
                                                    R$ {{ formatMoneyBR($debt->total_value) }}
                                                    @if($debt->status == 'PM')                                              
                                                        <img src="{{ asset('./img/paid_red.png') }}" alt="" width="20px" height="20px">
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                @if ($debt->prorated_debt == 1)                                
                                                    <td class="font-italic text-left font-12">{{ $debt->shopper->name }}</td>
                                                    <td class="font-weight-bold font-italic text-center text-info font-12"><i class="fas fa-users"></i>Rateio</td>
                                                    <td></td>                                          
                                                @else                                              
                                                    <td class="font-italic text-left font-12">{{ $debt->shopper->name }}</td>                                      
                                                    <td colspan="2" ></td>
                                                @endif                                               
                                            </tr>
                                            <tr>
                                                <td colspan="3" class="font-weight-bold text-left font-14 pl-5">Parcelas</td>
                                            </tr>
                                            @foreach ($debt->installments as $installment)
                                                <tr>
                                                    <td colspan="2" class="text-left font-italic font-10 @if($installment->status == 'PM') value-paid @endif" width="80%">
                                                        <span class="pl-5">{{ formatDateBR($installment->due_date) }}</span>  
                                                        <span class="pl-5">({{ $installment->number_installment }}/{{ $debt->number_installments }})</span>
                                                        <span class="pl-5">R$ {{ formatMoneyBR($installment->value) }}</span> 
                                                        @if($installment->status == 'PM')                                              
                                                            <span class="pl-5">
                                                                <img src="{{ asset('./img/paid_red.png') }}" alt="" width="20px" height="20px">                                                                
                                                            </span>
                                                        @endif           
                                                    </td>                                                
                                                </tr>                                                
                                            @endforeach
                                            <tr>
                                                <td colspan="3" {{-- class="bg-teal" --}} style="background-color:#3d997054;"></td>
                                            </tr>
                                        @endforeach
                                    </table> 
                                    <table class="table table-sm table-striped mt-2">
                                        <tr>
                                            <th colspan="4"><h5 class="text-center">TOTAL:</h5></th>
                                            <th><h5>R$ {{ formatMoneyBR($total) }}</h5></th>
                                        </tr>
                                    </table>                                  
                                @else 
                                    @include('control-finance.components.results-empty')
                                @endif                           
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
