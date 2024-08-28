@extends('adminlte::page')

@push('css')
    <style>
      
        .show {
            display: block;
            transition-delay: 8ms
        }

        .hide {
            display: none;
            transition-delay: 8ms
        }

        .border-bottom {
            padding-bottom: 2px;
            border-bottom: 1px solid #cdcdcd;
        }
    </style>
@endpush

@section('title', 'Detalhes')

@section('content_header')
    @include('control-finance.components.alerts')
@stop

@section('content')
    <div class="row mt-3">
        <div class="col-12">
            <div class="card card-olive mb-0"   style="min-height:80vh;">
                <div class="card-header">
                    <h5 class="card-title">Detalhes da compra {{ $debt->locality }}</h5>
                </div>
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-xs-12 col-md-10 col-lg-8">
                            <div class="card card-body ">
                                <div class="row d-flex justify-content-between">
                                    <div class="col-4">
                                        {{-- <a class="btn bg-warning btn-sm" id="btn-edit" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                            Editar
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a> --}}
                                    </div>
                                    <div class="col-4">
                                        <form action="{{ route('deleteDebt_post') }}" method="POST" id="form-delete" class="text-right">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $debt->id }}">
                                            <button class="btn btn-danger btn-sm" id="btn-delete" >Delete </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                    
                    <div class="row">
                        <div class="col-xs-12 col-md-10 col-lg-8">
                            <div class="card card-body">
                                <table class="table table-sm table-borderless ">
                                    <tr>
                                        <td class="font-italic text-left font-12" width="35%">{{ $debt->paymentType->description }}</td>
                                        <td class="font-italic text-center font-12" width="35%" 
                                            @if(isset($debt->category->style->color))
                                                style="color:{{ $debt->category->style->color }};"    
                                            @endif
                                        >
                                            {{ $debt->category->description }}
                                        </td>
                                        <td class="font-italic text-center font-12" width="30%">{{ formatDateBR($debt->date) }}</td>
                                    </tr>
                                    <tr >
                                        <td colspan="2" class="font-weight-bold text-left font-14">
                                            <a href="{{ route('detailDebt_get', ['id' => $debt->id]) }}">
                                                {{ $debt->locality }}
                                                <span class="ml-2">
                                                    @if ($debt->number_installments > 1)
                                                        em {{ $debt->number_installments }} x
                                                    @endif
                                                </span>
                                            </a>
                                        </td>
                                        <td class="font-weight-bold text-center font-14 @if($debt->status == 'PM') value-paid @endif">
                                            R$ {{ formatMoneyBR($debt->total_value) }}
                                            @if($debt->status == 'PM')                                              
                                                <img src="{{ asset('./img/paid_red.png') }}" alt="" width="20px" height="20px">
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        @if ($debt->prorated_debt == 1)                                
                                            <td class="font-italic text-left font-12">{{ $debt->shopper->name }}</td>
                                            <td class="font-weight-bold font-italic text-center text-info font-12"><i class="fas fa-users"></i>Rateio</td>
                                            <td></td>                                          
                                        @else                                              
                                            <td class="font-italic text-left font-12">{{ $debt->shopper->name }}</td>                                      
                                            <td colspan="2" ></td>
                                        @endif                                               
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="font-weight-bold text-left font-14 pl-5">Parcelas</td>
                                    </tr>
                                    @foreach ($debt->installments as $installment)
                                        <tr>
                                            <td colspan="2" class="text-left font-italic font-10 @if($installment->status == 'PM') value-paid @endif" width="80%">
                                                <span class="pl-5">{{ formatDateBR($installment->due_date) }}</span>  
                                                <span class="pl-5">({{ $installment->number_installment }}/{{ $debt->number_installments }})</span>
                                                <span class="pl-5">R$ {{ formatMoneyBR($installment->value) }}</span> 
                                                @if($installment->status == 'PM')                                              
                                                    <span class="pl-5">
                                                        <img src="{{ asset('./img/paid_red.png') }}" alt="" width="20px" height="20px">                                                                
                                                    </span>
                                                @endif           
                                            </td>                                                
                                        </tr>                                                
                                    @endforeach                                  
                                </table>
                            </div>
                        </div>
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

            $('#btn-edit').on('click', function () {

                var details = $('#container-details');
                
                if (details.attr('data-show') == "true") {
                    $('#container-details').fadeOut(500);
                    $('#container-details').attr('data-show', 'false')
                } else {
                    $('#container-details').fadeIn(1000);
                    $('#container-details').attr('data-show', 'true')
                }
            })

        });
    </script>
@endpush


