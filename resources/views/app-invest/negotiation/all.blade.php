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
@section('title', 'Negociações')

@section('content_header')
@stop

@section('content')

    <div class="row mt-3">
        <div class="col-12">            
            <div class="card card-lightblue mb-0">
                <div class="card-header">
                    <h5 class="card-title">Negociações</h5>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-xs-12 col-md-10 col-lg-8">
                            <p class="text-right">
                                <button class="btn bg-lightblue btn-sm" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                  filtros
                                  <i class="fas fa-filter"></i>
                                </button>
                            </p>
                            <div class="collapse show" id="collapseExample">
                                <div class="card card-body">
                                    <form action="{{ route('negotiationAllFilters_get') }}" method="GET">
                                        <div class="row">
                                            <div class="col-6 col-sm-6 col-md-3 col-lg-3">
                                                <div class="form-group">                                                                     
                                                    <select class="form-control form-control-sm" name="month" id="">
                                                        <option value="" @if($month == null) selected @endif>Mês</option>
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
                                                        <option value="" @if($year == null) selected @endif>Ano</option>
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
                                                    <select class="form-control form-control-sm" name="type_investment_id" id="">
                                                        <option value="">Tipo investimento</option>
                                                        @foreach ( $typeInvestments as $typeInvestment )
                                                            <option value="{{ $typeInvestment->id }}" style="color:{{ $typeInvestment->color }};" @if($typeInvestment->id  == $typeInvestmentId) selected @endif>{{ $typeInvestment->name }}</option>                                                
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-3 col-lg-3">
                                                <div class="form-group">                                                                   
                                                    <select class="form-control form-control-sm" name="type_negotiation" id="">
                                                        <option value="">Tipo negociação</option>                                                       
                                                        <option value="S" style="color:#eb910b;" @if(isset($typeNegotiation) && $typeNegotiation == "S") selected @endif>Venda</option>
                                                        <option value="B" style="color:#1aba35;" @if(isset($typeNegotiation) && $typeNegotiation == "B") selected @endif>Compra</option>
                                                    </select>
                                                </div>
                                            </div>                                         
                                            <div class="col-6 col-sm-6 col-md-3 col-lg-3">            
                                                <div class="form-group">
                                                    <button class="btn bg-lightblue btn-block btn-sm">
                                                        Filtrar
                                                        <i class="fas fa-search"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-3 col-lg-3">            
                                                <div class="form-group">
                                                    <a href="{{ route('negotiationAll_get') }}" class="btn bg-warning btn-block btn-sm">
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
                            <div class="card card-body">
                                @if($negotiations->count() > 0)                                    
                                    <table class="table table-sm table-borderless ">        
                                        @foreach ($negotiations as $negotiation)
                                            <tr>
                                                <td class="font-italic text-left font-12" width="35%">{{ $negotiation->investment->typeInvestment->name }}</td>                                               
                                                @if($negotiation->type_negotiation == 'B')
                                                    <td class="font-italic text-center font-12" width="35%">COMPRA</td>
                                                @else 
                                                    <td class="font-italic text-center font-12" width="35%">VENDA</td>
                                                @endif                                               
                                                <td class="font-italic text-center font-12" width="30%">{{ formatDateBR($negotiation->date) }}</td>
                                            </tr>
                                            <tr >
                                                <td colspan="2" class="font-weight-bold text-left font-14">
                                                    <a href="#{{-- {{ route('detailDebt_get', ['id' => $debt->id]) }} --}}">
                                                        {{ $negotiation->investment->name }}                                                       
                                                    </a>
                                                </td>
                                                <td class="font-weight-bold text-center font-14">
                                                    R$ {{ formatMoneyBR($negotiation->value) }}                                                 
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" class="font-italic text-left font-12">Quantidade: {{ $negotiation->quantity }}</td>                                      
                                                <td ></td>                                                                                             
                                            </tr>                                                                           
                                            <tr>
                                                <td colspan="3" {{-- class="bg-teal" --}} style="background-color:#3c8dbc49;"></td>
                                            </tr>
                                        @endforeach
                                    </table> 
                                    <table class="table table-sm table-striped mt-2">
                                        <tr>
                                            <th colspan="4" class="text-center">
                                                <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#calculoModal">Cálculo</button>
                                            </th>
                                            <th><h5 class="text-center">TOTAL: R$ {{ formatMoneyBR($total) }}</h5></th>
                                        </tr>
                                    </table>                                  
                                @else
                                <div class="row">
                                    <div class="col-xs-12 col-md-10 col-lg-8">
                                        @include('app-invest.components.results-empty')
                                    </div>
                                </div>                             
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="calculoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">                                       
                    @foreach ($calculation as $calc)

                        @if($calc == "")                       
                            <hr>                            
                        @else
                            @if($loop->last)
                                <p class="text-center font-weight-bold font-16 font-italic  mb-0">Total: R$ {{ formatMoneyBR($calc) }}</p>
                            @else
                                <p class="text-center font-14 font-italic  mb-0">R$ {{ formatMoneyBR($calc) }}</p>
                            @endif
                            
                        @endif

                    @endforeach
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@stop
@push('js')
  
@endpush
