@extends('master')
@section('title','Check Inventory List')
@section('link','Check Inventory List')
@section('content')

<div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><span class="text-info">{{$regional->warehouse_name}}&nbsp;</span>Regional Warehouse's Product List</h3>
              <!-- <a href="{{route('create-product')}}" class="btn btn-primary float-right"> <i class="fa fa-plus"></i> Create Product</a> -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-striped">
                <thead class="text-center bg-info">
                	<tr>
                    <th>No</th>
                    <th>Product Photo</th>
                    <!-- <th>Serial Number</th> -->
                    <th>Product Name</th>
                    <th>Selling Price</th>

                    <!-- <th>Model Number</th>
                    <th>Supplier</th> -->
                    <th>Stock Quantity</th>
                    <th>Description</th>
                    <th>Product Register Date</th>
                    <th>Action</th>
                    
                    <!-- <th>Advance</th> -->
                  </tr>
                </thead>
                <?php $i = 1;?>
                <tbody class="text-center">
                  <tr>
                    @foreach($productt as $product)
                    <td>{{$i++}}</td>
                    <td><img src="{{asset('image/'.$product->photo)}}" style="border-radius:10px;" height="40" width="50" /></td>
                    <td>{{$product->name}}</td>

                    <td>{{$product->selling_price}}</td>

                    
                    <td>{{$product->stock_qty}}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->reg_date}}</td>
                    
                    <td>
                    <!-- <a href="{{route('product_detail',$product->id)}}" class="btn btn-danger btn-sm"><span class="pr-2"><i class="fas fa-info-circle"></i></span>Detail</a> -->
                    <a data-toggle="collapse" href="#related_items{{$product->id}}" role="button" aria-expanded="false" aria-controls="multiCollapseExample1" class="btn btn-success btn-sm"><span class="pr-2"><i class="fas fa-eye"></i></span>View Item</a>
                    </td>
                  </tr>
                  <tr>
                      <td colspan="10">
                      <div class="collapse out container mr-5" id="related_items{{$product->id}}">
                        <div class="row">
                          <div class="col-md-2">
                                  <label style="font-size:15px;" class="text-info">No</label>
                          </div>
                          <div class="col-md-2">
                                <label style="font-size:15px;" class="text-info">S/N</label>
                          </div>
                          <div class="col-md-2">
                                <label style="font-size:15px;" class="text-info">Size</label>
                          </div>
                          <div class="col-md-2">
                                <label style="font-size:15px;" class="text-info">Color</label>
                          </div>
                          <div class="col-md-2">
                                <label style="font-size:15px;" class="text-info">Purchase Price</label>
                          </div>
                          <div class="col-md-2">
                                <label style="font-size:15px;" class="text-info">Location</label>
                          </div>
                        </div>
                        <div class="row mt-2">
                            <?php $j=1 ?>
                            @foreach($items as $item)
                            @if($product->id == $item->product_id)
                            @if($item->warehouse_type == 2)
                            <div class="col-md-2 mt-2">
                                <div style="font-size:15px;">{{$j++}}</div>

                            </div>
                            <div class="col-md-2 mt-2">

                                <div style="font-size:15px;">{{$item->serial_number}}</div>


                            </div>
                            <div class="col-md-2 mt-2">

                                <div style="font-size:15px;">{{$item->size}}</div>

                            </div>
                            <div class="col-md-2 mt-2">

                                <div style="font-size:15px;">{{$item->color}}</div>

                            </div>
                            <div class="col-md-2 mt-2">

                                <div style="font-size:15px;">{{$item->unit_purchase_price}}</div>

                            </div>
                            <div class="col-md-2 mt-2">
                                @if($item->warehouse_type == 1)
                                <div style="font-size:15px;">Main</div>
                                @elseif($item->warehouse_type == 2)
                                <div style="font-size:15px;">{{$item->regional->warehouse_name}}</div>
                                @endif

                            </div>
                            @endif
                            @endif
                          @endforeach
                        </div>
                      </div>
                      </td>
                  </tr>
                  
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
      <!-- Add Item Modal -->
@endsection