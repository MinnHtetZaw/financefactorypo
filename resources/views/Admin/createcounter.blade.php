@extends('master')
@section('title', 'Create Profile')
@section('content')


<div class="row">
    <div class="col-sm-12">
        <h2 class="text-center font-weight-bold py-3"> Counter Registration</h2>
    </div>

</div>

<div class="card-box profile-header">
    <div class="row">
        <div class="col-md-12">
            <div class="profile-view">
                <div class="profile-basic">
                <form action="{{route("create_counter_save")}}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="row">
                <div class="col-md-2 offset-md-2">
                    <div class="form-group">
                        <label class="control-label">Name</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control">
                    </div>
                </div>
                </div>
                <div class="row">
                    <div class="col-md-2 offset-md-2">
                        <div class="form-group">
                            <label class="control-label">Profile</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="file" name="image" class="">
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
                        <input type="text" name="phone" class="form-control">
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
                        <input type="date" name="dob" class="form-control">
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
                            <input type="email" name="email" class="form-control">
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