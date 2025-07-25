@extends('adminlte::page')

@section('title', 'Detalhes')

@section('content_header')
@include('control-finance.components.alerts')

@stop

@section('content')
    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card card-olive mb-0">
                    <div class="card-header">
                        <h5 class="card-title">Detalhes da categoria: <strong>{{ $category->description }}</strong></h5>
                    </div>
                    <div class="card-body">                      
                        <form action="{{ route('updateCategory_post') }}" method="POST" id="form">
                            @csrf
                            <input type="hidden" name="id" value="{{ $category->id }}">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xs-6 col-md-6 col-lg-6">

                                        <div class="form-group">
                                            <label for="id">Ordem exibição</label>
                                            <input 
                                                type="text" 
                                                class="form-control form-control-sm" 
                                                name="order" 
                                                id="order" 
                                                value={{ $category->order }}
                                            >                          
                                        </div>

                                        <div class="form-group">
                                            <label for="id">Descrição</label>
                                            <input 
                                                type="text" 
                                                class="form-control form-control-sm" 
                                                name="description" 
                                                id="description" 
                                                value="{{ $category->description }}"
                                            >                          
                                        </div>

                                        <div class="form-group">
                                            <label for="id">Cor</label>
                                            <input 
                                                type="color" 
                                                class="form-control form-control-sm " 
                                                name="color" value="{{ $category->color }}"                                               
                                            >
                                        </div>

                                        <div class="form-group">
                                            <label for="id">img</label>
                                            <input 
                                                type="text" 
                                                class="form-control form-control-sm " 
                                                name="img" value="{{ $category->img }}"                                               
                                            >
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="id">Status</label>
                                            <select 
                                                class="form-control form-control-sm" 
                                                name="status" 
                                                id="status"
                                                >
                                                <option value="D" @if($category->status  == 'D') selected @endif>Desativado</option>                                 
                                                <option value="E" @if($category->status  == 'E') selected @endif>Ativado</option>
                                            </select>                                        
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row ">
                                    <div class="col-xs-6 col-md-6 col-lg-6">
                                        <div class="col-xs-12 col-md-12 col-lg-12 text-left p-0 m-0">
                                            <div class="form-group d-flex justify-content-between">                                               
                                                <a href="{{ route('settingAll_get') }}" class="btn bg-warning" id="btn-edit">
                                                    Voltar
                                                    <i class="fas fa-arrow-left"></i>
                                                </a>
                                                <button 
                                                type="submit" 
                                                class="btn bg-olive"
                                                id="btn-save"
                                                >
                                                Atualizar
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
  {{--   <script src="{{ asset('vendor/jquery/jquery.mask.min.js') }}"></script>
    <script>
        $(document).ready(function() {

            $('#value').mask('000.000,00', {reverse: true});

            $('#btn-edit').on('click', function() {

                var btnEdit = $('#btn-edit').attr('data-edit');

                var acao = (btnEdit == 'disabled') ? false : true;

                $('.fields-disabled').each(function(index) {
                    $(this).attr('disabled', acao);
                })

                if (!acao) {
                        $('#btn-save').css('opacity', '1')
                        $('#btn-delete').css('opacity', '0')
                        $('#btn-edit').attr('data-edit', 'enabled').text('Não editar')
                } else {
                    $('#btn-save').css('opacity', '0')
                    $('#btn-delete').css('opacity', '1')
                    $('#btn-edit').attr('data-edit', 'disabled').text('Editar')
                }
            })

        });
    </script> --}}
@endpush