@extends('adminlte::page')

@push('css')

    <link rel="stylesheet" href="{{ asset('vendor/sweetalert2/dist/sweetalert2.min.css') }}">

    <style>
        .bold {
            font-weight: bold
        }
        option {
            font-weight: bold;
            font-size: 12px
        }

        .card-inactive {
            padding:5px;
            border: solid 2px;
            border-color: #ffffff;
        }

        .card-active {
            padding:5px;
            border: solid 2px;
            border-color: #3d9970;
        }
    </style>

@endpush

@section('title', 'Divida')

@section('content_header')
    @include('control-finance.components.alerts')
@stop

@section('content')

<form action="{{ route('debt_post') }}" method="POST" id="form">
    @csrf
    <div class="row mt-3">
        <div class="col-12">
            <div class="card card-olive mb-0"   style="min-height:80vh;">
                <div class="card-header">
                    <h5 class="card-title">Nova dívida</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="categoryId" style="color:#3d9970;">Categoria</label>
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
                    {{-- </div>
                    <div class="row"> --}}
                        <div class="col-7 col-sm-7 col-md-3 col-lg-3">
                            <div class="form-group">
                                <label for="categoryId" style="color:#3d9970;">Forma PGTO</label>                                        
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
                        <div class="col-5 col-sm-5 col-md-3 col-lg-3">
                            <label for="categoryId" style="color:#3d9970;">Info PGTO <i class="fas fa-info-circle" ></i></label>  
                            <a class="form-control form-control-sm btn bg-olive btn-block" data-toggle="modal" data-target="#modal-default" style="color:#3d9970; ">
                                <i class="fas fa-eye"></i>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                            <div class="form-group">
                                <label for="shopper_id" style="color:#3d9970;">Comprador(a)</label>    
                                
                                @if($shoppers->count() > 1)
                                    <select class="form-control form-control-sm" name="shopper_id" id="shopper_id" required>   
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
                   {{--  </div>  
                    <div class="row" > --}}
                        <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                            <div class="form-group">
                                <label for="date" style="color:#3d9970;">Data</label>
                                <input type="date" class="form-control form-control-sm" name="date" id="date" value="{{ $dateNow }}" required>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                            <div class="form-group">
                                <label for="locality" style="color:#3d9970;">Loja/local</label>
                                <input type="text" class="form-control form-control-sm"  name="locality" id="locality" placeholder="Nome da loja" required >
                            </div>
                        </div>
                  {{--   </div>                            
                    <div class="row"> --}}
                        <div class="col-8 col-sm-8 col-md-3 col-lg-3">
                            <div class="form-group">
                                <label for="totalValue" style="color:#3d9970;">Valor total</label>
                                <input type="text" class="form-control form-control-sm"  name="total_value" id="totalValue" required>
                            </div>
                        </div>
                        <div class="col-4 col-sm-4 col-md-3 col-lg-3">
                            <div class="form-group">
                                <label for="field-number-installments">Parcelas</label>
                                <input type="number" class="form-control form-control-sm"  name="number_installments" id="field-number-installments" autocomplete="off" required>
                            </div>
                        </div>
                    {{-- </div>
                    <div class="row"> --}}
                        <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="trade_name">Nome comercial</label>
                                    <input type="text" class="form-control form-control-sm"  name="trade_name" id="trade_name" placeholder="Nome na fatura.">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="locality_obs">Observações</label>
                                    <input type="text" class="form-control form-control-sm"  name="locality_obs" id="locality_obs" placeholder="Ajuda para lembrar da dívida.">        
                                </div>
                            </div>
                        </div>
                    {{-- </div>
                    <div class="row"> --}}
                        <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="compra-rateada">Compra rateada</label>
                                    <select class="form-control form-control-sm" @if($shoppers->count() > 1) id="compra-rateada" @else disabled @endif autocomplete="off">
                                        <option value="">Não</option>                                                                             
                                        <option value="Y">Sim</option>
                                    </select>
                                </div>
                            </div>
                        </div>                                
                    </div> 
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                            <div class="form-group" id="row-rateio" style="display:none;">
                                <label for="id">Rateada por:</label>
                                @foreach ($shoppers as $shopper)
                                    <div class="custom-control custom-checkbox">
                                        <input class=" form-control form-control-sm custom-control-input custom-control-input-danger" name="checkrateio[{{ $shopper->id }}]" type="checkbox" id="check-rateio-{{ $shopper->id }}" autocomplete="off">
                                        <label for="check-rateio-{{ $shopper->id }}" class="custom-control-label"><span>{{ $shopper->name }}</span></label>
                                    </div>                  
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 d-flex justify-content-between">
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
            </div>                
        </div>
    </form>

