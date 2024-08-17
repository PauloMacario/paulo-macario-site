@extends('adminlte::page')

@section('title', 'Pagamento recursos')

@section('content_header')

@stop

@section('content')
    <div class="row mt-3">
        <div class="col-12">
            <div class="card card-olive mb-0">
                <div class="card-header">
                    <h5 class="card-title">Pagamentos</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <a href="#{{-- {{ route('debt_get') }} --}}">
                            <div class="card bg-olive mb-2 ml-2 mr-4 mt-2" style="max-width: 14rem;">
                                <div class="card-header text-center">
                                    <div class="info-box-icon">
                                        <span>
                                            <i class="fas fa-wallet fa-2x"></i>
                                        </span>
                                    </div>         
                                </div>
                                <div class="card-body">
                                <h5 class="card-title text-center p-3"> <span class="">Pagamentos de compras</span></h5>
                              
                                </div>
                            </div>
                        </a>

                        <a href="{{ route('paymentAllInstallments_get') }}">
                            <div class="card bg-navy mb-2 ml-2 mr-4 mt-2" style="max-width: 14rem;">
                                <div class="card-header text-center">
                                    <div class="info-box-icon">
                                        <span>
                                            <i class="fas fa-credit-card fa-2x"></i>
                                        </span>
                                    </div>         
                                </div>
                                <div class="card-body">
                                <h5 class="card-title text-center p-3"><span class="">Pagamentos de parcelas</span></h5>
                              
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop


@push('js')
  
@endpush
