@extends('adminlte::page')

@section('title', 'Detalhes')

@section('content_header')
@include('app-invest.components.alerts')

@stop

@section('content')
    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card card-lightblue mb-0">
                    <div class="card-header">
                        <h5 class="card-title">Detalhes do tipo de investimento: <strong>{{ $typeInvestment->name }}</strong></h5>
                    </div>
                    <div class="card-body">                      
                        <form action="{{ route('typeInvestmentsUpdate_post') }}" method="POST" id="form">
                            @csrf
                            <input type="hidden" name="id" value="{{ $typeInvestment->id }}">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xs-6 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="order">Ordem</label>
                                            <input 
                                                type="text" 
                                                class="form-control form-control-sm" 
                                                name="order" 
                                                id="order" 
                                                value={{ $typeInvestment->order }}
                                                required
                                            >                          
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input 
                                                type="text" 
                                                class="form-control form-control-sm" 
                                                name="name" 
                                                id="name" 
                                                value="{{ $typeInvestment->name }}"
                                                required
                                            >                          
                                        </div>
                                        <div class="form-group">
                                            <label for="acronym">Sigla</label>
                                            <input 
                                                type="text" 
                                                class="form-control form-control-sm" 
                                                name="acronym" 
                                                id="acronym" 
                                                value="{{ $typeInvestment->acronym }}"
                                                required
                                            >                          
                                        </div>
                                        <div class="form-group">
                                            <label for="id">Cor</label>
                                            <input 
                                                type="color" 
                                                class="form-control form-control-sm " 
                                                name="color" 
                                                id="color"
                                                value="{{ $typeInvestment->color }}"
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
                                                <a href="{{ route('settingsAppInvest_get') }}" class="btn bg-warning" id="btn-edit">
                                                    Voltar
                                                    <i class="fas fa-arrow-left"></i>
                                                </a>
                                                <button 
                                                type="submit" 
                                                class="btn bg-lightblue"
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