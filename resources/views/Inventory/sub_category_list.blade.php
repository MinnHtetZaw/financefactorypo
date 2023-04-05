@extends('master')
@section('title', 'Subcategory')
@section('content')
	

<div class="col-md-5 col-8 align-self-center">
    <h3 class="text-themecolor m-b-0 m-t-0">SUB CATEGORY</h3>
   
</div>

<div class="row mt-5">
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-body">
                <h4 class="card-title">Sub Category Lists</h4>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Sub Category code</th>
                                <th>Related Category</th>
                                <th>SubCategory Name</th>
                                <th class="text-center">Action</th>
                     
                            </tr>
                        </thead>
                        <tbody id="category_table">
                        <?php $i=1;
                            
                            ?>
                            @foreach($sub_categories as $sub_category)
                            
                            <tr>
                            <td>{{$i++}}</td>
                                <td>{{$sub_category->subcategory_code}}</td>
                                <td>{{$sub_category->category->category_name}}</td>
                                <td>{{$sub_category->name}}</td>

                                <td class="text-center">
                                    <a href="#" class="btn bneonblue text-white" data-toggle="modal" data-target="#edit_subcategory{{$sub_category->id}}">
                                Edit</a>

                                   
                            
                                    <a href="#" class="btn bpinkcolor text-white" onclick="ApproveLeave('{{$sub_category->id}}')">
                                Delete</a>
                                   
                                </td>
                                
                                <div class="modal fade" id="edit_subcategory{{$sub_category->id}}" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                  <div class="modal-header">
                                    <h4 class="modal-title pinkcolor">Edit Category Form</h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>

                                    <div class="modal-body">
                                        <form class="form-material m-t-40" method="post" action="{{route('sub_category_update', $sub_category->id)}}">
                                            @csrf
                                            <div class="form-group">    
                                                <label class="font-weight-bold">Code</label>
                                                <input type="number" name="sub_category_code" class="form-control" value="{{$sub_category->subcategory_code}}"> 
                                            </div>
                                            <div class="form-group">
                                            <label class="font-weight-bold">Category</label>
                                            <select class="form-control" name="category" required>
                                                
                                                @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->category_name}}</option>
                                                @endforeach
                                            </select>
                                            </div>
                                            <div class="form-group">    
                                                <label class="font-weight-bold">Name</label>
                                                <input type="text" name="sub_category_name" class="form-control" value="{{$sub_category->name}}"> 
                                            </div>
                                            <input type="submit" name="btnsubmit" class="btnsubmit float-right btn bbluecolor text-white" value="Save">
                                        </form>           
                                    </div>
                               
                              </div>
                                    </div>
                                </div>
                            </tr>
                           @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <div class="col-md-4">
        <div class="card shadow">
            <div class="card-body">
                <h3 class="card-title">Create Category Form</h3>
                <form class="form-material m-t-40" method="post" action="{{route('sub_category_store')}}">
                    @csrf
                    <div class="form-group">    
                        <label class="font-weight-bold">Code</label>
                        <input type="number" name="sub_category_code" class="form-control @error('category_code') is-invalid @enderror" placeholder="enter sub_category code">

                        
                        @error('sub_category_code')
                            <span class="invalid-feedback alert alert-danger" role="alert"  height="100">
                                {{ $message }}
                            </span>
                        @enderror
                       

                    </div>
                    <div class="form-group">
                                            <label class="font-weight-bold">Category</label>
                                            <select class="form-control" name="category" required>
                                                <option value="">select category</option>
                                                @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->category_name}}</option>
                                                @endforeach
                                            </select>
                                            @error('category')
                            <span class="invalid-feedback alert alert-danger" role="alert"  height="100">
                                {{ $message }}
                            </span>
                        @enderror
                                            </div>
                    <div class="form-group">    
                        <label class="font-weight-bold">Name</label>
                        <input type="text" name="sub_category_name" class="form-control @error('category_name') is-invalid @enderror" placeholder="enter sub_category name">

                        
                        @error('sub_category_name')
                            <span class="invalid-feedback alert alert-danger" role="alert"  height="100">
                                {{ $message }}
                            </span>
                        @enderror 
                

                    </div>
                    <input type="submit" name="btnsubmit" class="btnsubmit float-right btn btn-warning" value="save subcategory">
                </form>
            </div>
        </div>
    </div>
</div> 

   
</div>



@endsection
@section('js')
<script>
function ApproveLeave(value){

var sub_category_id = value;

swal({
    title: "Confirm",
    icon:'warning',
    buttons: ["No", "Yes"]
})

.then((isConfirm)=>{

if(isConfirm){

    $.ajax({
        type:'POST',
        url:'subcategory/delete',
        dataType:'json',
        data:{ 
          "_token": "{{ csrf_token() }}",
          "sub_category_id": sub_category_id,
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


