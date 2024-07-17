@extends('adminlte::page')

@section('title', 'Home')

@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Acesso rápido</h1>
        </div>
        <div class="col-sm-6">
            
        </div>
    </div>
</div>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-12">
                            <a href="{{ route('debt_get') }}">
                                <div class="info-box bg-olive">
                                    <span class="info-box-icon">
                                        <i class="fas fa-plus-circle"></i>
                                    </span>
                                    <div class="info-box-content">
                                        <span class="">Nova dívida</span>
                                    </div>                            
                                </div>
                            </a>
                        </div>

                        <div class="col-md-3 col-sm-6 col-12">
                            <a href="{{ route('debtAll_get') }}">
                                <div class="info-box bg-navy">
                                    <span class="info-box-icon">
                                        <i class="fas fa-wallet"></i>
                                    </span>
                                    <div class="info-box-content">
                                        <span class="">Compras</span>
                                    </div>                            
                                </div>
                            </a>
                        </div>

                        <div class="col-md-3 col-sm-6 col-12">
                            <a href="{{ route('installmentAll_get') }}">
                                <div class="info-box bg-teal">
                                    <span class="info-box-icon">
                                        <i class="fas fa-credit-card"></i>
                                    </span>
                                    <div class="info-box-content">
                                        <span class="">Parcelas</span>
                                    </div>                            
                                </div>
                            </a>
                        </div>

                        <div class="col-md-3 col-sm-6 col-12">
                            <a href="{{ route('settingAll_get') }}">
                                <div class="info-box bg-purple">
                                    <span class="info-box-icon">
                                        <i class="fas fa-sliders-h "></i>
                                    </span>
                                    <div class="info-box-content">
                                        <span class="">Config.</span>
                                    </div>                            
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">            
        <div class="col-12 col-md-6">
            <div class="card">
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

    <div class="row">
        <div class="col-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <h1>Features adn Bugs</h1>
                    <ul class="list-group">
                       <li class="list-group-item">Compra recorrente mensal</li>
                       <li class="list-group-item">flag parcela paga</li>
                       <li class="list-group-item">flag conta paga e se todas parcelas pagas paga conta</li>
                       <li class="list-group-item">Detalhes da compra lista parcelas(add ou remove parcela)</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@stop


@push('js')
    <script src="{{ asset('vendor/chart/chart.min.js') }}"></script>

    <script>
        $(document).ready(function () {
         
            $.ajax({
                url : "{{ asset('/grafico/categorias') }}",
                type : 'get',
            beforeSend : function(){
                /* $("#resultado").html("ENVIANDO..."); */
            }
            })
            .done(function(resultado){
                graphicPerCategories(resultado)
            })
            .fail(function(jqXHR, textStatus, msg){
                console.log(msg);
                console.log(textStatus);
                console.log(jqXHR);
            });

            $.ajax({
                url : "{{ asset('/grafico/categorias-divida-valor') }}",
                type : 'get',
            beforeSend : function(){
                /* $("#resultado").html("ENVIANDO..."); */
            }
            })
            .done(function(resultado){
                graphicPerCategoriesDebtsSumValues(resultado)
            })
            .fail(function(jqXHR, textStatus, msg){
                console.log(msg);
                console.log(textStatus);
                console.log(jqXHR);
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
                        label: 'Por valores',         
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
