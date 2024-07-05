@extends('adminlte::page')

@section('title', 'TITLEXXXXX')

@section('content_header')
@include('components.alerts')

@stop

@section('content')
    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card card-olive mb-0">
                    <div class="card-header">
                        <h5 class="card-title">Detalhes da Forma de pagamento: <strong>{{ $paymentType->description }}</strong></h5>
                    </div>
                    <div class="card-body">                      
                        <form action="{{ route('updatePaymentType_post') }}" method="POST" id="form">
                            @csrf
                            <input type="hidden" name="id" value="{{ $paymentType->id }}">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xs-6 col-md-6 col-lg-6">

                                        <div class="form-group">
                                            <label for="id">Ordem exibição</label>
                                            <input 
                                                type="text" 
                                                class="form-control" 
                                                name="order" 
                                                id="order" 
                                                value={{ $category->order }}
                                            >                          
                                        </div>

                                        <div class="form-group">
                                            <label for="id">Forma de pagamento</label>
                                            <input 
                                                type="text" 
                                                class="form-control" 
                                                name="description" 
                                                id="description" 
                                                value={{ $paymentType->description }}
                                            >                                                
                                        </div>

                                        <div class="form-group">
                                            <label for="id">Dia de processamento</label>
                                            <input 
                                                type="number" 
                                                class="form-control " 
                                                name="processing_day" 
                                                value="{{ $paymentType->processing_day }}" 
                                                min="1" 
                                                max="27"
                                                
                                            >
                                        </div>
                                        <div class="form-group">
                                            <label for="id">Dia de pagamento</label>
                                            <input 
                                                type="number" 
                                                class="form-control " 
                                                name="payment_day" 
                                                value="{{ $paymentType->payment_day }}" 
                                                min="1" 
                                                max="27"
                                            >
                                        </div>

                                        <div class="form-group">
                                            <label for="id">Parcelamento ativado?</label>
                                            <select 
                                                class="form-control" 
                                                name="installment_enable" 
                                                >
                                                <option value="0" @if($paymentType->installment_enable  == '0') selected @endif>Desativado</option>
                                                <option value="1" @if($paymentType->installment_enable  == '1') selected @endif>Ativado</option>
                                            </select>                                        
                                        </div>


                                        <div class="form-group">
                                            <label for="id">Style css</label>
                                            <textarea
                                                class="form-control" 
                                                name="style" 
                                                id="value" 
                                                >{{ $paymentType->style }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="id">Status</label>
                                            <select 
                                                class="form-control" 
                                                name="status" 
                                                id="status"
                                                >
                                                <option value="D" @if($paymentType->status  == 'D') selected @endif>Desativado</option>                                 
                                                <option value="E" @if($paymentType->status  == 'E') selected @endif>Ativo</option>
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
                                                    class="btn bg-olive"
                                                    id="btn-save"
                                                    >
                                                    Atualizar
                                                    <i class="fas fa-save"></i>
                                                </button>
                                                <a href="{{ route('settingAll_get') }}" class="btn bg-warning" id="btn-edit">
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