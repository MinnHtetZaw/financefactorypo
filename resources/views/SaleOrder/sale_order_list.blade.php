@extends('master')
@section('title','Sale Order List')
@section('link','Sale Order List')
@section('content')

<div class="row">
        <div class="col-12">
          <div class="card">
            
              
             
                 
                    <h5 class=" mt-2">Sale Order List<a href="" class="btn btn-primary float-right mr-2"><i class="fas fa-plus"></i>  Add Sales Order</a></h5>
                    

                  
                  
                  
                  
                 
            
            
            
            <!-- /.card-header -->
            <div class="card-body">
           
              <table id="example1" class="table table-bordered table-striped">
                <thead class="text-center bg-info">
                	<th>#</th>
                  <th>Sale Order No</th>
                	<th>Project Name</th>
                  <th>Phase Name</th>
                	<th>Delivery Date</th>
                  <th>Product Lists</th>
                  <th>Stock Check</th>
                 
                  
                </thead>
                <tbody>
                  <?php $i = 1;?>
                  @foreach($sale_orders as $order)
                  <tr class="text-center">
                  	<td>{{$i++}}</td>
                    <td>{{$order->sale_no}}</td>
                  	<td>{{$order->project->project_name}}</td>
                    <td>Phase Name</td>
                  	<td>{{$order->delivery_date}}</td>
                    <td><a href="#" data-toggle="modal" data-target="#orderitem_{{$order->id}}" class="btn btn-primary">Detail</a></td>
                    
                    <!-- <td><a href="#" data-toggle="modal" data-target="#item_{{$order->id}}" class="btn btn-primary" onclick="check_stock('{{$order->id}}')">Check Stock</a></td> -->
                    <td><a href="#" data-toggle="modal" data-target="#item_{{$order->id}}" class="btn btn-primary" onclick="dismiss_button('{{$order->id}}')">Check Stock</a></td>
                   
                  </tr>
                  <!-- Begin sale order List product Modal -->

                  <div class="modal fade bd-example-modal-lg" id="orderitem_{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Sale Order Products</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body text-center">
                            <div class="row bg-info font-weight-bold p-2">
                                <div class="col-md-1">
                                  <span>No</span>
                                </div>
                                <div class="col-md-3">
                                  <span>Product Name</span>
                                </div>
                                <div class="col-md-2">
                                  <span>Brand</span>
                                </div>
                                <div class="col-md-3">
                                  <span>Model Number</span>
                                </div>
                                <div class="col-md-3">
                                  <span>Request Stock Qty</span>
                                </div>
                            </div>
                            <?php $i=1 ?>
                            @foreach($sale_order_lists as $itemlist)
                            @if($order->id == $itemlist->sale_order_id)
                            <div class="row mb-1 mt-3 font-weight-bold" style="font-size:18px;">
                                
                                
                                <div class="col-md-1">
                                  <span>{{$i++}}<span>
                                </div>
                                <div class="col-md-3">
                                  <span>{{$itemlist->product->name}}</span>
                                </div>
                                <div class="col-md-2">
                                  <span>{{$itemlist->product->brand->name}}</span>
                                </div>
                                <div class="col-md-3">
                                  <span>{{$itemlist->product->model_number}}</span>
                                </div>
                                <div class="col-md-3">
                                  <span>{{$itemlist->stock_qty}}</span>
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                  </div>
                </div>

                  <!-- End sale order list -->
                  <!--Check Stock -->
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
<!-- page script -->
<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>

<script type="text/javascript">
  
 
</script>
@endsection