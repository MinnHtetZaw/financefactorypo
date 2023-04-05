@extends('master')
@section('title', 'Department Edit')
@section('content')

<div class="row">
    <div class="col-lg-8 offset-lg-2">
        <h4 class="page-title font-weight-bold">Edit Department</h4>
    </div>
</div>
<div class="row">
    <div class="col-lg-8 offset-lg-2">
        <form action="{{route('update_department', $department->id)}}" method="post">
        	@csrf
            @method('PUT')
			<div class="form-group">
				<label>Department Name</label>
				<input class="form-control" type="text" name="name" value="{{$department->name}}">
			</div>
            <div class="form-group">
                <label>Description</label>
                <textarea cols="30" rows="4" class="form-control" name="description">{{$department->description}}</textarea>
            </div>
            <div class="form-group">
                <label class="display-block">Department Status</label>

                <div class="material-switch m-3">
                    @if($department->status == 1)
                    <input id="staff_module" type="checkbox" checked="checked" name="dept_status">
                    <label for="staff_module" class="badge-primary"></label>
                    @else
                    <input id="staff_module" type="checkbox" name="dept_status">
                    <label for="staff_module" class="badge-primary"></label>
                    @endif
                </div>
                
            </div>
            <div class="m-t-20 text-center">
                <button class="btn btn-primary submit-btn">Update Department</button>
                   
            </div>
        </form>
    </div>
</div>


@endsection

