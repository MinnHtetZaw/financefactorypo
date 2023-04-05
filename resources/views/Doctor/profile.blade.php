@extends('master')
@section('title', 'Doctor Profile')
@section('content')


<div class="row">
    <div class="col-sm-7 col-6">
        <h4 class="page-title font-weight-bold">Doctor's Profile</h4>
    </div>

    <div class="col-sm-5 col-6 text-right m-b-30">
        <a href="{{route('edit_doctor',$doctor->id)}}" class="btn bpinkcolor text-white btn-rounded"><i class="far fa-edit"></i> Edit Profile</a>
    </div>
</div>

<div class="card-box profile-header">
    <div class="row">
        <div class="col-md-12">

            <div class="profile-view">
                <div class="profile-img-wrap">
                    <div class="profile-img">
                        <a href="#"><img alt="" class="avatar" src="{{'/image/DoctorProfile/'. $doctor->photo}}"></a>
                    </div>
                </div>
                <div class="profile-basic">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="profile-info-left">
                                <h3 class="pinkcolor m-t-0 mb-2 ">{{$doctor->name}}</h3>
                                <h4 class="bluecolor">{{$doctor->department->name}}</h4>
                                <div class="staff-id">Doctor - ID : {{$doctor->doctor_code}}</div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <ul class="personal-info">
                                <li>
                                    <span class="title">Phone:</span>
                                    <span class="text bluecolor">{{$doctor->phone}}</span>
                                </li>
                                <li>
                                    <span class="title">Position:</span>
                                    <span class="text">{{$doctor->position}}</span>
                                </li>
                                <li>
                                    <span class="title">Title:</span>
                                    <span class="text">{{$doctor->about_doc}}</span>
                                </li>
                                <li>
                                    <span class="title">Address:</span>
                                    <span class="text">{{$doctor->address}}</span>
                                </li>
                                <li>
                                    <span class="title">Gender:</span>
                                    <span class="text">{{$doctor->gender}}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>                          
        </div>
    </div>
</div>

<div class="profile-tabs mt-3">
    <ul class="nav nav-tabs nav-tabs-bottom rounded">
        
        <li class="nav-item"><a class="nav-link active" href="#bottom-tab2" data-toggle="tab">Profile</a></li>
        <li class="nav-item"><a class="nav-link" href="#about-cont" data-toggle="tab">About</a></li>
        <li class="nav-item"><a class="nav-link" href="#services" data-toggle="tab">Services</a></li>

    </ul>

    <div class="tab-content">

        <div class="tab-pane active" id="bottom-tab2">

            <div class="row">
                <div class="col-md-12">
                    <div class="card-box">
                        <h3 class="card-title">Schedule Informations</h3>
                        <div class="experience-box">
                            <ul class="experience-list">

                                @foreach($doctor->day as $doc_day)                                    
                                    <li>
                                        <div class="experience-user">
                                            <div class="before-circle"></div>
                                        </div>
                                        <div class="experience-content">
                                            <div class="timeline-content">
                                                <h4 class="text-info">{{$doc_day->name}}</h4>
                                                <span class="custom-badge  status-blue">
                                                    {{date('h:i: a', strtotime($doc_day->pivot->start_time))}}
                                                    -
                                                    {{date('h:i: a', strtotime($doc_day->pivot->end_time))}}
                                                </span>
                                            </div>
                                        </div>
                                    </li>
                                    
                                @endforeach       
                            </ul>
                        </div>
                    </div>

                    <div class="card-box mb-0">
                        <h3 class="card-title">Experience</h3>
                        <div class="experience-box">
                            <ul class="experience-list">
                                <li>
                                    <div class="experience-user">
                                        <div class="before-circle"></div>
                                    </div>

                                    <div class="experience-content">
                                        <div class="timeline-content">
                                            <h5 class="text-info">Vip Token Number</h5>
                                            <span class="custom-badge  status-blue">{{$doctor->doc_info->reserved_token}} - Token</span>
                                          
                                            
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="experience-user">
                                        <div class="before-circle"></div>
                                    </div>

                                    <div class="experience-content">
                                        <div class="timeline-content">
                                            <h5 class="text-info">Maximun Token Number</h5>
                                            <span class="custom-badge  status-blue">
                                                {{$doctor->doc_info->maximum_token}} - Token
                                            </span> 
                                        </div>
                                    </div>
                                </li>
                                
                                <li>
                                    <div class="experience-user">
                                        <div class="before-circle"></div>
                                    </div>

                                    <div class="experience-content">
                                        <div class="timeline-content">
                                            <h5 class="text-info">Available Booking Range</h5>
                                            <span class="custom-badge  status-blue">
                                                {{$doctor->doc_info->booking_range}}
                                            </span> 
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>

        <div class="tab-pane show " id="about-cont">
            <div class="row">
                <div class="col-md-12">
                    <div class="card-box">
                        <h3 class="card-title">Education Informations</h3>
                        <div class="experience-box">
                            <ul class="experience-list">

                                @foreach($doctor->doc_edu as $doc_education)
                                    <li>
                                        <div class="experience-user">
                                            <div class="before-circle"></div>
                                        </div>
                                        <div class="experience-content">
                                            <div class="timeline-content">
                                                <h5 class="text-info">{{$doc_education->university}}</h5>
                                                <div>{{$doc_education->degree}}</div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                                
                            </ul>
                        </div>
                    </div>

                    <div class="card-box mb-0">
                        <h3 class="card-title">Experience</h3>
                        <div class="experience-box">
                            <ul class="experience-list">

                                @foreach($doctor->doc_exp as $doc_experience)
                                <li>
                                    <div class="experience-user">
                                        <div class="before-circle"></div>
                                    </div>
                                    <div class="experience-content">
                                        <div class="timeline-content">
                                            <h5 class="text-info">{{$doc_experience->position}}</h5>
                                            <span class="time">{{$doc_experience->place}}</span>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                                                               
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane show " id="services">
            <div class="row">
                <div class="col-md-12">
                    <div class="card-box">
                        <h3 class="card-title"> Services</h3>
                        <div class="experience-box">
                            <ul class="experience-list">

                                @foreach($doctor->services as $doc_education)
                                    <li>
                                        <div class="experience-user">
                                            <div class="before-circle"></div>
                                        </div>
                                        <div class="experience-content">
                                            <div class="timeline-content">
                                                <h5 class="text-info">{{$doc_education->name}}</h5>
                                                <h5 class="text-success">{{$doc_education->description}}</h5>
                                                <div>{{$doc_education->charges}} MMK</div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                                
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


@endsection