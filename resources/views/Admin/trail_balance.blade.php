@extends('master')
@section('title','Trail Balance')
@section('link','Trail Balance')
@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h1 class="card-title font-weight-bold offset-4">Trail Balnace as at End of the 2022</h1>


        <div class="card-body">

          <table id="example1" class="table">
            <thead class="text-center bg-info">
                <tr>
                <th>No</th>
                <th>Account Name</th>
                <th>Debit(MMK)</th>
                <th>Credit(MMK)</th>

              </tr>
            </thead>

            <tbody class="text-center">
                <tr>
                    <td></td>
                    <td><u>Revenue</u></td>
                    <td></td>
                    <td></td>
                </tr>
                <?php $i=1;
                $tot_amt = 0;
            ?>
            @foreach ($account as $acc)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$acc->account_name}}</td>
                <td></td>
                <td>{{$acc->amount}}</td>
            </tr>
            @endforeach
                <tr>
                    <td></td>
                    <td><u>Other Income</u></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td>Income from Other</td>
                    <td></td>
                    <td></td>
                </tr>
                <?php $m=1;
                $tot_amt3 = 0;
            ?>
            @foreach ($account3 as $acc)
            <tr>
                <td>{{$m++}}</td>
                <td>{{$acc->account_name}}</td>
                <td></td>
                <td>{{$acc->amount}}</td>
            </tr>
            @endforeach
                <tr>
                    <td></td>
                    <td>Bank Interest Income</td>
                    <td></td>
                    <td>-</td>
                </tr>
                <tr>
                    <td></td>
                    <td><u>(-)Direct Expense 20-21 (Kakahtoke)</u></td>
                    <td></td>
                    <td></td>
                </tr>
                <?php $k=1;
            ?>
            @foreach ($account4 as $acc)
            <tr>
                <td>{{$k++}}</td>
                <td>{{$acc->account_name}}</td>
                <td>{{$acc->amount}}</td>
                <td></td>
            </tr>
            @endforeach
                <tr>
                    <td></td>
                    <td><u>(-)Operation Other Expense</u></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td>Predemand</td>
                    <td>0</td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td><u>(-)Operation Indirect Expense</u></td>
                    <td>0</td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td><u>(-)Operation Other Expense</u></td>
                    <td>0</td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td><u>(-)Direct Expense 20-21 (MOHA)</u></td>
                    <td>0</td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td><u>(-)Office Expense</u></td>
                    <td>0</td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td><u>Retained Earning</u></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td>Retained Earning up to 30.9.2019</td>
                    <td></td>
                    <td>0</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Retained Earning up to 30.9.2020</td>
                    <td></td>
                    <td>0</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Write Off Tender</td>
                    <td></td>
                    <td>0</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Ajustment</td>
                    <td></td>
                    <td>0</td>
                </tr>
                <tr>
                    <td></td>
                    <td><u>Capital</u></td>
                    <td></td>
                    <td>-</td>
                </tr>
                <tr>
                    <td></td>
                    <td><u>Cash & Bank Balance</u></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td>Cash in Hand</td>
                    <td>{{$account1}}</td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td>Bank Balance</td>
                    <td>{{$account2}}</td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td>Prepaid Expense(Advance Payment)</td>
                    <td>-</td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td><u>Fixed Assets</u></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td>Fixed Assets</td>
                    <td></td>
                    <td></td>
                </tr>
                <?php $i=1;
                $tot_amt = 0;
               ?>
            {{-- @foreach ($account as $acc)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$acc->account_name}}</td>
                <td>{{$acc->amount}}</td>
                <td></td>
            </tr>
            @endforeach --}}
                <tr>
                    <td></td>
                    <td>Accumulated Depriciation on Fixed Assets</td>
                    <td></td>
                    <td>-</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Intangible Assets</td>
                    <td>0</td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td><u>Receiable</u></td>
                    <td></td>
                    <td>0</td>
                </tr>
                <tr>
                    <td></td>
                    <td><u>Payable</u></td>
                    <td>0</td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td><u>Other Payable</u></td>
                    <td>0</td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td><u>Loan A/C</u></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td>Loan</td>
                    <td></td>
                    <td>0</td>
                </tr>
                <tr>
                    <td></td>
                    <td><u>Personal Loan A/C</u></td>
                    <td>0</td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>-</td>
                    <td>-</td>
                </tr>
            </tbody>
          </table>
          <?php

            session_start();

            echo '<br /><a href="balancesheet_acc_list" class="float-left">Balance Sheet</a>';

              ?>
        </div>
     </div>
    </div>
 </div>
</div>


@endsection
