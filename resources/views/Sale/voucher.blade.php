@extends('master')

@section('title','Voucher Page')

@section('place')

<div class="col-md-5 col-8 align-self-center">
    <h3 class="text-themecolor m-b-0 m-t-0">Sale Page</h3>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin_dashboard')}}">Back to Dashborad</a></li>
        <li class="breadcrumb-item active">Sale Page</li>
    </ol>
</div>

@endsection

@section('content')

<style>
    
    h6{
        font-size:15px;
        font-weight:600;
        line-height: 80%;
        letter-spacing: -1px;
    }
    .table td, .table th {
        border: none;
    }
  
</style>


<div class="row">
   <div class="card col-md-8">
        <div class="card-body">
            <div class="br-n pn">
                <div class="row justify-content-center">
                    <div class="col-md-8 printableArea" style="width:45%;">
                        <div class="card card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="text-center">
                                        <address>
                                            <h5> &nbsp;<b class="text-center">K-Win Clinic</b></h5>
                                            <h6>(ဆေးခန်းသုံး POS )</h6>
                                            <h6><i class="fas fa-mobile-alt"></i> 01-9669013,9669014,663371 , 09-8623171 , 09-5171618,Fax: 01-9669014 </h6>
                                        </address>
                                    </div>
                                    <div class="pull-right text-left">
                                        <h6>Date : <i class="fa fa-calendar"></i> {{$today_date}}</h6>
                                        <h6>Voucher Number : {{$voucher_code}}</h6>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="table-responsive" style="clear: both;">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Unit</th>
                                                    <th>Price*Qty</th>
                                                    <th >Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td colspan="4" style="font-weight:400">Doctor's Services</td>
                                                </tr>
                                              @php
                                                  $allTotal=0;
                                                  $allQty=0;
                                              @endphp
                                                @if(!empty($docServiceItem))
                                                @foreach($docServiceItem as $docServiceitem)
                                                <tr>
                                            
                                                        <td style="font-size:15px;">{{$docServiceitem->name}}</td>
                                                        <td style="font-size:15px;">
                                                        </td>
                                                    <td style="font-size:15px;">{{$docServiceitem->charges}} * {{$docServiceitem->qty}} </td>
                                                    <td style="font-size:15px;text-align:right" id="subtotal">{{$docServiceitem->charges * $docServiceitem->qty}}</td> 
                                            
                                                </tr>
                                              
                                              

                                                @endforeach
                                                    @php
                                                    $allTotal+=$docServiceGrandTotal->sub_total;
                                                    $allQty+=$docServiceGrandTotal->total_qty;
                                                    @endphp
                                                @endif
                                                <tr>
                                                    <td colspan="4" style="font-weight: 400">Package & Services</td>
                                                </tr>
                                                @if (!empty($pagServiceItem))
                                                @foreach($pagServiceItem as $pagServiceitem)
                                                <tr>
                                            
                                                        <td style="font-size:15px;">{{$pagServiceitem->service_name}}</td>
                                                        <td style="font-size:15px;">{{$pagServiceitem->type}}
                                                        </td>
                                                    <td style="font-size:15px;">{{$pagServiceitem->charges}} * {{$pagServiceitem->qty}} </td>
                                                    <td style="font-size:15px;text-align:right" id="subtotal">{{$pagServiceitem->charges * $pagServiceitem->qty}}</td> 
                                            
                                                </tr>
                                                @endforeach
                                                    @php
                                                    $allTotal+=$pagServicegrandTotal->sub_total;
                                                    $allQty+=$pagServicegrandTotal->total_qty;
                                                    @endphp
                                                @endif
                                                <tr>
                                                    <td colspan="4" style="font-weight: 400">Medicine</td>
                                                </tr>

                                                @if (!empty($items))
                                                @foreach($items as $item)
                                                <tr>
                                            
                                                        <td style="font-size:15px;">{{$item->item_name}}</td>
                                                        <td style="font-size:15px;">{{$item->unit_name}}
                                                        </td>
                                                    <td style="font-size:15px;">{{$item->selling_price}} * {{$item->order_qty}} </td>
                                                    <td style="font-size:15px;text-align:right" id="subtotal">{{$item->selling_price * $item->order_qty}}</td> 
                                            
                                                </tr>
                                                @endforeach
                                                @if ($deliveryinfo['delivery']==2)
                                                <tr>
                                                    <td colspan="3">Delivery charges</td>
                                                    <td >{{$deliveryinfo['charges']}}</td>
                                                </tr>
                                                @php
                                                $allTotal+= $deliveryinfo['charges'];
                                                @endphp

                                                @endif
                                                
                                                    @php
                                                    $allTotal+=$grand->sub_total;
                                                    $allQty+=$grand->total_qty;
                                                    @endphp
                                                @endif
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="text-right" style="font-size:18px;">Total</td>
                                                    <td id="total_charges" class="font-weight-bold" style="font-size:18px;"> {{$allTotal}}</td>
                                                    <input type="hidden" id="allQty" value="{{$allQty}}">
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="text-right" style="font-size:18px;">Pay</td>
                                                    <td id="pay" style="font-size:18px;"></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="text-right" style="font-size:18px;">Change</td>
                                                    <td id="changes" style="font-size:18px;"></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                        <h6 class="text-center font-weight-bold">**ကျေးဇူးတင်ပါသည်***</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="row">
            <div class="col-md-12">
                <label class="control-label">Customer Name</label>
                <input type="text" class="form-control" id="name" required>
            </div>
            <div class="col-md-12">
                <label class="control-label">Customer Phone</label>
                <input type="number" class="form-control" id="phone">
            </div>
            <div class="col-md-12">
                <label class="control-label">Credit Amount</label>
                <input type="number" class="form-control" value="0" id="credit" > 
            </div>
            <br/>
            <div class=" col-md-12">
                <label>Repayment Date </label>
                <input type="text" class="form-control" id="repaymentDate" name="request_date">
            </div>
                            <br/><br/><br>
            <br/>
            <div class="col-md-12">
                <label class="control-label">Customer Pay </label><br>
                <label class="control-label" style="font-size:14px; font-weight:bold; height: 5px">(Total: {{$allTotal}} MMK) </label><br><br>

                <input type="number" onchange="getCreditAmount(this.value)" class="form-control" id="payable"> 
            </div>
        </div><br/>
        <div class="row">
            <div class="col-md-6">
                <button id="print" class="btn btn-info" type="button"> <span><i class="fa fa-print"></i> Print</span> </button>
            </div>
            <div class="col-md-6">
                <button id="store_voucher" class="btn btn-info" type="button"> <span><i class="fa fa-calendar-check"></i> Store Voucher</span> </button>
            </div>
            <div class="col-md-6 mt-2">
                <a href="{{route('sale_page')}}" class="btn btn-danger">Return to Sale Page</a>
            </div>
        </div>
    </div>
   
