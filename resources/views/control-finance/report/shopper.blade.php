@extends('adminlte::page')

@section('title', 'Relatórios')

@push('css')

    <style>
    .bold {
        font-weight: bold;
    }        
    </style> 
@endpush

@section('content_header')
    @include('control-finance.components.alerts')
@stop

@section('content')
    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card card-olive mb-0">
                    <div class="card-header">
                        <h5 class="card-title">Relatórios</h5>
                    </div>
                    <div class="card-body">
                        <div class="col-12">
                            <form action="{{ route('pdfReportShopper_post') }}" method="POST"> 
                                @csrf
                                <div class="row">
                                    <div class="col-xs-12 col-md-4">
                                        <div class="form-group">                                                               
                                            <select class="form-control form-control-sm btn-change" name="shopper_id" id="shopper_id">
                                                <option value="0">Selecione comprador</option>
                                                @foreach ( $shoppers as $shopper )
                                                    <option value="{{ $shopper->id }}" 
                                                        @if($shopper->id == $shopperId || $shopper->id == old('shopper_id')) 
                                                            selected
                                                        @endif
                                                            style="color:{{ $shopper->color }};"
                                                        >
                                                        {{ $shopper->name }}
                                                    </option>                                                
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-4">
                                        <div class="form-group">                                                                   
                                            <select class="form-control form-control-sm btn-change" name="payment_type_id" id="">
                                                <option value="0">Selecione Tipo</option>
                                                @foreach ( $paymentTypes as $payType )
                                                    <option value="{{ $payType->id }}" 
                                                        @if($payType->id  == $paymentTypeId || $payType->id == old('payment_type_id')) 
                                                            selected
                                                        @endif
                                                            style="color:{{ $payType->color }};"
                                                        >
                                                        {{ $payType->description }}
                                                    </option>                                                
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>                           
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-md-2">
                                        <div class="form-group">                                                                      
                                            <select class="form-control form-control-sm btn-change" name="month" id="">
                                                <option value="01" @if($month == '01' || old('month') == '01') selected @endif>Jan</option>
                                                <option value="02" @if($month == '02' || old('month') == '02') selected @endif>Fev</option>
                                                <option value="03" @if($month == '03' || old('month') == '03') selected @endif>Mar</option>
                                                <option value="04" @if($month == '04' || old('month') == '04') selected @endif>Abr</option>
                                                <option value="05" @if($month == '05' || old('month') == '05') selected @endif>Mai</option>
                                                <option value="06" @if($month == '06' || old('month') == '06') selected @endif>Jun</option>
                                                <option value="07" @if($month == '07' || old('month') == '07') selected @endif>Jul</option>
                                                <option value="08" @if($month == '08' || old('month') == '08') selected @endif>Ago</option>
                                                <option value="09" @if($month == '09' || old('month') == '09') selected @endif>Set</option>
                                                <option value="10" @if($month == '10' || old('month') == '10') selected @endif>Out</option>
                                                <option value="11" @if($month == '11' || old('month') == '11') selected @endif>Nov</option>
                                                <option value="12" @if($month == '12' || old('month') == '12') selected @endif>Dez</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-2">
                                        <div class="form-group">                                                                      
                                            <select class="form-control form-control-sm btn-change" name="year" id="">
                                                <option value="2020" @if($year == '2020' || old('year') == '2020') selected @endif>2020</option>
                                                <option value="2021" @if($year == '2021' || old('year') == '2021') selected @endif>2021</option>
                                                <option value="2022" @if($year == '2022' || old('year') == '2022') selected @endif>2022</option>
                                                <option value="2023" @if($year == '2023' || old('year') == '2023') selected @endif>2023</option>
                                                <option value="2024" @if($year == '2024' || old('year') == '2024') selected @endif>2024</option>
                                                <option value="2025" @if($year == '2025' || old('year') == '2025') selected @endif>2025</option>
                                                <option value="2026" @if($year == '2026' || old('year') == '2026') selected @endif>2026</option>
                                                <option value="2027" @if($year == '2027' || old('year') == '2027') selected @endif>2027</option>
                                                <option value="2028" @if($year == '2028' || old('year') == '2028') selected @endif>2028</option>
                                                <option value="2029" @if($year == '2029' || old('year') == '2029') selected @endif>2029</option>
                                                <option value="2030" @if($year == '2030' || old('year') == '2030') selected @endif>2030</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-2">            
                                        <div class="form-group">
                                            <a href="{{ route('pdfReportShopper_get') }}" class="btn bg-warning btn-block btn-sm" >
                                                Limpar
                                                <i class="fas fa-broom"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-2">            
                                        <div class="form-group ">
                                            <button class="btn bg-olive btn-block btn-sm">
                                                Buscar
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                       
                        @if(count($reports) > 0)
                            <div class="col-sm-12 col-md-10 col-lg-8 mt-5" id="result-report">
                                <form action="{{ route('pdfReportShopperGenerate_post') }}" method="POST" id="form">
                                    @csrf
                                    <input type="hidden" name="shopper_id" value="{{ $shopperId }}">
                                    <input type="hidden" name="month" value="{{ $month }}">
                                    <input type="hidden" name="year" value="{{ $year }}">
                                    <input type="hidden" name="acao" id="btn-acao" value="">
                                    <table class="table table-sm table-bordered">
                                        <tbody>
    
                                            <tr >
                                                <th rowspan="2" class="text-center">TIPO DE PAGAMENTO</th>
                                                <th rowspan="2" class="text-center">TOTAL</th>
                                                <th rowspan="2" class="text-center">QUANTIDADE DE PARCELAS</th>
                                                <th class="text-center">SELECIONAR P/ GERAR></th>
                                            </tr>

                                            <tr >                                               
                                            <th class="text-center"><i>Todos</i>  <input type="checkbox" name="all-payment-types" id="all-payment-types" class="ml-2"></th>
                                            </tr>
                                            @foreach ($reports['data'] as $item)
                                                <tr style="color:{{ $item['color']}};">
                                                    <td class="text-center bold" >{{ $item['paymentType'] }} </td>
                                                    <td class="text-center bold" >R$ {{ formatMoneyBR($item['totalValue']) }} </td>
                                                    <td class="text-center">{{ $item['reports']->count() }} parcela(s) encontrada(s)</td>
                                                    <td class="text-center">
                                                        <input type="checkbox" name="payment_type_id[{{ $item['paymentTypeId'] }}]" id="" class="item-payment-type">
                                                    </td>
                                                </tr>                                                    
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-between">
                                        <button class="btn bg-info btn-sm btn-acao" data-acao="view" type="submit">Visualizar</button>
                                        <button class="btn bg-purple btn-sm btn-acao" data-acao="generate" type="submit">Gerar PDF</button>
                                        <button class="btn bg-olive btn-sm btn-acao" data-acao="download" type="submit">Baixar PDF</button>
                                    </div>
                                </form>
                            </div>
                        @else
                            <div class="row">
                                <div class="col-xs-12 col-md-10 col-lg-8">
                                    @include('control-finance.components.results-empty')
                                </div>
                            </div>
                        @endif
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

            $('.btn-change').on('change' , function(el) {
                $('#result-report').remove()
            })

            var allPaymentTypes = $("#all-payment-types");

            allPaymentTypes.click(function () {

            if ( $(this).is(':checked') ){
                $('.item-payment-type').prop("checked", true);

            }else{
                $('.item-payment-type').prop("checked", false);
                
            }
            });


            $('.btn-acao').click(function (event ) {
                
                event.preventDefault();

                var acao = $(this).data("acao");

                $('#btn-acao').val(acao)

                $('#form').submit()

            });
        });
    </script>
@endpush