@extends('adminlte::page')

@push('css')
    <style>
        a {
            color: rgb(20, 20, 20);
            text-decoration: none;
        }

        a:hover {
            color: #3d9970;
        }
        .font-9 {
            font-size: 9px;
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
        }
        .decoration {
            text-decoration: line-through;
        }
        #balance {
            background-color:#fff;
        }
    </style>
@endpush

@section('title', 'Parcelas')

@section('content_header')
    @include('control-finance.components.alerts')
@stop

@section('content')
    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card card-olive mb-0">
                    <div class="card-header">
                        <h5 class="card-title">Parcelas do mês:<strong class="ml-2">{{ $yearMonthRef }}</strong></h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <p class="text-right">
                                    <button class="btn bg-olive btn-sm" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                      filtros
                                      <i class="fas fa-filter"></i>
                                    </button>
                                </p>
                                <div class="collapse {{ $filter }}" id="collapseExample">
                                    <div class="card card-body">
                                        <form action="{{ route('installmentAllFilters_get') }}" method="GET">
                                            <div class="row">
                                                <div class="col-6 col-sm-6 col-md-3 col-lg-3">
                                                    <div class="form-group">                                                                     
                                                        <select class="form-control form-control-sm" name="month" id="">
                                                            <option value="">Mês</option>
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
                                                            <option value="">Categorias</option>
                                                            @foreach ( $categories as $category )
                                                                <option value="{{ $category->id }}" style="color:{{ $category->color }};" @if($category->id  == $categoryId) selected @endif>{{ $category->description }}</option>                                                
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-6 col-sm-6 col-md-3 col-lg-3">
                                                    <div class="form-group">                                                                   
                                                        <select class="form-control form-control-sm" name="payment_type_id" id="">
                                                            <option value="">Tipos</option>
                                                            @foreach ( $paymentTypes as $payType )
                                                                <option value="{{ $payType->id }}" style="color:{{ $payType->color }};" @if($payType->id  == $payTypeId) selected @endif>{{ $payType->description }}</option>                                                
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-6 col-sm-6 col-md-3 col-lg-3">
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
                                                <div class="col-6 col-sm-6 col-md-3 col-lg-3">
                                                    <div class="form-group">
                                                        <select 
                                                            class="form-control form-control-sm" 
                                                            name="status" 
                                                            id="status" 
                                                        >                                              
                                                            <option value="PM" @if($status  == 'PM') selected @endif>Pagamento feito</option>
                                                            <option value="PP" @if($status  == 'PP') selected @endif>Pendente pagamento</option>
                                                        </select>                
                                                    </div>
                                                </div>
                                                <div class="col-6 col-sm-6 col-md-3 col-lg-3">            
                                                    <div class="form-group">
                                                        <a href="{{ route('installmentAll_get') }}" class="btn bg-warning btn-block btn-sm">
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
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                   {{--  <div class="card card-body"> --}}
                                        <table class="table table-sm table-striped mb-2">
                                            <tr>
                                                <td colspan=2 class="text-center">
                                                    <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#calculoModal">Cálculo</button>
                                                </td>                                                
                                                <td class="text-center">
                                                    {{ $installments->count() }} parcelas
                                                </td>                                                
                                                <td class="text-center">
                                                    TOTAL: R$ {{ formatMoneyBR($total) }}
                                                </td>
                                            </tr>
                                        </table>
                                        <table class="table table-sm table-borderless">        
                                            @foreach ( $installments as $installment )    
                                                <tr>
                                                    <td width="40%" class="font-italic text-left font-12  
                                                        @if($installment->status == 'PM') 
                                                            value-paid"
                                                        @else
                                                            "
                                                            @if(isset($installment->debt->paymentType->color))
                                                                style="color:{{ $installment->debt->paymentType->color }};"    
                                                            @endif
                                                          
                                                        @endif                                                          
                                                        >
                                                        {{ $installment->debt->paymentType->description }}
                                                    </td>
                                                    <td  width="35%" class="font-italic text-center font-12
                                                        @if($installment->status == 'PM') 
                                                            value-paid"
                                                        @else
                                                            "                                              
                                                            @if(isset($installment->debt->category->color))
                                                              style="color:{{ $installment->debt->category->color }};"    
                                                            @endif

                                                        @endif
                                                       
                                                        >
                                                        {{ $installment->debt->category->description }}
                                                    </td>
                                                    <td class="font-italic text-right font-12" 
                                                        width="25%"
                                                        >
                                                        {{ formatDateBR($installment->due_date) }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" class="font-weight-bold text-left font-12">
                                                        @if ($installment->debt->trade_name || $installment->debt->locality_obs)
                                                            <div class="accordion" id="accordionExample">                                                           
                                                                <div >
                                                                    <div id="heading{{ $installment->id }}">
                                                                         <div class="d-flex">
                                                                            <input type="text" class="form-control form-control-sm order mr-1"  name="order[{{ $installment->id }}]" id="order-{{ $installment->id  }}" value="{{ $installment->order }}" style="width:32px;height:20px;font-size:9px;display:none;">
                                                                       
                                                                            <a href="{{ route('detailInstallment_get', ['id' => $installment->id]) }}" class=" 
                                                                                @if($installment->status == 'PM') 
                                                                                    value-paid decoration
                                                                                @endif
                                                                                "
                                                                                >
                                                                                {{-- <span class="text-olive mr-2">{{ $installment->order }}</span> --}}
                                                                                @if ($installment->debt->trade_name)
                                                                                    {{ $installment->debt->trade_name }}                                                                               
                                                                                @else
                                                                                    {{ $installment->debt->locality }}                                                                            
                                                                                @endif
                            
                                                                                @if ($installment->debt->number_installments > 1)
                                                                                    <span class="ml-2  
                                                                                        @if($installment->status == 'PM') 
                                                                                            value-paid decoration
                                                                                        @endif"
                                                                                        > 
                                                                                        ({{ $installment->number_installment }}/{{ $installment->debt->number_installments }})
                                                                                    </span>
                                                                                @endif
                                                                            </a>  
                                                                            <button class="btn btn-link btn-sm text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse{{ $installment->id }}" aria-expanded="false" aria-controls="collapseTwo">
                                                                                <i class="fas fa-caret-square-down" data-toggle="modal" data-target="#modal-default" style="color:#3d9970; cursor: pointer;"></i>
                                                                            </button>   
                                                                         </div>                                                                    
                                                                    </div>
                                                                    <div id="collapse{{ $installment->id }}" class="collapse" aria-labelledby="heading{{ $installment->id }}" data-parent="#accordionExample">
                                                                        @if ($installment->debt->trade_name)
                                                                            <div class="font-italic">
                                                                                {{ $installment->debt->locality }}
                                                                            </div>
                                                                        @endif

                                                                        @if ($installment->debt->locality_obs)
                                                                            <div class="font-italic font-9">
                                                                                <i class="fas fa-info-circle mr-2" style="color:#3d9970;"></i>
                                                                                {{ $installment->debt->locality_obs }}
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                </div>                                                          
                                                            </div>
                                                        @else

                                                            <div class="d-flex">
                                                                <input type="text" class="form-control form-control-sm order mr-1"  name="order[{{ $installment->id }}]" id="order-{{ $installment->id  }}" value="{{ $installment->order }}" style="width:32px; height:20px;font-size:9px;display:none;">

                                                                <a href="{{ route('detailInstallment_get', ['id' => $installment->id]) }}" class=" 
                                                                    @if($installment->status == 'PM') 
                                                                        value-paid decoration
                                                                    @endif
                                                                    "
                                                                    >                                                                   
                                                                    {{ $installment->debt->locality }}                
                                                                    @if ($installment->debt->number_installments > 1)
                                                                        <span class="ml-2  
                                                                            @if($installment->status == 'PM') 
                                                                                value-paid decoration
                                                                            @endif"
                                                                            > 
                                                                            ({{ $installment->number_installment }}/{{ $installment->debt->number_installments }})
                                                                        </span>
                                                                    @endif
                                                                </a>                                                            
                                                            </div>

                                                        @endif                                                        
                                                    </td>
                                                    <td class="font-weight-bold text-right font-14 
                                                        @if($installment->status == 'PM') 
                                                            value-paid decoration
                                                        @endif
                                                        "
                                                        >
                                                        R$ {{ formatMoneyBR($installment->value) }}
                                                        @if($installment->status == 'PM')                                              
                                                            <img src="{{ asset('./img/paid_red.png') }}" alt="" width="20px" height="20px">
                                                        @endif                                            
                                                    </td>
                                                </tr>
                                                @if ($installment->debt->prorated_debt == 1)                                
                                                    <tr>
                                                        <td class="font-italic text-left font-12" >
                                                            {{ formatDateBR($installment->debt->date) }}
                                                        </td>
                                                        <td class="font-italic text-left font-12
                                                            @if($installment->status == 'PM') 
                                                                value-paid
                                                            @endif
                                                            "
                                                                style="color:{{ $installment->shopper->color }};"
                                                            >{{ $installment->shopper->name }}
                                                        </td>
                                                        <td colspan='1' class="font-weight-bold font-italic text-right font-9 @if($installment->status == 'PM') 
                                                                value-paid
                                                            @else  
                                                                text-info 
                                                            @endif                                                            
                                                            "
                                                            >
                                                            <i class="fas fa-users"></i>Rateio (R$ {{ $installment->debt->total_value }})
                                                        </td>
                                                    </tr> 
                                                @else
                                                    <tr>
                                                        <td class="font-italic text-left font-12" >
                                                            {{ formatDateBR($installment->debt->date) }}
                                                        </td>
                                                        <td class="font-italic text-left font-12  
                                                            @if($installment->status == 'PM') 
                                                                value-paid 
                                                            @endif"
                                                                style="color:{{ $installment->shopper->color }};"
                                                            >
                                                            {{ $installment->shopper->name }}
                                                        </td>
                                                    </tr> 
                                                @endif  
                                                <tr>
                                                    <td colspan="3" style="background-color:#3d997054;"></td>
                                                </tr>
                                            @endforeach
                                        </table>                                   
                                        <table class="table table-sm mt-2" style="background-color:rgba(0, 0, 0, .05);">
                                            <tr>
                                                <td colspan="2" class="text-center">
                                                    <button type="button" class="btn btn-sm btn-warning btn-order" id="btn-order-check" style="display:block; width:120px;">
                                                        Ordenar <i class="fas fa-check-circle"></i></i>                                                        
                                                    </button>
                                                    <button type="button" class="btn btn-sm btn-danger btn-order" id="btn-order-close" style="display:none; width:120px;">
                                                        Ordenar <i class="fas fa-times-circle"></i>                                                       
                                                    </button>
                                                    
                                                </td>                                                
                                                <td colspan="2" class="text-right">
                                                    <button type="button" class="btn btn-sm btn-success" id="btn-order-save" style="opacity:0; width:120px;">Salvar ordenação</button>
                                                </td>                                                
                                              
                                            </tr>
                                            <tr>
                                                <td colspan="2" class="text-left">                                                   
                                                    <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#calculoModal" style="width:120px;">
                                                        Cálculo
                                                        <i class="fas fa-calculator"></i>
                                                    </button>
                                                </td>                                                
                                                <td class="text-center">
                                                    {{ $installments->count() }} parcelas
                                                </td>                                                
                                                <td class="text-center">
                                                    TOTAL: R$ {{ formatMoneyBR($total) }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <input type="text" class="form-control form-control-sm text-center" name="income" id="income" placeholder="Renda">
                                                </td>
                                                <td colspan="2">
                                                    <input type="text" class="form-control form-control-sm text-center" name="balance" id="balance" placeholder="Sobra" disabled>
                                                </td>                                                                                              
                                            </tr>
                                        </table>                                        
                                   {{--  </div> --}}
                                </div>
                            </div>
                        @else
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    @include('control-finance.components.results-empty')
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="calculoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">                                       
                    @foreach ($calculation as $calc)

                        @if($calc == "")                       
                            <hr>                            
                        @else
                            @if($loop->last)
                                <p class="text-center font-weight-bold font-16 font-italic  mb-0">Total: R$ <span id="totalValue">{{ formatMoneyBR($calc) }}</span></p>
                            @else
                                <p class="text-center font-14 font-italic  mb-0">R$ {{ formatMoneyBR($calc) }}</p>
                            @endif
                            
                        @endif

                    @endforeach
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

@stop

@push('js')
    <script src="{{ asset('vendor/jquery/jquery.mask.min.js') }}"></script>
    <script src="{{ asset('vendor/sweetalert2/dist/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('js/yoda.js') }}"></script>
    <script>
        $(document).ready(function() {

            $('.order').css('display', 'none')

            $('#income').mask('000.000,00', {reverse: true}); 
            $('#balance').mask('000.000,00', {reverse: true}); 

            $('#income').on('focus blur keyup', function() {
                
                let incomeVal = $(this).val()
                
                if (incomeVal.length > 3) {
                                       
                    var totalValue = $('#totalValue').text()

                    incomeVal = incomeVal.replace('.', '')
                    incomeVal = incomeVal.replace(',', '.')
    
                    totalValue = totalValue.replace('.', '')
                    totalValue = totalValue.replace(',', '.') 

                    var result = incomeVal - totalValue 

                    var resultFinal = result.toLocaleString("pt-BR", { style: "currency" , currency:"BRL"});

                    $('#balance').val(resultFinal)


                    if (result < 0) {
                        console.log('<0')
                        $('#balance').css("color", 'red').css("font-weight", 'bold')
                    } else {
                        console.log('>0')
                        $('#balance').css("color", 'blue').css("font-weight", 'bold')
                    }
                }
            });

            $('.btn-order').on('click', function(){
                
                let action = '';
                
                if ($(this).prop('id') == 'btn-order-check') {
                    $(this).css('display', 'none')
                    $('#btn-order-close').css('display', 'block')
                    $('#btn-order-save').css('opacity', '1')
                    action = 'block'
                } 

                if ($(this).prop('id') == 'btn-order-close') {
                    $(this).css('display', 'none')
                    $('#btn-order-check').css('display', 'block')
                    $('#btn-order-save').css('opacity', '0')
                    action = 'none'
                }

                $('.order').each(function () {                 
                    $(this).css('display', action)                     
                })
            })

            $('#btn-order-save').on('click', function(){

                let csrfToken = $('meta[name="csrf-token"]').attr('content');

                let orders = {};

                $('input.order').each(function () {
                    let name = $(this).attr('name');
                    let index = name.match(/\[(\d+)\]/)[1]; // 1
                    orders[index] = $(this).val();
                });

                $.ajax({
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: '/controlfinance/parcela/order',
                    data: orders,
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