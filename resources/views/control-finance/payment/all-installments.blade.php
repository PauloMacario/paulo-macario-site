@extends('adminlte::page')

@push('css')

    <link rel="stylesheet" href="{{ asset('vendor/sweetalert2/dist/sweetalert2.min.css') }}">
<style>
    a {
        color: rgb(20, 20, 20);
        text-decoration: none;
    }

    a:hover {
        color: #3d9970;
    }

    .font-10 {
        font-size: 10px;
    }
    .font-12 {
        font-size: 12px;
    }
    .font-14 {
        font-size: 14px;
    }
    .font-16 {
        font-size:16px;
    }
    .font-18 {
        font-size: 18px;
    }
    .font-20 {
        font-size: 20px;
    }
    .font-22 {
        font-size: 22px;
    }
    .value-paid {
        color: #b4b4b4;
        text-decoration: line-through;
    }
</style>

@endpush

@section('title', 'Pagamentos')

@section('content_header')
    @include('control-finance.components.alerts')
@stop

@section('content')
    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card card-olive mb-0">
                    <div class="card-header">
                        <h5 class="card-title">Pagamentos{{-- <strong class="ml-2">{{ $yearMonthRef }}</strong> --}}</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xs-12 col-md-10 col-lg-8">
                                <p class="text-right">
                                    <button class="btn bg-olive btn-sm" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                      filtros
                                      <i class="fas fa-filter"></i>
                                    </button>
                                </p>
                                <div class="collapse show" id="collapseExample">
                                    <div class="card card-body">
                                        <form action="" method="GET">
                                            <div class="row">
                                                <div class="col-6 col-sm-6 col-md-3 col-lg-3">
                                                    <div class="form-group">                                                                      
                                                        <select class="form-control form-control-sm" name="month" id="">
                                                            <option value="01" @if($month == '01') selected @endif>Jan</option>
                                                            <option value="02" @if($month == '02') selected @endif>Fev</option>
                                                            <option value="03" @if($month == '03') selected @endif>Mar</option>
                                                            <option value="04" @if($month == '04') selected @endif>Abr</option>
                                                            <option value="05" @if($month == '05') selected @endif>Mai</option>
                                                            <option value="06" @if($month == '06') selected @endif>Jun</option>
                                                            <option value="07" @if($month == '07') selected @endif>Jul</option>
                                                            <option value="08" @if($month == '08') selected @endif>Ago</option>
                                                            <option value="09" @if($month == '09') selected @endif>Set</option>
                                                            <option value="10" @if($month == '10') selected @endif>Out</option>
                                                            <option value="11" @if($month == '11') selected @endif>Nov</option>
                                                            <option value="12" @if($month == '12') selected @endif>Dez</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-6 col-sm-6 col-md-3 col-lg-3">
                                                    <div class="form-group">                                                                      
                                                        <select class="form-control form-control-sm" name="year" id="">
                                                            <option value="2020" @if($year == '2020') selected @endif>2020</option>
                                                            <option value="2021" @if($year == '2021') selected @endif>2021</option>
                                                            <option value="2022" @if($year == '2022') selected @endif>2022</option>
                                                            <option value="2023" @if($year == '2023') selected @endif>2023</option>
                                                            <option value="2024" @if($year == '2024') selected @endif>2024</option>
                                                            <option value="2025" @if($year == '2025') selected @endif>2025</option>
                                                            <option value="2026" @if($year == '2026') selected @endif>2026</option>
                                                            <option value="2027" @if($year == '2027') selected @endif>2027</option>
                                                            <option value="2028" @if($year == '2028') selected @endif>2028</option>
                                                            <option value="2029" @if($year == '2029') selected @endif>2029</option>
                                                            <option value="2030" @if($year == '2030') selected @endif>2030</option>
                                                        </select>
                                                    </div>
                                                </div>                                               
                                                <div class="col-6 col-sm-6 col-md-3 col-lg-3">
                                                    <div class="form-group">                                                                   
                                                        <select class="form-control form-control-sm" name="category_id" id="">
                                                            <option value="0">Categorias</option>
                                                            @foreach ( $categories as $category )
                                                                <option value="{{ $category->id }}" 
                                                                    @if($category->id  == $categoryId) 
                                                                        selected 
                                                                    @endif
                                                                        style="color:{{ $category->color }};"
                                                                    >
                                                                    {{ $category->description }}
                                                                </option>                                                
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-6 col-sm-6 col-md-3 col-lg-3">
                                                    <div class="form-group">                                                                   
                                                        <select class="form-control form-control-sm" name="payment_type_id" id="">
                                                            <option value="0">Tipos</option>
                                                            @foreach ( $paymentTypes as $payType )
                                                                <option value="{{ $payType->id }}" 
                                                                    @if($payType->id  == $payTypeId) 
                                                                        selected 
                                                                    @endif
                                                                        style="color:{{ $payType->color }};"    
                                                                    >
                                                                    {{ $payType->description }}
                                                                </option> 
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-6 col-sm-6 col-md-3 col-lg-3">
                                                    <div class="form-group">
                                                        @if($shoppers->count() > 1)
                                                            <select class="form-control form-control-sm" name="shopper_id" id="">
                                                                <option value="">Compradores</option>
                                                                @foreach ( $shoppers as $shopper )
                                                                    <option value="{{ $shopper->id }}" style="color:{{ $shopper->color }};" @if($shopper->id  == $shopperId) selected @endif>{{ $shopper->name }}</option>                                                
                                                                @endforeach
                                                            </select>
                                                        @else
                                                            <input type="text" class="form-control form-control-sm"  name="" id="" value="{{ $shoppers[0]->name }}" readonly>
                                                            <input type="hidden" class="form-control form-control-sm"  name="shopper_id" id="shopper_id" value="{{ $shoppers[0]->id }}">
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-6 col-sm-6 col-md-3 col-lg-3">
                                                    <div class="form-group">
                                                        <select class="form-control form-control-sm" name="status" id="status" >
                                                            <option value="0" selected>Todos status</option>
                                                            <option value="PM" @if($status  == 'PM') selected @endif>Pagamento feito</option>
                                                            <option value="PP" @if($status  == 'PP') selected @endif>Pendente pagamento</option>
                                                    </select>                
                                                    </div>
                                                </div>                                              
                                                <div class="col-6 col-sm-6 col-md-3 col-lg-3">            
                                                    <div class="form-group">
                                                        <a href="{{ route('paymentAllInstallments_get') }}" class="btn bg-warning btn-block btn-sm">
                                                            Limpar
                                                            <i class="fas fa-broom"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-6 col-sm-6 col-md-3 col-lg-3">            
                                                    <div class="form-group">
                                                        <button class="btn bg-olive btn-block btn-sm">
                                                            Filtrar
                                                            <i class="fas fa-search"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if($installments->count() > 0)
                            <div class="row">
                                <div class="col-xs-12 col-md-12 col-lg-12">
                                    
                                        <table class="table table-sm  table-bordered table-responsive mb-3"> 
                                            <tr>
                                                <th colspan="3" class="text-center" width="70%">Descrição da Parcela</th>
                                                <th colspan="2" class="text-center" width="30%">Status</th>                                              
                                                <th class="text-center" width="10%">Salvar</th>                                          
                                            </tr>
                                        
                                            @foreach ( $installments as $installment )       
                                                <form action="{{ route('paymentPayOneInstallment_post') }}" method="POST" id="form-{{ $installment->id }}">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $installment->id }}">
                                                    <tr class="font-10">
                                                        <td class="text-center">
                                                           <span  class="mr-3" style="color:{{ $installment->debt->paymentType->color }};">                                                           
                                                                <strong>
                                                                    {{ $installment->debt->paymentType->description }}                                                                    
                                                                </strong>
                                                            </span>                                   
                                                        </td>
                                                        <td class="text-center">
                                                            <span  class="mr-3">                                                           
                                                                {{ $installment->debt->locality }} - ({{ $installment->number_installment }}/{{ $installment->debt->number_installments }})
                                                            </span>
                                                        </td>
                                                        <td class="text-center">
                                                            <span >
                                                                <strong>R$</strong>{{ formatMoneyBR($installment->value) }}</span><br>
                                                            <span >
                                                        </td>
                                                        <td class="text-center vertical-middle" style="vertical-align: middle;">                                                    
                                                            Pagar<input class="ml-3" type="radio" name="status" value="PM" @if($installment->status == 'PM') checked @endif>                                                    
                                                        </td>
                                                        <td class="text-center vertical-middle" style="vertical-align: middle;">  
                                                            <input class="mr-3" type="radio" name="status" value="PP" @if($installment->status == 'PP') checked @endif>Pend.
                                                        </td>
                                                        <td class="text-center vertical-middle" style="vertical-align: middle;">  
                                                            <button class="btn btn-xs bg-olive btn-save" id="{{ $installment->id }}">Salvar</button>
                                                        </td>
                                                    </tr>     
                                                </form>
                                            @endforeach
                                        </table>
                                        {{ $installments->links() }}  
                                    
                                </div>                               
                            </div>
                        @else 
                            <div class="row">
                                <div class="col-xs-12 col-md-10 col-lg-8">
                                    @include('control-finance.components.results-empty')
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-xs-12 col-md-10 col-lg-8">
                               
                            </div>
                        </div>                                                  
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@push('js')
    <script src="{{ asset('vendor/sweetalert2/dist/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('js/yoda.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.btn-save').on('click', function(event){
                event.preventDefault();

                var id = $(this).attr("id");

                var form = $('#form-'+id);

                $.ajax({
                    type: form.attr('method'),
                    url: form.attr('action'),
                    data: form.serialize(),
                    success: function (data) {

                        let title = "Dizer, eu vou!";
                        let text = "QUE A FORÇA ESTEJA COM VOCÊ";
                        let linkImg = '{{ asset('img/yoda_speak.jpg') }}' 

                        getYodaSwal(linkImg, title, text)
                    },
                    error: function (data) {

                        var title = data.responseJSON.title;
                        var icon = data.responseJSON.icon;
                        var msg = data.responseJSON.msg;

                        Swal.fire({
                            title: title,
                            text: msg,
                            icon: icon,
                            confirmButtonText: 'Fechar'
                            }) 
                    },
                });
            })
        });
    </script>
@endpush
