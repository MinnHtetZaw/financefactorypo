@extends('master')
@section('title', 'Booking List')
@section('content')

    <div class="row">

        <div class="col-sm-5 col-md-8">
            <h4 class="page-title font-weight-bold">Booking List</h4>
        </div>

        <div class="col-md-4 text-right m-b-30">
            <label class="focus-label">Scan With QR-Code Scanner</label>

            <input class="form-control" type="text" onchange="QRcodeTest(this.value)" id="qr_code" autofocus>

            <a href="#" class="btn bpinkcolor text-white btn-rounded mt-3" onclick="qrSearch()"><i class="fa fa-check"></i> Check
                Token</a>

            <div class="modal fade" id="token_info" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title pinkcolor">Token Information</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="#close_modal">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <div class="row">
                                <h5 class="font-weight-bold col-md-5">Token Number</h5>

                                <span class="text col-md-2"> - </span>

                                <span class="badge badge-info col-md-5" id="token_num"></span>
                            </div>

                            <div class="row mt-3">

                                <h5 class="font-weight-bold col-md-5">Patient's Name</h5>

                                <span class="text col-md-2"> - </span>

                                <span class="text col-md-5" id="name"></span>
                            </div>

                            <div class="row mt-3">
                                <h5 class="font-weight-bold col-md-5">Patient's Age</h5>

                                <span class="text col-md-2"> - </span>

                                <span class="text col-md-5" id="age"></span>
                            </div>

                            <div class="row mt-3">
                                <h5 class="font-weight-bold col-md-5">Patient's Phone</h5>

                                <span class="text col-md-2"> - </span>

                                <span class="text col-md-5" id="phone"></span>
                            </div>

                            <div class="row mt-3">
                                <h5 class="font-weight-bold col-md-5">Patient's Address</h5>

                                <span class="text col-md-2"> - </span>

                                <span class="text col-md-5" id="address"></span>
                            </div>

                            <div class="row mt-3">
                                <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Search Doctor's Booking List</h4>
                    </div>
                </div>

                <div class="row filter-row">
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group form-focus select-focus">
                            <label class="focus-label">Date</label>
                            <div class="cal-icon">
                                <input class="form-control floating" type="text" id="check_date">
                            </div>

                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group form-focus select-focus">
                            <label class="focus-label">Departments</label>

                            <select class="select2 floating" style="width: 100%" onchange="yin(this.value)" id="department">
                                <option>Select Department</option>
                                @foreach ($departments as $dept)
                                    <option class="form-control" value="{{ $dept->id }}">{{ $dept->name }}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group form-focus select-focus">
                            <label class="focus-label">Doctors</label>
                            <select class="select2 floating" style="width: 100%" id="doc">
                                <option value="">Select Doctors</option>
                                @foreach ($doctors as $doc)
                                    <option class="form-control" value="{{ $doc->id }}">{{ $doc->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <button class="btn btn-success btn-block" onclick="myat('withdate')">Search Booking List</button>
                    </div>
                </div>

                <div class="row" id="doc_info">
                    <div class="col-sm-4 col-3 text-center">
                        <h5 class="page-title font-weight-bold text-info">Total Booking Count</h5>
                        <span class="custom-badge  status-blue" id="book_count">{{$booking_count}}</span>
                    </div>
                    <div class="col-sm-4 col-3 text-center">
                        <h5 class="page-title font-weight-bold text-info">Doctor's Name</h5>
                        <span class="custom-badge  status-blue" id="doc_name"> </span>
                    </div>
                    <div class="col-sm-4 col-3 text-center">
                        <h5 class="page-title font-weight-bold text-info">Doctor's Department</h5>
                        <span class="custom-badge  status-blue" id="doc_dept"></span>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <div class="profile-tabs" id="booking_list">
        <ul class="nav nav-tabs nav-tabs-bottom">

            <li class="nav-item"><a class="nav-link active" href="#bottom-tab2" data-toggle="tab">Manual Bookings</a></li>
            <li class="nav-item"><a class="nav-link" href="#about-cont" data-toggle="tab">Online Bookings</a></li>

        </ul>

        <div class="tab-content">

            <div class="tab-pane active" id="bottom-tab2">

                <div class="row">
                    <div class="card-body">
                        <div class="btn btn-primary float-right">Print</div>
                        {{-- <div class="btn btn-success checkallConfirm float-right mx-3">Confirm</div> --}}

                        <select class="form-control col-3 form-control-sm" id="myselect">
                            <option value="6">All</option>
                            <option value="1">Comfirm</option>
                            <option value="4">Check-in</option>
                            <option value="0">Pending</option>
                            <option value="3">Revise</option>
                            <option value="2">Cancle</option>
                            <option value="5">Finish</option>
                        </select>
                        <div class="row">
                            <div class="col-sm-4 col-3">
                                <h4 class="page-title" id="title"></h4>
                            </div>
                        </div>

                        <div class="row">

                            <table class="table table-striped custom-table">
                                <thead>
                                    <tr>
                                        {{-- <th><i class="fa fa-check-square checkall"></i></th> --}}
                                        <th>No.</th>
                                        <th>Token Number</th>
                                        <th>Patient's Name</th>
                                        <th>Doctor's Name</th>
                                        <th>Patient's Age</th>
                                        <th>Patient's Phone</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="table_body">
                                    @php
                                        $j=1;
                                    @endphp
                                    @foreach ($booking_lists as $booking_list)
                                    @php
                                    
                                               $pendingbtn ='<a class="btn btn-warning" title="Edit booking" onclick="editTown('."'$booking_list->id'".','."'$booking_list->name'".','."'$booking_list->age'".','."'$booking_list->phone'".','."'nodate'".')"><i class="fa fa-edit text-white"></i></a>
                                                    <a class="btn btn-success book_comfirm_btn" data-id='."$booking_list->id".' title="Confirm booking"><i class="fa fa-check text-white"></i></i></a>
                                                    <a class="btn btn-primary book_checkin_btn" title="Check In" data-id='."$booking_list->id".'><i class="fa fa-map-marker-alt text-white"></i></a>
                                                    <a class="btn btn-danger book_cancle_btn" title="Cancle booking_list" data-id='."$booking_list->id".'><i class="fa fa-times text-white"></i></a>
                                               ';

                                               $online_pendingbtn ='<a class="btn btn-warning" title="Edit booking" onclick="editTown('."'$booking_list->id'".','."'$booking_list->name'".','."'$booking_list->age'".','."'$booking_list->phone'".','."'nodate'".')"><i class="fa fa-edit text-white"></i></a>
                                               <a class="btn btn-success book_comfirm_btn" data-id='."$booking_list->id".' title="Confirm booking"><i class="fa fa-check text-white"></i></i></a>
                                               <a class="btn btn-danger book_cancle_btn" title="Cancle booking_list" data-id='."$booking_list->id".'><i class="fa fa-times text-white"></i></a>
                                          ';


                                 $confirmbtn = '
                                 <a class="btn btn-warning" title="Edit booking" onclick="editTown('."'$booking_list->id'".','."'$booking_list->name'".','."'$booking_list->age'".','."'$booking_list->phone'".','."'nodate'".')"><i class="fa fa-edit text-white"></i></a>
                                 <a class="btn btn-primary book_checkin_btn" title="Check In" data-id='."$booking_list->id".'><i class="fa fa-map-marker-alt text-white"></i></a>
                                ';

                                 $online_confirmbtn = '
                                 <a class="btn btn-warning" title="Edit booking" onclick="editTown('."'$booking_list->id'".','."'$booking_list->name'".','."'$booking_list->age'".','."'$booking_list->phone'".','."'nodate'".')"><i class="fa fa-edit text-white"></i></a>
                                ';

                                 $checkinbtn = '
                                 <a class="btn btn-warning" title="Edit booking" onclick="editTown('."'$booking_list->id'".','."'$booking_list->name'".','."'$booking_list->age'".','."'$booking_list->phone'".','."'nodate'".')"><i class="fa fa-edit text-white"></i></a>
                            <a style="padding:2px;" class="btn btn-info text-white book_done_btn" data-id='."$booking_list->id".'>Done</a>';
                                // book_done_btn
                                 $revisebtn =
                                 '<a class="btn btn-warning" title="Edit booking" onclick="editTown('."'$booking_list->id'".','."'$booking_list->name'".','."'$booking_list->age'".','."'$booking_list->phone'".','."'nodate'".')"><i class="fa fa-edit text-white"></i></a>';
                                 $button ='<a class="btn btn-warning" title="Edit booking" onclick="editTown('."'$booking_list->id'".','."'$booking_list->name'".','."'$booking_list->age'".','."'$booking_list->phone'".','."'nodate'".')"><i class="fa fa-edit text-white"></i></a>';

                                    @endphp
                                    @if ($booking_list->booking_status==0 || $booking_list->booking_status==2)
                
                                    <tr>
                                        <td>{{$j++}}.</td>
                                        <td>{{$booking_list->token_number}}</td>
                                        <td>{{$booking_list->name}}</td>
                                        <td>{{$booking_list->doctor->name}}</td>
                                        <td>{{$booking_list->age}}</td>
                                        <td>{{$booking_list->phone}}</td>
           
                                            <?php
                                                switch ($booking_list->status) {
                                                    case '0':
                                                        echo '<td> Reserved </td>';
                                                        echo "<td> $pendingbtn </td>";
                                                    break;
                                                    case '1':
                                                    if ($booking_list->booking_status==2) {
                                                        echo '<td> Reserved </td>';
                                                        echo "<td> $button </td>";
                                                    }
                                                    else {
                                                        echo '<td class="text-primary"> Confirmed </td>';
                                                        echo "<td> $confirmbtn </td>";

                                                    }
                                                    break;

                                                    case '2':
                                                    echo '<td class="text-danger"> Cancled </td>';
                                                    echo "<td> $button </td>";

                                                    break; 

                                                    case '3':
                                                    echo '<td class="text-secondary"> Cancled </td>';
                                                    echo "<td> $button </td>";

                                                
                                                    break;

                                                    case '4':
                                                    echo '<td class="text-success"> Check-in </td>';
                                                    echo "<td> $checkinbtn </td>";

                                                    break;

                                                    default:
                                                    echo '<td class="text-bold"> Finished </td>';
                                                    echo "<td> $checkinbtn </td>";
                                                        break;
                                                }
                                            ?>

                                    </tr>
                                    @endif
                                     
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane show " id="about-cont">

                <div class="row">
                    <div class="card-body">
                        <div class="btn btn-primary float-right">Print</div>
                        {{-- <div class="btn btn-success checkallConfirm float-right mx-3">Confirm</div> --}}

                        <select class="form-control col-3 form-control-sm" id="myselect">
                            <option value="6">All</option>
                            <option value="1">Comfirm</option>
                            <option value="4">Check-in</option>
                            <option value="0">Pending</option>
                            <option value="3">Revise</option>
                            <option value="2">Cancle</option>
                            <option value="5">Finish</option>
                        </select>
                        <div class="row">
                            <div class="col-sm-4 col-3">
                                <h4 class="page-title" id="title"></h4>
                            </div>
                        </div>

                        <div class="row">

                            <table class="table table-striped custom-table">
                                <thead>
                                    <tr>
                                        {{-- <th><i class="fa fa-check-square checkall"></i></th> --}}
                                        <th>No.</th>
                                        <th>Token Number</th>
                                        <th>Patient's Name</th>
                                        <th>Doctor's Name</th>
                                        <th>Patient's Age</th>
                                        <th>Patient's Phone</th>
                                        <th>Zoom Id</th>
                                        <th>Zoom Password</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="online_table_body">
                                    @php
                                    $j=1;
                                @endphp
                                @foreach ($booking_lists as $booking_list)
                                @php
                                
                                           $pendingbtn ='<a class="btn btn-warning" title="Edit booking" onclick="editTown('."'$booking_list->id'".','."'$booking_list->name'".','."'$booking_list->age'".','."'$booking_list->phone'".','."'nodate'".')"><i class="fa fa-edit text-white"></i></a>
                                                <a class="btn btn-success book_comfirm_btn" data-id='."$booking_list->id".' title="Confirm booking"><i class="fa fa-check text-white"></i></i></a>
                                                <a class="btn btn-primary book_checkin_btn" title="Check In" data-id='."$booking_list->id".'><i class="fa fa-map-marker-alt text-white"></i></a>
                                                <a class="btn btn-danger book_cancle_btn" title="Cancle booking_list" data-id='."$booking_list->id".'><i class="fa fa-times text-white"></i></a>
                                           ';

                                           $online_pendingbtn ='<a class="btn btn-warning" title="Edit booking" onclick="editTown('."'$booking_list->id'".','."'$booking_list->name'".','."'$booking_list->age'".','."'$booking_list->phone'".','."'nodate'".')"><i class="fa fa-edit text-white"></i></a>
                                           <a class="btn btn-success book_comfirm_btn" data-id='."$booking_list->id".' title="Confirm booking"><i class="fa fa-check text-white"></i></i></a>
                                           <a class="btn btn-danger book_cancle_btn" title="Cancle booking_list" data-id='."$booking_list->id".'><i class="fa fa-times text-white"></i></a>
                                      ';


                             $confirmbtn = '
                             <a class="btn btn-warning" title="Edit booking" onclick="editTown('."'$booking_list->id'".','."'$booking_list->name'".','."'$booking_list->age'".','."'$booking_list->phone'".','."'nodate'".')"><i class="fa fa-edit text-white"></i></a>
                             <a class="btn btn-primary book_checkin_btn" title="Check In" data-id='."$booking_list->id".'><i class="fa fa-map-marker-alt text-white"></i></a>
                            ';

                             $online_confirmbtn = '
                             <a class="btn btn-warning" title="Edit booking" onclick="editTown('."'$booking_list->id'".','."'$booking_list->name'".','."'$booking_list->age'".','."'$booking_list->phone'".','."'nodate'".')"><i class="fa fa-edit text-white"></i></a>
                            ';

                             $checkinbtn = '
                             <a class="btn btn-warning" title="Edit booking" onclick="editTown('."'$booking_list->id'".','."'$booking_list->name'".','."'$booking_list->age'".','."'$booking_list->phone'".','."'nodate'".')"><i class="fa fa-edit text-white"></i></a>
                        <a style="padding:2px;" class="btn btn-info text-white book_done_btn" data-id='."$booking_list->id".'>Done</a>';
                            // book_done_btn
                             $revisebtn =
                             '<a class="btn btn-warning" title="Edit booking" onclick="editTown('."'$booking_list->id'".','."'$booking_list->name'".','."'$booking_list->age'".','."'$booking_list->phone'".','."'nodate'".')"><i class="fa fa-edit text-white"></i></a>';
                             $button ='<a class="btn btn-warning" title="Edit booking" onclick="editTown('."'$booking_list->id'".','."'$booking_list->name'".','."'$booking_list->age'".','."'$booking_list->phone'".','."'nodate'".')"><i class="fa fa-edit text-white"></i></a>';

                                @endphp
                                @if ($booking_list->booking_status==1)
            
                                <tr>
                                    <td>{{$j++}}.</td>
                                    <td>{{$booking_list->token_number}}</td>
                                    <td>{{$booking_list->name}}</td>
                                    <td>{{$booking_list->doctor->name}}</td>
                                    <td>{{$booking_list->age}}</td>
                                    <td>{{$booking_list->phone}}</td>
                                    <td>{{$booking_list->zoom_id}}</td>
                                    <td>{{$booking_list->zoom_psw}}</td>
       
                                        <?php
                                            switch ($booking_list->status) {
                                                case '0':
                                                    echo '<td> Reserved </td>';
                                                    echo "<td> $online_pendingbtn </td>";
                                                break;
                                                case '1':
                                                    echo '<td class="text-primary"> Confirmed </td>';
                                                    echo "<td> $online_confirmbtn </td>";
                                            
                                                break;

                                                case '2':
                                                echo '<td class="text-danger"> Cancled </td>';
                                                echo "<td> $button </td>";

                                                break; 

                                                case '3':
                                                echo '<td class="text-secondary"> Cancled </td>';
                                                echo "<td> $button </td>";

                                            
                                                break;

                                                case '4':
                                                echo '<td class="text-success"> Check-in </td>';
                                                echo "<td> $online_confirmbtn </td>";

                                                break;

                                                default:
                                                echo '<td class="text-bold"> Finished </td>';
                                                echo "<td> $button </td>";
                                                    break;
                                            }
                                        ?>

                                </tr>
                                @endif
                                 
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div id="edit_booking_record" class="modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <h3>Edit Booking Info!</h3>
                    <hr>
                    <form action="{{ route('edit_booking_record') }}" method="POST">
                        @csrf


                        <div class="form-group">
                            <input type="text" name="booking_id" id="booking_id"></input>
                        </div>

                        <div class="form-group">
                            <label>Patient's Name</label>
                            <input class="form-control" type="text" name="name" id="booking_name">
                        </div>

                        <div class="form-group">
                            <label>Patient's Age</label>
                            <input class="form-control" type="text" name="age" id="booking_age">
                        </div>

                        <div class="form-group">
                            <label>Patient's Phone</label>
                            <input class="form-control" type="text" name="phone" id="booking_phone">
                        </div>

                        <input type="text" id="withdateOrnodate">
                        <div class="m-t-20">
                            <a href="#" class="btn btn-danger ml-3" data-dismiss="modal">Close</a>
                            <button type="submit" class="btn btn-primary" id="ajaxSubmitUpdate">Update Booking Info</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')

    <script>
        $(document).ready(function() {
            $(".select2").select2();
            $("#check_date").datetimepicker({
                format: 'YYYY-MM-DD'
            });

            $("#check_date2").datetimepicker({
                format: 'YYYY-MM-DD'
            });


            // $('#booking_list').hide();

            // $('#doc_info').hide();
            //comfirm btn from admin bookinglist
            $("#booking_list").on('click', '.book_comfirm_btn', function() {
                let booking_id = $(this).data("id");

                $.ajax({

                    type: 'POST',

                    url: 'AdminConfirmBooking',

                    data: {
                        "_token": "{{ csrf_token() }}",
                        "booking_id": booking_id,

                    },
                    success: function(data) {
                        if (data) {
                            console.log(data);
                            swal({
                                title: "Success",
                                text: "Successfully Changed!",
                                icon: "info",
                                timer: 10000,
                            });
                            $("#table_body").empty();
                            $("#online_table_body").empty();
                            var check_date = $('#check_date').val();
                            var department = $('#department option:selected').val();
                            var doctorName = $('#doc option:selected').val();
                            if(check_date=="" || department=="" || doctorName==""){
                                myat('nodate');
                            }else
                            {
                                myat('withdate');

                            }
                        }
                    }
                });
            });

            //Cancle btn from booking list
            $("#booking_list").on('click', '.book_cancle_btn', function() {

                swal({
                        title: "Are You Sure?",
                        icon: 'warning',
                        buttons: ["No", "Yes"]
                    })

                    .then((isConfirm) => {

                        if (isConfirm) {

                            let booking_id = $(this).data("id");

                            $.ajax({

                                type: 'POST',

                                url: 'AdminCancleBooking',

                                data: {
                                    "_token": "{{ csrf_token() }}",
                                    "booking_id": booking_id,

                                },
                                success: function(data) {
                                    if (data) {
                                        console.log(data);
                                        swal({
                                            title: "Success",
                                            text: "Successfully Changed!",
                                            icon: "info",
                                            timer: 3000,
                                        });
                                        $("#table_body").empty();
                                        $("#online_table_body").empty();
                                        var check_date = $('#check_date').val();
                                        var department = $('#department option:selected').val();
                                        var doctorName = $('#doc option:selected').val();
                                        if(check_date=="" || department=="" || doctorName==""){
                                            myat('nodate');
                                        }else
                                        {
                                            myat('withdate');

                                        }
                                    }
                                }
                            });
                        }
                    });





            })
            // Checkin
            $("#booking_list").on('click', '.book_checkin_btn', function() {
                let booking_id = $(this).data("id");

                $.ajax({

                    type: 'POST',

                    url: 'AdminCheckInBooking',

                    data: {
                        "_token": "{{ csrf_token() }}",
                        "booking_id": booking_id,

                    },
                    success: function(data) {
                        if (data) {
                            console.log(data);
                            swal({
                                title: "Success",
                                text: "Successfully Changed!",
                                icon: "info",
                                timer: 10000,
                            });
                            $("#table_body").empty();
                            $("#online_table_body").empty();
                            var check_date = $('#check_date').val();
                            var department = $('#department option:selected').val();
                            var doctorName = $('#doc option:selected').val();
                            if(check_date=="" || department=="" || doctorName==""){
                                myat('nodate');
                            }else
                            {
                                myat('withdate');

                            }
                        }
                    }
                });
            });
            //done booking
            $("#booking_list").on('click', '.book_done_btn', function() {
                let booking_id = $(this).data("id");

                $.ajax({

                    type: 'POST',

                    url: 'AdminDoneBooking',

                    data: {
                        "_token": "{{ csrf_token() }}",
                        "booking_id": booking_id,

                    },
                    success: function(data) {
                        if (data[1]==1) {
                            var items = [];
                            var total_amount = 0;
                            var qty = 0;
                            $.each(data[0], function(i, v) {
                                var item = {
                                    id: v.id,
                                    doctor_id: v.pivot.doctor_id,
                                    name: v.name,
                                    qty: 1,
                                    charges: v.charges
                                };
                                items.push(item);
                                total_amount += v.charges;
                                qty += 1;
                            })

                            var total_amount = {
                                sub_total: total_amount,
                                total_qty: qty
                            };

                            $("#table_body").empty();
                            $('#done_booking_record').modal('hide');

                            // myat('withdate');
                            swal({
                                title: "Success!",
                                text: "Successfully Change!",
                                icon: "info",
                                timer: 3000,
                            });

                            localStorage.removeItem('docServiceCart');
                            localStorage.removeItem('docServiceGrandTotal');
                            localStorage.setItem('docServiceCart', JSON.stringify(items));
                            localStorage.setItem('docServiceGrandTotal', JSON.stringify(total_amount));

                            var url = '{{ route('sale_page') }}';

                            setTimeout(function() {
                                window.location.href = url;
                            }, 500);
                            

                        } else {
                            swal({
                                title: "Failed!",
                                text: "Doctor still looking this Patient!",
                                icon: "error",
                                timer: 3000,
                            });
                        }
                    }
                });
            });

            $("#add_booking_info").click(function() {
                let booking_id = $('#done_booking_id').val();
                let description = $('#add_description').val();
                let diagnosis = $('#diagnosis').val();
                let booking_date = $('#check_date2').val();

                $.ajax({

                    type: 'POST',

                    url: 'AdminDoneBooking',

                    data: {
                        "_token": "{{ csrf_token() }}",
                        "booking_id": booking_id,
                        "description": description,
                        "diagnosis": diagnosis,
                        "booking_date": booking_date,

                    },
                    success: function(data) {
                        if (data) {
                            console.log(data);
                            swal({
                                title: "Success",
                                text: "Successfully Changed!",
                                icon: "info",
                                timer: 3000,
                            });
                            var items = [];
                            var total_amount = 0;
                            var qty = 0;
                            $.each(data, function(i, v) {
                                var item = {
                                    id: v.id,
                                    doctor_id: v.pivot.doctor_id,
                                    name: v.name,
                                    qty: 1,
                                    charges: v.charges
                                };
                                items.push(item);
                                total_amount += v.charges;
                                qty += 1;
                            })

                            var total_amount = {
                                sub_total: total_amount,
                                total_qty: qty
                            };

                            $("#table_body").empty();
                            $("#online_table_body").empty();

                            myat('withdate');
                            localStorage.removeItem('docServiceCart');
                            localStorage.removeItem('docServiceGrandTotal');
                            localStorage.setItem('docServiceCart', JSON.stringify(items));
                            localStorage.setItem('docServiceGrandTotal', JSON.stringify(total_amount));

                            var url = '{{ route('sale_page') }}';

                            setTimeout(function() {
                                window.location.href = url;
                            }, 1000);

                        }
                    }
                });
            })





            //ajaxsubmitupdate Master

            //option change to see
            $("#myselect").change(function() {
                let status = $("#myselect option:selected").val();
                $("#table_body").empty();
                $("#online_table_body").empty();
                myat('withdate');
            });

            //checkall
            // $('.checkall').click(function() {

            //     $(".form-check-input").prop("checked", true);
            // });

            // $(".checkallConfirm").click(function() {

            //     var someObj = [];

            //     $("input:checkbox").each(function() {

            //         var $this = $(this);

            //         if ($this.is(":checked")) {

            //             someObj.push($this.data("id"));
            //         }
            //     });

            //     $.ajax({

            //         type: 'POST',

            //         url: '{{ route('checkedAllConfirm') }}',

            //         data: {
            //             "_token": "{{ csrf_token() }}",
            //             "checked_id": someObj,
            //         },

            //         success: function(data) {

            //             swal({
            //                 title: "Success",
            //                 text: "Successfully Changed!",
            //                 icon: "info",
            //                 timer: 10000,
            //             });
            //             $("#table_body").empty();
            //             $("#online_table_body").empty();

            //             myat();

            //         },
            //     });
            // })




        }); //jquery end











        function qrSearch() {

            document.getElementById("qr_code").focus();

        }

        function QRcodeTest(value) {

            $.ajax({

                type: 'POST',

                url: 'AjaxTokenCheckIn',

                data: {
                    "_token": "{{ csrf_token() }}",
                    "token_number": value,
                },

                success: function(data) {

                    $("#token_num").text(data.booking.token_number);
                    $("#name").text(data.booking.name);
                    $("#age").text(data.booking.age);
                    $("#phone").text(data.booking.phone);
                    $("#address").text(data.booking.address);

                    $("#token_info").modal('show');

                    $('#booking_list').show();

                    $("#qr_code").val("");

                    $.each(data.booking_lists, function(i, value) {

                        var status = value.status;

                        switch (status) {
                            case 1:
                                $('#table_body').append($('<tr>')).append($('<td>').text(value.token_number)).append($('<td>').text(value.name)).append($('<td>').text(value.age)).append($('<td>').text(value.phone))
                                    .append($('<td>').text("Confirm"));
                                break;

                            case 2:
                                $('#table_body').append($('<tr>')).append($('<td>').text(value.token_number)).append($('<td>').text(value.name)).append($('<td>').text(value.age)).append($('<td>').text(value.phone))
                                    .append($('<td>').text("Cancel "));
                                break;

                            case 3:
                                $('#table_body').append($('<tr>')).append($('<td>').text(value.token_number)).append($('<td>').text(value.name)).append($('<td>').text(value.age)).append($('<td>').text(value.phone))
                                    .append($('<td>').text("Revised "));
                                break;

                            case 4:
                                $('#table_body').append($('<tr>')).append($('<td>').text(value.token_number)).append($('<td>').text(value.name)).append($('<td>').text(value.age)).append($('<td>').text(value.phone))
                                    .append($('<td>').text("Check-in "));
                                break;

                            case 5:
                                $('#table_body').append($('<tr>')).append($('<td>').text(value.token_number)).append($('<td>').text(value.name)).append($('<td>').text(value.age)).append($('<td>').text(value.phone))
                                    .append($('<td>').text("Finished "));
                                break;

                            default:
                                $('#table_body').append($('<tr>')).append($('<td>').text(value.token_number)).append($('<td>').text(value.name)).append($('<td>').text(value.age)).append($('<td>').text(value.phone))
                                    .append($('<td>').text("Pending"));
                        }
                    });
                },
            });
        }

        function yin(value) {

            var dept_id = value;

            $('#doc').empty();

            $.ajax({

                type: 'POST',

                url: '{{ route('AjaxDepartment') }}',

                data: {
                    "_token": "{{ csrf_token() }}",
                    "department": dept_id,
                },

                success: function(data) {

                    $('#doc').append($('<option>').text("Select Doctor").attr('value', ""));

                    $.each(data, function(i, value) {

                        $('#doc').append($('<option>').text(value.name).attr('value', value.id));

                    });

                },
            });

        }



        function myat(action) {
        
        if (action=='nodate'){
            window.location.reload();
        }
        else{
        
            $("#table_body").empty();
            $("#online_table_body").empty();

            let status = $("#myselect option:selected").val();

            var doc_id = $('#doc').val();

            var check_date = $('#check_date').val();

            if ($.trim(doc_id) == '' || $.trim(check_date) == '') {
                swal({
                    title: "Failed!",
                    text: "Please select Doctor and Date Field!",
                    icon: "info",
                    timer: 3000,
                });

            } else {

                $.ajax({

                    type: 'POST',

                    url: '{{ route('ajax_doc_booking_list') }}',

                    data: {
                        "_token": "{{ csrf_token() }}",
                        "doctor_id": doc_id,
                        "check_date": check_date,
                        "status": status,
                    },

                    success: function(data) {
                        if (data.booking_count == 0) {
                            if (data.status == 0) {
                                var addstatus = `Pending List`;
                            } else if (data.status == 1) {
                                var addstatus = `Comfirm List`;
                            } else if (data.status == 2) {
                                var addstatus = `Cancle List`;
                            } else if (data.status == 3) {
                                var addstatus = `Revised List`;
                            } else if (data.status == 4) {
                                var addstatus = `Check-in List`;
                            } else if (data.status == 5) {
                                var addstatus = `Finished`;
                            } else {
                                var addstatus = `Booking List`;
                            }

                            swal({
                                title: "Nothing Found!",
                                text: addstatus + " is empty for this day!",
                                icon: "error",
                                timer: 20000,
                            });

                        } else {

                            $('#booking_list').show();

                            $('#doc_info').show();

                            $('#book_count').text(data.booking_count);

                            $('#doc_name').text(data.doctor.name);

                            $('#doc_dept').text(data.doctor.department.name);

                            var j = 1;
                            var k = 1;
                            $.each(data.booking_lists, function(i, value) {

                                var status = value.status;

                                let pendingbtn =
                                    `<a class="btn btn-warning" title="Edit booking" onclick="editTown('${value.id}','${value.name}','${value.age}','${value.phone}','withdate')"><i class="fa fa-edit text-white"></i></a>
                                                    <a class="btn btn-success book_comfirm_btn" data-id="${value.id}" title="Confirm booking"><i class="fa fa-check text-white"></i></i></a>
                                                    <a class="btn btn-primary book_checkin_btn" title="Check In" data-id="${value.id}"><i class="fa fa-map-marker-alt text-white"></i></a>
                                                    <a class="btn btn-danger book_cancle_btn" title="Cancle booking" data-id="${value.id}"><i class="fa fa-times text-white"></i></a>`;

                                let online_pendingbtn =
                                    `<a class="btn btn-warning" title="Edit booking" onclick="editTown('${value.id}','${value.name}','${value.age}','${value.phone}','withdate')"><i class="fa fa-edit text-white"></i></a>
                                                    <a class="btn btn-success book_comfirm_btn" data-id="${value.id}" title="Confirm booking"><i class="fa fa-check text-white"></i></i></a>
                                                    <a class="btn btn-danger book_cancle_btn" title="Cancle booking" data-id="${value.id}"><i class="fa fa-times text-white"></i></a>`;


                                let confirmbtn = `<a class="btn btn-warning"  onclick="editTown('${value.id}','${value.name}','${value.age}','${value.phone}','withdate')"><i class="fa fa-edit text-white" title="Confirm booking"></i></a>
                                    <a class="btn btn-primary book_checkin_btn" title="Check In" data-id="${value.id}"><i class="fa fa-map-marker-alt text-white"></i></a>
                                `;

                                let online_confirmbtn = `<a class="btn btn-warning"  onclick="editTown('${value.id}','${value.name}','${value.age}','${value.phone}','withdate')"><i class="fa fa-edit text-white" title="Confirm booking"></i></a>

                                `;
                                let checkinbtn = `<a class="btn btn-warning"  onclick="editTown('${value.id}','${value.name}','${value.age}','${value.phone}','withdate')"><i class="fa fa-edit text-white" title="Confirm booking"></i></a>
                            <a style="padding:2px;" class="btn btn-info text-white book_done_btn" data-id="${value.id}">Done</a>                       

                                `;
                                // book_done_btn
                                let revisebtn =
                                    `<a class="btn btn-warning" onclick="editTown('${value.id}','${value.name}','${value.age}','${value.phone}','withdate')"><i class="fa fa-edit text-white"></i></a>`;
                                let button =
                                    `<a class="btn btn-warning" onclick="editTown('${value.id}','${value.name}','${value.age}','${value.phone}','withdate')"><i class="fa fa-edit text-white"></i></a>`;

                                let formcheck = `<div class="form-check">
                                                <input type="checkbox" data-id="${value.id}"  class="form-check-input">
                                                </div>`;

                                if (value.booking_status == 0 || value.booking_status == 2) {


                                    switch (status) {

                                        case 1:
                                            $('#table_body').append($('<tr>'))
                                                // .append($('<td>').html(formcheck))
                                                .append($('<td>').text(j))
                                                .append($('<td>').text(value.token_number))
                                                .append($('<td>').text(value.name)).append($('<td>')
                                                    .text(value.age)).append($('<td>').text(value.phone)).append($('<td class="text-primary">').text("Comfirm ")).append($('<td>').html(confirmbtn));
                                            break;

                                        case 2:
                                            $('#table_body').append($('<tr>'))
                                                // .append($('<td>').html(formcheck))
                                                .append($('<td>').text(j))
                                                .append($('<td>').text(value.token_number))
                                                .append($('<td>').text(value.name)).append($('<td>')
                                                    .text(value.age)).append($('<td>').text(value.phone)).append($('<td class="text-danger">').text("Canceld")).append($('<td>').html(button));
                                            break;

                                        case 3:
                                            $('#table_body').append($('<tr>'))
                                                // .append($('<td>').html(formcheck))
                                                .append($('<td>').text(j))
                                                .append($('<td>').text(value.token_number)).append($(
                                                    '<td>').text(value.name)).append($('<td>').text(value.age)).append($('<td>').text(value.phone))
                                                .append($('<td class="text-secondary">').text("Revised ")).append($('<td>').html(button));
                                            break;

                                        case 4:
                                            $('#table_body').append($('<tr>'))
                                                // .append($('<td>').html(formcheck))
                                                .append($('<td>').text(j))
                                                .append($('<td>').text(value.token_number)).append($(
                                                    '<td>').text(value.name)).append($('<td>').text(value.age)).append($('<td>').text(value.phone))
                                                .append($('<td class="text-success">').text("Check-in ")).append($('<td>').html(checkinbtn));
                                            break;

                                        case 5:
                                            $('#table_body').append($('<tr>'))
                                                // .append($('<td>').html(formcheck))
                                                .append($('<td>').text(j))
                                                .append($('<td>').text(value.token_number)).append($('<td>').text(value.name)).append($('<td>').text(value.age)).append($('<td>').text(value.phone))
                                                .append($('<td>').text("Finished "))
                                                .append($('<td>').html(button));
                                            break;

                                        default:
                                            $('#table_body').append($('<tr>'))
                                                // .append($('<td>').html(formcheck))
                                                .append($('<td>').text(j))
                                                .append($('<td>').text(value.token_number))
                                                .append($('<td>').text(value.name)).append($('<td>').text(value.age)).append($('<td>').text(value.phone)).append($('<td class="text-warning">').text("Pending"))
                                                .append($('<td>').html(pendingbtn));
                                    }

                                    j++;
                                }
                                if (value.booking_status == 1) {
                                    console.log('online');

                                    switch (status) {

                                        case 1:
                                            $('#online_table_body').append($('<tr>'))
                                                // .append($('<td>').html(formcheck))
                                                .append($('<td>').text(k))
                                                .append($('<td>').text(value.token_number))
                                                .append($('<td>').text(value.name)).append($('<td>').text(value.age)).append($('<td>').text(value.phone)).append($('<td>').text(value.zoom_id))
                                                .append($('<td>').text(value.zoom_psw)).append($('<td class="text-primary">').text("Comfirm "))
                                                .append($('<td>').html(checkinbtn));
                                            break;

                                        case 2:
                                            $('#online_table_body').append($('<tr>'))
                                                // .append($('<td>').html(formcheck))
                                                .append($('<td>').text(k))
                                                .append($('<td>').text(value.token_number))
                                                .append($('<td>').text(value.name)).append($('<td>').text(value.age)).append($('<td>').text(value.phone)).append($('<td>').text(value.zoom_id))
                                                .append($('<td>').text(value.zoom_psw)).append($('<td class="text-danger">').text("Cancel ")).append(
                                                    $('<td>').html(button));
                                            break;

                                        case 3:
                                            $('#online_table_body').append($('<tr>'))
                                                // .append($('<td>').html(formcheck))
                                                .append($('<td>').text(k))
                                                .append($('<td>').text(value.token_number)).append($('<td>').text(value.name)).append($('<td>').text(value.age)).append($('<td>').text(value.phone))
                                                .append($('<td>').text(value.zoom_id)).append($('<td>').text(value.zoom_psw)).append($('<td class="text-secondary">').text("Revised "))
                                                .append($('<td>').html(button));
                                            break;

                                        case 4:
                                            $('#online_table_body').append($('<tr>'))
                                                // .append($('<td>').html(formcheck))
                                                .append($('<td>').text(k))
                                                .append($('<td>').text(value.token_number)).append($('<td>').text(value.name)).append($('<td>').text(value.age)).append($('<td>').text(value.phone))
                                                .append($('<td>').text(value.zoom_id)).append($('<td>').text(value.zoom_psw)).append($('<td class="text-success">').text("Check-in "))
                                                .append($('<td>').html(online_confirmbtn));
                                            break;

                                        case 5:
                                            $('#online_table_body').append($('<tr>'))
                                                // .append($('<td>').html(formcheck))
                                                .append($('<td>').text(k))
                                                .append($('<td>').text(value.token_number)).append($('<td>').text(value.name)).append($('<td>').text(value.age)).append($('<td>').text(value.phone))
                                                .append($('<td>').text(value.zoom_id)).append($('<td>').text(value.zoom_psw)).append($('<td>').text("Finished ")).append($('<td>').html(button));
                                            break;

                                        default:
                                            $('#online_table_body').append($('<tr>'))
                                                // .append($('<td>').html(formcheck))
                                                .append($('<td>').text(k))
                                                .append($('<td>').text(value.token_number))
                                                .append($('<td>').text(value.name)).append($('<td>').text(value.age)).append($('<td>').text(value.phone))
                                                .append($('<td>').text(value.zoom_id)).append($('<td>').text(value.zoom_psw)).append($('<td class="text-warning">').text("Pending"))
                                                .append($('<td>').html(online_pendingbtn));
                                    }

                                    k++;
                                }



                            });

                        }

                    },
                });


            }
        }

        }



    </script>


@endsection
