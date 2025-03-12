@extends('adminlte::page')

@push('css')

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:ital,wght@0,100..800;1,100..800&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: "Montserrat", sans-serif !important;
        }        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        tbody {
            color: #5c5c5c;
        }

        .table-header, .table-items, .table-footer {
            border: 1px solid #94949496;
            background-color: #bdbdbd3f;
        }

        .text-center {text-align: center;}
        
        .text-left {text-align: left;}
        
        .text-right {text-align: right;}

        .p-2 {padding: 2px;}
        .p-4 {padding: 4px;}
        .p-8 {padding: 8px;}
        .p-10 {padding: 10px;}
        .p-15 {padding: 15px;}
        .p-30 {padding: 30px;}

        .pl-2 {padding-left: 2px;}
        .pl-4 {padding-left: 4px;}
        .pl-8 {padding-left: 8px;}
        .pl-10 {padding-left: 10px;}
        .pl-15 {padding-left: 15px;}
        .pl-30 {padding-left: 30px;}

        .pr-2 {padding-right: 2px;}
        .pr-4 {padding-right: 4px;}
        .pr-8 {padding-right: 8px;}
        .pr-10 {padding-right: 10px;}
        .pr-15 {padding-right: 15px;}
        .pr-30 {padding-right: 30px;}

        .m-2 {margin: 2px;}
        .m-4 {margin: 4px;}
        .m-8 {margin: 8px;}
        .m-10 {margin: 10px;}
        .m-15 {margin: 15px;}
        .m-30 {margin: 30px;}

        .ml-2 {margin-left: 2px;}
        .ml-4 {margin-left: 4px;}
        .ml-8 {margin-left: 8px;}
        .ml-10 {margin-left: 10px;}
        .ml-15 {margin-left: 15px;}
        .ml-30 {margin-left: 30px;}
        
        .mr-2 {margin-right: 2px;}
        .mr-4 {margin-right: 4px;}
        .mr-8 {margin-right: 8px;}
        .mr-10 {margin-right: 10px;}
        .mr-15 {margin-right: 15px;}
        .mr-30 {margin-right: 30px;}

        .mt-2 {margin-top: 2px;}
        .mt-4 {margin-top: 4px;}
        .mt-8 {margin-top: 8px;}
        .mt-10 {margin-top: 10px;}
        .mt-15 {margin-top: 15px;}
        .mt-30 {margin-top: 30px;}
        
        .mb-2 {margin-bottom: 2px;}
        .mb-4 {margin-bottom: 4px;}
        .mb-8 {margin-bottom: 8px;}
        .mb-10 {margin-bottom: 10px;}
        .mb-15 {margin-bottom: 15px;}
        .mb-30 {margin-bottom: 30px;}

        .font-item {
            font-size: 12px;
            font-style: italic;
            color:#6b6b6b;
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
        
        .font-total-item {
            font-size: 12px;
            font-style: italic;
            color:#5c5c5c;
            font-weight:bold;
        }

        .font-total-footer {
            font-size: 14px;
            font-style: italic;
            color:#5c5c5c;
            font-weight:bold;
        }

        .font-header {
            font-size: 14px;
            font-style: italic;
            color:#5c5c5c;
            font-weight:bold;
        }

        .font-item-title {
            font-size: 12px;
            font-style: italic;
            color:#494949;
            font-weight:bold;
        }
    </style>
@endpush

@section('title', 'Relatório')

@section('content_header')
    @include('control-finance.components.alerts')
@stop

@section('content')
    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card card-olive mb-0">
                    <div class="card-header">
                        <h5 class="card-title">Relatório</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 col-md-9 col-lg-6">
                                <table class="table-header font-header table-borderless mb-8 ">
                                    <tbody>
                                        <tr>
                                            <td class=" p-4">Nome: {{ $reports['shopperName'] }}</td>
                                            <td class=" p-4">Mês de referência: {{ $reports['dateRef'] }}</td>
                                        </tr>
                                    </tbody>
                                </table>

                                @php
                                    $total = 0.0;
                                @endphp

                                @foreach ($reports['data'] as $data)   
                                                        
                                    @php
                                        $totalItem = 0.0;
                                    @endphp

                                    <table class="table table-borderless mb-15" style="border: 1px solid {{ $data['color'] }}3d;">                           
                                        <tr >
                                            <td colspan="3" class="font-item-title pl-4" style="color:{{ $data['color'] }};">{{ $data['paymentType'] }}</td>
                                            <td colspan="2" class="font-item-title pl-4" style="color:{{ $data['color'] }};">Dia pagamento: {{ $data['dueDate'] }}</td>
                                        </tr>
                                        @foreach($data['reports'] as $report)    
                                        
                                            @php
                                                $totalItem += $report->value; 
                                                                    
                                            @endphp

                                            <tr style="border: 1px solid {{ $data['color'] }}3d;">
                                                <td class="font-item pl-15" width="20%">
                                                    {{ formatDateBR($report->date) }}
                                                </td>
                                                <td colspan="3" class="font-item" width="50%">
                                                    @if($report->trade_name)
                                                        <span class="font-8">({{ $report->trade_name }}) </span><br>
                                                    @endif
                                                    <span class="">{{ $report->locality }}</span>
                                                    <span class="">({{ $report->number_installment }}/{{ $report->number_installments }})</span>
                                                    
                                                    @if($report->locality_obs)
                                                        <br><span class="font-8" style="max-width: 15px;">Obs: {{ textTruncate($report->locality_obs, 30) }}</span>
                                                    @endif
                                                </td>
                                                <td class="font-item" width="30%">
                                                    R$ {{ formatMoneyBR($report->value) }}
                                                </td>
                                            </tr>

                                            @if($loop->last)
                                                <tr>
                                                    <td  colspan="3" class="font-total-item text-right pl-10">Total: </td>
                                                    <td colspan="2" class="font-total-item text-right pr-15">R$ {{ formatMoneyBR($totalItem) }}</td>                        
                                                </tr>
                                                @php
                                                    $total += $totalItem;
                                                @endphp                       
                                            @endif
                                        @endforeach              
                                    </table>          

                                    @if($loop->last)
                                        <table class="table-footer font-total-footer table-responsive table-borderless">
                                            <tr>
                                                <td colspan="3" class="text-center p-8">Valor Total: </td>
                                                <td colspan="2" class="text-center p-8">R$ {{ formatMoneyBR($total) }}</td>      
                                            </tr>
                                        </table>
                                    @endif                    
                                @endforeach 
                           
                                <div class="card-footer mt-3">
            
                                    <form action="{{ route('pdfReportMonthGenerate_post') }}" method="POST" id="form">
                                        @csrf
                                        
                                        <input type="hidden" name="acao" id="btn-acao" value="">
                                        
                                        @if($request['shopper_id'])
                                            <input type="hidden" name="shopper_id" value="{{ $request['shopper_id'] }}">
                                        @endif
            
                                        @if($request['month'])
                                            <input type="hidden" name="month" value="{{ $request['month'] }}">
                                        @endif
                                        
                                        @if($request['year'])
                                            <input type="hidden" name="year" value="{{ $request['year'] }}">
                                        @endif
            
                                        @if($request['payment_type_id'])
                                            @foreach ($request['payment_type_id'] as $id)
                                                <input type="hidden" name="payment_type_id[{{ $id }}]" id="" class="item-payment-type">
                                            @endforeach
                                        @endif
                                        <div class="d-flex justify-content-between">
                                            <button class="btn bg-purple btn-sm btn-acao" data-acao="generate" type="submit">Gerar PDF</button>
                
                                            <button class="btn bg-olive btn-sm btn-acao" data-acao="download" type="submit">Baixar PDF</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@push('js')

    <script>
        $(document).ready(function() {
            
            $('.btn-acao').click(function (event ) {
                console.log('click')
                event.preventDefault();
            
                var acao = $(this).data("acao");
            
                $('#btn-acao').val(acao)
            
                $('#form').submit()            
            });
        });
    </script>

@endpush
