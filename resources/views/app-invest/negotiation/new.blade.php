@extends('adminlte::page')

@push('css')

    <link rel="stylesheet" href="{{ asset('vendor/sweetalert2/dist/sweetalert2.min.css') }}">

    <style>
        .bold {
            font-weight: bold
        }

        option {
            font-weight: bold
        }
    </style>

@endpush

@section('title', 'Divida')

@section('content_header')
    @include('control-finance.components.alerts')
@stop

@section('content')
    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card card-lightblue mb-0">
                    <div class="card-header">
                        <h5 class="card-title">Nova negociação</h5>
                    </div>
                    <form action="{{ route('negotiationCreate_post') }}" method="POST" id="form">
                        @csrf
                        <div class="card-body">                            
                            <div class="row"> 
                                <div class="col-xs-12 col-md-4 col-lg-4"> 
                                    <div class="form-group">
                                        <label for="id">Novo investimento?</label>
                                        <select class="form-control form-control-sm" name="new-investment" id="new-investment" required>
                                            <option value="B">Selecione...</option>      
                                            <option value="N">Não</option>
                                            <option value="Y">Sim</option>                                       
                                        </select>
                                    </div>
                                </div>                                                                        
                                <div class="col-xs-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="id">Investimento</label>
                                        <select class="form-control form-control-sm field-block field-list-invest" name="investment-id" id="investment" disabled>
                                            <option value="">Selecione...</option>
                                            @foreach ($investments as $investment)                                               
                                                    <option value="{{ $investment->id }}" style="color:{{ $investment->color }};">
                                                        {{ $investment->name }}
                                                    </option>                                             
                                            @endforeach
                                        </select>
                                    </div>
                                </div>             
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-md-4 col-lg-4 field-new-investment">
                                    <div class="form-group ">
                                        <label for="id">Novo investimento</label>
                                        <input type="text" class="form-control form-control-sm field-block field-new-invest"  name="invest-name" id="invest-name" disabled>
                                    </div>
                                </div>     
                                <div class="col-xs-12 col-md-4 col-lg-4 field-new-investment">
                                    <div class="form-group ">
                                        <label for="id">Tipo de Investimento</label>
                                        <select class="form-control form-control-sm field-block field-new-invest" name="invest-type" id="invest-type-name" disabled>
                                            <option value="">Selecione...</option>
                                            @foreach ($typeInvestments as $typeInvestment)                                               
                                                    <option value="{{ $typeInvestment->id }}" style="color:{{ $typeInvestment->color }};">
                                                        {{ $typeInvestment->name }}
                                                    </option>                                             
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-2 col-lg-2 field-new-investment">                              
                                    <div class="form-group">
                                        <label for="id">Cor</label>
                                        <input type="color" class="form-control form-control-sm field-block field-new-invest"  name="invest-color" id="invest-color" disabled>
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-xs-12 col-md-3 col-lg-3">
                                    <div class="form-group">
                                        <label for="id">Data</label>
                                        <input type="date" class="form-control form-control-sm field-block field-negotiation"  name="date" disabled>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-md-2 col-lg-2">
                                    <div class="form-group">
                                        <label for="id">Tipo negócio</label>
                                        <select class="form-control form-control-sm field-block field-negotiation" name="type-negotiation" disabled>
                                            <option value="">Selecione...</option>
                                            <option value="C">Compra</option>
                                            <option value="V">Venda</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-md-2 col-lg-2">
                                    <div class="form-group">
                                        <label for="id">Quantidade</label>
                                        <input type="text" class="form-control form-control-sm field-block field-negotiation"  name="quantity" id="quantity" disabled>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-md-3 col-lg-3">
                                    <div class="form-group">
                                        <label for="id">Valor total</label>
                                        <input type="text" class="form-control form-control-sm field-block field-negotiation"  name="value" id="value" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row ">
                                <div class="col-xs-12 col-md-12 col-lg-10 d-flex justify-content-between">
                                    <div class="col-xs-12 col-md-4 col-lg-2 text-left p-0 m-0">
                                        <div class="form-group">
                                            <a href="{{ route('negotiationNew_get') }}" class="btn bg-warning btn-sm ">
                                                Limpar
                                                <i class="fas fa-broom"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-4 col-lg-2 text-right p-0 m-0">
                                        <div class="form-group">
                                            <button type="submit" class="btn bg-lightblue btn-sm field-block field-negotiation" disabled>
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
@stop

@push('js')
<script src="{{ asset('vendor/bs-custom-file-input/dist/bs-custom-file-input.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery/jquery.mask.min.js') }}"></script>
    <script>

        $(document).ready(function() {
            $('#value').mask('000.000,00', {reverse: true});          
            $('#quantity').mask('000.00', {reverse: true});

            $('#new-investment').on('change', function() {
                
                if ($(this).val() == 'B') {
                   blockFields()
                }

                if ($(this).val() == 'N') {
                    unlockFieldsListInvest()
                }

                if ($(this).val() == 'Y') {
                    unlockFieldsNewInvest()
                }                
            });

            function blockFields() {

                var fieldsblock = $('.field-block')
                fieldsblock.each(function(i){
                    $(this).attr('disabled', true).attr('required', false)
                })
            }

            function unlockFieldsListInvest() {

                var fieldsListInvest = $('.field-list-invest')
                
                fieldsListInvest.each(function(i){
                    $(this).attr('disabled', false).attr('required', true)
                })

                blockFieldsNewInvest()

                unlockFieldsNegotiation()
            }

            function unlockFieldsNewInvest() {

                var fieldsNewInvest = $('.field-new-invest')

                fieldsNewInvest.each(function(i){
                    $(this).attr('disabled', false).attr('required', true)
                })

                blockFieldsListInvest()

                unlockFieldsNegotiation()
            }

            function blockFieldsListInvest() {

                var fieldsListInvest = $('.field-list-invest')

                fieldsListInvest.each(function(i){
                    $(this).attr('disabled', true).attr('required', false)
                })
            }


            function blockFieldsNewInvest() {
                
                var fieldsNewInvest = $('.field-new-invest')

                fieldsNewInvest.each(function(i){
                    $(this).attr('disabled', true).attr('required', false)
                })
            }

            function unlockFieldsNegotiation(){
                var fieldsNegotiation = $('.field-negotiation')

                fieldsNegotiation.each(function(i){
                    $(this).attr('disabled', false).attr('required', true)
                })
            }
        });

    </script>
@endpush
