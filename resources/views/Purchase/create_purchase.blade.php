@extends('master')

@section('title','Create Purchase')

@section('place')


@endsection

@section('content')
@php
$from_id = 1;
@endphp
<div class="row page-titles">
    <div class="col-md-12 col-12 align-self-center">
        <h4 class="font-weight-normal">@lang('lang.purchase') @lang('lang.create') Form</h4>
    </div>
</div>


<div class="card shadow-lg col-10 offset-1 mt-4">
<div class="row">
    <div class="col-10 offset-1">
        <form class="form-material m-t-40" method="post" action="{{route('store_purchase')}}" id="store_purchase">
            @csrf
            <input type="hidden" name="type" id="type" value="1">

            <div class="form-group mt-5">
                <label class="font-weight-bold">Purchase No.</label>
                <input type="text" name="purchase_number" class="form-control" value="{{$purchase_number}}">
            </div>

            <div class="form-group">
                <label class="font-weight-bold">@lang('lang.purchase_date')</label>
                <input type="date" name="purchase_date" class="form-control">
            </div>


            <div class="form-group">
            <label class="font-weight-bold">@lang('lang.supplier_name')</label>
            <select class="select_sup form-control ml-2" name="supp_name" id="supp_name" >
                <option></option>
                @foreach($supplier as $sup)
                <option value="{{$sup->id}}">{{$sup->name}}</option>
                @endforeach
            </select>
            </div>

            <div class="form-group">
                <label class="font-weight-bold">Remark</label>
                <input type="text" name="purchase_remark" class="form-control ml-2">
            </div>

            <!-- Header -->

            <div class="row">
                <div class="col-md-1 text-center">
                    <div class="form-group">
                        <label>No.</label>
                    </div>
                </div>
                <div class="col-md-3  text-center">
                    <div class="form-group">
                        <label>Unit Name</label>
                    </div>
                </div>
                <div class="col-md-2  text-center">
                    <div class="form-group">
                       <label>Qty</label>
                    </div>
                </div>
                <div class="col-md-2  text-center">
                    <div class="form-group">
                       <label>Price</label>
                    </div>
                </div>
                <div class="col-md-2  text-center">
                    <div class="form-group">
                        <label>Sub Total</label>
                    </div>
                </div>
                <div class="col-md-1  text-center">

                </div>
            </div>

            <!-- end header -->
            <div id="unit_place">
                <label class="font-weight-bold">Units</label>

            </div>
            <div id="total_amt" class="mt-3">
                <label class="font-weight-bold text-info h5">Total Amount - <span class="m-2" id="total_place"></span></label>
            </div>
            <div class="mt-4 row">
                <div class="col-3 text-bold h5">
                    <label class="font-weight-bold">Adjustment</label>
                </div>
                <div class="col-1 form-check h6">
                    <input class="form-check-input" type="radio" name="adjustment" id="Adjustment1" value="1">
                    <label class="form-check-label" for="Adjustment1">
                        Yes
                    </label>
                  </div>
                  <div class="col-1 form-check mx-2 h6">
                    <input class="form-check-input" type="radio" name="adjustment" id="Adjustment2" value="2">
                    <label class="form-check-label" for="Adjustment2">
                      No
                    </label>
                  </div>
            </div>

            <input type="button" name="btnsubmit" data-target="#storetotal" data-toggle="modal" class="btnsubmit float-right btn btn-primary mb-5" value="Save Unit">
            <div class="modal fade" id="storetotal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header bg-info">
                      <h5 class="modal-title text-white" id="exampleModalLabel">Purchase Pay Method</h5>
                      <label class="font-weight-bold offset-md-3 text-white">Total Amount - <span id="show_total"></span></label>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                        <div class="row offset-md-2">
                            <div class="form-check form-check-inline ml-5">
                                <input class="form-check-input" type="radio" name="pay_method" id="credit_radio" value="1" onclick="credit(this.value)">
                                <label class="form-check-label text-success" for="credit_radio">Credit</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="pay_method" id="cash_radio" value="2" onclick="cash(this.value)">
                                <label class="form-check-label text-success" for="cash_radio">Cash Down</label>
                            </div>
                        </div>
                        <div class="form-group m-2" id="credit_all">
                            <label class="font-weight-bold">Credit Amount</label>
                            <input type="number" id="credit_amount" name="credit_amount" class="form-control" readonly>
                        </div>

                        <div class="form-group m-2">
                            <label class="font-weight-bold">Pay Amount</label>
                            <input type="number" id="pay_amount" name="pay_amount" class="form-control" onkeyup="cal_credit(this.value)">
                        </div>
                    </div><!-- end modal body div -->
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary" onclick="submit_store()">Save changes</button>
                    </div>
                  </div>
                </div>
              </div>
        </form>
    </div>

    <input type="hidden" name="total_amount" id="tot_amt" value="0">
</div>
</div>

@endsection


@section('js')

