@extends('master')
@section('title','Create Regional Warehouse')
@section('link','Create Regional Warehouse')
@section('content')

<div class="col-md-12">
<h4><i><b>Create Regional Warehouse</b></i></h4>
<div class="row">

	<!-- Begin -->
	<link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">

<!-- left column -->
	<div class="col-md-6">
	<!-- general form elements -->
	<div class="card card-primary">
	  <!-- <div class="card-header">
	    <h3 class="card-title">Regional Warehouse Register</h3>
	  </div> -->
	  <!-- /.card-header -->
	  <!-- form start -->
	  <form role="form" method="post" action="{{route('store_regional')}}" enctype="multipart/form-data">
	  	@csrf
	    <div class="card-body">
	      <div class="form-group">
	        <label for="name">Warehouse Name</label>
	        <input type="text" class="form-control" name="ware_name" id="ware_name" placeholder="Enter Warehouse Name">
	      </div>
	      <div class="form-group">
	        <label for="phone">Region</label>
	        <input type="text" class="form-control" name="region" id="region" placeholder="Enter Region Name">
	      </div>
	      <div class="form-group">
	        <label for="address">Country</label>
	        <input type="text" class="form-control" name="country" id="country" placeholder="Enter Country">
	      </div>
		  <div class="form-group">
	        <label for="address">Location Address</label>
	        <input type="text" class="form-control" name="address" id="address" placeholder="Enter Address">
	      </div>
		  <div class="form-group">
	        <label for="address">Area</label>
	        <input type="text" class="form-control" name="area" id="area" placeholder="Enter Area">
	      </div>
		  <div class="form-group">
	        <label for="address">Capacity</label>
	        <input type="text" class="form-control" name="capacity" id="capacity" placeholder="Enter Capacity">
	      </div>
	     
	      <!-- <div class="form-group">
	      		<label>Regional Warehouse  Date:</label> -->

	      <!-- <div class="input-group">
	        <div class="input-group-prepend">
	          <span class="input-group-text">
	            <i class="far fa-calendar-alt"></i>
	          </span>
	        </div>
	        <input type="date" name="regional_date" class="form-control float-right">
	      </div> -->
	      <!-- /.input group -->
	    <!-- </div> -->
		<!-- <div class="form-group">
                <label for="message-text"  class="float-left">Employee:</label>
                <select class="form-control" name="employee_id">
                 
                  <option value=""></option>
                  
                </select>
                
            </div> -->
	    <div class="form-group">
            <label class="control-label">Project</label>
            <div class="select2-green">
			    <select class="select2-multiple" id="select2" style="width: 100%" multiple="multiple" data-placeholder=" Select" name="proj[]">
                    <option value="">Select</option>
                    @foreach($projects as $project)
                    <option value="{{$project->id}}">{{$project->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
	    
	
	    	
	    </div>
	    <!-- /.card-body -->

    
  
</div>

	<!-- End -->
</div>
<div class="col-md-6">
	<div class="card card-primary">
		<div class="card-body">
		<div class="form-group">
            <label for="photo">Photo</label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" name="photo" class="custom-file-input" id="exampleInputFile">
                <label class="custom-file-label" for="photo">RegionalWarehouse Photo</label>
              </div>
              <div class="input-group-append">
                <span class="input-group-text" id="">Upload</span>
              </div>
            </div>
          </div>
			<div class="form-group">
					<label for="email">Email</label>
					<input type="email" class="form-control" name="email" id="email" placeholder="Enter Employee Email">
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" class="form-control" name="password" id="password" placeholder="password">
				</div>
			</div>
	</div>
	<div class="card-footer">
      <button type="submit" class="btn btn-primary btn-block">Submit</button>
    </div>
</div>
</form>
</div>
</div>




<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script type="text/javascript">



    $("#select2").select2();
  

</script>

@endsection

