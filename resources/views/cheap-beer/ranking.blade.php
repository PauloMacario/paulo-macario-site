@extends('adminlte::page')

@push('css')
    <style>
        .font-6 {
            font-size: 6px;
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
        .font-11 {
            font-size: 11px;
        }
        .font-12 {
            font-size: 12px;
        }
    </style>
@endpush

@section('title', 'Precificação')

@section('content_header')
   {{--  @include('control-finance.components.alerts') --}}
@stop

@section('content')
    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Ranking de preços</h3> 
                </div>
                <div class="card-body">

                    <div class="row mt-3 mb-3">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                            <a href="{{ route('getFormBeearPrice_get') }}" class="btn btn-block bg-olive">Precificar</a>
                        </div>
                    </div>

                    <div class="row mt-3 mb-3">
                        <div class="col-6 col-sm-6 col-md-3 col-lg-3">
                            <form action="">
                                <div class="form-group">
                                    <input type="date" class="form-control form-control-sm" name="date" id="date" value="{{ $date }}" >
                                </div>
                            </div>
                            <div class="col-6 col-sm-6 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <button type="submit"class="form-control form-control-sm bg-olive">Buscar</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                            @if ($beersPricers->count())
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <td class="text-center font-12" colspan="3">Data: {{ formatDateBR($date) }}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-center font-12">Cerveja</th>
                                        <th class="text-center font-12">Tipo</th>
                                        <th class="text-center font-12">Local</th>
                                        <th class="text-center font-12" width="30%">Preço</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($beersPricers as $beerPrice)
                                            <tr>
                                                <td class="text-center font-12">{{ $beerPrice->beer_name }}  <img class="ml-3" src="{{ asset('/img/cheap-beer/'.$beerPrice->beer_img.'') }}" style="width:30px; height:30px;"> </td>
                                                <td class="text-center font-12">
                                                    @if ($beerPrice->type == "G")
                                                        <span style="color:rgb(196, 20, 20);"><strong>350ml</strong></span>
                                                    @endif
                                                    @if ($beerPrice->type == "P")
                                                    <span style="color:rgb(0, 94, 138);"><strong>269ml</strong></span>
                                                    @endif
                                                </td>
                                                <td class="text-center font-12">{{ $beerPrice->place_name }} <img class="ml-3" src="{{ asset('/img/cheap-beer/'.$beerPrice->place_img.'') }}" style="width:40px; height:40px;"></td>
                                                <td class="text-center font-12">R$ {{ formatMoneyBR($beerPrice->price) }}</td>
                                            </tr>
                                        @endforeach                        
                                    </tbody>
                                </table>                    
                            @else
                                <h4 class="text-center font-12">Nenhum item precificado hoje.</h4>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-footer clearfix">
                    
                </div>
              </div>
        </div>
    </div>
@stop

@push('js')
    <script src="{{ asset('vendor/jquery/jquery.mask.min.js') }}"></script>
    <script>
        $(document).ready(function() {

          
        });
    </script>
@endpush


