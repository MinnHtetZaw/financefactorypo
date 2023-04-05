@extends('master')
@section('title','Create Product')
@section('link','Create Product')
@section('content')
<style type="text/css">
	.error{
        outline: 1px solid red;
	}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
<!-- New Product Create -->

<div class="row">
	<div class="col-md-6">
		<div class="card">
			<div class="card-shadow">
				<div class="card-header bg-info">

					<h5>Product Registration Form</h5>

				</div>
				<div class="card-body">
				<!-- Data -->
				<form role="form" method="post" action="{{route('store_product')}}" enctype="multipart/form-data">
	  			@csrf
				  <input type="hidden" id="primary_sup" name="primary_sup">
				  <input type="hidden" id="secondary_sup" name="secondary_sup">
				<div class="form-group">
				<label>Department</label>
				<select class="form-control" name="department_id" >
				<option selected="selected">Select Department</option>

				
					<option value="1">Department One</option>
				

				</select>
			</div>
			<div class="form-group">
				<label>Category</label>
				<select class="form-control" name="category_id" id="category" >
					<option selected="selected">Select Category</option>

                    @foreach ($category as $cate)
                    <option value="{{$cate->id}}">{{$cate->category_name}}</option>
                    @endforeach

				</select>
			</div>
			<div class="form-group">
				<label>Sub Category</label>
				<select class="form-control" name="subcategory_id" id="subcategory" >
					<option selected="selected">Select SubCategory</option>

                    @foreach ($subcategory as $subcate)
                    <option value="{{$subcate->id}}">{{$subcate->name}}</option>
                    @endforeach

				</select>
			</div>
			<div class="form-group">
				<label>Brand</label>
				<select class="form-control" name="brand_id" >
					<option selected="selected">Select Brand</option>
					@foreach($brand as $brands)
                    <option value="{{$brands->id}}">{{$brands->name}}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label for="name">Name</label>
				<input type="text" class="form-control" id="name" name="name" placeholder="Enter Your Product Name" >
			</div>
			<div class="form-group">
				<label for="name">Part Number</label>
				<input type="text" class="form-control" id="part" name="part" placeholder="Enter Your Product Name" >
			</div>
			<!-- <div class="form-group">
				<label for="name">Part Number</label>
				<input type="text" class="form-control" id="part" name="part" placeholder="Enter Your Product Name">
			</div> -->
			<div class="form-group">
				<label for="name">Mearsuring Unit</label>
				<input type="text" class="form-control" id="measuring_unit" name="measuring_unit" placeholder="Enter Unit Name" >
				</div>
			
			<div class="form-group">
				<label>Register Date:</label>

				<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
					<i class="far fa-calendar-alt"></i>
					</span>
				</div>
				<input type="date" name="reg_date" class="form-control float-right" >
				</div>
			</div>
			<div class="form-group">
				<label>Description</label><br>
				<textarea name="description" placeholder="Describe yourself here..." rows="5" cols="75" ></textarea>
	      	</div>

				<!-- End Data -->
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="card">
			<div class="card-shadow">
				<div class="card-header bg-info">

				</div>
				<div class="card-body">
				<!-- Data -->
				<div class="row">
					<div class="col-md-4 offset-md-2">
					<div class="form-check form-check-inline col-md-4" id="">
						<input class="form-check-input" type="radio" name="exist_asset" id="sell" value="1" >
						<label class="form-check-label text-success" for="sell">Instock</label>
					</div>
					</div>
					<div class="col-md-4">
					<div class="form-check form-check-inline col-md-4" id="">
						<input class="form-check-input" type="radio" name="exist_asset" id="end" value="2" >
						<label class="form-check-label text-success" for="end">Reorder</label>
					</div>
					</div>
				</div>
				<div class="form-group">
				<label for="name">Moq Price</label>
				<input type="text" class="form-control" id="moq_price" name="moq_price" placeholder="100000" >

			</div>
				<div class="form-group">
				<label for="name">Minimum Order Quantity</label>
				<input type="text" class="form-control" id="minimum_order_qty" name="minimum_order_qty" placeholder="1" >
			</div>
			<div class="form-group">
				<label for="name">In-Stock Qty</label>
				<input type="number" class="form-control" id="stock_qty" name="stock_qty" placeholder="Enter Stock Quantity" >
			</div>
			<div class="form-group">
				<label for="name">Reorder Quantity</label>
				<input type="text" class="form-control" id="reorder_qty" name="reorder_qty" placeholder="1" >
			</div>
			<div class="form-group" id="pri_supplierspace">
				<label>Primary Supplier</label>


				

				<select class="form-control" name="pri_supplier_id" id="primarysupplier" data-placeholder="Select Primary Supplier" onchange="primary_modal(this.value)" >
				<option>Select Primary Supplier</option>

				@foreach($supplier as $sup)
				<option value="{{$sup->id}}">{{$sup->company_name}}</option>
				@endforeach
				</select>

				

			</div>
			<div class="form-group" id="multiple_brand">
              <label>Secondary Supplier:</label>
              <div class="select2-purple">

                <select class="select2" id="select2" multiple="multiple"  name="secondary[]" data-placeholder="Select Secondary Supplier" onchange="secondary_modal()"  style="width: 100%;margin-top:70px" >
				<option>Select Secondry Supplier</option>
                  @foreach($supplier as $sup)
                  <option value="{{$sup->id}}" >{{$sup->company_name}}</option>

                  @endforeach
                </select>
               </div>

            </div>
			

			<!-- <div class="form-group">
				<label for="name">Moq Price</label>
				<input type="text" class="form-control" id="sell_price" name="sell_price" placeholder="100000">
			</div> -->
			<div class="form-group">
				<label for="name">Product Photo</label>
				<input type="file" class="form-control" id="photo" name="photo" >
			</div>

				<!-- End Data -->

				</div>
				<div class="card-footer">
				<button type="submit" class="btn btn-primary btn-block" onclick="clear_local()">Submit</button>
				</div>
				<!-- Begin Primary Supplier Modal -->
