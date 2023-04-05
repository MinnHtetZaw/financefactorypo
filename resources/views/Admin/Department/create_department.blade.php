@extends('master')
@section('title', 'Create Department')
@section('content')

<div class="row">
    <div class="col-lg-8 offset-lg-2">
        <h4 class="page-title font-weight-bold">Create Clinics</h4>
    </div>
</div>
<div class="row">
    <div class="col-lg-8 offset-lg-2">
        <form action="{{route('store_department')}}" method="post" enctype="multipart/form-data">
        	@csrf
			<div class="form-group">
				<label>Clinic Name</label>
				<input class="form-control" type="text"  name="name">
			</div>
            <div class="form-group">
                <label>Description</label>
                <textarea cols="30" rows="4" class="form-control" name="description"></textarea>
            </div>

            <div class="form-group">
                <label>Clinic Logo</label>
                <input type="file" class="form-control" name="image">                          

            </div>

            <div class="form-group">
                <label class="display-block">Clinic Status</label>
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="status" id="product_active" value="1" checked>
					<label class="form-check-label" for="product_active">
					Active
					</label>
				</div>
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="status" id="product_inactive" value="2">
					<label class="form-check-label" for="product_inactive">
					Inactive
					</label>
				</div>
            </div>
            <div class="m-t-20 text-center">
                <button class="btn bbluecolor text-white submit-btn">Store Clinic</button>
            </div>
        </form>
    </div>
</div>


@endsection