<script type="text/javascript">

    $(document).ready(function(){

        $('#credit_all').hide();
        $('#repay_all').hide();
        var popurchase = parseInt(localStorage.getItem('popurchase'));
        if(popurchase == 1){
            console.log("PO Purchase");
            $('#purchase_type').val(2).change();
        }

        showmodal();

    });



    var count = 0



    function remove_education_fields(rid) {

        console.log(rid);

        // $('#removeclass_' + rid).remove();
        var myprcart = localStorage.getItem('myprcart');
        var my_pr_total = localStorage.getItem('prTotal');
        var pr_total_obj = JSON.parse(my_pr_total);
        var myprcartobj = JSON.parse(myprcart);
        var item = myprcartobj.findIndex(item =>item.id == rid);
        // alert(item);
        var dele = myprcartobj.filter(dele =>dele.id == rid);
        pr_total_obj.sub_total -= parseInt(dele[0].sub_total);
        myprcartobj.splice(item, 1);
        localStorage.setItem('myprcart',JSON.stringify(myprcartobj));
        localStorage.setItem('prTotal',JSON.stringify(pr_total_obj));
        showmodal();

    }


function cal_credit(pay)
{
    var total_amt = $('#tot_amt').val();
    var credit = parseInt(total_amt) - parseInt(pay);
    $('#credit_amount').val(credit);
}

function credit(value)
{
    $('#credit_all').show();
    $('#repay_all').show();
}
function cash(value)
{
    $('#credit_all').hide();
    $('#repay_all').hide();
}
function submit_store()
{

    $('#store_purchase').submit();
    localStorage.removeItem('myprcart');
    localStorage.removeItem('prTotal');
}
function showmodal()
{
    var html = "";
    var myprcart = localStorage.getItem('myprcart');
    var my_pr_total = localStorage.getItem('prTotal');
    var pr_total_obj = JSON.parse(my_pr_total);
    var myprcartobj = JSON.parse(myprcart);
    var jj=1;
    $.each(myprcartobj,function(i,v){
        html+=`<div class="form-group" id="removeclass_${i}">
        <input type="hidden" id="each_amt" value="${i}">
                    <div class="row">
                        <div class="col-md-1 text-center mt-3">
                            <div class="form-group">
                            <p>${jj++}</p>

                            </div>
                        </div>
                        <div class="col-md-3  text-center">
                            <div class="form-group">
                                <input type="hidden" name="unit[]" value="${v.id}">
                                <input type="text" class="form-control font-weight-bold text-dark" value="${v.unit_name}" readonly>
                            </div>
                        </div>
                        <div class="col-md-2  text-center">
                            <div class="form-group">
                                <input type="number" class="form-control font-weight-bold text-dark" id="qty${v.id}" name="qty[]" value="${v.qty}" onkeyup="change_amt('${v.id}',this.value)" readonly>
                            </div>
                        </div>
                        <div class="col-md-2 text-center">
                            <div class="form-group">
                                <input type="text" class="form-control font-weight-bold text-dark" id="price${v.id}" name="price[]" value="${v.price}" readonly>
                            </div>
                        </div>
                        <div class="col-md-2 text-center">
                            <div class="form-group">
                                <input type="text" name="sub_total[]" class="form-control font-weight-bold text-dark" value="${v.sub_total}" id="sub${v.id}" readonly>
                            </div>
                        </div>
                        <div class="col-md-2 text-center">
                            <button class="btn btn-outline-danger mt-2 btn-lg" type="button" onclick="remove_education_fields(${v.id});">
                            <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
            </div>`
        });
        $("#unit_place").html(html);
        $('#total_place').html(pr_total_obj.sub_total);
        $('#tot_amt').val(pr_total_obj.sub_total);
        $('#show_total').html(pr_total_obj.sub_total);
}
function change_amt(id,qty)
{
    // alert(qty);
    price = $('#price'+id).val();
    var last_total = 0;
    var last_qty = 0;
    var change_qty = parseInt(qty);
    var myprcart = localStorage.getItem('myprcart');
    var my_pr_total = localStorage.getItem('prTotal');
    var pr_total_obj = JSON.parse(my_pr_total);
    var myprcartobj = JSON.parse(myprcart);
    var item = myprcartobj.filter(item =>item.id == id);
    $.each(myprcartobj,function(i,v){
        if(myprcartobj[i].id == id)
        {
            pr_total_obj.total_qty -= parseInt(myprcartobj[i].qty);
            pr_total_obj.total_qty = parseInt(pr_total_obj.total_qty)+change_qty;
            pr_total_obj.sub_total -= parseInt(myprcartobj[i].sub_total);

            myprcartobj[i].qty = change_qty;
            myprcartobj[i].sub_total = myprcartobj[i].price * change_qty;
            pr_total_obj.sub_total +=parseInt(myprcartobj[i].sub_total);

            localStorage.setItem('myprcart',JSON.stringify(myprcartobj));
            localStorage.setItem('prTotal',JSON.stringify(pr_total_obj));
        }


    });
    // pr_total_obj.total_qty += parseInt(qty);
    // pr_total_obj.sub_total = qty * price;
    // localStorage.setItem('prTotal',JSON.stringify(pr_total_obj));

    showmodal();


}

</script>


@endsection
