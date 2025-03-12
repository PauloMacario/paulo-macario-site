@extends('adminlte::page')

@section('title', 'Relatórios')

@push('css')

    <style>
    .bold {
        font-weight: bold;
    } 

    .font-8 {
        font-size: 8px;
    }  

    .font-9 {
        font-size: 9px;
    }  

    .font-10 {
        font-size: 10px;
    }  
    
    
    </style> 
@endpush

@section('content_header')
    @include('control-finance.components.alerts')
@stop

@section('content')
    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card card-olive mb-0">
                    <div class="card-header">
                        <h5 class="card-title">Relatórios</h5>
                    </div>
                    <div class="card-body">
                        <div class="col-12 col-md-8 col-lg-8">
                            <form action="{{ route('pdfReportAll_post') }}" method="POST"> 
                                @csrf
                                <div class="row">
                                    <div class="col-12 col-md-6 col-lg-6">
                                        <div class="form-group">                                                               
                                            <select class="form-control form-control-sm btn-change" name="shopper_id" id="shopper_id">
                                                <option value="0">Selecione comprador</option>
                                                @foreach ( $shoppers as $shopper )
                                                    <option value="{{ $shopper->id }}" 
                                                        @if($shopper->id == $shopperId || $shopper->id == old('shopper_id')) 
                                                            selected
                                                        @endif
                                                            style="color:{{ $shopper->color }};"
                                                        >
                                                        {{ $shopper->name }}
                                                    </option>                                                
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <div class="form-group">                                                                      
                                            <select class="form-control form-control-sm btn-change" name="month" id="">
                                                <option value="01" @if($month == '01' || old('month') == '01') selected @endif>Jan</option>
                                                <option value="02" @if($month == '02' || old('month') == '02') selected @endif>Fev</option>
                                                <option value="03" @if($month == '03' || old('month') == '03') selected @endif>Mar</option>
                                                <option value="04" @if($month == '04' || old('month') == '04') selected @endif>Abr</option>
                                                <option value="05" @if($month == '05' || old('month') == '05') selected @endif>Mai</option>
                                                <option value="06" @if($month == '06' || old('month') == '06') selected @endif>Jun</option>
                                                <option value="07" @if($month == '07' || old('month') == '07') selected @endif>Jul</option>
                                                <option value="08" @if($month == '08' || old('month') == '08') selected @endif>Ago</option>
                                                <option value="09" @if($month == '09' || old('month') == '09') selected @endif>Set</option>
                                                <option value="10" @if($month == '10' || old('month') == '10') selected @endif>Out</option>
                                                <option value="11" @if($month == '11' || old('month') == '11') selected @endif>Nov</option>
                                                <option value="12" @if($month == '12' || old('month') == '12') selected @endif>Dez</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <div class="form-group">                                                                      
                                            <select class="form-control form-control-sm btn-change" name="year" id="">
                                                <option value="2020" @if($year == '2020' || old('year') == '2020') selected @endif>2020</option>
                                                <option value="2021" @if($year == '2021' || old('year') == '2021') selected @endif>2021</option>
                                                <option value="2022" @if($year == '2022' || old('year') == '2022') selected @endif>2022</option>
                                                <option value="2023" @if($year == '2023' || old('year') == '2023') selected @endif>2023</option>
                                                <option value="2024" @if($year == '2024' || old('year') == '2024') selected @endif>2024</option>
                                                <option value="2025" @if($year == '2025' || old('year') == '2025') selected @endif>2025</option>
                                                <option value="2026" @if($year == '2026' || old('year') == '2026') selected @endif>2026</option>
                                                <option value="2027" @if($year == '2027' || old('year') == '2027') selected @endif>2027</option>
                                                <option value="2028" @if($year == '2028' || old('year') == '2028') selected @endif>2028</option>
                                                <option value="2029" @if($year == '2029' || old('year') == '2029') selected @endif>2029</option>
                                                <option value="2030" @if($year == '2030' || old('year') == '2030') selected @endif>2030</option>
                                            </select>
                                        </div>
                                    </div>                                                     
                                </div> 
                                <div class="row">                                  
                                    <div class="col-12 col-md-3">            
                                        <div class="form-group">
                                            <a href="{{ route('pdfReportMonth_get') }}" class="btn bg-warning btn-block btn-sm" >
                                                Limpar
                                                <i class="fas fa-broom"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-3">            
                                        <div class="form-group ">
                                            <button class="btn bg-olive btn-block btn-sm">
                                                Buscar
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                       
                        <div class="col-12 col-md-8 col-lg-8" id="result-report">
                            @if(count($reports) > 0)
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="text-center font-10" width="30%">Meses</th>
                                                <th class="text-center font-10" >Parcela corrente</th>
                                                @foreach ($reports['monts'] as $monts)
                                                    <th  class="text-center font-10">{{ formatDateYearMonthBR($monts) }}</th>
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($reports['reports'] as $payTypeId => $report)
                                                <tr>
                                                    <td colspan="{{ count($reports['monts']) + 2 }}" class="bold text-center font-10">
                                                        {{ getNamePaymentType($payTypeId) }}
                                                    </td>
                                                </tr>
                                                @foreach ($report as $debtId => $dates)
                                                    <tr>                                                        
                                                        <td class="text-center font-10">
                                                            {{ getNameDebt($debtId) }}
                                                        </td> 
                                                        @php
                                                            $indexInst = 0;
                                                        @endphp                                    
                                                        @foreach ($dates as $int)
                                                            @php
                                                                $indexInst++;
                                                            @endphp    

                                                            @if ($loop->first && isset($int->value))
                                                                <td class="text-center font-10">
                                                                    (
                                                                    {{ $int->number_installment }}
                                                                    /
                                                                    {{ $int->debt->number_installments }}
                                                                    )
                                                                </td>                                                         
                                                            @endif
                                                           

                                                            @if(isset($int->value))                                                                
                                                                <td class="text-center font-10">
                                                                    R$ {{ formatMoneyBR($int->value) }}
                                                                </td>
                                                            @else                                                               
                                                                <td class="text-center font-10">
                                                                    -
                                                                </td>
                                                            @endif                                                       
                                                        @endforeach                                                   
                                                    </tr>                                                                          
                                                @endforeach                                           
                                                <tr>
                                                    <td colspan="{{ count($reports['monts']) + 2 }}" style="background-color:#3d997069;"></td>   
                                                </tr>
                                            @endforeach                                           
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                @include('control-finance.components.results-empty')                            
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@push('js')
   {{--  <script src=""></script>
    <script>
        $(document).ready(function() {

            $('.btn-change').on('change' , function(el) {
                $('#result-report').remove()
            })

            var allPaymentTypes = $("#all-payment-types");

            allPaymentTypes.click(function () {

            if ( $(this).is(':checked') ){
                $('.item-payment-type').prop("checked", true);

            }else{
                $('.item-payment-type').prop("checked", false);
                
            }
            });


            $('.btn-acao').click(function (event ) {
                
                event.preventDefault();

                var acao = $(this).data("acao");

                $('#btn-acao').val(acao)

                $('#form').submit()

            });
        });
    </script> --}}
@endpush