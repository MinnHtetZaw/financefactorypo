@extends('master')
@section('title','Victorious Clinic Example Customer Profile')
@section('link','Victorious Clinic Example Customer Profile')
@section('content')
<style>
    hr.vertical {
  border: 0;
  margin: 0;
  border-left: 5px solid blue;
  height: 760px;
  float: left;
}
.big {
  color: black;
  border-radius: 2px;
  font-size: 250%;
  margin-right: 6px;
  float: left;
}
</style>
<div class="col-md-12" style="font-family:Times New Roman, Times, serif;">
    <div class="row">
        <div class="col-md-4" id="info">
            <div class="card" style="border-radius:0px 0px 30px 30px;">
                <div class="card-header text-dark bg-info">
                    <h5>Client Information<label><i class="fas fa-times" id="cross" style="margin-left:240px"></i></label></h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="image/logo.jpg" style="border-radius:10px;" height="130" width="100" />
                        </div>
                        <div class="col-md-8">
                            <label class="text-secondary" style="font-size:18px">John Smith</label></br>
                            <label class="text-secondary" style="font-size:13px">Fire this client</label></br></br>
                            <button class="btn btn-outline-primary" style="width:120px">Action</button>
                        </div>
                    </div>
                    <div class="col-md-12 mt-2">
                        <label class="m-0 text-secondary" style="font-size:15px">EMAIL</label>
                        <input type="text" style="border: 0;border-bottom: 2px solid gray;" class="form-control">
                        <label class="m-0 text-secondary mt-2" style="font-size:15px">PHONE</label>
                        <input type="text" style="border: 0;border-bottom: 2px solid gray;" class="form-control">
                        <label class="m-0 text-secondary mt-2" style="font-size:15px">ADDRESS</label>
                        <input type="text" style="border: 0;border-bottom: 2px solid gray;" class="form-control">
                        <label class="m-0 text-secondary mt-2" style="font-size:15px">LAST VISIT</label>
                        <input type="date" style="border: 0;border-bottom: 2px solid gray;" class="form-control">
                        <label class="m-0 text-secondary mt-2" style="font-size:15px">MEMBERSHIP PROGRAM</label>
                        <input type="text" style="border: 0;border-bottom: 2px solid gray;" class="form-control" value="Not Register">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8" id="size_plus">
                    <div class="card" style="border-radius:0px 0px 30px 30px;">
                        <div class="card-header">
                        <div class="row">
                            <div class="col-md-8" >
                                <ul class="nav nav-pills m-t-30 m-b-30 container mb-2" onclick="get_tab()">
                                    <li class="nav-item">
                                        <a href="#navpills-1" class="nav-link" data-toggle="tab" aria-expanded="false" value="1">
                                        Client Info
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#navpills-2" class="nav-link active" data-toggle="tab" aria-expanded="false">
                                        Cosmetic TimeLine
                                        </a>

                                    </li>
                                    <li class="nav-item">
                                        <a href="#navpills-3" class="nav-link" data-toggle="tab" aria-expanded="false">
                                        Health TimeLine
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        </div><!-- end card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6" id="left_side">
                            <h4 class="float-right mt-2">$16000&nbsp;&nbsp;<button class="btn btn-info">View Invoice</button></h4></br>
                            <div class="mt-5 mb-2 offset-md-3">
                                <img src="image/logo.jpg" style="border-radius:10px;" height="300" width="220" />
                            </div>
                            <label class="text-info mt-2" style="font-size:20px">Treatment Summary<button class="btn btn-outline-info" style="margin-left:70px">Traceability Info</button></label>
                            <div class="col-auto mt-2">
                            <label class="sr-only" for="inlineFormInputGroup">Username</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                <div class="input-group-text pt-0" style="padding-left:70px;padding-right:70px">Botox 200 Units/Vial</div>
                                </div>
                                <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="30">
                            </div>
                            </div>
                            <label class="m-0 text-secondary mt-2">PROVIDER</label>
                            <input type="text" style="border: 0;border-bottom: 2px solid gray;" class="form-control" value="Jane Doe">
                            <label class="m-0 text-secondary mt-2">MD consent</label>
                            <input type="text" style="border: 0;border-bottom: 2px solid gray;" class="form-control" value="Signed">

                            

                                </div><!-- first div end-->

                                <div class="col-md-6" id="right_side">
                                <hr class="vertical" /> 
                                    <span class="big ml-4 font-weight-bold"> 01</span><label class="mt-2">PROCEDURE #8</br>09/08/2022 at 01:50PM</label>
                                    <button class="btn btn-info float-right mt-2">Edit</button>  
                                    <div class="row mt-3" style="margin-left:30px">
                                        <div class="col-md-6" id="first_div">
                                        <img src="image/logo.jpg" id="first" style="border-radius:10px;" height="250" width="180" />

                                        </div>
                                        <div class="col-md-6 p-0 m-0">
                                        <img src="image/logo.jpg" id="second" style="border-radius:10px;" height="250" width="180" />

                                        </div>
                                    </div>
                                    <div class="row mt-2" style="margin-left:20px">
                                        <div class="col-md-4">
                                        <img src="image/logo.jpg" style="border-radius:10px;" id="firstt" height="200" width="120" />

                                        </div>
                                        <div class="col-md-4">
                                        <img src="image/logo.jpg" style="border-radius:10px;" id="secondd" height="200" width="120" />

                                        </div>
                                        <div class="col-md-4">
                                        <img src="image/logo.jpg" style="border-radius:10px;" id="thirdd" height="200" width="120" />

                                        </div>
                                    </div>
                                    <div class="row mt-4" style="margin-left:25px">
                                        <div class="col-md-6">
                                            <button class="btn btn-outline-info">View Note(0)</button>
                                        </div>
                                        <div class="col-md-6" style="padding-left: 65;">
                                        <button class="btn btn-outline-info">More Photo(0)</button>
                                        </div>
                                    </div>
                                    <button class="btn btn-outline-info float-right mt-2">View Treatment Markings</button>
                                </div><!-- second div end-->
                            </div><!--row end-->
                            
                        </div><!-- card body end -->
                    
            </div>
              
                
            
        </div>
    </div>
