@extends('master')
@section('title', 'Appointments')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card shadow p-2">
            <div class="row" id="doc_info">
                <div class="col-sm-3 col-3 text-center">
                    <h5 class="page-title font-weight-bold text-info">Patient ID</h5>
                    <span class="custom-badge  status-blue" id="book_count">{{$patient->code}}</span>
                </div>
                <div class="col-sm-3 col-3 text-center">
                    <h5 class="page-title font-weight-bold text-info">Name</h5>
                    <span class="custom-badge  status-blue" id=""> {{$patient->name}} </span>
                </div>
                <div class="col-sm-3 col-3 text-center">
                    <h5 class="page-title font-weight-bold text-info">Age</h5>
                    <span class="custom-badge  status-blue" id="doc_dept">{{$patient->age}}-y /{{$patient->age_month}}-m </span>
                </div>
                <div class="col-sm-3 col-3 text-center">
                    <h5 class="page-title font-weight-bold text-info">Phone</h5>
                    <span class="custom-badge  status-blue" id="doc_dept">{{$patient->phone}}</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-2 mt-4 ">
        <a  class="btn bpinkcolor ml-3 mt-1 text-white" onclick="alldocument()">All Documents</a>
    </div>

    <form action="{{ route("attachimg") }}" method="post" id="alldouments" >
        @csrf
        <input type="hidden" name="filter_name" id="filter_name">
        <input type="hidden" name="patient_id" value="{{ $patient->id }}" >
        <input type="hidden" name="from_date" id="from_date">
        <input type="hidden" name="to_date" id="to_date">
        <input type="hidden" name="count_app" id="count_app">
    </form>

    <div class="col-md-3">
        <div class="form-group col-md-9">
            <label for="filterName" class="pinkcolor">Filter By</label>
            <select id="filterName" class="form-control">
              <option value="all">All</option>
              <option value="date">Date</option>
              <option value="count">Counts</option>
            </select>
          </div>
    </div>
    <div id="dateFilter" class="col-md-6 row">
        <div class="form-group col-md-4">
            <label for="fromdate" class="pinkcolor">From Date</label>
            <input type="date" class="form-control" id="fromdate">
        </div>
        <div class="form-group col-md-4">
            <label for="todate" class="pinkcolor">To Date</label>
            <input type="date" class="form-control" id="todate">
        </div>
        <div class="col-md-4 mt-4">
            <button type="button" class="btn btn-outline-primary mt-2" onclick="searchAppointment()">Search</button>
        </div>
    </div>
 
    <div id="countFilter" class="col-md-6 row">
        <div class="form-group col-md-4">
          <label for="count" class="pinkcolor">Counts</label>
          <select id="count" class="form-control">
            <option selected value="5">5</option>
            <option value="10">10</option>
            <option value="15">15</option>
            <option value="20">20</option>
          </select>
        </div>
   
      <div class="col-md-4 mt-4">
          <button type="button" class="btn btn-outline-primary mt-2" onclick="searchAppointment()">Search</button>
      </div>
    </div>
    <div id="allFilter" class="col-md-6 offset-1 row">
        <div class="col-md-4 mt-4">
            <button type="button" class="btn btn-outline-primary mt-2" onclick="searchAppointment()">Search</button>
        </div>
    </div>

    <input type="hidden" value="{{ $patient->id }}" id="patient_id">
   