@foreach($supplier as $sup)
<div class="modal fade bd-example-modal-lg" id="primary{{$sup->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
		<div class="modal-header bg-info text-white">
			<h5>Primary Supplier ({{$sup->company_name}}) Product Detail Comparison Dialog</h5>
		</div>
		<div class="modal-body">
			<div class="row offset-md-1">
				<div class="col-md-8">
					<div class="form-group" id="pri_supplierspace">
						<label class="text-info">Choose To Adding</label>
						
						<select class="form-control" name="add_type" id="add_type{{$sup->id}}">
						<option value="0">Select Adding Type</option>
						
						<option value="1">Discount</option>
						
						<option value="3">Lead Time</option>
						<option value="2">Credit</option>
						</select>
						
					</div>
				</div>
				<div class="col-md-4" style="margin-top:32px;">
					<button type="button" class="btn btn-warning text-white" onclick="add_supplier_type('{{$sup->id}}')">Add</button>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-md-7">
					<div class="form-group">
						<label for="name">Unit Purchase Price</label>
						<input type="text" class="form-control" id="unit_pur_price{{$sup->id}}" name="unit_pur_price" placeholder="1000" >
					</div>
					<div class="form-group" id="incoterm_type">
						<label>Incoterm Type</label>
						
						<select class="form-control" name="incoterm" id="incoterm{{$sup->id}}" >
						<option selected="selected">Select Incoterm Type</option>
						@foreach($incoterm as $inc)
						<option value="{{$inc->id}}">{{$inc->incoterm_name}}</option>
						@endforeach
						</select>
						
						
					</div>
					<div class="form-group">
						<label for="name">MOQ Qty</label>
						<input type="number" class="form-control" id="moq_qty{{$sup->id}}" name="moq_qty" >
					</div>
					<div class="form-group">
						<label for="name">Initial Purchase Amount</label>
						<input type="number" class="form-control" id="initial_pur_amt{{$sup->id}}" name="initial_pur_amt" >
					</div>
					<span id="add_type_one{{$sup->id}}"></span>
				</div><!-- first col end in row -->
				<div class="col-md-5">
					<div class="form-group">
						<label for="name">Currency Type</label>
						<select style="margin-top:5px" class="form-control" name="currency" id="currency{{$sup->id}}" data-placeholder="Select Primary Supplier" >
						<option value="0">Select Currency Type</option>
						<option value="1">MMK</option>
						<option value="2">USD</option>
						</select>
					</div>
					
					
					<div class="form-group">
						<label for="name">Last Purchase Date</label>
						<input type="date" class="form-control" id="last_pur_date{{$sup->id}}" name="last_pur_date" >
					</div>
					
					<div class="form-group">
						<label for="name">MOQ Price</label>
						<input type="number" class="form-control" id="moq_price{{$sup->id}}" name="moq_price" >
					</div>
					<div class="form-group">
						<label for="name">Initial Purchase Qty</label>
						<input type="number" class="form-control" id="initial_pur_qty{{$sup->id}}" name="initial_pur_qty" >
					</div>
					<span id="add_type_two{{$sup->id}}"></span>
				</div><!-- second col end in row -->
			</div>
		</div>
		<div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="store_primary('{{$sup->id}}')">Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      	</div>
    </div>
  </div>
</div>
@endforeach
<!-- End Primary Modal  -->

<!-- Begin Secondary Supplier Modal -->
@foreach($supplier as $sup)
<div class="modal fade bd-example-modal-lg" id="secondary{{$sup->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
		<div class="modal-header bg-info text-white">
			<h5>Secondary Supplier ({{$sup->company_name}}) Product Detail Comparison Dialog</h5>
		</div>
		<div class="modal-body">
			<div class="row offset-md-1">
				<div class="col-md-8">
					<div class="form-group" id="pri_supplierspace">
						<label class="text-info">Choose To Adding</label>
						
						<select class="form-control" name="add_type" id="sec_add_type{{$sup->id}}">
						<option value="0">Select Adding Type</option>
						
						<option value="1">Discount</option>
						
						<option value="3">Lead Time</option>
						<option value="2">Credit</option>
						</select>
						
					</div>
				</div>
				<div class="col-md-4" style="margin-top:32px;">
					<button type="button" class="btn btn-warning text-white" onclick="add_secondary_supplier_type('{{$sup->id}}')">Add</button>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-md-7">
					<div class="form-group">
						<label for="name">Unit Purchase Price</label>
						<input type="text" class="form-control" id="sec_unit_pur_price{{$sup->id}}" name="unit_pur_price[]" placeholder="1000">
						<input type="hidden" name="secondary[]">
					</div>
					<div class="form-group">
						<label>Incoterm Type</label>
						
						<select class="form-control" name="incoterm" id="sec_incoterm{{$sup->id}}">
						<option selected="selected">Select Incoterm Type</option>
						@foreach($incoterm as $inc)
						<option value="{{$inc->id}}">{{$inc->incoterm_name}}</option>
						@endforeach
						</select>
						
					</div>
					<div class="form-group">
						<label for="name">MOQ Qty</label>
						<input type="number" class="form-control" id="sec_moq_qty{{$sup->id}}" name="moq_qty" >
					</div>
					<div class="form-group">
						<label for="name">Initial Purchase Amount</label>
						<input type="number" class="form-control" id="sec_initial_pur_amt{{$sup->id}}" name="initial_pur_amt" >
					</div>
					<span id="sec_add_type_one{{$sup->id}}"></span>
				</div><!-- first col end in row -->
				<div class="col-md-5">
					<div class="form-group">
						<label for="name">Currency Type</label>
						<select style="margin-top:5px" class="form-control" name="currency" id="sec_currency{{$sup->id}}" data-placeholder="Select Primary Supplier" >
						<option selected="selected">Select Currency Type</option>
						<option value="1">MMK</option>
						<option value="2">USD</option>
						</select>
					</div>
					
					
					<div class="form-group">
						<label for="name">Last Purchase Date</label>
						<input type="date" class="form-control" id="sec_last_pur_date{{$sup->id}}" name="last_pur_date" >
					</div>
					
					<div class="form-group">
						<label for="name">MOQ Price</label>
						<input type="number" class="form-control" id="sec_moq_price{{$sup->id}}" name="moq_price" >
					</div>
					<div class="form-group">
						<label for="name">Initial Purchase Qty</label>
						<input type="number" class="form-control" id="sec_initial_pur_qty{{$sup->id}}" name="initial_pur_qty" >
					</div>
					<span id="sec_add_type_two{{$sup->id}}"></span>
				</div><!-- second col end in row -->
			</div>
		</div>
		<div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="store_secondary_supplier_type()">Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      	</div>
    </div>
  </div>
