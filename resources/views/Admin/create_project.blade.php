@extends('master')
@section('title','Add Sale Project')
@section('link','Add Sale Project')
@section('content')
<!-- daterange picker -->
  <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
<div class="row">
<!-- left column -->
	<div class="col-md-12">
	<!-- general form elements -->
	<div class="card card-primary">
	  <div class="card-header">
	    <h3 class="card-title">Sale Project Register</h3>
	  </div>
       <!-- Revenue and receiveable Modal -->
       <div class="modal fade" id="revenue_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Revenue And Receiveable Accounting</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

					<h5 class="text-success">Create Revenue Account</h5>
                    <div class="form-group">
                        <label for="name">Account Code</label>
                        <input type="text" class="form-control border border-info" name="revenue_acc_code" id="revenue_acc_code" placeholder="eg. 123456">
                    </div>
                    <div class="form-group">
                        <label for="name">Account Name</label>
                        <input type="text" class="form-control border-info" name="revenue_acc_name" id="revenue_acc_name" placeholder="eg. Revenue Account">
                    </div><hr>
                    <h5 class="text-success">Create Receiveable Account</h5>
                    <div class="form-group">
                        <label for="name">Account Code</label>
                        <input type="text" class="form-control border border-info" name="rece_acc_code" id="rece_acc_code" placeholder="eg. 123456">
                    </div>
                    <div class="form-group">
                        <label for="name">Account Name</label>
                        <input type="text" class="form-control border-info" name="rece_acc_name" id="rece_acc_name" placeholder="eg. Revenue Account">
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="save_revenue()">Save</button>
                </div>
                </div>
            </div>
        </div>
        <!-- End--->
        <!-- Expense and payable Modal -->
       <div class="modal fade" id="expense_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header bg-info">

                    <h5 class="modal-title" id="exampleModalLabel">Add New COGS And Payable Accounting</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

					<h5 class="text-success">Create COGS Account</h5>
                    <div class="form-group">
                        <label for="name">Account Code</label>
                        <input type="text" class="form-control border border-info" name="cogs_acc_codcogs" id="cogs_acc_code" placeholder="eg. 123456">
                    </div>
                    <div class="form-group">
                        <label for="name">Account Name</label>
                        <input type="text" class="form-control border-info" name="cogs_acc_name" id="cogs_acc_name" placeholder="eg. Revenue Account">
                    </div><hr>
					<h5 class="text-success">Create Payable Account</h5>
                    <div class="form-group">
                        <label for="name">Account Code</label>
                        <input type="text" class="form-control border border-info" name="payable_acc_code" id="payable_acc_code" placeholder="eg. 123456">
                    </div>
                    <div class="form-group">
                        <label for="name">Account Name</label>
                        <input type="text" class="form-control border-info" name="payable_acc_name" id="payable_acc_name" placeholder="eg. Revenue Account">

                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="save_expense()">Save</button>
                </div>
                </div>
            </div>
        </div>
        <!-- End--->
	  <!-- /.card-header -->
	  <!-- form start -->

	  <form role="form" method="post" action="{{route('store_sale_project')}}" enctype="multipart/form-data">
	  	@csrf

       <input type="hidden" name="revenueacc_name" id="revenueacc_name">
       <input type="hidden" name="revenueacc_code" id="revenueacc_code">
	   <input type="hidden" name="receacc_name" id="receacc_name">
       <input type="hidden" name="receacc_code" id="receacc_code">

	   <input type="hidden" name="cogsacc_name" id="cogsacc_name">
       <input type="hidden" name="cogsacc_code" id="cogsacc_code">
	   <input type="hidden" name="payableacc_name" id="payableacc_name">
       <input type="hidden" name="payableacc_code" id="payableacc_code">


       <input type="hidden" name="eeacc_name" id="eeacc_name">
       <input type="hidden" name="eeacc_code" id="eeacc_code">
	    <div class="card-body">
