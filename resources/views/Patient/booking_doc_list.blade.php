@extends('master')
@section('title', 'Bookings')
@section('content')


<div class="row">
    <div class="col-sm-4 col-3">
        <h3 class="page-title font-weight-bold">Doctors Lists</h3>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-stripped">
                <thead>
                    <tr>
                        <th>Doctor Name</th>
                        <th>Doctor Position</th>
                        <th>Infomation</th>
                        <th>Status</th>
                        <th>Book</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($doctors as $doc)
                    <tr>
                        <td>
                            <img width="28" height="28" src="{{'/image/'.$doc->photo}}" class="rounded-circle m-r-5" alt="">
                            <a href="{{route('check_doctor_profile', $doc->id)}}" style="color: black; cursor: pointer;">
                                {{$doc->name}}
                            </a>
                        </td>
                        <td>
                            {{$doc->position}}
                        <td>
                            @foreach($doctor_time as $doc_time)
                                @foreach($doc->day as $day)
                                    @if($doc_time->day_doctor_id == $day->pivot->id)
                                        
                                    <span class="custom-badge  status-blue">{{$day->name}}</span>

                                    <h5 class="m-2">
                                        {{date('h:i: a', strtotime($doc_time->start_time))}}
                                        -
                                        {{date('h:i: a', strtotime($doc_time->end_time))}}
                                    </h5>
                                        
                                    @endif
                                @endforeach
                            @endforeach
                        </td>
                        
                        <td>
                            @if($doc->status == 1)
                            <span class="custom-badge status-green">Active</span>
                            @else
                            <span class="custom-badge status-red">Inactive</span>
                            @endif

                        </td>
                        <td>
                            @if($doc->status == 1)
                            <a href="#" class="btn btn-primary btn-rounded" data-toggle="modal" data-target="#book_{{ $doc->id }}_modal">
                                <i class="fa fa-calendar-check-o"></i>Book This Doctor
                            </a>
                            @else
                            <span class="custom-badge status-red">Can't Book This Doctor</span>
                            @endif
                            
                        </td>
                    </tr>

                    <div id="book_{{ $doc->id }}_modal" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content modal-md">
                                <div class="modal-header">
                                    <h4 class="modal-title pinkcolr">Book This Doctor</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route('get_book_date')}}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label>Doctor Name <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" value="{{$doc->name}}" disabled>

                                            <input class="form-control" type="hidden" value="{{$doc->id}}" name="doctor">
                                        </div>
                                        <div class="form-group">
                                            <label>Select Date <span class="text-danger">*</span></label>
                                            
                                            <select class="form-control" name="doctor_time">
                                                <option value="">Select day you want to book.</option>

                                                @foreach($doctor_time as $doc_time)
                                                    @foreach($doc->day as $day)
                                                        @if($doc_time->day_doctor_id == $day->pivot->id)
                                                            
                                                        <option value="{{$doc_time->id}}">
                                                            {{$day->name}}

                                                            {{date('h:i: a', strtotime($doc_time->start_time))}}
                                                            -
                                                            {{date('h:i: a', strtotime($doc_time->end_time))}}

                                                        </option>

                                                       
                                                            
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                               
                                            </select>
                                            
                                        </div>
                                        <div class="m-t-20 text-center">
                                            <button class="btn btn-primary submit-btn">Book</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
