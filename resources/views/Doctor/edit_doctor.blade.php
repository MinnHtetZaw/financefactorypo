@extends('master')
@section('title', 'Edit Profile')
@section('content')

<h2 class="text-center font-weight-bold py-1"> Edit Doctor Profile</h2>  
<div class="row">

    <div class="col-lg-6">
        <span class="font-weight-bold text-primary custom-badge  status-blue">Doctor's Info</span>            
    	
        <div class="row">
            <div class="col-sm-6">
                <input type="hidden" id="doctor_id" value="{{$doctor->id}}">
                <div class="form-group">
                    <label>Name <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" id="name" value="{{$doctor->name}}">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Phone </label>
                    <input class="form-control" type="text" id="phone" value="{{$doctor->phone}}">
                </div>
            </div>
            
            <div class="col-sm-6">
    			<div class="form-group gender-select">
    				<label class="gen-label">Gender:</label>
    				<div class="form-check-inline">
    					<label class="form-check-label">
    						<input type="radio" id="gender" name="gender" value="male" class="form-check-input"
                            @if ($doctor->gender=='male')
                                checked
                            @endif
                            >Male
    					</label>
    				</div>
    				<div class="form-check-inline">
    					<label class="form-check-label">
    						<input type="radio" id="gender" name="gender" value="female" class="form-check-input"
                            @if ($doctor->gender=='female')
                                checked
                            @endif
                            >Female
    					</label>
    				</div>
    			</div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control" id="address" value="{{$doctor->address}}">
                </div>
            </div>
            
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Position<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="position_now" value="{{$doctor->position}}">
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label>About<span class="text-danger">*</span></label>
                    <textarea class="form-control" id="about_doc">{{$doctor->about_doc}}</textarea>
                </div>
            </div>

                            

            <div class="col-sm-12">
                <div class="form-group">
                    <label>Department<span class="text-danger">*</span></label>
                    <select class="select form-control" id="department">
                    	<option value="">Choose Department</option>
                    	@foreach($departments as $dept)

                    	<option value="{{$dept->id}}"
                            @if ($dept->id==$doctor->department->id)
                                selected
                            @endif
                            >{{$dept->name}}</option>

                    	@endforeach
                    </select>
                </div>
            </div>
            
            <div class="col-sm-6">
        <span class="font-weight-bold text-primary custom-badge  status-blue mb-2">Login Info</span>            

                <div class="form-group">
                    <label>Email <span class="text-danger">*</span></label>
                    <input class="form-control" type="email" id="email" value="{{$doctor->user->email}}">
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
                    <input type="number" class="form-control" id="max_token_no" value="{{$doctor->doc_info->maximum_token}}">                            
                </div>
            </div>


            <div class="col-sm-6">
                <div class="form-group">
                    <label>Reserved Token <span class="text-danger">*</span></label>
                    <input class="form-control" type="number" id="vip_token" value="{{$doctor->doc_info->reserved_token}}">
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    @php
                        $bookingrange= explode("-",$doctor->doc_info->booking_range);
                        
                    @endphp
                    <label class="gen-label">Booking Range:<span class="text-danger">*</span></label>
                    <input class="form-control" type="number" id="range" value="{{$bookingrange[0]}}">
                </div>
            </div>

            <div class="col-sm-6 mt-5">
                <div class="form-group">
                     <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" name="weekormonth" id="weekormonth" value="week" class="form-check-input" 
                            @if ($bookingrange[1]=="week")
                                checked
                            @endif
                            >Week
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" name="weekormonth" id="weekormonth" value="month" class="form-check-input"
                            @if ($bookingrange[1]=="month")
                                checked
                            @endif
                            >Month
                        </label>
                    </div>
                </div>
            </div> 
            <div class="col-sm-12">
                <div class="form-group">
                    <label class="gen-label">Status:<span class="text-danger">*</span></label>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" name="status" id="status" value="1" class="form-check-input"
                            @if ($doctor->doc_info->status==1)
                                checked
                            @endif
                            >Flexible
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" name="status" id="status" value="2" class="form-check-input"
                            @if ($doctor->doc_info->status==2)
                                checked
                            @endif
                            >Strict
                        </label>
                    </div>
                </div>
            </div>

            {{-- <div class="col-sm-12 mt-3">
                <div class="form-group">
                    <label>Services</label>
                    <select id="services" class="select form-control" name="services[]" multiple>    
                        @forelse ($doctorServices as $service)
                            @foreach($doctor->services as $doctorService)
                            @php
                                  if ($service->id== $doctorService->id ){
                                      $selectvalue="selected";
                                      break;
                                  }else {
                                      $selectvalue=null;
                                  }
                               
                            @endphp
                            
                            @endforeach
                            <option value="{{$service->id}}" {{$selectvalue}}>{{$service->name}} - {{$service->charges}}</option>
                        @empty
                        <option value="{{$service->id}}">{{$service->name}} - {{$service->charges}}</option>

                        @endforelse						
                        
                    </select>
                </div>
            </div> --}}

            <div class="col-sm-6">
                <div class="form-group">
                    <label class="gen-label">Online Early Payment:<span class="text-danger">*</span></label>
                    <input class="form-control" type="number" id="online_early_payment" value="{{$doctor->online_early_payment}}">
                </div>
            </div>
                      


            
        </div>        
    </div>


