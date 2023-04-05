@extends('master')
@section('title','Currency List')
@section('link','Currency List')
@section('content')
<div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Currency List</h3>

              <button id="" class="btn btn-primary float-right" data-toggle="modal" data-target="#currency"> <i class="fa fa-plus"></i> Create Currency</button>
            </div>
            <div class="card-body">

                <table id="example1" class="table">
                  <thead class="text-center bg-info">
                      <tr>
                      <th>No</th>
                      <th>Code</th>
                      <th>Name</th>
                      <th>Exchage Rate</th>
                      <th>Last Update</th>
                      <th>Action</th>

                    </tr>
                  </thead>
                  <?php $i=1; ?>
                  <tbody class="text-center">
                      @foreach ($currency as $cc)
                          <tr>
                              <td>{{$i++}}</td>
                              <td>{{$cc->code}}</td>
                              <td>{{$cc->name}}</td>
                              <td>{{$cc->exchange_rate}}</td>
                              <td>{{$cc->last_update}}</td>
                              <td>
                                  <a href="" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#update_currency{{$cc->id}}">Update</a>
                              </td>
                          </tr>
                      @endforeach
                  </tbody>
                </table>
          </div>
        </div>
    </div>
</div>

<div class="modal fade" id="currency" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header bg-info">
            <h5 class="modal-title" id="exampleModalLabel">Add New Cost Center</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="{{route('store_currency')}}" method="post">
            @csrf
        <div class="modal-body">
            <div class="form-group">
                <label for="name">Code</label>
                <input type="text" class="form-control border border-info" name="code">
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control border border-info" name="name" placeholder="eg. mg mg">
            </div>
            <div class="form-group">
                <label for="name">Exchange Rate</label>
                <input type="text" class="form-control border border-info" name="rate">
            </div>
            <div class="form-group">
                <label for="name">Last Update</label>
                <input type="date" class="form-control border border-info" name="last">
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

@foreach ($currency as $cc)
<div class="modal fade" id="update_currency{{$cc->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header bg-info">
            <h5 class="modal-title" id="exampleModalLabel">Update Currency</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="{{route('update_currency',$cc->id)}}" method="post">
            @csrf
        <div class="modal-body">

            <div class="form-group">
                <label for="name">Exchange Rate</label>
                <input type="text" class="form-control border border-info" name="rate" value="{{$cc->exchange_rate}}">
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
@endforeach

@endsection
