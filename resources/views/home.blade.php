@extends('adminlte::page')

@section('title', 'Home')

@section('content_header')

@stop

@section('content')
    <div class="row mt-3">
        <div class="col-12">
            <div class="card card-gray mb-0">
                <div class="card-header">
                    <h5 class="card-title">Aplicações</h5>
                </div>
                <div class="card-body">
                    <div class="row d-flex justify-content-around">                      
                        <a href="{{ route('controlFinanceHome') }}">
                            <div class="card bg-olive mb-2 ml-2 mr-4 mt-2" style="max-width: 10rem; min-width:10rem; min-height:10rem; max-height:10rem;">
                                <div class="card-header text-center">
                                    <div class="info-box-icon">
                                        <span>
                                            <i class="fas fa-hand-holding-usd fa-2x"></i>
                                        </span>
                                    </div>         
                                </div>
                                <div class="card-body">
                                <h5 class=" text-center p-1"><span class="">CONTROL FINANCE</span></h5>
                              
                                </div>
                            </div>
                        </a>

                        {{-- <a href="{{ route('appInvestHome') }}">
                            <div class="card bg-lightblue mb-2 ml-2 mr-4 mt-2" style="max-width: 10rem; min-width:10rem; min-height:10rem; max-height:10rem;">
                                <div class="card-header text-center">
                                    <div class="info-box-icon">
                                        <span>
                                            <i class="fas fa-piggy-bank fa-2x"></i>
                                        </span>
                                    </div>         
                                </div>
                                <div class="card-body">
                                <h5 class=" text-center p-1"><span class="">APP<br> INVEST</span></h5>
                              
                                </div>
                            </div>
                        </a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop


@push('js')
    

    <script>
        $(document).ready(function () {

            }
        );
    </script>   
@endpush
