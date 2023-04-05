<!DOCTYPE html>
<html lang="en-US" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
    
        <!-- ===============================================-->
        <!--    Document Title-->
        <!-- ===============================================-->
        <title>LaslesVPN | Landing &amp; Corporate Template</title>
    
    
        <!-- ===============================================-->
        <!--    Favicons-->
        <!-- ===============================================-->
        <link rel="apple-touch-icon" sizes="180x180" href="{{asset('frontend/assets/img/favicons/apple-touch-icon.png')}}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{asset('frontend/assets/img/favicons/favicon-32x32.png')}}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{asset('frontend/assets/img/favicons/favicon-16x16.png')}}">
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('frontend/assets/img/favicons/favicon.ico')}}">
        <link rel="manifest" href="{{asset('frontend/assets/img/favicons/manifest.json')}}">
        <meta name="msapplication-TileImage" content="{{asset('frontend/assets/img/favicons/mstile-150x150.png')}}">
        <meta name="theme-color" content="#ffffff">
    
    
        <!-- ===============================================-->
        <!--    Stylesheets-->
        <!-- ===============================================-->
        <link href="{{asset('frontend/assets/css/theme.css')}}" rel="stylesheet" />
    
    <style>
        /* .preloader{
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url('../../../public/image/Profile/loader.gif') 50%50% no-repeat rgb(249, 249, 249);
            /* background: url('../../image/Profile/loader.gif') 50%50% no-repeat rgb(249, 249, 249); */
            opacity: 0.9;
        } */
        /* .plaintext {
            outline:0;
            border-width:0 0 1px;
        } */
    </style>
    <title>@yield('title') </title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body>
    <div class="preloader" id="preloaders"></div>

    @include('sweet::alert')
   {{-- sidebar --}}

   <main class="main" id="top">
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" data-navbar-on-scroll="data-navbar-on-scroll">
      <div class="container"><a class="navbar-brand" href="#"><img src="{{asset('frontend/assets/img/icons/logo.png')}}" alt="" width="30" /><span class="text-1000 fs-1 ms-2 fw-medium">Lasles<span class="fw-bold">VPN</span></span></a>
        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mx-auto border-bottom border-lg-bottom-0 pt-2 pt-lg-0">
            <li class="nav-item"><a class="nav-link active active" aria-current="page" href="#">About</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Features</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Pricing </a></li>
            <li class="nav-item"><a class="nav-link" href="#">Testimonials</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Help </a></li>
          </ul>
          <form class="d-flex py-3 py-lg-0">
            {{-- <button class="btn btn-link text-1000 fw-medium order-1 order-lg-0" type="button">Loi in</button> --}}
            <a href="/login" class="btn btn-outline-danger rounded-pill order-0"> Log In</a>
            {{-- <button class="btn btn-outline-danger rounded-pill order-0" type="submit">Sign Up</button> --}}
          </form>
        </div>
      </div>
    </nav>
    @yield('content')               

   </main>

    <script src="{{asset('frontend/vendors/@popperjs/popper.min.js')}}"></script>
    <script src="{{asset('frontend/vendors/bootstrap/bootstrap.min.js')}}"></script>
    <script src="{{asset('frontend/vendors/is/is.min.js')}}"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="{{asset('frontend/assets/js/theme.js')}}"></script>

    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    @yield('js')
</body>


</html>

<script type="text/javascript">

  //loader
    // $(window).on('load', function(){
    //     $("#preloaders").fadeOut(100);
    // });
    // $(document).ajaxStart(function(){
    //     $("#preloaders").show();
    // });
    // $(document).ajaxComplete(function(){
    //     $("#preloaders").hide();
    // });
       

</script>