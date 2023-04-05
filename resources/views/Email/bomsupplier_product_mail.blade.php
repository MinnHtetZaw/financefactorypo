<!DOCTYPE html>
<html>
<head>
    <title>Syspexshwe.com</title>
</head>
<body>
    <h1>{{ $details['title'] }}</h1>
    <p>{{ $details['body'] }}</p>
    <div class="col-md-6">
    <table class="table table-bordered">
            <thead class="text-center bg-info">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Request Qty</th>
                    <th>Request Price</th>
                    <th>Request Specification</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1 ?>
                @foreach($details['data'] as $pro)
                <tr class="text-center">
                    <td>{{$i}}</td>
                    <td>{{$pro->product->name}}</td>
                    <td>{{$pro->requested_qty}}</td>
                    <td>{{$pro->requested_price}}</td>
                    <td>{{$pro->requested_specs}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>
    <p>Thank you</p>
</body>
</html>