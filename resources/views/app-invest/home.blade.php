@extends('adminlte::page')

@section('title', 'Home')

@section('content_header')
@stop

@section('content')

    <div class="row mt-3">
        <div class="col-12">
            <div class="card bg-olive">
                <div class="card card-lightblue mb-0">
                    <div class="card-header">
                        <h5 class="card-title">Ínicio</h5>
                    </div>
                    <div class="card-body">

                        <div class="row  mt-3 mb-3">
                            <div class="col-12">
                                <h4 class="text-center" style="color:#3c8dbc;">Gráficos</h4>
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

                        <div class="row  mt-3 mb-3">
                            <div class="col-12">
                                <h4 class="text-center" style="color:#3c8dbc;">Acesso Rápido</h4>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-around">
                            <a href="{{-- {{ route('negotiationAll_get') }} --}}">
                                <div class="card bg-teal mb-2 ml-2 mr-4 mt-2" style="max-width: 10rem; min-width:10rem; min-height:10rem; max-height:10rem;">
                                    <div class="card-header text-center">
                                        <div class="info-box-icon">
                                            <span>
                                                <i class="fas fa-file-invoice-dollar  fa-2x"></i>
                                            </span>
                                        </div>         
                                    </div>
                                    <div class="card-body">
                                    <h5 class="text-center p-1"><span class="">Negociacões</span></h5>
                                
                                    </div>
                                </div>
                            </a>

                            <a href="{{-- {{ route('negotiationNew_get') }} --}}">
                                <div class="card bg-indigo mb-2 ml-2 mr-4 mt-2" style="max-width: 10rem; min-width:10rem; min-height:10rem; max-height:10rem;">
                                    <div class="card-header text-center">
                                        <div class="info-box-icon">
                                            <span>
                                                <i class="fas fa-plus-circle fa-2x"></i>
                                            </span>
                                        </div>         
                                    </div>
                                    <div class="card-body">
                                    <h5 class="text-center p-1"><span class="">Negociacões</span></h5>
                                
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
@push('js')
  
@endpush
