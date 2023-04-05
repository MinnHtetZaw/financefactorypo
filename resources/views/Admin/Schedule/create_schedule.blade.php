@extends('master')
@section('title', 'Create Schedule')
@section('content')


    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <h4 class="page-title font-weight-bold">Add Schedule Day</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <form action="{{route('store_schedule_day')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Select Department First</label>
                            <select class="select form-control" onchange="AjaxDepartment(this.value)">
                                <option>Select Department</option>
                                @foreach($departments as $dept)
                                <option value="{{$dept->id}}">{{$dept->name}}</option>
                                
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
    						<label>Doctor Name</label>
    						<select class="select form-control" id="doctor" name="doctor">
    							
    						</select>
    					</div>
                    </div>
                    <div class="col-md-6">
    					<div class="form-group">
    						<label>Available Days</label>
    						<select class="select form-control" name="days[]" multiple>    							
                                @foreach($days as $day)
                                <option value="{{$day->id}}">{{$day->name}}</option>
                                @endforeach
    						</select>
    					</div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Start Time</label>
                            <div class="time-icon">
                                <input type="text" class="form-control" id="datetimepicker3" name="start_time">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>End Time</label>
                            <div class="time-icon">
                                <input type="text" class="form-control" id="datetimepicker4" name="end_time">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="m-t-20 text-center">
                    <button class="btn bpinkcolor text-white submit-btn">Create Schedule Day</button>
                </div>
            </form>
        </div>
    </div>

@endsection


@section('js')
<script>

    $(function () {
        $('#datetimepicker3').datetimepicker({
            format: 'LT'
        });
        $('#datetimepicker4').datetimepicker({
            format: 'LT'
        });
    });

    document.getElementById("doctor").disabled=true;

    function AjaxDepartment(value) {

        var department = value;

        $('#doctor').empty();
        
         $.ajax({
           type:'POST',
           url:'/AjaxDepartment',
           dataType:'json',
           data:{
                "_token": "{{ csrf_token() }}",
                "department":department,
            },

           success:function(data){

                document.getElementById("doctor").disabled=false;

                $('#doctor').append($('<option>').text("Select Doctor"));
                         
                $.each(data, function(i, value) {

                $('#doctor').append($('<option>').text(value.name).attr('value', value.id));

            });
           }

        });

    }
 </script>


@endsection