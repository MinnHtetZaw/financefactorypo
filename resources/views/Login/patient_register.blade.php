<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/bahosi.png')}}">

    <title>Preclinic - Medical & Hospital - Bootstrap 4 Admin Template</title>

    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">

    
   
</head>

<body>
    <div class="main-wrapper  account-wrapper">
        <div class="account-page">
            <div class="account-center">
                <div class="account-box">
                    <form action="{{route('store_patient')}}" class="form-signin" method="post">
                        @csrf

						<div class="account-logo">
                            <img src="{{asset('assets/img/bahosi.png')}}" alt="">
                        </div>
                        <div class="form-group">
                            <label>Name</label>

                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name">

                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Email Address</label>

                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email">

                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Password</label>

                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">

                            @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                        </div>

                        <div class="form-group">
                            <label>Confirm Password</label>

                            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation">

                            @error('password_confirmation')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">

                            <label>Mobile Number</label>

                            <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone">

                            @error('phone')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Age</label>

                            <input type="text" class="form-control  @error('age') is-invalid @enderror" name="age">

                            @error('age')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group text-center">
                            <button class="btn btn-primary account-btn" type="submit">Signup</button>
                        </div>
                        <div class="text-center login-link">
                            Already have an account? <a href="{{route('login_page')}}">Login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('assets/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('assets/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/app.js')}}"></script>

</body>


<!-- register24:03-->
</html>