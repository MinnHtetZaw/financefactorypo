@extends('master')
@section('title','Heading List')
@section('link','Heading List')
@section('content')
<div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"> Heading List</h3>

              <button id="" class="btn btn-primary float-right" data-toggle="modal" data-target="#new_heading" > <i class="fa fa-plus"></i> Create Heading</button>
                <div class="modal fade" id="new_heading" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header bg-info">
                            <h5 class="modal-title" id="exampleModalLabel">Add New Heading</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{route('heading_store')}}" method="post">
                            @csrf
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="name">Account Type </label>
                                <select name="accounting_type_id" class="form-control" >
                                    <option hidden>Choose Account Type</option>
                                    @foreach ($accounttypes as $accounttype )
                                    <option value={{$accounttype->id}}>{{$accounttype->type_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">Code</label>
                                <input type="text" class="form-control border-info" name="code"  placeholder="eg. 123">
                            </div>

                            <div class="form-group">
                                <label for="name">Heading Name</label>
                                <input type="text" class="form-control border-info" name="heading_name"  placeholder="eg. Current Assets">
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
                    <th>Code</th>
                    <th>Heading Name</th>
                    <th>Account Type</th>
                    <th>Action</th>

                  </tr>
                </thead>
                <?php $i=1; ?>
                <tbody class="text-center">
                @foreach($headings as $heading)

                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$heading->code}}</td>
                    <td>{{$heading->type_name}}</td>
                    <td>{{$heading->accountingtype->type_name}}</td>

                    <td><a href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#update_heading{{$heading->id}}">Update</a>
                    <a href="" class="btn btn-danger btn-sm">Delete</a></td>
            </tr>


                <div class="modal fade" id="update_heading{{$heading->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header bg-info">
                            <h5 class="modal-title" id="exampleModalLabel">Update Heading Type</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{route('heading_update',$heading->id)}}" method="post">
                            @csrf
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="name">Account Type </label>
                                <select name="accounting_type_id" class="form-control" >
                                    <option value={{$heading->accounting_type_id}} selected>{{$heading->accountingtype->type_name}}</option>
                                    @foreach ($accounttypes as $accounttype )

                                    @if ($accounttype->id != $heading->accounting_type_id)
                                    <option value={{$accounttype->id}}>{{$accounttype->type_name}}</option>
                                    @endif

                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="name">Code</label>
                                <input type="text" class="form-control border-info" name="code"  placeholder="eg. 123" value="{{$heading->code}}">
                            </div>
                            <div class="form-group">
                                <label for="name">Heading Name</label>
                                <input type="text" class="form-control border border-info" name="heading_name" value="{{$heading->type_name}}">
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
