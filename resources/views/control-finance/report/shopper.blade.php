@extends('adminlte::page')

@section('title', 'Relatórios')

@push('css')

   {{--  <style>
        .separete {
            width: 100%;
            height: 15px;
            border-radius: 50px;
            background-color:#3d997044;
            margin: 10px 0px 50px 0px; 
        }
    </style> --}}
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
                                <input type="hidden" name="action_field_disabled" id="action-field-disabled" value={{ $actionFieldDisable }}>
                                <div class="row">
                                    <div class="col-xs-12 col-md-4">
                                        <div class="form-group">                                                               
                                            <select class="form-control" name="shopper_id" id="shopper_id">
                                                <option value="">Selecione comprador</option>
                                                @foreach ( $shoppers as $shopper )
                                                    <option value="{{ $shopper->id }}" @if($shopper->id  == $shopperId) selected @endif>{{ $shopper->name }}</option>                                                
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-4">
                                        <div class="form-group">                                                                   
                                            <select class="form-control field-disabled" name="payment_type_id" id="" disabled>
                                                <option value="">Selecione Tipo</option>
                                                @foreach ( $paymentTypes as $payType )
                                                    <option value="{{ $payType->id }}" @if($payType->id  == $paymentTypeId) selected @endif>{{ $payType->description }}</option>                                                
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>                           
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-md-2">
                                        <div class="form-group">                                                                      
                                            <select class="form-control field-disabled" name="month" id="" disabled>
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
                                            <select class="form-control field-disabled" name="year" id="" disabled>
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
                               
                                    <div class="col-xs-12 col-md-2">            
                                        <div class="form-group ">
                                            <button class="btn bg-olive btn-block field-disabled" disabled>
                                                Buscar
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-2">            
                                        <div class="form-group">
                                            <a href="{{ route('pdfReportShopper_get') }}" class="btn bg-warning btn-block" >
                                                Limpar
                                                <i class="fas fa-broom"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                       
                        @if(count($reports) > 0)
                            <div class="col-8">
                                <form action="{{ route('pdfReportShopperGenerate_post') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="shopper_id" value="{{ $shopperId }}">
                                    <input type="hidden" name="month" value="{{ $month }}">
                                    <input type="hidden" name="year" value="{{ $year }}">
                                    <table class="table table-sm table-bordered">
                                        <tbody>
    
                                            <tr>
                                                <th class="text-center">TIPO DE PAGAMENTO</th>
                                                <th class="text-center">QUANTIDADE DE PARCELAS</th>
                                                <th class="text-center">SELECIONAR P/ GERAR</h3></th>
                                            </tr>
                                            
                                            @foreach ($reports as $report)                                           
                                                @foreach ($report as $item)
                                               
                                                    @if($loop->first)
                                                        <tr>
                                                            <td class="text-center" >{{ $report[0]->description }} </td>
                                                            <td class="text-center">{{ $report->count() }} parcela(s) encontrada(s)</td>
                                                            <td class="text-center">
                                                                <input type="checkbox" name="payment_type_id[{{ $item->payment_type_id }}]" id="">
                                                            </td>
                                                        </tr>
                                                    @endif
                                                                    
                                                @endforeach
                                                <tr class="bg-olive">
                                                    <th colspan="3"></th>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    <button class="btn bg-olive" type="submit">Gerar PDF</button>

                                </form>
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

            var actionFieldDisable = $('#action-field-disabled').val();

            if (actionFieldDisable == 0 ) {
                    $('.field-disabled').each(function(i) {
                        $(this).attr('disabled', false)
                    })
            } else {
                $('.field-disabled').each(function(i) {
                    $(this).attr('disabled', true)
                })
            }

            $('#shopper_id').on('change' , function(el) {
                var shopperId = $('#shopper_id option:selected').val();

                if (shopperId != '' ) {
                    $('.field-disabled').each(function(i) {
                        $(this).attr('disabled', false)
                    })
                } else {
                    $('.field-disabled').each(function(i) {
                        $(this).attr('disabled', true)
                    })
                }
            })
        });
    </script>
@endpush