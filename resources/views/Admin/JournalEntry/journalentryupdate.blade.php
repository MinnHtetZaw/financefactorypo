@extends('master')
@section('title','Journal Entry')
@section('link','Journal Entry List')
@section('content')


<div class="row">
    <div class="col-12">
          <div class="card">
          <div class="card-header">

            <div class="col-12">
          <div class="row justify-content-between">

              <label class="">Journal Entry List<span class="float-right">
                <button type="button" data-toggle="modal" data-target="#add_entry" class="btn btn-primary" onclick="hide_bank_acc()"><i class="fas fa-plus"></i> Entry</button>

          </div>

          </div>

        </div>
        <div class="card-body">
            <div class="row">
        <div class="col-md-12">

            <div class="table-responsive" id="slimtest2">

                <table class="table table-hover" >


                            <thead class="bg-info text-white text-center">
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>From_Account</th>
                                <th>Credit/Debit</th>
                                <th>Amount</th>
                                <th>Remark</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody id="filter_date">

                            @forelse ($entries as $key=>$data)

                            <tr class="text-center">
                                <td style="font-size:15px; width:50px" class="border-0">{{++$key}}</td>
                                <td style="font-size:15px; width:50px" class="border-0">{{$data->entry_date}}</td>
                                <td style="font-size:15px; width:50px" class="border-0">{{$data->fromAccount->account_code}}-{{$data->fromAccount->account_name}}</td>
                                <td style="font-size:15px; width:50px" class="border-0">{{$data->type}}</td>
                                <td style="font-size:15px; width:50px" class="border-0">{{$data->amount}}</td>
                                <td style="font-size:15px; width:50px" class="border-0">{{$data->remark}}</td>
                                <td style="font-size:15px; width:50px" class="border-0">
                                    <button class="btn btn-primary btn-sm"  data-toggle="collapse" data-target="#related_entry{{$data->id}}" >
                                        <i class="fa fa-caret-down" aria-hidden="true"></i>
                                    </button>
                                    <button class="btn btn-warning btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>

                                    </button>

                                    <button class="btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i>

                                    </button>

                                </td>

                            </tr>

                            <tr>
                                <td colspan="9">
                                    <div class="collapse" id="related_entry{{$data->id}}">
                                        <table class="table table-borderless col-8 offset-2">
                                            <thead  class="text-center fst-italic">
                                                <tr>
                                                    <th>Date</th>
                                                    <th>To Account</th>
                                                    <th>Credit/Debit</th>
                                                    <th>Remark</th>

                                                </tr>
                                            </thead>
                                           <tbody>
                                                <tr  class="text-center fst-italic">
                                                    <td>{{$data->relatedEntry->entry_date}}</td>
                                                    <td>{{$data->relatedEntry->toAccount->account_code}}-{{$data->relatedEntry->toAccount->account_name}}</td>
                                                    <td>{{$data->relatedEntry->type}}</td>
                                                    <td>{{$data->relatedEntry->remark}}</td>
                                                </tr>
                                           </tbody>
                                        </table>
                                    </div>
                                </td>
                            </tr>

                            @empty
                                <tr>
                                    <td colspan="9">
                                        <p class="text-center text-danger">There is no entry data !</p>
                                    </td>
                                </tr>
                            @endforelse



                        </tbody>


                </table>

            </div>
        </div>
    </div>
        </div>
    </div>
</div>
</div>