</div>

                   

@endsection

@section('js')

<script src="{{asset('assets/js/jquery.PrintArea.js')}}" type="text/JavaScript"></script>

<script type="text/javascript">
  $(document).ready(function(){
       $(".select2").select2(); 
       //getCustomers();
    });
    //jquery
    $("#repaymentDate").datetimepicker({
            format: 'YYYY-MM-DD'
        });

  function getCreditAmount(pay_amount){
    var total_charges = parseInt($('#total_charges').text());
    if(pay_amount>total_charges){
          var credit_amt = 0;
    }
    else{
          var credit_amt = total_charges - pay_amount;
    }
  
    $("#credit").val(credit_amt);
  }
    function clearLocalstorage(right_now_customer){

        if(right_now_customer!=0){
        var cartname = "mycart_"+right_now_customer;
        var grand_totalname = "grandTotal_"+ right_now_customer;

        var docServiceCart = "docServiceCart_"+right_now_customer;
        var docServiceGrandTotal = "docServiceGrandTotal_"+ right_now_customer;
        var pagServiceCart = "pagServiceCart"+right_now_customer;
        var pagServicegrandTotal = "pagServicegrandTotal"+ right_now_customer;

        var local_customer = localStorage.getItem('local_customer_lists');
        var local_customer_array = JSON.parse(local_customer);
        $.each(local_customer_array,function(i,v){
            if(v==right_now_customer){
                local_customer_array.splice(i,1);
            }
        })
        localStorage.setItem('local_customer_lists',JSON.stringify(local_customer_array));
        localStorage.removeItem(cartname);
        localStorage.removeItem(grand_totalname);
        localStorage.removeItem(docServiceCart);
        localStorage.removeItem(docServiceGrandTotal);
        localStorage.removeItem(pagServiceCart);
        localStorage.removeItem(pagServicegrandTotal);
        }
        localStorage.removeItem('mycart');
        localStorage.removeItem('grandTotal');
        localStorage.removeItem('docServiceCart');
        localStorage.removeItem('docServiceGrandTotal');
        localStorage.removeItem('pagServiceCart');
        localStorage.removeItem('pagServicegrandTotal');
    }
   
    var last_row_id = 0;
    
 
    $("#print").click(function() {
        var printable =$( "#salescustomer_list" ).val();
        
        
        var item = @json($items);

        var grand = @json($grand);

        var docServiceItem = @json($docServiceItem);

        var pagServiceItem = @json($pagServiceItem);

        var deliveryinfo= @json($deliveryinfo);

        var right_now_customer = @json($right_now_customer);
        var voucher_code = @json($voucher_code);
        var pay = parseInt($('#payable').val());
        var name = $('#name').val();
        
        var phone = $('#phone').val();
        var repaymentDate=$("#repaymentDate").val();
        
        var credit = $('#credit').val();
        var allTotal = parseInt($('#total_charges').text());
        var allQty = $('#allQty').val();
        var changes = pay - allTotal;
        //isset 
        // ? $('#salescustomer_list').children("option:selected").val() : last_row_id;
      
        $("#changes").text(changes);
        
        $("#pay").text(pay);
        
        $("#changes_1").text(changes);
        
        $("#pay_1").text(pay);
        
        $("#cus_name").text(name);
        
        $("#cus_phone").text(phone);
        
        $("#credit_amount").text(credit);
        $("#credit").val(credit);
    
        if(!pay){
            swal({
                icon: 'error',
                title: 'Check Customer Pay Again!',
                text: 'Customer Pay cannot be null!!!',
                footer: '<a href>Why do I have this issue?</a>'
            })
        }
        else if(pay < allTotal){
            swal({
                icon: 'error',
                title: 'Check Customer Pay Again!',
                text: 'Customer Pay must be greater than or equal Total Amount!!!',
                footer: '<a href>Why do I have this issue?</a>'
            })
        }
        else{
            //last_row_id
            {
$.ajax({
    type:'POST',
    url:'Voucher',
    dataType:'json',
    data:{ 
      "_token": "{{ csrf_token() }}",
      "item": item,
      "grand": grand,
      "docServiceItem": docServiceItem,
      "pagServiceItem": pagServiceItem,
      "allTotal":allTotal,
      "allQty":allQty,
      "voucher_code": voucher_code,
      "credit_amount": credit,
      "printable" : printable,
      "deliveryinfo": deliveryinfo,
      "pay" : $('#payable').val(),
    },
    success: function(){
        var mode = 'iframe'; //popup
        var close = mode == "popup";
        var options = {
            mode: mode,
            popClose: close
        };
            
        $("div.printableArea").printArea(options);   
    },            
}); 
clearLocalstorage(right_now_customer);          
}    
            //end last_row
        }
    });
    $("#store_voucher").click(function(){
        
        var salecustomer_id = $('#salescustomer_list').children("option:selected").val();
        var item = @json($items);
        var grand = @json($grand);

        var docServiceItem = @json($docServiceItem);

        var pagServiceItem = @json($pagServiceItem);

        
        var voucher_code = @json($voucher_code);
        var right_now_customer= @json($right_now_customer);
        var deliveryinfo= @json($deliveryinfo);
        var cus_pay = $('#payable').val();
    
        var allTotal = parseInt($('#total_charges').text());
        var allQty = $('#allQty').val();
        var repaymentDate=$('#repaymentDate').val();
        
        var name = $('#name').val();
        
        var credit = $('#credit').val();
        if(!cus_pay){
            swal({
                icon: 'error',
                title: 'Check Customer Pay Again!',
                text: 'Customer Pay cannot be null!!!',
                footer: '<a href>Why do I have this issue?</a>'
            })
        }
        // else if(cus_pay < total){
        //     swal({
        //         icon: 'error',
        //         title: 'Check Customer Pay Again!',
        //         text: 'Customer Pay must be greater than or equal Total Amount!!!',
        //         footer: '<a href>Why do I have this issue?</a>'
        //     })
        // }
        else{
            //last_row_id
           
            $.ajax({
                type:'POST',
                url:'Voucher',
                dataType:'json',
                data:{ 
                  "_token": "{{ csrf_token() }}",
                  "item": item,
                  "grand": grand,
                  "docServiceItem": docServiceItem,
                  "pagServiceItem": pagServiceItem,
                  "allTotal":allTotal,
                  "allQty":allQty,
                  "voucher_code": voucher_code,
                  "credit_amount": credit,
                  "deliveryinfo": deliveryinfo,
                },
                success: function(data){
                    console.log(data);
                    swal({
                        icon: 'success',
                        title: 'Successfully Stored Voucher!',
                        text: 'Voucher is Successfully stored!!!',
                    })
                    clearLocalstorage(right_now_customer);

                     setTimeout(function(){
                        window.location.href = "{{ route('sale_page')}}";
                     }, 1000);
                },            
            });
            //end last_row_id
        }
    });

</script>

@endsection