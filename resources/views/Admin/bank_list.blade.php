@extends('master')
@section('title','Sale Project List')
@section('link','Sale Project List')
@section('content')

<div class="card">
    <div class="card-body p-b-0">
        <label class="text-success">Bank List</label>
        <a href="#" class="float-right btn btn-primary mb-3" data-toggle="modal" data-target="#bank_register">
            Bank Register
        </a>

        <div class="modal fade bs-example-modal-lg" id="bank_register" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-info">
                        <h4 class="modal-title">Bank Registeration Form</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('store_bank')}}" method="POST">
                            @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Bank Name</label>
                                        <input type="text" class="form-control" name="bank_name">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Bank Address</label>
                                        <input type="text" class="form-control" name="bank_address">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Bank Contact</label>
                                        <input type="text" class="form-control" placeholder="" name="bank_contact">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Account Name</label>
                                        <input type="text" class="form-control" placeholder="" name="acc_name">

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Account Code</label>
                                        <input type="text" class="form-control" placeholder="" name="acc_code">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Account Holder Name</label>
                                        <input type="text" class="form-control" placeholder="" name="holder_name">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Opening Date</label>
                                        <input type="date" class="form-control" placeholder="" name="opening_date" id="mdate">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Current Balance</label>
                                        <input type="text" class="form-control" value="" name="current_balance">
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class=" col-md-9">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                           </div>
                        </div>
                    </form>
                </div>

                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="bg-info">
                    <tr>
                        <th>#</th>
                        <th>Bank Name</th>
                        <th>Account Code</th>
                        <th>Account Name</th>
                        <th>Holder Name</th>
                        <th>Opening Date</th>
                        <th>Balance</th>

                        <th class="text-center">Action</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $i=1; ?>
                    @foreach($banks as $bank)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$bank->bank_name}}</td>

                        <td>{{$bank->account_code}}</td>
                        <td>{{$bank->account_name}}&nbsp;({{$bank->currency->name}})</td>
                        <td>{{$bank->account_holder_name}}</td>
                        <td>{{$bank->opeing_date}}</td>
                        <td>{{$bank->balance}}</td>
                        <td class="text-center">
                            <a href="#" class="btn btn-sm btn-primary" data-toggle="collapse" data-target="#collapseExample{{$bank->id}}">
                            <i class="far fa-edit mr-2"></i>Transaction</a>
                            <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#bank_transfer{{$bank->id}}" >
                            <i class="far fa-edit mr-2"></i>Bank Transfer</a>
                        </td>

                </tr>
                <tr>
                    <td></td>

                    <td colspan="8">
                    <div class="collapse" id="collapseExample{{$bank->id}}">
                    <div class="row">
                        <div class="col-md-2">
                            <label style="font-size:15px;" class="text-info">No</label>
                        </div>
                        <div class="col-md-3">
                            <label style="font-size:15px;" class="text-info">Account</label>
                        </div>
                        <div class="col-md-2">
                            <label style="font-size:15px;" class="text-info">Type</label>
                        </div>
                        <div class="col-md-2">
                            <label style="font-size:15px;" class="text-info">Date</label>
                        </div>
                        <div class="col-md-2">
                            <label style="font-size:15px;" class="text-info">Amount</label>
                        </div>
                    </div>
                    <div class="row">
                                <?php $j=1 ?>
                                @foreach($trans as $transa)
                                @if($bank->account_id == $transa->account_id)
                                <div class="col-md-2">
                                    <div style="font-size:15px;">{{$j++}}</div>
                                </div>
                                <div class="col-md-3">

                                    <div style="font-size:15px;">{{$transa->accounting->account_code}}-({{$transa->accounting->account_name}})</div>


                                </div>
                                <div class="col-md-2">
                                {{$transa->type}}


                                </div>
                                <div class="col-md-2">


                                    <div style="font-size:15px;">{{$transa->date}}</div>

                                </div>
                                <div class="col-md-2">


                                    <div style="font-size:15px;">{{$transa->amount}}</div>

                                </div>
                                @endif

                               @endforeach
                            </div>
                  </div>
                    </td>
            </tr>
                {{-- <tr>
                    <td></td>

                    <td colspan="6">
                        <div class="collapse out container mr-5" id="collapseExample{{$bank->id}}">
                            <div class="row">
                                <?php $j=1 ?>
                                @foreach($trans as $transa)
                                @if($bank->account_id == $transa->account_id)
                                <div class="col-md-2">
                                    <label style="font-size:15px;" class="text-info">No</label>
                                    <div style="font-size:15px;">{{$j++}}</div>

                                </div>
                                <div class="col-md-3">
                                    <label style="font-size:15px;" class="text-info">Account</label>

                                    <div style="font-size:15px;">{{$transa->accounting->account_code}}-({{$transa->accounting->account_name}})</div>


                                </div>
                                <div class="col-md-2">
                                    <label style="font-size:15px;" class="text-info">Type</label>
                                    @if ($transa->type == 1)
                                        <div style="font-size:15px;">Debit</div>
                                    @endif
                                    @if ($transa->type == 2)
                                        <div style="font-size:15px;">Credit</div>
                                    @endif

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

                               @endforeach
                            </div>
                        </div>

                    <td>
                </tr> --}}
                @endforeach
            </tbody>
            </table>
            {{-- Modal --}}
            @foreach($banks as $bank)
            <div class="modal fade" id="bank_transfer{{$bank->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('store_tran')}}" method="POST">
                            @csrf

                      <div class="form-group">
                          <label for="">From Account</label>
                          <input type="hidden" value="{{$bank->account_id}}" name="from_acc">
                          <input type="text" value="{{$bank->account_name}}" name="from" class="form-control" readonly>
                      </div>
                      <div class="form-group">
                        <label for="">To Account</label>
                        <select name="transfer_acc" id="" class="form-control">
                            <option value="">Choose Account</option>
                            @foreach ($banks as $b_acc)
                            @if ($b_acc->id != $bank->id)
                            <option value="{{$b_acc->account_id}}" id>{{$b_acc->account_name}}</option>
                            @endif

                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Date</label>
                        <input type="date" name="date" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Remark</label>
                        <input type="text" name="remark" id="" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">Amount</label>
                        <input type="text" name="amount" id="" class="form-control">
                    </div>

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save</button>
                    </div>

                  </div>
                </div>
            </form>
              </div>
        </div>
    </div>
</div>
@endforeach

@endsection

<script>

</script>

