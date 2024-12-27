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
                        <h5 class="card-title">Novo produto</h5>
                    </div>
                    <div class="card-body">                      
                        <form action="{{ route('product_post') }}" method="POST" id="form">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xs-6 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <select class="form-control form-control-sm" name="category_id" id="categoryId" required>
                                                <option value="">Selecione...</option>
                                                @foreach ($categories as $category)                                                    
                                                    <option value="{{ $category->id }}"
                                                        style="color:{{ $category->color }};"
                                                    >
                                                        {{ $category->description }}
                                                    </option>                                                   
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="id">Item</label>
                                            <input 
                                                type="text" 
                                                class="form-control form-control-sm" 
                                                name="item" 
                                                id="item"
                                                placeholder=""
                                                value="{{ old('item') }}"       
                                                required
                                            >                          
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
                                                    class="btn bg-lightblue btn-sm"
                                                    id="btn-save"
                                                    >
                                                    Salvar
                                                    <i class="fas fa-save"></i>
                                                </button>
                                                <a href="{{ route('routineTaskHome') }}" class="btn bg-warning btn-sm" id="btn-edit">
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