</div>
            <div class="row">
                <div class="card-body">
                    <div class="card shadow p-2">
                        <table class="table table-striped custom-table">
                            <thead>
                                <tr>
                                    {{-- <th><i class="fa fa-check-square checkall"></i></th> --}}
                                    <th>No.</th>
                                    <th>Booking Date</th>
                                    <th>Doctor Name</th>
                                    <th>Diagnosis</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="table_body">
                                @php
                                    $j=1;
                                @endphp
                                @foreach ($appointments as $appointment)
                                @php
                                if(date('d',strtotime($appointment->date))==$today_date ){
                                    $class = 'bgreencolor';
                                }
                                else {
                                    $class = 'bbluecolor';
                                }
                                @endphp
                                    <tr>
                                        <td>{{$j++}}.</td>
                                        <td>{{$appointment->date}}</td>
                                        <td>{{$appointment->doctor->name}}</td>
                                        <td>
                                            @forelse ($appointment->diagnosis as $diag)
                                                <span>{{$diag->name}} , </span>
                                            @empty
                                                
                                            @endforelse

                                        </td>
                                        <td>
                                            <a href="{{route('patienthist',$appointment->id)}}" class="btn {{$class}} text-white">History</a>
                                            <a href="{{route('appointmentRecord',$appointment->id)}}" class="btn blightblue text-white"><i class="fa fa-plus"></i>Record</a>
                                            <button  class="btn text-white bneonblue attachfile" data-appointment="{{$appointment->id}}">Attach</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div id="record" class="modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-body text-center">
                            <h4 class="modal-title pinkcolor">Attach Patient Documents!</h4>
                            <hr>
                            <form action="{{route('attachments.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                              <input type="hidden" name="appointment_id" id="apmtId">
                                  <div id="education_fields"></div>
                                  <div class="row">
                                    <label for="" class="col-sm-2 col-form-label">File</label>
                                      <div class="col-sm-5">
                                          <div class="form-group">
                                              <input type="file" class="form-control-file" id="file" name="attachments[]">
                                          </div>
                                      </div>
                                      <div class="col-sm-5">
                                          <div class="form-group">
                                              <div class="input-group">
                                                  <input type="text" class="form-control" id="descriptions" name="descriptions[]" placeholder="Description">
                                                  <div class="input-group-append">
                                                      <button class="btn btn-primary" type="button" onclick="education_fields();"><i class="fa fa-plus"></i></button>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-sm-7 offset-5">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn bbluecolor text-white">Submit</button>
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
         
        $('#countFilter').hide();
        $('#dateFilter').hide();
        $('#allFilter').show();

        $('#filterName').change(function (e) { 
            e.preventDefault();
            var conceptName = $('#filterName :selected').val();
            if(conceptName== "date"){
                $('#countFilter').hide();
                $('#allFilter').hide();
                $('#dateFilter').show();
            }else if(conceptName=="count"){
                $('#dateFilter').hide();
                $('#allFilter').hide();
                $('#countFilter').show();
            }
            else{
                $('#dateFilter').hide();
                $('#countFilter').hide();
                $('#allFilter').show();
            }
        });

        }); //jquery end

        function alldocument() {
            var filterName = $('#filterName :selected').val();
            let patient_id= $('#patient_id').val();

            let fromdate= $('#fromdate').val();
            let todate= $('#todate').val();

            var count = $('#count :selected').val();

            $('#filter_name').val(filterName);
            $('#from_date').val(fromdate);
            $('#to_date').val(todate);
            $('#count_app').val(count);
            $('#alldouments').submit();

        }

        function searchAppointment(){

            var filterName = $('#filterName :selected').val();
            let patient_id= $('#patient_id').val();

            let fromdate= $('#fromdate').val();
            let todate= $('#todate').val();

            var count = $('#count :selected').val();

            if ($.trim(fromdate) == '' && $.trim(todate) == '' && $.trim(count)=="" && $.trim(patient_id)=="") {
                swal({
                    title: "Failed!",
                    text: "Please fill one of the field!",
                    icon: "error",
                    timer: 3000,
                });
            }
            else{
                $.ajax({
                type:'POST',
                url:'/searchAppointments/filter',
                dataType:'json',
                data:{
                        "_token": "{{ csrf_token() }}",
                        "count": count,
                        "fromdate": fromdate,
                        "todate": todate,
                        "filterName": filterName,
                        "patient_id": patient_id,
                    },

                success:function(data){
                    console.log(data);

                    if(data.length<=0){
                        swal({
                        title: "No Data Found!",
                        text: "Please try again!",
                        icon: "error",
                        timer: 3000,
                    });
                    }
                    else{
                        var html= ``;
                        var j=1;
                        $.each(data, function(i, value) {
                            var text= ""
                            if(value.diagnosis){
                                $.each(value.diagnosis,function(j,dia){
                                    text+= `<span>${dia.name},</span>`;
                                })
                            }
                            var url = '{{ route('patienthist', ':appointment_id') }}';
                            url = url.replace(':appointment_id', value.id);

                            var url2 = '{{ route('appointmentRecord', ':appointment_id') }}';
                            url2 = url2.replace(':appointment_id', value.id);

                            html+= `
                                <tr>
                                    <td>${j++}</td>
                                    <td>${value.date}</td>
                                    <td>${value.doctor.name}</td>
                                    <td>${text}</td> 
                                    <td>
                                            <a href="${url}" class="btn bbluecolor text-white">History</a>
                                            <a href="${url2}" class="btn blightblue text-white"><i class="fa fa-plus"></i>Record</a>
                                            <button  class="btn text-white bneonblue attachfile" data-appointment="${value.id}}">Attach</button>
                                    </td>

                                </tr>
                            `;

                        });
                        $('#table_body').html(html);
                    }
                    
                }

                });
            }
            }

        var room = 1;

        function education_fields() {

            room++;
            var objTo = document.getElementById('education_fields')
            var divtest = document.createElement("div");
            divtest.setAttribute("class", "form-group removeclass" + room);
            var rdiv = 'removeclass' + room;

            // divtest.innerHTML = '<div id="education_fields"></div><div class="row"><div class="col-sm-6"><div class="form-group"><input type="text" class="form-control" id="car_number" name="car_num[]"  placeholder="Enter Car Number"></div></div><div class="col-sm-6"><div class="form-group"><div class="input-group"><input type="text" class="form-control" id="car_code" name="code_number[]" value="" placeholder="Enter Code Number"><div class="input-group-append"><button class="btn btn-danger" type="button" onclick="remove_education_fields(' + room + ');"> <i class="fa fa-minus"></i> </button></div></div></div></div></div>'
            divtest.innerHTML = '<div id="education_fields"></div><div class="row"><label for="" class="col-sm-2 col-form-label">File</label><div class="col-sm-5"><div class="form-group"><input type="file" class="form-control-file" id="file" name="attachments[]"></div></div><div class="col-sm-5"><div class="form-group"><div class="input-group"><input type="text" class="form-control" id="descriptions" name="descriptions[]" placeholder="Description"><div class="input-group-append"><button class="btn btn-danger" type="button" onclick="remove_education_fields(' + room + ');"><i class="fa fa-minus"></i> </button></div></div></div></div>'
            
            objTo.appendChild(divtest)
        }

        function remove_education_fields(rid) {
            $('.removeclass' + rid).remove();
        }

        $('.attachfile').click(function(){
            var appointment_id= $(this).data('appointment');
            $('#apmtId').val(appointment_id);
            $('#record').modal('show');
        })


    </script>


@endsection