</div>

<div class="row">

    <div class="col-md-6 col-sm-6 mt-3">

        <span class="font-weight-bold text-primary custom-badge  status-blue">Doctor's Education</span>

        <button type="button" class="btn btn-sm bpinkcolor btn-rounded text-white float-right mb-3" data-toggle="modal" data-target="#doc_edu">
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
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn bpinkcolor text-white" id="add_edu"> <i class="fa fa-check"></i> Save</button>
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
                    @php
                        $rowcount=2;
                    @endphp
                    @foreach ($doctor->doc_edu as $doc_ed)
                    <tr id="row{{$rowcount}}">
                        <td class='degree'>{{$doc_ed->degree}}</td>
                        <td class='university'>{{$doc_ed->university}}</td>
                        <td class='subject'>{{$doc_ed->subject}}</td>
                        <td><button type='button' name='remove' data-row="row{{$rowcount}}" class='btn btn-danger remove'>Remove</button></td>
                    </tr>
                    @php
                        $rowcount++;
                    @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
    <div class="col-md-6 col-sm-6 mt-3">

        <span class="font-weight-bold text-primary custom-badge  status-blue">Doctor's Experience</span>

        <button type="button" class="btn btn-sm bpinkcolor btn-rounded text-white float-right mb-3" data-toggle="modal" data-target="#doc_exp">
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
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn bpinkcolor text-white" id="add_exp"> <i class="fa fa-check"></i> Save</button>
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
                    @foreach ($doctor->doc_exp as $doc_ex)
                    <tr id="row{{$rowcount}}">
                        <td class='position'>{{$doc_ex->position}}</td>
                        <td class='place'>{{$doc_ex->place}}</td>
                        <td><button type='button' name='remove' data-row="row{{$rowcount}}" class='btn btn-danger remove'>Remove</button></td>
                        @php
                            $rowcount++;
                        @endphp
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>

 <div class="m-t-20 text-center">
    <button class="btn bbluecolor text-white" id="add_doc_btn">Edit Doctor</button>
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
      var doctor_id = $('#doctor_id').val();

      
      if($.trim(name) == '' || $.trim(phone) == '' || $.trim(gender) == '' || $.trim(address) == '' || $.trim(position_now) == '' || $.trim(department) == '' || $.trim(max_token_no) == '' || $.trim(vip_token) == '' || $.trim(range) == '' || $.trim(weekormonth) == '' || $.trim(status) == '' || $.trim(email) == ''){

        swal({
              title:"Failed!",
              text:"Please fill all basic unit Field",
              icon:"info",
              timer: 3000,
          });

      }else{

       $.ajax({

          type:'POST',

          url:'{{route('edit_store_doctor')}}',

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
            "doctor_id": doctor_id,
            
          },

          success:function(data){

            swal({
                  title:"Success!",
                  text:"Successfully Edited!",
                  icon:"success"
            });

            setTimeout(function(){
               window.location.reload();
            }, 800);

          }



        });

      }     

    

  });





</script>
@endsection       