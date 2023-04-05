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
                                <option value="6">Revenue</option>
                                <option value="14">Other Revenue</option>
                                <option value="7">Receiable</option>
                                <option value="15">Other Receiable</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">Cost Center</label>
                                <select class="custom-select border-info" name="cost_center">
                                <option>Choose Cost Center Name</option>
                                    @foreach($cost_centers as $cc)
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
                    <th>Project Name</th>
                    <th>Related Project</th>

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
                    <td>{{$acc->project->name}}</td>
                    <td>Yes</td>

                    </tr>
                @endif
                @if ($acc->general_project_flag == 0)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$acc->account_name}}</td>
                    <td>{{$acc->account_code}}</td>
                    <td>-</td>
                    <td>No</td>
                    </tr>
                @endif
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
    function hide_proj(){
        // alert('hello');
        $('#proj').hide();
    }


</script>
