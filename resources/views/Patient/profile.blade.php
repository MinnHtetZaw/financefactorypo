@extends('master')
@section('title', 'Profile')
@section('content')


<div class="row">
    <div class="col-sm-7 col-6">
        <h4 class="page-title font-weight-bold">{{$patient->name}} Profile</h4>
    </div>

    <div class="col-sm-5 col-6 text-right m-b-30">
        <a href="edit-profile.html" class="btn bpinkcolor text-white btn-rounded"><i class="far fa-edit"></i> Edit Profile</a>
    </div>

</div>

<div class="card-box profile-header">
    <div class="row">
        <div class="col-md-12">
            <div class="profile-view">
                <div class="profile-img-wrap">
                    <div class="profile-img">
                        <img src="{{'/image/' . $patient->photo}}" alt="">
                    </div>
                </div>
                <div class="profile-basic">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="profile-info-left">

                                <h3 class="user-name m-t-0 mb-3">{{$patient->name}}</h3>
                                    
                                <div>Patient ID : {{$patient->patient_code}}</div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <ul class="personal-info">
                                <li>
                                    <span class="title">Phone:</span>
                                    <span class="text">{{$patient->phone}}</span>
                                </li>
                                <li>
                                    <span class="title">Email:</span>
                                    <span class="text">{{$user_email}}</span>
                                </li>
                                <li>
                                    <span class="title">AGE:</span>
                                    <span class="text">{{$patient->age}}</span>
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

            <div class="tab-content">

                <!-- This is Schedule Tab Pane -->
                <div class="tab-pane show active" id="schedule">

                    <div class="row">
                        <div class="col-md-12">
                            
                        </div>
                    </div>
                </div>



                <!-- This is About Tab Pane -->
                <div class="tab-pane" id="about">
                    <div class="row">
                        <div class="col-md-12">
                           
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>


@endsection