<div class="row">
<div class="col-md-6">
	      <div class="form-group">
	        <label for="name">Project Name</label>
	        <input type="text" class="form-control" name="proj_name" id="proj_name" placeholder="Enter Project Name">
	      </div>
	      <!-- <div class="form-group">
	        <label for="phone">Type</label>
	        <select class="custom-select" name="type" onchange="getCustomer(this.value)">
            <option value="" disabled selected hidden>Select Type</option>
              	<option value="1">Government Tender</option>
                  <option value="2">Private Tender</option>
                  <option value="3">Private Condition</option>
            </select>
	      </div> -->
          <!-- <div class="form-group">
            <label id="chla">Project Owner/Government</label>
            <select class="custom-select" name="customer" disabled id="decision_type">
			</select>
        </div> -->
	      <div class="form-group">
	        <label for="address">Location</label>
	        <select class="custom-select" name="location" id="">

			<option value="" disabled selected hidden>Select Location</option>
              	<option value="Yangon">Yangon</option>
				  <option value="Mandalay">Mandalay</option>
				  <option value="Chin State">Chin State</option>
				  <option value="Sagaing">Sagaing</option>
				  <option value="Pathein">Pathein</option>
				  <option value="Ayerwady">Ayerwady</option>
				  <option value="Myitkyina">Myitkyina</option>
				  <option value="Kachin">Kachin</option>
				  <option value="Dawei">Dawei</option>
            </select>

            </select>
	      </div>

		  <div class="form-group">
	        <label for="name">Project Contact Person</label>
	        <input type="text" class="form-control" name="person" id="person" placeholder="Enter Contact Person">
	      </div>
          <div class="row form-group">
              <div class="col-md-8">
                <label for="name">Project Value</label>
                <input type="integer" class="form-control" name="project_value" id="project_value" placeholder="0" onchange="request_pro()">
              </div>
              <div class="col-md-4">
                <label for="name">Currency</label>
                <select class="custom-select mt-1" name="currency">
                <option class="form-control">Choose Currency</option>
                @foreach($currency as $cc)
                <option value="{{$cc->id}}">{{$cc->name}}</option>
                @endforeach
                </select>
              </div>

	      </div>
          <div class="row form-group">
            <div class="col-md-8">
                <label for="name">Expected Budget</label>
                <input type="integer" class="form-control" name="exp_budget" id="exp_budget" placeholder="0" onchange="request_budget()">
            </div>
            <div class="col-md-4">
              <label for="name">Currency</label>
              <select class="custom-select mt-1" name="currency_id">
              <option class="form-control">Choose Currency</option>
              @foreach($currency as $cc)
              <option value="{{$cc->id}}">{{$cc->name}}</option>
              @endforeach
              </select>
            </div>

        </div>
		  <div class="form-group" id="">
                        <label for="name">Project Owner List</label>
                        <select class="custom-select" name="customer_id" onchange="get_cust_info(this.value)">
                        <option>Choose Customer</option>
                            @foreach($customers as $customer)

                            <option value="{{$customer->id}}">{{$customer->company_name}}</option>

                            @endforeach
                        </select>
            </div>
			<div class="form-group">
	        <label>Description</label><br>
	        <textarea class="form-control" name="description" placeholder="Describe yourself here..." rows="5" cols="80"></textarea>
	      </div>
</div>
<div class="col-md-6">
		  <div class="form-group">
	        <label for="name">Contact Person Phone</label>
	        <input type="text" class="form-control" name="phone" id="cpp" placeholder="Enter Contact Person Phone">
	      </div>
		  <div class="form-group">
	        <label for="name">Contact Person Team</label>
	        <input type="text" class="form-control" name="team" id="team" placeholder="Enter Contact Person Team">
	      </div>
		  <div class="form-group">
	        <label for="name">Email Address</label>
	        <input type="email" class="form-control" name="email" id="email" placeholder="Enter Contact Person email">
	      </div>
	      <div class="form-group">
            <label for="photo">RFQ File</label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" name="rfq" class="custom-file-input" id="rfq">
                <label class="custom-file-label text-secondary" for="photo">Enter RFQ File</label>
              </div>
              <div class="input-group-append">
                <span class="input-group-text" id="">Upload</span>
              </div>
            </div>
          </div>
		  <div class="form-group">
	      		<label>Estimate Start Date:</label>

	      <div class="input-group">
	        <div class="input-group-prepend">
	          <span class="input-group-text">
	            <i class="far fa-calendar-alt"></i>
	          </span>
	        </div>
	        <input type="date" name="esti_date" class="form-control float-right">
	      </div>
	      <!-- /.input group -->
	    </div>
		<div class="form-group">
	      		<label>Tinder Quotation Submission Date:</label>

	      <div class="input-group">
	        <div class="input-group-prepend">
	          <span class="input-group-text">
	            <i class="far fa-calendar-alt"></i>
	          </span>
	        </div>
	        <input type="date" name="submis_date" class="form-control float-right">
	      </div>
	      <!-- /.input group -->
	    </div>

