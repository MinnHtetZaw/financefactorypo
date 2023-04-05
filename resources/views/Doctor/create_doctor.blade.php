@extends('master')
@section('title', 'Doctor Register')
@section('content')

<h2 class="text-center font-weight-bold py-3"> Doctor Registration</h2>  
<div class="row">

    <div class="col-lg-6">
        <span class="font-weight-bold text-primary custom-badge  status-blue">Doctor's Info</span>            
    	
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Name <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" id="name">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Phone </label>
                    <input class="form-control" type="text" id="phone">
                </div>
            </div>
            
            <div class="col-sm-6">
    			<div class="form-group gender-select">
    				<label class="gen-label">Gender:</label>
    				<div class="form-check-inline">
    					<label class="form-check-label">
    						<input type="radio" name="gender" id="gender" value="male" class="form-check-input">Male
    					</label>
    				</div>
    				<div class="form-check-inline">
    					<label class="form-check-label">
    						<input type="radio" name="gender" id="gender" value="female" class="form-check-input">Female
    					</label>
    				</div>
    			</div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control" id="address">
                </div>
            </div>
            
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Position<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="position_now">
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label>About<span class="text-danger">*</span></label>
                    <textarea class="form-control" id="about_doc"></textarea>
                </div>
            </div>

                            

            <div class="col-sm-12">
                <div class="form-group">
                    <label>Department<span class="text-danger">*</span></label>
                    <select class="select form-control" id="department">
                    	<option value="">Choose Department</option>
                    	@foreach($departments as $dept)

                    	<option value="{{$dept->id}}">{{$dept->name}}</option>

                    	@endforeach
                    </select>
                </div>
            </div>
            
            <div class="col-sm-6">
        <span class="font-weight-bold text-primary custom-badge  status-blue mb-2">Login Info</span>            

                <div class="form-group">
                    <label>Email <span class="text-danger">*</span></label>
                    <input class="form-control" type="email" id="email">
                </div>
            </div>
            <div class="col-sm-6">
                <br>
                <div class="form-group mt-2">
                    <label>Password <span class="text-danger">*</span></label>
                    <input class="form-control" type="password" id="password">
                </div>
            </div>

        </div>

    </div>

    <div class="col-lg-6">
        <span class="font-weight-bold text-primary custom-badge  status-blue">Doctor's Booking Info</span>            
        
        <div class="row">

            <div class="col-sm-6">
                <div class="form-group">                    
                    <label>Maximun Number of Token<span class="text-danger">*</span></label>                           
                    <input type="number" class="form-control" id="max_token_no">                            
                </div>
            </div>


            <div class="col-sm-6">
                <div class="form-group">
                    <label>Reserved Token <span class="text-danger">*</span></label>
                    <input class="form-control" type="number" id="vip_token">
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label class="gen-label">Booking Range:<span class="text-danger">*</span></label>
                    <input class="form-control" type="number" id="range">
                </div>
            </div>

            <div class="col-sm-6 mt-5">
                <div class="form-group">
                     <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" id="weekormonth" name="weekormonth" value="week" class="form-check-input" checked>Week
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" id="weekormonth" name="weekormonth" value="month" class="form-check-input">Month
                        </label>
                    </div>
                </div>
            </div> 
            <div class="col-sm-12">
                <div class="form-group">
                    <label class="gen-label">Status:<span class="text-danger">*</span></label>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" name="status" id="status" value="1" class="form-check-input">Flexible
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" name="status" id="status" value="2" class="form-check-input">Strict
                        </label>
                    </div>
                </div>
            </div>

            {{-- <div class="col-sm-12 mt-3">
                <div class="form-group">
                    <label>Services</label>
                    <select id="services" class="select form-control" name="services[]" multiple>    							
                        @foreach($doctorServices as $doctorService)
                        <option value="{{$doctorService->id}}">{{$doctorService->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div> --}}

            <div class="col-sm-6">
                <div class="form-group">
                    <label class="gen-label">Online Early Payment:<span class="text-danger">*</span></label>
                    <input class="form-control" type="number" id="online_early_payment">
                </div>
            </div>
                      


            
        </div>        
    </div>


</div>

<div class="row">

    <div class="col-md-6 col-sm-6 mt-3">

        <span class="font-weight-bold text-primary custom-badge  status-blue">Doctor's Education</span>

        <button type="button" class="btn btn-sm bpinkcolor text-white btn-rounded float-right mb-3" data-toggle="modal" data-target="#doc_edu">
            <i class="fa fa-plus"></i> Add New 
        </button>

        <div class="modal fade" id="doc_edu" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title pinkcolor">Doctor's Education Registration</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="#close_modal">
                          <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                      
                      <label>Degree</label>
                      <input class="form-control bg-light border-1 " type="text" id="degree" >

                      <label>University</label>
                      <input class="form-control bg-light border-1 " type="text" id="university" >

                      <label>Subject</label>
                      <input class="form-control bg-light border-1 " type="text" id="subject" >                      

                      <div class="form-actions mt-2">
                          <button type="submit" class="btn btn-success" id="add_edu"> <i class="fa fa-check"></i> Save</button>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                 
                </div>
            </div>
          </div>

        <div class="table-responsive">
            <table class="table table-hover table-white" id="doc_edu_table"> 
                <thead>
                    <tr>
                        <th>Degree</th>
                        <th>University</th>
                        <th>Subject</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
    </div>
    
    <div class="col-md-6 col-sm-6 mt-3">

        <span class="font-weight-bold text-primary custom-badge  status-blue">Doctor's Experience</span>

        <button type="button" class="btn btn-sm bpinkcolor text-white btn-rounded float-right mb-3" data-toggle="modal" data-target="#doc_exp">
            <i class="fa fa-plus"></i> Add New 
        </button>

        <div class="modal fade" id="doc_exp" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title pinkcolor">Doctor's Experience Registration</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="#close_modal">
                          <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                      
                      <label>Position</label>
                      <input class="form-control bg-light border-1 " type="text" id="position" >

                      <label>Place</label>
                      <input class="form-control bg-light border-1 " type="text" id="place" >                     

                      <div class="form-actions mt-2">
                          <button type="submit" class="btn btn-success" id="add_exp"> <i class="fa fa-check"></i> Save</button>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                 
                </div>
            </div>
          </div>

        <div class="table-responsive">
            <table class="table table-hover table-white" id="doc_exp_table"> 
                <thead>
                    <tr>
                        <th>Position</th>
                        <th>Place</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
    </div>

</div>

 <div class="m-t-20 text-center">
    <button class="btn bbluecolor text-white" id="add_doc_btn">Create Doctor</button>
</div>

@endsection

@section('js')

<script type="text/javascript">

    var count = 1;

    var degree = "";
    var university = "";
    var subject = "";

    var position="";
    var place="";

  $('#add_edu').click(function(){

    count = count + 1;

    doc_degree = $('#degree').val();
    doc_university = $('#university').val();
    doc_subject = $('#subject').val();

    if($.trim(doc_degree) == '' || $.trim(doc_university) == '' || $.trim(doc_subject) == '' )
    {

        swal({
              title:"Failed!",
              text:"Please fill all basic unit Field",
              icon:"info",
              timer: 3000,
          });
        
      }else{

        var html_code = "<tr id='row"+count+"' >";
        html_code += "<td class='degree'>"+doc_degree+"</td>";
        html_code += "<td class='university'>"+doc_university+"</td>";
        html_code += "<td class='subject'>"+doc_subject+"</td>";
        html_code += "<td><button type='button' name='remove' data-row='row"+count+"' class='btn btn-danger remove'>Remove</button></td>";
        html_code += "</tr>";          

        $('#doc_edu_table').append(html_code);

        $('#doc_edu').modal().find("input").val('').end();

        $('#doc_edu').modal('hide');


      }

   
   });

  $('#add_exp').click(function(){

    count = count + 1;

    doc_position = $('#position').val();
    doc_place = $('#place').val();

    if($.trim(doc_position) == '' || $.trim(doc_place) == '' )
    {

        swal({
              title:"Failed!",
              text:"Please fill all basic unit Field",
              icon:"info",
              timer: 3000,
          });
        
      }else{

        var html_code = "<tr id='row"+count+"' >";
        html_code += "<td class='position'>"+doc_position+"</td>";
        html_code += "<td class='place'>"+doc_place+"</td>";
        html_code += "<td><button type='button' name='remove' data-row='row"+count+"' class='btn btn-danger remove'>Remove</button></td>";
        html_code += "</tr>";          

        $('#doc_exp_table').append(html_code);

        $('#doc_exp').modal().find("input").val('').end();

        $('#doc_exp').modal('hide');


      }

   
   });
 
  $(document).on('click', '.remove', function(){
    var delete_row = $(this).data("row");
      $('#' + delete_row).remove();
  });


  $('#add_doc_btn').click(function(){

      var degree = "";
      var university = "";
      var subject = "";
      var position = "";
      var place = "";

      $('.degree').each(function(){
          degree += ($(this).text()) + '-';
      });

      $('.university').each(function(){
       university += ($(this).text()) + '-';
      });

      $('.subject').each(function(){
       subject += ($(this).text()) + '-';
      });

      $('.position').each(function(){
       position += ($(this).text()) + '-';
      });

      $('.place').each(function(){
        place += ($(this).text()) + '-';
      });

      var name = $('#name').val();
      var phone = $('#phone').val();
      var gender = $("input[name='gender']:checked").val(); 
      var address = $('#address').val();
      var position_now = $('#position_now').val();
      var department = $('#department').val();
      var max_token_no = $('#max_token_no').val();
      var vip_token = $('#vip_token').val();
      var range = $('#range').val();
      var weekormonth = $("input[name='weekormonth']:checked").val(); 
      var status = $("input[name='status']:checked").val(); 
      var about_doc = $('#about_doc').val();  
      var services = $('#services').val();  
      var email = $('#email').val();
      var password = $('#password').val();
      var online_early_payment = $('#online_early_payment').val();

      
      if($.trim(name) == '' || $.trim(phone) == '' || $.trim(gender) == '' || $.trim(gender) == '' || $.trim(address) == '' || $.trim(position_now) == '' || $.trim(department) == '' || $.trim(max_token_no) == '' || $.trim(vip_token) == '' || $.trim(range) == '' || $.trim(weekormonth) == '' || $.trim(status) == '' || $.trim(email) == ''){

        swal({
              title:"Failed!",
              text:"Please fill all basic unit Field",
              icon:"info",
              timer: 3000,
          });

      }else{

       $.ajax({

          type:'POST',

          url:'{{route('store_doctor')}}',

          data:{
            "_token":"{{csrf_token()}}",
            "name": name,
            "phone": phone,
            "gender": gender,
            "address": address,
            "position_now": position_now,
            "department": department,
            "max_token_no": max_token_no,
            "vip_token": vip_token,
            "range": range,
            "weekormonth": weekormonth,
            "status": status,
            "about_doc": about_doc,
            "degree": degree,
            "university": university,
            "subject": subject,
            "position": position,
            "place": place,
            "services": services,
            "email": email,
            "password": password,
            "online_early_payment": online_early_payment,
            
          },

          success:function(data){

            swal({
                  title:"Success!",
                  text:"Successfully Added!",
                  icon:"success"
            });

            setTimeout(function(){
               window.location.reload();
            }, 3000);

          }



        });

      }     

    

  });





</script>
@endsection       