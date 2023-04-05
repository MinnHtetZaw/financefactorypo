@extends('master')
@section('title', 'Edit Profile')
@section('content')


<div class="row">
    <div class="col-sm-7 col-6">
        <h4 class="page-title font-weight-bold">Edit <span class="bluecolor">{{$admin->name}}</span> Profile</h4>
    </div>

</div>

<div class="card-box profile-header">
    <div class="row">
        <div class="col-md-12">
            <div class="profile-view">
                <div class="profile-basic">
                <form action="{{route("counter_profile_edit_save")}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="employee_id" value="{{$admin->id}}">
                <div class="row">
                <div class="col-md-2 offset-md-2">
                    <div class="form-group">
                        <label class="control-label">Name</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="text" name="name" value="{{$admin->name}}" class="form-control">
                    </div>
                </div>
                </div>
                <div class="row">
                <div class="col-md-2 offset-md-2">
                    <div class="form-group">
                        <label class="control-label">Code</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="text" name="code" class="form-control" value="{{$admin->employee_code}}">
                    </div>
                </div>
                </div>
                <div class="row">
                <div class="col-md-2 offset-md-2">
                    <div class="form-group">
                        <label class="control-label">Phone</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="text" name="phone" value="{{$admin->phone}}" class="form-control">
                    </div>
                </div>
                </div>
                <div class="row">
                <div class="col-md-2 offset-md-2">
                    <div class="form-group">
                        <label class="control-label">Birday</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="date" name="dob" value="{{$admin->dob}}" class="form-control">
                    </div>
                </div>
                </div>

                <div class="row">
                    <div class="col-md-2 offset-md-2">
                        <div class="form-group">
                            <label class="control-label">Email</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="email" name="email" value="{{$admin->user->email}}" class="form-control">
                        </div>
                    </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 offset-md-2">
                            <div class="form-group">
                                <label class="control-label">Password</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="password" name="password"  class="form-control">
                            </div>
                        </div>
                        </div>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <a href="{{route('counter_profile',$admin->id)}}" class="btn bpinkcolor text-white px-4">Back</a>
                            <button class="btn bbluecolor text-white px-4">Save</button>
                        </div>
                  
                    </div>
                  </form>
                </div>
            </div>                        
        </div>
    </div>
</div>


@endsection