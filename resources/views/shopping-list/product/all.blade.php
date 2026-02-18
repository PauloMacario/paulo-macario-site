@extends('adminlte::page')

@push('css')
    <style>
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
        .italic {
            font-style: italic;
        }
       
    </style>
@endpush

@section('title', 'Listas')

@section('content_header')
@include('shopping-list.components.alerts')
@stop

@section('content')
    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card card-purple mb-0">
                    <div class="card-header">
                        <h5 class="card-title">Produtos</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xs-12 col-md-12 col-lg-12 text-right">
                                <a href="{{ route('newprodutos_get') }}" class="btn bg-purple">
                                    Novo produto 
                                    <i class="fas fa-plus-circle ml-2 mr-2 "></i>
                                </a>
                            </div>
                        </div>

                        @if (! $products->count())
                            <h5>Nenhuma produto cadastrado!</h5>
                        @else
                            <div class="row">
                                <div class="col-xs-12 col-md-12 col-lg-12 text-right">
                                    <table class="table table-sm table-striped mt-2">
                                        <thead>
                                            <tr>
                                                <th class="font-14 text-center">Produto</th>
                                                 <th class="font-14 text-center italic">Categoria</th>
                                                <th class="font-14 text-center" colspan="2">Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($products as $product)
                                                <tr>
                                                    <td class="font-14 text-center">{{ $product->name }}</td>
                                                    <td class="font-12 text-center italic">{{ $product->category->name }}</td>
                                                    <td class="font-14 text-center">
                                                        {{-- <a href="#" class="btn btn-sm btn-warning" readonly>
                                                            <i class="fas fa-edit fa-1x"></i>
                                                        </a> --}}
                                                    </td>
                                                    <td class="font-14 text-center">
                                                        <form action="{{ route('deleteproduto_post') }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="id" value={{ $product->id }}>
                                                            <button type="submit" class="btn btn-sm btn-danger">
                                                                <i class="fas fa-trash fa-1x"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="card-footer">
                        
                        {{-- <div class="row">
                            <div class="col-xs-12 col-md-6 col-lg-4">
                                
                            </div>
                        </div> --}}
                           
                    </div>
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