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
                        <h5 class="card-title">Lojas</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <a href="{{ route('market_get') }}" class="btn btn-sm bg-lightblue">
                                    Criar nova
                                    <i class="fas fa-plus-circle"></i>
                                </a>                               
                            </div>
                        </div>

                        <div class="row mt-4">
                            <table class="table table-sm table-striped table-responsive">
                                <thead>
                                        <th class="font-14 text-center" width="60%">Loja</th>                                    
                                        <th class="font-14 text-center" width="15%">Editar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ( $markets as $market )
                                        <tr>
                                            <td class="font-14 text-center">
                                                {{ $market->name }}
                                            </td>                                       
                                            <td class="font-18 text-center">
                                                <a href="{{ route('detaiMarket_get', ['id' => $market->id]) }}">
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