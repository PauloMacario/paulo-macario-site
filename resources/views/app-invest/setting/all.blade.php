@extends('adminlte::page')

@push('css')
    <style>
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
    </style>
@endpush

@section('title', 'Configurações')

@section('content_header')
    @include('app-invest.components.alerts')
@stop

@section('content')
    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card card-lightblue mb-0">
                    <div class="card-header">
                        <h5 class="card-title">Configurações</h5>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="card">
                                    <div class="card  mb-0">
                                        <div class="card-header d-flex justify-content-between">
                                            <div>
                                                <h5 class="card-title">Tipos de investimentos</h5>
                                            </div>
                                            <a href="{{ route('typeInvestmentsNew_get') }}" class="btn btn-sm bg-lightblue">
                                                Criar 
                                                <i class="fas fa-plus-circle"></i>
                                            </a>
                                        </div>
                                        <div class="card-body">        
                                            <table class="table table-sm table-striped table-responsive">
                                                <thead>
                                                        <th class="font-14 text-center" width="60%">Nome</th>
                                                        <th class="font-14 text-center" width="10%">Ordem</td>
                                                        <th class="font-14 text-center" width="15%">Editar</th>
                                                    </tr>
                                                </thead>                    
                                                <tbody>
                                                    @foreach ( $typeInvestments as $type )
                                                        <tr>
                                                            <td class="font-14 text-center">
                                                                <a href="" style="color:{{ $type->color }};">
                                                                    {{ $type->name }} - {{ $type->acronym }}
                                                                </a>
                                                            </td>
                                                            <td class="font-14 text-center">{{ $type->order }}</td>                                                            
                                                            <td class="font-18 text-center">
                                                                <a href="{{ route('typeInvestmentsShow_get', ['id' => $type->id]) }}">
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

                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="card">
                                    <div class="card  mb-0">
                                        <div class="card-header d-flex justify-content-between">
                                            <div>
                                                <h5 class="card-title">Seguimentos</h5>
                                            </div>
                                            <a href="{{ route('segmentsNew_get') }}" class="btn btn-sm bg-lightblue">
                                                Criar 
                                                <i class="fas fa-plus-circle"></i>
                                            </a>
                                        </div>
                                        <div class="card-body">        
                                            <table class="table table-sm table-striped table-responsive">
                                                <thead>
                                                    <tr>
                                                        <th class="font-14 text-center" width="60%">Nome</th>
                                                        <th class="font-14 text-center" width="10%">Ordem</th>
                                                        <th class="font-14 text-center" width="15%">Editar</th>
                                                    </tr>
                                                </thead>                    
                                                <tbody>
                                                    @foreach ( $segments as $segment )
                                                        <tr>
                                                            <td class="font-14 text-center">
                                                                <a href="" style="color:{{ $segment->color }};">
                                                                    {{ $segment->name }}
                                                                </a>
                                                            </td>
                                                            <td class="font-14 text-center">{{ $segment->order }}</td>
                                                            <td class="font-18 text-center">
                                                                <a href="{{ route('segmentsShow_get', ['id' => $segment->id]) }}">
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

                            <div class="ol-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="card">
                                    <div class="card  mb-0">
                                        <div class="card-header d-flex justify-content-between">
                                            <div>
                                                <h5 class="card-title">Investimentos</h5>
                                            </div>
                                            <a href="{{ route('investmentsNew_get') }}" class="btn btn-sm bg-lightblue">
                                                Criar 
                                                <i class="fas fa-plus-circle"></i>
                                            </a>
                                        </div>
                                        <div class="card-body">        
                                            <table class="table table-sm table-striped table-responsive">
                                                <thead>
                                                    <tr>
                                                        <th class="font-14 text-center" width="60%">Nome</th>
                                                        <th class="font-14 text-center" width="10%">Ordem</th>
                                                        <th class="font-14 text-center" width="15%">Editar</th>
                                                    </tr>
                                                </thead>                    
                                                <tbody>
                                                    @foreach ( $investments as $investment )
                                                        <tr>
                                                            <td class="font-14 text-center">
                                                                <a href="" style="color:{{ $investment->color }};">
                                                                    {{ $investment->name }}
                                                                </a>
                                                            </td>
                                                            <td class="font-14 text-center">{{ $investment->order }}</td>
                                                            <td class="font-18 text-center">
                                                                <a href="{{ route('investmentsShow_get', ['id' => $investment->id]) }}">
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