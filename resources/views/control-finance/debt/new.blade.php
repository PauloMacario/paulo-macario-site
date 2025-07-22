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

@stop

@section('content')

<form action="{{ route('debt_post') }}" method="POST" id="form">
    @csrf
    <div class="row mt-3">
        <div class="col-12">
            <div class="card card-olive card-tabs">
                <div class="card-header p-0 pt-1">
                    <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                        <li class="pt-2 px-3 mr-5"><h3 class="card-title">Nova dívida</h3></li>
                        <li class="nav-item">
                            <a class="nav-link active" 
                                id="custom-tabs-two-home-tab" 
                                data-toggle="pill" 
                                href="#comprador" 
                                role="tab" 
                                aria-controls="comprador" 
                                aria-selected="true"
                                >
                                comprador
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" 
                                id="custom-tabs-two-profile-tab" 
                                data-toggle="pill" 
                                href="#categoria" 
                                role="tab" 
                                aria-controls="categoria" 
                                aria-selected="false"
                                >
                                Categoria
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" 
                                id="custom-tabs-two-messages-tab" 
                                data-toggle="pill" 
                                href="#forma-pagamento" 
                                role="tab" 
                                aria-controls="forma-pagamento" 
                                aria-selected="false"
                                >
                                Forma Pagamento
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" 
                                id="custom-tabs-two-settings-tab" 
                                data-toggle="pill" 
                                href="#compra" 
                                role="tab" 
                                aria-controls="compra" 
                                aria-selected="false">
                                Compra
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="custom-tabs-two-tabContent">
                        <div class="tab-pane fade active show" 
                            id="comprador" 
                            role="tabpanel" 
                            aria-labelledby="custom-tabs-two-home-tab"
                            >
                        <div class="row d-flex justify-content-around" >
                            @foreach ($shoppers as $shopper)    
                                <div class="box-card m-2" style="cursor:pointer;">
                                    <input type="radio" class="radio" id="shopper-{{ $shopper->id }}" name="shopper_id" value="{{ $shopper->id }}" @if($loop->first) checked @endif style="display:none;"/>
                                    <div class="card m-0" 
                                        style="background-color:{{ $shopper->color }};
                                            color:#fff;
                                            max-width: 150px; 
                                            min-width:150px; 
                                            min-height:75px; 
                                            max-height:75px;"
                                            >
                                        <div class="card-header text-center" style="min-height:75px; max-height:75px;">
                                            <div class="info-box-icon">
                                                <span>
                                                    <span class="text-center">{{ $shopper->name }}</span>
                                                </span>
                                            </div>         
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade" 
                        id="categoria"
                        role="tabpanel" 
                        aria-labelledby="custom-tabs-two-profile-tab"
                        >
                        <div class="row d-flex justify-content-around">
                            @foreach ($categories as $category)                             
                                @if ($category->status == 'E')
                                    <div class="box-card-category m-2" style="cursor:pointer;">
                                        <input type="radio" class="radio-category" id="category-{{ $category->id }}" name="category_id" value="{{ $category->id }}" @if($loop->first) checked @endif style="display:none;"/>
                                        <div class="card m-0" 
                                            style="background-color:{{ $category->color }};
                                                color:#fff;
                                                max-width: 150px; 
                                                min-width:150px; 
                                                min-height:75px;
                                                max-height:75px;"
                                                >
                                            <div class="card-header text-center" style="min-height:75px; max-height:75px;">
                                                <div class="info-box-icon">
                                                    <span>
                                                        <span class="text-center">{{ $category->description }}</span>
                                                    </span>
                                                </div>         
                                            </div>
                                        </div>
                                    </div>
                                @endif                            
                            @endforeach
                        </div>                       
                    </div>
                    <div class="tab-pane fade" 
                        id="forma-pagamento" 
                        role="tabpanel" 
                        aria-labelledby="forma-pagamento"
                        >

                        <div class="row d-flex justify-content-end">
                            <a class="btn bg-olive btn-sm" data-toggle="modal" data-target="#modal-default" style="color:#3d9970; ">
                                Info
                                <i class="fas fa-info-circle" ></i>
                            </a>
                            </label>
                        </div>

                        <div class="row d-flex justify-content-around">
                            @foreach ($paymentTypes as $paymentType)   
                                <div class="box-card-payment m-2" style="cursor:pointer;">
                                    <input type="radio" class="radio-payment" data-installment-enable="{{ $paymentType->installment_enable }}" id="payment-{{ $paymentType->id }}" name="payment_type_id" value="{{ $paymentType->id }}" @if($loop->first)  @endif style="display:none;"/>
                                    <div class="card m-0" 
                                        style="background-color:{{ $paymentType->color }};
                                            color:#fff;
                                            max-width: 150px; 
                                            min-width:150px; 
                                            min-height:75px; 
                                            max-height:75px;"
                                            >
                                        <div class="card-header text-center" style="min-height:75px; max-height:75px;">
                                            <div class="info-box-icon">
                                                <span>
                                                    <span class="text-center">{{ $paymentType->description }}</span>
                                                </span>
                                            </div>         
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade" 
                        id="compra" 
                        role="tabpanel" 
                        aria-labelledby="custom-tabs-two-settings-tab"
                        >
                        <div class="row" id="compra-fields-disabled" style="display:block;">                                
                           
                            <h5 style="color:rgb(168, 22, 22);">Selecione a forma de pagamento.</h5>
                           
                        </div>
                        
                        <div id="compra-fields" style="display:none;">                            
                            <div class="row" >
                                <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                                    <div class="form-group">
                                        <label for="date" style="color:#3d9970;">Data</label>
                                        <input type="date" class="form-control "  name="date" id="date" required>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                                    <div class="form-group">
                                        <label for="locality" style="color:#3d9970;">Loja/local</label>
                                        <input type="text" class="form-control "  name="locality" id="locality" placeholder="Nome da loja" required >
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                                    <div class="form-group">
                                        <label for="totalValue" style="color:#3d9970;">Valor total</label>
                                        <input type="text" class="form-control "  name="total_value" id="totalValue" required>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                                    <div class="form-group">
                                        <label for="field-number-installments">Parcelas</label>
                                        <input type="number" class="form-control "  name="number_installments" id="field-number-installments" autocomplete="off" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="trade_name">Nome comercial</label>
                                            <input type="text" class="form-control "  name="trade_name" id="trade_name" placeholder="Nome na fatura.">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="locality_obs">Observações</label>
                                            <input type="text" class="form-control "  name="locality_obs" id="locality_obs" placeholder="Ajuda para lembrar da dívida.">        
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="compra-rateada">Compra rateada</label>
                                            <select class="form-control " @if($shoppers->count() > 1) id="compra-rateada" @else disabled @endif autocomplete="off">
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
                            <div class="row ">
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex justify-content-between">
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
