@extends('adminlte::page')

@section('title', 'Home')

@section('content_header')
@stop

@section('content')

    <div class="row mt-3">
        <div class="col-12">
            <div class="card bg-olive">
                <div class="card card-olive mb-0">
                    <div class="card-header">
                        <h5 class="card-title">Ínicio</h5>
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
