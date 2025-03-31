@extends('adminlte::page')

@section('title', 'Relatórios')

@push('css')

    <style>
        .separete {
            width: 100%;
            height: 15px;
            border-radius: 50px;
            background-color:#3d997044;
            margin: 10px 0px 50px 0px; 
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
                            <h4>Relatório em formato PDF</h4>
                        </div>
                        <div class="row d-flex justify-content-around">

                            <a href="{{ route('pdfReportShopper_get') }}">
                                <div class="card bg-olive mb-2 ml-2 mr-4 mt-2" style="max-width: 10rem; min-width:10rem; min-height:10rem; max-height:10rem;">
                                    <div class="card-header text-center">
                                        <div class="info-box-icon">
                                            <span>
                                                <i class="fas fa-user-tag fa-2x"></i>
                                            </span>
                                        </div>         
                                    </div>
                                    <div class="card-body">
                                    <h5 class="text-center p-1"><span class="text-center">Parcelas por comprador</span></h5>
                                  
                                    </div>
                                </div>
                            </a>

    
                          {{--   <a href="#">
                                <div class="card bg-navy mb-2 ml-2 mr-4 mt-2" style="max-width: 14rem;">
                                    <div class="card-header text-center">
                                        <div class="info-box-icon">
                                            <span>
                                                <i class="fas fa-clipboard-list fa-2x"></i>
                                            </span>
                                        </div>         
                                    </div>
                                    <div class="card-body">
                                    <h5 class="card-title text-center p-3"><span class="">Parcelas por tipo de pagamento</span></h5>
                                  
                                    </div>
                                </div>
                            </a> --}}
                            <div class="separete"></div>
                        </div>

                   {{--      <div class="col-12">
                            <h4>Relatório em formato EXCEL</h4>
                        </div> --}}
                       {{--  <div class="row d-flex justify-content-center">
                            <a href="#">
                                <div class="card bg-olive mb-2 ml-2 mr-4 mt-2" style="max-width: 14rem;">
                                    <div class="card-header text-center">
                                        <div class="info-box-icon">
                                            <span>
                                                <i class="fas fa-user-tag fa-2x"></i>
                                            </span>
                                        </div>         
                                    </div>
                                    <div class="card-body">
                                    <h5 class="card-title text-center p-3"> <span class="">Parcelas por comprador</span></h5>
                                  
                                    </div>
                                </div>
                            </a>
    
                            <a href="#">
                                <div class="card bg-navy mb-2 ml-2 mr-4 mt-2" style="max-width: 14rem;">
                                    <div class="card-header text-center">
                                        <div class="info-box-icon">
                                            <span>
                                                <i class="fas fa-clipboard-list fa-2x"></i>
                                            </span>
                                        </div>         
                                    </div>
                                    <div class="card-body">
                                    <h5 class="card-title text-center p-3"><span class="">Parcelas por tipo de pagamento</span></h5>
                                  
                                    </div>
                                </div>
                            </a>
                            <div class="separete"></div>
                        </div> --}}


                    </div>
                   {{--  <div class="card-footer">
                        
                        <div class="row">
                            <div class="col-xs-12 col-md-6 col-lg-4">
                                
                            </div>
                        </div>
                           
                    </div> --}}
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