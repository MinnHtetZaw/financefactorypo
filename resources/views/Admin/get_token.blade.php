@extends('master')

@section('title', 'Get Token')

@section('content')

<div class="row">
    <div class="col-sm-5 col-5">
        <h4 class="page-title font-weight-bold">Get Token</h4>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card shadow">

            <div class="card-body">

                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Get Token</h4>
                    </div>
                </div>

                <div class="row filter-row">

                    <div class="col-sm-4 col-md-6">
                        <div class="form-group form-focus select-focus">
                            <label class="focus-label">Doctors</label>
                            <select class="select2 floating" style="width: 100%" id="doc_id">

                                <option value="">Search Doctors</option>

                                @foreach($doctors as $doc)

                                <option value="{{$doc->id}}">{{$doc->name}}-{{$doc->department->name}}</option>

                                @endforeach

                            </select>
                        </div>
                    </div>

                    <div class="col-sm-4 col-md-6">
                        <button class="btn btn-success btn-block" onclick="searchDoc()">Search Doctors</button>
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>


<div class="row" id="date_list">

    <div class="col-md-8 col-lg-8">
        <div class="card shadow">
            <div class="card-body">
                <h4 class="card-title">Date List Table</h4>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="table_body">
                            
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 col-lg-4">
        <div class="card shadow">
            <div class="card-header text-center">
                <h5 class="m-0 font-weight-bold text-primary">Get Token</h5>
            </div>
            <div class="card-body">
               <form method="POST" action="{{route('store_booking_token')}}">
                   @csrf
                   <div class="form-check form-check-inline">
                    <input class="form-check-input " type="radio" name="bookings" id="manualBooking" value="manualBooking" checked>
                    <label class="form-check-label" for="manualBooking">Manual Booking</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="bookings" id="onlineBooking" value="onlineBooking">
                    <label class="form-check-label" for="onlineBooking">Online Booking</label>
                  </div>
                <br>
                <br>
                   <input type="hidden" name="doctor" id="doctor">

                    <div class="form-group">
                       <label>Date</label>
                       <input type="text" name="booking_date" class="form-control" id="booking_date" readonly>
                    </div>

                    <div class="form-group">
                       <label>Name</label>
                       <input type="text" name="name" class="form-control" required>
                    </div>

                    <div class="form-group">
                       <label>Age</label>
                       <input type="number" name="age" class="form-control" required>
                    </div>

                    <div class="form-group">
                       <label>Phone</label>
                       <input type="text" name="phone" class="form-control" required>
                    </div>

                    <div class="form-group">
                       <label>Address</label>
                       <input type="text" name="address" class="form-control" required>
                    </div>

                    <div class="m-t-20 text-center">
                        <button class="btn btn-primary submit-btn">Store Department</button>
                    </div>

               </form>
            </div>        
        </div>
    </div>
</div>

@endsection


@section('js')

<script>

    $(document).ready(function(){

        $(".select2").select2();

        $("#date_list").hide();

    });

    function searchDoc(){

        $('#table_body').empty();

        let doctor_id = $("#doc_id").val();

        $.ajax({

           type:'POST',

           url:'SearchDoctors',

           data:{
            "_token":"{{csrf_token()}}",
            "doctor_id":doctor_id,
           },

            success:function(data){

                $("#date_list").show();

                $.each(data, function(i, value) {

                    let button = `<a class="btn btn-outline-primary" onclick="getDate('${value[0]}')">Get Token</a>`;
                  
                    $('#table_body').append($('<tr>')).append($('<td>').text(value[0])).append($('<td>').text(value[1]+"-"+value[2])).append($('<td>').append($(button)));

                });

            },

        });


    }

    function getDate(value){

        $("#booking_date").attr('value', value);

        let doctor_id = $("#doc_id").val();

        $("#doctor").attr('value', doctor_id);

    }


</script>


@endsection