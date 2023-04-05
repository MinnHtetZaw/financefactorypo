@extends('master')
@section('title','Invoice Accounting')
@section('link','Invoice Accounting')
@section('content')
<h4 class="text-secondary mb-3">Invoice Accounting - <span style="font-size:20px">Create Invoice Form<span class="text-success">({{$project->name}})</span></span></h4>
<div class="row justify-content-center offset-md-2 mt-2" style="width:700px">
    <div class="card" style="border-radius:25px">
        <div class="card-body">
            <form action="{{route('store_invoice_accounting')}}" method="post">
                @csrf
                <input type="hidden" name="project_id" value="{{$project->id}}">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Invoice No</label>
                        <input type="text" class="form-control border-info" name="invoice_no" >
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Date</label>
                        <input type="date" class="form-control border-info" name="invoice_date" >
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>Desctiption</label>
                <textarea class="form-control border-info" name="description" cols="3" rows="5"></textarea>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label>Total Amount</label>
                        <input type="number" class="form-control border-info" name="total_amt" >
                    </div>
                </div>
                <div class="col-md-4" style="margin-top:6px">
                    <label for="name">Currency</label>
                    <select class="custom-select border-info" name="currency_id">
                    <option>Choose Currency</option>
                    @foreach ($currency as $curr)
                    <option value="{{$curr->id}}">{{$curr->name}}</option>
                    @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label>Total Qty</label>
                <input type="number" class="form-control border-info" name="total_qty" >
            </div>
            <div class="row offset-md-3">
                <div class="col-md-4">
                <div class="form-check form-check-inline col-md-4" id="">
                    <input class="form-check-input border-info" style="margin-top:5px" type="radio" name="paid_flag" id="paid" value="1" onclick="paid_modal()">
                    <label class="form-check-label" for="paid">Paid</label>
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-check form-check-inline" id="">
                    <input class="form-check-input border-info" style="margin-top:5px" type="radio" name="paid_flag" id="unpaid" value="2">
                    <label class="form-check-label" for="unpaid">Not Paid</label>
                </div>
                </div>
            </div>
            <div class="form-group text-center mt-5">
                <button type="submit" class="btn btn-success">Save</button>

                <button type="button" class="btn btn-danger">Cancel</button>
            </div>
        </div>
    </div>
</div>

