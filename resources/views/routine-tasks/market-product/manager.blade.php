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

        .table-header, .table-items, .table-footer {
            border: 2px solid #6d6d6d;
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

        
        .font-total-item {
            font-size: 12px;
            font-style: italic;
            color:#3d3d3d;
            font-weight:bold;
        }

        .font-total-footer {
            font-size: 14px;
            font-style: italic;
            color:#000000;
            font-weight:bold;
        }

        .font-header {
            font-size: 14px;
            font-style: italic;
            color:#000000;
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
                        <h5 class="card-title">Vincular itens ao(s) mercado(s)</h5>
                    </div>
                    <div class="card-body">

                        @php
                            $qtdMarkts = $markets->count();    
                        @endphp

                        <form action="{{ route('market_products_post') }}" method="post">
                            @csrf
                            <div class="row  mt-3 mb-3">
                                <div class="col-12">
                                    <table class="table table-md table-bordered table-striped table-responsive-sm">
                                        <thead>
                                            <tr>
                                                <th class="text-center" width="60%">
                                                   
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input custom-control-input-success mr-3" name="check-all" type="checkbox" id="check-all">
                                                        <label for="check-all" class="custom-control-label"> Sel. Todos</label>
                                                    </div>    
                                                </th>
                                                <th colspan="{{ $qtdMarkts }}" class="text-center">Mercado(s)</th>
                                            </tr>
                                            <tr>
                                                <th class="text-center">Item(s)</th>
                                                @foreach ($markets as $market)
                                                    <td class="text-center">
                                                        {{ $market->name }}                                                                
                                                    </td>
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($products as $product)
                                                <tr>
                                                    <td class="text-center">{{ $product->item }}</td>                                                    
                                                    @foreach ($markets as $market)
                                                        <td class="text-center">                                                            
                                                            <div class="custom-control custom-checkbox">
                                                               
                                                                <input 
                                                                    class="custom-control-input custom-control-input-danger item-products-markets" 
                                                                    name="market[{{ $market->id }}][{{ $product->id }}]" 
                                                                    type="checkbox" id="product-{{ $product->id }}-{{ $market->id }}"

                                                                    @if(isset($marketsProducts[$market->id]) && in_array($product->id, $marketsProducts[$market->id]))
                                                                        checked
                                                                    @endif


                                                                    >
                                                                <label for="product-{{ $product->id }}-{{ $market->id }}" class="custom-control-label"></label>
                                                            </div>
                                                        </td>
                                                    @endforeach
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>                                    
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-xs-12 col-md-12 col-lg-8 d-flex justify-content-between">
                                    <div class="col-xs-12 col-md-4 col-lg-2 text-left p-0 m-0">
                                        <div class="form-group">
                                            <a href="{{ route('market_products_get') }}" class="btn bg-warning btn-sm">
                                                Limpar
                                                <i class="fas fa-broom"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-4 col-lg-2 text-right p-0 m-0">
                                        <div class="form-group">
                                            <button type="submit" class="btn bg-olive btn-sm">
                                                Salvar
                                                <i class="fas fa-save"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>                                         
                        </form>                        
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
@push('js')
    <script src="{{ asset('vendor/bs-custom-file-input/dist/bs-custom-file-input.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery/jquery.mask.min.js') }}"></script>
    <script>

        $(document).ready(function() {
            var checkAll = $("#check-all");

            checkAll.click(function () {

                if ( $(this).is(':checked') ){
                    $('.item-products-markets').prop("checked", true);

                }else{
                    $('.item-products-markets').prop("checked", false);
                    
                }
            })
        });

    </script>
@endpush
