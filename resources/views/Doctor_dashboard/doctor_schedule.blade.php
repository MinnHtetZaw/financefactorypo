@extends('master')
@section('title', 'Schedule')
@section('content')

<div class="row">
    <div class="col-sm-4 col-3">
	    <h4 class="page-title font-weight-bold">Schedule</h4>
	</div>

	<div class="col-sm-8 col-9 text-right m-b-20">
	    <a href="{{route('create_schedule_day')}}" class="btn bpinkcolor text-white btn-rounded float-right"><i class="fa fa-plus"></i> Add Schedule</a>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="table-responsive">
			<table class="table table-stripped">
				<thead>
					<tr>
						<th style="border-bottom:0">Doctor Name</th>
						<th style="border-bottom:0">Department</th>
						<th class="text-center" style="border-bottom:0">Available Days & Time</th>
						<th style="border-bottom:0">Check Doctor's Details</th>
						<th style="border-bottom:0">Status</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>
							<img width="28" height="28" src="{{'/image/'.$doc->photo}}" class="rounded-circle m-r-5" alt="">
							<a href="{{route('check_doctor_profile', $doc->id)}}" style="color: black; cursor: pointer;">
								{{$doc->name}}
							</a>
						</td>
						<td>
							{{$doc->department->name}}

						<td class="text-center">
							@foreach($doc->day as $day)
							<a href="{{ route('check_schedule_time',[$day->id,$doc->id]) }}">
								<span class="custom-badge  status-blue">{{$day->name}}<br>
									{{$day->pivot->start_time}} - {{$day->pivot->end_time}}
								</span>
							</a>
							@endforeach
						</td>
						<td>
							<a class="btn bbluecolor text-white btn-rounded" href="{{route('check_doctor_profile', $doc->id)}}">Check
								<i class="fa fa-check text-white"></i>
							</a>
						</td>
						<td><span class="custom-badge status-green">Active</span></td>
						{{-- <td class="text-right">
							<div class="dropdown dropdown-action">
								<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
								<div class="dropdown-menu dropdown-menu-right">
									<a class="dropdown-item" href=""><i class="fa fa-pencil m-r-5"></i> Edit</a>
								
								</div>
							</div>
						</td> --}}
						
					</tr>


					<div id="delete_schedule" class="modal fade delete-modal" role="dialog">
						<div class="modal-dialog modal-dialog-centered">
							<div class="modal-content">
								<div class="modal-body text-center">
									<img src="assets/img/sent.png" alt="" width="50" height="46">
									<h3>Are you sure want to delete this Schedule?</h3>
									<div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
										<button type="submit" class="btn btn-danger">Delete</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</tbody>
			</table>
		</div>
    </div>
</div>


@endsection

