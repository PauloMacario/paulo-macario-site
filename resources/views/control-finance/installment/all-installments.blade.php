@extends('adminlte::page')

@section('title', 'Parcelas')

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
                <div class="card card-olive mb-0">
                    <div class="card-header">
                        <h5 class="card-title">Parcelas do mês:<strong class="ml-2">{{ $yearMonthRef }}</strong></h5>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('installmentAllMonth_post') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-xs-12 col-md-2">
                                    <div class="form-group">                                                                      
                                        <select class="form-control" name="month" id="">
                                            <option value="01">Jan</option>
                                            <option value="02">Fev</option>
                                            <option value="03">Mar</option>
                                            <option value="04">Abr</option>
                                            <option value="05">Mai</option>
                                            <option value="06">Jun</option>
                                            <option value="07">Jul</option>
                                            <option value="08">Ago</option>
                                            <option value="09">Set</option>
                                            <option value="10">Out</option>
                                            <option value="11">Nov</option>
                                            <option value="12">Dez</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-2">
                                    <div class="form-group">                                                                      
                                        <select class="form-control" name="year" id="">
                                            <option value="2020">2020</option>
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
                                            <option value="2026">2026</option>
                                            <option value="2027">2027</option>
                                            <option value="2028">2028</option>
                                            <option value="2029">2029</option>
                                            <option value="2030">2030</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-2">            
                                    <div class="form-group">
                                        <button class="btn bg-olive">
                                            Buscar por mês
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <table class="table table-sm table-striped">
                            <tr>
                                <th class="text-center" width="60%">Descrição</th> 
                                <th width="20%">Parc.</th>  
                                <th width="20%">Valor</th>
                            </tr>

                            @foreach ( $installments as $installment )
                                @php
                                    $total += $installment->value
                                @endphp
                                <tr>
                                    <td>
                                        {{ $installment->debt->locality }} 
                                    </td>  
                                    <td>
                                        (
                                            {{ $installment->number_installment }}/{{ $installment->debt->number_installments }} 
                                        )                                                                         
                                    </td>                                 
                                    <td>R$ {{ formatMoneyBR($installment->value) }}</td>
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
