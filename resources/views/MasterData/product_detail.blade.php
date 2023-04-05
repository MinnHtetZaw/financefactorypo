@extends('master')
@section('title','Product Detail')
@section('link','Product Detail')
@section('content')
<div class="row">
	<div class="col-md-6 offset-md-3">
	    <div class="card card-primary">
	        <div class="card-header">
	             <h3 class="card-title">Product Detail Form</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                    <img src="{{asset('image/'.$product->photo)}}" style="border-radius:20px" height="200" width="300" />
                    </div>
                    <div class="col-md-6">
                    <div class="row mt-3">
                        <div class="col-md-4">
                        <label class="text-secondary">Name</label>
                        </div>
                        <div class="col-md-8">
                        <span class="text-success"><b>:&nbsp;&nbsp;{{$product->name}}</b></span>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4">
                        <label class="text-secondary">Category</label>
                        </div>
                        <div class="col-md-8">
                        <span class="text-success"><b>:&nbsp;&nbsp;{{$product->category->category_name}}</b></span>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4">
                        <label class="text-secondary">SubCategory</label>
                        </div>
                        <div class="col-md-8">
                        <span class="text-success"><b>:&nbsp;&nbsp;{{$product->subcategory->name}}</b></span>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4">
                        <label class="text-secondary">Brand</label>
                        </div>
                        <div class="col-md-8">
                        <span class="text-success"><b>:&nbsp;&nbsp;{{$product->brand->name}}</b></span>
                        </div>
                    </div>
                    
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-4">
                    <label class="text-secondary">Description</label>
                    </div>
                    <div class="col-md-8">
                     <span class="text-success"><b>:&nbsp;&nbsp;{{$product->description}}</b></span>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-4">
                    <label class="text-secondary">Measuring Unit</label>
                    </div>
                    <div class="col-md-8">
                    <span class="text-success"><b>:&nbsp;&nbsp;{{$product->measuring_unit}}</b></span>
                    </div>
                </div>
                <!-- <div class="row mt-2">
                    <div class="col-md-4">
                    <label class="text-secondary">Min Order Qty</label>
                    </div>
                    <div class="col-md-8">
                    <span class="text-success"><b>:&nbsp;&nbsp;{{$product->minimum_order_qty}}</b></span>
                    </div>
                </div> -->
                <div class="row mt-2">
                    <div class="col-md-4">
                    <label class="text-secondary">Reorder Qty</label>
                    </div>
                    <div class="col-md-8">
                    <span class="text-success"><b>:&nbsp;&nbsp;{{$product->reorder_qty}}</b></span>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-4">
                    <label class="text-secondary">Primary Supplier</label>
                    </div>
                    <div class="col-md-8">
                      @if($product->supplier_id == null)
                      <span class="text-success"><b>:&nbsp;&nbsp;Not Yet</b></span>

                      @else
                    <span class="text-success"><b>:&nbsp;&nbsp;{{$product->supplier->company_name}}</b></span>
                    @endif
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-4">
                    <label class="text-secondary">Secondary Supplier</label>
                    </div>
                    <div class="col-md-8">
                    <span class="text-success">
                    <b>:&nbsp;&nbsp;
                    @foreach($sec_supplier as $sec_pro)
                    <span class="badge badge-primary">{{$sec_pro->supplier->company_name}}</span>
                    @endforeach
                    </b>
                    </span>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-4">
                    <label class="text-secondary">Minimum Order Price</label>
                    </div>
                    <div class="col-md-8">
                    <span class="text-success"><b>:&nbsp;&nbsp;{{$product->moq_price}}</b></span>
                    </div>
                </div>
                <div class="text-center mt-2 mb-3"><button class="btn btn-danger" data-toggle="modal" onclick="getCompareData('{{$product->id}}')" data-target="#compare_product_{{$product->id}}">Compare Supplier</button></div>
                <div class="row mt-2">
                    <div class="col-md-4">
                    <label class="text-secondary">Minimum Order Qty</label>
                    </div>
                    <div class="col-md-8">
                    <span class="text-success"><b>:&nbsp;&nbsp;{{$product->moq_qty}}</b></span>
                    </div>
                </div>
                <div class="row mt-3">
                    
                    <div class="col-md-4">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button  data-toggle="modal"  data-target="#view_part" class="btn btn-warning pl-3 ml-5" disabled>View Parts</button>
                    </div>
                    <div class="col-md-4">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button data-toggle="modal"  data-target="#add_part_{{$product->id}}" class="btn btn-primary" disabled>Add Parts</button>
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-danger">Cancel</button>
                    </div>
                    
                </div>
                
                

                <!-- End View Part -->
                <!-- Compare Product Modal -->
                <div class="modal fade bd-example-modal-lg" id="compare_product_{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <div class="modal-title">
                          <h5 class="font-weight-bold text-secondary">Comparison <span class="text-info">{{$product->name}}</span> product Between Suppliers</h5>
                        </div>
                      </div>
                      <div class="modal-body">
                        <div class="container">
                          <!-- <div class="col-md-6 pr-2">
                            <span class="pr-2" id="compare_table{{$product->id}}">
                              
                                

                            </span>
                          </div> -->
                          <div class="col-md-12">
                            <span class="" id="compare_table_sec{{$product->id}}">

                            </span>
                          </div>
                         

                        </div><!-- row end -->

                      </div>

                    </div>
                  </div>
                </div>

                <!-- End Compare -->

            </div>
        </div>
    </div>
