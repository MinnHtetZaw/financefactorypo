@extends('master')
@section('title', 'Change Schedule')
@section('content')

<div class="row">
    <div class="col-sm-5 col-5">
        <h4 class="page-title font-weight-bold">Change Doctor Booking Schedule</h4>
    </div>
    <div class="col-sm-7 col-7 text-right m-b-30">
        <a href="#" class="btn bpinkcolor text-white btn-rounded" data-toggle="modal" data-target="#change_schedule_modal">
            <i class="fa fa-plus m-1"></i>Change Booking Schedule
        </a>
    </div>

    <div class="modal fade" id="change_schedule_modal" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title pinkcolor">Change Booking Schedule</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="#close_modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">



                <nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Change Schedule</a>
    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Change Doctor</a>
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
    <!-- change schedule -->
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <form>
                        @csrf

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="focus-label">Departments</label>

                                <select class="select2 floating" style="width: 100%" onchange="yin(this.value)">
                                    <option>Select Department</option>
                                    @foreach($departments as $dept)
                                    <option class="form-control" value="{{$dept->id}}">{{$dept->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Doctor </label>

                                <select id="doctorselect" class="form-control doctorselect select2 floating" style="width: 100%" name="doctor">
                           
                                </select>
                            </div>
                        </div>

                        <div class="row">

                            <div class="form-group col-md-6">
                                <label>Initial Date </label>

                                <select class="form-control select2 floating" style="width: 100%" id="initialdate" name="initialdate" >
                                 
                                </select>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="focus-label">Initial Time</label>

                                    <select class="select2 floating" style="width: 100%" id="initialtime" name="initialtime">
                                    
                                    </select>
                                
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Request Date </label>
                            <div class="cal-icon">
                                <input type="text" class="form-control" id="check_date2" name="request_date">
                            </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="focus-label">Request Time</label>
                                    <div class="time-icon">
                                            <input type="text" class="form-control" id="datetimepicker3" name="request_time">
                                        </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 text-center m-t-20">
                                <button class="btn btn-primary submit-btn" id="store_change_schedule">Change Schedule</button>
                            </div>
                        </div>
                    </form>
  </div>
  <!-- change doctor -->
  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
  <form>
                        @csrf

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="focus-label">Departments</label>

                                <select class="select2 floating" style="width: 100%" onchange="yinn(this.value)">
                                    <option>Select Department</option>
                                    @foreach($departments as $dept)
                                    <option class="form-control" value="{{$dept->id}}">{{$dept->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Initial Doctor </label>

                                <select id="initialdoctor" class="form-control select2 floating" style="width: 100%" name="doctor">
                           
                                </select>
                            </div>
                        </div>

                        <div class="row">

                            <div class="form-group col-md-6">
                                <label> Date </label>

                                <select class="form-control select2 floating" style="width: 100%" id="date" name="initialdate" >
                                 
                                </select>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="focus-label"> Time</label>

                                    <select class="select2 floating" style="width: 100%" id="time" name="initialtime">
                                    
                                    </select>
                                
                                </div>
                            </div>
                       
                            <div class="orm-group col-md-6" id="selectdoc">
                            <label>Select Doctor </label>
                                    <select class="form-control form-control-sm">
                                    <option value="1">Inside Doctor</option>
                                    <option value="2">Outside Doctor</option>
                                    </select>
                            
                            </div>
                            <div class="form-group col-md-6 indocdiv">
                                <label>Change Doctor </label>
                                <select id="changedoctor" class="form-control doctorselect select2 floating" style="width: 100%" id="doc" name="doctor">
                                </select>
                            </div>
                            <div class="form-group col-md-6 outdocdiv">
                            <label for="outdocname">Outside Doctor Name</label>
                            <input type="text" class="form-control" id="outdocname" placeholder="Dr. U Aye Maung">
                            </div>
                            </div>
                    

                        <div class="row">
                            <div class="col-sm-12 text-center m-t-20">
                                <button class="btn btn-primary submit-btn" id="store_change_doctor">Change Doctor</button>
                            </div>
                        </div>
                    </form>
  </div>
</div>

                </div>

            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-striped custom-table mb-0 datatable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Request Date</th>
                        <th>Request Time</th>
                        <th>Initial Date</th>
                        <th>Initial Time</th>
                        <th>Doctor</th>
                        <th>Change Doctor</th>
                        <th>Status</th>
                        <th>Type</th>
                        <th class="text-right">Action</th>
                    </tr>
                </thead>
                <?php
                $i = 1;
                ?>

                <tbody id="table_body">
                    @if(count($change_schedule_lists) == 0)
                    <tr>
                        <td>There is Empty Data!</td>
                    </tr>
                    @else
                    @foreach($change_schedule_lists as $list)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$list->request_date}}</td>
                        <td>{{$list->request_time}}</td>
                        <td>{{$list->initial_date}}</td>
                        <td>{{$list->initial_time}}</td>
                        <td>{{$list->doctor->name}}</td>

                    @if($list->change_doc_type==1)
                    <td>{{$list->request_doc->name}}</td>
                    @else
                    <td>{{$list->request_doc_name}}</td>

                    @endif

                    
                        <td>{{$list->status}}</td>
                        @if($list->type==0)
                        <td class="text-info">Change Schedule</td>
                        @else
                        <td class="pinkcolor">Change Doctor</td>
                        @endif
                        
                        <td class=""><button type="button" class="btn bbluecolor text-white revised_book_list" data-id="<?= $list->id ?>">Bookings
                        </button></td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>

            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="revisedLists" tabindex="-1" role="dialog" aria-labelledby="revisedListsLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title pinkcolor" id="revisedListsLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-striped custom-table mb-0 datatable">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Token No.</th>
                        <th>Patient's Name</th>
                        <th>Patient's Age</th>
                        <th>Patient's Phone</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <?php
                $i = 1;
                ?>

                <tbody id="revisedlist_tbody">
                   
                </tbody>

            </table>
        </div>
    </div>
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


@endsection

@section('js')

<script type="text/javascript">
    $(document).ready(function() {
        $('.outdocdiv').hide();

        $(".select2").select2();


        $("#check_date").datetimepicker({
            format: 'YYYY-MM-DD'
        });

        $("#check_date2").datetimepicker({
            format: 'YYYY-MM-DD'
        });

        $('#datetimepicker3').datetimepicker({
            format: 'LT'
        });

        $('#booking_list').hide();
        $('#doc_info').hide();


        $('#doctorselect').change(function() {
            let doctor_id=$('#doctorselect').val();
            
        $.ajax({

        type: 'POST',

        url: '{{route('AjaxScheduleDate')}}',

        data: {
            "_token": "{{csrf_token()}}",
            "doctor_id": doctor_id,
        },

        success: function(data) {

            $('#initialdate').append($('<option>').text("Select Date").attr('value', ""));

            $.each(data, function(i, value) {

                $('#initialdate').append($('<option>').text(value).attr('value', value));

            });

        },
        });
        });
 

        $("#table_body").on('click','.revised_book_list',function(){

      
            var change_schedule_log_id= $(this).data('id');
            
        $.ajax({

            type: 'POST',

            url: '{{route('revisedLists')}}',

            data: {
                "_token": "{{csrf_token()}}",
                "change_schedule_log_id": change_schedule_log_id,

            },

            success: function(data) {

                $("#revisedlist_tbody").empty();
                var count=Object.keys(data).length;
                // console.log(count);

                if(count<1){
                $('#revisedlist_tbody').append($('<tr>'))
                .append($('<td colspan="6" class="text-center text-info">').text("No Revised Lists"))
                }
                else{
                    var j=1;
                $.each(data, function(i, value) {
                $('#revisedlist_tbody').append($('<tr>'))
                .append($('<td>').text(j++))
                .append($('<td>').text(value.token_number))
                .append($('<td>').text(value.name))
                .append($('<td>').text(value.age))
                .append($('<td>').text(value.phone))
                .append($('<td>').text(value.status))
                });
                }

                $('#revisedLists').modal('show');


            },
            });
                    })



        $('#selectdoc').change(function(){
            var anydoctor=$( '#selectdoc option:selected').val(); 
            // console.log(anydoctor);
            if(anydoctor==1){
                $('.indocdiv').show();
                $('.outdocdiv').hide();
            }
            else{
                $('.indocdiv').hide();
                $('.outdocdiv').show();
            }
        })


        $('#initialdate').change(function() {
            let initialdate=$('#initialdate').val();
            let doctor_id=$('#doctorselect').val();
            // console.log(doctor_id);
            
        $.ajax({

        type: 'POST',

        url: '{{route('AjaxScheduleTime')}}',

        data: {
            "_token": "{{csrf_token()}}",
            "initial_date": initialdate,
            "doctor_id": doctor_id,

        },

        success: function(data) {

            $("#initialtime").empty();

            $.each(data, function(i, value) {

                $('#initialtime').append($('<option>').text(value).attr('value', value));

            });

        },
        });
        });

        $("#store_change_schedule").click(function(e) {
            e.preventDefault();
            var doctor = $(".doctorselect").val();
            var initial_date = $('#initialdate').val();
            var initial_time = $('#initialtime').val();
            var request_date = $('#check_date2').val();
            var request_time = $('#datetimepicker3').val();
            var status=1;

            // console.log(doctor, initial_date,initial_time,request_date, request_time);

            $.ajax({
                type: 'POST',
                url: '{{route('store_change_schedule')}}',
                data: {
                    "_token": "{{csrf_token()}}",
                    "doctor": doctor,
                    "initial_date": initial_date,
                    "initial_time": initial_time,
                    "request_date": request_date,
                    "request_time": request_time,
                    "status":status,
                },

                success: function(data) {
                    var schedulelistss = data.data;
                    if (data.status==1) {
                        swal({
                            title: "Success",
                            text: "Successfully Changed!",
                            icon: "info",
                            timer: 10000,
                        });
                        schedulelists(schedulelistss);
                    }
                    else if(data.status==2){
                        swal({
                                title: "Failed",
                                text: "Request Time can't equal the schedule time",
                                icon: "error",
                                timer: 10000,
                            });
                        schedulelists(schedulelistss);

                    }
                   
                     else {
                        // console.log(data.errors);
                        var doctorerror = data.errors.doctor;
                        if (data.errors.doctor) {
                            swal({
                                title: "Failed",
                                text: data.errors.doctor + "",
                                icon: "error",
                                timer: 10000,
                            });
                        } else if (data.errors.request_date) {
                            swal({
                                title: "Failed",
                                text: data.errors.request_date + "",
                                icon: "error",
                                timer: 10000,
                            });
                        } else if (data.errors.booking_date) {
                            swal({
                                title: "Failed",
                                text: data.errors.booking_date + "",
                                icon: "error",
                                timer: 10000,
                            });
                        } else {
                            swal({
                                title: "Failed",
                                text: data.errors.request_time + "",
                                icon: "error",
                                timer: 10000,
                            });
                        }
                        schedulelists(schedulelistss);
                    }
                },
            });
        });

        $("#store_change_doctor").click(function(e) {
            e.preventDefault();
            var initialdoctor = $("#initialdoctor").val();
            var date = $('#date').val();
            var time = $('#time').val();
            var anydoctor=$( '#selectdoc option:selected').val(); 
            var outdocname = $('#outdocname').val();
            var indocname = $('#changedoctor').val();
    


            // console.log(initialdoctor, date,time,anydoctor, outdocname, indocname);

            $.ajax({
                type: 'POST',
                url: '{{route('store_change_doctor')}}',
                data: {
                    "_token": "{{csrf_token()}}",
                    "initialdoctor": initialdoctor,
                    "date": date,
                    "time": time,
                    "anydoctor": anydoctor,
                    "outdocname": outdocname,
                    "indocname":indocname,
                },

                success: function(data) {
                    // console.log(data.data);
                    var schedulelistss = data.data;
                    if (data.status==1) {
                        swal({
                            title: "Success",
                            text: "Successfully Changed!",
                            icon: "info",
                            timer: 10000,
                        });
                        schedulelists(schedulelistss);
                    }
                    else if(data.status==2){
                        swal({
                                title: "Failed",
                                text: "Request Time can't equal the schedule time",
                                icon: "error",
                                timer: 10000,
                            });
                        schedulelists(schedulelistss);

                    }
                   
                     else {
                        // console.log(data.errors);
                        var doctorerror = data.errors.doctor;
                        if (data.errors.initialdoctor) {
                            swal({
                                title: "Failed",
                                text: data.errors.initialdoctor + "",
                                icon: "error",
                                timer: 10000,
                            });
                        } else if (data.errors.date) {
                            swal({
                                title: "Failed",
                                text: data.errors.date + "",
                                icon: "error",
                                timer: 10000,
                            });
                        } else if (data.errors.time) {
                            swal({
                                title: "Failed",
                                text: data.errors.time + "",
                                icon: "error",
                                timer: 10000,
                            });
                        }
                        else if (data.errors.outdocname) {
                            swal({
                                title: "Failed",
                                text: data.errors.outdocname + "",
                                icon: "error",
                                timer: 10000,
                            });
                        }  else {
                            swal({
                                title: "Failed",
                                text: data.errors.indocname + "",
                                icon: "error",
                                timer: 10000,
                            });
                        }
                        schedulelists(schedulelistss);
                    }
                },
            });
        })


    });//end jquery

    function schedulelists(schedulelistss) {
        // console.log(schedulelists);
        $("#table_body").empty();
        var html = '';
        var allhtml = "";
        var j = 1;
        $.each(schedulelistss, function(i, value) {
            if(value.type==0){
                var typetext="Change Schedule";
            }
            else{
                var typetext="Change Doctor"
            }

            var revisedbook_btn=`<button type="button" class="btn btn-success revised_book_list" data-id="${value.id}">Bookings
                        </button>`;
            if(value.type==0){
                $('#table_body').append($('<tr>'))
                .append($('<td>').text(j++))
                .append($('<td>').text(value.request_date))
                .append($('<td>').text(value.request_time))
                .append($('<td>').text(value.initial_date))
                .append($('<td>').text(value.initial_time))
                .append($('<td>').text(value.doctor.name))
                .append($('<td>'))
                .append($('<td>').text(value.status))
                .append($('<td class="text-info">').text(typetext))
                .append($('<td>').html(revisedbook_btn))
            }
            else{
                if(value.change_doc_type==1){
                    $('#table_body').append($('<tr>'))
                    .append($('<td>').text(i++))
                    .append($('<td>').text(value.request_date))
                    .append($('<td>').text(value.request_time))
                    .append($('<td>').text(value.initial_date))
                    .append($('<td>').text(value.initial_time))
                    .append($('<td>').text(value.doctor.name))
                    .append($('<td>').text(value.request_doc.name))
                    .append($('<td>').text(value.status))
                    .append($('<td class="text-success">').text(typetext))
                    .append($('<td>').html(revisedbook_btn))

                }
                else if(value.change_doc_type==2){
                    $('#table_body').append($('<tr>'))
                    .append($('<td>').text(i++))
                    .append($('<td>').text(value.request_date))
                    .append($('<td>').text(value.request_time))
                    .append($('<td>').text(value.initial_date))
                    .append($('<td>').text(value.initial_time))
                    .append($('<td>').text(value.doctor.name))
                    .append($('<td>').text(value.request_doc_name))
                    .append($('<td>').text(value.status))
                    .append($('<td class="text-success">').text(typetext))
                    .append($('<td>').html(revisedbook_btn))

                }
            }
           
        });
        $('#change_schedule_modal').modal('hide');

    }

    function yin(value) {

        var dept_id = value;

        $('#doctorselect').empty();

        $.ajax({

            type: 'POST',

            url: '{{route('AjaxDepartment')}}',

            data: {
                "_token": "{{csrf_token()}}",
                "department": dept_id,
            },

            success: function(data) {
                $('#doctorselect').empty();

                $('#doctorselect').append($('<option>').text("Select Doctor").attr('value', ""));

                $.each(data, function(i, value) {

                    $('#doctorselect').append($('<option>').text(value.name).attr('value', value.id));

                });

            },
        });

    }

    // change doctor form

    function yinn(value) {

var dept_id = value;

$('#initialdoctor').empty();

$.ajax({

    type: 'POST',

    url: '{{route('AjaxDepartment')}}',

    data: {
        "_token": "{{csrf_token()}}",
        "department": dept_id,
    },

    success: function(data) {
        $('#initialdoctor').empty();

        $('#initialdoctor').append($('<option>').text("Select Doctor").attr('value', ""));

        $.each(data, function(i, value) {

            $('#initialdoctor').append($('<option>').text(value.name).attr('value', value.id));

        });

        $('#changedoctor').empty();

$('#changedoctor').append($('<option>').text("Select Doctor").attr('value', ""));

$.each(data, function(i, value) {

    $('#changedoctor').append($('<option>').text(value.name).attr('value', value.id));

});

    },
});

}

$('#initialdoctor').change(function() {
            let doctor_id=$('#initialdoctor').val();
            
        $.ajax({

        type: 'POST',

        url: '{{route('AjaxScheduleDate')}}',

        data: {
            "_token": "{{csrf_token()}}",
            "doctor_id": doctor_id,
        },

        success: function(data) {

            $('#date').append($('<option>').text("Select Date").attr('value', ""));

            $.each(data, function(i, value) {

                $('#date').append($('<option>').text(value).attr('value', value));

            });

        },
        });
        });

        
        $('#date').change(function() {
            let date=$('#date').val();
            let doctor_id=$('#initialdoctor').val();
            // console.log(doctor_id);
            
        $.ajax({

        type: 'POST',

        url: '{{route('AjaxScheduleTime')}}',

        data: {
            "_token": "{{csrf_token()}}",
            "initial_date": date,
            "doctor_id": doctor_id,

        },

        success: function(data) {

            $("#time").empty();

            $.each(data, function(i, value) {

                $('#time').append($('<option>').text(value).attr('value', value));

            });

        },
        });
        });
</script>

@endsection