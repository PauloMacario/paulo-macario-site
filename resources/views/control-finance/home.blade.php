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
        }
        .decoration {
            text-decoration: line-through;
        }
        #balance {
            background-color:#fff;
        }
    </style>
@endpush

@section('title', 'Home')

@section('content_header')
@stop

@section('content')



<div class="row mt-3">
        <div class="col-sm-12">
            <p class="text-right">
                <button class="btn bg-olive btn-sm" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                filtros
                <i class="fas fa-filter"></i>
                </button>
            </p>
            <div class="collapse {{ $filter }}" id="collapseExample">
                <div class="card card-body">
                    <form action="{{ route('controlFinanceHome') }}" method="GET">
                        <div class="row">
                            <div class="col-6 col-sm-6 col-md-3 col-lg-3">
                                <div class="form-group">                                                                     
                                    <select class="form-control form-control-sm" name="month" id="">
                                        <option value="">Mês</option>
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
                            
                            <div class="col-12 col-sm-12 col-md-3 col-lg-3 mb-3">
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
                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">            
                                <div class="form-group">
                                    <a href="{{ route('controlFinanceHome') }} " class="btn bg-warning btn-block btn-sm">
                                        Limpar
                                        <i class="fas fa-broom"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-6 col-sm-6 col-md-6 col-lg-6">            
                                <div class="form-group">
                                    <button class="btn bg-olive btn-block btn-sm">
                                        Filtrar
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
          
    @if (count($installments) > 0)
        <div class="row mt-1">
            <div class="col-12">                
                @foreach ($installments as $name => $items)
                    <div class="card collapsed-card" >
                        <div class="card-header ">  
                            <div class="row">
                                <div class="col-4 text-left">
                                    <span  class="text-right font-12" style="width:100px; color:{{ $items['color'] }};">
                                    {{ $name }} 
                                    </span>                                 
                                </div>
                                <div class="col-4">
                                    <span class="text-right font-12" style="width:100px; color:{{ $items['color'] }};">
                                        R$ {{ formatMoneyBR($items['total_installments']) }}
                                    </span>
                                </div>
                                <div class="col-4 text-right">
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body" style="display: none;">   
                                                    
                            <table class="pl-1 pt-3">
                                @foreach ($items['installments'] as $item)
                               
                                    <tr>
                                        <td class="p-2 font-italic font-10">
                                            {{ $item['debt']['locality'] }}
                                        </td>
                                        <td class="p-2 font-italic font-10">
                                            {{ $item['number_installment'] }} / {{ $item['debt']['number_installments'] }}
                                        </td>
                                     
                                        <td class="p-2 font-italic font-10">
                                            R$ {{ formatMoneyBR($item['value']) }}
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                                
                        </div>
                    </div>
                @endforeach  
                <div class="card ">
                   
                    <div class="card-body" >    
                        <table class="table table-sm mt-2" style="background-color:rgba(0, 0, 0, .05);">
                            <tr>
                                <td class="text-center text-primary">
                                   
                                </td>
                                <td class="text-center text-success ">
                                    
                                </td>
                                <td class="text-center text-danger">
                                    TOTAL: R$ {{ formatMoneyBR($total) }}
                                </td>
                            </tr>
                            <tr>                                
                                 <td class="text-center text-danger">
                                    
                                 </td>
                                 <td class="text-center text-primary">
                                     RENDA: R$ {{ formatMoneyBR($renda) }}
                                 </td>
                                 <td class="text-center text-success ">
                                     POUPAR: R$ {{ formatMoneyBR($renda - $total)}}
                                 </td>
                             </tr>
                        </table>                       
                    </div>            
                </div>
            </div>
        </div>    
    @endif

    <div class="row mt-3">
        <div class="col-12">
            <div class="card bg-olive">
                <div class="card card-olive mb-0">
                    <div class="card-header">
                        <h5 class="card-title">Atalhos</h5>
                    </div>
                    <div class="card-body">
                        <div class="row  mt-3 mb-3">
                            <div class="col-12">
                                <h4 class="text-center" style="color:#3d9970;">Acesso Rápido</h4>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-around">
                            <a href="{{ route('debt_get') }}">
                                <div class="card bg-primary mb-2 ml-2 mr-4 mt-2" style="max-width: 10rem; min-width:10rem; min-height:10rem; max-height:10rem;">
                                    <div class="card-header text-center">
                                        <div class="info-box-icon">
                                            <span>
                                                <i class="fas fa-plus-circle  fa-2x"></i>
                                            </span>
                                        </div>         
                                    </div>
                                    <div class="card-body">
                                    <h5 class="text-center p-1"><span class="">Nova dívida</span></h5>
                                
                                    </div>
                                </div>
                            </a>
                            <a href="{{ route('debtAll_get') }}">
                                <div class="card bg-purple mb-2 ml-2 mr-4 mt-2" style="max-width: 10rem; min-width:10rem; min-height:10rem; max-height:10rem;">
                                    <div class="card-header text-center">
                                        <div class="info-box-icon">
                                            <span>
                                                <i class="fas fa-wallet fa-2x"></i>
                                            </span>
                                        </div>         
                                    </div>
                                    <div class="card-body">
                                    <h5 class="text-center p-1"><span class="">Compras</span></h5>
                                
                                    </div>
                                </div>
                            </a>
                            <a href="{{ route('installmentAll_get') }}">
                                <div class="card bg-olive mb-2 ml-2 mr-4 mt-2" style="max-width: 10rem; min-width:10rem; min-height:10rem; max-height:10rem;">
                                    <div class="card-header text-center">
                                        <div class="info-box-icon">
                                            <span>
                                                <i class="fas fa-credit-card fa-2x"></i>
                                            </span>
                                        </div>         
                                    </div>
                                    <div class="card-body">
                                    <h5 class="text-center p-1"><span class="text-center">Parcelas</span></h5>
                                
                                    </div>
                                </div>
                            </a>
                            <a href="{{ route('paymentAll_get') }}">
                                <div class="card bg-lightblue mb-2 ml-2 mr-4 mt-2" style="max-width: 10rem; min-width:10rem; min-height:10rem; max-height:10rem;">
                                    <div class="card-header text-center">
                                        <div class="info-box-icon">
                                            <span>
                                                <i class="fas fa-stamp fa-2x"></i>
                                            </span>
                                        </div>         
                                    </div>
                                    <div class="card-body">
                                    <h5 class="text-center p-1"><span class="text-center">Pagamentos</span></h5>
                                
                                    </div>
                                </div>
                            </a>
                            <a href="{{ route('pdfOptions_get') }}">
                                <div class="card bg-teal mb-2 ml-2 mr-4 mt-2" style="max-width: 10rem; min-width:10rem; min-height:10rem; max-height:10rem;">
                                    <div class="card-header text-center">
                                        <div class="info-box-icon">
                                            <span>
                                                <i class="fas fa-file-pdf fa-2x"></i>
                                            </span>
                                        </div>         
                                    </div>
                                    <div class="card-body">
                                    <h5 class="text-center p-1"><span class="text-center">Relatórios</span></h5>
                                
                                    </div>
                                </div>
                            </a>
                            <a href="{{ route('settingAll_get') }}">
                                <div class="card bg-info mb-2 ml-2 mr-4 mt-2" style="max-width: 10rem; min-width:10rem; min-height:10rem; max-height:10rem;">
                                    <div class="card-header text-center">
                                        <div class="info-box-icon">
                                            <span>
                                                <i class="fas fa-sliders-h fa-2x"></i>
                                            </span>
                                        </div>         
                                    </div>
                                    <div class="card-body">
                                    <h5 class="text-center p-1"><span class="">Config.</span></h5>
                                
                                    </div>
                                </div>
                            </a>                      
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-12">
            <div class="card bg-olive">
                <div class="card card-olive mb-0">
                    <div class="card-header">
                        <h5 class="card-title">Gráficos</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">            
                            <div class="col-12 col-md-6">
                                <div class="card">
                                    <p class="text-center mt-2"  style="color:#3d9970;">Categoria / Quantidade</p>
                                    <div class="card-body">
                                        <canvas 
                                            id="donutChart" 
                                            style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 392px;" 
                                            width="490" 
                                            height="312" 
                                            class="chartjs-render-monitor">
                                        </canvas>
                                    </div>
                                </div>
                            </div>      
                            <div class="col-12 col-md-6">
                                <div class="card">
                                    <p class="text-center mt-2"  style="color:#3d9970;">Categoria / Valores</p>
                                    <div class="card-body">
                                        <canvas 
                                            id="barChart" 
                                            style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 410px;" 
                                            width="512" 
                                            height="312" 
                                            class="chartjs-render-monitor">
                                        </canvas>
                                    </div>
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
    <script src="{{ asset('vendor/chart/chart.min.js') }}"></script>

    <script>
        $(document).ready(function () {

          
            console.log(window.location.protocol.indexOf('https'))

            if (window.location.protocol.indexOf('https') <= 0){
                
                var el = document.createElement('meta')
                el.setAttribute('http-equiv', 'Content-Security-Policy')
                el.setAttribute('content', 'upgrade-insecure-requests')
                document.head.append(el)
            }
         
            $.ajax({
                url : "{{ asset('/controlfinance/grafico/categorias') }}",
                type : 'get',
            beforeSend : function(){
                /* $("#resultado").html("ENVIANDO..."); */
            }
            })
            .done(function(resultado){
                graphicPerCategories(resultado)
            })
            .fail(function(jqXHR, textStatus, msg){
               
            });

            $.ajax({
                url : "{{ asset('/controlfinance/grafico/categorias-divida-valor') }}",
                type : 'get',
            beforeSend : function(){
                /* $("#resultado").html("ENVIANDO..."); */
            }
            })
            .done(function(resultado){
                graphicPerCategoriesDebtsSumValues(resultado)
            })
            .fail(function(jqXHR, textStatus, msg){
               
            });
      
        });

        function graphicPerCategories(resultado){      
            
            var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
            var donutData = {
                labels: resultado.labels,
                datasets: [
                    {
                        data: resultado.data,
                        backgroundColor : resultado.backgroundColor
                    }
                ]
            }

            var donutOptions = {
                maintainAspectRatio : false,
                responsive : true,
            }
        
            new Chart(donutChartCanvas, {
                type: 'doughnut',
                data: donutData,
                options: donutOptions
            })

        }
  


        function graphicPerCategoriesDebtsSumValues(resultado){
           console.log(resultado)
            var areaChartData = {
                labels  : resultado.labels,
                datasets: [
                    {   
                        label: '',         
                        data: resultado.data,
                        backgroundColor: resultado.backgroundColor,            
                    }
                ]
            }
    
            var areaChartOptions = {
                maintainAspectRatio : false,
                responsive : true,
                legend: {
                    display: false
                },
                scales: {
                    xAxes: [{
                    gridLines : {
                        display : false,
                    }
                    }],
                    yAxes: [{
                    gridLines : {
                        display : false,
                    }
                    }]
                }
            }

            var barChartCanvas = $('#barChart').get(0).getContext('2d')
            var barChartData = areaChartData
            var temp0 = areaChartData.datasets
                
            var barChartOptions = {
                responsive              : true,
                maintainAspectRatio     : false,
                datasetFill             : true
            }
  
            new Chart(barChartCanvas, {
                type: 'bar',
                data: barChartData,
                options: barChartOptions
            })
        }
    </script>
@endpush
