@extends('master')
@section('title', 'Building Information')
@section('content')

<div class="row">
    <div class="col-sm-5 col-5">
        <h4 class="page-title font-weight-bold">Building Information</h4>
    </div>
</div>


<div class="row">

	<div class="col-md-12">

        <div class="card shadow">

    		<div class="card-header">
    			<div class="col-sm-7 col-7 text-right pull-right">
			        <a href="" class="btn btn-primary btn-rounded" data-target="#add_building" data-toggle="modal">
			        	<i class="fa fa-plus"></i> Add Building
			        </a>
			    </div>

			    <div id="add_building" class="modal fade delete-modal" role="dialog">
					<div class="modal-dialog modal-dialog-centered">
						<div class="modal-content">
							<div class="modal-body text-center">
								<h3>Building!</h3>
								<hr>
								<form action="{{route('buidling_store')}}" method="POST">
									@csrf

									<div class="form-group">
										<label>Building Name</label>
										<input class="form-control" type="text"  name="name">
									</div>

									<div class="m-t-20"> 
										<a href="#" class="btn btn-danger ml-3" data-dismiss="modal">Close</a>
										<button type="submit" class="btn btn-primary">Save</button>
									</div>
								</form>				
							</div>
						</div>
					</div>
				</div>
    			
    		</div>

    		<div class="card-body">
    			<div class="table-responsive">
					<table class="table table-hover mb-0">
						<thead>
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Add Floor</th>		
		                    </tr>
						</thead>
						 <?php
		                    $i = 1;
		                ?>
						<tbody>
							@foreach($buildings as $building)
							<tr>
								<td>{{$i++}}</td>
								<td>{{$building->name}}</td>									
		                		<td>
		                			<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#floor_{{$building->id}}">Add Floor
		                			</a>
		                		</td>
							</tr>

							<div class="modal fade" id="floor_{{$building->id}}" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title pinkcolor" id="exampleModalLabel1">Floor Registration</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('floor_store')}}" method="post">
                                            	@csrf
                                                <div class="form-group">
		                                            <label class="control-label">Floor Name</label>
		                                            <input type="text" name="name" class="form-control" placeholder="eg..Floor One"> 
		                                            <input type="hidden" name="building_id" value="{{$building->id}}">      
		                                        </div>
		                                        <div class="form-group">
		                                            <label class="control-label">Number of Rooms</label>
		                                            <input type="number" name="room_number" class="form-control" placeholder="eg..1, 2, 3">      
		                                        </div>
		                                        <div class="form-group">
		                                            <label class="control-label">Departments</label>
		                                            <select class="form-control" name="department_id">
		                                            	<option value="">Select Department</option>
		                                            	@foreach($departments as $dept)

		                                            	<option value="{{$dept->id}}">{{$dept->name}}</option>

		                                            	@endforeach
		                                            </select>     
		                                        </div>
		                                        <button type="button" class="btn btn-default float-right m-1" data-dismiss="modal">
		                                        	Close
		                                    	</button>
                                            	<button type="submit" class="btn btn-success float-right m-1"> 
                                            		<i class="fa fa-check"></i> Save
                                            	</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            

							@endforeach
							
						</tbody>
					</table>
				</div>
    		</div>
            		
        </div> 
        
    </div>
	
</div>

@endsection