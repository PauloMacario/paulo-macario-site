@extends('adminlte::page')

@section('title', 'Não autorizado')

@section('content_header')

@stop

@section('content')
    <div class="row mt-3">
        <div class="col-12">
            <div class="card card-warning mb-0">
                <div class="card-header">
                    <h5 class="card-title">Parado!</h5>
                </div>
                <div class="card-body">
                    <div class="row d-flex justify-content-center">        
                        
                        <div class="col-12 text-center">
                            <img src="{{ asset('/img/stormtrooper_block.webp') }}" title="Stopped!!!" width="120px" height="300px">
                        </div>

                        <div class="col-12 text-center">
                            <p>O que você está fazendo aqui?</p>
                            <p><i class="fas fa-ban"></i><i> Acesso não autorizado!</i></p>
                        </div>                       
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop


@push('js')

@endpush
