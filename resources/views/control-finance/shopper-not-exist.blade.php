@extends('adminlte::page')

@section('title', 'Home')

@section('content_header')
@stop

@section('content')

    <div class="row mt-3">
        <div class="col-12">
            <div class="card bg-olive">
                <div class="card card-olive mb-0">
                    <div class="card-header">
                        <h5 class="card-title">Ínicio</h5>
                    </div>
                    <div class="card-body">
                        <h5 class="text-center" style="color:#3d9970;">Você precisa criar um "comprador(a)" para poder usar o sistema." </h5>
                        <h5 class="text-center mt-5" style="color:#3d9970;">Você também pode criar categorias de compras e formas de pagamento." </h5>
                        <div class="d-flex justify-content-center mt-5">
                            <a href="{{ route('settingAll_get') }}" class="btn btn-sm bg-olive">Criar <i class="fas fa-plus-circle"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

