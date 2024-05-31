@extends('adminlte::page')

@section('title', 'Divida')

@section('content_header')
{{-- <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h5>Dívidas</h5>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Dívida</li>
            </ol>
        </div>
    </div>
</div> --}}
@stop

@section('content')
    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card card-olive mb-0">
                    <div class="card-header">
                        <h5 class="card-title">Nova dívida</h5>
                    </div>
                    <form action="{{ route('debt_post') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            {{-- #####  Categoria #####3 --}}
                            <div class="row">
                                <div class="col-xs-12 col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label for="id">Categoria</label>
                                        <select class="form-control" name="debt[category_id]" id="categoryId" required>
                                            <option value="">Selecione...</option>
                                            @foreach ($categories as $category)
                                                <option 
                                                    value="{{ $category->id }}"
                                                    @isset($category->style->color)
                                                        style="color:{{ $category->style->color }}"
                                                    @endisset
                                                >
                                                {{ $category->description }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            {{-- #####  Comprador #####3 --}}
                            <div class="row">
                                <div class="col-xs-12 col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label for="id">Comprador(a)</label>
                                        <select class="form-control" name="debt[shopper_id]" id="shopperId" required>
                                            <option value="">Selecione...</option>                                            
                                            @foreach ($shoppers as $shopper)                                  
                                                <option value="{{ $shopper->id }}" >{{ $shopper->name }}</option>
                                            @endforeach
                                        </select>                                        
                                    </div>
                                </div>
                            </div>


                            {{-- #####  Forma de pagamento #####3 --}}
                            <div class="row">
                                <div class="col-xs-12 col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label for="id">Forma de pagamento</label>
                                        <select class="form-control" name="debt[payment_type_id]" id="paymentTypeId" required>
                                            <option value="">Selecione...</option>                                            
                                            @foreach ($paymentTypes as $paymentType)                                  
                                                <option value="{{ $paymentType->id }}" data-installment-enable="{{ $paymentType->installment_enable }}">{{ $paymentType->description }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                           
                            
                            {{-- #####  N° de parcelas #####3 --}}
                            <div class="row" id="rowNumberInstallments">
                                <div class="col-xs-12 col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label for="id">Parcelas</label>
                                        <input type="number" class="form-control"  name="debt[number_installments]" id="field-number-installments" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label for="id">Compra rateada</label>
                                        <select class="form-control" id="compra-rateada">
                                            <option value="N">Não</option>                                                                             
                                            <option value="Y">Sim</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row" id="row-rateio" style="display:none;">
                                <div class="col-xs-12 col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label for="id">Rateada por:</label>
                                        @foreach ($shoppers as $shopper)
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input checkrateio" name="checkrateio[{{ $shopper->id }}]" id="check-rateio-{{ $shopper->id }}">
                                                <label class="form-check-label" for="exampleCheck1">{{ $shopper->name }}</label>
                                            </div>                                  
                                        @endforeach
                                    </div>
                                </div>
                            </div>


                            {{-- #####  Data #####3 --}}
                            <div class="row">
                                <div class="col-xs-12 col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label for="id">Data</label>
                                        <input type="text" class="form-control"  name="debt[date]" id="date" required value="2024-10-10">
                                    </div>
                                </div>
                            </div>


                            {{-- #####  Localidade #####3 --}}
                            <div class="row">
                                <div class="col-xs-12 col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label for="id">Loja/local</label>
                                        <input type="text" class="form-control"  name="debt[locality]" id="locality" required value="loja teste">
                                    </div>
                                </div>
                            </div>


                            {{-- #####  Valor total #####3 --}}
                            <div class="row">
                                <div class="col-xs-12 col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label for="id">Valor total</label>
                                        <input type="text" class="form-control"  name="debt[total_value]" id="totalValue" required value="500">
                                    </div>
                                </div>
                            </div>


                            {{-- <div class="form-group">
                                <label for="id">Forma de pagamento</label>
                                
                            </div> --}}
                    
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-xs-12 col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <button type="submit" class="btn bg-olive btn-block">Submit</button>
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
    <script src="{{ asset('vendor/jquery/jquery.mask.min.js') }}"></script>
    <script>

        $(document).ready(function() {
           
            $('#totalValue').mask('000.000,00', {reverse: true});

            $('#date').mask('00/00/0000');
           
            $('#paymentTypeId').on('change', function() {
              
                var installmentEnable = $('#paymentTypeId option:selected').attr('data-installment-enable');

                if (installmentEnable == 0) {
                    $('#field-number-installments')
                        .attr('disabled', true)
                        .attr('required', false)
                        .val('')
                        .attr('placeholder','');
                } else {
                    $('#field-number-installments')
                        .attr('disabled', false)
                        .attr('required', true)
                        .attr('placeholder','Selecione o n° de parcelas');
                }                
            });

            $('#compra-rateada').on('change', function() {

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
            });
        });

    </script>
@endpush
