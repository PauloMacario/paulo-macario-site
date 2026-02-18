@extends('adminlte::page')

@push('css')
    <style>
        table
        a {
            color: rgb(20, 20, 20);
            text-decoration: none;
        }

        a:hover {
            color: #3d9970;
        }

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
        .input-qtd {
            width: 45px;
        }
        .input-price {
            width: 75px;
        }

        input[disabled] {
            background-color: #6e42c11f !important;
        }
        .check
        {
            width: 50px;
        }
        td {
            padding: 2px 2px 2px 5px !important;
        }
        .td-main {
            padding: 2px 2px 10px 5px !important;
        }
        .td-space {
            background-color:#6f42c1;
            padding: 2px !important;
        }       
        .italic {
            font-style: italic;
        }
        .buy {
            background-color: #6e42c180;
            text-decoration: line-through;
        }
        .buy-checked {
            background-color: #814edf;
            text-decoration: none;
            color: #fff;
        }
        .no-buy {
            background-color: #ffffff;
            text-decoration:none;
            color: rgb(20, 20, 20);
        }
        input[type="text"] {
            width: 70px;
            height: 30px;
            padding: 5px 10px;            
            border: 1px solid #6f42c1;
            border-radius: 4px;            
            font-size: 12px;
        }
        input[type="number"] {
            width: 45px;
            height: 30px;
            padding: 5px 10px;            
            border: 1px solid #6f42c1;
            border-radius: 4px;            
            font-size: 12px;
        }
    </style>
@endpush

@section('title', 'Listas')

@section('content_header')
@include('shopping-list.components.alerts')
@stop

