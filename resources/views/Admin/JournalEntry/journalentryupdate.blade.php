@extends('master')
@section('title','Journal Entry')
@section('link','Journal Entry List')
@section('content')



                <h4 class="modal-title">Journal Entry Update</h4>

            <form action="{{route('journal_entry_update',$entry->id)}}" method="POST">

                @csrf
                     <div class="card mt-3">
                    <div class="card-body">
                      <h5 class="card-title"></h5>
                      <div class="row">
                         <div class="col-6">
                            <div class="row">
                            <label class="text-center">From</label>
                            <div class="col-10 offset-1">

                                <div class="form-group">
                                    <label for="name">Type</label>
                                    <select class="custom-select border-info" name="from_type">

                                        <option value={{$entry->getRawOriginal('type')}} selected>{{$entry->type}}</option>

                                        @if ($entry->getRawOriginal('type') == 1)
                                        <option value="2">Credit</option>
                                        @else
                                        <option value="1">Debit</option>
                                        @endif


                                    </select>
                                </div>

                                <div class="form-group" id="fromheading_form">
                                    <label for="name">Heading Type</label>
                                    <select class="custom-select border-info" name="from_heading_id"
                                        id="from_heading" onchange="changeFromSubHeading()">
                                        <option value={{$entry->fromAccount->subheading->heading->id}}>{{$entry->fromAccount->subheading->heading->type_name}}</option>

                                        @foreach ($headings as $heading)
                                        @if ($entry->fromAccount->subheading->heading->id != $heading->id)
                                        <option value={{ $heading->id }}>{{ $heading->type_name }}</option>
                                        @endif

                                        @endforeach

                                    </select>
                                </div>

                                <div class="form-group" id="from_subheading_form">

                                    <label for="name">Sub Heading Type</label>
                                    <select name="from_subheading_id" class="form-control" id="from_subheading" onchange="changeFromAccount()">

                                        <option value={{$entry->fromAccount->subheading->id}}>{{$entry->fromAccount->subheading->name}}</option>
                                        @foreach ($subheadings as $subheading)
                                        @if ( $subheading->id != $entry->fromAccount->subheading->id)
                                        <option value={{ $subheading->id }}>{{ $subheading->name }}</option>

                                        @endif
                                        @endforeach

                                    </select>

                                </div>

                                <div class="form-group" id="from_accounting_form">

                                    <label for="name">Accounting</label>
                                    <select name="from_account_id" class="form-control" id="from_accounting">

                                        <option value={{$entry->fromAccount->id}}>{{ $entry->fromAccount->account_code }}-{{ $entry->fromAccount->account_name }}</option>
                                        @foreach ($accounts as $account)
                                        @if ($entry->fromAccount->id != $account->id)
                                        <option value={{ $account->id }}>{{ $account->account_code }}-{{ $account->account_name }}</option>

                                        @endif
                                        @endforeach

                                    </select>

                                </div>


                            </div>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="row">


                            <label class="text-center">To</label>
                            <div class="col-10 offset-1">

                                <div class="form-group">
                                    <label for="name">Type</label>
                                    <select class="custom-select border-info" name="to_type">

                                        <option value={{$entry->relatedEntry->getRawOriginal('type')}} selected>{{$entry->relatedEntry->type}}</option>

                                        @if ($entry->relatedEntry->getRawOriginal('type') == 1)
                                        <option value="2">Credit</option>
                                        @else
                                        <option value="1">Debit</option>
                                        @endif


                                    </select>
                                </div>

                                <div class="form-group" id="to_heading_form">
                                    <label for="name">Heading Type</label>
                                    <select class="custom-select border-info" name="to_heading_id"
                                        id="to_heading" onchange="changeToSubHeading()">
                                        <option value={{$entry->relatedEntry->toAccount->subheading->heading->id}}>{{$entry->relatedEntry->toAccount->subheading->heading->type_name}}</option>

                                        @foreach ($headings as $heading)
                                        @if ($entry->relatedEntry->toAccount->subheading->heading->id != $heading->id)
                                        <option value={{ $heading->id }}>{{ $heading->type_name }}</option>
                                        @endif

                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group" id="to_subheading_form">

                                    <label for="name">Sub Heading Type</label>
                                    <select name="to_subheading_id" class="form-control" id="to_subheading" onchange="changeToAccount()">

                                        <option value={{$entry->relatedEntry->toAccount->subheading->id}}>{{$entry->relatedEntry->toAccount->subheading->name}}</option>
                                        @foreach ($subheadings as $subheading)
                                        @if ( $subheading->id != $entry->relatedEntry->toAccount->subheading->id)
                                        <option value={{ $subheading->id }}>{{ $subheading->name }}</option>

                                        @endif
                                        @endforeach

                                    </select>

                                </div>

                                <div class="form-group" id="to_accounting_form">

                                    <label for="name">Accounting</label>
                                    <select name="to_account_id" class="form-control" id="to_accounting">

                                        <option value={{$entry->relatedEntry->toAccount->id}}>{{ $entry->relatedEntry->toAccount->account_code }}-{{ $entry->relatedEntry->toAccount->account_name }}</option>
                                        @foreach ($accounts as $account)relatedEntry->
                                        @if ($entry->relatedEntry->toAccount->id != $account->id)
                                        <option value={{ $account->id }}>{{ $account->account_code }}-{{ $account->account_name }}</option>

                                        @endif
                                        @endforeach

                                    </select>

                                </div>

                        </div>
                    </div>
                      </div>


                      <div class="row mt-4">
                        <div class="col-md-6 offset-3">
                            <div class="form-group">
                                <label class="control-label">Amount</label>

                                <input type="number" class="form-control" name="amount" id="convert_amount" value="{{$entry->amount}}">

                            </div>
                        </div>

                        <div class="form-group col-md-6 offset-3">
                            <label class="control-label">Date</label>

                            <input type="date" class="form-control"  name="date" value="{{$entry->entry_date}}">

                        </div>

                        <div class="form-group col-md-6 offset-3">
                            <label class="control-label">Remark</label>
                            <input type="text" class="form-control" name="remark" value="{{$entry->remark}}">
                        </div>


                        <div class="row">
                            <div class="mt-4 text-center">
                                <button type="submit" class="btn btn-success">Update</button>
                                <button type="button" class="btn btn-inverse btn-dismiss" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>

                    </div>

                    </div>
                  </div>

                </form>

@endsection

@section('js')
<script>

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

