@extends('master')

@section('title','Add Invoice')
@section('link','Add Invoice')
@section('content')
<style>
.card{
    padding: 1.5em .5em .5em;
    border-radius: 2em;
    text-align: center;
    box-shadow: 0 5px 10px rgba(0,0,0,.2);
}
</style>
<div class="row">
    <div class="col-md-6">
        <h5 class="text-info">Customer Invoice</h5>
        <div class="card">
            <div class="card-shadow">
                <!-- <div class="card-header bg-info">
                    <h5>Customer Invoice</h5>
                </div> -->

                
                <form action="{{route('store_invoice')}}" method="post">
                @csrf
                <div class="card-body">

                <!-- <h5 class="text-success font-weight-bold">Customer Invoice</h5><hr> -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label style="font-size:14px">Project</label>
                                <select class="form-control border border-info"" name="project_id" onchange="getProjectDetail(this.value)">

                                <option selected="selected">Select RFQ Project</option>
                                @foreach($project as $pj)
                                    <option value="{{$pj->id}}">{{$pj->name}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Invoice NO</label>

                                <input type="text" class="form-control border border-info"" id="invoice_no" name="invoice_no" placeholder="Enter Invoice Number">

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Date</label>

                                <input type="date" class="form-control border border-info"" id="invoice_date" name="invoice_date">

                            </div>
                        </div>
                    </div>
                    
                    
                    <hr>
                <!-- Begin Product List -->
                    <div class="form-group">
                        <label class="text-success">Product List</label>
                        <div class="col-12" class="show_hide">
                            <table class="table table-bordered table-striped">
                                <thead class="text-center bg-info">
                                    <th>No</th>
                                    <th>Name</th>                                   

                                    <th>Selling Price</th>
                                    <th>Qty</th>
                                    <th>Sub Total</th> 

                                    <th>Action</th>
                                </thead>
                                <input type="hidden" name="bom_pro" id="bom">
                                <input type="hidden" name="supplier_pricing" id="supp_pric">

                                <input type="hidden" name="total_req_qty" id="totalQty">
                                <input type="hidden" name="total_req_price" id="totalPrice">

                                <tbody id="forProduct" class="text-center">
                                   
                                <?php $i = 1;?>

                                </tbody>
                            </table>

                            <div class="col-md-5 float-right">
                            <label class="text-success">Total Quantity :</label><span id="total"></span></br>
                            <label class="text-success">Total Price:</label><span id="total_price"></span>
                            </div>
                            
                        </div>
                    </div>
                <!-- End Product List -->
               
                </div><!-- End Card Body -->
                <button type="submit" class="btn btn-success float-right m-3">Save</button>

                </form>
            </div>
        </div>
    </div><!-- Left Div End -->

    <div class="col-md-6 p-0 m-0">
    <h5 class="text-primary">Inventory</h5>
        <div class="card">
            <div class="card-shadow">
                <!-- <div class="card-header bg-primary">
                    <h5 class="text-center">Inventory</h5>
                </div> -->

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            
                        </div>
                        <div class="col-md-6">
                           
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <div class="col-md-12">
                            <table class="table  table-striped">
                                <thead class="text-center bg-primary">
                                    <th>No</th>

                                    <th>Code
                                    <th>Name</th>                                   
                                    <th>Selling Price</th>
                                    <th>Stock Qty</th>                              

                                    <th>Action</th>
                                </thead>
                                <tbody id="origin_product" class="text-center">
                                <?php $i = 1;?>
                                @foreach($product as $pros)
                                <tr>
                                <input type="hidden" name="pro_id" id="name{{$pros->id}}" value="{{$pros->name}}">
                                <input type="hidden" id="proID{{$pros->id}}" value="{{$pros->id}}">
                                <input type="hidden" id="brand{{$pros->id}}" value="{{$pros->brand_id}}">                                
                                <input type="hidden" id="cate{{$pros->id}}" value="{{$pros->category_id}}">                                
                                <input type="hidden" id="qty{{$pros->id}}" value="{{$pros->stock_qty}}">

                                <input type="hidden" id="pro_code{{$pros->id}}" value="{{$pros->product_code}}">
                                
                                    <td>{{$i++}}</td>
                                    <td>{{$pros->product_code}}</td>
                                    <td>{{$pros->name}}</td>
                                    <th>{{$pros->selling_price}}</th>
                                    <td>{{$pros->stock_qty}}</td>
                                    <td id="color{{$pros->id}}"><button type="button" style="border-radius:20px" class="btn btn-primary btn-sm" id="add{{$pros->id}}" onclick="tgPanel('{{$pros->id}}','{{$pros->selling_price}}')"><i class="fas fa-plus"></i> Add</i></button></td>

                                   
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                           
                            <!-- Project Detail Modal -->
                            <div class="modal fade proj_detail" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header" id="proj_head">
                                        
                                    </div>
                                    <div class="modal-body" id="proj_body">
                                       <!-- body -->
                                       <div class="row bg-info font-weight-bold p-2">
                                            <div class="col-md-3 text-center">
                                            <span>Name</span>
                                            </div>
                                            <div class="col-md-2">
                                            <span>Estimate Date</span>
                                            </div>
                                            <div class="col-md-3 text-center">
                                            <span>Contact Person</span>
                                            </div>
                                            <div class="col-md-2">
                                            <span>Phone</span>
                                            </div>
                                            <div class="col-md-2">
                                            <span>Location</span>
                                            </div>
                                        </div>
                                        <div id="body">
                                        </div>
                                       <!-- end body -->
                                    </div>
                                </div>
                            </div>
                            </div>
                            <!-- End Project Detail Modal -->
                            
                            
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
$(document).ready(function()
{

});


var count =0;

function tgPanel(id,sell) {

    var products_all_id = @json($product_all);
    // alert(products_all_id);
   
   //Check jquery data-id from tgpanel
   var proid= $(this).data('name');
   //Cneck end
   
   console.log(proid);

    var product_id = $('#proID'+id).val();
    
    var stock = $('#qty'+id).val();
    
    var name = $('#name'+id).val();

    var code = $('#pro_code'+id).val();
    var subtotal = 1*sell;
    var totalp = 1*sell;
    var products = {id:product_id,supplier_id:1,product_code:code,name:name,selling_price:sell,brand:1,category:1,qty:1,stock_qty:parseInt(stock),sub_total:parseInt(subtotal)};
    var total_amount = {total:totalp,total_qty:1};
    var mycart = localStorage.getItem('mycart');
    var grand_total = localStorage.getItem('grandTotal');
    if(!mycart){
          mycart = '[]';
        }
    var mycartobj = JSON.parse(mycart);
   
    if(mycart == null ){
                    
                    mycart = '[]';

                    var mycartobj = JSON.parse(mycart);

                    mycartobj.push(products);

                    localStorage.setItem('mycart',JSON.stringify(mycartobj));
                
                }else{
                    var yes = 1;
                    var mycartobj = JSON.parse(mycart);
                
                    var hasid = false;
                
                    $.each(mycartobj,function(i,v){
                    
                        if(v.id == id ){

                            hasid = true;
                            v.qty +=1 ;
                            
                            if(v.qty > v.stock_qty)
                            
                                {
                                    swal({

                                        title:"Error!",
                                        text:"Increase Qty is greater than existing stock Qty!",
                                        icon:"error",
                                        });
                                        --v.qty;
                                        yes = 2;
                                        
                                }
                            else
                            {
                                
                            v.sub_total += v.selling_price * 1;
                            }
                        }
                    })
                
                    if(!hasid){

                        mycartobj.push(products);
                    }
                
                    localStorage.setItem('mycart',JSON.stringify(mycartobj));
                }
     
        // mybomcartobj.push(products);
        
               
            
            
            localStorage.setItem('mycart',JSON.stringify(mycartobj));
            // $('#add'+id).attr('disabled','disabled');
            var cart_arr = [];
        //    $.each(mybomcartobj,function(i,v){
        //         cart_arr.push(v.id);
        //         if(jQuery.inArray(cart_arr, products_all_id)) {
        //     var htmlcolor = "";
        //     htmlcolor +=`<button class="btn btn-secondary btn-sm"><i class="fas fa-plus"></i>Add</button>`;
        //     $('#color'+id).html(htmlcolor);
        //         } else {
        //             console.log("is NOT in array");
        //         }
        //    })
       
      
           if(grand_total == null){
                        
                        localStorage.setItem('grandTotal',JSON.stringify(total_amount));
                        
                    }else if(yes == 1){
                        
                        var grand_total_obj = JSON.parse(grand_total);
                        
                        grand_total_obj.total = totalp + grand_total_obj.total;
                        
                        grand_total_obj.total_qty = 1 + parseInt(grand_total_obj.total_qty);
                        
                        localStorage.setItem('grandTotal',JSON.stringify(grand_total_obj));
                    }
        
       

           
            
            $('.req').modal('hide');
            // Begin left side
            
            showleft_product()

            var bom =  JSON.stringify(mycartobj);
            $('#bom').val(bom);
        //     htmltotalprice += `${grandTotal_obj.total}`;
        //     htmltotal +=`${grandTotal_obj.total}`;
        //    $('#total').html(htmltotal);
        //    $('#total_price').html(htmltotalprice);
        //    $('#tot').val(total);
        //    Begin Supplier List Modal
            // alert("jk");
                

        //    End Supplier List Modal
}
$("#forProduct").on('click','.btnplus',function(){

console.log("increased");
var id=$(this).data('id');
var stock=$(this).data('stock');
var price=$(this).data('price');
var index=$(this).data('index');
console.log(id);
count_change(id,'+',stock,price,index);

})
$("#forProduct").on('click','.btnminus',function(){

console.log("Decrease");
var id=$(this).data('id');
var stock=$(this).data('stock');
var price=$(this).data('price');
var index=$(this).data('index');
console.log(id);
count_change(id,'-',stock,price,index);

})

function count_change(id,action,stock,price,index){
    // alert(index);
    var grand_total = localStorage.getItem('grandTotal');
        
        var mycart=localStorage.getItem('mycart');
        
        var mycartobj=JSON.parse(mycart);
        // alert(mycartobj[index].qty);
        var grand_total_obj = JSON.parse(grand_total);

        var item = mycartobj.filter(item =>item.id == id);
        // alert(item[0].qty);
if(action=='+'){
    item[0].qty++;
  if(item[0].qty > stock)
  {
    swal({

        title:"Error!",
        text:"Increase Qty is greater than existing stock Qty!",
        icon:"error",
        });
        --item[0].qty;
  }
  else
  {
    //   alert("con");

      
      item[0].sub_total = item[0].qty * price;
        grand_total_obj.total += parseInt(item[0].selling_price)* 1;
        
        grand_total_obj.total_qty +=1;

        localStorage.setItem('mycart',JSON.stringify(mycartobj));

        localStorage.setItem('grandTotal',JSON.stringify(grand_total_obj));

        count_item();

        showleft_product()   

  }
}else{
  item[0].qty--;
  if(mycartobj[0].qty<1){
    var ans=confirm('Are you sure');
    if(ans){
      mycartobj.splice(id,1);
      setTimeout(function(){
             window.location.reload();
         },1000);
    }else{
      item[0].qty++;
    // alert("dec");            
      
      }
  }
  else
  {
//    alert(index);
    if(mycartobj[index].qty < 1)
    {
    var ans=confirm('Are you sure');
    if(ans){
      mycartobj.splice(index,1);
      
    }else{
      item[0].qty++;
    // alert("dec");            
      
      }
    }
    item[0].sub_total -= 1 * price;
        grand_total_obj.total -= parseInt(item[0].selling_price)* 1;
        
        grand_total_obj.total_qty -=1;

        localStorage.setItem('mycart',JSON.stringify(mycartobj));

        localStorage.setItem('grandTotal',JSON.stringify(grand_total_obj));

        count_item();

        showleft_product()   
  }
}
localStorage.setItem('mycart',JSON.stringify(mycartobj));
    count_item();
    
    showleft_product()
}
function count_item(){
        var mycart = localStorage.getItem('mycart');
        if(mycart){
          var mycartobj = JSON.parse(mycart);
          var total_count = 0;

          $.each(mycartobj,function(i,v){
            total_count+=v.qty;
          })
          $(".item_count_text").html(total_count);
        }else{
          $(".item_count_text").html(0);
        }
}
function showleft_product()
{
    // alert("dfdfdfdfdf");
    var mycart = localStorage.getItem('mycart');
    var grandTotal = localStorage.getItem('grandTotal');
        
        var grandTotal_obj = JSON.parse(grandTotal);
    var mybomcartobj = JSON.parse(mycart);

    var htmlshow = "";
            $.each(mybomcartobj,function(i,v){
            htmlshow +=`
                    <tr>
                    <td>${i+1}</td>
                    <td>${v.name}</td>

                    <td>${v.selling_price}</td>
                    <td><i class="fa fa-plus-circle btnplus btn-danger" data-id=${v.id} data-index=${i} data-stock=${v.stock_qty} data-price=${v.selling_price}></i>  ${v.qty}  <i class="fa fa-minus-circle btnminus btn-danger" data-id=${v.id} data-stock=${v.stock_qty} data-index=${i} data-price=${v.selling_price}></i></td>
                    <td>${v.sub_total}</td>

                    <td><span class="badge badge-danger  btn_delete" data-index="${i}"><i class="fas fa-times"></i></span></td>
                    </tr>
            `;
            });
            $('#forProduct').html(htmlshow);

            var htmltotalprice = "";
            var htmltotal = "";
            var total = 0;
            $.each(mybomcartobj,function(i,v){
                total =total + JSON.parse(v.qty);

            });
            var totalprice = 0;
            $.each(mybomcartobj,function(i,v){
                totalprice =totalprice + JSON.parse(v.sub_total);

            });
            htmltotalprice += `${grandTotal_obj.total}`;
            htmltotal +=`${grandTotal_obj.total_qty}`;
           $('#total').html(htmltotal);
           $('#total_price').html(htmltotalprice);
           $('#totalQty').val(grandTotal_obj.total_qty);
           $('#totalPrice').val(grandTotal_obj.total)

}
$("#forProduct").on('click','.btn_delete',function(data){
        var index=$(this).data('index');
        // alert(id);
        var bomcart = localStorage.getItem('bomcart');
        var mybomcartobj = JSON.parse(bomcart);
        // alert(mybomcartobj.length);
        mybomcartobj.splice(index,1);
        
        if(mybomcartobj.length == 0)
        {
            setTimeout(function(){
             		window.location.reload();
             	},1000);
                 localStorage.clear();
        }
        else
        {
            localStorage.setItem('bomcart',JSON.stringify(mybomcartobj));
        }



        
        showleft_product();
        
        
})
function getProjectDetail(proj_id)
{
    // alert(proj_id);
    $.ajax({
           type:'POST',
           url:'/ajax_get_project_detail',
           dataType:'json',
           data:{ "_token": "{{ csrf_token() }}",
           "project_id":proj_id,
        },
           success:function(data){
               var htmlhead = "";
               var htmlbody = "";
               htmlhead +=`<label class="text-success">${data.name}</label>`;
               $('#proj_head').html(htmlhead);
               htmlbody +=`
               
                        <div class="row mb-1 mt-3 font-weight-bold" style="font-size:18px;">                
                            <div class="col-md-3">
                                <span>${data.name}<span>
                            </div>
                            <div class="col-md-2">
                                <span>${data.estimate_date}</span>
                            </div>
                            <div class="col-md-3 text-center">
                                <span>${data.project_contact_person}</span>
                            </div>
                            <div class="col-md-2">
                                <span>${data.phone}</span>
                            </div>
                            <div class="col-md-2">
                                <span>${data.location}</span>
                            </div>
                        </div>
               
               `;
            $('#body').html(htmlbody);
            var rfq = "image/"+data.rfq_file_path;
            
            
            $('#file').attr("href",rfq);
           }
        });


}

function price_sup(product_id)
{
    var supplier_id = $('#SupplierID'+product_id).val();
    var quo_price = $('#quo_price'+product_id).val();
    var propo_price = $('#proposed_price'+product_id).val();
    var profit = $('#profit'+product_id).val();
    var margin = $('#margin'+product_id).val();
    // alert(quo_price+propo_price);
    if($.trim(quo_price) == '' || $.trim(propo_price) == ''){
          
          swal({

                title:"Failed!",
                text:"Please fill all basic field",
                icon:"info",
                timer: 3000,
            });
      }
      else
      {
          var supplier_price = {id:product_id,supplier_id:supplier_id,quoted_price:quo_price,proposed_price:propo_price,profit:profit,margin:margin};
          var pricecart = localStorage.getItem('pricecart');
          if(!pricecart){
          pricecart = '[]';
        }
        var mypricecartobj = JSON.parse(pricecart);
        var hasid = false;
        
            $.each(mypricecartobj,function(i,v){
                // v.total_amount = total_amount;
            
                if(v.id == product_id)
                {
                hasid = true;
                
                }
            })
            if(!hasid){
                mypricecartobj.push(supplier_price);
            }
            
            localStorage.setItem('pricecart',JSON.stringify(mypricecartobj));
            var str_price = JSON.stringify(mypricecartobj);
            $('#supp_pric').val(str_price);
            $('#priceSave'+product_id).hide();

      }
    
 }
 function keypropose(product_id)
 {
    var quo_price = $('#quo_price'+product_id).val();
            var propo_price = $('#proposed_price'+product_id).val();
    if(JSON.parse(quo_price) > JSON.parse(propo_price))
        {
            
            $('.error').show();
            $('.pricesave').attr('disabled',true);
        }
        else
        {
            $('.error').hide();
            var profit_in = JSON.parse(propo_price) - JSON.parse(quo_price);
            var margin_in = (JSON.parse(quo_price) / JSON.parse(propo_price)) * 100;
            $('#profit'+product_id).val(profit_in);
            var margin = $('#margin'+product_id).val(margin_in);
            $('.pricesave').attr('disabled',false);
        }
   
 }
 $(document).ready(function()
 {
    $('.pricesave').attr('disabled',true);
    $('.error').hide();
 })

</script>

@endsection