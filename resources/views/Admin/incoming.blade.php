@extends('master')
@section('title','Sale Project List')
@section('link','Sale Project List')
@section('content')


<div class="row">
    <div class="col-md-6">
        <div class="row">
      <div class="form-group col-md-5">
          <label>From</label>
          <input type="date" name="from" id="from" class="form-control">
      </div>
      <div class="form-group col-md-5">
          <label>To</label>
          <input type="date" name="to" id="to" class="form-control">
      </div>
      <div class="form-group col-md-2">

          <button class="btn btn-sm btn-primary form-control" style="margin-top:38px;" onclick="date_filter()">Search</button>
      </div>
  </div>

  </div>
  <div class="offset-md-1 col-md-5">
      <div class="input-group" style="margin-top:35px;">
          <input type="search" class="form-control rounded" id="search_code" placeholder="Enter Account Code" aria-label="Search" aria-describedby="search-addon" />
          <button type="button" class="btn btn-outline-primary" onclick="acc_code_search()">search</button>
        </div>
  </div>
  </div>

<div class="row">
    <div class="col-12">
          <div class="card">
          <div class="card-header">
          <div class="row justify-content-between">
              <label class="">Income Transaction List<span class="float-right">	<button type="button" data-toggle="modal" data-target="#add_incomes" class="btn btn-primary" onclick="hide_bank_acc()"><i class="fas fa-plus"></i> Add Income</button>
                <a href="{{route('incoming_type')}}" class="btn btn-primary"> Income Type</a></span></label>

          </div>
          <div class="row" id="trial_balance">

        </div>
        </div>

        <div class="card-body">
            <div class="row">
        <div class="col-md-12">
            <div class="table-responsive text-black" id="slimtest2">

                <table class="table table-hover"  id="filter_date">

                            <thead class="bg-info text-white">
                            <tr>
                                <th>#</th>
                                <th class="text-center">Account</th>
                                <th class="text-center">Type</th>
                                <th class="text-center">Date</th>
                                <th class="text-center">Amount</th>
                                <th class="text-center">Voucher No</th>
                                <th class="text-center">Remark</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $i = 1; ?>
                            @foreach ($expense_tran as $trans)
                            @if($trans->type_flag == 3)
                            <tr>
                            <td style="font-size:15px;" class="text-center">{{$i++}}</td>
                            <td style="font-size:15px;" class="text-center">{{$trans->accounting->account_name}}-{{$trans->accounting->account_code}}</td>
                            <td style="font-size:15px;" class="text-center">{{$trans->type}}</td>
                            <td style="font-size:15px;" class="text-center">{{$trans->date}}</td>
                            <td style="font-size:15px;" class="text-center">{{$trans->amount}}</td>
                            <td style="font-size:15px;" class="text-center">{{$trans->voucher_id}}</td>
                            <td style="font-size:15px;" class="text-center">{{$trans->remark}}</td>
                            <td class="text-center"><a class="btn btn-primary btn-sm " data-toggle="collapse" href="#related{{$trans->id}}" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Related</a></td>
                            </tr>

                            <tr>
                                <td></td>

                                <td colspan="6">
                                    <div class="collapse out container mr-5" id="related{{$trans->id}}">
                                        <div class="row">
                                            <?php $j=1 ?>
                                            @foreach($bank_cash_tran as $transa)
                                            @if($trans->related_transaction_id == $transa->id)
                                            @if($transa->type_flag == 4)
                                            <div class="col-md-2">
                                                <label style="font-size:15px;" class="text-info">No</label>
                                                <div style="font-size:15px;">{{$j++}}</div>

                                            </div>
                                            <div class="col-md-2">
                                                <label style="font-size:15px;" class="text-info">Account</label>

                                                <div style="font-size:15px;">{{$transa->accounting->account_code}}-({{$transa->accounting->account_name}})</div>


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
                                            @if ($transa->project_id == null)
                                            <div class="col-md-2">
                                                <label style="font-size:15px;" class="text-info">Projected Related</label>
                                                <div style="font-size:15px;">No</div>

                                            </div>
                                            @else
                                            <div class="col-md-2">
                                                <label style="font-size:15px;" class="text-info">Projected Related</label>
                                                <div style="font-size:15px;">Yes</div>

                                            </div>
                                            @endif

                                            @endif
                                            @endif
                                           @endforeach
                                        </div>
                                    </div>

                                <td>
                                </tr>
                        </tbody>

                        @endif
                        @endforeach
                </table>

            </div>
        </div>
    </div>
        </div>
    </div>