{{-- <div class="row mt-3">
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
                                    <label for="shopper_id" style="color:#3d9970;">Comprador(a)</label>    
                                    
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
                                    <label for="categoryId" style="color:#3d9970;">Categoria</label>
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
                                    <label for="payment_type_id" style="color:#3d9970;">
                                        Forma de pagamento
                                        <i class="fas fa-info-circle" data-toggle="modal" data-target="#modal-default" style="color:#3d9970; cursor: pointer;"></i>
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
                            <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <label for="date" style="color:#3d9970;">Data</label>
                                    <input type="date" class="form-control form-control-sm"  name="date" id="date" required>
                                </div>
                            </div>

                            <div class="col-7 col-sm-7 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label for="locality" style="color:#3d9970;">Loja/local</label>
                                    <input type="text" class="form-control form-control-sm"  name="locality" id="locality" placeholder="Nome da loja" required >
                                </div>
                            </div>
                            
                            <div class="col-5 col-sm-5 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <label for="totalValue" style="color:#3d9970;">Valor total</label>
                                    <input type="text" class="form-control form-control-sm"  name="total_value" id="totalValue" required>
                                </div>
                            </div>

                            <div class="col-12 col-sm-12 col-md-5 col-lg-5">
                                <div class="form-group">
                                    <label for="trade_name">Nome comercial</label>
                                    <input type="text" class="form-control form-control-sm"  name="trade_name" id="trade_name" placeholder="Nome na fatura.">
                                </div>
                            </div>
                            
                            <div class="col-12 col-sm-12 col-md-5 col-lg-5">
                                <div class="form-group">
                                    <label for="locality_obs">Observações</label>
                                    <input type="text" class="form-control form-control-sm"  name="locality_obs" id="locality_obs" placeholder="Ajuda para lembrar da dívida.">
                                    </div>
                            </div>
                        </div>                    

                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-10 col-lg-10">
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
</div> --}}

    @include('control-finance.debt.modal-payment-info')
@stop

@push('js')
<script src="{{ asset('vendor/bs-custom-file-input/dist/bs-custom-file-input.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery/jquery.mask.min.js') }}"></script>
    <script>

        $(document).ready(function() {

            $('#custom-tabs-two-settings-tab').on('click', function(e) {
                
                let compraEnable = false;
               
                $('.radio-payment').each(function(index, element) {
                   
                    if (element.checked) {
                        compraEnable = true
                    }
                })

                if (compraEnable) {
                    $('#compra-fields').show()
                    $('#compra-fields-disabled').hide()
                }               
            })

            allChecked()

            $('.box-card').on('click', function() {
                $(this).find('input[name="shopper_id"]').prop('checked', true)
                allChecked()
            })

            $('.box-card-category').on('click', function() {
                $(this).find('input[name="category_id"]').prop('checked', true)
                allChecked()
            })

            $('.box-card-payment').on('click', function() {
                $(this).find('input[name="payment_type_id"]').prop('checked', true)
                allChecked()
            })

            function allChecked()
            {
                $('.radio').each(function(index, element) {
                    if (element.checked) {
                        $('#'+element.id).parent().addClass('card-active')
                        $('#'+element.id).parent().removeClass('card-inactive')
                    } else {
                        $('#'+element.id).parent().addClass('card-inactive')
                        $('#'+element.id).parent().removeClass('card-active')
                    }
                });

                $('.radio-category').each(function(index, element) {
                    if (element.checked) {
                        $('#'+element.id).parent().addClass('card-active')
                        $('#'+element.id).parent().removeClass('card-inactive')
                    } else {
                        $('#'+element.id).parent().addClass('card-inactive')
                        $('#'+element.id).parent().removeClass('card-active')
                    }
                });

                $('.radio-payment').each(function(index, element) {
                    if (element.checked) {
                        $('#'+element.id).parent().addClass('card-active')
                        $('#'+element.id).parent().removeClass('card-inactive')
                    } else {
                        $('#'+element.id).parent().addClass('card-inactive')
                        $('#'+element.id).parent().removeClass('card-active')
                    }
                });
            }











            $('#totalValue').mask('000.000,00', {reverse: true});           

            $(':input','#form')
                .not(':button, :submit, :reset, :hidden')
                /* .val('') */
                .removeAttr('checked')
                .removeAttr('selected');
            
            checkFieldNumberInstallments(0);

            $('.box-card-payment').on('click', function() {
                let data = $(this).find('input[name="payment_type_id"]').attr('data-installment-enable')
                checkFieldNumberInstallments(data);
            })

            $('#payment_type_id').on('change', function() {
                
                console.log('2- ' + $('#payment_type_id option:selected').attr('data-installment-enable'));
                checkFieldNumberInstallments();
            });
            
            $('#compra-rateada').on('change', function() {
                checkCompraRateada();
            });

            function checkFieldNumberInstallments(data)
            {
                if (data == 0 || data == '') {

                    $('#field-number-installments')
                        .attr('disabled', true)
                        .attr('required', false)
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
                        .val('1')
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
