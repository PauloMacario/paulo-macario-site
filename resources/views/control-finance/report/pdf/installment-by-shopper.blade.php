
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:ital,wght@0,100..800;1,100..800&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>Document</title>

    <style>

        body {
            font-family: "Montserrat", sans-serif !important;
        }        
        table {
            width: 100%;
            border-collapse: collapse;
        }

        .table-header, .table-items, .table-footer {
            border: 2px solid #6d6d6d;
            background-color: #bdbdbd3f;
        }

        .text-center {text-align: center;}
        
        .text-left {text-align: left;}
        
        .text-right {text-align: right;}

        .p-2 {padding: 2px;}
        .p-4 {padding: 4px;}
        .p-8 {padding: 8px;}
        .p-10 {padding: 10px;}
        .p-15 {padding: 15px;}
        .p-30 {padding: 30px;}

        .pl-2 {padding-left: 2px;}
        .pl-4 {padding-left: 4px;}
        .pl-8 {padding-left: 8px;}
        .pl-10 {padding-left: 10px;}
        .pl-15 {padding-left: 15px;}
        .pl-30 {padding-left: 30px;}

        .pr-2 {padding-right: 2px;}
        .pr-4 {padding-right: 4px;}
        .pr-8 {padding-right: 8px;}
        .pr-10 {padding-right: 10px;}
        .pr-15 {padding-right: 15px;}
        .pr-30 {padding-right: 30px;}

        .m-2 {margin: 2px;}
        .m-4 {margin: 4px;}
        .m-8 {margin: 8px;}
        .m-10 {margin: 10px;}
        .m-15 {margin: 15px;}
        .m-30 {margin: 30px;}

        .ml-2 {margin-left: 2px;}
        .ml-4 {margin-left: 4px;}
        .ml-8 {margin-left: 8px;}
        .ml-10 {margin-left: 10px;}
        .ml-15 {margin-left: 15px;}
        .ml-30 {margin-left: 30px;}
        
        .mr-2 {margin-right: 2px;}
        .mr-4 {margin-right: 4px;}
        .mr-8 {margin-right: 8px;}
        .mr-10 {margin-right: 10px;}
        .mr-15 {margin-right: 15px;}
        .mr-30 {margin-right: 30px;}

        .mt-2 {margin-top: 2px;}
        .mt-4 {margin-top: 4px;}
        .mt-8 {margin-top: 8px;}
        .mt-10 {margin-top: 10px;}
        .mt-15 {margin-top: 15px;}
        .mt-30 {margin-top: 30px;}
        
        .mb-2 {margin-bottom: 2px;}
        .mb-4 {margin-bottom: 4px;}
        .mb-8 {margin-bottom: 8px;}
        .mb-10 {margin-bottom: 10px;}
        .mb-15 {margin-bottom: 15px;}
        .mb-30 {margin-bottom: 30px;}

        .font-item {
            font-size: 12px;
            font-style: italic;
            color:#6b6b6b;
        }

        
        .font-total-item {
            font-size: 12px;
            font-style: italic;
            color:#3d3d3d;
            font-weight:bold;
        }

        .font-total-footer {
            font-size: 14px;
            font-style: italic;
            color:#000000;
            font-weight:bold;
        }

        .font-header {
            font-size: 14px;
            font-style: italic;
            color:#000000;
            font-weight:bold;
        }

        .font-item-title {
            font-size: 12px;
            font-style: italic;
            color:#494949;
            font-weight:bold;
        }
        

    </style>

</head>
<body>

    <table class="table-header font-header mb-8">
        <tbody>
            <tr>
                <td class=" p-4">Nome: {{ $reports['shopperName'] }}</td>
                <td class=" p-4">Mês de referência: {{ $reports['dateRef'] }}</td>
            </tr>
        </tbody>
    </table>

        @php
            $total = 0.0;
            //$totalItem = 0.0;
        @endphp

        @foreach ($reports['data'] as $data)   

            @php
                $totalItem = 0.0;
            @endphp

            <table class="mb-15" style="border: 1px solid {{ getStyle($data['style'], 'color')}};">                           
                <tr >
                    <td colspan="4" class="font-item-title pl-4" style="color:{{ getStyle($data['style'], 'color')}};">{{ $data['paymentType'] }}</td>
                </tr>
                @foreach($data['reports'] as $report)    
               
                    @php
                        $totalItem += $report->value; 
                                         
                    @endphp

                    <tr >
                        <td class="font-item pl-15" width="20%">{{ formatDateBR($report->date) }}</td>
                        <td colspan="2" class="font-item" width="50%"> <span class="">{{ $report->locality }}</span> <span class="">({{ $report->number_installment }}/{{ $report->number_installments }})</td>
                        <td class="font-item" width="30%">R$ {{ formatMoneyBR($report->value) }}</td>
                    </tr>

                    @if($loop->last)
                        <tr>
                            <td  colspan="3" class="font-total-item text-right pl-10">Total: </td>
                            <td class="font-total-item text-right pr-15">R$ {{ formatMoneyBR($totalItem) }}</td>                        
                        </tr>
                        @php
                         $total += $totalItem;
                        @endphp                       
                    @endif
                @endforeach              
            </table>          
           
            @if($loop->last)
                <table class="table-footer font-total-footer">
                    <tr>
                        <td colspan="3" class="text-center p-8">Valor Total: </td>
                        <td class="text-center p-8">R$ {{ formatMoneyBR($total) }}</td>      
                    </tr>
                </table>
            @endif

        @endforeach
   
    
</body>
</html>







