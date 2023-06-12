@extends('master')
@section('title','Account Type List')
@section('link','Account Type List')
@section('content')
<div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"> Account Type List</h3>

              <button id="" class="btn btn-primary float-right" data-toggle="modal" data-target="#new_account_type" > <i class="fa fa-plus"></i> Create Account Type</button>
                <div class="modal fade" id="new_account_type" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header bg-info">
                            <h5 class="modal-title" id="exampleModalLabel">Add New Acount Type</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{route('account_type_store')}}" method="post">
                            @csrf
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="name">Account Type Name</label>
                                <input type="text" class="form-control border-info" name="account_type_name"  placeholder="eg. Assets">
                            </div>
                            <div class="form-group">
                                <label >Description</label>
                                <textarea name="account_type_description" cols="3" class="form-control"></textarea>
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
                    <th>Account Type</th>
                    <th>Description</th>
                    <th>Action</th>

                  </tr>
                </thead>
                <?php $i=1; ?>
                <tbody class="text-center">
                @foreach($accounttypes as $accounttype)

                <tr>
                    <td>{{$i++}}</td>

                    <td>{{$accounttype->type_name}}</td>
                    <td>{{$accounttype->description}}</td>

                    <td><a href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#update_account_type{{$accounttype->id}}">Update</a>
                    <a href="" class="btn btn-danger btn-sm">Delete</a></td>
            </tr>


                <div class="modal fade" id="update_account_type{{$accounttype->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header bg-info">
                            <h5 class="modal-title" id="exampleModalLabel">Update Account Type</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{route('account_type_update',$accounttype->id)}}" method="post">
                            @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name">Account Type Name</label>
                                <input type="text" class="form-control border-info" name="account_type_name"  placeholder="eg. Assets" value={{$accounttype->type_name}}>
                            </div>
                            <div class="form-group">
                                <label >Description</label>
                                <textarea name="account_type_description" cols="3" class="form-control">{{$accounttype->description}}</textarea>
                            </div>
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


</script>
