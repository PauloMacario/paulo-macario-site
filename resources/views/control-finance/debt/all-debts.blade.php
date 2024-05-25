@extends('adminlte::page')

@section('title', 'Dívidas')

@section('content_header')
{{-- <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h5>TITLEXXXXX</h5>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="">Home</a></li>
                <li class="breadcrumb-item active">TITLEXXXXX</li>
            </ol>
        </div>
    </div>
</div> --}}
@stop

@section('content')
    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card card-primary mb-0">
                    <div class="card-header">
                        <h5 class="card-title">RECURSOXXXX</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm table-striped">
                            <tr>
                                <th>Data</th>
                                <th>Categoria</th>
                                <th>Descrição</th>
                                <th>Comprador</th>
                                <th>Valor</th>
                            </tr>

                            @foreach ( $debts as $debt )
                                @php
                                    $total += $debt->total_value
                                @endphp
                                <tr>
                                    <td>{{ formatDateBR($debt->date) }}</td>
                                    <td>{{ $debt->category->description }}</td>
                                    <td>{{ $debt->locality }}</td>
                                    <td>{{ $debt->shopper->name }}</td>
                                    <td>R$ {{ formatMoneyBR($debt->total_value) }}</td>
                                </tr>
                            @endforeach
                        </table>
                       
                        {{-- <div class="row">
                            <div class="col-xs-12 col-md-6 col-lg-4">
                
                            </div>
                        </div> --}}

                        
                    </div>
                    <div class="card-footer">
                        <table class="table table-sm table-striped">
                            <tr>
                                <th colspan="4"><h4 class="text-center">TOTAL:</h4></th>
                                <th><h4>R$ {{ formatMoneyBR($total) }}</h4></th>
                            </tr>
                        
                        {{-- <div class="row">
                            <div class="col-xs-12 col-md-6 col-lg-4">
                                
                            </div>
                        </div> --}}
                           
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@push('js')
    <script src=""></script>
    <script>
        $(document).ready(function() {

        });
    </script>
@endpush
