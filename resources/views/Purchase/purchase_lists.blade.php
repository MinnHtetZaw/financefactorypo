@extends('master')

@section('title','Purchase History')

@section('place')

@endsection

@section('content')

<div class="row page-titles mb-3">
    <div class="col-md-5 col-8 align-self-center">
        <h4 class="font-weight-normal">@lang('lang.purchase_history') @lang('lang.list')</h4>
    </div>

        {{-- <div class="col-md-7 col-4 align-self-center">
            <div class="d-flex m-t-10 justify-content-end">
                <a href="{{route('create_purchase')}}" class="btn btn-outline-primary">
                    <i class="fas fa-plus"></i>
                    @lang('lang.purchase_history') @lang('lang.create')
                </a>
            </div>
        </div> --}}
</div>

<div class="row justify-content-center">
    <div class="col-12">
        <div class="card ">
            <div class="card-body">
                <div class="table-responsive text-black ">
                    <table class="table">
                        <thead class="text-center bg-info">
                            <tr>
                                <th>#</th>
                                <th>@lang('lang.purchase_date')</th>
                                <th>@lang('lang.total') @lang('lang.quantity')</th>
                                <th>@lang('lang.total') @lang('lang.price')</th>
                                <th>@lang('lang.purchase_by')</th>
                                <th>@lang('lang.supplier_name')</th>
                                <th></th>
                                <th>@lang('lang.action')</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php $i=1;?>
                            @foreach($purchase_lists as $list)
                                <tr>
                                    <th class="font-weight-normal">{{$i++}}</th>
                                    <th class="font-weight-normal">{{date('d-m-Y', strtotime($list->purchase_date))}}</th>
                                    <th class="font-weight-normal">{{$list->total_quantity}}</th>
                                    <th class="font-weight-normal">{{$list->total_price}}</th>
                                    <th class="font-weight-normal">{{$list->user->name}}</th>
                                    <th class="font-weight-normal">{{$list->supplier_name}}</th>
                                    <th>
                                        <a href="{{route('purchase_details',$list->id)}}" class="btn btn-outline-primary">
                                            <i class="fas fa-check"></i>
                                            Check Details
                                        </a>
                                    </th>
                                    <th class="text-center"><a class="btn btn-primary btn-sm " data-toggle="collapse" href="#related{{$list->id}}" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Related</a></th>
                                    <th> <button type="button" data-toggle="modal" data-target="#add_expenses{{$list->id}}" class="btn btn-primary" onclick="hide_bank_acc()"><i class="fas fa-plus"></i> Add Expense</button>
                                        <tr>


                                            <td colspan="9">
                                                <div class="collapse" id="related{{$list->id}}">
                                                    <table class="table" style="background-color:blanchedalmond">
                                                        <thead>
                                                            <tr >
                                                                <th>No</th>
                                                                <th>Account</th>
                                                                <th>Type</th>
                                                                <th>Date</th>
                                                                <th>Amount</th>
                                                            </tr>

                                                        </thead>
                                                        <tbody>
                                                            <?php $j=1 ?>
                                                            @foreach($bank_cash_tran as $transa)
                                                            @if($transa->purchase_id == $list->id)

                                                            <tr>
                                                                <td>{{$j++}}</td>
                                                                <td>{{$transa->accounting->account_code}}-({{$transa->accounting->account_name}})</td>
                                                                <td>{{$transa->type}}</td>
                                                                <td>{{$transa->date}}</td>
                                                                <td>{{$transa->amount}}</td>
                                                            </tr>
                                                            @endif
                                                            @endforeach
                                                        </tbody>
                                                    </table>

                                                </div>

                                            <td>
                                            </tr>
                                    </th>
                                </tr>


                                <div class="modal fade" id="add_expenses{{$list->id}}" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Expense</h4>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                            </div>

                                            <div class="modal-body">

                                                <form action="{{route('store_factorypo_expense')}}" method="POST">

                                                    @csrf
                                                    <input type="text" value="{{$list->id}}" name="purchase_id" hidden>
                                                    <div class="row offset-md-5">
                                                        <div class="col-md-2">
                                                        <div class="form-check form-check-inline">

                                                            <input class="form-check-input" type="radio" name="account" id="bank" value="1" onclick="show_bank_acc({{$list->id}})">

                                                            <label class="form-check-label text-success" for="bank">Bank</label>
                                                          </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                          <div class="form-check form-check-inline">


                                                            <input class="form-check-input" type="radio" name="account" id="cash" value="2" onclick="show_cash_acc({{$list->id}})">

                                                            <label class="form-check-label text-success" for="cash">Cash</label>
                                                        </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group mt-3 bbbb" id="bankkk{{$list->id}}" >
                                                        <label class="control-label">Bank Account</label>
                                                        <select class="form-control" name="bank_acc" id="bank_acc" class="bk">
                                                            <option value="">Select Bank Account</option>

                                                           @foreach ($account as $acc)
                                                            {{-- @if ($acc->account_name != "Inventory") --}}

                                                            <option value="{{$acc->id}}">{{$acc->account_name}}-{{$acc->account_code}}-{{$acc->curr->name}}</option>

                                                            {{-- @endif --}}
                                                           @endforeach
                                                        </select>
                                                    </div>


                                                    <div class="form-group mt-3 cccc" id="cashhh{{$list->id}}" >
                                                        <label class="control-label">Cash Account</label>
                                                        <select class="form-control" name="cash_acc" id="cash_acc">
                                                            <option value="">Select Cash Account</option>
                                                           @foreach ($cash_account as $acc)
                                                           {{-- @if ($acc->account_name != "Inventory") --}}

                                                            <option value="{{$acc->id}}">{{$acc->account_name}}-{{$acc->account_code}}-{{$acc->curr->name}}</option>

                                                            {{-- @endif --}}
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                            <div class="form-group mt-3">

                                                                <label class="control-label">Expense Account</label>
                                                                <select class="form-control" name="exp_acc">
                                                                    <option value="">Select Expense Account</option>
                                                                   @foreach ($exp_account as $acc)
                                                                    <option value="{{$acc->id}}">{{$acc->account_name}}-{{$acc->account_code}}-{{$acc->curr->name}}</option>
                                                                   @endforeach

                                                                </select>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Amount</label>

                                                                        <input type="number" class="form-control" name="amount" id="convert_amount" value="{{$list->total_price}}">

                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Currency</label>

                                                                        <select name="currency" id="" class="form-control mt-1" onchange="convert(this.value)">

                                                                            <option value="">Choose Currency</option>
                                                                            @foreach ($currency as $curr)
                                                                                <option value="{{$curr->id}}">{{$curr->name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <div class="form-group">
                                                                <label class="control-label">Date</label>

                                                                <input type="date" class="form-control"  name="date">

                                                            </div>

                                                            <div class="form-group">
                                                                <label class="control-label">Voucher Number</label>
                                                                <input type="text" class="form-control" name="voucher_id">
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="control-label">Remark</label>
                                                                <input type="text" class="form-control" name="remark">
                                                            </div>


                                                                <div class="row">
                                                                    <div class="mt-4 col-md-9">
                                                                        <button type="submit" class="btn btn-success">Submit</button>
                                                                        <button type="button" class="btn btn-inverse btn-dismiss" data-dismiss="modal">Cancel</button>
                                                                    </div>
                                                                </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection

@section('js')

<script>
$( document ).ready(function() {
        $('.bbbb').hide();
        $('.cccc').hide();
    });

function show_bank_acc(id){
    // alert('hello');
    $('#cashhh'+id).hide();
    $('#bankkk'+id).show();

}

function show_cash_acc(id){
    // alert('hello');
    $('#bankkk'+id).hide();
    $('#cashhh'+id).show();
}

function hide_bank_acc(){
    // alert('hello');
    $('#bankkk').hide();
    $('#cashhh').hide();
    $('#proj').hide();
}

function show_project(){
        // alert('hello');
        $('#proj').show();
}

function hide_project(){
        // alert('hello');
        $('#proj').hide();
}

function convert(val){

var isChecked = $('#bank:checked').val()?true:false;
if(isChecked){
    // alert("bank");
    var bk_ch = $('#bank_acc').val();
    // alert(bk_ch);
}
var isCheck = $('#cash:checked').val()?true:false;
if(isCheck){
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
                   var amt =  $('#convert_amount').val();
                   if(val == 4 && data.convert.currency_id == 5){
                       var con_amt = amt * data.usd_rate.exchange_rate;
                       $('#convert_amount').val(con_amt);
                   }
                   else if(val == 4 && data.convert.currency_id == 6){
                    var con_amt = amt * data.euro_rate.exchange_rate;
                       $('#convert_amount').val(con_amt);
                   }
                   else if(val == 4 && data.convert.currency_id == 9){
                    var con_amt = amt * data.sgp_rate.exchange_rate;
                       $('#convert_amount').val(con_amt);
                   }
                   else if(val == 4 && data.convert.currency_id == 10){
                    var con_amt = amt * data.jpn_rate.exchange_rate;
                       $('#convert_amount').val(con_amt);
                   }
                   else if(val == 4 && data.convert.currency_id == 11){
                    var con_amt = amt * data.chn_rate.exchange_rate;
                       $('#convert_amount').val(con_amt);
                   }
                   else if(val == 4 && data.convert.currency_id == 12){
                    var con_amt = amt * data.idn_rate.exchange_rate;
                       $('#convert_amount').val(con_amt);
                   }
                   else if(val == 4 && data.convert.currency_id == 13){
                    var con_amt = amt * data.mls_rate.exchange_rate;
                       $('#convert_amount').val(con_amt);
                   }
                   else if(val == 4 && data.convert.currency_id == 14){
                    var con_amt = amt * data.thai_rate.exchange_rate;
                       $('#convert_amount').val(con_amt);
                   }
                   else if(val == 5 && data.convert.currency_id == 4){
                    var con_amt = parseInt(amt / data.usd_rate.exchange_rate);
                       $('#convert_amount').val(con_amt);
                   }
                   else if(val == 6 && data.convert.currency_id == 4){
                    var con_amt = parseInt(amt / data.euro_rate.exchange_rate);
                       $('#convert_amount').val(con_amt);
                   }
                   else if(val == 9 && data.convert.currency_id == 4){
                    var con_amt = parseInt(amt / data.sgp_rate.exchange_rate);
                       $('#convert_amount').val(con_amt);
                   }
                   else if(val == 10 && data.convert.currency_id == 4){
                    var con_amt = parseInt(amt / data.jpn_rate.exchange_rate);
                       $('#convert_amount').val(con_amt);
                   }
                   else if(val == 11 && data.convert.currency_id == 4){
                    var con_amt = parseInt(amt / data.chn_rate.exchange_rate);
                       $('#convert_amount').val(con_amt);
                   }
                   else if(val == 12 && data.convert.currency_id == 4){
                    var con_amt = parseInt(amt / data.idn_rate.exchange_rate);
                       $('#convert_amount').val(con_amt);
                   }
                   else if(val == 13 && data.convert.currency_id == 4){
                    var con_amt = parseInt(amt / data.mls_rate.exchange_rate);
                       $('#convert_amount').val(con_amt);
                   }
                   else if(val == 14 && data.convert.currency_id == 4){
                    var con_amt = parseInt(amt / data.thai_rate.exchange_rate);
                       $('#convert_amount').val(con_amt);
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
