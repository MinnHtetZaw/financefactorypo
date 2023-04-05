@extends('master')
@section('title', 'Patient History')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title font-weight-bold">Search Patient History</h4>
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
                            <label class="focus-label">Name Or Phone</label>
                            <input class="form-control floating" type="text" id="nameOrphone">

                        </div>
                    </div>
                    <input type="hidden" name="doc" id="doc" value="{{$doctor->id}}">
                    <div class="col-sm-6 col-md-3">
                        <button class="btn btn-success btn-block" onclick="myat()">Search History</button>
                    </div>
                </div>

                <div class="row" id="doc_info">
                    <div class="col-sm-4 col-3 text-center">
                        <h5 class="page-title font-weight-bold text-info">Total Finished Count</h5>
                        <span class="custom-badge  status-blue" id="book_count">{{$booking_count}}</span>
                    </div>
                 
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="row" id="booking_list">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-body">
                    <div class="card-body">
                        <div class="btn btn-primary float-right ml-3">Print</div>
                        <div class="row mt-4">
                            <div class="col-sm-4 col-3">
                                <h4 class="page-title" id="title"></h4>
                            </div>
                        </div>

                        <div class="row">

                            <table class="table table-striped custom-table">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Token Number</th>
                                        <th>Patient's Name</th>
                                        <th>Patient's Age</th>
                                        <th>Patient's Phone</th>
                                        <th>Remark Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="table_body">

                                    @php
                                    $j=1;
                                @endphp
                                @foreach ($bookings as $booking_list)
                                @php

                            $confirmbtn ='<a class="btn btn-warning" title="Edit booking" onclick="editTown('."'$booking_list->id'".','."'$booking_list->name'".','."'$booking_list->age'".','."'$booking_list->phone'".','."'nodate'".')"><i class="fa fa-edit text-white"></i></a>
                            <a style="padding:2px;" class="btn btn-info text-white doctor_book_done_btn" data-id='."$booking_list->id".' data-dateorno="nodate">Done</a>                                       
                                      ';
    
                                @endphp
            
                                <tr>
                                    <td>{{$j++}}.</td>
                                    <td>{{$booking_list->token_number}}</td>
                                    <td>{{$booking_list->name}}</td>
                                    <td>{{$booking_list->age}}</td>
                                    <td>{{$booking_list->phone}}</td>
                                    <td>{{$booking_list->remark_booking_date}}</td>
                                    <td>
                                        <a style="padding:2px;" class="btn btn-info text-white doctor_book_done_btn" data-id="{{$booking_list->id}}" data-dateorno="nodate" data-description="{{$booking_list->description}}" data-diagnosis="{{$booking_list->diagnosis}}" data-patientdocument="{{$booking_list->patient_document}}">Details</a>
                                    </td>
    
                                </tr>
                                 
                                @endforeach

                                </tbody>
                            </table>

                            <div id="edit_booking_record" class="modal fade" role="dialog">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-body text-center">
                                            <h3>Edit Booking Info!</h3>
                                            <hr>
                                            <form action="{{ route('edit_booking_record') }}" method="POST">
                                                @csrf


                                                <div class="form-group">
                                                    <input type="hidden" name="booking_id" id="booking_id"></input>
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
                            <div id="history_record" class="modal fade" role="dialog">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-body text-center">
                                            <h3>Record Patient!</h3>
                                            <hr>
                                            <form method="POST" enctype="multipart/form-data" id="my_form">
                                            <div class="form-group">
                                                <input type="text" name="booking_id" id="done_booking_id"></input>
                                            </div>

                                            <div class="form-group">
                                                <label>Description</label>
                                                <input class="form-control" type="text" id="add_description">
                                            </div>

                                            <div class="form-group">
                                                <label>Diagnosis</label>
                                                <input class="form-control" type="text" id="diagnosis">
                                            </div>
                                            <div class="form-group">
                                                <label>Patient's attach File</label>
                                              <a id="patient_document" target="_blank">See Here</a>
                                            </div>

                                            {{-- <input type="text" name="donedateOrnodate" id="donedateOrnodate"> --}}


                                            <div class="m-t-20">
                                                <a href="#" class="btn btn-danger ml-3" data-dismiss="modal">Close</a>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
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
            });

                $("#table_body").on('click', '.doctor_book_done_btn', function() {
                let booking_id = $(this).data("id");
                let description = $(this).data("description");
                let diagnosis = $(this).data("diagnosis");
                let patient_document = $(this).data("patientdocument");
                // let withdateOrnodate = $(this).data("dateorno");
                $('#add_description').val(description);
                $('#diagnosis').val(diagnosis);
                $('#patient_document').attr('href',patient_document);
                $('#donedateOrnodate').val(withdateOrnodate);
                $('#history_record').modal('show');
            })



            function qrSearch() {

                document.getElementById("qr_code").focus();

            }
            function myat() {
                $("#table_body").empty();

                var doc_id = $('#doc').val();

                var check_date = $('#check_date').val();
                var nameOrphone = $('#nameOrphone').val();
                
                if ( $.trim(check_date) == '' && $.trim(nameOrphone) == '') {
                    swal({
                        title: "Failed!",
                        text: "Please select Date or Name-Phone Field!",
                        icon: "info",
                        timer: 3000,
                    });

                } else {

                    $.ajax({

                        type: 'POST',

                        url: '{{ route('ajaxPatientHistory') }}',

                        data: {
                            "_token": "{{ csrf_token() }}",
                            "doctor_id": doc_id,
                            "check_date": check_date,
                            "nameOrphone": nameOrphone,
                        },

                        success: function(data) {
                            console.log(data);
                            if (data.booking_count==0) {
                                $('#book_count').text(0);
                    
                                swal({
                                    title: "Nothing Found!",
                                    text: "Patient List is empty for this day or User!",
                                    icon: "error",
                                    timer: 20000,
                                });

                            } else {

                                $('#booking_list').show();

                                $('#doc_info').show();

                                var j = 1;
                                $.each(data.bookings, function(i, value) {

                                            $('#table_body').append($('<tr>'))
                                                .append($('<td>').text(j))
                                                .append($('<td>').text(value.token_number))
                                                .append($('<td>').text(value.name)).append($('<td>').text(value.age)).append($('<td>').text(value.phone)).append($('<td>').text(value.remark_booking_date)).append($('<td>').html(`
                                        <a style="padding:2px;" class="btn btn-info text-white doctor_book_done_btn" data-id="${value.id}" data-dateorno="nodate" data-description="${value.description}" data-diagnosis="${value.diagnosis}" data-patientdocument="${value.patient_document}">Details</a>
                                                
                                                    `));
                   

                                    j++;
                                });
                                $('#book_count').text(data.booking_count);

                            }

                        },
                    });


                }
            }
            
        </script>


    @endsection