</div>
</div>

<div class="modal fade" id="add_incomes" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Incoming</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
            </div>
            <div class="modal-body" id="slimtest2">
                <form action="{{route('store_incoming')}}" method="POST">
                    @csrf
                    <div class="row offset-md-5">
                        <div class="col-md-2">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="bank_cash" id="bank" value="1" onclick="show_bank_acc()">
                            <label class="form-check-label text-success" for="bank">Bank</label>
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-check form-check-inline">

                            <input class="form-check-input" type="radio" name="bank_cash" id="cash" value="2" onclick="show_cash_acc()">
                            <label class="form-check-label text-success" for="cash">Cash</label>
                        </div>
                        </div>
                    </div>

                    <div class="form-group mt-3" id="bankkk">
                        <label class="control-label">Bank Account</label>

                        <select class="form-control" name="bank_acc" id="bank_acc">
                            <option value="">Select Bank Account</option>
                           @foreach ($account as $acc)
                            <option value="{{$acc->id}}">{{$acc->account_name}}-{{$acc->account_code}}-{{$acc->curr->name}}</option>

                           @endforeach
                        </select>
                    </div>

                    <div class="form-group mt-3" id="cashhh">
                        <label class="control-label">Cash Account</label>

                        <select class="form-control" name="cash_acc" id="cash_acc">
                            <option value="">Select Cash Account</option>
                           @foreach ($cash_account as $acc)
                            <option value="{{$acc->id}}">{{$acc->account_name}}-{{$acc->account_code}}-{{$acc->curr->name}}</option>

                           @endforeach
                        </select>
                    </div>


                            <div class="form-group mt-3">
                                <label class="control-label">Incoming Account</label>
                                <select class="form-control" name="exp_acc">
                                    <option value="">Select Incoming Account</option>
                                   @foreach ($inc_account as $acc)

                                    <option value="{{$acc->id}}">{{$acc->account_name}}-{{$acc->account_code}}-{{$acc->curr->name}}</option>

                                   @endforeach
                                </select>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Amount</label>

                                        <input type="number" class="form-control" name="amount" id="convert_amount" value="0">

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
                            <div class="form-group">
                                <label for="name">Projected Related</label>
                                <div class="row">
                                    <div class="col-md-6">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="yes_no" id="yes" value="1" onclick="show_project()">
                                        <label class="form-check-label" for="bank">Yes</label>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-check form-check-inline">

                                        <input class="form-check-input" type="radio" name="yes_no" id="no" value="2" onclick="hide_project()">
                                        <label class="form-check-label" for="cash">No</label>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" id="proj">
                                <label for="name">Project</label>
                                <select class="custom-select" name="project_id">
                                    <option value="0">Choose Project Name</option>
                                    @foreach($saleproject as $salepro)
                                    <option value="{{$salepro->id}}">{{$salepro->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                                <div class="row">
                                    <div class="col-md-9 mt-4">
                                        <button type="submit" class="btn btn-success">Submit</button>
                                        <button type="button" class="btn btn-inverse btn-dismiss" data-dismiss="modal">Cancel</button>
                                    </div>
                                </div>

                </form>
            </div>
        </div>
    </div>
</div>


@endsection


@section('js')
<script>

// $('#item_table').DataTable( {

// "paging":   true,
// "ordering": true,
// "info":     true

// });

// $('#slimtest2').slimScroll({
//         color: '#00f',
//         height: '600px'
//     });
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
        // alert(data.currency_id);
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

function acc_code_search(){
    // alert('hello');
    var code = $('#search_code').val();
    var debit = 0;
    var credit = 0;
    var balance =0;
    // alert(code);
    $.ajax({
           type:'POST',
           url:'/ajax_search_code',
           dataType:'json',
           data:{ "_token": "{{ csrf_token() }}",
           "code":code,
            },
           success:function(data){
            //    alert('hello');
            var html = "";
            var html2 = "";

            html += `
            <thead class="bg-info text-white">
                            <tr>
                                <th>#</th>
                                <th class="text-center">Account</th>
                                <th class="text-center">Type</th>
                                <th class="text-center">Date</th>
                                <th class="text-center">Amount</th>
                                <th class="text-center">Remark</th>
                                <th class="text-center">Action</th>
                            </tr>
                    </thead>
            `;
            $.each(data.code, function(i, v) {
                // ${v.accounting.account_name}-${v.accounting.account_code}
                // alert(v.remark);
                if(v.type == "Debit"){
                    debit += v.amount;
                }else{
                    credit += v.amount;
                }
                html += `

                    <tbody>
                    <tr>
                            <td style="font-size:15px;" class="text-center">${++i}</td>
                            <td style="font-size:15px;" class="text-center">${v.accounting.account_name} &nbsp;(${v.accounting.account_code})</td>
                            <td style="font-size:15px;" class="text-center">${v.type}</td>
                            <td style="font-size:15px;" class="text-center">${v.date}</td>
                            <td style="font-size:15px;" class="text-center">${v.amount}</td>
                            <td style="font-size:15px;" class="text-center">${v.remark}</td>
                            <td class="text-center"><a class="btn btn-primary btn-sm " data-toggle="collapse" href="#related${v.id}" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Related</a></td>
                    </tr>
                    <tr>
                     <td></td>
                               <td colspan="6">
                                     <div class="collapse out container mr-5" id="related${v.id}">
                                      <div class="row">

             `;

            $.each(data.code_relate, function(j, b) {
                if(v.related_transaction_id == b.id){
                    html += `
                    <div class="col-md-2">
                                            <label style="font-size:15px;" class="text-info">No</label>
                                            <div style="font-size:15px;">${++j}</div>

                                            </div>
                                            <div class="col-md-2">
                                                <label style="font-size:15px;" class="text-info">Account</label>

                                                <div style="font-size:15px;">${b.accounting.account_name} &nbsp;(${b.accounting.account_code})</div>


                                            </div>
                                            <div class="col-md-2">
                                                <label style="font-size:15px;" class="text-info">Type</label>
                                                <div style="font-size:15px;">${b.type}</div>

                                            </div>
                                            <div class="col-md-2">
                                                <label style="font-size:15px;" class="text-info">Date</label>

                                                <div style="font-size:15px;">${b.date}</div>

                                            </div>
                                            <div class="col-md-2">
                                                <label style="font-size:15px;" class="text-info">Amount</label>

                                                <div style="font-size:15px;">${b.amount}</div>

                                            </div>
                    `;
                    if(b.project_id == null){
                        html += `
                        <div class="col-md-2">
                            <label style="font-size:15px;" class="text-info">Projected Related</label>
                            <div style="font-size:15px;">No</div>

                        </div>
                        `;
                    }
                    else if(b.project_id != null){
                        html += `
                        <div class="col-md-2">
                            <label style="font-size:15px;" class="text-info">Projected Related</label>
                            <div style="font-size:15px;">Yes</div>

                        </div>
                        `;
                    }
                    html += `
                            </div>
                                    </div>

                                <td>
                            </tr>
                        </tbody>
                    `;
                }
            })
        })
        balance = debit - credit;

        html2 += `

            <div class="col-md-2">
                <label style="font-size:20px;" class="text-info">Debit: </label>
                <div style="font-size:20px;">${debit}</div>
            </div>

            <div class="col-md-2">
                <label style="font-size:20px;" class="text-info">Credit: </label>
                <div style="font-size:20px;">${credit}</div>
            </div>

            <div class="col-md-2">
                <label style="font-size:20px;" class="text-info">Balance: </label>
                <div style="font-size:20px;">${balance}</div>
            </div>

        `;
        $('#filter_date').html(html);
        $('#trial_balance').html(html2);
           }
           })
}


    function show_bank_acc(){
        // alert('hello');
        $('#cashhh').hide();
        $('#bankkk').show();
    }
    function show_cash_acc(){
        // alert('hello');
        $('#bankkk').hide();
        $('#cashhh').show();
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

            // $('.dropify').dropify();

        // $('#mdate').bootstrapMaterialDatePicker({ weekStart: 0, time: false });

        // $('#mdate').prop("disabled",true);
        // $('#period').prop("disabled",true);


        function showPeriod(value){

            var show_options = value;

            if( show_options == 1){
                $('#mdate').prop("disabled",true);
                $('#period').prop("disabled",false);
                }

            else{

                $('#mdate').prop("disabled",false);
                $('#period').prop("disabled",true);
            }
        }



        function date_filter(){
            // alert('hello');
            var from = $('#from').val();
            var to = $('#to').val();
            var debit = 0;
            var credit = 0;
            var balance =0;
            // alert(from);
            // alert(to);
            $.ajax({
           type:'POST',
           url:'/ajax_date_filter',
           dataType:'json',
           data:{ "_token": "{{ csrf_token() }}",
           "from":from,
           "to" : to,
            },
           success:function(data){
            //    alert(data.date_filter);
            var html = "";
            var html2= "";
            // html +=`heelo`;
            html += `
            <thead class="bg-info text-white">
                            <tr>
                                <th>#</th>
                                <th class="text-center">Account</th>
                                <th class="text-center">Type</th>
                                <th class="text-center">Date</th>
                                <th class="text-center">Amount</th>
                                <th class="text-center">Remark</th>
                                <th class="text-center">Action</th>
                            </tr>
                    </thead>
            `;
            $.each(data.date_filter, function(i, v) {
                if(v.type == "Debit"){
                    debit += v.amount;
                }else{
                    credit += v.amount;
                }
            html += `

                    <tbody>
                    <tr>
                            <td style="font-size:15px;" class="text-center">${++i}</td>
                            <td style="font-size:15px;" class="text-center">${v.accounting.account_name}-${v.accounting.account_code}</td>
                            <td style="font-size:15px;" class="text-center">${v.type}</td>
                            <td style="font-size:15px;" class="text-center">${v.date}</td>
                            <td style="font-size:15px;" class="text-center">${v.amount}</td>
                            <td style="font-size:15px;" class="text-center">${v.remark}</td>
                            <td class="text-center"><a class="btn btn-primary btn-sm " data-toggle="collapse" href="#related${v.id}" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Related</a></td>
                    </tr>
                    <tr>
                    <td></td>

                                <td colspan="6">
                                    <div class="collapse out container mr-5" id="related${v.id}">
                                        <div class="row">
            `;
            $.each(data.date_filt, function(j, b) {
                if(v.related_transaction_id == b.id){
                    html += `
                    <div class="col-md-2">
                                            <label style="font-size:15px;" class="text-info">No</label>
                                            <div style="font-size:15px;">${++j}</div>

                                            </div>
                                            <div class="col-md-2">
                                                <label style="font-size:15px;" class="text-info">Account</label>

                                                <div style="font-size:15px;">${v.accounting.account_name}-${v.accounting.account_code}</div>


                                            </div>
                                            <div class="col-md-2">
                                                <label style="font-size:15px;" class="text-info">Type</label>
                                                <div style="font-size:15px;">${b.type}</div>

                                            </div>
                                            <div class="col-md-2">
                                                <label style="font-size:15px;" class="text-info">Date</label>

                                                <div style="font-size:15px;">${b.date}</div>

                                            </div>
                                            <div class="col-md-2">
                                                <label style="font-size:15px;" class="text-info">Amount</label>

                                                <div style="font-size:15px;">${b.amount}</div>

                                            </div>
                    `;
                    if(b.project_id == null){
                        html += `
                        <div class="col-md-2">
                            <label style="font-size:15px;" class="text-info">Projected Related</label>
                            <div style="font-size:15px;">No</div>

                        </div>
                        `;
                    }
                    else if(b.project_id != null){
                        html += `
                        <div class="col-md-2">
                            <label style="font-size:15px;" class="text-info">Projected Related</label>
                            <div style="font-size:15px;">Yes</div>

                        </div>
                        `;
                    }
                    html += `
                            </div>
                                    </div>

                                <td>
                            </tr>
                        </tbody>
                    `;
                }
            })


        })
        balance = debit - credit;

        html2 += `

            <div class="col-md-2">
                <label style="font-size:20px;" class="text-info">Debit: </label>
                <div style="font-size:20px;">${debit}</div>
            </div>

            <div class="col-md-2">
                <label style="font-size:20px;" class="text-info">Credit: </label>
                <div style="font-size:20px;">${credit}</div>
            </div>

            <div class="col-md-2">
                <label style="font-size:20px;" class="text-info">Balance: </label>
                <div style="font-size:20px;">${balance}</div>
            </div>

        `;
        $('#filter_date').html(html);
        $('#trial_balance').html(html2);

           }

           })
        }

    </script>
@endsection

