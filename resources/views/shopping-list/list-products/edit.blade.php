@extends('adminlte::page')

{{-- @push('css')
    <style>
        table
        a {
            color: rgb(20, 20, 20);
            text-decoration: none;
        }

        a:hover {
            color: #3d9970;
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
        .input-qtd {
            width: 45px;
        }
        .input-price {
            width: 75px;
        }

        input[disabled] {
            background-color: #6e42c11f !important;
        }
        .check
        {
            width: 50px;
        }
        td {
            padding: 2px 2px 2px 5px !important;
        }
        .td-main {
            padding: 2px 2px 10px 5px !important;
        }
        .td-space {
            background-color:#6f42c1;
            padding: 2px !important;
        }       
        .italic {
            font-style: italic;
        }
        .buy {
            background-color: #6e42c180;
            text-decoration: line-through;
        }
        .buy-checked {
            background-color: #814edf;
            text-decoration: none;
            color: #fff;
        }
        .no-buy {
            background-color: #ffffff;
            text-decoration:none;
            color: rgb(20, 20, 20);
        }
        input[type="text"] {
            width: 70px;
            height: 30px;
            padding: 5px 10px;            
            border: 1px solid #6f42c1;
            border-radius: 4px;            
            font-size: 12px;
        }
        input[type="number"] {
            width: 45px;
            height: 30px;
            padding: 5px 10px;            
            border: 1px solid #6f42c1;
            border-radius: 4px;            
            font-size: 12px;
        }
    </style>
@endpush --}}

@section('title', 'Listas')

@section('content_header')
@include('shopping-list.components.alerts')
@stop

@section('content')
    <div class="row mt-3">
        <div class="col-12">
            <form action="{{ route('lista_atualiza_all_post') }}" method="POST">
                            @csrf
            <div class="card">
                <div class="card card-purple mb-0">
                    <div class="card-header">
                        <h5 class="card-title">Editar lista</h5>
                    </div>
                    <div class="card-body">                      
                            <table class="table table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th>Produto</th>
                                        <th>Selecionado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($listProducts as $item)
                                        @if($loop->first)
                                            <div class="row ">
                                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                                    <div class="form-group">
                                                        <label for="name">Nome da Lista</label>
                                                        <input type="hidden" name="list_product_id" value="{{ $item->id }}">                                            
                                                        <input 
                                                            type="text" 
                                                            class="form-control form-control-sm" 
                                                            name="list[{{ $item->list_id }}]" 
                                                            id="inputList{{ $item->id }}"
                                                            value="{{ $item->list_name }}"                                            
                                                            required
                                                        >                          
                                                    </div>
                                                </div>
                                            </div>
                                        @endif   
                                        <tr>
                                            <td>
                                                <input 
                                                    type="text" 
                                                    class="form-control form-control-sm" 
                                                    name="product[{{ $item->product_id }}]" 
                                                    id="inputProd-{{ $item->id }}"
                                                    value="{{ $item->product_name }}"                                            
                                                    required
                                                > 
                                            </td>
                                            <td class="text-center">
                                                <input type="checkbox" class="check" name="productIncluded[{{ $item->product_id }}]" id="check-{{ $item->id }}" @if($item->included == 'Y') checked  @endif>
                                            </td>
                                        </tr>                                               
                                    @endforeach                                        
                                </tbody>
                            </table>
                       
                    </div>
                    <div class="card-footer">
                        <div class="row ">
                            <div class="col-xs-6 col-md-6 col-lg-6">
                                <div class="col-xs-12 col-md-12 col-lg-12 text-left p-0 m-0">
                                    <div class="form-group d-flex justify-content-between">
                                        <a href="{{ route('listas_get') }}" class="btn bg-warning btn-sm" id="btn-edit">
                                            Voltar
                                            <i class="fas fa-arrow-left"></i>
                                        </a>                                        
                                        <button 
                                            type="submit" 
                                            class="btn bg-purple btn-sm"
                                            id="btn-save"
                                            >
                                            Salvar
                                            <i class="fas fa-save"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>                           
                    </div>
                </div>
            </div>

        </form>
        </div>
    </div>
@stop

@push('js')

    <script src="{{ asset('vendor/jquery/jquery.mask.min.js') }}"></script>
    <script>
        $(document).ready(function() {

        });
       
       

    </script>
@endpush