</div>
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Select2 -->
<script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>
<!-- Bootstrap Switch -->
<script src="../../plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<script type="text/javascript">

$('.select2').select2();
$("input[data-bootstrap-switch]").each(function(){
  $(this).bootstrapSwitch('state', $(this).prop('checked'));
});
</script>
@endsection
@section('js')
<script>
function getCompareData(pro_id)
    {
      // alert(pro_id);
      $.ajax({
              type:'POST',
              url:'/getCompare',
              data:{
                "_token":"{{csrf_token()}}",
                "product_id":pro_id, 
              },
              success:function(data){
                  var htmlcomparetablepri = "";
                  var htmlcomparetablesec = "";
                  var htmlcompri = "";
                  var htmlcomsec = "";
                  htmlcomparetablepri +=`
                                <table id="compareTable${pro_id}" class="table table-bordered">
                                  <thead class="text-center bg-info">
                                  <tr>
                                  <th col-span="5">Field Name</th>
                                  <th>Primary</th>
                                  
                                  </tr>
                                  </thead>
                                  <tbody>
                                  
                                  </tbody>
                                </table>
                  
                  `;
                  $('#compare_table'+pro_id).html(htmlcomparetablepri);
                  htmlcomparetablesec +=`
                                <table id="compareTableSec${pro_id}" class="table table-bordered table-hover">
                                 
                                  
                                </table>
                  
                  `;
                  $('#compare_table_sec'+pro_id).html(htmlcomparetablesec);

                 
                  //TEST
                  var i=0;
                  $('#compareTableSec'+pro_id).append('<thead><tr>');
                  $('#compareTableSec'+pro_id).append('<th colspan="5" class="text-center bg-info">Field Name</th>');
                  $('#compareTableSec'+pro_id).append('<th class="text-center bg-info">Primary</th>');
               	  $.each(data.sec_pro,function(i,second){ 
                    
                    $('#compareTableSec'+pro_id).append('<th class="text-center bg-info">Secondary</th>');
                          
                   })
                   $('#compareTableSec'+pro_id).append('</tr></thead>'); 


                 
                   $('#compareTableSec'+pro_id).append('</tr></tbody>'); 
                   //Supplier Name
                   $('#compareTableSec'+pro_id).append('<tbody><tr>');
                   $('#compareTableSec'+pro_id).append('<td colspan="5" class="font-weight-bold text-secondary">Supplier Name</td>');
                   $('#compareTableSec'+pro_id).append('<td class="text-center">'+data.pri_sup.supplier.company_name+'</td>');
                          $.each(data.sec_pro,function(i,second){                         
                            $('#compareTableSec'+pro_id).append('<td class="text-center">'+second.supplier.company_name+'</td>');                        
                          })
                   $('#compareTableSec'+pro_id).append('</tr></tbody>');
                   //Purchase Price
                   $('#compareTableSec'+pro_id).append('<tbody><tr>');
                   $('#compareTableSec'+pro_id).append('<td colspan="5" class="font-weight-bold text-secondary">Unit Purchase Price</td>');
                   $('#compareTableSec'+pro_id).append('<td class="text-center">'+data.pri_sup.unit_purchase_price+'</td>');
                          $.each(data.sec_pro,function(i,second){ 
                           
                          
                            $('#compareTableSec'+pro_id).append('<td class="text-center">'+second.unit_purchase_price+'</td>');
                          
                          
                          })
                   $('#compareTableSec'+pro_id).append('</tr></tbody>');
                   //Disconunt
                   $('#compareTableSec'+pro_id).append('<tbody><tr>');
                   $('#compareTableSec'+pro_id).append('<td colspan="5" class="font-weight-bold text-secondary">Incoterm</td>');
                   if(data.pri_sup.incoterm_id == null)
                   {
                    $('#compareTableSec'+pro_id).append('<td class="text-center text-danger">NA</td>');
                   }
                   else
                   {
                    $('#compareTableSec'+pro_id).append('<td class="text-center text-danger">'+data.pri_sup.incoterm.incoterm_name+'</td>');
                   }
                   
                          $.each(data.sec_pro,function(i,second){    
                            if(second.incoterm_id == null)
                            {
                              $('#compareTableSec'+pro_id).append('<td class="text-center text-danger">NA</td>');                        
                            }    
                            else
                            {
                              $('#compareTableSec'+pro_id).append('<td class="text-center text-danger">'+second.incoterm.incoterm_name+'</td>');                        
                            }               
                            
                          })
                   $('#compareTableSec'+pro_id).append('</tr></tbody>');
                   //Discount type and value
                   $('#compareTableSec'+pro_id).append('<tbody><tr>');
                   $('#compareTableSec'+pro_id).append('<td colspan="5" class="font-weight-bold text-secondary">Discount</td>');
                   if(data.pri_sup.discount_type == null)
                   {
                    $('#compareTableSec'+pro_id).append('<td class="text-center">'+data.pri_sup.discount_value+' (NA)'+'</td>');
                   }
                   else if(data.pri_sup.discount_value == null)
                   {
                    $('#compareTableSec'+pro_id).append('<td class="text-center">NA'+' ('+data.pri_sup.discount_type+')'+'</td>');
                   }
                   else if(data.pri_sup.discount_type == null && data.pri_sup.discount_value == null)
                   {
                    $('#compareTableSec'+pro_id).append('<td class="text-center">NA(NA)</td>');
                   }
                   else
                   {
                   $('#compareTableSec'+pro_id).append('<td class="text-center">'+data.pri_sup.discount_value+' ('+data.pri_sup.discount_type+')'+'</td>');
                   }
                          $.each(data.sec_pro,function(i,second){ 
                            if(second.discount_type == null)
                            {
                              $('#compareTableSec'+pro_id).append('<td class="text-center"><span class="badge badge-danger">'+second.discount_value+' (NA)'+'</span></td>'); 
                            }
                            else if(second.discount_value == null)
                            {
                              $('#compareTableSec'+pro_id).append('<td class="text-center">NA'+' ('+second.discount_type+')'+'</td>'); 
                            }
                            else if(second.discount_type == null && second.discount_value == null)
                            {
                              $('#compareTableSec'+pro_id).append('<td class="text-center">NA (NA)</td>'); 
                            }
                            else
                            {
                            $('#compareTableSec'+pro_id).append('<td class="text-center">'+second.discount_value+' ('+second.discount_type+')'+'</td>');
                            }
                          })
                   $('#compareTableSec'+pro_id).append('</tr></tbody>');
                 //End Discount amt and type
                //Discount condition and condition type
                $('#compareTableSec'+pro_id).append('<tbody><tr>');
                   $('#compareTableSec'+pro_id).append('<td colspan="5" class="font-weight-bold text-secondary">Discount Condition</td>');
                   if(data.pri_sup.discount_condition == null)
                   {
                    $('#compareTableSec'+pro_id).append('<td class="text-center">'+data.pri_sup.discount_condition_value+' (NA)'+'</td>');
                   }
                   else if(data.pri_sup.discount_condition_value == null)
                   {
                    $('#compareTableSec'+pro_id).append('<td class="text-center">NA'+' ('+data.pri_sup.discount_condition+')'+'</td>');
                   }
                   else if(data.pri_sup.discount_condition_value == null && data.pri_sup.discount_condition == null)
                   {
                    $('#compareTableSec'+pro_id).append('<td class="text-center">NA(NA)</td>');
                   }
                   else
                   {
                   $('#compareTableSec'+pro_id).append('<td class="text-center">'+data.pri_sup.discount_condition_value+' ('+data.pri_sup.discount_condition+')'+'</td>');
                   }
                          $.each(data.sec_pro,function(i,second){ 
                            if(second.discount_condition == null)
                            {
                              $('#compareTableSec'+pro_id).append('<td class="text-center"><span class="badge badge-danger">'+second.discount_condition_value+' (NA)'+'</span></td>'); 
                            }
                            else if(second.discount_condition_value == null)
                            {
                              $('#compareTableSec'+pro_id).append('<td class="text-center">NA'+' ('+second.discount_condition+')'+'</td>'); 
                            }
                            else if(second.discount_condition == null && second.discount_condition_value == null)
                            {
                              $('#compareTableSec'+pro_id).append('<td class="text-center">NA (NA)</td>'); 
                            }
                            else
                            {
                            $('#compareTableSec'+pro_id).append('<td class="text-center">'+second.discount_condition_value+' ('+second.discount_condition+')'+'</td>');
                            }
                          })
                   $('#compareTableSec'+pro_id).append('</tr></tbody>');
                  
                  
                   
              //End Discount condition and condition type
              //Credit Term Value and type
              $('#compareTableSec'+pro_id).append('<tbody><tr>');
                   $('#compareTableSec'+pro_id).append('<td colspan="5" class="font-weight-bold text-secondary">Credit Term</td>');
                   if(data.pri_sup.credit_term_type == null)
                   {
                    $('#compareTableSec'+pro_id).append('<td class="text-center">'+data.pri_sup.credit_term_value+' (NA)'+'</td>');
                   }
                   else if(data.pri_sup.credit_term_value == null)
                   {
                    $('#compareTableSec'+pro_id).append('<td class="text-center">NA'+' ('+data.pri_sup.credit_term_type+')'+'</td>');
                   }
                   else if(data.pri_sup.credit_term_value == null && data.pri_sup.credit_term_type == null)
                   {
                    $('#compareTableSec'+pro_id).append('<td class="text-center">NA(NA)</td>');
                   }
                   else
                   {
                   $('#compareTableSec'+pro_id).append('<td class="text-center">'+data.pri_sup.credit_term_value+' ('+data.pri_sup.credit_term_type+')'+'</td>');
                   }
                          $.each(data.sec_pro,function(i,second){ 
                            if(second.credit_term_type == null)
                            {
                              $('#compareTableSec'+pro_id).append('<td class="text-center"><span class="badge badge-danger">'+second.credit_term_value+' (NA)'+'</span></td>'); 
                            }
                            else if(second.credit_term_value == null)
                            {
                              $('#compareTableSec'+pro_id).append('<td class="text-center">NA'+' ('+second.credit_term_type+')'+'</td>'); 
                            }
                            else if(second.credit_term_type == null && second.credit_term_value == null)
                            {
                              $('#compareTableSec'+pro_id).append('<td class="text-center">NA (NA)</td>'); 
                            }
                            else
                            {
                            $('#compareTableSec'+pro_id).append('<td class="text-center">'+second.credit_term_value+' ('+second.credit_term_type+')'+'</td>');
                            }
                          })
                   $('#compareTableSec'+pro_id).append('</tr></tbody>');
                  
                  
                   
              //End Credit Term Value and type
              //Credit Condition Type and value
              $('#compareTableSec'+pro_id).append('<tbody><tr>');
                   $('#compareTableSec'+pro_id).append('<td colspan="5" class="font-weight-bold text-secondary">Credit Condition</td>');
                   if(data.pri_sup.credit_condition == null)
                   {
                    $('#compareTableSec'+pro_id).append('<td class="text-center">'+data.pri_sup.credit_condition_value+' (NA)'+'</td>');
                   }
                   else if(data.pri_sup.credit_condition_value == null)
                   {
                    $('#compareTableSec'+pro_id).append('<td class="text-center">NA'+' ('+data.pri_sup.credit_condition+')'+'</td>');
                   }
                   else if(data.pri_sup.credit_condition_value == null && data.pri_sup.credit_condition == null)
                   {
                    $('#compareTableSec'+pro_id).append('<td class="text-center">NA(NA)</td>');
                   }
                   else
                   {
                   $('#compareTableSec'+pro_id).append('<td class="text-center">'+data.pri_sup.credit_condition_value+' ('+data.pri_sup.credit_condition+')'+'</td>');
                   }
                          $.each(data.sec_pro,function(i,second){ 
                            if(second.credit_condition == null)
                            {
                              $('#compareTableSec'+pro_id).append('<td class="text-center"><span class="badge badge-danger">'+second.credit_condition_value+' (NA)'+'</span></td>'); 
                            }
                            else if(second.credit_condition_value == null)
                            {
                              $('#compareTableSec'+pro_id).append('<td class="text-center">NA'+' ('+second.credit_condition+')'+'</td>'); 
                            }
                            else if(second.credit_condition == null && second.credit_condition_value == null)
                            {
                              $('#compareTableSec'+pro_id).append('<td class="text-center">NA (NA)</td>'); 
                            }
                            else
                            {
                            $('#compareTableSec'+pro_id).append('<td class="text-center">'+second.credit_condition_value+' ('+second.credit_condition+')'+'</td>');
                            }
                          })
                   $('#compareTableSec'+pro_id).append('</tr></tbody>');
                  
                  
                   
              // End Credit Condition Type and value
                //   END TEST
                
              }
            });
    }
    </script>
@endsection