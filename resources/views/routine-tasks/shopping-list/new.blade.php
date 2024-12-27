@extends('adminlte::page')

@section('title', 'Categoria')

@section('content_header')
    @include('routine-tasks.components.alerts')
@stop

@section('content')
    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card card-lightblue mb-0">
                    <div class="card-header">
                        <h5 class="card-title">Nova lista</h5>
                    </div>
                    <div class="card-body">                      
                        <form action="{{ route('shopping_list_post') }}" method="POST" id="form">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xs-6 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="id">Nome da lista</label>
                                            <input 
                                                type="text" 
                                                class="form-control form-control-sm" 
                                                name="name" 
                                                id="name"
                                                placeholder="Compra mensal, etc..."
                                                value="{{ old('name') }}"       
                                                required
                                            >                          
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row ">
                                    <div class="col-xs-6 col-md-6 col-lg-6">                                        
                                        <div class="form-group d-flex justify-content-between">
                                            <button 
                                                type="submit" 
                                                class="btn bg-lightblue btn-sm"
                                                id="btn-save"
                                                >
                                                Salvar
                                                <i class="fas fa-save"></i>
                                            </button>
                                            <a href="{{ route('shopping_list_get') }}" class="btn bg-warning btn-sm">
                                                Voltar
                                                <i class="fas fa-arrow-left"></i>
                                            </a>
                                        </div>                                       
                                    </div>
                                </div>                           
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@push('js')

@endpush