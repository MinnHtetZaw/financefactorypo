<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>pament2</title>
</head>
<body>
    <!-- POST method to submit the form -->
<form action='{{ config('laravel-2c2p.redirect_access_url') }}' method='POST' name='paymentRequestForm'>
    Processing payment request, Do not close the browser, press back or refresh the page.
    <input type="hidden" name="paymentRequest" value="{{ $payload }}">
</form>
<script language="JavaScript">
    document.paymentRequestForm.submit();
</script>
</body>
</html>