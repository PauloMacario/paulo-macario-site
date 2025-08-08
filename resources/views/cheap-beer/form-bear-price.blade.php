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
            @foreach ($places as $place)
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-8 col-lg-6">
                        <div class="card collapsed-card" >
                            <div class="card-header">                                
                                <span class="btn btn-sm" style="font-size:18px;width:100px; color:{{ $place->color }};">
                                    <strong>{{ $place->name }}</strong>                                        
                                </span>
                                <img src="{{ asset('/img/cheap-beer/'.$place->img.'') }}" style="width:30px; height:30px;">
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body" style="display: none;">                                
                                @foreach ($beers as $beer)
                                    <form class="form-horizontal formBeerPrice">
                                        <input type="hidden" name="beer_id" value="{{ $beer->id }}">
                                        <input type="hidden" name="place_id" value="{{ $place->id }}">
                                        
                                        <div class="form-group row">
                                            <label for="" class="col-4 col-form-label mb-2 text-center">
                                                <strong style="font-size:15px; color:{{ $beer->color }};">{{ $beer->name }}</strong>
                                                <img src="{{ asset('/img/cheap-beer/'.$beer->img.'') }}" style="width:70px; height:70px;">
                                            </label>
                                            <div class="col-6">
                                                <input type="text" class="form-control price mb-2" name="price" 
                                                    @if($priceToday = Rules\CheapBeer\Helpers\BeerPlaceHelper::getPriceToday($beer->id, $place->id))  
                                                        value="{{ $priceToday->price }}"                                                        
                                                    @endif 
                                                required>
                                            {{-- </div>
                                            <div class="col-4"> --}}
                                                <button type="submit" class="form-control btn btn-warning mb-2">Salvar</button>
                                            </div>
                                            <div class="col-2 text-center" id="icon"> 
                                                @if($priceToday = Rules\CheapBeer\Helpers\BeerPlaceHelper::getPriceToday($beer->id, $place->id))  
                                                    <i class="fa fa-check text-success" aria-hidden="true"></i>  
                                                @else  
                                                    <i class="fa fa-minus" aria-hidden="true"></i>                                                    
                                                @endif 
                                            </div>
                                        </div>                                       
                                        
                                    </form>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@stop

@push('js')
    <script src="{{ asset('vendor/jquery/jquery.mask.min.js') }}"></script>
    <script>
        $(document).ready(function() {

            $('.price').mask('000.000,00', {reverse: true});  

            $('.formBeerPrice').on('submit', function(e){

                e.preventDefault();

                var form = $(this);
                var icone = form.find('i').first();

                icone.removeClass().addClass('fa fa-spinner fa-spin');

                var beerId = form.find('input[name="beer_id"]').val();
                var placeId = form.find('input[name="place_id"]').val();
                var price = form.find('input[name="price"]').val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                }); 

                $.ajax({
                    url: '/cheapbeer/beerprice',
                    method: 'POST',
                    data: {
                        beer_id: beerId,
                        place_id: placeId,
                        price: price
                    },
                    success: function(resposta) {
                        icone.removeClass().addClass('fa fa-check text-success');
                    },
                    error: function(xhr, status, error) {
                        icone.removeClass().addClass('fa fa-times text-danger');
                    }
                });
            });          
        });
    </script>
@endpush


