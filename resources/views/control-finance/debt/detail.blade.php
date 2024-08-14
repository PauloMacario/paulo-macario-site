@extends('adminlte::page')

@push('css')
    <style>
      
        .show {
            display: block;
            transition-delay: 8ms
        }

        .hide {
            display: none;
            transition-delay: 8ms
        }
    </style>
@endpush

@section('title', 'Detalhes')

@section('content_header')
    @include('control-finance.components.alerts')
@stop

@section('content')
    <div class="row mt-3">
        <div class="col-12">          
            <div class="card card-olive mb-0"   style="min-height:80vh;">
                <div class="card-header">
                    <h5 class="card-title">Detalhes da compra {{ $debt->description }}</h5>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-8 d-flex justify-content-between">
                            <div class="col-4">
                                <a class="btn bg-warning" id="btn-edit" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                    Editar
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                            </div>
                            <div class="col-4">
                                <form action="{{ route('deleteDebt_post') }}" method="POST" id="form-delete" class="text-right">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $debt->id }}">
                                    <button
                                        class="btn btn-danger"
                                        id="btn-delete"
                                    >
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="collapse" id="collapseExample">
                        <div class="mt-5">
                            <form action="{{ route('updateDebt_post') }}" method="POST" id="form">
                                @csrf
                                <input type="hidden" name="id" value="{{ $debt->id }}">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-5 col-lg-5">
                                            <div class="form-group">
                                                <label for="id">Loja/local</label>
                                                <input 
                                                    type="text" 
                                                    class="form-control" 
                                                    name="locality" 
                                                    id="locality" 
                                                    value="{{ $debt->locality }}" 
                                                    
                                                >
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-md-3 col-lg-3">
                                            <div class="form-group">
                                                <label for="id">Valor</label>
                                                <input 
                                                    type="text" 
                                                    class="form-control" 
                                                    name="total_value" 
                                                    id="value" 
                                                    value="{{ formatMoneyBR($debt->total_value) }}"
                                                    
                                                >
                                            </div>
                                        </div>                                           
                                    </div>
                                    
                                    <div class="row">    
    
                                        <div class="col-xs-12 col-md-2 col-lg-2">
                                            <div class="form-group">
                                                <label for="id">Categoria</label>
                                                <select 
                                                    class="form-control" 
                                                    name="category_id" 
                                                    id="categoryId" 
                                                    
                                                    >                                      
                                                    @foreach ($categories as $category)                                  
                                                        <option value="{{ $category->id }}" 
                                                            @if($category->id == $debt->category_id) selected @endif
                                                            @if(isset($category->style->color))
                                                                style="color:{{ $category->style->color }};"    
                                                            @endif
                                                        >
                                                        {{ $category->description }}</option>
                                                    @endforeach
                                                </select>                                        
                                            </div>
                                        </div>
    
                                        <div class="col-xs-12 col-md-2 col-lg-2">
                                            <div class="form-group">
                                                <label for="id">Comprador(a)</label>
                                                <select 
                                                    class="form-control" 
                                                    name="shopper_id" 
                                                    id="shopperId" 
                                                    
                                                    >
                                                    <option value="" selected>Selecione...</option>                                       
                                                    @foreach ($shoppers as $shopper)                                  
                                                        <option value="{{ $shopper->id }}" @if($shopper->id == $debt->shopper_id) selected @endif>{{ $shopper->name }}</option>
                                                    @endforeach
                                                </select>                                        
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-md-2 col-lg-2">
                                            <div class="form-group">
                                                <label for="id">Data</label>
                                                <input 
                                                    type="date" 
                                                    class="form-control" 
                                                    name="date" 
                                                    id="date" 
                                                    value="{{ $debt->date }}"
                                                    
                                                >
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-md-2 col-lg-2">
                                            <div class="form-group">
                                                <label for="status">Status</label>
                                                <select 
                                                    class="form-control" 
                                                    name="status" 
                                                    id="status" 
                                                    
                                                >                
                                                    <option value="E">Habilitado</option>
                                                    <option value="D">Desabilitado</option>
                                                    <option value="PM">Pagamento feito</option>
                                                    <option value="PP">Pendente pagamento</option>
                                            </select>                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row mt-2">
                                    <div class="col-8">
                                        <div class="col-xs-12 col-md-12 col-lg-12 text-left p-0 m-0">
                                            <div class="form-group d-flex justify-content-end">                                              
                                                <button type="submit" class="btn bg-olive" id="btn-save">
                                                    Salvar
                                                    <i class="fas fa-save"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>                           
                                
                            </form>
                        </div>
                    </div>
                    <div class="row mt-5" id="container-details" style="display:block" data-show="true">
                        <div class="col-8">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Compra</th>
                                        <th>Parcelas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            {{ $debt->locality }}
                                        </td>
                                        <td>

                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>

                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>           
        </div>
    </div>
@stop

@push('js')
    <script src="{{ asset('vendor/jquery/jquery.mask.min.js') }}"></script>
    <script>
        $(document).ready(function() {

            $('#value').mask('000.000,00', {reverse: true});

            $('#btn-edit').on('click', function () {

                var details = $('#container-details');
                
                if (details.attr('data-show') == "true") {
                    $('#container-details').fadeOut(500);
                    $('#container-details').attr('data-show', 'false')
                } else {
                    $('#container-details').fadeIn(1000);
                    $('#container-details').attr('data-show', 'true')
                }
            })

        });
    </script>
@endpush