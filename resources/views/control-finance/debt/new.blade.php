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

@stop

@section('content')
    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card card-olive mb-0">
                    <div class="card-header">
                        <h5 class="card-title">Nova dívida</h5>
                    </div>
                    <form action="{{ route('debt_post') }}" method="POST" id="form">
                        @csrf
                        <div class="card-body">
                            
                            <div class="row">
                                <div class="col-7 col-sm-7 col-md-5 col-lg-5">
                                    <div class="form-group">
                                        <label for="shopper_id">Comprador(a)</label>    
                                       
                                        @if($shoppers->count() > 1)
                                            <select class="form-control form-control-sm" name="shopper_id" id="shopper_id" required>                   
                                                <option value="" >Selecione...</option>                                       
                                                @foreach ($shoppers as $shopper)                                  
                                                    <option value="{{ $shopper->id }}" style="color:{{ $shopper->color }};">
                                                    {{ $shopper->name }}
                                                    </option>
                                                @endforeach                                            
                                            </select>  
                                        @else
                                            <input type="text" class="form-control form-control-sm"  name="" id="" value="{{ $shoppers[0]->name }}" readonly>
                                            <input type="hidden" class="form-control form-control-sm"  name="shopper_id" id="shopper_id" value="{{ $shoppers[0]->id }}">
                                        @endif                                        
                                    </div>
                                </div>

                                <div class="col-5 col-sm-5 col-md-5 col-lg-5">
                                    <div class="form-group">
                                        <label for="categoryId">Categoria</label>
                                        <select class="form-control form-control-sm" name="category_id" id="categoryId" required>
                                            <option value="">Selecione...</option>
                                            @foreach ($categories as $category)
                                                @if ($category->status == 'E')
                                                    <option value="{{ $category->id }}"
                                                        style="color:{{ $category->color }};"
                                                    >
                                                        {{ $category->description }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                
                                <div class="col-7 col-sm-7 col-md-5 col-lg-5">
                                    <div class="form-group">
                                        <label for="payment_type_id">
                                            Forma de pagamento
                                            <i class="fas fa-info-circle" data-toggle="modal" data-target="#modal-default" style="color:#3d9970; cursor: pointer;"></i>
                                            {{-- <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                                            </button> --}}
                                        </label>
                                        <select class="form-control form-control-sm" name="payment_type_id" id="payment_type_id" autocomplete="off" required>
                                            <option value="" data-installment-enable="0" selected>Selecione...</option>           
                                                    
                                            @foreach ($paymentTypes as $paymentType)                                                
                                                <option 
                                                    value="{{ $paymentType->id }}" 
                                                    data-installment-enable="{{ $paymentType->installment_enable }}"
                                                    style="color:{{ $paymentType->color }};"
                                                    >
                                                    {{ $paymentType->description}}
                                                </option>                                            
                                            @endforeach                                                
                                        </select>
                                    </div>
                                </div>
                                <div class="col-5 col-sm-5 col-md-5 col-lg-5">
                                    <div class="form-group">
                                        <label for="field-number-installments">Parcelas</label>
                                        <input type="number" class="form-control form-control-sm"  name="number_installments" id="field-number-installments" autocomplete="off" required>
                                    </div>
                                </div>                                
                            </div>

                            <div class="row">
                                <div class="col-7 col-sm-7 col-md-5 col-lg-5">
                                    <div class="form-group">
                                        <label for="field-number-installments">Status</label>
                                        <select class="form-control form-control-sm" name="status" id="status" required>                   
                                            <option value="PP" selected>Pendente Pagamento</option>
                                            <option value="PM" >Pago</option>  
                                        </select>              
                                    </div>
                                </div>
                                <div class="col-5 col-sm-5 col-md-5 col-lg-5">
                                    <div class="form-group">
                                        <label for="date">Data</label>
                                        <input type="date" class="form-control form-control-sm"  name="date" id="date" required>
                                    </div>
                                </div>

                                <div class="col-7 col-sm-7 col-md-5 col-lg-5">
                                    <div class="form-group">
                                        <label for="locality">Loja/local</label>
                                        <input type="text" class="form-control form-control-sm"  name="locality" id="locality" required >
                                    </div>
                                </div>

                                <div class="col-5 col-sm-5 col-md-5 col-lg-5">
                                    <div class="form-group">
                                        <label for="totalValue">Valor total</label>
                                        <input type="text" class="form-control form-control-sm"  name="total_value" id="totalValue" required>
                                    </div>
                                </div>                              
                            </div>                    

                            <div class="row">
                                <div class="col-7 col-sm-7 col-md-5 col-lg-5">
                                    <div class="form-group">
                                        <label for="compra-rateada">Compra rateada</label>
                                        <select class="form-control form-control-sm" @if($shoppers->count() > 1) id="compra-rateada" @else disabled @endif autocomplete="off">
                                            <option value="">Não</option>                                                                             
                                            <option value="Y">Sim</option>
                                        </select>
                                    </div>
                                    <div class="form-group" id="row-rateio" style="display:none;">
                                        <label for="id">Rateada por:</label>
                                        @foreach ($shoppers as $shopper)
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input custom-control-input-danger" name="checkrateio[{{ $shopper->id }}]" type="checkbox" id="check-rateio-{{ $shopper->id }}" autocomplete="off">
                                                <label for="check-rateio-{{ $shopper->id }}" class="custom-control-label"><span>{{ $shopper->name }}</span></label>
                                            </div>                  
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row ">
                                <div class="col-12 col-sm-12 col-md-10 col-lg-10 d-flex justify-content-between">
                                    <div class="col-xs-12 col-md-4 col-lg-2 text-left p-0 m-0">
                                        <div class="form-group">
                                            <a href="{{ route('debt_get') }}" class="btn bg-warning btn-sm">
                                                Limpar
                                                <i class="fas fa-broom"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-4 col-lg-2 text-right p-0 m-0">
                                        <div class="form-group">
                                            <button type="submit" class="btn bg-olive btn-sm">
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

    @include('control-finance.debt.modal-payment-info')
@stop

@push('js')
<script src="{{ asset('vendor/bs-custom-file-input/dist/bs-custom-file-input.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery/jquery.mask.min.js') }}"></script>
    <script>

        $(document).ready(function() {
            $('#totalValue').mask('000.000,00', {reverse: true});           

            $(':input','#form')
                .not(':button, :submit, :reset, :hidden')
                /* .val('') */
                .removeAttr('checked')
                .removeAttr('selected');
            
            checkFieldNumberInstallments();

            $('#payment_type_id').on('change', function() {
                console.log('2- ' + $('#payment_type_id option:selected').attr('data-installment-enable'));
                checkFieldNumberInstallments();
            });
            
            $('#compra-rateada').on('change', function() {
                checkCompraRateada();
            });

            function checkFieldNumberInstallments()
            {               
                var installmentEnable = $('#payment_type_id option:selected').attr('data-installment-enable');               

                if (installmentEnable == 0 || installmentEnable == '') {

                    $('#field-number-installments')
                        .attr('disabled', true)
                        .attr('required', false)
                        .val('')
                        .attr('placeholder','');

                    $('#compra-rateada')
                        .attr('disabled', true)
                        .val('');

                    $('#row-rateio').css('display', 'none');

                    $('.checkrateio').each(function(i) {
                        $(this).attr('disabled', true).prop('checked', false);
                    });
                } else {

                    $('#field-number-installments')
                        .attr('disabled', false)
                        .attr('required', true)
                        .attr('placeholder','Selecione o n° de parcelas');

                    $('#compra-rateada')
                        .attr('disabled', false);
                }                
            }

            function checkCompraRateada()
            {
                var compraRateada = $('#compra-rateada option:selected').val();

                if (compraRateada == 'Y') {
                    $('#row-rateio').css('display', 'block');

                    $('.checkrateio').each(function(i) {
                        $(this).attr('disabled', false)
                    });
                } else {
                    $('#row-rateio').css('display', 'none');

                    $('.checkrateio').each(function(i) {
                        $(this).attr('disabled', true).prop('checked', false);
                    });
                }
            }
        });

    </script>
@endpush
