@extends('master')
@section('title','Pay Invoice')
@section('link','Pay Invoice')
@section('content')
<style>
        td {

            text-align: left;
            font-size: 20px;
            font-weight: bold;
            overflow: hidden;
            white-space: nowrap;
        }

        th {
            text-align: left;
            font-size: 15px;
        }

        h6 {
            font-size: 15px;
            font-weight: 600;
        }

        .btn {
            width: 130px;
            overflow: hidden;
            white-space: nowrap;
        }

    </style>

<div class="row justify-content-center pl-4 mt-2"  style="font-weight: 500">
            <div class="col-md-8 text-left font14">
                <div class="row mb-2">
                    <div class="col-md-6">
                            Project Name :
                         {{$sale_project->name}}
                    </div>
                    <div class="col-md-6">

                        expected_budget : {{$sale_project->expected_budget}}
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-6">
                        Submission Date : {{$sale_project->submission_date}}

                    </div>
                    <div class="col-md-6">
                        Project Value : {{$sale_project->project_value}}</span>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-6">

                        Estimate Date  :
                        {{$sale_project->estimate_date}}
                    </div>
                    <div class="col-md-6">
                        Project Status :
                        @if($sale_project->status == 1)
                        <span class="badge badge-info font-weight-bold">RFQ</span>
                        @elseif($sale_project->status == 2)
                        <span class="badge badge-warning font-weight-bold">Bidded</span>
                        @elseif($sale_project->status == 3)
                        <span class="badge badge-success font-weight-bold">Awarded</span>
                        @endif
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-6">
                        location : {{$sale_project->location}}

                    </div>
                    <div class="col-md-6">
                        Project Contact Person : <span class="badge badge-info font-weight-bold">{{$sale_project->project_contact_person}}</span>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-6">

                    </div>
                    <div class="col-md-6 btn-group">


                    </div>
                </div>
            </div>
    </div>

    <div class="row justify-content-center">
        <div class="row">
            <div class="col-md-8">
                <ul class="nav nav-pills m-t-30 m-b-30 container mb-2" style="margin-left:200px;">
                    <li class="nav-item">
                        <a href="#navpills-1" class="nav-link active" data-toggle="tab" aria-expanded="false">
                        Unpaid Invoices
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#navpills-2" class="nav-link" data-toggle="tab" aria-expanded="false">
                        Paid Invoices
                        </a>

                    </li>
                    <li class="nav-item">
                        <a href="#navpills-3" class="nav-link" data-toggle="tab" aria-expanded="false">
                        Transaction List
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-4">
            <!-- <a href="{{route('add_invoice')}}" class="btn btn-outline-success">Add Invoice</a> -->
            <a href="{{route('invoice_accounting',$sale_project->id)}}" class="btn btn-outline-success">Add Invoice</a>


            </div>
        </div>
        <div class="col-md-8">
        <!-- Begin navpill -->
        <div class="tab-content br-n pn">
        <div id="navpills-1" class="tab-pane active">
            <div class="card card-body">
            <h4 class=""></h4>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive text-black" style="clear: both;">
                            <table class="table table-hover">
                                <thead class="bg-info text-white">
                                    <tr class="">
                                        <th>No.</th>
                                        <th>Invoice Number</th>
                                        <th>Date</th>
                                        <th>Total Qty</th>
                                        <th class="text-center">Total Amount</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-black">
                                <?php $i=1; ?>
                                @foreach($invoice as $inv)
                                @if($inv->paid_status == 0)
                                    <tr>
                                        <td style="font-size:15px;">{{$i++}}</td>
                                        <td style="font-size:15px;">{{$inv->invoice_no}}</td>
                                        <td style="font-size:15px;">{{$inv->invoice_date}}</td>
                                        <td style="font-size:15px;" class="text-center">{{$inv->total_product_qty}}</td>
                                        <td class="text-center" style="font-size:15px;">{{$inv->total_amount}}</td>
                                        <td class="text-center">
                                        <a href="#" class="btn btn-danger btn-sm"  data-toggle="modal" data-target="#invoice_detail{{$inv->id}}"><i class="fa fa-info mr-2" aria-hidden="true"></i></i>Detail</a>
                                        @if($inv->paid_status == 0)
                                        <a href="#" class="btn btn-primary btn-sm"  data-toggle="modal" data-target="#paid_invoice{{$inv->id}}"><i class="fa fa-info mr-2" aria-hidden="true"></i></i>Paid</a></td>
                                        @elseif($inv->paid_status == 1)
                                        <button class="btn btn-secondary btn-sm" disabled><i class="fa fa-info mr-2" aria-hidden="true"></i></i>Paid</button></td>
                                        @endif
                                    </tr>
                                @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- end navpil -1 -->
        <!-- Begin Paid Modal -->
        @foreach($invoice as $inv)
        <div class="modal fade" id="paid_invoice{{$inv->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title" id="exampleModalLabel">Paid Method</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('store_pay_transaction')}}" method="post">
                        @csrf

                        <input type="hidden" name="project_id" value="{{$inv->sale_project_id}}">
                        <input type="hidden" name="invoice_id" value="{{$inv->id}}">
                    <div class="row">
                        <div class="col-md-4 offset-md-2">
                        <div class="form-check form-check-inline col-md-4" id="">
                            <input class="form-check-input" type="radio" name="exist_asset" id="bank" value="1" onclick="select_bank('{{$inv->id}}')">
                            <label class="form-check-label text-success" for="sell">Bank</label>
                        </div>
                        </div>
                        <div class="col-md-4">
                        <div class="form-check form-check-inline col-md-4" id="">
                            <input class="form-check-input" type="radio" name="exist_asset" id="cash" value="2" onclick="select_cash('{{$inv->id}}')">
                            <label class="form-check-label text-success" for="end">Cash</label>
                        </div>
                        </div>
                    </div>
                    <div class="form-group bankse" id="bankselect{{$inv->id}}">
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
                    <div class="form-group cashse" id="cashselect{{$inv->id}}">
                        <label for="name">Cash Accounting List</label>
                        <select class="custom-select border-info" id="cash_acc" name="cash_acc" name="account">
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
                    <div class="row form-group">
                        <div class="col-md-3">
                            <label for="name">Amount</label>
                        </div>
                        <div class="col-md-1">
                            <label for="">:</label>
                        </div>
                        <div class="col-md-8">
                            <label for="name">{{$inv->total_amount}}&nbsp;({{$inv->curr->name}})</label>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group">
                                <label for="name">Pay Amount</label>
                                <input type="number" class="form-control border-info" name="pay_amt" id="pay_amt" value="">
                            </div>
                        </div>
                        {{-- <div class="col-md-2" style="margin-top:50px;">
                            <span></span>
                        </div> --}}
                        <div class="col-md-5" style="margin-top:6px">
                            <label for="name">Currency</label>
                            <select class="custom-select border-info" name="currency_id" onchange="convert(this.value)">
                            <option class="form-control">Choose Currency</option>
                            @foreach($currency as $cc)
                            <option value="{{$cc->id}}">{{$cc->name}}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Remark</label><br>
                        <textarea class="border-info form-control" name="remark" placeholder="Describe down remark..." rows="3" cols="60"></textarea>
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
        <!-- End Paid Modal -->
        <div id="navpills-2" class="tab-pane">
            <div class="card mt-1">
            <div class="card card-body">
            <h4 class=""></h4>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive text-black" style="clear: both;">
                            <table class="table table-hover">
                                <thead class="bg-info text-white">
                                    <tr class="">
                                        <th>No.</th>
                                        <th>Invoice Number</th>
                                        <th>Date</th>
                                        <th>Total Qty</th>
                                        <th class="text-center">Total Amount</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-black">
                                <?php $i=1; ?>
                                @foreach($invoice as $inv)
                                @if($inv->paid_status == 1)
                                    <tr>
                                        <td style="font-size:15px;">{{$i++}}</td>

                                        <td style="font-size:15px;" class="text-center">{{$inv->invoice_no}}</td>

                                        <td style="font-size:15px;">{{$inv->invoice_date}}</td>
                                        <td style="font-size:15px;" class="text-center">{{$inv->total_product_qty}}</td>
                                        <td class="text-center" style="font-size:15px;">{{$inv->total_amount}}</td>
                                        <td class="text-center">
                                        <a href="#" class="btn btn-danger btn-sm"  data-toggle="modal" data-target="#invoice_detail{{$inv->id}}"><i class="fa fa-info mr-2" aria-hidden="true"></i></i>Detail</a>
                                        @if($inv->paid_status == 0)
                                        <a href="#" class="btn btn-primary btn-sm"  data-toggle="modal" data-target="#paid_invoice{{$inv->id}}"><i class="fa fa-info mr-2" aria-hidden="true"></i></i>Paid</a></td>
                                        @elseif($inv->paid_status == 1)
                                        <button class="btn btn-secondary btn-sm"  disabled><i class="fa fa-info mr-2" aria-hidden="true"></i></i>Paid</button></td>
                                        @endif
                                    </tr>
                                @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            </div>

        </div><!-- end navpil -3 -->
        <div id="navpills-3" class="tab-pane">
            <div class="card mt-1">
            <div class="card card-body">
            <h4 class=""></h4>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive text-black" style="clear: both;">
                            <table class="table table-hover">
                            <thead class="bg-info text-white">
                            <tr>
                                <th>#</th>
                                <th class="text-center">Account</th>
                                <th>Type</th>
                                <th class="text-center">Date</th>
                                <th>Amount</th>
                                <th class="text-center">Remark</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <?php $i=1; ?>
                        @foreach($transaction as $trans)
                        @if($trans->project_id == $sale_project->id)
                        @if($trans->type_flag == 1 && $trans->all_flag ==1)
                            <tbody class="text-black">
                            <td style="font-size:15px;">{{$i++}}</td>
                            <td style="font-size:15px;">{{$trans->accounting->account_code}}</br>({{$trans->accounting->account_name}})</td>
                            <td style="font-size:15px;">{{$trans->type}}</td>
                            <td style="font-size:15px;">{{$trans->date}}</td>
                            <td style="font-size:15px;">{{$trans->amount}}</td>
                            <td style="font-size:15px;">{{$trans->remark}}</td>
                            <td><a class="btn btn-primary btn-sm" data-toggle="collapse" href="#related{{$trans->id}}" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Related</a></td>
                            <!-- collapse begin -->
            </tr>
            <tr>

            <td colspan="8">
                <div class="collapse out container mr-5" id="related{{$trans->id}}">
                    <div class="row">
                        <?php $j=1 ?>
                        @foreach($transaction as $transa)
                        @if($trans->related_transaction_id == $transa->id)
                        @if($transa->type_flag == 2)
                        <div class="col-md-2">
                            <label style="font-size:15px;" class="text-info">No</label>
                            <div style="font-size:15px;">{{$j++}}</div>

                        </div>
                        <div class="col-md-3">
                            <label style="font-size:15px;" class="text-info">Account</label>

                            <div style="font-size:15px;">{{$transa->accounting->account_code}}</br>({{$transa->accounting->account_name}})</div>


                        </div>
                        <div class="col-md-2">
                            <label style="font-size:15px;" class="text-info">Type</label>

                            <div style="font-size:15px;">{{$transa->type}}</div>

                        </div>
                        <div class="col-md-2">
                            <label style="font-size:15px;" class="text-info">Date</label>

                            <div style="font-size:15px;">{{$transa->date}}</div>

                        </div>
                        <div class="col-md-2">
                            <label style="font-size:15px;" class="text-info">Amount</label>

                            <div style="font-size:15px;">{{$transa->amount}}</div>

                        </div>
                        @endif
                        @endif
                       @endforeach
                    </div>
                </div>

            <td>
                            <!-- end collapse -->
                            </tbody>
                            @endif
                            @endif
                        @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            </div>

        </div><!-- end navpil -2 -->
        </div><!-- all navpill end -->
        </div><!-- all col-md-8 end -->
        @foreach($invoice as $inv)

              <div class="modal fade bd-example-modal-lg" id="invoice_detail{{$inv->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel"><span class="font-weight-bold text-success"><i>{{$inv->invoice_no}}</i></span> Project Detail Information</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                        <div class="row bg-info font-weight-bold p-2">
                                <div class="col-md-2">
                                <span>Photo</span>
                                </div>
                                <div class="col-md-3">
                                <span>Name</span>
                                </div>
                                <div class="col-md-2">
                                <span>Selling Price</span>
                                </div>
                                <div class="col-md-3 text-center">
                                <span>Description</span>
                                </div>
                                <div class="col-md-2">
                                <span>Stock Qty</span>
                                </div>
                        </div>
                      @foreach($invoice_product as $invpro)
                      @foreach($product as $pro)
                      @if($inv->id == $invpro->invoice_id)
                      @if($pro->id == $invpro->product_id)
                      <div class="row mb-1 mt-3 font-weight-bold" style="font-size:18px;">
                      <!-- <div class="col-md-1">
                          {{$i++}}
                        </div> -->
                        <div class="col-md-2">
                        <img src="{{asset('image/'.$pro->photo)}}" style="width: 70px; height: 50px; cursor: pointer;">
                        </div>
                        <div class="col-md-3">
                          {{$pro->name}}
                        </div>
                        <div class="col-md-2">
                        {{$pro->selling_price}}
                        </div>
                        <div class="col-md-3 text-center">
                        {{$pro->description}}
                        </div>
                        <div class="col-md-2">
                        {{$pro->stock_qty}}
                        </div>

                      </div>
                        <hr>
                        @endif
                        @endif
                        @endforeach
                        @endforeach
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
    </div><!-- row justify end -->
@endsection
@section('js')
<script>
$(document).ready(function()
{
    $('.bankse').hide();
    $('.cashse').hide();
})
function select_bank(value)
{
    $('#bankselect'+value).show();
    $('#cashselect'+value).hide();
}
function select_cash(value)
{
    $('#bankselect'+value).hide();
    $('#cashselect'+value).show();
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