<!-- Begin Paid Modal -->
        <div class="modal fade" id="paid_invoice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title" id="exampleModalLabel">Paid Method</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4 offset-md-2">
                        <div class="form-check form-check-inline col-md-4" id="">
                            <input class="form-check-input" type="radio" name="exist_asset" id="bank" value="1" onclick="select_bank()">
                            <label class="form-check-label text-success" for="sell">Bank</label>
                        </div>
                        </div>
                        <div class="col-md-4">
                        <div class="form-check form-check-inline col-md-4" id="">
                            <input class="form-check-input" type="radio" name="exist_asset" id="cash" value="2" onclick="select_cash()">
                            <label class="form-check-label text-success" for="end">Cash</label>
                        </div>
                        </div>
                    </div>

                    <div class="form-group bankse" id="bankselect">
                        <label for="name">Bank Accounting List</label>
                        <select class="custom-select border-info" id="bank_acc" name="bank_acc" name="account_id">
                        <option>Choose Account</option>
                            @foreach($accounting as $acc)
                            @if($acc->account_type == 'Bank')
                            <option value="{{$acc->id}}">{{$acc->account_code}}-{{$acc->account_name}}-{{$acc->account_type}}-{{$acc->curr->name}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group cashse" id="cashselect">
                        <label for="name">Cash Accounting List</label>
                        <select class="custom-select border-info" id="cash_acc" name="cash_acc" name="account_id">
                        <option>Choose Account</option>
                            @foreach($accounting as $acc)
                            @if($acc->account_type == 'Cash')
                            <option value="{{$acc->id}}">{{$acc->account_code}}-{{$acc->account_name}}-{{$acc->account_type}}-{{$acc->curr->name}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Pay Date</label>
                        <input type="date" class="form-control border-info" name="date" id="date">
                    </div>
                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group">
                                <label for="name">Pay Amount</label>
                                <input type="number" class="form-control border-info" name="pay_amt" id="pay_amt" value="0">
                            </div>
                        </div>
                        <div class="col-md-5" style="margin-top:38px;">
                            <select class="custom-select border-info form-group" name="currency" onchange="convert(this.value)">
                                <label for="name">Currency</label>
                                <option class="form-control">Choose Currency</option>
                                @foreach ($currency as $curr)
                                <option value="{{$curr->id}}">{{$curr->name}}</option>
                                @endforeach
                                </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Remark</label><br>
                        <textarea class="form-control border-info" name="remark" placeholder="Describe down remark..." rows="3" cols="60"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="save_paid()">Save</button>

                </div>
                </div>
            </div>
        </div>
</form>
        <!-- End Paid Modal -->

@endsection
@section('js')
<script>
    $(document).ready(function()
{
    $('.bankse').hide();
    $('.cashse').hide();
})
    function paid_modal()
    {
        $('#paid_invoice').modal('show');
    }
function select_bank()
{
    $('#bankselect').show();
    $('#cashselect').hide();
}
function select_cash()
{
    $('#bankselect').hide();
    $('#cashselect').show();
}
function save_paid()
{
    $('#paid_invoice').modal('hide');

}
function convert(val){
    // alert(val);
    var isChecked = $('#bank:checked').val()?true:false;
    if(isChecked){
        // alert("bank");
        var bk_ch = $('#bank_acc').val();
        // alert(bk_ch);
    }
    var isCheck = $('#cash:checked').val()?true:false;
    if(isCheck){
        // alert("cash");
        var bk_ch = $('#cash_acc').val();
        // alert(bk_ch);
    }
    $.ajax({
           type:'POST',
           url:'/ajax_convert',
           dataType:'json',
           data:{ "_token": "{{ csrf_token() }}",
           "curr":val,
            "bk_ch" : bk_ch,
            },
           success:function(data){
            // alert(val);
            if(data.convert.currency_id != val){
                if(data.convert.currency_id == 4 || val == 4){
                swal({
                        title: "Are You Sure Convert Currency?",
                        icon: 'warning',
                        buttons: ["No", "Yes"]
                    })
                    .then((isConfirm) => {

                    if (isConfirm) {
                        // alert('hello');
                       var amt =  $('#pay_amt').val();
                       if(val == 4 && data.convert.currency_id == 5){
                           var con_amt = amt * data.usd_rate.exchange_rate;
                           $('#pay_amt').val(con_amt);
                       }
                       else if(val == 4 && data.convert.currency_id == 6){
                        var con_amt = amt * data.euro_rate.exchange_rate;
                           $('#pay_amt').val(con_amt);
                       }
                       else if(val == 4 && data.convert.currency_id == 9){
                        var con_amt = amt * data.sgp_rate.exchange_rate;
                           $('#pay_amt').val(con_amt);
                       }
                       else if(val == 4 && data.convert.currency_id == 10){
                        var con_amt = amt * data.jpn_rate.exchange_rate;
                           $('#pay_amt').val(con_amt);
                       }
                       else if(val == 4 && data.convert.currency_id == 11){
                        var con_amt = amt * data.chn_rate.exchange_rate;
                           $('#pay_amt').val(con_amt);
                       }
                       else if(val == 4 && data.convert.currency_id == 12){
                        var con_amt = amt * data.idn_rate.exchange_rate;
                           $('#pay_amt').val(con_amt);
                       }
                       else if(val == 4 && data.convert.currency_id == 13){
                        var con_amt = amt * data.mls_rate.exchange_rate;
                           $('#pay_amt').val(con_amt);
                       }
                       else if(val == 4 && data.convert.currency_id == 14){
                        var con_amt = amt * data.thai_rate.exchange_rate;
                           $('#pay_amt').val(con_amt);
                       }
                       else if(val == 5 && data.convert.currency_id == 4){
                        var con_amt = parseInt(amt / data.usd_rate.exchange_rate);
                           $('#pay_amt').val(con_amt);
                       }
                       else if(val == 6 && data.convert.currency_id == 4){
                        var con_amt = parseInt(amt / data.euro_rate.exchange_rate);
                           $('#pay_amt').val(con_amt);
                       }
                       else if(val == 9 && data.convert.currency_id == 4){
                        var con_amt = parseInt(amt / data.sgp_rate.exchange_rate);
                           $('#pay_amt').val(con_amt);
                       }
                       else if(val == 10 && data.convert.currency_id == 4){
                        var con_amt = parseInt(amt / data.jpn_rate.exchange_rate);
                           $('#pay_amt').val(con_amt);
                       }
                       else if(val == 11 && data.convert.currency_id == 4){
                        var con_amt = parseInt(amt / data.chn_rate.exchange_rate);
                           $('#pay_amt').val(con_amt);
                       }
                       else if(val == 12 && data.convert.currency_id == 4){
                        var con_amt = parseInt(amt / data.idn_rate.exchange_rate);
                           $('#pay_amt').val(con_amt);
                       }
                       else if(val == 13 && data.convert.currency_id == 4){
                        var con_amt = parseInt(amt / data.mls_rate.exchange_rate);
                           $('#pay_amt').val(con_amt);
                       }
                       else if(val == 14 && data.convert.currency_id == 4){
                        var con_amt = parseInt(amt / data.thai_rate.exchange_rate);
                           $('#pay_amt').val(con_amt);
                       }
                    }
                })
            }
            else{
                swal({
                        title: "You Can't Convert This Currency?",
                        icon: 'warning',
                        buttons: ["No", "Yes"]
                    })
            }
            }
        }
    });

}
</script>
@endsection
