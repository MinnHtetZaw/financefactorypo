@extends('master')
@section('title','Account List')
@section('link','Account List')
@section('content')
<div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Cost Center List</h3>

              <button id="" class="btn btn-primary float-right" data-toggle="modal" data-target="#cost_center"> <i class="fa fa-plus"></i> Create Cost Center</button>
            </div>
            <div class="card-body">

                <table id="example1" class="table">
                  <thead class="text-center bg-info">
                      <tr>
                      <th>No</th>
                      <th>Cost Center Name</th>
                      <th>Action</th>

                    </tr>
                  </thead>
                  <?php $i=1; ?>
                  <tbody class="text-center">
                      @foreach ($cost_centers as $cc)
                          <tr>
                              <td>{{$i++}}</td>
                              <td>{{$cc->name}}</td>
                              <td>
                                  <a href="" class="btn btn-sm btn-warning">Update</a>
                                  <a href="" class="btn btn-sm btn-danger">Delete</a>
                              </td>
                          </tr>
                      @endforeach
                  </tbody>
                </table>
          </div>
        </div>
    </div>
</div>

<div class="modal fade" id="cost_center" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header bg-info">
            <h5 class="modal-title" id="exampleModalLabel">Add New Cost Center</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="{{route('store_cost_center')}}" method="post">
            @csrf
        <div class="modal-body">
            <div class="form-group">
                <label for="name">Cost Center Name</label>
                <input type="text" class="form-control border border-info" name="cc_name" placeholder="eg. mg mg">
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
@endsection
