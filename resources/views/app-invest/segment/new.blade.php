@extends('adminlte::page')

@section('title', 'Categoria')

@section('content_header')
@include('app-invest.components.alerts')

@stop

@section('content')
    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card card-lightblue mb-0">
                    <div class="card-header">
                        <h5 class="card-title">Novo Seguimento</h5>
                    </div>
                    <div class="card-body">                      
                        <form action="{{ route('segmentsCreate_post') }}" method="POST" id="form">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xs-6 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="order">Ordem exibição</label>
                                            <input 
                                                type="number" 
                                                class="form-control form-control-sm" 
                                                name="order" 
                                                id="order" 
                                                min="0" 
                                                max="999" 
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Nome </label>
                                            <input 
                                                type="text" 
                                                class="form-control form-control-sm" 
                                                name="name" 
                                                id="name"
                                                placeholder="Fiis, CDB, Tesouro selic, etc..."
                                                required
                                            >                          
                                        </div>       
                                        
                                        <div class="form-group">
                                            <label for="">Tipo de investimento</label>
                                            <select 
                                                class="form-control form-control-sm" 
                                                name="type_investment_id" 
                                                id="type_investment_id" 
                                                required
                                                >
                                                <option value="">Selecione...</option>
                                                @foreach ($typeInvestments as $type)
                                                    <option value="{{ $type->id }}"
                                                            style="color:{{ $type->color }};"
                                                        >
                                                        {{ $type->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="color">Cor</label>
                                            <input 
                                                type="color" 
                                                class="form-control form-control-sm " 
                                                name="color"
                                                id="color"
                                            >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row ">
                                    <div class="col-xs-6 col-md-6 col-lg-6">
                                        <div class="col-xs-12 col-md-12 col-lg-12 text-left p-0 m-0">
                                            <div class="form-group d-flex justify-content-between">
                                                <a href="{{ route('settingsAppInvest_get') }}" class="btn bg-warning btn-sm" id="btn-edit">
                                                    Voltar
                                                    <i class="fas fa-arrow-left"></i>
                                                </a>
                                                <button 
                                                    type="submit" 
                                                    class="btn bg-lightblue btn-sm"
                                                    id="btn-save"
                                                    >
                                                    Salvar
                                                    <i class="fas fa-save"></i>
                                                </button>
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