@extends('master')
@section('title', 'Payment')
@section('content')
<div class="row">


	<div class="col-md-8 offset-md-2">
		<div class="profile-tabs">
			<ul class="nav nav-tabs nav-tabs-bottom">
				
				<li class="nav-item"><a class="nav-link active" href="#bottom-tab2" data-toggle="tab">Online Payment</a></li>
				<li class="nav-item"><a class="nav-link" href="#about-cont" data-toggle="tab">Manual Payment</a></li>
		
			</ul>
		
			<div class="tab-content">
		
				<div class="tab-pane active" id="bottom-tab2">
		
					<div class="row">
						<div class="col-md-12">
							<div class="card-box">
								<div class="experience-box p-4">
									<div class="row">
										<div class="col-md-6 m-0 p-0">
											<p>Early Doctor Payment: </p>
										</div>
										<div class="col-md-6">
											<span>{{$doctor->online_early_payment}} MMK</span>
										</div>
							<?php 
								//Merchant's account information
								$merchant_id = "JT01";			//Get MerchantID when opening account with 2C2P
								$secret_key = "7jYcp4FxFdf0";	//Get SecretKey from 2C2P PGW Dashboard
								
								//Transaction information
								$payment_description  = "Payment For $real_book_token->name";
								$order_id  = $real_book_token->id.'-'.time();
								$currency = "702";
							
								// $amount  = $doctor->online_early_payment/170000;
								
								//Request information
								$version = "8.5";	
								$payment_url = "https://demo2.2c2p.com/2C2PFrontEnd/RedirectV3/payment";
								// $result_url_1 = "http://kwintechnologies.com/res4.php";
								$result_url_1 = "http://localhost:8000/res4.php";
								
								//Construct signature string
								$params = $version.$merchant_id.$payment_description.$order_id.$currency.$amount.$result_url_1;
								$hash_value = hash_hmac('sha256',$params, $secret_key,false);	//Compute hash value
								
								echo '	<div class="col-md-12 m-0 p-0">
										<p>	Payment Information </p>
										</div>';
								echo '
								<form id="myform" method="post"  class="row" action="'.$payment_url.'">
							
									<input type="hidden" name="version" value="'.$version.'"/>
									<input type="hidden" name="merchant_id" value="'.$merchant_id.'"/>
									<input type="hidden" name="currency" value="'.$currency.'"/>
									<input type="hidden" name="result_url_1" value="'.$result_url_1.'"/>
									<input type="hidden" name="hash_value" value="'.$hash_value.'"/>
									<div class="col-md-6 py-2">
										<p>	PRODUCT INFO </p>
									</div>
									<div class="col-md-6 py-2">
										<input type="hidden" class="form-control" name="payment_description" value="'.$payment_description.'"  readonly/>
										<p>'. $payment_description.'</p>
									</div>	
									<div class="col-md-6 py-2">
										<p>	ORDER NO : </p>
									</div>
									<div class="col-md-6 py-2">
										<input type="text" class="form-control" name="order_id" value="'.$order_id.'"  readonly/>
									</div>
									<div class="col-md-6 py-2">
										<p>	Amount : </p>
									</div>
									<div class="col-md-6 py-2">
									<input type="text" class="form-control" name="amount" value="'.$amount.'" readonly/> '.$doctor->online_early_payment.'MMK <br/>
									</div>
									<input type="submit" class="btn btn-primary ml-auto" name="submit" value="Confirm" />
								</form>  ';	 
							?>
										</div>
								</div>
							</div>
						</div>
					</div>
					
				</div>
		
				<div class="tab-pane show " id="about-cont">
					<div class="row">
						<div class="col-md-12">
							<div class="card-box">
								<h3 class="card-title">Manual Payment</h3>
								<div class="experience-box">
								   <p>Manual Payment</p>
								</div>
							</div>
						</div>
					</div>
				</div>
		
		
			</div>
		</div>
	


</div>
</div>
@endsection

@section('js')

<script>
	$(document).ready(function(){
		$.ajaxSetup({
			headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
			'Access-Control-Allow-Origin': '*',
			'Access-Control-Allow-Methods': 'GET',
			'Access-Control-Allow-Headers': 'Origin, Content-Type, X-Auth-Token'

			}
		});
		$.ajax({
		type: "GET",
		url: "http://forex.cbm.gov.mm/api/latest",
		processData: false,
		contentType: false,
		data : "{{csrf_token()}} ",
		cache: false,
		timeout: 800000,
		success: function (data) {
			console.log(data);
		},
	});
	});
</script>
@endsection