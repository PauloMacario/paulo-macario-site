@extends('adminlte::page')
@push('css')

   {{--  <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:ital,wght@0,100..800;1,100..800&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
 --}}
    <style>
       /*  body {
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
        } */

        li {
            list-style-type: none;
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

                        <form action="{{ route('market_products_post') }}" method="POST">
                            @csrf

                            <input type="hidden" name="shoppingListId" id="" value="{{ $shoppingListId }}">

                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <h4 class="text-center" style="color:#3c8dbc;">Selecionar Loja(s)</h4>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <ul>
                                                @foreach ($markets as $market)
                                                    <input 
                                                        class="check-market"
                                                        type="checkbox" 
                                                        id="market-{{ $market->id }}" 
                                                        name="markets[{{ $market->id }}]"
                                                        @if(in_array($market->id , $marketsList)) 
                                                            checked 
                                                        @endif 
                                                    />
                                                    <input 
                                                        type="checkbox" 
                                                        id="nomarket-{{ $market->id }}" 
                                                        name="nomarkets[{{ $market->id }}]"
                                                        @if(! in_array($market->id , $marketsList)) 
                                                            checked 
                                                        @endif 
                                                        style="display:none" 
                                                    />
                                                    <label for="market-{{ $market->id }}" class="ml-2" style="color:{{ $market->color }};">{{ $market->name }}</label><br>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>        
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <h4 class="text-center" style="color:#3c8dbc;">Selecionar Produto(s)</h4>
                                        </div>
                                        @foreach ($productsCategory as $category => $products)        
                                        <div class="col-12 col-md-6 col-lg-4">
                                                <ul>
                                                    <li style="font-weight :bold;">{{ $category }}
                                                        <ul>
                                                            @foreach ($products as $product)
                                                                <li style="font-weight :normal;">
                                                                    <input 
                                                                        type="checkbox" 
                                                                        id="noproducts-{{ $product->productId}}" 
                                                                        name="noproducts[{{ $product->productId }}]" 
                                                                        @if(! in_array($product->productId , $productsList)) 
                                                                            checked 
                                                                        @endif 
                                                                        style="display:none" 
                                                                        />
                                                                    <input 
                                                                        type="checkbox" 
                                                                        class="check-product" 
                                                                        id="products-{{ $product->productId}}" 
                                                                        name="products[{{ $product->productId }}]" 
                                                                        @if(in_array($product->productId , $productsList)) 
                                                                            checked 
                                                                        @endif 
                                                                        />
                                                                    {{ $product->item }}
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                </ul> 
                                                <hr>                                 
                                            </div>                    
                                        @endforeach 
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <button type="submit" class="btn bg-lightblue btn-sm">
                                    salvar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
@push('js')

    <script>
         $(document).ready(function() {
            $('.check-market').on('click', function() {
                $('#no'+this.id).prop('checked', !this.checked)              
            })

            $('.check-product').on('click', function() {
                $('#no'+this.id).prop('checked', !this.checked)              
            })
         })
    </script>

@endpush