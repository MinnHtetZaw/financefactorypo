<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title','Dashboard')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">

  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">

  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Bootstrap CDN Main -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <!-- DataTables -->

  <link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">

<link rel="stylesheet" href="{{asset('file.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">

  <!-- <link href="{{asset('assets/plugins/multiselect/css/multi-select.css')}}" rel="stylesheet" type="text/css"/> -->

  <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">

  <!-- select option icon -->
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css" rel="stylesheet" />

  <!-- Sweetalert -->
  <link rel="stylesheet" type="text/css" href="http://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">

  <script src="https://unpkg.com/sweetalert@2.1.2/dist/sweetalert.min.js"></script>

  <link rel="stylesheet" href="{{('assets/plugins/dropify/dist/css/dropify.min.css')}}">
  <link href="{{asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}" rel="stylesheet">
  <style>

  </style>

</head>
<body class="hold-transition sidebar-mini layout-fixed">

<!-- preloader -->
<!-- <div class="preloader" id="preloaders" style="  position: fixed;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background: url('../../image/loader2.gif') 50%50% no-repeat rgb(249, 249, 249);
    opacity: 0.9;"></div> -->





<!-- end preloader -->
  @include('sweet::alert')

<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <!-- Youtube -->
    <!-- <div class="wrapper1">
      <span>i</span>
      <span>n</span>
      <span>v</span>
      <span>e</span>
      <span>n</span>
      <span>t</span>
      <span>o</span>
      <span>r</span>
      <span>y</span>
      <span>m</span>
      <span>a</span>
      <span>n</span>
      <span>a</span>
      <span>g</span>
      <span>e</span>
      <span>m</span>
      <span>e</span>
      <span>n</span>
      <span>t</span>
    </div> -->
    {{-- <h1 style="font-family:nunito" class="text-center font-weight-bold font-italic text-info ml-auto">Inventory Management</h1> --}}
    <div class="user-panel d-flex offset-sm-10">
        <div class="image">
          <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        @if(session()->get('user')->hasRole('Project Manager'))
            <div class="info">
            <a href="#" class="d-block">{{ session()->get('user')->name }}</a>
            </div>
        </div>

        @endif
    <!-- end youtube test -->
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar  elevation-4">
    <!-- Brand Logo -->
    {{-- <a href="index3.html" class="brand-link">
      <img src="{{asset('image/logo.jpg')}}" alt="K-win Technology" class="brand-image img-circle"
           style="opacity: .8;margin-top:10px;">
        </a> --}}
      <h4 class="brand-text font-weight-light text-center mt-2">K-Win Technology</h4>



    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        @if(session()->get('user')->hasRole('Project Manager'))
            <div class="info">
            <a href="#" class="d-block">{{ session()->get('user')->name }}</a>
            </div>
        </div>

        @endif --}}
        <nav class="mt-2">
        <ul class="nav sidebar-nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
              <!-- Start -->
              <li class="nav-item has-treeview" >
            <a href="#" class="nav-link" id="master_data">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Master Data
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{route('category_list')}}" class="nav-link">
                  <i class="nav-icon fas fa-circle"></i>
                  <p>
                    Category List
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('sub_category_list')}}" class="nav-link">
                  <i class="nav-icon fas fa-circle"></i>
                  <p>
                    Sub Category List
                  </p>
                </a>
              </li>
              <li class="nav-item">

                <a href="{{route('factoryitem_list')}}" class="nav-link">
                  <i class="nav-icon fas fa-circle"></i>
                  <p>
                    Factory item List
                  </p>
                </a>
              </li>
              {{-- <li class="nav-item">
                <a href="{{route('product_list')}}" class="nav-link">
                    <i class="nav-icon fas fa-circle"></i>
                  <p>Main Warehouse Product</p>
                </a>
              </li> --}}
              <li class="nav-item">
                <a href="{{route('company_information')}}" class="nav-link">
                <i class="nav-icon fas fa-circle"></i>
                  <p>Company Information</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview" >
            <a href="#" class="nav-link" id="master_data">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Factory PO
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{route('newcreate_itemrequest')}}" class="nav-link">
                  <i class="nav-icon fas fa-circle"></i>
                  <p>
                    Create Factory PO
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('factorypo_page')}}" class="nav-link">
                  <i class="nav-icon fas fa-circle"></i>
                  <p>
                    Factory PO List
                  </p>
                </a>
              </li>
              <li class="nav-item">

                <a href="{{route('purchase_list')}}" class="nav-link">
                  <i class="nav-icon fas fa-circle"></i>
                  <p>
                    Purchase List
                  </p>
                </a>
              </li>


            </ul>
          </li>


              <li class="nav-item">
                <a href="{{route('supplier_credit_list')}}" class="nav-link">
                  <i class="nav-icon fas fa-address-book"></i>
                  <p>
                    Supplier List
                  </p>
                </a>
              </li>

              {{----------- Admin ----------}}
              <li class="nav-item has-treeview" >
                <a href="#" class="nav-link" id="admin_data">
                  <i class="nav-icon fas fa-user-alt"></i>
                  <p>
                    Admin
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                 <li class="nav-item ml-4">

                <a href="{{route('fixed_asset')}}" class="nav-link">
                  <i class="nav-icon fas fa-circle"></i>
                  <p>
                    Fixed Asset List
                  </p>
                </a>
              </li>
              <li class="nav-item ml-4">
                <a href="{{route('expense')}}" class="nav-link">
                  <i class="nav-icon fas fa-circle"></i>
                  <p>
                    Expense List
                  </p>
                </a>
              </li>
              <li class="nav-item ml-4">
                <a href="{{route('incoming')}}" class="nav-link">
                  <i class="nav-icon fas fa-circle"></i>
                  <p>
                    Income List
                  </p>
                </a>
              </li>
              <li class="nav-item ml-4">
                <a href="{{route('cost_center')}}" class="nav-link">
                  <i class="nav-icon fas fa-circle"></i>
                  <p>
                    Cost Center List
                  </p>
                </a>
              </li>
              <li class="nav-item ml-4">
                <a href="{{route('currency')}}" class="nav-link">
                  <i class="nav-icon fas fa-money-bill-alt"></i>
                  <p>
                    Currency List
                  </p>
                </a>
              </li>
              <li class="nav-item ml-4">
                <a href="{{route('bank_list')}}" class="nav-link">
                  <i class="nav-icon fas fa-money-check-alt"></i>
                  <p>
                    Bank List
                  </p>
                </a>
              </li>

              <li class="nav-item ml-4">
                <a href="{{route('transaction')}}" class="nav-link">
                  <i class="nav-icon far fa-address-card"></i>
                  <p>
                   Transaction List
                  </p>
                </a>
              </li>

              <li class="nav-item ml-4">
                <a href="{{route('journalEntry')}}" class="nav-link">
                  <i class="nav-icon far fa-address-card"></i>
                  <p>
                    Journal Entry
                  </p>
                </a>
              </li>

              </ul>
            </li>
    {{----------- Admin ----------}}


    {{-- Accounting --}}
          <li class="nav-item has-treeview" >
            <a href="#" class="nav-link" id="trasnfer_data">
                <i class="nav-icon far fa-address-card"></i>
              <p>
                Accounting
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">

                <li class="nav-item">
                    <a href="{{route('accounttypeList')}}" class="nav-link">
                      <i class="nav-icon far fa-address-card ml-4"></i>
                      <p>
                        Account Type
                      </p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="{{route('headingList')}}" class="nav-link">
                      <i class="nav-icon far fa-address-card ml-4"></i>
                      <p>
                        Heading
                      </p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="{{route('subheadingList')}}" class="nav-link">
                      <i class="nav-icon far fa-address-card ml-4"></i>
                      <p>
                        Sub Heading
                      </p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="{{route('account_list')}}" class="nav-link">
                      <i class="nav-icon far fa-address-card ml-4"></i>
                      <p>
                        Account Lists
                      </p>
                    </a>
                  </li>

          </ul>
        </li>
{{--                  --}}

