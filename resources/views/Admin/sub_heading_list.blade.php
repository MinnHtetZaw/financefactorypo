@extends('master')
@section('title','Sub Heading List')
@section('link','Sub Heading List')
@section('content')

<div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"> Sub Heading List</h3>

              <button id="" class="btn btn-primary float-right" data-toggle="modal" data-target="#new_subheading" > <i class="fa fa-plus"></i> Create Sub Heading</button>
                <div class="modal fade" id="new_subheading" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header bg-info">
                            <h5 class="modal-title" id="exampleModalLabel">Add New Sub Heading</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{route('subheading_store')}}" method="post">
                            @csrf
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="name">Accounting Type </label>
                                <select name="account_id" class="form-control" id="account" onchange="changeHeading()">
                                    <option hidden>Choose Accounting Type</option>
                                    @foreach ($accounttypes as $accounttype )
                                    <option value={{$accounttype->id}} >{{$accounttype->type_name}}</option>
                                    @endforeach
                                </select>
                            </div>



                            <div class="form-group" id="heading_form">

                                <label for="name">Heading Type</label>
                                <select name="heading_id" class="form-control" id="heading">

                                </select>

                            </div>

                            <div class="form-group">
                                <label for="name">Code</label>
                                <input type="text" class="form-control border-info" name="code"  placeholder="eg. 123">
                            </div>

                            <div class="form-group">
                                <label for="name">Sub Heading Name</label>
                                <input type="text" class="form-control border-info" name="subheading_name"  placeholder="eg. Tangible Assets">
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
                    <th>Sub Heading</th>
                    <th>Heading</th>
                    <th>Action</th>

                  </tr>
                </thead>
                <?php $i=1; ?>
                <tbody class="text-center">
                @foreach($subheadings as $subheading)

                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$subheading->code}}</td>
                    <td>{{$subheading->name}}</td>
                    <td>{{$subheading->heading->type_name}}</td>
                    <td><a href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#update_subheading{{$subheading->id}}">Update</a>
                    <a href="" class="btn btn-danger btn-sm">Delete</a></td>
            </tr>


                <div class="modal fade" id="update_subheading{{$subheading->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header bg-info">
                            <h5 class="modal-title" id="exampleModalLabel">Update SubHeading</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{route('subheading_update',$subheading->id)}}" method="post">
                            @csrf


                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name">Heading </label>
                                <select name="heading_id" class="form-control border border-info">
                                    <option value={{$subheading->heading_id}} selected>{{$subheading->heading->type_name}}</option>
                                    @foreach ($headings as $heading )
                                    @if( $heading->id != $subheading->heading_id)
                                    <option value={{$heading->id}}>{{$heading->type_name}}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">Code</label>
                                <input type="text" class="form-control border-info" name="code"  placeholder="eg. 123"  value="{{$subheading->code}}">
                            </div>
                            <div class="form-group">
                                <label for="name">Sub Heading Name</label>
                                <input type="text" class="form-control border border-info" name="subheading_name" value="{{$subheading->name}}">
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
<script  type="text/javascript">

$(document).ready(function() {


    $('#heading_form').hide();

});

function changeHeading(){
    $('#heading_form').show();
    $('#heading').empty()
    var val  = $('#account').val();
    $.ajax({
                        type: 'POST',
                        url: '/heading_search',
                        dataType: 'json',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "accouting_type_id": val,
                        },

                        success: function(data) {
                            // console.log(data);
                            if(data.length > 0){
                                $('#heading').append($('<option>').text('Choose Heading'));
                                $.each(data, function(i, value) {
                                    $('#heading').append($('<option>').text(value.type_name).attr('value', value.id));
                                });
                            }else{
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

</script>
@endsection
