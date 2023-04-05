@extends('master')
@section('title','Product List')
@section('link','Product List')
@section('content')

<div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Product List</h3>
              <a href="{{route('create-product')}}" class="btn btn-primary float-right"> <i class="fa fa-plus"></i> Create Product</a>
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
                    @foreach($products as $product)
                    <td>{{$i++}}</td>
                    <td><embed src="{{'image/'.$product->photo}}" style="border-radius:10px" height="40" width="50" /></td>
                    <td>{{$product->name}}</td>

                    <td>{{$product->selling_price}}</td>


                    <td>{{$product->stock_qty}}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->reg_date}}</td>
                    <!-- <td><button type="button" class="btn btn-danger" data-toggle="modal" onclick="getCompareData('{{$product->id}}')" data-target="#compare_product_{{$product->id}}">Compare</button></td> -->
                    <!-- <td><button class="btn btn-danger"><span class="pl-2 pr-2"><i class="fas fa-info-circle"></i></span></button></td>
                    <td><button class="btn btn-success"><span class="pl-2 pr-2"><i class="fas fa-eye"></i></span></button></td>
                    <td><button class="btn btn-info"><span class="text-light pl-2 pr-2"><i class="fas fa-plus"></i></span></button></td> -->
                    <td>
                    <a href="{{route('product_detail',$product->id)}}" class="btn btn-danger btn-sm"><span class="pr-2"><i class="fas fa-info-circle"></i></span>Detail</a>
                    <a data-toggle="collapse" href="#related_items{{$product->id}}" role="button" aria-expanded="false" aria-controls="multiCollapseExample1" class="btn btn-success btn-sm"><span class="pr-2"><i class="fas fa-eye"></i></span>View Item</a>
                    <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#add_item{{$product->id}}"><span class="pr-2"><i class="fas fa-plus"></i></span>Add Item</button>
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
                                <label style="font-size:15px;" class="text-info">Dimension</label>
                          </div>
                          <div class="col-md-2">
                                <label style="font-size:15px;" class="text-info">Purchase Price</label>
                          </div>

                        </div>
                        <div class="row mt-2">
                            <?php $j=1 ?>
                            @foreach($items as $item)
                            @if($product->id == $item->product_id)
                            @if($item->warehouse_type == 1)
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

                                <div style="font-size:15px;">{{$item->dimension}}</div>

                            </div>
                            <div class="col-md-2 mt-2">

                                <div style="font-size:15px;">{{$item->unit_purchase_price}}</div>

                            </div>
                            <!-- <div class="col-md-2 mt-2">
                                @if($item->warehouse_type == 1)
                                <div style="font-size:15px;">Main</div>
                                @elseif($item->warehouse_type == 2)
                                <div style="font-size:15px;">{{$item->regional->warehouse_name}}</div>
                                @endif

                            </div> -->
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
      @foreach($products as $product)
      <div class="modal fade" id="add_item{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Item Form</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <div class="card card-primary">
                            <div class="card-header">
                              <h3 class="card-title">Item Registration</h3>
                          </div>
                          <!-- /.card-header -->
                          <!-- form start -->
                            <form method="post" action="{{route('add_item')}}">
                              @csrf
                              <input type="hidden" name="product_id" value="{{$product->id}}">
                              <div class="card-body">
                                  <div class="form-group">
                                      <label for="phase_name" class="text-info">Serial Number</label>
                                      <input type="text" class="form-control" name="serial_no" id="serial_no" placeholder="Enter Phase Name">
                                  </div>
                                  <div class="form-group">
                                      <label for="phase_name" class="text-info">Unit Purchase Price</label>
                                      <input type="text" class="form-control" name="unit_price" id="unit_price" placeholder="Enter Unit Purchase Price">
                                  </div>
                                  <div class="form-group">
                                      <label for="phase_name" class="text-info">Unit Purchase Date</label>
                                      <input type="date" class="form-control" name="date" id="unit_date" placeholder="Enter Unit Purchase Date">
                                  </div>
                                  <div class="form-group">
                                      <label for="phase_name" class="text-info">Size</label>
                                      <input type="text" class="form-control" name="size" id="size" placeholder="Enter item size">
                                  </div>
                                  <div class="form-group">
                                      <label for="phase_name" class="text-info">Color</label>
                                      <input type="text" class="form-control" name="color" id="color" placeholder="Enter item color">
                                  </div>
                                  <div class="form-group">
                                      <label for="phase_name" class="text-info">Dimension</label>
                                      <input type="text" class="form-control" name="dimension" id="dimension" placeholder="Enter item dimension">
                                  </div>
                                  <div class="form-group">
                                      <label for="phase_name" class="text-info">HS_Code</label>
                                      <input type="text" class="form-control" name="hs_code" id="hs_code" placeholder="Enter item hs_code">
                                  </div>
                                  <div class="form-group">
                                      <label for="phase_name" class="text-info">Stock Qty</label>
                                      <input type="number" class="form-control" name="qty" id="qty" placeholder="Enter Stock Qty">
                                  </div>
                                  <div class="form-group">
                                        <label for="description" class="text-info">Other Specification</label>
                                        <textarea class="form-control" name="other_spec" id="other_spec" rows="3" placeholder="Enter Specification"></textarea>
                                  </div>
                                  <div id="goto{{$product->id}}" class="offset-md-2">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="radio" id="warehouse" name="type" value="1" onclick="isWarehouse(this.value,'{{$product->id}}')">
                                            <label class="control-lable">Warehouse</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="radio" id="site" name="type" value="2" onclick="isWarehouse(this.value,'{{$product->id}}')">
                                            <label class="control-label">Site</label>
                                        </div>
                                    </div><br>
                                  </div>
                                  <!-- Begin Result Radio -->
                                  <div class="row">
                        <div class="col-md-2 mt-4 mainradio" id="main_radio{{$product->id}}">
                            <input type="radio" name="warehouse_flag" id="main" value="1" onclick="isWarehouse(this.value)">
                            <label class="control-label">Main</label>
                        </div>
                        <div class="col-md-2 mt-4 regionalradio" id="regional_radio{{$product->id}}">
                            <input type="radio" id="region" value="2" name="warehouse_flag" onclick="isregional('{{$product->id}}')">
                            <label class="control-label">Regional</label>
                        </div>
                        <div class="col-md-6 rename mt-4 ml-2 re_name" id="rename{{$product->id}}">
                            <label class="control-label">Regional Name</label>
                            <select class="form-control" id="regID" name="regional_id" onchange="regionalName(this.value)">
                              <option>Select Regional Warehouse</option>
                              @foreach($regionalname as $rename)
                              <option value="{{$rename->id}}">{{$rename->warehouse_name}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="col-md-4 projectbox" id="project_box{{$product->id}}">
                            <label class="control-label">Project</label>
                            <input type="hidden" id="projIDD">
                            <select class="form-control" id="pro" name="proid" onchange="getSiteInventoryProject(this.value)">
                              <option>Select Project</option>
                              @foreach($projects as $project)
                                <option value="{{$project->id}}">{{$project->name}}</option>
                              @endforeach
                            </select>
                        </div>
                        <div class="col-md-4 phasebox" id="phase_box{{$product->id}}">
                            <label class="control-label">Phase</label>
                            <select class="form-control" id="forPhase" name="phase_id" disabled="disabled" onchange="getSiteInventoryPhase(this.value)">
                            </select>
                        </div>
                        <div class="col-md-4 sitebox" id="site_box{{$product->id}}">
                            <label class="control-label">Site Engineer</label>
                            <select class="form-control" name="site_id" onchange="getSiteInventoryAll(this.value)">
                            <option value="">Select</option>

                            </select>
                        </div>
                    </div>
                                  <!-- End Result Radio -->
                                  <div class="form-group">
                                        <label for="description" class="text-info">Warehouse Location</label>
                                        <textarea class="form-control" name="ware_location" id="ware_location" rows="3" placeholder="Enter Location"></textarea>
                                  </div>
                              </div>
                              <!-- /.card-body -->

                              <!-- <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                              </div> -->

                        </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
@endforeach

                  <!-- End Item Modal -->
<!-- page script -->
<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<script type="text/javascript" >
  $(document).ready(function(){
    $('.mainradio').hide();
    $('.regionalradio').hide();
    $('.projectbox').hide();

    $('.phasebox').hide();

    $('.sitebox').hide();

    $('.re_name').hide();

    // $('#goto').hide();
  })
    function getShelveList(zone_id,product_id){
        $('#shelve_'+product_id).empty();
        $.ajax({

           type:'POST',

           url:'/getShelveList',

           data:{
           	"_token":"{{csrf_token()}}",
           	"zone_id":zone_id,
           },

           success:function(data){

           	$.each(data,function(i,shelve){

           	    $('#shelve_'+product_id).append($('<option>').attr('value',shelve.id).text(shelve.name));
           	})
            console.log($('#shelve_'+product_id).val());
           }

        });
    }
    // function getCompareData(pro_id)
    // {
    //   // alert(pro_id);
    //   $.ajax({
    //           type:'POST',
    //           url:'/getCompare',
    //           data:{
    //             "_token":"{{csrf_token()}}",
    //             "product_id":pro_id,
    //           },
    //           success:function(data){
    //               var htmlcomparetablepri = "";
    //               var htmlcomparetablesec = "";
    //               var htmlcompri = "";
    //               var htmlcomsec = "";
    //               htmlcomparetablepri +=`
    //                             <table id="compareTable${pro_id}" class="table table-bordered">
    //                               <thead class="text-center bg-info">
    //                               <tr>
    //                               <th col-span="5">Field Name</th>
    //                               <th>Primary</th>

    //                               </tr>
    //                               </thead>
    //                               <tbody>

    //                               </tbody>
    //                             </table>

    //               `;
    //               $('#compare_table'+pro_id).html(htmlcomparetablepri);
    //               htmlcomparetablesec +=`
    //                             <table id="compareTableSec${pro_id}" class="table table-bordered table-hover">


    //                             </table>

    //               `;
    //               $('#compare_table_sec'+pro_id).html(htmlcomparetablesec);


    //               //TEST
    //               var i=0;
    //               $('#compareTableSec'+pro_id).append('<thead><tr>');
    //               $('#compareTableSec'+pro_id).append('<th colspan="5" class="text-center bg-info">Field Name</th>');
    //               $('#compareTableSec'+pro_id).append('<th class="text-center bg-info">Primary</th>');
    //            	  $.each(data.sec_pro,function(i,second){

    //                 $('#compareTableSec'+pro_id).append('<th class="text-center bg-info">Secondary</th>');

    //                })
    //                $('#compareTableSec'+pro_id).append('</tr></thead>');



    //                $('#compareTableSec'+pro_id).append('</tr></tbody>');
    //                //Supplier Name
    //                $('#compareTableSec'+pro_id).append('<tbody><tr>');
    //                $('#compareTableSec'+pro_id).append('<td colspan="5" class="font-weight-bold text-secondary">Supplier Name</td>');
    //                $('#compareTableSec'+pro_id).append('<td class="text-center">'+data.pri_supplier+'</td>');
    //                       $.each(data.sec_pro,function(i,second){
    //                         $('#compareTableSec'+pro_id).append('<td class="text-center">'+data.sec_pro[i].supplier_name+'</td>');
    //                       })
    //                $('#compareTableSec'+pro_id).append('</tr></tbody>');
    //                //Purchase Price
    //                $('#compareTableSec'+pro_id).append('<tbody><tr>');
    //                $('#compareTableSec'+pro_id).append('<td colspan="5" class="font-weight-bold text-secondary">Purchase Price</td>');
    //                $('#compareTableSec'+pro_id).append('<td class="text-center">'+data.pri_purchase+'</td>');
    //                       $.each(data.sec_pro,function(i,second){
    //                         if(data.sec_pro[i].sec_purchase_price != null)
    //                       {
    //                         $('#compareTableSec'+pro_id).append('<td class="text-center">'+second.sec_purchase_price+'</td>');
    //                       }
    //                       else if(data.sec_pro[i].sec_purchase_price == null)
    //                       {
    //                         $('#compareTableSec'+pro_id).append('<td class="text-center text-danger">No Purchase</td>');
    //                       }
    //                       })
    //                $('#compareTableSec'+pro_id).append('</tr></tbody>');
    //                //Disconunt
    //                $('#compareTableSec'+pro_id).append('<tbody><tr>');
    //                $('#compareTableSec'+pro_id).append('<td colspan="5" class="font-weight-bold text-secondary">Discount %</td>');
    //                $('#compareTableSec'+pro_id).append('<td class="text-center text-danger">No Discount</td>');
    //                       $.each(data.sec_pro,function(i,second){
    //                         $('#compareTableSec'+pro_id).append('<td class="text-center text-danger">No Discount</td>');
    //                       })
    //                $('#compareTableSec'+pro_id).append('</tr></tbody>');
    //                //Last Purchase Date
    //                $('#compareTableSec'+pro_id).append('<tbody><tr>');
    //                $('#compareTableSec'+pro_id).append('<td colspan="5" class="font-weight-bold text-secondary">Last Purchase Date</td>');
    //                $('#compareTableSec'+pro_id).append('<td class="text-center"><span class="badge badge-primary">'+data.pri_purchase_date+'</span></td>');
    //                       $.each(data.sec_pro,function(i,second){
    //                         $('#compareTableSec'+pro_id).append('<td class="text-center"><span class="badge badge-primary">'+second.purchase_date+'</span></td>');
    //                       })
    //                $('#compareTableSec'+pro_id).append('</tr></tbody>');







                  //END TEST

            //   }
            // });
    // }
    function isWarehouse(value,proid){
    //    alert("isWarehouse"+value);
        $('#mainval').val(value);
        $('#regionalval').val("");

    $('#projectID').val("");
    $('#phaseID').val("");
    $('#engeID').val("");

        console.log(value);

        if(value == 1){

            $('#main_radio'+proid).show();

            $('#regional_radio'+proid).show();

            $('#project_box'+proid).hide();

            $('#phase_box'+proid).hide();

            $('#site_box'+proid).hide();

            $('#rename'+proid).hide();
        }

        else if(value == 2){

            $('#main_radio'+proid).hide();

            $('#regional_radio'+proid).hide();

            $('#project_box')+proid.show();

            $('#phase_box'+proid).show();

            $('#site_box'+proid).show();

            $('.ren_ame').hide();
        }
    }
    function isregional(proid){
        // alert("HEEEEEE");
        $('#rename'+proid).show();
    }
</script>
@endsection
