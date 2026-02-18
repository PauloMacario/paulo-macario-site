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
                        <h5 class="card-title">Listas de compras</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xs-12 col-md-12 col-lg-12 text-right">
                                <a href="" class="btn bg-purple">
                                    Nova Lista 
                                    <i class="fas fa-plus-circle ml-2 mr-2 "></i>
                                </a>
                            </div>
                        </div>

                        @if (! $lists->count())
                            <h5>Nenhuma lista criada!</h5>
                        @else
                            <div class="row mt-3">
                                <div class="col-xs-12 col-md-12 col-lg-12 text-right">
                                    <table class="table table-sm table-striped ">
                                        <thead>
                                            <tr>
                                                <th class="font-14 text-center" width="60%">Nome</th>
                                                <th class="font-14 text-center" width="15%">Editar</th>
                                            </tr>
                                        </thead>                    
                                        <tbody>
                                            @foreach ($lists as $list)
                                                <tr>
                                                    <td class="font-14 text-center">
                                                        <a class="btn btn-info btn-block btn-sm " href="{{ route('lista_produtos_get', ['id' => $list->id]) }}">
                                                            {{ $list->name }}</td>
                                                        </a>
                                                    <td class="font-14 text-center" style="vertical-align:middle;">
                                                        <a href="{{ route('lista_edit_produtos_get', ['id' => $list->id]) }}" class="btn btn-sm btn-warning">
                                                            <i class="fas fa-edit fa-1x"></i>
                                                        </a>
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