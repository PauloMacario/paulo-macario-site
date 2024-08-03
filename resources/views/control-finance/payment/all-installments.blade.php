@extends('adminlte::page')

@push('css')

    <link rel="stylesheet" href="{{ asset('vendor/sweetalert2/dist/sweetalert2.min.css') }}">

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
                            <div class="col-xs-12 col-md-12 col-lg-12">
                                <div class="table-responsive">
                                    <table class="table table-sm table-bordered mb-3"> 
                                        <tr>
                                            <th rowspan="2" class="text-center" >Descrição</th>
                                            <th rowspan="2" class="text-center" >Parcela - Mês ref</th>
                                            <th rowspan="2" class="text-center" >Valor</th>
                                            <th rowspan="2" class="text-center" >Comprador</th>   
                                            <th rowspan="1" colspan="3" class="text-center">Ações</th>
                                        </tr>
                                        <tr>
                                            <th rowspan="1" class="text-center">Pagar</th>   
                                            <th rowspan="1" class="text-center">Pendente</th>  
                                            <th rowspan="1" class="text-center">Salvar</th>                                          
                                        </tr>
                                       
                                        @foreach ( $installments as $installment )       
                                            <form action="{{ route('paymentPayOneInstallment_post') }}" method="POST" id="form-{{ $installment->id }}">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $installment->id }}">
                                                <tr>
                                                    <td class="text-center">{{ $installment->debt->locality }}</td>
                                                    <td class="text-center">
                                                        ({{ $installment->number_installment }}/
                                                        {{ $installment->debt->number_installments }})
                                                        -
                                                        {{ formatDateBR($installment->date) }}
                                                    </td>
                                                    <td class="text-center">{{ formatMoneyBR($installment->value) }}</td>
                                                    <td class="text-center">{{ $installment->debt->shopper->name }}</td>
                                                    <td class="text-center">                                                    
                                                        <input class="" type="radio" name="status" value="PM" @if($installment->status == 'PM') checked @endif>                                                    
                                                    </td>
                                                    <td class="text-center">
                                                        <input class="" type="radio" name="status" value="PP" @if($installment->status == 'PP') checked @endif>
                                                    </td>
                                                    <td class="text-center">
                                                        <button class="btn btn-sm bg-olive btn-save" id="{{ $installment->id }}">Salvar</button>
                                                    </td>
                                                </tr>     
                                            </form>
                                        @endforeach
                                    </table>
                                    {{ $installments->links() }}  
                                </div>
                            </div>                               
                        </div>
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

                        var title = data.title;
                        var icon = data.icon;
                        var msg = data.msg;

                        Swal.fire({
                            title: title,
                            text: msg,
                            icon: icon,
                            confirmButtonText: 'Fechar'
                            });
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
