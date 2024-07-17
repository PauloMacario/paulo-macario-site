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
                        <h5 class="card-title">Detalhes da compra {{ $debt->description }}</h5>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-xs-12 col-md-9 col-lg-9">
                                <form action="{{ route('deleteDebt_post') }}" method="POST" id="form-delete" class="text-right">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $debt->id }}">
                                    <button
                                        class="btn btn-danger btn-sm"
                                        id="btn-delete"
                                    >
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                       
                        <form action="{{ route('updateDebt_post') }}" method="POST" id="form">
                            @csrf
                            <input type="hidden" name="id" value="{{ $debt->id }}">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xs-12 col-md-4 col-lg-4">
                                        <div class="form-group">
                                            <label for="id">Loja/local</label>
                                            <input 
                                                type="text" 
                                                class="form-control fields-disabled" 
                                                name="locality" 
                                                id="locality" 
                                                value="{{ $debt->locality }}" 
                                                disabled
                                            >
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-2 col-lg-2">
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select 
                                                class="form-control fields-disabled" 
                                                name="status" 
                                                id="status" 
                                                disabled
                                            >                
                                                <option value="E">Habilitado</option>
                                                <option value="D">Desabilitado</option>
                                                <option value="PM">Pagamento feito</option>
                                                <option value="PP">Pendente pagamento</option>
                                        </select>                
                                        </div>
                                    </div>
    
                                    <div class="col-xs-12 col-md-3 col-lg-3">
                                        <div class="form-group">
                                            <label for="id">Valor</label>
                                            <input 
                                                type="text" 
                                                class="form-control fields-disabled" 
                                                name="total_value" 
                                                id="value" 
                                                value="{{ formatMoneyBR($debt->total_value) }}"
                                                disabled
                                            >
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">    

                                    <div class="col-xs-12 col-md-3 col-lg-3">
                                        <div class="form-group">
                                            <label for="id">Categoria</label>
                                            <select 
                                                class="form-control fields-disabled" 
                                                name="category_id" 
                                                id="categoryId" 
                                                disabled
                                                >                                      
                                                @foreach ($categories as $category)                                  
                                                    <option value="{{ $category->id }}" 
                                                        @if($category->id == $debt->category_id) selected @endif
                                                        @if(isset($category->style->color))
                                                            style="color:{{ $category->style->color }};"    
                                                        @endif
                                                    >
                                                    {{ $category->description }}</option>
                                                @endforeach
                                            </select>                                        
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-md-3 col-lg-3">
                                        <div class="form-group">
                                            <label for="id">Comprador(a)</label>
                                            <select 
                                                class="form-control fields-disabled" 
                                                name="shopper_id" 
                                                id="shopperId" 
                                                disabled
                                                >
                                                <option value="" selected>Selecione...</option>                                       
                                                @foreach ($shoppers as $shopper)                                  
                                                    <option value="{{ $shopper->id }}" @if($shopper->id == $debt->shopper_id) selected @endif>{{ $shopper->name }}</option>
                                                @endforeach
                                            </select>                                        
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-3 col-lg-3">
                                        <div class="form-group">
                                            <label for="id">Data</label>
                                            <input 
                                                type="date" 
                                                class="form-control fields-disabled" 
                                                name="date" 
                                                id="date" 
                                                value="{{ $debt->date }}"
                                                disabled
                                            >
                                        </div>
                                    </div>
                                </div>
                                   
                                <div class="row">
                                    <div class="col-xs-12 col-md-3 col-lg-3">
                                        <div class="form-group">
                                            <label for="id">Forma de pagamento</label>
                                            <select class="form-control" name="payment_type_id" id="paymentTypeId" disabled>                           
                                                @foreach ($paymentTypes as $paymentType)                                  
                                                    <option value="{{ $paymentType->id }}" @if($paymentType->id == $debt->payment_type_id) selected @endif >{{ $paymentType->description }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-3 col-lg-3">
                                        <div class="form-group">
                                            <label for="id">Número parcelas</label>
                                            <input type="number" class="form-control"  name="number_installments" id="field-number-installments" value="{{ $debt->number_installments }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-3 col-lg-3">
                                        <div class="form-group">
                                            <label for="id">Rateio ativo?</label>
                                            <input type="text" class="form-control" name="prorated_debt" id="locality" 
                                            @if ($debt->prorated_debt == 0) 
                                                value="Desativado" 
                                            @else 
                                                value="Ativado" 
                                            @endif                                           
                                            disabled
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
                                                <a class="btn bg-warning" id="btn-edit" data-edit="disabled">
                                                    Editar
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>
                                                <button 
                                                    type="submit" 
                                                    class="btn bg-olive"
                                                    id="btn-save"
                                                    style="opacity:0;"

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
    <script src="{{ asset('vendor/jquery/jquery.mask.min.js') }}"></script>
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
    </script>
@endpush