@extends('adminlte::page')

@section('title', 'Home')

@section('content_header')
    @include('routine-tasks.components.alerts')
@stop

@section('content')

    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card card-lightblue mb-0">
                    <div class="card-header">
                        <h5 class="card-title">Ínicio</h5>
                    </div>
                    <div class="card-body">

                        <div class="row  mt-3 mb-3">
                            <div class="col-12">
                                <h4 class="text-center" style="color:#3c8dbc;">Lista de produtos</h4>
                            </div>
                        </div>
                       
                        <div class="row row d-flex justify-content-center">            
                            <a href="{{ route('market_products_get') }}">
                                <div class="card bg-success mb-2 ml-2 mr-4 mt-2" style="max-width: 10rem; min-width:10rem; min-height:10rem; max-height:10rem;">
                                    <div class="card-header text-center">
                                        <div class="info-box-icon">
                                            <span>
                                                <i class="fas fa-warehouse  fa-2x"></i>
                                            </span>
                                        </div>         
                                    </div>
                                    <div class="card-body">
                                    <h5 class="text-center p-1"><span class="">Preparar lista</span></h5>
                                
                                    </div>
                                </div>
                            </a>
                        </div>
                      
                        </div>

                        <div class="row  mt-3 mb-3">
                            <div class="col-12">
                                <h4 class="text-center" style="color:#3c8dbc;">Acesso Rápido</h4>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-around">

                            <a href="{{ route('market_get') }}">
                                <div class="card bg-danger mb-2 ml-2 mr-4 mt-2" style="max-width: 10rem; min-width:10rem; min-height:10rem; max-height:10rem;">
                                    <div class="card-header text-center">
                                        <div class="info-box-icon">
                                            <span>
                                                <i class="fas fa-warehouse  fa-2x"></i>
                                            </span>
                                        </div>         
                                    </div>
                                    <div class="card-body">
                                    <h5 class="text-center p-1"><span class="">Cadastrar mercados</span></h5>
                                
                                    </div>
                                </div>
                            </a>

                            <a href="{{ route('product_get') }}">
                                <div class="card bg-warning mb-2 ml-2 mr-4 mt-2" style="max-width: 10rem; min-width:10rem; min-height:10rem; max-height:10rem;">
                                    <div class="card-header text-center">
                                        <div class="info-box-icon">
                                            <span>
                                                <i class="fas fa-wine-bottle  fa-2x"></i>
                                            </span>
                                        </div>         
                                    </div>
                                    <div class="card-body">
                                    <h5 class="text-center p-1"><span class="">Cadastrar produtos</span></h5>
                                
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
