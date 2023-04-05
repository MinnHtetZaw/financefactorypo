@extends('master')
@section('title', 'Bookings')
@section('content')

<div class="row">
	<div class="col-sm-4 col-3">
	    <h4 class="page-title font-weight-bold">{{$patient->name}}'s Booking List</h4>
	</div>
	<div class="col-sm-8 col-9 text-right m-b-20">
	    <a href="{{route('add_booking')}}" class="btn blightblue text-white btn-rounded float-right"><i class="fa fa-plus"></i>Add Booking</a>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="table-responsive">
			<table class="table table-striped custom-table">
				<thead>
					<tr>
						<th>Doctor Name</th>
						<th>Department</th>
						<th>Token Number</th>
						<th>Booking Date</th>
						<th>EST Time</th>
						<th>Status</th>
						<th>Hospital Status</th>
						<th>View Details</th>
					</tr>
				</thead>
				<tbody>
					@foreach($booking_lists as $booking)
						<tr>
							<td>{{$booking->doctor->name}}</td>
							<td>{{$booking->doctor->department->name}}</td>
							<td>{{$booking->token_number}}</td>
							<td>
								{{date('d-m-Y',strtotime($booking->booking_date))}}<br>
								<span class="custom-badge status-blue">{{date('l',strtotime($booking->booking_date))}}</span>
							</td>
							<td>
								{{date('h:i: a', strtotime($booking->est_time))}}
							</td>
							@if($booking->status == 0)
							<td><span class="custom-badge status-red">Unconfirm</span></td>
							@else
							<td><span class="custom-badge status-green">Active</span></td>
							@endif

							@if($booking->doc_status == 0)
							<td><span class="custom-badge status-red">UnConfirm</span></td>
							@else
							<td><span class="custom-badge status-green">Active</span></td>
							@endif
							<td>
								<a href="#">Details</a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection