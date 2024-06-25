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

@section('title', 'TITLEXXXXX')

@section('content_header')
    @include('components.alerts')
@stop

@section('content')
    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card card-olive mb-0">
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
                                                <h5 class="card-title">Categorias</h5>
                                            </div>
                                            <a href="{{ route('category_get') }}" class="btn btn-sm bg-olive">Criar <i class="fas fa-plus-circle"></i></a>
                                        </div>
                                        <div class="card-body">
        
                                            <table class="table table-sm table-striped table-responsive">
                                                <thead>
                                                    <tr>
                                                        <th class="font-18 text-center" width="10%">Número</th>
                                                        <th class="font-18 text-center" width="70%">Nome</th>
                                                        <th class="font-18 text-center" width="70%">Status</th>
                                                        <th class="font-18 text-center" width="20%">Editar</th>
                                                    </tr>
                                                </thead>
                    
                                                <tbody>
                                                    @foreach ( $categories as $category )
                                                        <tr>
                                                            <td class="font-18 text-center">{{ $category->id }}</td>
                                                            <td class="font-18 text-center">
                                                                <a href="">
                                                                    {{ $category->description }}
                                                                </a>
                                                            </td>
                                                            <td class="font-18 text-center">
                                                                @if($category->status == 'E')
                                                                    <i class="fas fa-check-circle" style="color:#3d9970;" title="Ativado"></i>
                                                                @else
                                                                    <i class="fas fa-ban" style="color:#bb1b1b;" title="Desativado"></i>
                                                                @endif
                                                            </td>
                                                            <td class="font-20 text-center">
                                                                <a href="{{ route('detailCategory_get', ['id' => $category->id]) }}">
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
                                                <h5 class="card-title">Formas pagamento</h5>
                                            </div>
                                            <a href="{{ route('paymentType_get') }}" class="btn btn-sm bg-olive">Criar <i class="fas fa-plus-circle"></i></a>
                                        </div>
                                        <div class="card-body">
        
                                            <table class="table table-sm table-striped table-responsive">
                                                <thead>
                                                    <tr>
                                                        <th class="font-18 text-center" width="10%">Número</th>
                                                        <th class="font-18 text-center" width="70%">Nome</th>
                                                        <th class="font-18 text-center" width="70%">Status</th>
                                                        <th class="font-18 text-center" width="20%">Editar</th>
                                                    </tr>
                                                </thead>
                    
                                                <tbody>
                                                    @foreach ( $paymentTypes as $pay )
                                                        <tr>
                                                            <td class="font-18 text-center">{{ $pay->id }}</td>
                                                            <td class="font-18 text-center">
                                                                <a href="">
                                                                    {{ $pay->description }}
                                                                </a>
                                                            </td>
                                                            <td class="font-18 text-center">
                                                                @if($pay->status == 'E')
                                                                    <i class="fas fa-check-circle" style="color:#3d9970;" title="Ativado"></i>
                                                                @else
                                                                    <i class="fas fa-ban" style="color:#bb1b1b;" title="Desativado"></i>
                                                                @endif
                                                            </td>
                                                            <td class="font-20 text-center">
                                                                <a href="{{ route('detailPaymentType_get', ['id' => $pay->id]) }}">
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