@extends('master')
@section('title', 'Building Information')
@section('content')

<div class="row">
    <div class="col-sm-5 col-5">
        <h4 class="page-title font-weight-bold">Diagnose</h4>
    </div>
</div>


<div class="row">

	<div class="col-md-12">

        <div class="card shadow">

    		<div class="card-header">
    			<div class="col-sm-7 col-7 text-right pull-right">
			        <a href="" class="btn bpinkcolor text-white btn-rounded" data-target="#add_building" data-toggle="modal">
			        	<i class="fa fa-plus"></i> Add Diagnosis
			        </a>
			    </div>

			    <div id="add_building" class="modal fade delete-modal" role="dialog">
					<div class="modal-dialog modal-dialog-centered">
						<div class="modal-content">
							<div class="modal-body text-center">

								<h3 class="pinkcolor">Diagnosis!</h3>
								<hr>
								<form action="{{route('diagnosis_store')}}" method="POST">
									@csrf

									<div class="form-group">
										<label> Diagnosis</label>
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
		                    </tr>
						</thead>
						 <?php
		                    $i = 1;
		                ?>
						<tbody>
							@foreach($diagnosis as $diag)
							<tr>
								<td>{{$i++}}</td>
								<td>{{$diag->name}}</td>
							</tr>

							@endforeach
							
						</tbody>
					</table>
				</div>
    		</div>
            		
        </div> 
        
    </div>
	
</div>

@endsection