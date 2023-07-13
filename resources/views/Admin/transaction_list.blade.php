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

</div>

<div class="row">
    <div class="col-12">
          <div class="card">
          <div class="card-header">

            <div class="col-12">
          <div class="row justify-content-between">

              <label class="">Transaction List<span class="float-right">

          </div>

          <div class="row" id="trial_balance">

          </div>

          </div>

        </div>
        <div class="card-body">
            <div class="row">
        <div class="col-md-12">

            <div class="table-responsive" id="slimtest2">

                <table class="table table-hover" >


                            <thead class="bg-info text-white text-center">
                            <tr>
                                <th>#</th>
                                <th>Account</th>
                                <th>Exp/Inc</th>
                                <th>Type</th>
                                <th>Date</th>
                                <th>Amount</th>
                                <th>Remark</th>

                            </tr>
                        </thead>
                        <tbody id="filter_date">
                            <?php $i = 1; ?>
                            @foreach ($transaction as $data)

                            <tr class="text-center">
                            <td style="font-size:15px; width:50px" class="border-0">{{$i++}}</td>
                            <td style="font-size:15px; width:50px" class="border-0">{{$data->accounting->account_code}}-{{$data->accounting->account_name}}</td>
                            @if ($data->expense_id != null || $data->expense_id == 0 )
                            <td style="font-size:15px; width:50px" class="border-0">Expense</td>
                            @elseif ($data->incoming_id != null)
                            <td style="font-size:15px; width:50px" class="border-0">Incoming</td>
                            @endif
                            <td style="font-size:15px; width:50px" class="border-0">{{$data->type}}</td>
                            <td style="font-size:15px; width:50px" class="border-0">{{$data->date}}</td>
                            <td style="font-size:15px; width:50px" class="border-0">{{$data->amount}}</td>
                            <td style="font-size:15px; width:50px" class="border-0">{{$data->remark}}</td>

                            </tr>
                            @endforeach
                        </tbody>


                </table>

            </div>
        </div>
    </div>
        </div>
    </div>
</div>
</div>
@endsection

<script>

    function date_filter(){
            // alert('hello');
            var from = $('#from').val();
            var to = $('#to').val();
            var debit = 0;
            var credit = 0;
            var balance =0;

            $.ajax({
           type:'POST',
           url:'/transaction_filter',
           dataType:'json',
           data:{ "_token": "{{ csrf_token() }}",
           "from":from,
           "to" : to,
            },

           success:function(data){

            console.log(data)
            var html = "";
            var html2 = "";

            $.each(data.date_filter, function(i, v) {
                if(v.type == "Debit"){
                    debit += v.amount;
                }else{
                    credit += v.amount;
                }
            html += `


                    <tr>
                            <td style="font-size:15px;" class="text-center">${++i}</td>
                            <td style="font-size:15px;" class="text-center">${v.accounting.account_code}-${v.accounting.account_name}</td>
                            <td style="font-size:15px;" class="text-center">${v.type}</td>
                            <td style="font-size:15px;" class="text-center">${v.date}</td>
                            <td style="font-size:15px;" class="text-center">${v.amount}</td>
                            <td style="font-size:15px;" class="text-center">${v.remark}</td>

                    </tr>

            `;
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
