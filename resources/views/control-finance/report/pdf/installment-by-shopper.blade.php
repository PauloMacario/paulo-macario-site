
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
            font-family: "Montserrat", sans-serif;
        }        
        table {
            width: 100%;
            border: 1px solid #cdcdcd;
            border-collapse: collapse;
        }

        tr {
            border: 1px solid #cdcdcd;
        }

        th, td {
            border: 1px solid #cdcdcd;
        }

        .payment-title {
            font-size: 18px;
        }

        .text-center {
            text-align: center;
        }

        .mb-5 {
            margin-bottom: 5px;
        } 

        .mb-10 {
            margin-bottom: 10px;
        } 

        .mb-50 {
            margin-bottom: 50px;
        } 

    </style>

</head>
<body>

    <table class="table mb-50">
        <tbody>
            <tr>
                <td class="text-center">Nome: {{ $reports['shopperName'] }}</td>
                <td class="text-center">Data: {{ $reports['dateRef'] }}</td>
            </tr>
        </tbody>
    </table>

    <table class="table">
        @foreach ($reports['data'] as $data)    
            <tr>
                <td colspan="3" class="payment-title text-center">{{ $data['paymentType'] }}</td>
            </tr>
            @foreach($data['reports'] as $report)    
            
                <tr>
                    <td class="text-center">{{ $report->locality }}</td>
                    <td class="text-center">({{ $report->number_installment }} / {{ $report->number_installments }})</td>
                    <td class="text-center">R$ {{ formatMoneyBR($report->value) }}</td>
                </tr>
            @endforeach
            <tr>
                <th colspan="3" style="background-color:#3d99704f;">&#160;</th>     
            </tr>
        @endforeach
    </table>
    
</body>
</html>
{{-- {{ dd() }} --}}



