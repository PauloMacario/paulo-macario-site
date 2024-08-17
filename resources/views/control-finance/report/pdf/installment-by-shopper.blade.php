
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Document</title>
</head>
<body>

    <table class="table table-sm table-bordered">
        @foreach ($reports as $report)
    
            @foreach($report as $item)
                @if($loop->first)
                    <tr>
                        <th colspan="3">{{ $report[0]->description }}</th>
                    </tr>
                @endif
    
                <tr>
                    <th >{{ $item->locality }}</th>
                    <th >({{ $item->number_installment }} / {{ $item->number_installments }})</th>
                    <th >{{ $item->value }}</th>
                </tr>
            @endforeach
            <tr>
                <th colspan="3" style="background-color:#3d99704f;"></th>     
            </tr>
        @endforeach
        <tr></tr>
    </table>
    
</body>
</html>



