@extends('master')
@section('content')

<div class="row">
    <div class="col-md-6 offset-md-3">
        <h4 class="page-title font-weight-bold">Change Password</h4>
        <form action="{{route('change_admin_pw')}}" method="post">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Old password</label>
                        <input type="password" class="form-control" name="current_pw">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>New password</label>
                        <input type="password" class="form-control" name="new_pw">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Confirm password</label>
                        <input type="password" class="form-control" name="new_pw_confirmation">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 text-center m-t-20">
                    <button type="submit" class="btn btn-primary submit-btn">Update Password</button>
                </div>
            </div>
        </form>
    </div>
</div>


@endsection