</div>

@endsection
@section('js')
<script>
$('#cross').click(function(event){

event.preventDefault();
// alert("cross");
$('#info').hide();
$( '#size_plus' ).removeClass( "col-md-8" ).addClass( "col-md-12" );
$( '#left_side' ).removeClass( "col-md-6" ).addClass( "col-md-5" );
$( '#right_side' ).removeClass( "col-md-6" ).addClass( "col-md-7" );

// $("#first_div").removeAttr("style")
$("#first").css('height','370');
$("#first").css('width','350');

$("#second").css('height','370');
$("#second").css('width','350');

$("#firstt").css('height','270');
$("#firstt").css('width','240');

$("#secondd").css('height','270');
$("#secondd").css('width','240');

$("#thirdd").css('height','270');
$("#thirdd").css('width','240');



})
function get_tab()
{
    // alert($('.nav').val());
    $('#info').show();
$( '#size_plus' ).removeClass( "col-md-12" ).addClass( "col-md-8" );
$( '#left_side' ).removeClass( "col-md-5" ).addClass( "col-md-6" );
$( '#right_side' ).removeClass( "col-md-7" ).addClass( "col-md-6" );

// $("#first_div").removeAttr("style")
$("#first").css('height','250');
$("#first").css('width','180');

$("#second").css('height','250');
$("#second").css('width','180');

$("#firstt").css('height','200');
$("#firstt").css('width','120');

$("#secondd").css('height','200');
$("#secondd").css('width','120');

$("#thirdd").css('height','200');
$("#thirdd").css('width','120');

}
</script>
@endsection