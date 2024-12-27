@extends('adminlte::page')

@section('title', 'Categoria')

@section('content_header')
@include('control-finance.components.alerts')

@stop

@section('content')
    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card card-lightblue mb-0">
                    <div class="card-header">
                        <h5 class="card-title">Produtos</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <a href="{{ route('product_get') }}" class="btn btn-sm bg-lightblue">
                                    Criar novo
                                    <i class="fas fa-plus-circle"></i>
                                </a>                               
                            </div>
                        </div>
                        <div class="row mt-4">
                            <table class="table table-sm table-striped table-responsive">
                                <thead>
                                        <th class="font-14 text-center" width="45%">Produto</th>     
                                        <th class="font-14 text-center" width="45%">Categoria</th>                                   
                                        <th class="font-14 text-center" width="10%">Editar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ( $products as $product )
                                        <tr>
                                            <td class="font-14 text-center">
                                                {{ $product->item }}
                                            </td>             
                                            <td class="font-14 text-center">
                                                {{ $product->category->description }}
                                            </td>                                
                                            <td class="font-18 text-center">
                                                <a href="{{ route('detailProduct_get', ['id' => $product->id]) }}">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>                    
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@push('js')

@endpush