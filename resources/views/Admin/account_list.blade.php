@extends('master')
@section('title', 'Account List')
@section('link', 'Account List')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-7">
                            <h3 class="card-title mt-3">Account List</h3>

                        </div>
                        <div class="col-auto">

                            <form action="{{route('searchAccounting')}}" method="POST">

                                @csrf
                            <div class="input-group">
                                <div class="form-outline">
                                  <input type="search" id="form1" name="search" class="form-control" placeholder="Search"/>
                                </div>
                                <button type="submit" class="btn btn-primary rounded ml-2 btn-sm" style="height: 38;margin-top: 6;">
                                  <i class="fas fa-search"></i>
                                </button>
                              </div>
                            </form>

                        </div>
                        <div class="col-2">
                            <button id="" class="btn btn-primary float-right mt-1" data-toggle="modal" data-target="#new_account">
                                <i class="fa fa-plus"></i> Create Accounting</button>
                        </div>
                    </div>








                    <div class="modal fade" id="new_account" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-info">
                                    <h5 class="modal-title" id="exampleModalLabel">Add New Accounting</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('store_accounting') }}" method="post">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="name">Account Type</label>
                                            <select class="custom-select border-info" name="accounting_type_id"
                                                id="account" onchange="changeHeading()">
                                                <option>Choose Account Type</option>
                                                @foreach ($account_type as $acc_type)
                                                    <option value={{ $acc_type->id }}>{{ $acc_type->type_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group" id="heading_form">

                                            <label for="name">Heading Type</label>
                                            <select name="heading_id" class="form-control" id="heading"
                                                onchange="changeSubHeading()">

                                            </select>

                                        </div>

                                        <div class="form-group" id="subheading_form">

                                            <label for="name">Sub Heading Type</label>
                                            <select name="subheading_id" class="form-control" id="subheading">

                                            </select>

                                        </div>

                                        <div class="form-group">
                                            <label for="name">Account Code</label>
                                            <input type="text" class="form-control border border-info" name="acc_code"
                                                id="acc_code" placeholder="eg. 123456">
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Account Name</label>
                                            <input type="text" class="form-control border-info" name="acc_name"
                                                id="acc_name" placeholder="eg. Revenue Account">
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Nature</label>
                                            <select class="custom-select border-info form-control" name="nature">

                                                <option hidden>Choose Nature</option>

                                                    <option value='1'>Debit</option>
                                                    <option value='2'>Credit</option>
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


                                                @foreach ($currency as $cc)
                                                    <option value={{ $cc->id }}>{{ $cc->name }}</option>
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
                                <th>Code</th>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Header</th>
                                <th>SubHeader</th>
                                <th>Nature</th>
                                <th>Balance</th>
                                <th>Currency</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <?php $i = 1; ?>
                        <tbody class="text-center">
                            @foreach ($account as $acc)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $acc->account_code }}</td>
                                    <td>{{ $acc->account_name }}</td>
                                    <td>{{ $acc->subheading->heading->accountingtype->type_name }}</td>
                                    <td>{{ $acc->subheading->heading->type_name }}</td>
                                    <td>{{ $acc->subheading->name }}</td>
                                    <td>
                                        @if ($acc->nature == 1)
                                            Debit
                                        @elseif ($acc->nature == 2)
                                            Credit
                                        @endif

                                    </td>
                                    <td>{{ $acc->balance }}</td>
                                    <td>{{ $acc->currency->name }}</td>

                                    <td><a href="" class="btn btn-warning btn-sm" data-toggle="modal"
                                            data-target="#update_account{{ $acc->id }}">Update</a>
                                        <a href="" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>



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
                                <label for="name">Account Type</label>
                                <select class="custom-select border-info" name="accounting_type_id"
                                    id="account" >
                                    <option value={{$acc->subheading->heading->accountingtype->id}} selected>{{$acc->subheading->heading->accountingtype->type_name}}</option>
                                    @foreach ($account_type as $acc_type)
                                    @if ($acc->subheading->heading->accountingtype->id !=  $acc_type->id)
                                    <option value={{ $acc_type->id }}>{{ $acc_type->type_name }}</option>
                                    @endif

                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group" id="heading_form">

                                <label for="name">Heading Type</label>
                                <select name="heading_id" class="form-control" id="heading">
                                    <option value={{$acc->subheading->heading->id}} selected>{{$acc->subheading->heading->type_name}}</option>
                                    @foreach ($headings as $heading)
                                    @if ($acc->subheading->heading->id !=  $heading->id)
                                    <option value={{ $heading->id }}>{{ $heading->type_name }}</option>
                                    @endif

                                    @endforeach
                                </select>

                            </div>
                            <div class="form-group" id="subheading_form">

                                <label for="name">Sub Heading Type</label>
                                <select name="subheading_id" class="form-control" id="subheading">
                                    <option value={{$acc->subheading->id}} selected>{{$acc->subheading->name}}</option>
                                    @foreach ($subheadings as $subheading)
                                    @if ($acc->subheading->id !=  $subheading->id)
                                    <option value={{ $subheading->id }}>{{ $subheading->name }}</option>
                                    @endif

                                    @endforeach
                                </select>

                            </div>

                            <div class="form-group">
                                <label for="name">Account Code</label>
                                <input type="text" class="form-control border border-info" name="acc_code" value="{{$acc->account_code}}">
                            </div>
                            <div class="form-group">
                                <label for="name">Account Name</label>
                                <input type="text" class="form-control border-info" name="acc_name" value="{{$acc->account_name}}">
                            </div>
                            <div class="form-group">
                                <label for="name">Nature</label>
                                <select class="custom-select border-info form-control" name="nature">
                                    @if ($acc->nature == 1)
                                    <option value={{$acc->nature}} selected>Debit</option>
                                    <option value='2'>Credit</option>
                                    @elseif ($acc->nature == 2)
                                    <option value={{$acc->nature}} selected>Credit</option>
                                    <option value='1'>Debit</option>
                                    @else
                                    <option hidden>Choose Nature</option>
                                    <option value='1'>Debit</option>
                                    <option value='2'>Credit</option>
                                    @endif

                                    fo
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="name">Balance</label>
                                <input type="text" class="form-control border-info" name="balance" value="{{$acc->balance}}">
                            </div>
                            <div class="form-group">
                                <label for="name">Currency</label>
                                <select class="custom-select border-info" name="currency">

                                    <option value="{{$acc->currency_id}}">{{$acc->currency->name}}</option>

                                    @foreach ($currency as $cc)
                                    @if ($acc->currency_id != $cc->id)
                                    <option value="{{$cc->id}}">{{$cc->name}}</option>
                                    @endif

                                    @endforeach
                                </select>
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

    @section('js')
        <script>
            $(document).ready(function() {

                $('#heading_form').hide();
                $('#subheading_form').hide();

            })

            function changeHeading() {

                $('#heading_form').show();
                $('#subheading_form').hide();
                $('#heading').empty()
                var val = $('#account').val();

                $.ajax({
                    type: 'POST',
                    url: '/heading_search',
                    dataType: 'json',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "accouting_type_id": val,
                    },

                    success: function(data) {

                        if (data.length > 0) {
                            $('#heading').append($('<option>').text('Choose Heading'));
                            $.each(data, function(i, value) {
                                $('#heading').append($('<option>').text(value.type_name).attr('value', value
                                    .id));
                            });
                        } else {
                            $('#heading').append($('<option>').text('No Heading'));
                        }
                    },

                    error: function(status) {
                        swal({
                            title: "Something Wrong!",
                            text: "Error in heading search",
                            icon: "error",
                        });
                    }

                });

            };

            function changeSubHeading() {

                $('#subheading_form').show();
                $('#subheading').empty()
                var val = $('#heading').val();

                $.ajax({
                    type: 'POST',
                    url: '/subheading_search',
                    dataType: 'json',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "heading_id": val,
                    },

                    success: function(data) {
                        // console.log(data);
                        if (data.length > 0) {
                            $('#subheading').append($('<option>').text('Choose SubHeading'));
                            $.each(data, function(i, value) {
                                $('#subheading').append($('<option>').text(value.name).attr('value', value.id));
                            });
                        } else {
                            $('#subheading').append($('<option>').text('No SubHeading'));
                        }
                    },

                    error: function(status) {
                        swal({
                            title: "Something Wrong!",
                            text: "Error in heading search",
                            icon: "error",
                        });
                    }

                });

            };
        </script>
    @endsection
