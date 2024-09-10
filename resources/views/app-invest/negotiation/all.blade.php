@extends('adminlte::page')

@section('title', 'Negociações')

@section('content_header')
@stop

@section('content')

    <div class="row mt-3">
        <div class="col-12">            
            <div class="card card-lightblue mb-0">
                <div class="card-header">
                    <h5 class="card-title">Negociações</h5>
                </div>
                <div class="card-body">

                    @if($negotiations->count() > 0) 

                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>Data</th>
                                    <th>Tipo</th>
                                    <th>Investimento</th>
                                    <th>Negociação</th>
                                    <th>Valor</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            @foreach ($negotiations as $negotiation)
                                <tbody>
                                    <tr>
                                        <td>{{ formatDateBR($negotiation->date) }}</td>
                                        <td>{{ $negotiation->investment->typeInvestment->name }}</td>
                                        <td>{{ $negotiation->investment->name }}</td>
                                        <td>
                                            @if($negotiation->type_negotiation == 'B')
                                                COMPRA
                                            @else 
                                                VENDA
                                            @endif
                                        </td>
                                        <td>R$ {{ formatMoneyBR($negotiation->value) }}</td>
                                        <td>
                                            <a href="#">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
        
                                </tbody>                            
                            @endforeach
                        </table>
                    @else                      
                        @include('app-invest.components.results-empty')                           
                    @endif
                    
                </div>
            </div>            
        </div>
    </div>

@stop
@push('js')
  
@endpush