{{-- Transfer --}}
          <li class="nav-item has-treeview" >
            <a href="#" class="nav-link" id="trasnfer_data">
              <i class="nav-icon fas fa-user-alt"></i>
              <p>
                Transfer
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
             <li class="nav-item ml-4">

            <a href="{{route('transfer_list')}}" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
              <p>
                Transfer List
              </p>
            </a>
          </li>
          </ul>
        </li>
          <li class="nav-item has-treeview" >
            <a href="#" class="nav-link" id="master_data">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Report
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{route('profit_loss_acc_list')}}" class="nav-link">
                  <i class="nav-icon fas fa-circle"></i>
                  <p>
                    Profit & Loss
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('balancesheet_acc_list')}}" class="nav-link">
                  <i class="nav-icon fas fa-circle"></i>
                  <p>
                    Balance Sheet
                  </p>
                </a>
              </li>
              <li class="nav-item">

                <a href="{{route('trial_balance')}}" class="nav-link">
                  <i class="nav-icon fas fa-circle"></i>
                  <p>
                    Trail Balance
                  </p>
                </a>
              </li>

            </ul>
          </li>

          {{-- <li class="nav-item">
            <a href="{{route('customer_list')}}" class="nav-link">
              <i class="nav-icon fas fa-user-friends"></i>
              <p>
                Customer
              </p>
            </a>
          </li> --}}
          {{-- <li class="nav-item">
            <a href="{{route('show_project')}}" class="nav-link">
              <i class="nav-icon fas fa-project-diagram"></i>
              <p>
                Project List
              </p>
            </a>
          </li> --}}

          <li class="nav-item">
            <a href="{{route('logout')}}" class="nav-link">
              <i class="nav-icon fas fa-power-off"></i><span class="ml-2">Logout</span>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
              <li class="breadcrumb-item active">@yield('link')</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        @yield('content')


        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2017-2020 <a href="#">K-win Technology</a>.</strong>
    All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Select2 -->
{{-- <script src="{{asset('assets/plugins/select2/dist/js/select2.full.min.js')}}" type="text/javascript"></script> --}}
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('plugins/sparklines/sparkline.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>


<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="{{asset('dist/js/pages/dashboard.js')}}"></script> -->
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>
<!-- Bootstrap 4 -->
<!-- DataTable -->
{{-- <script src="{{asset('assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')}}"></script>

<script src="{{asset('assets/plugins/bootstrap-datepicker/bootstrap-datetimepicker.min.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>

<script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script> --}}

<script src="{{asset('plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('plugins/datatables/dataTables.bootstrap')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{asset('plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')}}"></script>

@yield('js')
<script>

// $(window).on('load', function(){
//                 $("#preloaders").fadeOut(100);
//             });
//             $(document).ajaxStart(function(){
//                 $("#preloaders").show();
//             });
//             $(document).ajaxComplete(function(){
//                 $("#preloaders").hide();
//             });
$( document ).ready(function() {
    // window.location.reload();
});

</script>

</body>
</html>
