@extends('adminlte::page')

@section('title', 'Dívidas')

@section('content_header')
    @include('components.alerts')
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
                        <h5 class="card-title">Compras do mês:<strong class="ml-2">{{ $month }} / {{ $year }}</strong></h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('debtAllMonth_post') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-xs-12 col-md-2">
                                    <div class="form-group">                                                                      
                                        <select class="form-control" name="month" id="">
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
                                <div class="col-xs-12 col-md-2">
                                    <div class="form-group">                                                                      
                                        <select class="form-control" name="year" id="">
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
                                <div class="col-xs-12 col-md-2">            
                                    <div class="form-group">
                                        <button class="btn bg-olive ">
                                            Buscar por mês
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
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
                                    <td>
                                        {{ $debt->locality }}
                                        @if ($debt->number_installments > 1)
                                            / {{ $debt->number_installments }}  parcelas
                                        @endif
                                    </td>
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
