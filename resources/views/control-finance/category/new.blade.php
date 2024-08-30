@extends('adminlte::page')

@section('title', 'Categoria')

@section('content_header')
@include('control-finance.components.alerts')

@stop

@section('content')
    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card card-olive mb-0">
                    <div class="card-header">
                        <h5 class="card-title">Nova categoria</h5>
                    </div>
                    <div class="card-body">                      
                        <form action="{{ route('category_post') }}" method="POST" id="form">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xs-6 col-md-6 col-lg-6">

                                        <div class="form-group">
                                            <label for="id">Ordem exibição</label>
                                            <input type="number" class="form-control form-control-sm"  name="order" id="order" min="0" max="999" required>
                                        </div>                 

                                        <div class="form-group">
                                            <label for="id">Descrição</label>
                                            <input 
                                                type="text" 
                                                class="form-control form-control-sm" 
                                                name="description" 
                                                id="description"
                                                placeholder="Saúde, Carro, Alimentação, etc..."
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

                                        <div class="form-group">
                                            <label for="id">Status</label>
                                            <select 
                                                class="form-control form-control-sm" 
                                                name="status" 
                                                id="status"
                                                required
                                                >
                                                <option value="D">Desativado</option>                                 
                                                <option value="E">Ativado</option>
                                            </select>                                        
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row ">
                                    <div class="col-xs-12 col-md-9 col-lg-9">
                                        <div class="col-xs-12 col-md-12 col-lg-12 text-left p-0 m-0">
                                            <div class="form-group d-flex justify-content-between">
                                                <button 
                                                    type="submit" 
                                                    class="btn bg-olive btn-sm"
                                                    id="btn-save"
                                                    >
                                                    Salvar
                                                    <i class="fas fa-save"></i>
                                                </button>
                                                <a href="{{ route('settingAll_get') }}" class="btn bg-warning btn-sm" id="btn-edit">
                                                    Voltar
                                                    <i class="fas fa-arrow-left"></i>
                                                </a>
                                            </div>
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