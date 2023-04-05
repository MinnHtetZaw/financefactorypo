@extends('master')
@section('title', 'Profile')
@section('content')


<div class="row">
    <div class="col-sm-7 col-6">
        <h4 class="page-title font-weight-bold">{{$admin->name}} Profile</h4>
    </div>

    <div class="col-sm-5 col-6 text-right m-b-30">
        <a href="{{route('counter_profile_edit',$admin->id)}}" class="btn bpinkcolor text-white btn-rounded"><i class="far fa-edit"></i> Edit Profile</a>
    </div>

</div>

<div class="card-box profile-header">
    <div class="row">
        <div class="col-md-12">
            <div class="profile-view">
                <div class="profile-img-wrap">
                    <div class="profile-img">
                        <a href="#"><img src="{{$admin->photo}}" alt=""></a>
                    </div>
                </div>
                <div class="profile-basic">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="profile-info-left">

                                <h3 class=" m-t-0 mb-0 pinkcolor">{{$admin->name}}</h3>
                                    
                                <div>Employee ID : {{$admin->employee_code}}</div>

                                <div class="mt-1">Employee Position : {{$admin->position}}</div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <ul class="personal-info">
                                <li>
                                    <span class="title">Phone:</span>
                                    <span class="text">{{$admin->phone}}</span>
                                </li>
                                <li>
                                    <span class="title">Email:</span>
                                    <span class="text">{{$user_email}}</span>
                                </li>
                                <li>
                                    <span class="title">Birthday:</span>
                                    <span class="text">{{$admin->dob}}</span>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>                        
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card-box">
            <h4 class="card-title">Profile</h4>
            <ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded">
                <li class="nav-item"><a class="nav-link  active" href="#schedule" data-toggle="tab">Schedule</a></li>
                <li class="nav-item"><a class="nav-link" href="#about" data-toggle="tab">About</a></li>
            </ul>

            
        </div>
    </div>
</div>


@endsection