<div class="modal fade" id="add_entry" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Journal Entry</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
            </div>

            <div class="modal-body">

                <form action="{{route('store_journal_entry')}}" method="POST">

                    @csrf
                    <div class="row">
                        <label >From</label>
                        <div class="col-10 offset-1">

                            <div class="form-group">
                                <label for="name">Type</label>
                                <select class="custom-select border-info" name="from_type">
                                    <option hidden>Choose Type</option>
                                    <option value="1">Debit</option>
                                    <option value="2">Credit</option>

                                </select>
                            </div>

                            <div class="form-group" id="fromheading_form">
                                <label for="name">Heading Type</label>
                                <select class="custom-select border-info" name="from_heading_id"
                                    id="from_heading" onchange="changeFromSubHeading()">
                                    <option>Choose Heading Type</option>
                                    @foreach ($headings as $heading)
                                        <option value={{ $heading->id }}>{{ $heading->type_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group" id="from_subheading_form">

                                <label for="name">Sub Heading Type</label>
                                <select name="from_subheading_id" class="form-control" id="from_subheading" onchange="changeFromAccount()">

                                </select>

                            </div>

                            <div class="form-group" id="from_accounting_form">

                                <label for="name">Accounting</label>
                                <select name="from_account_id" class="form-control" id="from_accounting">

                                </select>

                            </div>

                        </div>

                    </div>

                    <div class="row">
                        <label >To</label>
                        <div class="col-10 offset-1">

                            <div class="form-group">
                                <label for="name">Type</label>
                                <select class="custom-select border-info" name="to_type">
                                    <option hidden>Choose Type</option>
                                    <option value="1">Debit</option>
                                    <option value="2">Credit</option>

                                </select>
                            </div>

                            <div class="form-group" id="to_heading_form">
                                <label for="name">Heading Type</label>
                                <select class="custom-select border-info" name="to_heading_id"
                                    id="to_heading" onchange="changeToSubHeading()">
                                    <option>Choose Heading Type</option>
                                    @foreach ($headings as $heading)
                                        <option value={{ $heading->id }}>{{ $heading->type_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group" id="to_subheading_form">

                                <label for="name">Sub Heading Type</label>
                                <select name="to_subheading_id" class="form-control" id="to_subheading" onchange="changeToAccount()">

                                </select>

                            </div>

                            <div class="form-group" id="to_accounting_form">

                                <label for="name">Accounting</label>
                                <select name="to_account_id" class="form-control" id="to_accounting">

                                </select>

                            </div>

                        </div>

                    </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Amount</label>

                                        <input type="number" class="form-control" name="amount" id="convert_amount" value="0">

                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label">Date</label>

                                <input type="date" class="form-control"  name="date">

                            </div>

                            <div class="form-group">
                                <label class="control-label">Remark</label>
                                <input type="text" class="form-control" name="remark">
                            </div>


                                <div class="row">
                                    <div class="mt-4 col-md-9">
                                        <button type="submit" class="btn btn-success">Submit</button>
                                        <button type="button" class="btn btn-inverse btn-dismiss" data-dismiss="modal">Cancel</button>
                                    </div>
                                </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>

    $(document).ready(function() {

    $('#from_subheading_form').hide();
    $('#from_accounting_form').hide();

    $('#to_subheading_form').hide();
    $('#to_accounting_form').hide();

    })

    function changeFromSubHeading() {

    $('#from_subheading_form').show();
    $('#from_accounting_form').hide();
    $('#from_subheading').empty()
    var val = $('#from_heading').val();

    $.ajax({
        type: 'POST',
        url: '/subheading_search',
        dataType: 'json',
        data: {
            "_token": "{{ csrf_token() }}",
            "heading_id": val,
        },

        success: function(data) {

            if (data.length > 0) {
                $('#from_subheading').append($('<option>').text('Choose SubHeading'));
                $.each(data, function(i, value) {
                    $('#from_subheading').append($('<option>').text(value.name).attr('value', value.id));
                });
            } else {
                $('#from_subheading').append($('<option>').text('No SubHeading'));
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

                function changeToSubHeading() {

            $('#to_subheading_form').show();
            $('#to_accounting_form').hide();
            $('#to_subheading').empty()
            var val = $('#to_heading').val();

            $.ajax({
                type: 'POST',
                url: '/subheading_search',
                dataType: 'json',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "heading_id": val,
                },

                success: function(data) {

                    if (data.length > 0) {
                        $('#to_subheading').append($('<option>').text('Choose SubHeading'));
                        $.each(data, function(i, value) {
                            $('#to_subheading').append($('<option>').text(value.name).attr('value', value.id));
                        });
                    } else {
                        $('#to_subheading').append($('<option>').text('No SubHeading'));
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

                function changeToAccount() {

                $('#to_accounting_form').show();
                $('#to_accounting').empty()
                var val = $('#to_subheading').val();

                $.ajax({
                type: 'POST',
                url: '/account_search',
                dataType: 'json',
                data: {
                "_token": "{{ csrf_token() }}",
                "subheading_id": val,
                },

                success: function(data) {

                if (data.length > 0) {
                    $('#to_accounting').append($('<option>').text('Choose Account'));
                    $.each(data, function(i, value) {
                        $('#to_accounting').append($('<option>').text(value.account_name).attr('value', value.id));
                    });
                } else {
                    $('#to_accounting').append($('<option>').text('No Account'));
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


    function changeFromAccount() {

        $('#from_accounting_form').show();
        $('#from_accounting').empty()
        var val = $('#from_subheading').val();

        $.ajax({
        type: 'POST',
        url: '/account_search',
        dataType: 'json',
        data: {
        "_token": "{{ csrf_token() }}",
        "subheading_id": val,
        },

    success: function(data) {

        if (data.length > 0) {
            $('#from_accounting').append($('<option>').text('Choose Account'));
            $.each(data, function(i, value) {
                $('#from_accounting').append($('<option>').text(value.account_name).attr('value', value.id));
            });
        } else {
            $('#from_accounting').append($('<option>').text('No Account'));
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

