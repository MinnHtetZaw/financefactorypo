@extends('master')
@section('title','Sale Project List')
@section('link','Sale Project List')
@section('content')

<div class="row">
    <div class="col-12">
          <div class="card">
          <div class="card-header">
          <div class="row justify-content-between">
              <label class="">Sub Category List<span class="float-right">	<button type="button" data-toggle="modal" data-target="#subcategory" class="btn btn-primary"><i class="fas fa-plus"></i> Add Sub Category</button></span></label>

          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        <div class="table-responsive" id="slimtest2">
          <table id="sub_table" class="table table-bordered table-striped">
            <thead class="text-center bg-info">
                <th>#</th>
                <th>Sub Category Code</th>
                <th>Sub Category Name</th>
                <th>Related Category</th>

                  <th>Action</th>
            </thead>
            <tbody>

                <?php $i = 1; ?>
              @foreach($subcategory as $subcate)
              <tr class="text-center">
                  <td>{{$i++}}</td>
                  <td>{{$subcate->subcategory_code}}</td>
                  <td>{{$subcate->name}}</td>
                  <td>{{$subcate->category->category_name}}</td>

                  <td>
                      <a href="" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#update_subcategory{{$subcate->id}}">Update</a>
                      <a href="" class="btn btn-sm btn-danger"  onclick="ApproveLeave('{{$subcate->id}}')">Delete</a>
                  </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->

  </div>


  <div class="modal fade" id="subcategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Sub Category Form</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-center">

        	<form action="{{route('store_subcategory')}}" method="POST">
        		@csrf
                <div class="form-group">
		            <label for="message-text"  class="float-left">Sub Category Code:</label>
		            <input type="text" class="form-control" id="code" name="code">
                </div>
                <div class="form-group">
		            <label for="message-text"  class="float-left">Related Category</label>
		             <select name="related" id="" class="form-control">
                         <option value="">Choose Category</option>
                         @foreach ($category as $cate)
                             <option value="{{$cate->id}}">{{$cate->category_name}}</option>
                         @endforeach
                     </select>
                </div>
		        <div class="form-group">
		            <label for="message-text"  class="float-left">Sub Category Name:</label>
		            <input type="text" class="form-control" id="name" name="name">
                </div>
	            <input type="submit" name="btnsubmit" class="btn btn-primary float-right btn-submit" value="Create Sub Category">
	        </form>

        </div>
      </div>
    </div>
  </div>
  @foreach($subcategory as $subcate)
  <div class="modal fade" id="update_subcategory{{$subcate->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Sub Category Form</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-center">

        	<form action="{{route('update_subcate')}}" method="POST">
        		@csrf
            <input type="hidden" name="subcate_id" value="{{$subcate->id}}">
                <div class="form-group">
		            <label for="message-text"  class="float-left">Update Sub Category Code:</label>
		            <input type="text" class="form-control" id="code" name="code" value="{{$subcate->subcategory_code}}">
                </div>
                <div class="form-group">
		            <label for="message-text"  class="float-left">Related Category</label>
		             <select name="related" id="" class="form-control">
                         <option value="{{$subcate->category_id}}">{{$subcate->category->category_name}}</option>
                         @foreach ($category as $cate)
                             <option value="{{$cate->id}}">{{$cate->category_name}}</option>
                         @endforeach
                     </select>
                </div>
		        <div class="form-group">
		            <label for="message-text"  class="float-left">Sub Category Name:</label>
		            <input type="text" class="form-control" id="name" name="name" value="{{$subcate->name}}">
                </div>
	            <input type="submit" name="btnsubmit" class="btn btn-primary float-right btn-submit" value="Update Sub Category">
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
$('#sub_table').DataTable( {

"paging":   true,
"ordering": true,
"info":     true

});

// $('#slimtest2').slimScroll({
// color: '#00f',
// height: '600px'
// });
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
        url:'delete_subcate',
        dataType:'json',

        data:{

          "_token": "{{ csrf_token() }}",
          "subcate_id": value,
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
