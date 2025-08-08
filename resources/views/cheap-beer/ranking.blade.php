@extends('adminlte::page')

@push('css')
    <style>

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

                    @if ($beersPricers->count())
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <td class="text-center" colspan="3">Data: {{ formatDateBR(now()) }}</td>
                            </tr>
                            <tr>
                                <th class="text-center">Cerveja</th>
                                <th class="text-center">Tamanho</th>
                                <th class="text-center">Local</th>
                                <th class="text-center">Preço</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($beersPricers as $beerPrice)
                                    <tr>
                                        <td class="text-center">{{ $beerPrice->beer_name }}  <img class="ml-3" src="{{ asset('/img/cheap-beer/'.$beerPrice->beer_img.'') }}" style="width:30px; height:30px;"> </td>
                                        <td class="text-center">
                                            @if ($beerPrice->type == "G")
                                                <span style="color:rgb(196, 20, 20);"><strong>350ml</strong></span>
                                            @endif
                                            @if ($beerPrice->type == "P")
                                            <span style="color:rgb(0, 94, 138);"><strong>269ml</strong></span>
                                            @endif
                                        </td>
                                        <td class="text-center">{{ $beerPrice->place_name }} <img class="ml-3" src="{{ asset('/img/cheap-beer/'.$beerPrice->place_img.'') }}" style="width:40px; height:40px;"></td>
                                        <td class="text-center">R$ {{ formatMoneyBR($beerPrice->price) }}</td>
                                    </tr>
                                @endforeach                        
                            </tbody>
                        </table>                    
                    @else
                        <h4 class="text-center">Nenhum item precificado hoje.</h4>
                    @endif
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


