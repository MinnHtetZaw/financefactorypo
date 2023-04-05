@extends('master')
@section('title','Good Receive Note Form')
@section('link','Good Receive Note Form')
@section('content')

<div class="card">
    <div class="card-body">
        <form id="storegrn" action="{{route('store_good_receive_note')}}" method="POST">
            @csrf
            <!-- <input type="text" id="total" class="form-control"> -->
            <input type="hidden" id="regid" name="regid">
            <input type="hidden" id="regid" name="regid">
            <div class="row">
                <div class="col-md-6">
                    <!-- <div class="form-group">
                        <label class="control-label">GRN Number</label>
                        <input type="text" style="background-color:white" class="form-control" name="grn_no">
                    </div> -->
                    <label class="control-label">GRN Number</label>
                    <div class="input-group">
                    
                    <div class="input-group-prepend">
                    <input type="hidden" value="{{$prefixgrn}}" name="grn_prefix">
                    <input type="hidden" value="{{$index}}" name="index_digit">
                    <span class="input-group-text  bg-dark">{{$prefixgrn}}</span>
                    <span class="input-group-text  bg-secondary">{{$digit}}</span>
                  </div>
                  <input type="hidden" id="wtoid" name="wto_ID">
                  <input type="text" style="background-color:white" class="form-control" name="grn_no">
                
                  </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Date</label>
                        <input type="date" class="form-control" id="grndate" name="date">
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Begin -->
                <div class="col-md-6">
                <table class="table table-hover">
                    <thead>
                        <tr>
                        <th>No</th>
                        <th>Purchase Order No</th>
                        <th>Supplier<th>
                        <th>Total Qty</th>
                        <th>Mail Sent</th>
                        
                        </tr>
                    </thead>
                
              <tbody>
              <?php $i=1; ?>
                    @foreach($officer_po as $eachpo)
                  <tr data-toggle="collapse" data-target="#accordion_{{ $eachpo->id }}" class="clickable" style="cursor: pointer;user-select: none;">
                  <td>{{$i++}}.</td>
                      <td>{{$eachpo->po_no}}</td>
                      <td colspan="2">{{$eachpo->supplier->name}}</td>
                      <td class="text-center">{{$eachpo->total_qty}}</td>
                      @if($eachpo->mail_sent == 0)
                      <td>no sent yet<span class="float-right"><i class="fas fa-arrow-circle-down text-primary"></i></span></td>
                      @endif
                      @if($eachpo->mail_sent == 1)
                      <td>sented<span class="float-right"><i class="fas fa-arrow-circle-down text-primary"></i></span></td>
                      @endif
                  </tr>
                  
                  <tr>
                      <td colspan="6">
                          <div id="accordion_{{ $eachpo->id }}" class="collapse">
                            <h4>Product List</h4>
                            
                            <table class="table">
                              <thead>
                                <tr>
                                  <th scope="col">#</th>
                                  <th>Product Name</th>
                                  <th>Brand</th>
                                  
                                  <th>Order Qty</th>
                                  <!-- <th>Address</th> -->
                                  
                                  <th>Action</th>
                                </tr>
                              </thead>
                            <tbody>
                            <?php $i=1; ?>
                            @foreach($officer_po_list as $po_list)
                            
                            @if($eachpo->id == $po_list->officer_purchase_order_id )
                              
                              
                             
                              <tr>
                              <input type="hidden"  value="{{$po_list->product->id}}">
                                <input type="hidden" value="{{$po_list->product->minimum_order_qty}}">
                                
                                <input type="hidden" value="{{$po_list->project_id}}">
                                
                                <input type="hidden" value="{{$po_list->phase_id}}">
                                <input type="hidden" value="{{$po_list->warehouse_flag}}">
                                <input type="hidden" value="{{$po_list->regional_name}}">
                                <input type="hidden" value="{{$po_list->regional_id}}">
                               
                                <input type="hidden" value="{{$po_list->order_qty}}">
                               <input type="hidden" value="{{$po_list->product->name}}">
                               <input type="hidden" value="{{$po_list->id}}">
                               <input type="hidden" value="{{$po_list->product->brand->name}}">
                               
                               <input type="hidden" value="{{$po_list->product->purchase_price}}">
                               <input type="hidden" value="{{$eachpo->supplier->name}}">
                               <input type="hidden" value="{{$eachpo->supplier_id}}">
                               <input type="hidden" value="{{$po_list->product->category_id}}">
                               
                               @foreach($projects as $proj)
                                @if($proj->id == $po_list->project_id)
                                <input type="hidden" value="{{$proj->project_name}}">
                                @endif
                               @endforeach
                               @foreach($project_phases as $pj_phase)
                                @if($pj_phase->id == $po_list->phase_id)
                                <input type="hidden" value="{{$pj_phase->phase_name}}">
                                @endif
                               @endforeach
                              
                                <th scope="row">{{$i++}}</th>
                                <td scope="row">{{$po_list->product->name}}</td>
                                <td scope="row">{{$po_list->product->brand->name}}</td>
                                <td scope="row" class="text-center">{{$po_list->order_qty}}</td>
                                <!-- @if($po_list->warehouse_flag == 1)
                               <td>main</td>
                               @elseif($po_list->warehouse_flag == 2)
                               <td>regional</td>
                               @else
                               <td>site</td>
                               @endif -->
                             
                                
                                
                               @if($po_list->grn_sent_status == 0)
                                <td><i class="btn btn-secondary btn_addtocart" data-id="{{$po_list->id}}" data-name="" data-qty="" id="tgpanel{{$po_list->id}}{{$po_list->product->id}}" onclick="tgPanel(this)" style="cursor: pointer;" ><i class="fas fa-plus"></i> Add</i></td>
                                @else
                                <td class="text-success">Already Add</td>
                                @endif
                                
                               
                               
                                
                                
                              </tr>
                             @endif
                              @endforeach
                             
                            </tbody>
                          </table>
                          
                        </div>
                      </td>
                  </tr>
                  
                  @endforeach
              </tbody>
             
              </table>
                </div>
                <!-- sub begin -->
                <div class="col-md-6">
                    
                     <div class="card shadow mt-3 mr-3">
                        <div class="card-header">
                            
                    
