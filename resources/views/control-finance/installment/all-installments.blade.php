@extends('adminlte::page')

@push('css')
    <style>
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
    </style>
@endpush

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

                        <table class="table table-sm table-borderless{{-- table-bordered --}}">

                            @foreach ( $installments as $installment )
                                <tr>
                                    <td colspan="2" class="font-italic text-left font-12" width="70%">{{ $installment->debt->paymentType->description }}</td>
                                    <td class="font-italic text-center font-12" width="30%">{{ formatDateBR($installment->due_date) }}</td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="font-weight-bold text-left font-14">{{ $installment->debt->locality }}</td>
                                    <td class="font-weight-bold text-center font-14">R$ {{ formatMoneyBR($installment->value) }}</td>
                                </tr>
                                @if ($installment->partitions->count() > 0)
                                    @foreach ( $installment->partitions as $partition)
                                        <tr>
                                            <td class="font-italic text-left font-12">{{ $partition->shopper->name }}</td>
                                            <td class="font-italic text-left font-12">R$ {{ formatMoneyBR($partition->value) }}</td>
                                            @if ($loop->first) 
                                                <td class="font-weight-bold text-center font-12">({{ $installment->number_installment }}/{{ $installment->debt->number_installments }})</td>
                                            @endif
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="2" class="font-italic text-left font-12">{{ $installment->debt->shopper->name }}</td>
                                        <td class="font-weight-bold text-center font-12">({{ $installment->number_installment }}/{{ $installment->debt->number_installments }})</td>
                                    </tr>
                                @endif
                                <tr>
                                    <td colspan="3" {{-- class="bg-teal" --}} style="background-color:#3d997054;"></td>
                                </tr>
                            @endforeach
                            </table>
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
