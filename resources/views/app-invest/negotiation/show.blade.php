@extends('adminlte::page')

@section('title', 'Detalhes')

@section('content_header')
@include('app-invest.components.alerts')

@stop

@section('content')
    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card card-lightblue mb-0">
                    <div class="card-header">
                        <h5 class="card-title">Detalhes da negociação: <strong>{{ $negotiation->investment->name }}</strong></h5>
                    </div>
                    <div class="card-body">                      
                        <form action="{{ route('negotiationUpdate_post') }}" method="POST" id="form">
                            @csrf
                            <input type="hidden" name="id" value="{{ $negotiation->id }}">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xs-6 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="invoice">Nota fiscal</label>
                                            <input 
                                                type="text" 
                                                class="form-control form-control-sm" 
                                                name="invoice" 
                                                id="invoice" 
                                                value={{ $negotiation->invoice }}
                                                required
                                            >                          
                                        </div>
                                        <div class="form-group">
                                            <label for="date">Data</label>
                                            <input 
                                                type="date" 
                                                class="form-control form-control-sm" 
                                                name="date" 
                                                id="date" 
                                                value="{{ $negotiation->date }}"
                                                required
                                            >                          
                                        </div>
                                        <div class="form-group">
                                            <label for="investment_id">Investimento</label>
                                            <select 
                                                class="form-control form-control-sm" 
                                                name="investment_id" 
                                                id="investment_id" 
                                                required
                                                >
                                                <option value="">Selecione...</option>                                               
                                                @foreach ($investments as $invesment)
                                                    <option value="{{ $invesment->id }}"
                                                            style="color:{{ $invesment->color }};"
                                                            @if($invesment->id == $negotiation->investment_id) selected  @endif
                                                        >
                                                        {{ $invesment->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="type_negotiation">Tipo negócio</label>
                                            <select 
                                                class="form-control form-control-sm" 
                                                name="type_negotiation"
                                                required
                                                >
                                                <option value="">Selecione...</option>
                                                <option value="C" @if($negotiation->type_negotiation == 'C') selected @endif>Compra</option>
                                                <option value="V" @if($negotiation->type_negotiation == 'V') selected @endif>Venda</option>
                                            </select>
                                        </div>
                                       
                                        <div class="form-group">
                                            <label for="quantity">Quantidade</label>
                                            <input 
                                            type="text" 
                                            class="form-control form-control-sm"  
                                            name="quantity" 
                                            id="quantity" 
                                            value="{{ $negotiation->quantity }}"
                                            required
                                            >
                                        </div>                                  
                                        <div class="form-group">
                                            <label for="value">Valor total</label>
                                            <input 
                                            type="text" 
                                            class="form-control form-control-sm "  
                                            name="value" 
                                            id="value"
                                            value="{{ $negotiation->value }}"
                                            required
                                            >
                                        </div>                                       
                                    </div>
                                </div> 
                            </div>
                            <div class="card-footer">
                                <div class="row ">
                                    <div class="col-xs-6 col-md-6 col-lg-6">
                                        <div class="col-xs-12 col-md-12 col-lg-12 text-left p-0 m-0">
                                            <div class="form-group d-flex justify-content-between">                                               
                                                <a href="{{ route('negotiationAll_get') }}" class="btn bg-warning" id="btn-edit">
                                                    Voltar
                                                    <i class="fas fa-arrow-left"></i>
                                                </a>
                                                <button 
                                                type="submit" 
                                                class="btn bg-lightblue"
                                                id="btn-save"
                                                >
                                                Atualizar
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
    </div>
@stop
@push('js')
<script src="{{ asset('vendor/bs-custom-file-input/dist/bs-custom-file-input.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery/jquery.mask.min.js') }}"></script>
    <script>

        $(document).ready(function() {
            $('#value').mask('000.000,00', {reverse: true});          
            $('#quantity').mask('000.00', {reverse: true});           
        });

    </script>
@endpush