@extends('master')
@section('title','Transfer List')
@section('link','Transfer List')
@section('content')
{{--
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
</div> --}}

<div class="row">
    <div class="col-12">
          <div class="card">
          <div class="card-header">

            <div class="col-12">
          <div class="row justify-content-between">

              <label class="mt-3 ">Transfer List<span class="float-right">	<button type="button" data-toggle="modal" data-target="#add_transfer" class="btn btn-primary" onclick="hide_bank_acc()"><i class="fas fa-plus"></i> Transfer</button>

          </div>

          <div class="row" id="trial_balance">

          </div>

          </div>

        </div>
        <div class="card-body">
            <div class="row">
        <div class="col-md-12">

            <div class="table-responsive text-black" id="slimtest2">

                <table class="table table-hover" id="filter_date">


                            <thead class="bg-info text-white">
                            <tr>
                                <th>#</th>
                                <th class="text-center">From</th>
                                <th class="text-center">To</th>
                                <th class="text-center">Date</th>
                                <th class="text-center">Amount</th>
                                <th class="text-center">Remark</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>

                </table>

            </div>
        </div>
    </div>
        </div>
    </div>
</div>
</div>
        <div class="modal fade" id="add_transfer" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Expense</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                    </div>

                    <div class="modal-body">

                        <form action="{{route('store_expense')}}" method="POST">

                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <div class="row mt-3">
                                        <label >From</label>
                                        <div class="col-md-3">
                                            <div class="form-check form-check-inline">

                                                <input class="form-check-input mt-1" type="radio" name="from_account" id="bank" value="1" onclick="show_from_bank_acc()">

                                                <label class="form-check-label text-success" for="bank">Bank</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3 ml-5">
                                          <div class="form-check form-check-inline">


                                            <input class="form-check-input mt-1" type="radio" name="from_account" id="cash" value="2" onclick="show_from_cash_acc()">

                                            <label class="form-check-label text-success" for="cash">Cash</label>
                                        </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group mt-3 col-6" id="defaultAcc_from">
                                    <label class="control-label">Account</label>
                                    <select class="form-control">
                                        <option >Select Account</option>
                                    </select>
                                </div>


                                <div class="form-group mt-3 col-6" id="from_bank">
                                    <label class="control-label">Bank Account</label>
                                    <select class="form-control" name="from_bank_acc" id="bank_acc">
                                        <option value="">Select Bank Account</option>
                                       @foreach ($bank_accounts as $acc)

                                        <option value="{{$acc->id}}">{{$acc->account_name}}-{{$acc->account_code}}-{{$acc->currency->name}}</option>
                                       @endforeach
                                    </select>
                                </div>


                                 <div class="form-group mt-3 col-6" id="from_cash">
                                <label class="control-label">Cash Account</label>
                                <select class="form-control" name="from_cash_acc" id="cash_acc">
                                    <option value="">Select Cash Account</option>
                                   @foreach ($cash_accounts as $acc)

                                    <option value="{{$acc->id}}">{{$acc->account_name}}-{{$acc->account_code}}-{{$acc->currency->name}}</option>
                                   @endforeach
                                </select>
                                 </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="row mt-3">
                                        <label >To</label>
                                        <div class="col-md-3">
                                            <div class="form-check form-check-inline">

                                                <input class="form-check-input mt-1" type="radio" name="to_account" id="bank" value="1" onclick="show_to_bank_acc()">

                                                <label class="form-check-label text-success" for="bank">Bank</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3 ml-5">
                                          <div class="form-check form-check-inline">

                                            <input class="form-check-input mt-1" type="radio" name="to_account" id="cash" value="2" onclick="show_to_cash_acc()">

                                            <label class="form-check-label text-success" for="cash">Cash</label>
                                        </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group mt-3 col-6" id="defaultAcc_to">
                                    <label class="control-label">Account</label>
                                    <select class="form-control">
                                        <option >Select Account</option>
                                    </select>
                                </div>
                                <div class="form-group mt-3 col-6" id="to_bank">
                                    <label class="control-label">Bank Account</label>
                                    <select class="form-control" name="to_bank_acc" id="bank_acc">
                                        <option value="">Select Bank Account</option>
                                       @foreach ($bank_accounts as $acc)

                                        <option value="{{$acc->id}}">{{$acc->account_name}}-{{$acc->account_code}}-{{$acc->currency->name}}</option>
                                       @endforeach
                                    </select>
                                </div>


                                 <div class="form-group mt-3 col-6" id="to_cash">
                                <label class="control-label">Cash Account</label>
                                <select class="form-control" name="to_cash_acc" id="cash_acc">
                                    <option value="">Select Cash Account</option>
                                   @foreach ($cash_accounts as $acc)

                                    <option value="{{$acc->id}}">{{$acc->account_name}}-{{$acc->account_code}}-{{$acc->currency->name}}</option>
                                   @endforeach
                                </select>
                                 </div>
                            </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">Amount</label>

                                                <input type="number" class="form-control" name="amount" id="convert_amount" value="0">

                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="control-label">Date</label>

                                        <input type="date" class="form-control"  name="date">

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

@endsection

<script>

function acc_code_search(){

    var code = $('#search_code').val();
    var debit = 0;
    var credit = 0;
    var balance =0;

    $.ajax({
           type:'POST',
           url:'/ajax_code_search',
           dataType:'json',
           data:{ "_token": "{{ csrf_token() }}",
           "code":code,
            },
           success:function(data){
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

function show_from_bank_acc(){
    $('#defaultAcc_from').hide()
    $('#from_cash').hide();
    $('#from_bank').show();

}

function show_to_bank_acc(){
    $('#defaultAcc_to').hide()
$('#to_cash').hide();
$('#to_bank').show();

}

function show_from_cash_acc(){
    $('#defaultAcc_from').hide()
    $('#from_bank').hide();
    $('#from_cash').show();
}

function show_to_cash_acc(){
    $('#defaultAcc_to').hide()
$('#to_bank').hide();
$('#to_cash').show();
}

function hide_bank_acc(){

    $('#defaultAcc_from').show()
    $('#defaultAcc_to').show()


    $('#from_bank').hide();
    $('#from_cash').hide();

    $('#to_bank').hide();
    $('#to_cash').hide();
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
           url:'/ajax_filter_date',
           dataType:'json',
           data:{ "_token": "{{ csrf_token() }}",
           "from":from,
           "to" : to,
            },
           success:function(data){

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