</div>
@endforeach
<!-- End Secondary Modal  -->
</form>
			</div>
		</div>
	</div>
</div>



<!-- End Product Create -->





  <!-- </form>
</div> -->
<!-- /.card -->
<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Select2 -->
<script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script type="text/javascript">

$('.select2').select2();

// $('.select2').select2({
//         dropdownParent: $('#secondary'),
        
//     });

$("input[data-bootstrap-switch]").each(function(){
  $(this).bootstrapSwitch('state', $(this).prop('checked'));
});
</script>

<script type="text/javascript">

    function getSubCategory(category_id){


    	    $.ajax({

               type:'POST',

               url:'/getSubCategory',

               data:{
               	"_token":"{{csrf_token()}}",
               	"category_id":category_id,
               },

               success:function(data){
                 $('#subcategory').empty();
				 $('#subcategory').append($('<option>').attr('value',0).text("Seclect SubCategory"));
               	$.each(data.subcategories,function(i,sub){

               	    $('#subcategory').append($('<option>').attr('value',sub.id).text(sub.name));
               	})
               }

            });
    	}

	function getSupplier(brand_id)
	{
		// alert(brand_id);
		$.ajax({

				type:'POST',

				url:'/getSupplierName',

				data:{
					"_token":"{{csrf_token()}}",

					"brand_id":brand_id,

				},

				success:function(data){
				$('#supplier').empty();
					var i=0;
					var htmlsupplier = "";
					var htmlsec = "";
					var htmlin = "";
					// for(i=0;i<=data.supplier_name.length;i++)
					// {
					// 	htmlsupplier+=`
					// 	<label>Primary Supplier js</label>
			        //     <select class="form-control" name="pri_supplier_id" id="supplier">
			        htmlin += `<option selected="selected">Select Supplier</option>`;
					  for(i=0;i<data.supplier_name.length;i++)

					{
						htmlsupplier+=`

			            <option value="${data.supplier_id[i]}">${data.supplier_name[i]}</option>`;
					}
			        //  htmlsupplier +=`
			        // </select>


					// 	`;
					// }
					$('#supplier').append(htmlin);
					$('#supplier').append(htmlsupplier);



				$('#sec_supplierspace').empty();
				$.each(data.all_supplier,function(i,allsup){
               	    // alert(allsup.name);
               	    $('#sec_supplierspace').append($('<option>').attr('value',allsup.id).text(allsup.name));
               	})


				}

			});
	}

	function add_basic_unit(){
		$('#basic_unit').slideDown('slow');
		$('#basic_unit').append($('<label>').text('Mearsuring Unit'));
		$('#basic_unit').append($('<input>').attr('type','text').addClass('form-control').attr('name','measuring_unit').attr('placeholder','Enter Unit Name').attr('id','measuring_unit'));

		$('#basic_unit').append($('<label>').text('Quantity'));
		$('#basic_unit').append($('<input>').attr('type','number').addClass('form-control').attr('name','stock_qty').attr('placeholder','1').attr('id','stock_qty'));

		$('#basic_unit').append($('<label>').text('Minimum Order Quantity'));
		$('#basic_unit').append($('<input>').attr('type','number').addClass('form-control').attr('name','minimum_order_qty').attr('placeholder','1').attr('id','minimum_order_qty'));

		$('#basic_unit').append($('<label>').text('Reorder Quantity'));
		$('#basic_unit').append($('<input>').attr('type','number').addClass('form-control').attr('name','reorder_qty').attr('placeholder','1').attr('id','reorder_qty'));

		//Purchase Price Form
		$('#basic_unit').append($('<label>').text('Purchase Price'));
		$('#basic_unit').append($('<div>').addClass('row').attr('id','row'));
		$('#row').append($('<div>').addClass('col-md-6').attr('id','row2'));
		$('#row').append($('<div>').addClass('col-md-6').attr('id','row3'));
		$('#row2').append($('<input>').attr('type','number').addClass('form-control').attr('name','purchase_price').attr('placeholder','10000').attr('id','purchase_price'));
		$('#row3').append($('<select>').addClass('form-control').attr('name','purchase_price_currency').attr('id','purchase_price_currency'));
		$('#purchase_price_currency').append($('<option>').attr('value','USD').text('USD'));
		$('#purchase_price_currency').append($('<option>').attr('value','MMK').text('MMK'));


		//Retail Price Form
		$('#basic_unit').append($('<label>').text('Retail Price'));
		$('#basic_unit').append($('<div>').addClass('row').attr('id','retail_row'));
		$('#retail_row').append($('<div>').addClass('col-md-6').attr('id','retail_row2'));
		$('#retail_row').append($('<div>').addClass('col-md-6').attr('id','retail_row3'));
		$('#retail_row2').append($('<input>').attr('type','number').addClass('form-control').attr('name','retail_price').attr('placeholder','11000').attr('id','retail_price'));
		$('#retail_row3').append($('<select>').addClass('form-control').attr('name','retail_price_currency').attr('id','retail_price_currency'));
		$('#retail_price_currency').append($('<option>').attr('value','USD').text('USD'));
		$('#retail_price_currency').append($('<option>').attr('value','MMK').text('MMK'));

		//Wholesale Price Form
		$('#basic_unit').append($('<label>').text('Wholesale Price'));
		$('#basic_unit').append($('<div>').addClass('row').attr('id','wholesale_row'));
		$('#wholesale_row').append($('<div>').addClass('col-md-6').attr('id','wholesale_row2'));
		$('#wholesale_row').append($('<div>').addClass('col-md-6').attr('id','wholesale_row3'));
		$('#wholesale_row2').append($('<input>').attr('type','number').addClass('form-control').attr('name','wholesale_price').attr('placeholder','10500').attr('id','wholesale_price'));
		$('#wholesale_row3').append($('<select>').addClass('form-control').attr('name','wholesale_price_currency').attr('id','wholesale_price_currency'));
		$('#wholesale_price_currency').append($('<option>').attr('value','USD').text('USD'));
		$('#wholesale_price_currency').append($('<option>').attr('value','MMK').text('MMK'));

		$.each(discount_types,function(i,v){
			$('#discount_type').append($('<option>').attr('value',v.id).text(v.name));
		});

	};

	function extra_unit(){
		$('#extra_unit').empty();
		var html = '';
		var measuring_unit = $("input[name=measuring_unit]").val();
		var stock_qty = $("input[name=stock_qty]").val();
		var reorder_qty = $("input[name=reorder_qty]").val();
		var purchase_price = $("input[name=purchase_price]").val();
		var retail_price = $("input[name=retail_price]").val();
		var wholesale_price = $("input[name=wholesale_price]").val();

		    if($.trim(measuring_unit) == '' || $.trim(stock_qty) == '' || $.trim(reorder_qty) == '' || $.trim(purchase_price) == '' || $.trim(retail_price) == '' || $.trim(wholesale_price) == '' ) {

		          	swal({
		          		title:"Failed!",
	             		text:"Please fill all basic unit Field",
	             		icon:"info",
		          	});


		    }else{
		    	// $('#extra_unit').empty();

		    	$('#extra_unit').append($('<label>').text('Mearsuring Unit'));
				$('#extra_unit').append($('<input>').attr('type','text').addClass('form-control').attr('name','extra_measuring_unit').attr('placeholder','Enter Unit Name').attr('id','extra_measuring_unit'));

				$('#extra_unit').append($('<label>').text('Basic Unit Quantity'));
				$('#extra_unit').append($('<input>').attr('type','number').addClass('form-control').attr('name','basic_unit_qty').attr('placeholder','1').attr('id','basic_unit_qty'));

				$('#extra_unit').append($('<label>').text('Quantity'));
				$('#extra_unit').append($('<input>').attr('type','number').addClass('form-control').attr('name','extra_stock_qty').attr('placeholder','1').attr('id','extra_stock_qty'));

				$('#extra_unit').append($('<label>').text('Reorder Quantity'));

				$('#extra_unit').append($('<input>').attr('type','number').addClass('form-control').attr('name','extra_reorder_qty').attr('placeholder','1').attr('id','reorder_qty'));

				//Extra Purchase Price Form
				$('#extra_unit').append($('<label>').text('Purchase Price'));
				$('#extra_unit').append($('<div>').addClass('row').attr('id','extra_row'));
				$('#extra_row').append($('<div>').addClass('col-md-6').attr('id','extra_row_row2'));
				$('#extra_row').append($('<div>').addClass('col-md-6').attr('id','extra_row_row3'));
				$('#extra_row_row2').append($('<input>').attr('type','number').addClass('form-control').attr('name','extra_purchase_price').attr('placeholder','10000').attr('id','extra_purchase_price'));
				$('#extra_row_row3').append($('<select>').addClass('form-control').attr('name','extra_purchase_price_currency').attr('id','extra_purchase_price_currency'));
				$('#extra_purchase_price_currency').append($('<option>').attr('value','USD').text('USD'));
				$('#extra_purchase_price_currency').append($('<option>').attr('value','MMK').text('MMK'));

				//Extra Retail Price Currency
				$('#extra_unit').append($('<label>').text('Retail Price'));
				$('#extra_unit').append($('<div>').addClass('row').attr('id','extra_retail_row'));
				$('#extra_retail_row').append($('<div>').addClass('col-md-6').attr('id','extra_retail_row2'));
				$('#extra_retail_row').append($('<div>').addClass('col-md-6').attr('id','extra_retail_row3'));
				$('#extra_retail_row2').append($('<input>').attr('type','number').addClass('form-control').attr('name','extra_retail_price').attr('placeholder','11000').attr('id','extra_retail_price'));
				$('#extra_retail_row3').append($('<select>').addClass('form-control').attr('name','extra_retail_price_currency').attr('id','extra_retail_price_currency'));
				$('#extra_retail_price_currency').append($('<option>').attr('value','USD').text('USD'));
				$('#extra_retail_price_currency').append($('<option>').attr('value','MMK').text('MMK'));

				//Extra Wholesale Currency
				$('#extra_unit').append($('<label>').text('Wholesale Price'));
				$('#extra_unit').append($('<div>').addClass('row').attr('id','extra_wholesale_row'));
				$('#extra_wholesale_row').append($('<div>').addClass('col-md-6').attr('id','extra_wholesale_row2'));
				$('#extra_wholesale_row').append($('<div>').addClass('col-md-6').attr('id','extra_wholesale_row3'));
				$('#extra_wholesale_row2').append($('<input>').attr('type','number').addClass('form-control').attr('name','extra_wholesale_price').attr('placeholder','10500').attr('id','extra_wholesale_price'));
				$('#extra_wholesale_row3').append($('<select>').addClass('form-control').attr('name','extra_wholesale_price_currency').attr('id','extra_wholesale_price_currency'));
				$('#extra_wholesale_price_currency').append($('<option>').attr('value','USD').text('USD'));
				$('#extra_wholesale_price_currency').append($('<option>').attr('value','MMK').text('MMK'));

				$('#extra_unit').append($('<label>').text('Discount Type'));
				$('#extra_unit').append($('<select>').addClass('form-control').attr('name','extra_discount_type').attr('id','extra_discount_type'));
				$.each(discount_types,function(i,v){
					$('#extra_discount_type').append($('<option>').attr('value',v.id).text(v.name));
				});

				/*$('#extra_unit').append($('<label>').text('Discount'));
				$('#extra_unit').append($('<input>').attr('type','checkbox').attr('name','extra_discount_flag').attr('checked').attr('data-bootstrap-switch').attr('id','extra_discount_flag'));*/

				$('#extra_unit').append($('<a>').attr('type','submit').addClass('form-control btn btn-primary mt-2 btn-submit').attr('value','Add Extra Unit').text('Add Extra Unit').attr('onclick','addExtraUnit()'));


		    }
	}
	var extra_units = [];

	function addExtraUnit(){

		if(extra_units.length < 5){
			var extra_measuring_unit = $('input[name=extra_measuring_unit]').val();
			var basic_unit_qty = $('input[name=basic_unit_qty]').val();
			var extra_stock_qty = $('input[name=extra_stock_qty]').val();
			var extra_reorder_qty = $('input[name=extra_reorder_qty]').val();
			var extra_purchase_price = $('input[name=extra_purchase_price]').val();
			var extra_retail_price = $('input[name=extra_retail_price]').val();
			var extra_wholesale_price = $('input[name=extra_wholesale_price]').val();
			var extra_retail_price_currency = $('select[name=extra_retail_price_currency]').val();
			var extra_wholesale_price_currency = $('select[name=extra_wholesale_price_currency]').val();

			var extra = {extra_measuring_unit:extra_measuring_unit,basic_unit_qty:basic_unit_qty,extra_stock_qty:extra_stock_qty,extra_reorder_qty:extra_reorder_qty,extra_purchase_price:extra_purchase_price,extra_retail_price:extra_retail_price,extra_wholesale_price:extra_wholesale_price,extra_retail_price_currency:extra_retail_price_currency,extra_wholesale_price_currency:extra_wholesale_price_currency};

			extra_units.push(extra);
				$('#extra_unit_list').append($('<span>').text('Mearsuring Unit : '));
				$('#extra_unit_list').append($('<span>').text(extra.extra_measuring_unit).addClass('mr-5'));

				$('#extra_unit_list').append($('<span>').text('Stock Quantity : '));
				$('#extra_unit_list').append($('<span>').text(extra.extra_stock_qty));
				$('#extra_unit_list').append($('<br>'));
			var unit = JSON.stringify(extra_units);
			$('#add_extra_unit').attr('value',unit);
		}else{
			swal({

				title : "Notice !",
				text : "You can't add more than 5 Extra Unit",
				icon : "info",

			});
		}

	}
	function getBrand(sub_id)
    {
        // alert("success");
    $.ajax({

    type:'POST',

    url:'/getBrand',

    data:{
        "_token":"{{csrf_token()}}",

        "sub_id":sub_id,

    },

    success:function(data){
    $('#brandplace').empty();
	$('#brandplace').append($('<option>').attr('value',0).text("Select Brand"));
        $.each(data,function(i,allbrand){
            // alert(allsup.name);

            $('#brandplace').append($('<option>').attr('value',allbrand.id).text(allbrand.name));
        })
    }
})
}

	$(".btn-submit").click(function(e){

		// swal({

		// 		title : "Successful",
		// 		text : "Added Product",
		// 		icon : "success",

		// 	});

	})
