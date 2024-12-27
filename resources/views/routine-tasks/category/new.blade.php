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
                        <h5 class="card-title">Nova categoria</h5>
                    </div>
                    <div class="card-body">                      
                        <form action="{{ route('category_task_post') }}" method="POST" id="form">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xs-6 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="id">Categoria</label>
                                            <input 
                                                type="text" 
                                                class="form-control form-control-sm" 
                                                name="description" 
                                                id="description"
                                                placeholder="Compra mensal, etc..."
                                                value="{{ old('description') }}"       
                                                required
                                            >                          
                                        </div>
                                        <div class="form-group">
                                            <label for="id">Cor</label>
                                            <input 
                                                type="color" 
                                                class="form-control form-control-sm " 
                                                name="color"                                               
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
                                            <a href="{{ route('category_get') }}" class="btn bg-warning btn-sm">
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