@extends('master')
@section('title','Account List')
@section('link','Account List')
@section('content')
<div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h1 class="card-title font-weight-bold offset-4">Profit And Loss For The Year Ended 2022</h1>

              {{-- <button id="" class="btn btn-primary float-right" data-toggle="modal" data-target="#new_account" onclick="hide_proj()"> <i class="fa fa-plus"></i> Create Accounting</button> --}}
                {{-- <div class="modal fade" id="new_account" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header bg-info">
                            <h5 class="modal-title" id="exampleModalLabel">Add New Accounting</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{route('store_accounting')}}" method="post">
                            @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name">Account Code</label>
                                <input type="text" class="form-control border border-info" name="acc_code" id="acc_code" placeholder="eg. 123456">
                            </div>
                            <div class="form-group">
                                <label for="name">Account Name</label>
                                <input type="text" class="form-control border-info" name="acc_name" id="acc_name" placeholder="eg. Revenue Account">
                            </div>
                            <div class="form-group">
                                <label for="name">Account Type</label>
                                <select class="custom-select border-info" name="account_type_id">
                                <option>Choose Account Type</option>
                                    @foreach($account_type as $acc_type)
                                    <option value="{{$acc_type->id}}">{{$acc_type->type_name}}</option>
                                   @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">Cost Center</label>
                                <select class="custom-select border-info" name="cost_center">
                                <option>Choose Cost Center Name</option>
                                    @foreach($cost_center as $cc)
                                    <option value="{{$cc->id}}">{{$cc->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">Balance</label>
                                <input type="text" class="form-control border-info" name="balance">
                            </div>
                            <div class="form-group">
                                <label for="name">Currency</label>
                                <select class="custom-select border-info" name="currency">

                                <option>Choose Currency</option>

                                    @foreach($currency as $cc)
                                    <option value="{{$cc->id}}">{{$cc->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">Projected Related</label>
                                <div class="row">
                                    <div class="col-md-6">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="yes_no" id="yes" value="1" onclick="show_project()">
                                        <label class="form-check-label text-info" for="bank">Yes</label>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-check form-check-inline">

                                        <input class="form-check-input" type="radio" name="yes_no" id="no" value="2" onclick="hide_project()">
                                        <label class="form-check-label text-info" for="cash">No</label>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" id="proj">
                                <label for="name">Project</label>
                                <select class="custom-select border-info" name="project_id">
                                <option value="0">Choose Project Name</option>
                                    @foreach($saleproject as $salepro)
                                    <option value="{{$salepro->id}}">{{$salepro->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                        </form>
                        </div>
                    </div>
                </div> --}}
            </div>
            <!-- /.card-header -->
            <div class="card-body">

              <table id="example1" class="table">
                <thead class="text-center bg-info">
                	<tr>
                    <th>No</th>
                    <th>Account Name</th>
                    <th>Exchange Rate</th>
                    <th>Amount(USD)</th>
                    <th>Total Amount(USD)</th>
                    <th>Amount(MMK)</th>
                    <th>Total Amount(MMK)</th>

                  </tr>
                </thead>

                <tbody class="text-center">
                    <tr>
                        <td></td>
                        <td><u>Total Revenue</u></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><u>Revenue From Project</u></td>
                        <td></td>
                        <td></td>
                        <td></td>
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
                        <td></td>
                        <td></td>
                        <td>{{$acc->amount}}</td>
                        <td></td>
                    </tr>
                    <?php
                         $tot_amt += $acc->amount;
                    ?>

                    @endforeach
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>{{$tot_amt}}</td>
                    </tr>

                    <tr>
                        <td></td>
                        <td><u>Receiable From Project</u></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <?php $j=1;
                        $tot_amt1 = 0;
                    ?>
                    @foreach ($account1 as $acc)
                    <tr>
                        <td>{{$j++}}</td>
                        <td>{{$acc->account_name}}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>{{$acc->amount}}</td>
                        <td></td>
                    </tr>
                    <?php $tot_amt1 += $acc->amount;
                    ?>

                    @endforeach
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>{{$tot_amt1}}</td>
                    </tr>

                    <tr>
                        <td></td>
                        <td><u>Predemand Revenue</u></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>0</td>
                        <td></td>
                    </tr>

                    <?php $tot = $tot_amt + $tot_amt1; ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>{{$tot}}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><u>Cost of Sale</u></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><u>Direct Expense</u></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <?php $k=1;
                        $tot_amt2 = 0;
                    ?>
                    @foreach ($account2 as $acc)
                    <tr>
                        <td>{{$k++}}</td>
                        <td>{{$acc->account_name}}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>{{$acc->amount}}</td>
                        <td></td>
                    </tr>
                    <?php $tot_amt2 += $acc->amount;
                    ?>

                    @endforeach
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>{{$tot_amt2}}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><u>Operation Other Expense</u></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><u>Predemand</u></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>0</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><u>Operation Indirect Expense</u></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>0</td>
                        <td></td>
                    </tr>
                    <?php $gross = $tot - $tot_amt2 ; ?>
                    <tr>
                        <td></td>
                        <td>Gross Profit</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>{{$gross}}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><u>Other Income</u></td>
                        <td></td>
                        <td></td>
                        <td></td>
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
                    <td></td>
                    <td></td>
                    <td>{{$acc->amount}}</td>
                    <td></td>
                </tr>
                <?php $tot_amt3 += $acc->amount;
                ?>

                @endforeach
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>{{$tot_amt3}}</td>
                </tr>
                <tr>
                    <td></td>
                    <td><u>Expenses</u></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <?php $n=1;
                    $tot_amt4 = 0;
                ?>
                @foreach ($account4 as $acc)
                <tr>
                    <td>{{$n++}}</td>
                    <td>{{$acc->account_name}}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>{{$acc->amount}}</td>
                    <td></td>
                </tr>
                <?php $tot_amt4 += $acc->amount;
                ?>

                @endforeach
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>{{$tot_amt4}}</td>
                </tr>
                <tr>
                    <td></td>
                    <td><u>Additional Expense</u></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>0</td>
                    <td></td>
                </tr>
                <?php
                 $net = ($gross + $tot_amt3) - $tot_amt4 ;
                ?>
                <tr>
                    <td></td>
                    <td>Net Profit for the Year</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>{{$net}}</td>
                </tr>

                </tbody>


              </table>
              <?php

            session_start();

            $_SESSION['favcolor'] = $net ;

            echo '<br /><a href="balancesheet_acc_list" class="float-right">Balance Sheet</a>';

              ?>

            </div>
          </div>
</div>
@endsection

<script>

    function show_project(){
        // alert('hello');
        $('#proj').show();
    }
    function hide_project(){
        // alert('hello');
        $('#proj').hide();

    }
    // function hide_project_update(){
    //     alert('hello');
    //     $('.update_proj').hide();

    // }
    // function show_project_update(){
    //     // alert('hello');
    //     $('#projj').show();
    // }
    function hide_proj(){
        // alert('hello');
        $('#proj').hide();
    }


</script>
