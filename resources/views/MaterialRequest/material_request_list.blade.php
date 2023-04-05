@extends('master')
@section('title','Material Request List')
@section('link','Material Request List')
@section('content')

<div class="row">

        <div class="col-12">
          <div class="card">
            <div>
                  <div class="row">
                    <div class="col-md-9">
                    <h3 class="card-title mr-5 ml-3">Material Request Lists</h3>
                  </div>

            </div>
            <!-- /.card-header -->
            <div class="card-body">

              <table id="example1" class="table table-bordered table-striped">
                <thead class="text-center bg-info">
                	<th>#</th>
                	<th>Request Code</th>
                	<th>Request Date</th>
                  	<th>Stock Check</th>
                </thead>
                <tbody>
                  <?php $i = 1;?>
                  @foreach($material_requests as $request)
                  <tr class="text-center" style="font-size:15px;">
                  	<td>{{$i++}}</td>
                  	<td>{{$request->request_code}}</td>
                  	<td>{{$request->request_date}}</td>
                    <td><a href="#" data-toggle="modal" onclick="dismiss_button('{{$request->id}}')" data-target="#item_{{$request->id}}" class="btn btn-primary">Check Stock</a></td>


                  </tr>

                  <!--Check Stock -->
                  <div class="modal fade" id="item_{{$request->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Material Request</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body text-center p-4">
                          <div class="row bg-info font-weight-bold p-1" style="font-size:15px;">
                            <div class="col-md-2">
                              <span>Product Name</span>
                            </div>
                            <div class="col-md-2">
                              <span>Brand</span>
                            </div>
                            <div class="col-md-2">
                              <span>Request Quantity</span>
                            </div>
                            <div class="col-md-2">
                              <span>Instock Quantity</span>
                            </div>
                            <div class="col-md-2">
                              <span>Required Quantity</span>
                            </div>
                            <div class="col-md-2">
                              <span>Action</span>
                            </div>
                          </div>

                          <?php $required_qty = 0;$required =0; $available_items_lists=array();?>
                          @foreach($products as $product)
                          @foreach($mr_product as $request_list)
                          @if($request->id == $request_list->material_request_id && $product->id == $request_list->product_id)
                          <?php
                          $available_items = array();
                            foreach($items as $item){
                              if($item->product_id == $request_list->product_id && $item->in_stock_flag == 1 && $item->reserve_flag == 0){
                                array_push($available_items,$item);
                              }
                            }
                            $available_qty = count($available_items);


                            $stock_qty = $product->stock_qty - $request_list->request_qty;
                            $new_qty = $request_list->request_qty - $available_qty;
                            if ($request_list->request_qty < $available_qty) {
                              $required_qty = 0;

                            }elseif($request_list->request_qty > $available_qty){
                               $required_qty  = $request_list->request_qty - $available_qty;
                            }

                          ?>
                          <input type="hidden" id="req" value="{{$required_qty}}">

                          <div class="row mb-1 mt-3" style="font-size:15px;">
                            <div class="col-md-2">
                              {{$request_list->product->name}}
                            </div>
                            <div class="col-md-2">
                              {{$request_list->product->brand->name}}
                            </div>
                            <div class="col-md-2">
                               {{$request_list->request_qty}}
                            </div>
                            <div class="col-md-2">
                               {{$available_qty}}
                            </div>
                            <div class="col-md-2">
                              @if( $new_qty > 0 )
                               <span class="badge badge-danger">{{$new_qty}}</span>
                              @else
                              <span class="badge badge-info">0</span>
                              @endif
                            </div>
                            <div class="col-md-2">
                            <a class="btn btn-primary btn-sm " data-toggle="collapse" href="#related{{$request_list->id}}" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Related</a>
                          </div>
                          </div>
                          @if(count($available_items) > 0)
                          <?php array_push($available_items_lists,$available_items); ?>
                          <div class="collapse out container mr-5" id="related{{$request_list->id}}">
                          <div class="row  p-2">
                            <hr>
                            <div class="col-md-3">
                              <span style="font-size: 16px;" class="text-info">Serial Number</span>
                            </div>
                            <div class="col-md-3">
                              <span style="font-size: 16px;" class="text-info">Size</span>
                            </div>
                            <div class="col-md-3">
                              <span style="font-size: 16px;" class="text-info">Color</span>
                            </div>
                            <div class="col-md-3">
                              <span style="font-size: 16px;" class="text-info">Dimension</span>
                            </div>
                          </div>
                            @foreach($available_items as $item)
                            <div class="row mb-1 mt-3" style="font-size:14px;">
                            <div class="col-md-3">
                              <span style="font-size: 14px;">{{$item->serial_number}}</span>
                            </div>
                            <div class="col-md-3">
                              <span style="font-size: 14px;">{{$item->size}}</span>
                            </div>
                            <div class="col-md-3">
                              <span style="font-size: 14px;">{{$item->color}}</span>
                            </div>
                            <div class="col-md-3">
                              <span style="font-size: 14px;">{{$item->dimension}}</span>
                            </div>
                          </div>
                            @endforeach
                          </div>
                          @endif
                          <hr>
                          <?php $required += $required_qty; ?>
                          @endif
                          @endforeach
                          @endforeach

                          <a href="" id="por{{$request->id}}" class="btn btn-danger preq">Purchase Request</a>

                           <a href="" onclick="" class="btn btn-primary" id="mis{{$request->id}}">Material Issue</a>

                        </div>
                      </div>
                    </div>
                  </div>
                  {{-- <div class="modal fade" id="item_{{$request->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Material Request</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body text-center">
                            <div style="display: flex;">
                                <div style="margin-bottom: 1em;width: 100%;">
                                    <div style="border: 1px black solid;height: 3em;margin: auto;width: 100%;"></div>
                                    <div style="border: 1px black solid;height: 3em;margin: auto;width: 100%;"></div>
                                    <div style="border: 1px black solid;height: 3em;margin: auto;width: 100%;"></div>
                                    <div style="border: 1px black solid;height: 3em;margin: auto;width: 100%;"></div>
                                    <div style="border: 1px black solid;height: 3em;margin: auto;width: 100%;"></div>
                                    <div style="border: 1px black solid;height: 3em;margin: auto;width: 100%;"></div>
                                </div>
                                <div style="margin-bottom: 1em;width: 100%;">
                                    <div style="border: 1px black solid;height: 3em;margin: auto;width: 100%;"></div>
                                    <div style="border: 1px black solid;height: 3em;margin: auto;width: 100%;"></div>
                                    <div style="border: 1px black solid;height: 3em;margin: auto;width: 100%;"></div>
                                </div>
                                <div style="margin-bottom: 1em;width: 100%;">
                                    <div style="border: 1px black solid;height: 3em;margin: auto;width: 100%;"></div>
                                    <div style="border: 1px black solid;height: 3em;margin: auto;width: 100%;"></div>
                                    <div style="border: 1px black solid;height: 3em;margin: auto;width: 100%;"></div>
                                </div>
                             </div>
                        </div>
                      </div>
                    </div>
                  </div> --}}
                 @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
        <!-- Purchase req for only show modal -->

      </div>
<!-- page script -->
<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>

<script type="text/javascript">

    function sale_order(material_request_id,available_items_lists){

    var prefix = $('#prefix').val();
    var digit = $('#digit').val();

    $.ajax({
      type:'POST',
      url:'/ajaxSendMaterialIssue',
      dataType:'json',
      data:{"_token": "{{ csrf_token() }}",
      "material_request_id":material_request_id,
      "available_items_lists": available_items_lists,
      "prefix": prefix,
      "digit":digit,
    },

      success:function(data){
        console.log(data);

        swal({
          'title':"Successfully Send Sale Order!",
          'text':"Successfully Send Sale Order!",
          'icon':"success",

        })
      }
    });

  }









</script>
@endsection
