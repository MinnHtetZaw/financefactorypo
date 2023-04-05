@extends('master')
@section('title', 'Doctor lists')
@section('content')
	
	<div class="row">
	    <div class="col-sm-4 col-3">
	        <h4 class="page-title">Doctors Lists</h4>
	    </div>
	    <div class="col-sm-8 col-9 text-right m-b-20">
	        <a href="{{route('create_doctor')}}" class="btn bpinkcolor text-white btn-rounded float-right"><i class="fa fa-plus"></i> Add Doctor</a>
	    </div>
	</div>
	<div class="row doctor-grid">
		@foreach($doctors as $doc)
	    <div class="col-md-4 col-sm-4  col-lg-3">
	        <div class="profile-widget">
	            <div class="doctor-img">
	                <img alt="" class="avatar" src="{{'/image/DoctorProfile/'. $doc->photo}}">
	            </div>
	            <h4 class=" doctor-name text-ellipsis"><a href="{{route('check_doctor_profile', $doc->id)}}">{{$doc->name}}</a></h4>
	            <div class="doc-prof">{{$doc->department->name}}</div>
	            <div class="user-country">
	                <i class="pinkcolor fa fa-map-marker "></i> {{$doc->address}}
	            </div>
	        </div>
	    </div>
	    @endforeach
	</div>
	
	<div class="row">
	    <div class="col-sm-4 col-3">
	        <h4 class="page-title">Counter Lists</h4>
	    </div>
	    <div class="col-sm-8 col-9 text-right m-b-20">
	        <a href="{{route('create_counter')}}" class="btn bpinkcolor text-white btn-rounded float-right"><i class="fa fa-plus"></i> Add Counter</a>
	    </div>
	</div>
	<div class="row doctor-grid">
		@foreach($employee as $employ)
	    <div class="col-md-4 col-sm-4  col-lg-3">
	        <div class="profile-widget">
	            <div class="doctor-img">
	                <img alt="" class="avatar" src="{{$employ->photo}}">
	            </div>
	            <h4 class=" doctor-name text-ellipsis"><a href="{{route('counter_profile', $employ->id)}}">{{$employ->name}}</a></h4>
	            <div class="doc-prof">{{$employ->employee_code}}</div>
	            <div class="user-country">
	                <i class="fas fa-phone-alt pinkcolor"></i> {{$employ->phone}}
	            </div>
	        </div>
	    </div>
	    @endforeach
	</div>


@endsection