</div>
</div>

	    <!-- <div class="form-group">
	        <label for="salary">Salary</label>
	        <input type="number" class="form-control" name="salary" id="salary" placeholder="Enter Employee Salary">
	      </div>
	    	<div class="form-group">
		        <label for="email">Email</label>
		        <input type="email" class="form-control" name="email" id="email" placeholder="Enter Employee Email">
		      </div>
	    	<div class="form-group">
		        <label for="password">Password</label>
		        <input type="password" class="form-control" name="password" id="password" placeholder="password">
		      </div>
	    </div> -->
	    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary float-right">Submit</button>
    </div>
  </form>
</div>
<!-- /.card -->
@endsection

@section('js')

<script>

function getCustomer(type)
{
    alert(type);
    $.ajax({
      type:'POST',
      url:'/check_project_type',
      dateType:'json',
      data:{
        "_token":"{{csrf_token()}}",
        'type' : type,

      },
      success:function(data){
		  if(data == "gover")
		  {
			//   alert("hello");
			  var htmllabel = "";
			 htmllabel = `Government`;
			 $('#chla').html(htmllabel);
			  $('#decision_type').empty();
			$("#decision_type").removeAttr("disabled");
			$('#decision_type').append($('<option>').attr('value',"Myanmar Gover One").text("Myanmar Gover One"));
			$('#decision_type').append($('<option>').attr('value',"Myanmar Gover Two").text("Myanmar Gover Two"));
			$('#decision_type').append($('<option>').attr('value',"Myanmar Gover Three").text("Myanmar Gover Three"));
		  }
		  else
		  {
			$('#decision_type').empty();
			$("#decision_type").removeAttr("disabled");
             $('#decision_type').append($('<option>').text('Select Customer'));
			 var htmllabel = "";
			 htmllabel = `Project Owner`;
			 $('#chla').html(htmllabel);
           	$.each(data,function(i,cust){

           	    $('#decision_type').append($('<option>').attr('value',cust.id).text(cust.contact_person_name));
           	})
		  }
      }
    });
}
function request_pro()
{
    // alert("hello");
    $('#revenue_modal').modal('show');
}
function save_revenue()
{

    $('#revenueacc_name').val($('#revenue_acc_name').val());
	$('#revenueacc_code').val($('#revenue_acc_code').val());
	$('#receacc_name').val($('#rece_acc_name').val());
	$('#receacc_code').val($('#rece_acc_code').val());


    $('#revenue_modal').modal('hide');
}
function request_budget()
{
    // alert("hello");
    $('#expense_modal').modal('show');
}
function save_expense()
{

	$('#cogsacc_name').val($('#cogs_acc_name').val());
	$('#cogsacc_code').val($('#cogs_acc_code').val());
	$('#payableacc_name').val($('#payable_acc_name').val());
	$('#payableacc_code').val($('#payable_acc_code').val());


    $('#expense_modal').modal('hide');
}
function get_cust_info(value)
{
    $.ajax({
      type:'POST',
      url:'/ajax_get_cust',
      dateType:'json',
      data:{
        "_token":"{{csrf_token()}}",
        'cust_id' : value,

      },
      success:function(data){
        $('#cpp').val(data.contact_number);
      }
    });
}

</script>
@endsection
