<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/bahosi.png')}}">
    
                            <!--     Template Link -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap-datetimepicker.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap-datetimepicker.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/dataTables.bootstrap4.min.css')}}">
    <title>Documents </title>

    {{-- <link rel="stylesheet" type="text/css" href="http://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css"> --}}

    <script src="https://unpkg.com/sweetalert@2.1.2/dist/sweetalert.min.js"></script> 
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"></script>  --}}
    <style>
        .preloader{
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url('../image/Profile/loader.gif') 50%50% no-repeat rgb(249, 249, 249);
            opacity: 0.9;
        }
        .imgbackground{
            width: 100%;
            height: 100vh;
            opacity: 0.9;
            background-color: black;
        }
        .plaintext {
            outline:0;
            border-width:0 0 1px;
        }
        .previous {
            position: fixed;
            top: 50%;
            left: 10%;
        }
        .next {
            position: fixed;
            top: 50%;
            right: 10%;
        }
    </style>
    <title>@yield('title') </title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body style="background-color: black">
   @php
       $count = count($allimgs);

   @endphp
    @include('sweet::alert')

    <div class="imgbackground text-center">
        <div class="preloader" id="preloaders"></div>
        <input type="hidden" id="count" value="{{$count}}">
        <input type="hidden" id="currentcount" value="0">
        {{-- <img src="{{$allimgs[0]->attachment}}" class="img-fluid attachmentimg" alt=""> --}}
        {{-- <iframe src ="{{$allimgs[0]->attachment}}" class="img-fluid text-center attachmentimg" style="width: -webkit-fill-available;height: 100vh;"></iframe> --}}
        
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-body">
                    <span> <span id="description">{{$allimgs[0]->description}}</span> <span class="float-left px-3"><a class="pinkcolor" href="/appointments/{{$patient_id}}">Back</a></span></span>
                    <button class="btn btn-danger float-right mb-2 deletedocument" data-id="{{$allimgs[0]->id}}"><i class="fas fa-trash-alt"></i></button>
                        @php
                            $photo = explode('.',$allimgs[0]->attachment);
                            $extension= $photo[1];
                        @endphp
                     <div id="attachmentwrapper">
                        @if ($extension=='pdf')
                        <iframe src ="{{$allimgs[0]->attachment}}" class="img-fluid text-center" id="attachmentpdf" style="width: -webkit-fill-available;height: 100vh;" ></iframe>
                        @else
                        <img src ="{{$allimgs[0]->attachment}}" class="img-fluid text-center" id="attachmentimg" style="width: -webkit-fill-available;height: 100vh;" >
                        @endif
                     </div>
                </div>
              </div>
            </div>

      <div class="mt-2 text-white">
        <a class="previous"><i class="fas fa-chevron-circle-left  text-primary" style="font-size: 40px;cursor: pointer;"></i></a>
        <a class="px-2 next"><i class="fas fa-chevron-circle-right text-primary" style="font-size: 40px;cursor: pointer;"></i></a>
      </div>

    </div>


    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script> --}}

    <script src="{{asset('assets/js/moment.min.js')}}"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script> 
    <script src="{{asset('assets/js/jquery.dataTables1.min.js')}}"></script> 

    <script src="{{asset('assets/js/select2.min.js')}}"></script>

    <script src="{{asset('assets/js/dataTables.bootstrap4.min.js')}}"></script>

    <script src="{{asset('assets/js/bootstrap-datetimepicker.min.js')}}"></script>

    <script src="{{asset('assets/js/jquery.slimscroll.js')}}"></script>

    <script src="{{asset('assets/js/app.js')}}"></script>

    <script src="{{asset('assets/js/validation.js')}}"></script>

    @yield('js')
    
</body>


</html>

<script type="text/javascript">

  //loader
    $(window).on('load', function(){
        $("#preloaders").fadeOut(100);
    });
    var allimgs  = @json($allimgs);
    console.log(allimgs);

    $('.next').click(function(){
       var currentcount=  $('#currentcount').val();
       var nextcount = parseInt(currentcount)+1;
       var count = parseInt($('#count').val());
        if(nextcount>= count){
            swal({
                title: "Warning",
                text: "This is the last image!",
                icon: "warning",
                timer: 3000,
            });

        }else{
            var photo= allimgs[nextcount].attachment.split(".");
            var extension= photo[1];
            if(extension=='png' || extension == 'jpg'){
                $('#attachmentwrapper').html(
                    `
                    <img src ="${allimgs[nextcount].attachment}" class="img-fluid text-center attachmentimg"  style="width: -webkit-fill-available;height: 100vh;" >
                    `
                )
            }
            else {
                $('#attachmentwrapper').html(
                    `
                    <iframe src ="${allimgs[nextcount].attachment}" class="img-fluid text-center attachmentpdf"  style="width: -webkit-fill-available;height: 100vh;" ></iframe>
                    `
                )
            }
            $('#currentcount').val(nextcount);
            $('#description').html(allimgs[nextcount].description);
            $(".deletedocument").attr("data-id", allimgs[nextcount].id);
        }
     
    })
    $('.previous').click(function(){
        
       var currentcount=  $('#currentcount').val();
       var previouscount = parseInt(currentcount)-1;
       var count = parseInt($('#count').val());
        if(previouscount < 0 ){
            swal({
                title: "Warning",
                text: "This is the first image!",
                icon: "warning",
                timer: 3000,
            });
        }else{
            var photo= allimgs[previouscount].attachment.split(".");
            var extension= photo[1];
            if(extension=='png' || extension == 'jpg'){
                $('#attachmentwrapper').html(
                    `
                    <img src ="${allimgs[previouscount].attachment}" class="img-fluid text-center attachmentimg"  style="width: -webkit-fill-available;height: 100vh;" >
                    `
                )
            }
            else {
                $('#attachmentwrapper').html(
                    `
                    <iframe src ="${allimgs[previouscount].attachment}" class="img-fluid text-center attachmentpdf"  style="width: -webkit-fill-available;height: 100vh;" ></iframe>
                    `
                )
            }



            $('#currentcount').val(previouscount);
            $('#description').html(allimgs[previouscount].description);
            $(".deletedocument").attr("data-id", allimgs[previouscount].id);

        }
     
    })
    $('.deletedocument').click(function () {

        var documentId = $(this).data('id');

        swal({
            title: "Are you sure ?",
            icon:'warning',
            buttons: ["no", "yes"]
        }) 

            .then((isConfirm)=>{

            if(isConfirm){

            $.ajax({
                type:'POST',
                url:'{{route("attachments.delete")}}',
                dataType:'json',
                data:{
                        "_token": "{{ csrf_token() }}",
                        "document_id":documentId,
                },

                success:function(data){
                if(data)
                {
                    swal({
                    title: "Success!",
                    text: "Voucher is successfully Delete!",
                    icon: "success",
                    timer: 3000,
                    });
                    location.reload();
                }
                else{
                    swal({
                    title: "Error!",
                    text: "Something Went Wrong!",
                    icon: "error",
                    timer: 3000,
                    });
                }
                }
            });
            }
        });
        });
</script>