<!-- <input type="text" id="remarkarea" name="remarkarea"> -->
            <input type="hidden" name="deci" id="deci" >
            <input type="hidden" name="testingmain" id="mainval" placeholder="main">   
            <input type="hidden" name="testingreg" id="regionalval" placeholder="reg id">  
            <input type="hidden" name="testingsiteproj" id="projectID" placeholder="pj id">
            <input type="hidden" name="testingsitephase" id="phaseID" placeholder="phase id">
            <input type="hidden" name="testingsiteEnge" id="engeID" placeholder="eng id">
            <input type="hidden" name="parr[]" id="parray" placeholder="pro">
            <span id="arra"></span>
            <span id="arrapo"></span>
            <span id="arraproname"></span>
            <span id="arrasuppname"></span>
            <span id="arrapur"></span>
            <span id="arracate_id"></span>
            <span id="arrapoID"></span>

                
            <div class="card-body">
              <table id="SupplierProduct" class="table table-bordered">
                <thead class="text-center">
                  <th>Product Name</th>
                  <th>Brand</th>
                  <th>Min Order Qty</th>
                  <th>Order Quantity</th>
                  <th>Action</th>
                </thead>
                <tbody id="supplier_product" class="text-center">
                </tbody>
              </table>
              <div class="row mr-3 ml-5 mt-3 text-center">
              <input type="hidden" id="total_qty" name="total_qty">
               <label>Total Quantity:</label><span id="showtotal" class="ml-2"></span>
              </div>
            </div>
                
          </div>
        </div>
                <!-- End -->
            </div>
            </div>
            <div class="row">
                <div class="col-md-12" >
                    <div class="row">
                            <label class="control-label" id="gotolabel">Choose your place to store.</label>
                            <label class="control-label" id="fixlabel">Fixed Destination</label>
                            <div class="col-md-2 mr-3">
                                <button class="btn btn-warning btn-sm" id="manual" onclick="hello()">Manual Destination</button>
                                </div>
                    </div>
                    <input type="hidden" name="de0_main" id="de0_main">
                    <input type="hidden" name="de0_reg_id" id="de0_reg_id">
                    <input type="hidden" name="de0_proj_id" id="de0_proj_id">
                    <input type="hidden" name="de0_phase_id" id="de0_phase_id">
                    <div class="row mt-3" id="fix_des">
                        
                        <div class="col-md-2">
                        <input class="form-control" type="text" id="warehouse" value="" readonly>
                        </div>
                        <div class="col-md-2">
                        <input class="form-control" type="text" id="warehouse_name" value="" readonly>
                        </div>
                        
                    </div>
                    <div id="goto">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="radio" id="warehouse" name="type" value="1" onclick="isWarehouse(this.value)">
                            <label class="control-lable">Warehouse</label>
                        </div>
                        <div class="col-md-6">
                            <input type="radio" id="site" name="type" value="2" onclick="isWarehouse(this.value)">
                            <label class="control-label">Site</label>
                        </div>
                    </div><br>
                    </div>
                    <div class="row">
                        <div class="col-md-2 mt-4" id="main_radio">
                            <input type="radio" name="warehouse_flag" id="main" value="1" onclick="isWarehouse(this.value)">
                            <label class="control-label">Main</label>
                        </div>
                        <div class="col-md-2 mt-4" id="regional_radio">
                            <input type="radio" id="region" value="2" name="warehouse_flag" onclick="isregional()">
                            <label class="control-label">Regional</label>
                        </div>
                        <div class="col-md-2 rename" id="rename">
                            <label class="control-label">Regional Name</label>
                            <select class="form-control" id="regID" onchange="regionalName(this.value)">
                              <option>Select Regional Warehouse</option>
                              @foreach($regionalname as $rename)
                              <option value="{{$rename->id}}">{{$rename->warehouse_name}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="col-md-2" id="project_box">
                            <label class="control-label">Project</label>
                            <input type="hidden" id="projIDD">
                            <select class="form-control" id="pro" name="proid" onchange="getSiteInventoryProject(this.value)">
                              <option>Select Project</option>
                              @foreach($projects as $project)
                                <option value="{{$project->id}}">{{$project->project_name}}</option>
                              @endforeach
                            </select>
                        </div>
                        <div class="col-md-3" id="phase_box">
                            <label class="control-label">Phase</label>
                            <select class="form-control" id="forPhase" name="phase_id" disabled="disabled" onchange="getSiteInventoryPhase(this.value)">
                            </select>
                        </div>
                        <div class="col-md-3" id="site_box">
                            <label class="control-label">Site Engineer</label>
                            <select class="form-control" name="site_id" onchange="getSiteInventoryAll(this.value)">
                            <option value="">Select</option>
                            @foreach($work_sites as $site)
                            <option value="{{$site->id}}">{{$site->name}}</option>
                            @endforeach
                            </select>
                        </div>
                    </div><br>
                    <div class="row float-right">
                        <div class="col-md-12">
                            <button type="button" class="btn btn-danger" onclick="changealldes()">Change All Destination</button>
                            <button type="button" class="btn btn-secondary" id="fake" disabled="disabled">Send Good Receive Note</button>
                            <button type="button" class="btn btn-info" id="real" onclick="checkdesti()">Send Good Receive Note</button>
                           
                        </div> 
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Remark Modal -->

<div class="modal fade" id="remarkmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Good Receive Note</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <label class="control-label">Remark</label><br>
      <textarea name="remark_grn" onkeyup="storema(this)" rows="8" cols="60"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="sendgrn()">Send Good Receive Note</button>
      </div>
    </div>
  </div>
</div>


<!-- End remark modal -->
<!-- update destination modal -->




@foreach($officer_po as $eachpo)
@foreach($officer_po_list as $po_list)

<div class="modal fade bd-example-modal-lg" id="upmodal{{$po_list->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h4><b>Update Each Item Destination</b></h4>
        </div>
       
        <input type="text" value="{{$po_list->id}}">
       
        <div class="modal-body">
            <div class="col-md-12">
                <div class="row">
                <div class="col-md-6">
                    <label>Purchase Order No</label>
                   
                    <input type="hidden" id="update_po_id" value="{{$po_list->officer_purchase_order_id}}">
                    
                    <input class="form-control" type="text" id="po_no" value="0{{$po_list->officer_purchase_order_id}}" readonly>
                  
                    <div class="row">
                    <div class="col-md-6">
                        <label>Product</label>
                        
                        
                        <input type="hidden" id="up_pro_id{{$po_list->id}}" name="up_pro_id" value="{{$po_list->product_id}}">
                        <input class="form-control" type="text" value="{{$po_list->product->name}}" id="updatepro_name" readonly>
                        
                        
                    </div>
                    <div class="col-md-6">
                        <label>Brand</label>
                        
                        <input class="form-control" type="text" value="{{$po_list->product->brand->name}}" id="updatebrand" readonly>
                    </div>
                    </div>
                   
                    <div class="row">
                        <div class="col-md-3 mt-4 ml-3 update_main_radio" id="update_main_radio{{$po_list->id}}">
                            <input type="hidden" id="ismain">
                                <input type="radio" name="warehouse_flag" id="main" value="1" onclick="ismain(this.value)">
                                <label class="control-label">Main</label>
                        </div>
                        <div class="col-md-3 mt-4 ml-3 update_regional_radio" id="update_regional_radio{{$po_list->id}}">
                            <input type="radio" id="region" value="2" name="warehouse_flag" onclick="updateisregional()">
                            <label class="control-label">Regional</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                
                    <label>Purchase Request No</label>
                    <input type="hidden" id="update_pr_id" name="update_pr_id" value="{{$po_list->purchase_request_id}}">
                    <input class="form-control" type="text" id="pr_no" value="{{$po_list->purchase_request_no}}" readonly>
              
                        <div class="row mt-5 ml-5">
                            <div class="col-md-4">
                                <input type="radio" id="warehouse" name="type" value="1" onclick="updateWarehouse(this.value)">
                                <label class="control-lable">Warehouse</label>
                            </div>
                            <div class="col-md-3 ml-5">
                                <input type="radio" id="site" name="type" value="2" onclick="updateWarehouse(this.value)">
                                <label class="control-label">Site</label>
                            </div>
               
                        </div>
                        <div class="col-md-6 mt-3 updaterename" id="updaterename{{$po_list->id}}">
                            <label class="control-label">Regional Name</label>
                            <input type="hidden" id="regIDD">
                            <select class="form-control" id="regID" onchange="regionalName(this.value)">
                              <option>Select Regional Warehouse</option>
                              @foreach($regionalname as $rename)
                              <option value="{{$rename->id}}">{{$rename->warehouse_name}}</option>
                            @endforeach
                            </select>
                        </div>
                </div>
                </div>
                <div class="row">
                    <!-- site data -->
                    <div class="col-md-4 updateproject_box" id="updateproject_box{{$po_list->id}}">
                            <label class="control-label">Project</label>
                            <select class="form-control" id="pro" name="proid" onchange="getSiteInventoryProjectUpdate(this.value)">
                              <option value="">Select Project</option>
                              @foreach($projects as $project)
                                <option value="{{$project->id}}">{{$project->project_name}}</option>
                              @endforeach
                            </select>
                        </div>
                        <div class="col-md-4 updatephase_box" id="updatephase_box{{$po_list->id}}">
                            <label class="control-label">Phase</label>
                            <select class="form-control" id="forPhaseUpdate{{$po_list->id}}" name="phase_id" disabled="disabled" onchange="getSiteInventoryPhase(this.value)">
                            </select>
                        </div>
                        <div class="col-md-4 updatesite_box" id="updatesite_box{{$po_list->id}}">
                            <label class="control-label">Site Engineer</label>
                            <select class="form-control" id="siteID{{$po_list->id}}" name="site_id" onchange="getSiteInventoryAll(this.value)">
                            <option value="">Select</option>
                            @foreach($work_sites as $site)
                            <option value="{{$site->id}}">{{$site->name}}</option>
                            @endforeach
                            </select>
                        </div>
                    <!-- end site -->
                </div>
            </div>
            
        </div>
        
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="updateitemdest()">Update</button>
        </div>
    </div>
  </div>
</div>
@endforeach

<!-- end update -->
@endforeach
@endsection

@section('js')

<script type="text/javascript">



    $( document ).ready(function() {
        
        $(".select2").select2();
        
        $('#main_radio').hide();
            
        $('#regional_radio').hide();
        
        $('#project_box').hide();
        
        $('#phase_box').hide();
        
        $('#site_box').hide();

        $('#rename').hide();

        $('#goto').hide();
        $('#gotolabel').hide();
   
        
        $('#deci').val(0);

        $('.update_main_radio').hide();
            
        $('.update_regional_radio').hide();
        $('.updaterename').hide();
           $('.updatephase_box').hide();
            
            $('.updatesite_box').hide();

            $('.updateproject_box').hide();

            $('#real').hide();

            $('#remarkmodal').hide();
            
    });

    

    function storema(value)
    {
        $('#remarkarea').val(value);
    }

    function ismain(value)
    {
        $('#ismain').val(value);
    }

  function hello()
  {
    $('#deci').val(1);
      $('#goto').show();
      $('#gotolabel').show();
      $('#fixlabel').hide();
      $('#fix_des').hide();
      $('#manual').hide();
      $('form').submit(function(e) {
        e.preventDefault();
        // or return false;
    });
  }
  function sendgrn()
  {
    
    document.getElementById("storegrn").submit();
  }
  function updateitemdest()
  {
      
      alert("are you sure Update!!");
      var poid = $('#POID').val();
      var productID = $('#up_pro_id'+poid).val();
      var poID = $('#update_po_id').val();
      var ismain = $('#ismain').val();
      var regID = $('#regIDD').val();
      var projID = $('#projIDD').val(); 
      var phaseID = $('#forPhaseUpdate'+poid).val();
    //   alert(phaseID);
      var siteID = $('#siteID'+poid).val();
alert("helll");
      $.ajax({
           type:'POST',
           url:'/updateitem_destination',
           dataType:'json',
           data:{ "_token": "{{ csrf_token() }}",
           "pro_id":productID,
           "po_id":poid,
           "main":ismain,
           "reg_id":regID,
           "proj_id":projID,
           "phase_id":phaseID,
           "site_id":siteID,
        
        },

           success:function(data){
            var htmlup = "";
            alert(data);
            console.log(data);
            // alert("poid"+poid);
            // $('#upmodal'+poid).hide();
            // $('.modal-backdrop').hide();

            alert("success");
            $('#ismain').val("");
            $('#regIDD').val("");
            $('#projIDD').val("");
            $('#forPhaseUpdate'+poid).val("");
            $('#siteID'+poid).val("");
                if(data == "main")
                {
                    //begin local storage 
                    var checkgrncartone = localStorage.getItem('checkgrncartone');
                    var mycheckgrncartobjone=JSON.parse(checkgrncartone);
                    
                    var checkgrncart = localStorage.getItem('checkgrncart');
                    var mycheckgrncartobj=JSON.parse(checkgrncart);

                    var conditioncart = localStorage.getItem('conditioncart');
                    var myconditioncartobj = JSON.parse(conditioncart);

                    
                    // var mycheck_len = mycheckgrncartobj.length;
                    var mycon_len = myconditioncartobj.length;
                 
                    var item = {pro_id:myconditioncartobj[mycon_len-1].pro_id,po_id:myconditioncartobj[mycon_len-1].po_id,name:myconditioncartobj[mycon_len-1].name,brand:myconditioncartobj[mycon_len-1].brand,ware_flag:1,regional_id:null,min_qty:myconditioncartobj[mycon_len-1].min_qty,reg_name:null,project_id:null,phase_id:null,stock_qty:parseInt(myconditioncartobj[mycon_len-1].stock_qty)};
                    if(!checkgrncart){
                        checkgrncart = '[]';
                    }
                    if(!checkgrncartone){
                        checkgrncartone = '[]';
                    }
                    if(!conditioncart)
                    {
                        conditioncart = '[]';
                    }
                   
                    //Update myconditioncart
                    var hasid = false;
                    $.each(myconditioncartobj,function(i,v){
                        
                    
                        if(v.po_id == myconditioncartobj[mycon_len-1].po_id && v.pro_id == myconditioncartobj[mycon_len-1].product_id)
                        {
                        hasid = true;
                        v.stock_qty++;
                        }
                    })
                    if(!hasid){
                        myconditioncartobj.push(item);
                        // mycheckgrncartobj.push(item);
                    }
                    // alert(mycheck_len-1);
                    myconditioncartobj.splice(mycon_len-1, 1);
                    // localStorage.setItem('checkgrncart', JSON.stringify(mycheckgrncartobj));
                    localStorage.setItem('conditioncart', JSON.stringify(myconditioncartobj));
                    

                    //end update myconditioncart
                    $.each(myconditioncartobj,function(i,v){

                        if(myconditioncartobj[i].ware_flag == 1 && myconditioncartobj[0].ware_flag == myconditioncartobj[mycon_len-1].ware_flag)
                        {
                            $('#real').show();
                            $('#fake').hide();
                            localStorage.setItem('checkgrncart', JSON.stringify(myconditioncartobj));
                            localStorage.setItem('grncart', JSON.stringify(myconditioncartobj));
                            
                        }

                    })
                   
                    
                    $('#warehouse1').val("Main");
                    $('#de0_main').val(1);
                    $('#de0_reg_id').val("");
                    $('#de0_proj_id').val("");
                        $('#de0_phase_id').val("");
                    htmlup += `

                    <div class="col-md-4">
                                <label>Warehouse</label>
                                <input type="hidden" id="flag" value="1">
                                <input class="form-control" type="text" id="warehouse1" value="Main" readonly>
                                
                                </div>
                            
                                `
                    $('#fix_des').html(htmlup);
                    showmodal();
                }
                else if(data.isregional == "regional")
                {
                    
                    //begin local storage 
                    var checkgrncartone = localStorage.getItem('checkgrncartone');
                    var mycheckgrncartobjone=JSON.parse(checkgrncartone);
                    
                    var checkgrncart = localStorage.getItem('checkgrncart');
                    var mycheckgrncartobj=JSON.parse(checkgrncart);

                    var conditioncart = localStorage.getItem('conditioncart');
                    var myconditioncartobj = JSON.parse(conditioncart);
                    
                    var mycon_len = myconditioncartobj.length;
                 
                    var item = {pro_id:myconditioncartobj[mycon_len-1].pro_id.pro_id,po_id:myconditioncartobj[mycon_len-1].po_id,name:myconditioncartobj[mycon_len-1].name,brand:myconditioncartobj[mycon_len-1].brand,ware_flag:2,regional_id:data.regional_id,min_qty:myconditioncartobj[mycon_len-1].min_qty,reg_name:data.regional_name,project_id:null,phase_id:null,stock_qty:parseInt(myconditioncartobj[mycon_len-1].stock_qty)};
                    if(!checkgrncart){
                        checkgrncart = '[]';
                    }
                    if(!checkgrncartone){
                        checkgrncartone = '[]';
                    }
                    if(!conditioncart)
                    {
                        conditioncart = '[]';
                    }
                   

                 
                    var hasid = false;
                    $.each(myconditioncartobj,function(i,v){
                        
                    
                        if(v.po_id == myconditioncartobj[mycon_len-1].po_id && v.pro_id == myconditioncartobj[mycon_len-1].product_id)
                        {
                        hasid = true;
                        v.stock_qty++;
                        }
                    })
                    if(!hasid){
                        myconditioncartobj.push(item);
                    }
                    
                    myconditioncartobj.splice(mycon_len-1, 1);
                    
                    localStorage.setItem('conditioncart', JSON.stringify(myconditioncartobj));

                    $.each(myconditioncartobj,function(i,v){

                        if(myconditioncartobj[i].ware_flag == 2 && myconditioncartobj[0].regional_id == myconditioncartobj[mycon_len-1].regional_id)
                        {
                            // alert("resame");
                            $('#real').show();
                            $('#fake').hide();
                            localStorage.setItem('checkgrncart', JSON.stringify(myconditioncartobj));
                            localStorage.setItem('grncart', JSON.stringify(myconditioncartobj));
                            
                        }

                    })
                    
                    //end localstorage
                    $('#warehouse1').val("Regional");
                    $('#de0_reg_id').val(data.regional_id);
                    $('#de0_proj_id').val("");
                        $('#de0_phase_id').val("");
                    $('#de0_main').val("");
                    htmlup +=`
                         <div class="col-md-2">
                        <label>Warehouse</label>
                        <input type="hidden" id="flag" value="2">
                        <input class="form-control" type="text" id="warehouse1" value="Regional" readonly>
                        </div>
                        <div class="col-md-2">
                        <label>Regional Name</label>
                        <input type="hidden" id="reg_id" value="${data.regional_id}">
                        <input class="form-control" type="text" id="warehouse2" value="${data.regional_name}" readonly>
                        </div>
                        




                    `
                    $('#fix_des').html(htmlup);
                    showmodal();
                }
                else if(data.issite == "site")
                {
                    //begin local storage 
                    var checkgrncartone = localStorage.getItem('checkgrncartone');
                    var mycheckgrncartobjone=JSON.parse(checkgrncartone);
                    
                    var checkgrncart = localStorage.getItem('checkgrncart');
                    var mycheckgrncartobj=JSON.parse(checkgrncart);

                    var conditioncart = localStorage.getItem('conditioncart');
                    var myconditioncartobj = JSON.parse(conditioncart);
                    
                    var mycon_len = myconditioncartobj.length;
                
                    var item = {pro_id:myconditioncartobj[mycon_len-1].pro_id,po_id:myconditioncartobj[mycon_len-1].po_id,name:myconditioncartobj[mycon_len-1].name,brand:myconditioncartobj[mycon_len-1].brand,ware_flag:0,regional_id:null,min_qty:myconditioncartobj[mycon_len-1].min_qty,reg_name:null,project_id:data.project_id,phase_id:data.phase_id,stock_qty:parseInt(myconditioncartobj[mycon_len-1].stock_qty)};
                    if(!checkgrncart){
                        checkgrncart = '[]';
                    }
                    if(!checkgrncartone){
                        checkgrncartone = '[]';
                    }
                    if(!conditioncart)
                    {
                        conditioncart = '[]';
                    }
                   

                 
                    var hasid = false;
                    $.each(myconditioncartobj,function(i,v){
                        
                    
                        if(v.po_id == myconditioncartobj[mycon_len-1].po_id && v.pro_id == myconditioncartobj[mycon_len-1].product_id)
                        {
                        hasid = true;
                        v.stock_qty++;
                        }
                    })
                    if(!hasid){
                        myconditioncartobj.push(item);
                    }
                    
                    myconditioncartobj.splice(mycon_len-1, 1);
                    
                    localStorage.setItem('conditioncart', JSON.stringify(myconditioncartobj));

                    $.each(myconditioncartobj,function(i,v){

                        if(myconditioncartobj[i].ware_flag == "" && myconditioncartobj[0].project_id == myconditioncartobj[mycon_len-1].project_id && myconditioncartobj[0].phase_id == myconditioncartobj[mycon_len-1].phase_id)
                        {
                            $('#real').show();
                            $('#fake').hide();
                            localStorage.setItem('checkgrncart', JSON.stringify(myconditioncartobj));
                            localStorage.setItem('grncart', JSON.stringify(myconditioncartobj));
                            
                        }

                    })
                  
                    //end localstorage
                    $('#de0_proj_id').val(data.project_id);
                        $('#de0_phase_id').val(data.phase_id);
                         $('#warehouse1').val("Site");
                         $('#de0_main').val("");
                         $('#de0_main').val("");
                    var checkgrncart = localStorage.getItem('checkgrncart');
                    var mycheckgrncartobj=JSON.parse(checkgrncart);
                    var mycheck_len = mycheckgrncartobj.length;
                    // alert(mycheckgrncartobj[mycheck_len-1].ware_flag);
                    htmlup +=`
                    <div class="col-md-2">
                        <label>Warehouse</label>
                        <input type="hidden" id="flag" value="site">
                        <input class="form-control" type="text" id="warehouse1" value="Site" readonly>
                        </div>
                        <div class="col-md-2">
                        <label>Project</label>
                        <input type="hidden" value="${data.project_id}">
                        <input class="form-control" type="text" id="warehouse2" value="${data.project_name}" readonly>
                        </div>
                        <div class="col-md-2">
                        <label>Phase</label>
                        <input type="hidden" value="${data.phase_id}">
                        <input class="form-control" type="text" id="warehouse3" value="${data.phase_name}" readonly>
                        </div>
                        <div class="col-md-2">
                        <label>Site Name</label>
                        <input type="hidden" value="${data.site_id}">
                        <input class="form-control" type="text" id="warehouse3" value="${data.site_name}" readonly>
                        </div>
                        


                    `
                    $('#fix_des').html(htmlup);
                    showmodal();
                }


            
            

            
             
           }
           
        });



  }

  //check destination
 function checkdesti ()
 {
     var grn_date = $('#grndate').val();
    var decision  = $('#deci').val();
    var ware_flag = $('#flag').val();
    // alert(ware_flag);
    $('#checkdes').val(ware_flag);
    var reg_id = $('#reg_id').val();
    var checkgrncart = localStorage.getItem('checkgrncart');
    var mycheckgrncartobj=JSON.parse(checkgrncart);

    var grncart = localStorage.getItem('grncart');
    var mygrncartobj=JSON.parse(grncart);
    var tot = 0;
    var tota = 0;
    var main =   $('#mainval').val();
    var reg = $('#regionalval').val();
    var proj_id =   $('#projectID').val();

    var phase_id = $('#phaseID').val();
    var enge_id =  $('#engeID').val();
    //Check grn date with pr po date
   


    //end check grn date
    if(decision == 0)
    {
       
        $.each(mycheckgrncartobj,function(i,v){
            
            {
                if(v.ware_flag == 0)
                {
                    if(mycheckgrncartobj[0].project_id == v.project_id && mycheckgrncartobj[0].phase_id == v.phase_id)
                    {
                        tot = "has";
                    }
                    else
                    {
                        tot = "no";
                    }
                }
                else if(mycheckgrncartobj[0].ware_flag == v.ware_flag && v.ware_flag != 0)
                {
                    // alert("same");
                    tot = "has";
                    
                }
                else
                {
                    tot = "no";
                }
            }
           

        

        })
    }
    else if(decision == 1)
            {
               var grn_len = mycheckgrncartobj.length;
            //  alert(grn_len);
                     if(main != 0)
                     {
                         
                         if(mycheckgrncartobj[grn_len-1].ware_flag == main)
                         {
                             tota = "has";
                             
                         }
                         else if(mycheckgrncartobj[grn_len-1].ware_flag != main)
                         {
                             tota = "no";
                         }
                       
                     }
                
                     else if(reg != 0)
                     {
                        console.log("regional");
                        if(mycheckgrncartobj[grn_len-1].regional_id == reg)
                         {
                            console.log("regional has");
                             tota = "has";
                             $('#storegrn').submit();
                         }
                         else
                         {
                            console.log("regional no");
                             tota = "no";
                         }
                     }
                     else
                     {
                        console.log("site");
                        if(mycheckgrncartobj[grn_len-1].project_id == proj_id && mycheckgrncartobj[grn_len-1].phase_id == phase_id)
                         {
                             tota = "has";
                         }
                         else
                         {
                             tota = "no";
                         }
                     }
                
                
            }
            else if(decision == 3)
            {
                tota = "has";
            }
    
    // alert(tot);
    if(tota == "has")
    {
        alert("end");
        document.getElementById("storegrn").submit();
       
        // $('#remarkmodal').modal('show');
        
    }
    else if(tota == "no")
    {
        swal({

title:"Wrong Add!",
text:"Destination is not same with first Item",
icon:"error",
timer: 3000,
});
    }
    if(tot == "has")
    {
        alert("end");
        $('#storegrn').submit();
        // $('#remarkmodal').modal('show');
        
    }
    else if(tot == "no")
    {
        swal({

                title:"Wrong Add!",
                text:"Destination is not same with first Item",
                icon:"error",
                timer: 3000,
                });
    }

    localStorage.clear();
  

 }
  //end

  function changealldes()
  {

    $('#deci').val(3);
      $('#goto').show();
      $('#gotolabel').show();
      $('#fixlabel').hide();
      $('#fix_des').hide();
      $('#manual').hide();
      $('form').submit(function(e) {
        e.preventDefault();
        // or return false;
    });
  }

    
    function showProduct(e) {
        
        e.preventDefault();
      
      var product_name = $('#name option:selected').text();
      
      var product_id = $('#name').val();
      
      var qty = $('#quantity').val();
      
      var purchase_price = $('#purchase_price').val();
      
      var category_id = $('#category').val();
      
      var supplier = $('#supplier').val();
      
      var remark = $('#remark').val();
      
      var html = "";
      
      console.log(product_id);
      
      if($.trim(product_name) == '' || $.trim(qty) == '' || $.trim(purchase_price) == '' || $.trim(category_id) == '' || $.trim(supplier) == '' || $.trim(remark) == '' ){
          
          swal({

                title:"Failed!",
                text:"Please fill all basic field",
                icon:"info",
                timer: 3000,
            });
      }
      
      else{
          
          html += `<div class="row" id="product_table_${product_id}">
                    
                        <div class="col-md-2">
                            <input type="text" class="form-control" value="${product_name}">
                            <input type="hidden" name="remark[]" value="${remark}">
                            <input type="hidden" name="product_id[]" value="${product_id}">
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" value="${category_id}" name="category[]">
                        </div>
                        <div class="col-md-2">
                            <input type="number" class="form-control" name="qty[]" value="${qty}">
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="supplier[]" value="${supplier}">
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="purchase_price[]" value="${purchase_price}">
                        </div>
                        <div class="col-md-2">
                            <button class="btn-outline-danger" type="button" onclick="remove_education_fields(${product_id});"> 
                                <i class="fa fa-minus"></i> 
                            </button>
                        </div>
                    </div>`
                    
                    $('#product').append(html);
      }
        
    }
    
    function remove_education_fields(product_id){
        
        $('#product_table_' + product_id).remove();
    }

    function isregional(){
        // alert("HEEEEEE");
        $('#rename').show();
    }
    function updateisregional(){
        // alert("HEEEEEE");
       var poid =  $('#POID').val();
        $('#updaterename'+poid).show();
    }
    function updateWarehouse(value){
        var poid = $('#POID').val();
        // $('#update_main_radio'+poid).show();
            
        // $('#update_regional_radio'+poid).show();
        if(value == 1){
            
            $('#update_main_radio'+poid).show();
            
            $('#update_regional_radio'+poid).show();
            
            $('#updateproject_box').hide();
            
            $('#updatephase_box').hide();
            
            $('#updatesite_box').hide();

            $('#updaterename').hide();
        }
        
        else if(value == 2){
            
            $('.update_main_radio').hide();
            
            $('.update_regional_radio').hide();
            
            $('#updaterename').hide();

            $('#updateproject_box'+poid).show();
            
            $('#updatephase_box'+poid).show();
            
            $('#updatesite_box'+poid).show();
        }
    }
    
    function isWarehouse(value){
    //    alert("isWarehouse"+value);
        $('#mainval').val(value);
        $('#regionalval').val("");
    
    $('#projectID').val("");
    $('#phaseID').val("");
    $('#engeID').val(""); 
      
        console.log(value);
        
        if(value == 1){
            
            $('#main_radio').show();
            
            $('#regional_radio').show();
            
            $('#project_box').hide();
            
            $('#phase_box').hide();
            
            $('#site_box').hide();

            $('#rename').hide();
        }
        
        else if(value == 2){
            
            $('#main_radio').hide();
            
            $('#regional_radio').hide();
            
            $('#project_box').show();
            
            $('#phase_box').show();
            
            $('#site_box').show();

            $('.rename').hide();
        }
    }

function regionalName(value){
    var reid = value;
    $('#regIDD').val(value);
    $('#regionalval').val(value);
    $('#mainval').val("");
    $('#projectID').val("");
    $('#phaseID').val("");
    $('#engeID').val("");
    console.log(reid);
    $.ajax({
           type:'POST',
           url:'/postregionalnameid',
           dataType:'json',
           data:{ "_token": "{{ csrf_token() }}","id":reid,},

           success:function(data){
            
            console.log(data);
            
            $('#regid').val(data);

            
             
           }
           
        });

}
function getSiteInventoryProjectUpdate(value){
    
       var poid = $('#POID').val();
     $('#projIDD').val(value);
      var project_id = value;
      
      document.getElementById('forPhaseUpdate'+poid).disabled = false;
      
      $('#forPhaseUpdate'+poid).empty();

       $.ajax({
           type:'POST',
           url:'/getProjectSiteInventory',
           dataType:'json',
           data:{ "_token": "{{ csrf_token() }}","id":project_id,},

           success:function(data){
            
            console.log(data);
            
             $.each(data.phases, function(i, value) {

              $('#forPhaseUpdate'+poid).append($('<option>').text(value.phase_name).attr('value', value.id));

            });
             
           }
           
        });

    }
    
    function getSiteInventoryProject(value){
        // alert($('#forPhase').val());
        $('#regionalval').val("");
    $('#mainval').val("");
    $('#projectID').val(value);
    $('#phaseID').val("");
    $('#engeID').val("");
        console.log(value);
        
      var project_id = value;
      
      document.getElementById('forPhase').disabled = false;
      
      $('#forPhase').empty();

       $.ajax({
           type:'POST',
           url:'/getProjectSiteInventory',
           dataType:'json',
           data:{ "_token": "{{ csrf_token() }}","id":project_id,},

           success:function(data){
            
            console.log(data);
            
             $.each(data.phases, function(i, value) {

              $('#forPhase').append($('<option>').text(value.phase_name).attr('value', value.id));

            });
             
           }
           
        });

    }
    function getSiteInventoryPhase(value)
    {
        $('#phaseID').val(value);
    }

    function getSiteInventoryAll(value){
        var phase_id = $('#forPhase').val();
        var proj_id = $('#pro').val();
        var siteeng_id = value
        $('#regionalval').val("");
        $('#mainval').val("");
        $('#projectID').val(proj_id);
        $('#phaseID').val(phase_id);
        $('#engeID').val(siteeng_id);

    }

    function tgPanelclone(i)
    {
        var grncart = localStorage.getItem('grncart');
        var checkgrncart = localStorage.getItem('checkgrncart');
        var conditioncart = localStorage.getItem('conditioncart');

        var myconditioncartobj = JSON.parse(conditioncart);
        var mygrncartobj=JSON.parse(grncart);
        var mycheckgrncartobj=JSON.parse(checkgrncart);
    }

    function tgPanel(i) {
    
        
     
    
        var tr = i.parentElement.parentElement;
        
        var product_id = tr.getElementsByTagName("input")[0].value;
        
        var min = tr.getElementsByTagName("input")[1].value;
        var project_id = tr.getElementsByTagName("input")[2].value;
        var phase_id = tr.getElementsByTagName("input")[3].value;
        var ware_flag = tr.getElementsByTagName("input")[4].value;
        var regional_name= tr.getElementsByTagName("input")[5].value;
        var regional_id = tr.getElementsByTagName("input")[6].value;
        var stock_qty = tr.getElementsByTagName("input")[7].value;
        var product_name = tr.getElementsByTagName("input")[8].value;
        var po_id = tr.getElementsByTagName("input")[9].value;
      var brand = tr.getElementsByTagName("input")[10].value;
      
      var purchase_price = tr.getElementsByTagName("input")[11].value;
      var supplier_name = tr.getElementsByTagName("input")[12].value;
      var supplier_id = tr.getElementsByTagName("input")[13].value;
      var category_id = tr.getElementsByTagName("input")[14].value;
    //   var category_name = tr.getElementsByTagName("input")[15].value;
    
      if(ware_flag == "")
      {
        alert("site");
      var pj_name = tr.getElementsByTagName("input")[15].value;
      var phase_name = tr.getElementsByTagName("input")[16].value;
      var wareFlag = 0;
      }
      else
      {
          var pj_name = 0;
          var phase_name = 0;
      }
      
        if(ware_flag == null)
        {
            wareFlag = 0;
        }
        else
        {
            wareFlag = ware_flag;
        }
        
    
                    
                    
        
       
      
        var grncart = localStorage.getItem('grncart');
        var checkgrncart = localStorage.getItem('checkgrncart');
        var conditioncart = localStorage.getItem('conditioncart');

        var myconditioncartobj = JSON.parse(conditioncart);
        var mygrncartobj=JSON.parse(grncart);
        var mycheckgrncartobj=JSON.parse(checkgrncart);
         // Begin Check Destination
        
        //  $.each(mygrncartobj,function(i,v){  
            
        //         if(mygrncartobj[0].ware_flag == mygrncartobj[i].ware_flag)
        //                 {
                            
        //                 }
        //                 else
        //                 {
                            
        //                     alert("not same");
        //                     document.getElementById('tgpanel'+po_id+pro_id).onclick = null;
        //                 }
            
        //  });  
         

                // End Destination
          //begin 
            var hasid = false;
            
            $.each(mycheckgrncartobj,function(i,v){
               
                if(mycheckgrncartobj[i].pro_id == product_id && mycheckgrncartobj[i].po_id == po_id && mycheckgrncartobj[i].stock_qty == mycheckgrncartobj[i].stock_qty)
                {
                    // alert("hello1");
                    hasid = true;
                    
                    swal({
                    title:'Error',
                    text: "Request Quantity is "+mycheckgrncartobj[i].stock_qty,
                    icon:'error',

                    })
                    // document.getElementById('tgpanel'+po_id+pro_id).onclick = null;
                    
                }
                

                });
     
        //end
       var conitem = {pro_id:product_id,po_id:po_id,name:product_name,cate_id:category_id,brand:brand,prod_name:product_name,pur_price:purchase_price,supp_id:supplier_id,supp_name:supplier_name,ware_flag:wareFlag,regional_id:regional_id,min_qty:min,reg_name:regional_name,project_id:project_id,phase_id:phase_id,pj_name:pj_name,phase_name:phase_name,stock_qty:parseInt(stock_qty)};
       var items = {pro_id:product_id,po_id:po_id,name:product_name,brand:brand,ware_flag:wareFlag,regional_id:regional_id,min_qty:min,reg_name:regional_name,project_id:project_id,pj_name:pj_name,phase_id:phase_id,phase_name:phase_name,stock_qty:parseInt(stock_qty)};
       var item = {pro_id:product_id,po_id:po_id,name:product_name,cate_id:category_id,brand:brand,prod_name:product_name,pur_price:purchase_price,supp_id:supplier_id,supp_name:supplier_name,ware_flag:wareFlag,regional_id:regional_id,min_qty:min,reg_name:regional_name,project_id:project_id,phase_id:phase_id,pj_name:pj_name,phase_name:phase_name,stock_qty:parseInt(stock_qty)};
        var grncart = localStorage.getItem('grncart');
        
        
        if(!grncart){
          grncart = '[]';
        }
        if(!checkgrncart){
          checkgrncart = '[]';
        }
        if(!conditioncart){
            conditioncart = '[]';
        }
       
       
        var mygrncartobj=JSON.parse(grncart);
        var mycheckgrncartobj=JSON.parse(checkgrncart);
        var myconditioncartobj = JSON.parse(conditioncart);
        
        // condition cart
        $.each(myconditioncartobj,function(i,v){
                // v.total_amount = total_amount;
            
                if(v.po_id == po_id && v.pro_id == product_id)
                {
                hasid = true;
                v.stock_qty++;
                }
                
            })
            if(!hasid){
            myconditioncartobj.push(item);
            }
        // end condition cart
       
        // Begin 
        var hasid = false;
        
        var conlen = mycheckgrncartobj.length;
        // alert(conlen);
        if(conlen == 0)
        {
            $.each(mycheckgrncartobj,function(i,v){
                // v.total_amount = total_amount;
            
                if(v.po_id == po_id && v.pro_id == product_id)
                {
                hasid = true;
                v.stock_qty++;
                }
                
            })
            if(!hasid){
            mycheckgrncartobj.push(item);
            }
        }
        else
        {
           alert("no idea");
        }
        
        
       // End
     



        var hasid = false;
        if(conlen == 0)
        {
            $.each(mygrncartobj,function(i,v){
                // v.total_amount = total_amount;
            
                if(v.pro_id == product_id)
                {
                hasid = true;
                v.stock_qty++;
                }
            })
            if(!hasid){
                mygrncartobj.push(items);
            }
        }
     
        
        
        
        
        // var total = 0;
          $.each(myconditioncartobj,function(i,v){

                 total += parseInt(v.stock_qty);
                //  if(i == 0)
                //  {
                     var htmldes = "";
                     if(v.ware_flag == 1)
                     {
                     $('#warehouse1').val("Main");
                     $('#de0_main').val(1);
                     htmldes += `
                        <div class="col-md-4">
                        <label>Warehouse</label>
                        <input type="hidden" id="flag" value="${v.ware_flag}">
                        <input class="form-control" type="text" id="warehouse1" value="Main" readonly>
                        
                        </div>
                        <div class="col-md-2 mt-4 pt-2">
                        <input type="hidden" id="POID" value="${v.po_id}">
                        <button type="button" class="btn btn-outline-success" id="updatedesc" data-toggle="modal" data-target="#upmodal${v.po_id}">Update Destination</button>
                        </div>
                         `
                     }
                     else if(v.ware_flag == 2)
                     {
                        $('#warehouse1').val("Regional");
                        $('#de0_reg_id').val(v.regional_id);
                        htmldes += `
                        <div class="col-md-2">
                        <label>Warehouse</label>
                        <input type="hidden" id="flag" value="${v.ware_flag}">
                        <input class="form-control" type="text" id="warehouse1" value="Regional" readonly>
                        </div>
                        <div class="col-md-2">
                        <label>Regional Name</label>
                        <input type="hidden" id="reg_id"  value="${v.regional_id}">
                        <input class="form-control" type="text" id="warehouse2" value="${v.reg_name}" readonly>
                        </div>
                        <div class="col-md-2 mt-3 pt-3">
                        <input type="hidden" id="POID" value="${v.po_id}">
                        <button type="button" class="btn btn-outline-success" id="updatedesc" data-toggle="modal" data-target="#upmodal${v.po_id}">Update Destination</button>
                        </div>
                        
                         `
                     }
                     else
                     {
                        $('#de0_proj_id').val(v.project_id);
                        $('#de0_phase_id').val(v.phase_id);
                         $('#warehouse1').val("Site");

                        htmldes += `
                        <div class="col-md-2">
                        <label>Warehouse</label>
                        <input type="hidden" id="flag" value="site">
                        <input class="form-control" type="text" id="warehouse1" value="Site" readonly>
                        </div>
                        <div class="col-md-2">
                        <label>Project</label>
                        <input type="hidden"  value="${v.project_id}">
                        <input class="form-control" type="text" id="warehouse2" value="${v.pj_name}" readonly>
                        </div>
                        <div class="col-md-2">
                        <label>Phase</label>
                        <input type="hidden" value="${v.phase_id}">
                        <input class="form-control" type="text" id="warehouse3" value="${v.phase_name}" readonly>
                        </div>
                        <div class="col-md-4 mt-3 pt-3">
                        <input type="hidden"  id="POID" value="${v.po_id}">
                        <button type="button" class="btn btn-outline-success" id="updatedesc" data-toggle="modal" data-target="#upmodal${v.po_id}">Update Destination</button>
                        </div>
                       
                         `
                     }
                     $('#fix_des').html(htmldes);
                //  }
              
          })
        //   $('#testdes').val($('#warehouse1').val());
        // var html1 = "";
        // html1 = `<b><i>${total}</i></b>`;
        // $('#showtotal').html(html1);
        // $('#total_qty').val(total);
        
        localStorage.setItem('grncart',JSON.stringify(mygrncartobj));
        localStorage.setItem('checkgrncart',JSON.stringify(mycheckgrncartobj));
        localStorage.setItem('conditioncart',JSON.stringify(myconditioncartobj));
        var checkgrncart = localStorage.getItem('grncart');
        var checkone = $('#flag').val();
        var checkproject = $('#warehouse2').val();
        var checkphase = $('#warehouse3').val();
        // $.each(mygrncartobj,function(i,v){
        //     if(i > 0){
        //         if(mygrncartobj[i].ware_flag == "")
        //         {
        //             if(mygrncartobj[i].project_id == checkproject || mygrncartobj[i].phase_id == checkphase)
        //             {

        //             }
        //             else
        //             {
        //                 alert("not same");
                       
        //             }
        //         }
        //         else if(mygrncartobj[i].ware_flag != "")
        //         {
        //             if(mygrncartobj[i].ware_flag == checkone)
        //             {

        //             }
        //             else
        //             {
        //                 alert("not same");
                        
        //             }
        //         }
          
        // }
        // });
        var htmlpar = "";
        var htmlpo = "";
        var htmlpro = "";
        var htmlsupp = "";
        var htmlpur = "";
        var htmlcate = "";
        var htmlpoID = "";
        var par = [];
        
        $.each(myconditioncartobj,function(i,v){
           par.push(v.pro_id);
           htmlpar += `<input type="hidden" name="products[]" value="${v.pro_id}">`
           htmlpo += `<input type="hidden" name="po_id[]" value="${v.stock_qty}">`
           htmlpro += `<input type="hidden" name="pro_name[]" value="${v.prod_name}">`
           htmlsupp += `<input type="hidden" name="sup_name[]" value="${v.supp_name}">`
           htmlpur += `<input type="hidden" name="pur_price[]" value="${v.pur_price}">`
           htmlcate += `<input type="hidden" name="cate_id[]" value="${v.cate_id}">` 
           htmlpoID += `<input type="hidden" name="poID[]" value="${v.po_id}">`
        })
        // alert(par);
        // var jst = JSON.stringify(par);
        // $('#parray').val(jst);
        $('#arra').html(htmlpar);
        $('#arrapo').html(htmlpo);
        $('#arraproname').html(htmlpro);
        $('#arrasuppname').html(htmlsupp);
        $('#arrapur').html(htmlpur);
        $('#arracate_id').html(htmlcate);
        $('#arrapoID').html(htmlpoID);

        //Begin condition all

     var decision  = $('#deci').val();
    var ware_flag = $('#flag').val();
    
    $('#checkdes').val(ware_flag);
    var reg_id = $('#reg_id').val();
    var grncart = localStorage.getItem('grncart');
    var checkgrncart = localStorage.getItem('checkgrncart');
    var conditioncart = localStorage.getItem('conditioncart');

    var myconditioncartobj = JSON.parse(conditioncart);
    var mygrncartobj=JSON.parse(grncart);
    var mycheckgrncartobj=JSON.parse(checkgrncart);



    
    var tot = 0;
    var tota = 0;
    var main =   $('#mainval').val();
    var reg = $('#regionalval').val();
    var proj_id =   $('#projectID').val();

    var phase_id = $('#phaseID').val();
    var enge_id =  $('#engeID').val();


    if(decision == 0)
    {
       
        $.each(myconditioncartobj,function(i,v){
            
            {
                if(v.ware_flag == 0)
                {
                    if(myconditioncartobj[0].project_id == v.project_id && myconditioncartobj[0].phase_id == v.phase_id)
                    {
                        tot = "has";
                    }
                    else
                    {
                        tot = "no";
                    }
                }
                else if(myconditioncartobj[0].ware_flag == v.ware_flag && myconditioncartobj[0].regional_id == v.regional_id && v.ware_flag != 0 )
                {
                    // alert("regionalttttt");
                    tot = "has";
                    
                }
                else
                {
                    tot = "no";
                }
            }
           

        

        })
    }
    else if(decision == 1)
            {
               var grn_len = myconditioncartobj.length;
            //  alert(grn_len);
                     if(main != 0)
                     {
                         alert("mmaain");
                         if(myconditioncartobj[grn_len-1].ware_flag == main)
                         {
                             tot = "has";
                             
                         }
                         else if(myconditioncartobj[grn_len-1].ware_flag != main)
                         {
                             tot = "no";
                         }
                       
                     }
                
                     else if(reg != 0)
                     {
                        alert("rreegg");
                        console.log("regional");
                        if(myconditioncartobj[grn_len-1].regional_id == reg)
                         {
                            console.log("regional has");
                             tot = "has";
                             
                         }
                         else
                         {
                            console.log("regional no");
                             tot = "no";
                         }
                     }
                     else
                     {
                        alert("ssiittee");
                        console.log("site");
                        if(myconditioncartobj[grn_len-1].project_id == proj_id && myconditioncartobj[grn_len-1].phase_id == phase_id)
                         {
                             tot = "has";
                         }
                         else
                         {
                             tot = "no";
                         }
                     }
                
                
            }
            else if(decision == 3)
            {
                tot = "has";
            }

    if(tot == "has")
    {
        alert("hsss");
        var total = 0;
        $.each(myconditioncartobj,function(i,v){
            total += parseInt(v.stock_qty);
        })
        var html1 = "";
            html1 = `<b><i>${total}</i></b>`;
            $('#showtotal').html(html1);
            $('#total_qty').val(total);




        $.each(mygrncartobj,function(i,v){
                // v.total_amount = total_amount;
                
                if(v.pro_id == product_id)
                {
                hasid = true;
                v.stock_qty++;
                }
            })
            if(!hasid){
                mygrncartobj.push(items);
            }
            
            localStorage.setItem('grncart',JSON.stringify(myconditioncartobj));
            localStorage.setItem('checkgrncart',JSON.stringify(myconditioncartobj));
            $('#fake').hide();
            $('#real').show();
        
    }
    else if(tot == "no")
    {
        $('#fake').show();
        $('#real').hide();
        swal({

                title:"Wrong Add!",
                text:"Destination is not match !!!",
                icon:"error",
                timer: 3000,
                });

    }
   
    

    //End condition all (checkdestination)

       
        
       
       
       showmodal();
      
    }

    function showmodal(){
        
        var mygrncart = localStorage.getItem('grncart');
        
        if(mygrncart){
          var mygrncartobj = JSON.parse(mygrncart);
          var html=''; var j=1; var total=0;
           
            if(mygrncartobj.length>0){

            $.each(mygrncartobj,function(i,v){
                // alert(i);
                var product_id=v.pro_id;
                var product_name=v.name;
                var qty=v.stock_qty;
                var mini = v.min_qty;
                var brand = v.brand;
            html+=`<tr class="text-center">
                    <td>${product_name}</td>
                    <td>${brand}</td>
                    <td>${mini}</td>
                    <td>${qty}</td>
                    <td><i class="btn btn-danger" id="" onclick="removelocal('${i}')" style="cursor: pointer;" ><i class="fas fa-trash"></i></i></td>
                    </tr>`;
                    j++;
              });

              $("#supplier_product").html(html);

            }
        }

    }

    function removelocal(value)
    {
        alert(value);
        var grncart = localStorage.getItem('grncart');
        var checkgrncart = localStorage.getItem('checkgrncart');
        var conditioncart = localStorage.getItem('conditioncart');

        var myconditioncartobj = JSON.parse(conditioncart);
        var mygrncartobj=JSON.parse(grncart);
        var mycheckgrncartobj=JSON.parse(checkgrncart);
        if(value == 0)
        {
            
             setTimeout(function(){
              window.location.reload();
            },1000);
        }
        else
        {
        myconditioncartobj.splice(value, 1);
        mygrncartobj.splice(value, 1);
        mycheckgrncartobj.splice(value, 1);
        localStorage.setItem('checkgrncart', JSON.stringify(mycheckgrncartobj));
        localStorage.setItem('grncart', JSON.stringify(mygrncartobj));
        localStorage.setItem('conditioncart', JSON.stringify(myconditioncartobj));
        }
        

        showmodal();

    }




</script>

@endsection