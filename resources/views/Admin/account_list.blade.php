@extends('master')
@section('title','Account List')
@section('link','Account List')
@section('content')
<div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Account List</h3>

              <button id="" class="btn btn-primary float-right" data-toggle="modal" data-target="#new_account" onclick="hide_proj()"> <i class="fa fa-plus"></i> Create Accounting</button>
                <div class="modal fade" id="new_account" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    @if($acc_type->id != 3 && $acc_type->id !=4)
                                    <option value="{{$acc_type->id}}">{{$acc_type->type_name}}</option>
                                    @endif
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
                                <label for="name">Carry For Work</label>
                                <div class="row">
                                    <div class="col-md-6">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="no_yes" id="yess" value="1">
                                        <label class="form-check-label text-info" for="bank">Yes</label>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-check form-check-inline">

                                        <input class="form-check-input" type="radio" name="no_yes" id="noo" value="0">
                                        <label class="form-check-label text-info" for="cash">No</label>
                                    </div>
                                    </div>
                                </div>
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
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

              <table id="example1" class="table">
                <thead class="text-center bg-info">
                	<tr>
                    <th>No</th>
                    <th>Account Name</th>
                    <th>Account Code</th>
                    <th>Type</th>

                    <th>Cost Center</th>
                    <th>Opening</th>
                    <th>Closing</th>
                    <th>Currency</th>
                    <th>Related Project</th>
                    <th>Action</th>

                  </tr>
                </thead>
                <?php $i=1; ?>
                <tbody class="text-center">
                @foreach($account as $acc)


                @if ($acc->general_project_flag == 1)

                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$acc->account_name}}</td>
                    <td>{{$acc->account_code}}</td>
                    <td>{{$acc->account_type}}</td>
                    <td>{{$acc->cost_center->name}}</td>
                    <td>{{$acc->opening_balance}}</td>
                    <td>{{$acc->amount}}</td>

                    <td>{{$acc->curr->name}}</td>
                    <td>Yes&nbsp;({{$acc->project->name}})</td>
                    <td><a href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#update_account{{$acc->id}}">Update</a>
                    <a href="" class="btn btn-danger btn-sm">Delete</a></td>
                    </tr>
                @endif

                @if ($acc->general_project_flag == 0)

                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$acc->account_name}}</td>
                    <td>{{$acc->account_code}}</td>
                    <td>{{$acc->account_type}}</td>
                    <td>{{$acc->cost_center->name}}</td>
                    <td>{{$acc->opening_balance}}</td>
                    <td>{{$acc->amount}}</td>

                    <td>{{$acc->curr->name}}</td>
                    <td>No</td>

                    <td><a href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#update_account{{$acc->id}}">Update</a>

                    <a href="" class="btn btn-danger btn-sm">Delete</a></td>
                    </tr>

                @endif
                <div class="modal fade" id="update_account{{$acc->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header bg-info">
                            <h5 class="modal-title" id="exampleModalLabel">Add New Accounting</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{route('update_accounting',$acc->id)}}" method="post">
                            @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name">Account Code</label>
                                <input type="text" class="form-control border border-info" name="acc_code" value="{{$acc->account_code}}">
                            </div>
                            <div class="form-group">
                                <label for="name">Account Name</label>
                                <input type="text" class="form-control border-info" name="acc_name" value="{{$acc->account_name}}">
                            </div>
                            <div class="form-group">
                                <label for="name">Account Type</label>
                                <select class="custom-select border-info" name="account_type_id">
                                <option value="0">{{$acc->account_type}}</option>
                                    @foreach($account_type as $acc_type)
                                    <option value="{{$acc_type->id}}">{{$acc_type->type_name}}</option>
                                   @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">Cost Center</label>
                                <select class="custom-select border-info" name="cost_center">
                                    <option value="{{$acc->cost_center_id}}">{{$acc->cost_center->name}}</option>
                                    @foreach($cost_center as $cc)
                                    <option value="{{$cc->id}}">{{$cc->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">Balance</label>
                                <input type="text" class="form-control border-info" name="balance" value="{{$acc->amount}}">
                            </div>
                            <div class="form-group">
                                <label for="name">Currency</label>
                                <select class="custom-select border-info" name="currency">

                                    <option value="{{$acc->currency_id}}">{{$acc->curr->name}}</option>

                                    @foreach($currency as $cc)
                                    <option value="{{$cc->id}}">{{$cc->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if($acc->carry_for_work == 0)
                            <div class="form-group">
                                <label for="name">Carry For Work</label>
                                <div class="row">
                                    <div class="col-md-6">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="no_yes" id="yess" value="1">
                                        <label class="form-check-label text-info" for="bank">Yes</label>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-check form-check-inline">

                                        <input class="form-check-input" type="radio" name="no_yes" id="noo" value="0" checked>
                                        <label class="form-check-label text-info" for="cash">No</label>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="form-group">
                                <label for="name">Carry For Work</label>
                                <div class="row">
                                    <div class="col-md-6">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="no_yes" id="yess" value="1" checked>
                                        <label class="form-check-label text-info" for="bank">Yes</label>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-check form-check-inline">

                                        <input class="form-check-input" type="radio" name="no_yes" id="noo" value="0">
                                        <label class="form-check-label text-info" for="cash">No</label>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if ($acc->general_project_flag == 1)
                            <div class="form-group">
                                <label for="name">Projected Related</label>
                                <div class="row">
                                    <div class="col-md-6">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="yes_no" id="yes" value="1" onclick="show_project()" checked>
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
                                <option value="{{$acc->project_id}}">{{$acc->project->name}}</option>
                                    @foreach($saleproject as $salepro)
                                    <option value="{{$salepro->id}}">{{$salepro->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @endif
                            @if ($acc->general_project_flag == 0)
                            <div class="form-group">
                                <label for="name">Projected Related</label>
                                <div class="row">
                                    <div class="col-md-6">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="yes_no" id="yes" value="1" onclick="show_project_update()">
                                        <label class="form-check-label text-info" for="bank">Yes</label>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-check form-check-inline">

                                        <input class="form-check-input" type="radio" name="yes_no" id="no" value="2" onclick="hide_project_update()" checked>
                                        <label class="form-check-label text-info" for="cash">No</label>
                                    </div>
                                    </div>
                                </div>
                            </div>

                            @endif

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                        </form>
                        </div>
                    </div>
                </div>
                @endforeach
                </tbody>



              </table>

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