function primary_modal(supplier_id)
{

	// alert("hmodal");
	$('#primarysupplier').find('option').not(':selected').each(function(k,v){
		if(k!=0)
		{
			// alert("cancel"+v.value);
			var suppliercart = localStorage.getItem('suppliercart');
			var suppliercartobj = JSON.parse(suppliercart);
			
			// alert("inlocal"+suppliercartobj[0].id);
			if (localStorage.getItem('suppliercart') === null) {
				// alert('no');
			}
			else
			{
				if(suppliercartobj[0].id == v.value)
				{
					// alert(suppliercartobj.index);
					const index = suppliercartobj.findIndex(item => item.id === suppliercartobj[0].id);
					// alert("index ="+index);
					suppliercartobj.splice(index,1);
					localStorage.setItem('suppliercart',JSON.stringify(suppliercartobj));
					// if(suppliercartobj.length == 0)
					// {

					// }
				}
			}
			
		}
	});
	
	
	

	$('#primary'+supplier_id).modal('show');
}
var dif = 0;
function secondary_modal()
{
	// alert(dif);
	var supplier_id = $('#select2').val();
	// alert(supplier_id.length);
	for(var i=dif;i<supplier_id.length;i++)
	{
		// alert(supplier_id[i]);
		$('#secondary'+supplier_id[i]).modal('show');
	}
	dif++;
}
// var count = 0;
function add_supplier_type(supplier_id)
{
	// alert("hello");
	// count ++;
	var value = $('#add_type'+supplier_id).val();
	// alert(value);
	var htmlone = "",htmltwo = "",
	htmlthree = "";
	if(value == 1)
	{
		htmlone +=`
		<div class="form-group">
			<label for="name">Discount Amount</label>
			<input type="number" class="form-control" id="dis_amt${supplier_id}" name="dis_amt" placeholder="1000">
		</div>
		<div class="form-group">
			<label for="name">Discount Condition</label>
			<input type="text" class="form-control" id="dis_cond${supplier_id}" name="dis_cond">
		</div>
		`;
		
		htmltwo +=`
		<div class="form-group">
			<label>Discount Type</label>
			
			<select class="form-control" name="dis_type" id="dis_type${supplier_id}" style="margin-top:4px" >
			<option value="0">Select Discount Type</option>
			<option value="1">No Discount</option>
			<option value="2">Percentage%</option>
			<option value="3">Amount</option>
			<option value="4">FOC</option>
			<option value="5">Delivery Fees</option>
			</select>
			
			
		</div>
		<div class="form-group">
			<label style="margin-top:5px">Discount Condition Type</label>
			
			<select class="form-control" name="dis_con_type" id="dis_con_type${supplier_id}" style="margin-top:2px" >
			<option value="0">Select Discount Condition Type</option>
			<option value="1">Purchase Qty</option>
			<option value="2">Purchase Amount</option>
			<option value="3">Purchase Time</option>
			</select>
			
		</div>
		`;
		$('#add_type_one'+supplier_id).append(htmlone);
		$('#add_type_two'+supplier_id).append(htmltwo);
		$('#add_type option[value=1]').attr("disabled","disabled");
		$('#add_type option[value=0]').attr("selected","selected");
	}
	else if(value == 2)
	{
		htmlone +=`
		<div class="form-group">
			<label for="name">Credit Term</label>
			<input type="text" class="form-control" id="credit_term${supplier_id}" name="credit_term">
		</div>
		<div class="form-group">
			<label for="name">Credit Condition</label>
			<input type="text" class="form-control" id="credit_con${supplier_id}" name="credit_con">
		</div>
		<div class="form-group">
			<label for="name">Credit Amount</label>
			<input type="number" class="form-control" id="credit_amt${supplier_id}" name="credit_amt">
		</div>
		`;
		htmltwo +=`
		<div class="form-group">
			<label style="margin-top:5px">Credit Term Type</label>
			
			<select class="form-control" name="credit_term_type" id="credit_term_type${supplier_id}" style="margin-top:2px" >
			<option value="0">Select Credit Term Type</option>
			<option value="1">No Credit</option>
			<option value="2">Day</option>
			<option value="3">Week</option>
			<option value="4">Month</option>
			</select>
			
		</div>
		<div class="form-group">
			<label style="margin-top:5px">Credit Condition Type</label>
			
			<select class="form-control" name="credit_con_type" id="credit_con_type${supplier_id}" style="margin-top:2px" >
			<option value="0">Select Credit Condition Type</option>
			<option value="1">Purchase Qty</option>
			<option value="2">Purchase Amount</option>
			<option value="3">Purchase Time</option>
			</select>
			
		</div>


		`;
		$('#add_type_one'+supplier_id).append(htmlone);
		$('#add_type_two'+supplier_id).append(htmltwo);
		$('#add_type option[value=2]').attr("disabled","disabled");
		$('#add_type option[value=0]').attr("selected","selected");
	}
	else if(value == 3)
	{
		htmlone +=`
		<div class="form-group">
			<label for="name">Delivery Lead Time</label>
			<input type="number" class="form-control" id="deli_lead" name="deli_lead">
		</div>

		`;
		htmltwo +=`
		<div class="form-group">
			<label style="margin-top:5px" >Lead Time Type</label>
			
			<select class="form-control" name="lead_type" id="lead_type" style="" >
			<option value="0">Select Discount Type</option>
			
			<option value="1">Day</option>
			<option value="2">Week</option>
			<option value="3">Month</option>
			
			</select>
			
		</div>
		`;
		$('#add_type_one'+supplier_id).append(htmlone);
		$('#add_type_two'+supplier_id).append(htmltwo);
		$('#add_type option[value=3]').attr("disabled","disabled");
		$('#add_type option[value=0]').attr("selected","selected");
	}
	// alert(count);
}
function add_secondary_supplier_type(supid)
{
	// alert(supid);
	// count ++;
	var value = $('#sec_add_type'+supid).val();
	// alert(value);
	var htmlone = "",htmltwo = "",
	htmlthree = "";
	if(value == 1)
	{
		htmlone +=`
		<div class="form-group">
			<label for="name">Discount Amount</label>
			<input type="number" class="form-control" id="sec_dis_amt${supid}" name="dis_amt" placeholder="1000">
		</div>
		<div class="form-group">
			<label for="name">Discount Condition</label>
			<input type="text" class="form-control" id="sec_dis_cond${supid}" name="dis_cond">
		</div>
		`;
		
		htmltwo +=`
		<div class="form-group">
			<label>Discount Type</label>
			
			<select class="form-control" name="dis_type" id="sec_dis_type${supid}" style="margin-top:4px" >
			<option value="0">Select Discount Type</option>
			<option value="1">No Discount</option>
			<option value="2">Percentage%</option>
			<option value="3">Amount</option>
			<option value="4">FOC</option>
			<option value="5">Delivery Fees</option>
			</select>
		
		</div>
		<div class="form-group">
			<label style="margin-top:5px">Discount Condition Type</label>
			
			<select class="form-control" name="dis_con_type" id="sec_dis_con_type${supid}" style="margin-top:2px" >
			<option value="0">Select Discount Condition Type</option>
			<option value="1">Purchase Qty</option>
			<option value="2">Purchase Amount</option>
			<option value="3">Purchase Time</option>
			</select>
			
		</div>
		`;
		$('#sec_add_type_one'+supid).append(htmlone);
		$('#sec_add_type_two'+supid).append(htmltwo);
		$('#add_type option[value=1]').attr("disabled","disabled");
		$('#add_type option[value=0]').attr("selected","selected");
	}
	else if(value == 2)
	{
		htmlone +=`
		<div class="form-group">
			<label for="name">Credit Term</label>
			<input type="text" class="form-control" id="sec_credit_term${supid}" name="credit_term">
		</div>
		<div class="form-group">
			<label for="name">Credit Condition</label>
			<input type="text" class="form-control" id="sec_credit_con${supid}" name="credit_con">
		</div>
		<div class="form-group">
			<label for="name">Credit Amount</label>
			<input type="number" class="form-control" id="sec_credit_amt${supid}" name="credit_amt">
		</div>
		`;
		htmltwo +=`
		<div class="form-group">
			<label style="margin-top:5px">Credit Term Type</label>
			
			<select class="form-control" name="credit_term_type" id="sec_credit_term_type${supid}" style="margin-top:2px" >
			<option value="0">Select Credit Term Type</option>
			<option value="1">No Credit</option>
			<option value="2">Day</option>
			<option value="3">Week</option>
			<option value="4">Month</option>
			</select>
			
		</div>
		<div class="form-group">
			<label style="margin-top:5px">Credit Condition Type</label>
			
			<select class="form-control" name="credit_con_type" id="sec_credit_con_type${supid}" style="margin-top:2px" >
			<option value="0">Select Credit Condition Type</option>
			<option value="1">Purchase Qty</option>
			<option value="2">Purchase Amount</option>
			<option value="3">Purchase Time</option>
			</select>
			
		</div>



		`;
		$('#sec_add_type_one'+supid).append(htmlone);
		$('#sec_add_type_two'+supid).append(htmltwo);
		$('#add_type option[value=2]').attr("disabled","disabled");
		$('#add_type option[value=0]').attr("selected","selected");
	}
	else if(value == 3)
	{
		htmlone +=`
		<div class="form-group">
			<label for="name">Delivery Lead Time</label>
			<input type="number" class="form-control" id="sec_deli_lead${supid}" name="deli_lead">
		</div>

		`;
		htmltwo +=`
		<div class="form-group">
			<label style="margin-top:5px" >Lead Time Type</label>
			
			<select class="form-control" name="lead_type" id="sec_lead_type${supid}" style="" >
			<option value="0">Select Discount Type</option>
			
			<option value="1">Day</option>
			<option value="2">Week</option>
			<option value="3">Month</option>
			
			</select>
			
		</div>
		`;
		$('#sec_add_type_one'+supid).append(htmlone);
		$('#sec_add_type_two'+supid).append(htmltwo);
		$('#add_type option[value=3]').attr("disabled","disabled");
		$('#add_type option[value=0]').attr("selected","selected");
	}
	// alert(count);
}
function store_primary(supplier_id)
{
	var unit_pur_price = $('#unit_pur_price'+supplier_id).val();
	var incoterm = $('#incoterm'+supplier_id).val();
	var moq_qty = $('#moq_qty'+supplier_id).val();
	var initial_pur_amt = $('#initial_pur_amt'+supplier_id).val();
	var currency_type = $('#currency'+supplier_id).val();
	var last_pur_date = $('#last_pur_date'+supplier_id).val();
	var moq_price = $('#moq_price'+supplier_id).val();
	var initial_pur_qty = $('#initial_pur_qty'+supplier_id).val();
	var dis_amt = $('#dis_amt'+supplier_id).val();
	var dis_cond = $('#dis_cond'+supplier_id).val();
	var dis_type = $('#dis_type'+supplier_id).val();
	var dis_con_type = $('#dis_con_type'+supplier_id).val();
	var credit_term = $('#credit_term'+supplier_id).val();
	var credit_con = $('#credit_con'+supplier_id).val();
	var credit_amt = $('#credit_amt'+supplier_id).val();
	var credit_term_type = $('#credit_term_type'+supplier_id).val();
	var credit_condition_type = $('#credit_con_type'+supplier_id).val();
	var deli_lead_time = $('#deli_lead'+supplier_id).val();
	var lead_time_type = $('#lead_type'+supplier_id).val();
	var supplier = {id:supplier_id,
		unit_pur_price:unit_pur_price,
		incoterm:incoterm,
		moq_qty:moq_qty,
		initial_pur_amt:initial_pur_amt,
		currency_type:currency_type,
		last_pur_date:last_pur_date,
		moq_price:moq_price,
		initial_pur_qty:parseInt(initial_pur_qty),
		dis_amt:dis_amt,
		dis_cond:dis_cond,
		dis_type:dis_type,
		dis_cond_type:dis_con_type,
		credit_term:credit_term,
		credit_con:credit_con,
		credit_amt:credit_amt,
		credit_term_type:credit_term_type,
		credit_condition_type:credit_condition_type,
		deli_lead_time:deli_lead_time,
		lead_time_type:lead_time_type,
		supplier_flag:1
		};
	var suppliercart = localStorage.getItem('suppliercart');
		if(!suppliercart){
			suppliercart = '[]';
			}
	var suppliercartobj = JSON.parse(suppliercart);
	var hasid = false;
  
      $.each(suppliercartobj,function(i,v){
          // v.total_amount = total_amount;
      
          if(v.id == supplier_id)
          {
          hasid = true;
          
          }
      })
      if(!hasid){
          suppliercartobj.push(supplier);
      }
	  localStorage.setItem('suppliercart',JSON.stringify(suppliercartobj));
	  $('#primary'+supplier_id).modal('hide');
	  var suppliercart = localStorage.getItem('suppliercart');
	var suppliercartobj = JSON.parse(suppliercart);
	var sec = JSON.stringify(suppliercartobj);
	$('#primary_sup').val(sec);
}
var count = 0;
function store_secondary_supplier_type()
{
	// alert("secon");
	console.log("count"+count);
	var supplier_id = $('#select2').val();
	// alert("length"+supplier_id.length);
	console.log("length"+supplier_id.length);
	for(var i=count;i<supplier_id.length;i++)
	{
		alert(supplier_id[i]);
		var unit_pur_price = $('#sec_unit_pur_price'+supplier_id[i]).val();
	var incoterm = $('#sec_incoterm'+supplier_id[i]).val();
	var moq_qty = $('#sec_moq_qty'+supplier_id[i]).val();
	var initial_pur_amt = $('#sec_initial_pur_amt'+supplier_id[i]).val();
	var currency_type = $('#sec_currency'+supplier_id[i]).val();
	var last_pur_date = $('#sec_last_pur_date'+supplier_id[i]).val();
	var moq_price = $('#sec_moq_price'+supplier_id[i]).val();
	var initial_pur_qty = $('#sec_initial_pur_qty'+supplier_id[i]).val();
	var dis_amt = $('#sec_dis_amt'+supplier_id[i]).val();
	var dis_cond = $('#sec_dis_cond'+supplier_id[i]).val();
	var dis_type = $('#sec_dis_type'+supplier_id[i]).val();
	var dis_con_type = $('#sec_dis_con_type'+supplier_id[i]).val();
	var credit_term = $('#sec_credit_term'+supplier_id[i]).val();
	var credit_con = $('#sec_credit_con'+supplier_id[i]).val();
	var credit_amt = $('#sec_credit_amt'+supplier_id[i]).val();
	var credit_term_type = $('#sec_credit_term_type'+supplier_id[i]).val();
	var credit_condition_type = $('#sec_credit_con_type'+supplier_id[i]).val();
	var deli_lead_time = $('#sec_deli_lead'+supplier_id[i]).val();
	var lead_time_type = $('#sec_lead_type'+supplier_id[i]).val();
	var supplier = {id:parseInt(supplier_id[i]),
		unit_pur_price:unit_pur_price,
		incoterm:incoterm,
		moq_qty:moq_qty,
		initial_pur_amt:initial_pur_amt,
		currency_type:currency_type,
		last_pur_date:last_pur_date,
		moq_price:moq_price,
		initial_pur_qty:parseInt(initial_pur_qty),
		dis_amt:dis_amt,
		dis_cond:dis_cond,
		dis_type:dis_type,
		dis_cond_type:dis_con_type,
		credit_term:credit_term,
		credit_con:credit_con,
		credit_amt:credit_amt,
		credit_term_type:credit_term_type,
		credit_condition_type:credit_condition_type,
		deli_lead_time:deli_lead_time,
		lead_time_type:lead_time_type,
		supplier_flag:2
		};
	var sec_suppliercart = localStorage.getItem('sec_suppliercart');
		if(!sec_suppliercart){
			sec_suppliercart = '[]';
			}
	var sec_suppliercartobj = JSON.parse(sec_suppliercart);
	var hasid = false;
  
      $.each(sec_suppliercartobj,function(i,v){
          // v.total_amount = total_amount;
      
          if(v.id == supplier_id)
          {
          hasid = true;
          
          }
      })
      if(!hasid){
          sec_suppliercartobj.push(supplier);
      }
	  localStorage.setItem('sec_suppliercart',JSON.stringify(sec_suppliercartobj));
	  $('#secondary'+supplier_id[i]).modal('hide');
	   $('#sec_unit_pur_price').val("");
	$('#sec_incoterm').val("");
	 $('#sec_moq_qty').val("");
	  $('#sec_initial_pur_amt').val("");
	 $('#sec_currency').val("");
	  $('#sec_last_pur_date').val("");
	 $('#sec_moq_price').val("");
	  $('#sec_initial_pur_qty').val("");
	 $('#sec_dis_amt').val("");
	  $('#sec_dis_cond').val("");
	  $('#sec_dis_type').val("");
	 $('#sec_dis_con_type').val("");
	 $('#sec_credit_term').val("");
	 $('#sec_credit_con').val("");
	 $('#sec_credit_amt').val("");
	$('#sec_credit_term_type').val("");
	 $('#sec_credit_con_type').val("");
	 $('#sec_deli_lead').val("");
	  $('#sec_lead_type').val("");
	  alert("last");
	}
	count++;
	var sec_suppliercart = localStorage.getItem('sec_suppliercart');
	var sec_suppliercartobj = JSON.parse(sec_suppliercart);
	var sec = JSON.stringify(sec_suppliercartobj);
	$('#secondary_sup').val(sec);
	
}
function each_sup()
{
	alert("hello");
}
function clear_local()
{
	localStorage.clear();
}
</script>

@endsection

