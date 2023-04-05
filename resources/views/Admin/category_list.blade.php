@extends('master')
@section('title','Category List')
@section('link','Category List')
@section('content')

<div class="row">
    <div class="col-12">
          <div class="card">
          <div class="card-header">
          <div class="row justify-content-between">
              <label class=""> List<span class="float-right">	<button type="button" data-toggle="modal" data-target="#category" class="btn btn-primary"><i class="fas fa-plus"></i> Add Category</button></span></label>

          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="table-responsive" id="slimtest2">
          <table id="category_table" class="table table-bordered table-striped">
            <thead class="text-center bg-info">
                <th>#</th>
                <th>Category Code</th>
                  <th>Category Name</th>
                  <th>Action</th>
            </thead>
            <tbody>
              <?php $i=1; ?>
              @foreach($category as $cate)
              <tr class="text-center">
                  <td>{{$i++}}</td>
                  <td>{{$cate->category_code}}</td>
                  <td>{{$cate->category_name}}</td>
                  <td>
                      <a href=""  data-toggle="modal" data-target="#update_category{{$cate->id}}" class="btn btn-sm btn-warning" data-code="{{$cate->category_code}}" data-name="{{$cate->category_name}}" onclick="update_old('{{$cate->id}}')">Update</a>
                      <button class="btn btn-sm btn-danger" onclick="ApproveLeave('{{$cate->id}}')">Delete</button>
                  </td>
              </tr>


              @endforeach
            </tbody>
          </table>
        </div><!--tab-responsive -->
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>

  <div class="modal fade" id="category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Category Form</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-center">

        	<form action="{{route('store_category')}}" method="POST">
        		@csrf
                <div class="form-group">
		            <label for="message-text"  class="float-left">Category Code:</label>
		            <input type="text" class="form-control" id="code" name="code" >
                </div>
		        <div class="form-group">
		            <label for="message-text"  class="float-left">Category Name:</label>
		            <input type="text" class="form-control" id="name" name="name" >
                </div>
	            <input type="submit" name="btnsubmit" class="btn btn-primary float-right btn-submit" value="Create Category">
	        </form>

        </div>
      </div>
    </div>
  </div>
@foreach($category as $cate)
<div class="modal fade" id="update_category{{$cate->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Category Form</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-center">

        	<form action="{{route('update_cate')}}" method="POST">
        		@csrf
            <input type="hidden" name="cate_id" value="{{$cate->id}}">
                <div class="form-group">
		            <label for="message-text"  class="float-left">Category Code:</label>
		            <input type="text" class="form-control" id="code" name="code" value="{{$cate->category_code}}">
                </div>
		        <div class="form-group">
		            <label for="message-text"  class="float-left">Category Name:</label>
		            <input type="text" class="form-control" id="name" name="name" value="{{$cate->category_name}}">
                </div>
	            <input type="submit" name="btnsubmit" class="btn btn-primary float-right btn-submit" value="Update Category">
	        </form>

        </div>
      </div>
    </div>
  </div>
@endforeach
@endsection
@section('js')
<script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>

<script src="{{asset('assets/js/jquery.slimscroll.js')}}"></script> 
<script>
$('#category_table').DataTable( {

"paging":   true,
"ordering": true,
"info":     true

});

// $('#slimtest2').slimScroll({
// color: '#00f',
// height: '600px'
// });


function update_old($cateid)
{

}
function ApproveLeave(value){

var brand_id = value;

swal({

    title: "Confirm!!!",
    icon:'warning',
    buttons: ["No", "Yes"]

})

.then((isConfirm)=>{

if(isConfirm){

    $.ajax({
        type:'POST',
        url:'delete_cate',
        dataType:'json',

        data:{

          "_token": "{{ csrf_token() }}",
          "category_id": value,
        },

        success: function(){



            swal({
                title: "Success!",
                text : "Successfully Deleted!",
                icon : "success",
            });

            setTimeout(function(){window.location.reload()}, 1000);



        },

    });
}
});


}

</script>
@endsection
