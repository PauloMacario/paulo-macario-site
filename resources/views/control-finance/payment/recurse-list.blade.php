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
                        <div class="col-md-3 col-sm-6 col-12">
                            <a href="#{{-- {{ route('debt_get') }} --}}">
                                <div class="info-box bg-olive">
                                    <span class="info-box-icon">
                                        <i class="fas fa-wallet"></i>
                                    </span>
                                    <div class="info-box-content">
                                        <span class="">Pagamentos de compras</span>
                                    </div>                            
                                </div>
                            </a>
                        </div>

                        <div class="col-md-3 col-sm-6 col-12">
                            <a href="{{ route('paymentAllInstallments_get') }}">
                                <div class="info-box bg-navy">
                                    <span class="info-box-icon">
                                        <i class="fas fa-credit-card mr-2 "></i>
                                    </span>
                                    <div class="info-box-content">
                                        <span class="">Pagamentos de parcelas</span>
                                    </div>                            
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop


@push('js')
  
@endpush
