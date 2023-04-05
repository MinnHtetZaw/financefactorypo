<!DOCTYPE html>
<html>
  <head>
    <title>Welcome Email</title>
  </head>
  <body>
    <h2>Welcome to the site {{$patient_user['name']}}</h2>
    <br/>
    Your registered email-id is {{$patient_user['email']}} , Please click on the below link to verify your email account
    <br/>
    <a href="{{url('user/verify', $patient_user->verifyUser->token)}}">Verify Email</a>
  </body>
</html>