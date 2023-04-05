@extends('master')
@section('title','Customer List')
@section('link','Customer List')
@section('content')
<link href="vendor/select2/dist/css/select2.min.css" rel="stylesheet" />

<style type="text/css">
  
  .card-style{
    border-radius: 50px;
  }
  img{
    border-radius: 50px 0 0 50px;
  }
  .select2-container--default .select2-selection--multiple .select2-selection__choice{
    background-color: #0060c4;
  }

</style>
<div class="row">
        <div class="col-12">
          	<div class="card">
              <div class="card-header">
              
              	<h3 class="card-title">Customer List</h3>
              	<button type="button" data-toggle="modal" data-target="#customer" class="btn btn-primary float-right"><i class="fas fa-plus"></i> Add Customer</button>
              </div>
            
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead class="text-center bg-info">
                	<th>#</th>
                	<th>Company Name</th>
                  <!-- <th>Bussiness Type</th> -->
                	<th>Email</th>
                  <!-- <th>Website</th> -->
                	<th>Contact Person</th>
                  <th>Contact Number</th>
                  <th>Action</th>
                </thead>
                <tbody class="text-center">
                @if(count($customers) == 0)
                    <tr><td colspan="5"><h2 class="text-center">There is no Data</h2></td></tr>
                  @else
                  <?php $i = 1;?>
                  @foreach($customers as $customer)
                  <tr>
                    <td>{{$i++}}</td>
                    <td>{{$customer->company_name}}</td>
                    <!-- <td>{{$customer->business_type}}</td> -->
                    <td>{{$customer->email}}</td>
                    <!-- <td>{{$customer->website}}</td> -->
                    <td>{{$customer->contact_person_name}}</td>
                    <td>{{$customer->contact_number}}</td>
                    <td><a href="{{route('customer_receive_list',$customer->id)}}" class="btn btn-warning btn-sm">Receiveable</a></td>
                 </tr>
                 @endforeach
                @endif
                </tbody>
              </table>
            </div> 

            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>

<!--Add category Modal -->
  
  <div class="modal fade" id="customer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-info">
          <h5 class="modal-title" id="exampleModalLabel">New Customer Form</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-center">

        <form method="POST" action="{{route('store_customer')}}">
          @csrf
            @if ($message = Session::get('success'))
                 <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                 </div>
                 <br>
               @endif
            <div class="form-group">
                <label for="company_name"  class="float-left">Name:</label>
                <input type="text" class="form-control border-info" id="company_name" name="company_name">
                <span class="text-danger">{{ $errors->first('company_name') }}</span>
            </div>
            <!-- <div class="form-group">
                <label for="business_type"  class="float-left">Business Type:</label>
                <input type="text" class="form-control border-info" id="business_type" name="business_type">
                <span class="text-danger">{{ $errors->first('business_type') }}</span>
            </div> -->
            <div class="form-group">
                <label for="address"  class="float-left">Address:</label>
                <input type="text" class="form-control border-info" id="address" name="address">
                <span class="text-danger">{{ $errors->first('address') }}</span>
            </div>
            <div class="form-group">
                <label for="email"  class="float-left">Email:</label>
                <textarea class="form-control border-info" id="email" name="email"></textarea>
                <span class="text-danger">{{ $errors->first('email') }}</span>
            </div>
            <!-- <div class="form-group">
                <label for="business_type"  class="float-left">Website:</label>
                <input type="text" class="form-control border-info" id="website" name="website">
                <span class="text-danger">{{ $errors->first('website') }}</span>
            </div> -->
            <div class="form-group">
                <label for="contact_person_name"  class="float-left">Contact Person:</label>
                <input type="text" class="form-control border-info" id="contact_person_name" name="contact_person_name">
                <span class="text-danger">{{ $errors->first('contact_person_name') }}</span>
            </div>
            <div class="form-group">
                <label for="contact_number"  class="float-left">Contact Number:</label>
                <input type="text" class="form-control border-info" id="contact_number" name="contact_number">
                <span class="text-danger">{{ $errors->first('contact_number') }}</span>
            </div>
          
              <input type="submit" name="btnsubmit" class="btn btn-primary float-right btn-submit" value="Create Customer">
          </form>

        </div>
      </div>
    </div>
  </div>
<!-- page script -->
<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script src="vendor/select2/dist/js/select2.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
      $('#project').select2();
  });

</script>

@endsection