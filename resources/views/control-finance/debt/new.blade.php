@extends('adminlte::page')

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
                                <div class="col-xs-12 col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label for="id">Categoria</label>
                                        <select class="form-control" name="debt[category_id]" id="categoryId" required>
                                            <option value="">Selecione...</option>
                                            @foreach ($categories as $category)
                                                @if ($category->status == 'E')
                                                    <option value="{{ $category->id }}">{{ $category->description }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label for="id">Comprador(a)</label>
                                        <select class="form-control" name="debt[shopper_id]" id="shopperId" required>
                                            <option value="" selected>Selecione...</option>                                       
                                            @foreach ($shoppers as $shopper)                                  
                                                <option value="{{ $shopper->id }}" >{{ $shopper->name }}</option>
                                            @endforeach
                                        </select>                                        
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label for="id">Forma de pagamento</label>
                                        <select class="form-control" name="debt[payment_type_id]" id="paymentTypeId" autocomplete="off" required>
                                            <option value="" data-installment-enable="0" selected>Selecione...</option>                             
                                            @foreach ($paymentTypes as $paymentType)  
                                                @if ($paymentType->status == 'E')
                                                    <option value="{{ $paymentType->id }}" data-installment-enable="{{ $paymentType->installment_enable }}">{{ $paymentType->description }}</option>
                                                @endif
                                            @endforeach                                                
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label for="id">Parcelas</label>
                                        <input type="number" class="form-control"  name="debt[number_installments]" id="field-number-installments" autocomplete="off" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label for="id">Compra rateada</label>
                                        <select class="form-control" id="compra-rateada" autocomplete="off">
                                            <option value="">Não</option>                                                                             
                                            <option value="Y">Sim</option>
                                        </select>
                                    </div>
                                    <div class="form-group" id="row-rateio" style="display:none;">
                                        <label for="id">Rateada por:</label>
                                        @foreach ($shoppers as $shopper)
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input custom-control-input-danger" name="checkrateio[{{ $shopper->id }}]" type="checkbox" id="check-rateio-{{ $shopper->id }}" autocomplete="off">
                                                <label for="check-rateio-{{ $shopper->id }}" class="custom-control-label"><h5>{{ $shopper->name }}</h5></label>
                                            </div>                  
                                        @endforeach
                                    </div>
                                </div>

                                <div class="col-xs-12 col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label for="id">Data</label>
                                        <input type="date" class="form-control"  name="debt[date]" id="date" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="id">Loja/local</label>
                                        <input type="text" class="form-control"  name="debt[locality]" id="locality" required value="loja teste">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-md-6 col-lg-2">
                                    <div class="form-group">
                                        <label for="id">Valor total</label>
                                        <input type="text" class="form-control"  name="debt[total_value]" id="totalValue" required value="500">
                                    </div>
                                </div>
                            </div>                    
                        </div>
                        <div class="card-footer">
                            <div class="row ">
                                <div class="col-xs-12 col-md-12 col-lg-8 d-flex justify-content-between">
                                    <div class="col-xs-12 col-md-4 col-lg-2 text-left p-0 m-0">
                                        <div class="form-group">
                                            <a href="{{ route('debt_get') }}" class="btn bg-warning ">
                                                Limpar
                                                <i class="fas fa-broom"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-4 col-lg-2 text-right p-0 m-0">
                                        <div class="form-group">
                                            <button type="submit" class="btn bg-olive ">
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
            $('#totalValue').mask('000.000,00', {reverse: true});           

            $(':input','#form')
                .not(':button, :submit, :reset, :hidden')
                .val('')
                .removeAttr('checked')
                .removeAttr('selected');
            
            checkFieldNumberInstallments();

            $('#paymentTypeId').on('change', function() {
                console.log('2- ' + $('#paymentTypeId option:selected').attr('data-installment-enable'));
                checkFieldNumberInstallments();
            });
            
            $('#compra-rateada').on('change', function() {
                checkCompraRateada();
            });

            function checkFieldNumberInstallments()
            {
                console.log('3- ' + $('#paymentTypeId option:selected').attr('data-installment-enable'));
                var installmentEnable = $('#paymentTypeId option:selected').attr('data-installment-enable');               

                if (installmentEnable == 0 || installmentEnable == '') {

                    console.log('disabled installment-> ' + installmentEnable)

                    $('#field-number-installments')
                        .attr('disabled', true)
                        .attr('required', false)
                        .val('')
                        .attr('placeholder','');
                } else {

                    console.log('enabled installment-> ' + installmentEnable)

                    $('#field-number-installments')
                        .attr('disabled', false)
                        .attr('required', true)
                        .attr('placeholder','Selecione o n° de parcelas');
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
