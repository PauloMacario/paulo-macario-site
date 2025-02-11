@extends('adminlte::page')

@section('title', 'Detalhes')

@section('content_header')
@include('control-finance.components.alerts')

@stop

@section('content')

    @if(isset($installment))

        <div class="row mt-3">
            <div class="col-12">
                <div class="card">
                    <div class="card card-olive mb-0">
                        <div class="card-header">
                            <h5 class="card-title">Detalhes da parcela {{ $installment->description }}</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xs-12 col-md-9 col-lg-9">
                                    <form action="{{ route('deleteInstallment_post') }}" method="POST" id="form-delete" class="text-right">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $installment->id }}">
                                        <button
                                            class="btn btn-danger btn-sm"
                                            id="btn-delete"
                                        >
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        
                            <form action="{{ route('updateInstallment_post') }}" method="POST" id="form">
                                @csrf
                                <input type="hidden" name="id" value="{{ $installment->id }}">
                                <input type="hidden" name="debt_id" value="{{ $installment->debt_id }}">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-4 col-lg-4">
                                            <div class="form-group">
                                                <label for="id">Loja/local</label>
                                                <input 
                                                    type="text" 
                                                    class="form-control form-control-sm fields-disabled" 
                                                    name="locality" 
                                                    id="locality" 
                                                    value="{{ $installment->debt->locality }}" 
                                                    disabled
                                                >
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-md-2 col-lg-2">
                                            <div class="form-group">
                                                <label for="status">Status</label>
                                                <select 
                                                    class="form-control form-control-sm fields-disabled" 
                                                    name="status" 
                                                    id="status" 
                                                    disabled
                                                >                
                                                    <option value="PM" @if($installment->status == "PM") selected @endif>Pagamento feito</option>
                                                    <option value="PP" @if($installment->status == "PP") selected @endif>Pendente pagamento</option>
                                            </select>                
                                            </div>
                                        </div>
        
                                        <div class="col-xs-12 col-md-3 col-lg-3">
                                            <div class="form-group">
                                                <label for="id">Valor</label>
                                                <input 
                                                    type="text" 
                                                    class="form-control form-control-sm fields-disabled" 
                                                    name="value" 
                                                    id="value" 
                                                    value={{ formatMoneyBR($installment->value) }}
                                                    disabled
                                                >
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">    
                                        <div class="col-xs-12 col-md-3 col-lg-3">
                                            <div class="form-group">
                                                <label for="id">Comprador(a)</label>
                                                <select 
                                                    class="form-control form-control-sm fields-disabled" 
                                                    name="shopper_id" 
                                                    id="shopperId" 
                                                    disabled
                                                    >                                    
                                                    @foreach ($shoppers as $shopper)                                  
                                                        <option value="{{ $shopper->id }}" 
                                                            @if($shopper->id == $installment->shopper_id) 
                                                                selected 
                                                            @endif
                                                                style="color:{{ $shopper->color }};"
                                                            >{{ $shopper->name }}</option>
                                                    @endforeach
                                                </select>                                        
                                            </div>
                                        </div>
                                    
                                        <div class="col-xs-12 col-md-2 col-lg-2">
                                            <div class="form-group">
                                                <label for="id">N° da parcela</label>
                                                <input 
                                                    type="number" 
                                                    class="form-control form-control-sm fields-disabled" 
                                                    name="number_installment" 
                                                    id="field-number-installment" 
                                                    value="{{ $installment->number_installment }}" 
                                                    min="1" 
                                                    max="360"
                                                    disabled
                                                >
                                            </div>
                                        </div>
                                    
                                        <div class="col-xs-12 col-md-2 col-lg-2">
                                            <div class="form-group">
                                                <label for="id">Data</label>
                                                <input 
                                                    type="date" 
                                                    class="form-control form-control-sm fields-disabled" 
                                                    name="due_date" 
                                                    id="date" 
                                                    value="{{ $installment->due_date }}"
                                                    disabled
                                                >
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-md-2 col-lg-2">
                                            <div class="form-group">
                                                <label for="id">Data criação</label>
                                                <input 
                                                    type="text" 
                                                    class="form-control form-control-sm fields-disabled" 
                                                    name="created_at" 
                                                    id="created_at" 
                                                    value="{{ $installment->created_at }}"
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
                                                    <a class="btn bg-warning btn-sm" id="btn-edit" data-edit="disabled">
                                                        Editar
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                    </a>
                                                    <button 
                                                        type="submit" 
                                                        class="btn bg-olive btn-sm"
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
    @else
    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card card-olive mb-0">
                    <div class="card-header">
                        <h5 class="card-title"></h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <h3 class="text-center">Não existe!</h3>
                        </div>

                        <div class="row mt3">
                            <a class="btn btn-sm bg-olive" href="{{ route('debtAllMonth_post') }}">Voltar para parcelas do Mês</a>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row ">
                            <div class="col-xs-12 col-md-9 col-lg-9">
                               
                            </div>
                        </div>                           
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
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