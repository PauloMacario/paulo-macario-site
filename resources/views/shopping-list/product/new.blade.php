@extends('adminlte::page')

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
                        <h5 class="card-title">Novo produto</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('createproduto_post') }}" method="POST" id="form">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xs-6 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="categoryId" style="color:#6f42c1;">Categoria</label>
                                            <select class="form-control form-control-sm" name="category_id" id="categoryId" required>
                                                <option value="">Selecione...</option>
                                                @foreach ($categories as $category)
                                                
                                                    <option value="{{ $category->id }}">
                                                            {{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>                                                   

                                        <div class="form-group">
                                            <label for="name">Nome</label>
                                            <input 
                                                type="text" 
                                                class="form-control form-control-sm" 
                                                name="name" 
                                                id="name"
                                                placeholder="Arroz, Café, etc..."
                                                required
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
                                                <a href="{{ route('produtos_get') }}" class="btn bg-warning btn-sm" id="btn-edit">
                                                    Voltar
                                                    <i class="fas fa-arrow-left"></i>
                                                </a>
                                                <button 
                                                    type="submit" 
                                                    class="btn bg-purple btn-sm"
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
                    <div class="card-footer">                      
                           
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