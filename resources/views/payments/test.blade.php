<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payment</title> <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</head>
<body>
    <form id="2c2p-payment-form" action="{{route('payment3')}}" method="POST">
        @csrf
        <input type="text" data-encrypt="cardnumber" maxlength="16" placeholder="Credit Card Number"><br/>
        <input type="text" data-encrypt="month" maxlength="2" placeholder="MM"><br/>
        <input type="text" data-encrypt="year" maxlength="4" placeholder="YYYY"><br/>
        <input type="password" data-encrypt="cvv" maxlength="4" autocomplete="off" placeholder="CVV2/CVC2"><br/>
        <input type="submit" value="Submit">
    </form>

<script type="text/javascript" src="{{ config('laravel-2c2p.secure_pay_script') }}"></script>
<script type="text/javascript">
    My2c2p.onSubmitForm("2c2p-payment-form", function(errCode,errDesc){
        if(errCode!=0){ 
            alert(errDesc);
        }
    });
</script>
</body>

</html>