@section('content')
    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card card-purple mb-0">
                    <div class="card-header">
                        <h5 class="card-title">Listas de compras</h5>
                    </div>
                    <div class="card-body">
                        @if (! $listProducts->count())
                            <h5>Nenhuma lista criada!</h5>
                        @else
                            <div class="row mt-3">
                                <div class="col-xs-12 col-md-12 col-lg-12 text-right p-0 m-0" style="height:68vh; overflow-x: scroll;">
                                    <table width="100%">
                                        <thead>
                                            <tr>
                                                <th colspan="5" 
                                                    class="font-14 text-center">
                                                    <h4>
                                                        {{ $listProducts[0]->list_name }}                                                        
                                                    </h4>
                                                </th>
                                            </tr>
                                        </thead>                    
                                        <tbody>
                                            @foreach ($listProducts as $list)
                                                @if($loop->first)
                                                    <tr>
                                                        <td colspan="5" 
                                                            class="td-space">                                                            
                                                        </td>                                                                                                                        
                                                    </tr>
                                                @endif
                                                <tr class="row-{{ $list->id }}">
                                                    <td colspan="2" 
                                                        class="text-left font-10 italic 
                                                        @if($list->purchased == "Y")
                                                            buy 
                                                        @endif"
                                                    >
                                                        Mercearia
                                                    </td>                                                    
                                                    <td class="text-center font-10 td-qtd italic 
                                                        @if($list->purchased == "Y") 
                                                            buy                                                        
                                                        @endif"
                                                    >
                                                        Qtd
                                                    </td>
                                                    <td class="text-center font-10 td-price italic 
                                                        @if($list->purchased == "Y")
                                                            buy 
                                                        @endif"
                                                    >
                                                        R$
                                                    </td>                                                 
                                                    <td  class="font-10 td-buy italic 
                                                        @if($list->purchased == "Y")
                                                             buy-checked
                                                        @endif"
                                                        style="text-decoration: none;"
                                                    >
                                                        Comprado
                                                    </td>                                                                        
                                                </tr>
                                                <tr class="row-{{ $list->id }}">
                                                    <td class="td-main text-left font-14 
                                                        @if($list->purchased == "Y")
                                                            buy 
                                                        @endif" 
                                                        width="50%"
                                                    >
                                                       {{ $list->product_name }}
                                                    </td>
                                                    <td class="td-main
                                                        @if($list->purchased == "Y")
                                                            buy 
                                                        @endif" >
                                                        <button class="btn btn-sm btn-info btn-update"
                                                            id="btn-update-{{ $list->id }}"                                                            
                                                            style="display:none;"
                                                        >
                                                            <i class="fas fa-save"></i>
                                                        </button>
                                                    </td>
                                                    <td class="td-main text-center font-12 td-qtd 
                                                        @if($list->purchased == "Y") buy @endif"
                                                    >
                                                        <input 
                                                            type="number" 
                                                            class="text-center input-qtd" 
                                                            name="" 
                                                            id="qtd-{{ $list->id }}" 
                                                            min="1" max="100"
                                                            value="{{ $list->quantity }}" 
                                                            @if($list->purchased == "Y") 
                                                                disabled 
                                                            @endif
                                                        >
                                                    </td>
                                                    <td class="td-main text-center font-12 td-price 
                                                        @if($list->purchased == "Y") buy @endif"
                                                    >
                                                        <input 
                                                            type="text" 
                                                            class="input-price" 
                                                            name="" 
                                                            id="price-{{ $list->id }}" 
                                                            value="{{ $list->price }}" 
                                                            @if($list->purchased == "Y") 
                                                                disabled 
                                                            @endif
                                                        >
                                                    </td>
                                                    <td class=" td-main text-center font-12 td-checkbox 
                                                        @if($list->purchased == "Y") buy @endif" width="10%"
                                                    >
                                                        <input 
                                                            type="checkbox" 
                                                            class="check input-check" 
                                                            name="check[{{ $list->id }}]" 
                                                            id="check-{{ $list->id }}" 
                                                            @if($list->purchased == "Y") 
                                                                checked 
                                                            @endif
                                                        > 
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="5" 
                                                        class="td-space">                                                        
                                                    </td>                                                                                                                        
                                                </tr>
                                            @endforeach
                                        </tbody>                    
                                    </table>
                                </div>
                            </div>
                             <div class="row mt-3">
                                <div class="col-xs-12 col-md-12 col-lg-12 text-left">
                                     <table class="bg-purple" width="100%">                                              
                                        <tbody>
                                            <tr>
                                                <td class="text-center p-1" width="50%">TOTAL</td>
                                                <td class="text-center p-1">
                                                    <span>R$ </span>
                                                    <span id="total"></span>
                                                </td>
                                            </tr>
                                        </tbody>
                                     </table>
                                </div>
                             </div>
                        @endif
                    </div>
                    <div class="card-footer">
                        <div class="row ">
                            <div class="col-xs-6 col-md-6 col-lg-6">
                                <div class="col-xs-12 col-md-12 col-lg-12 text-left p-0 m-0">
                                    <div class="form-group d-flex justify-content-end">
                                        <a href="{{ route('listas_get') }}" class="btn bg-warning btn-sm" id="btn-edit">
                                            Voltar
                                            <i class="fas fa-arrow-left"></i>
                                        </a>                                        
                                    </div>
                                </div>
                            </div>
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

            $('.input-price').mask('000.000,00', {reverse: true});

            $('.input-qtd').on('input', function() {
                let valor = parseInt($(this).val());

                if (valor > 100) $(this).val(100);
                if (valor < 1) $(this).val('1');
            });

            calcTotalValue();

            $('.input-qtd').on('change', function() {
                calcTotalValue();
            })

            $('.check').on('change', function() {

                let id = $(this).attr('id').slice(6);
                let checked = this.checked;
                
                calcTotalValue();
                changeRow(checked, id);
                changeFields(checked, id);

                $('#btn-update-'+id).css('display', 'none')
            })


            $('.input-qtd, .input-price').on('change', function() {
                let id = $(this).attr('id').slice(4);                
                $('#btn-update-'+id).css('display', 'block')
            });

            $('.input-price').on('change', function() {

                let id = $(this).attr('id').slice(6);                
                $('#btn-update-'+id).css('display', 'block')
            });

            $('.btn-update').on('click', function() {
                let id = $(this).attr('id').slice(11);                
                let qtd = $('#qtd-'+id).val();  
                let price = $('#price-'+id).val();
                let check = $('#check-'+id); 

                check = check.checked ? 'Y' : 'N' ;
                price = price.replace(/\./g, '').replace(',', '.'); 

                $.ajax({
                    type: 'POST',
                    url: '/lista-produtos/atualiza',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: {
                        "id": id,
                        "price": price,
                        "quantity": qtd,
                        "purchased": check
                        },
                    success: function (data) {

                        $('#btn-update-'+id).css('display', 'none')

                        /* linhasSelected.forEach(function (i) {
                            i.remove()
                        })

                        let title = "Ok!";
                        let text = "QUE A FORÇA ESTEJA COM VOCÊ";
                        let linkImg = '{{ asset('img/yoda_speak.jpg') }}' 

                        getYodaSwal(linkImg, title, text) */
                },
                    error: function (data) {

                        /* let title = data.responseJSON.title;
                        let icon = data.responseJSON.icon;
                        let msg = data.responseJSON.msg;

                        Swal.fire({
                            title: title,
                            text: msg,
                            icon: icon,
                            confirmButtonText: 'Fechar'
                            })  */
                    },
                });
            });

           
        });

        function calcTotalValue() {
            var valorTotal = 0;

            $('.check:checked').each(function () {
               let id = $(this).attr('id').slice(6);
               let price = $('#price-'+id).val();
               let qtd = $('#qtd-'+id).val();

               price = price.replace(/\./g, '').replace(',', '.'); 

               console.log('price-> '+price)

               let priceTotal = price * qtd;              

               valorTotal += priceTotal;               
            });

            let totalMoney = valorTotal.toLocaleString('pt-BR', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            })

            $('#total').text(totalMoney)
        }

        function changeRow(checked, id) {                           
            $('.row-'+id).each(function () {
                
                if (checked) {
                    $(this).find('td').addClass('buy');
                    $(this).find('td.td-buy').addClass('buy-checked');
                    $(this).find('td').removeClass('no-buy');

                } else {
                    $(this).find('td').addClass('no-buy');
                    $(this).find('td.td-buy').removeClass('buy-checked');
                    $(this).find('td').removeClass('buy');
                }                
            });                  
        }

        function changeFields(checked, id) {
            let price = $('#price-'+id);
            let qtd = $('#qtd-'+id);

             if (checked) {
                price.attr('disabled', true)
                qtd.attr('disabled', true)

            } else {
                price.attr('disabled', false)
                qtd.attr('disabled', false)
            }                
        }

    </script>
@endpush