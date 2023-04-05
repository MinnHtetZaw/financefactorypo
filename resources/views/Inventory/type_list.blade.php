@extends('master')
@section('title', 'Types')
@section('content')

<div class="col-md-5 col-8 align-self-center">
    <h3 class="text-themecolor m-b-0 m-t-0">TYPE</h3>
   
</div>

<div class="row mt-5">
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-body">
                <h4 class="card-title">Type Lists</h4>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                            <th>#</th>
                                <th>Type Code</th>
                                <th>Type Name</th>
                                <th>Related Brand</th>
                                <th>Related SubCategory</th>
                                <th class="text-center">Action</th>
                     
                            </tr>
                        </thead>
                        <tbody>
                        <?php $i=1;?>
                            @foreach($types as $type)
                            
                            <tr>
                            <td>{{$i++}}</td>
                                <td>{{$type->type_code}}</td>
                                <td>{{$type->name}}</td>
                                <td>
                                    @foreach ($type->brands as $brand)
                                        {{$brand->name}}
                                    @endforeach
                                    
                                </td>
                                <td> 
                                     @foreach ($type->subcategories as $subcategory)
                                        {{$subcategory ->name}}
                                     @endforeach
                                    </td>
                                <td class="text-center">
                                    <a href="#" class="btn bneonblue text-white" data-toggle="modal" data-target="#edit_subcategory{{$type->id}}">
                                Edit</a>

                                   
                            
                                    <a href="#" class="btn bpinkcolor text-white" onclick="ApproveLeave('{{$type->id}}')">
                                Delete</a>
                                   
                                </td>
                                
                                <div class="modal fade" id="edit_subcategory{{$type->id}}" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                  <div class="modal-header">
                                    <h4 class="modal-title pinkcolor">Edit Category Form</h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>

                                    <div class="modal-body">
                                        <form class="form-material m-t-40" method="post" action="{{route('type_update', $type->id)}}">
                                            @csrf
                                            <div class="form-group">    
                                                <label class="font-weight-bold">Code</label>
                                                <input type="number" name="type_code" class="form-control" value="{{$type->type_code}}"> 
                                            </div>
                                            
                                            <div class="form-group">    
                                                <label class="font-weight-bold">Name</label>
                                                <input type="text" name="type_name" class="form-control" value="{{$type->name}}"> 
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
                <h3 class="card-title">Create Type Form</h3>
                <form class="form-material m-t-40" method="post" action="{{route('type_store')}}">
                    @csrf
                    
                    
                    <div class="form-group">
                            <label class="font-weight-bold">Category</label>
                            <select class="form-control" name="category" required onchange="showSubCategory(this.value)">
                            <option value="">select category</option>
                            @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->category_name}}</option>
                            @endforeach
                        </select>

                        @error('band_code')
                            <span class="invalid-feedback alert alert-danger" role="alert"  height="100">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                    <label class="font-weight-bold">SubCategory</label>
                            <select class="form-control" name="subcategory" id="subcategory" required onchange="showBrand(this.value)">
                            <option value="">select subcategory</option>
                           
                            </select>

                        @error('band_code')
                            <span class="invalid-feedback alert alert-danger" role="alert"  height="100">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                            <label class="font-weight-bold">Brand</label>
                            <select class="form-control" name="brand"  id="brands">
                            <option value="">select brand</option>
                         
                            </select>

                        @error('band_code')
                            <span class="invalid-feedback alert alert-danger" role="alert"  height="100">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">    
                        <label class="font-weight-bold">Code</label>
                        <input type="number" name="type_code" class="form-control @error('type_code') is-invalid @enderror" placeholder="enter type code">

                        @error('type_code')
                            <span class="invalid-feedback alert alert-danger" role="alert"  height="100">
                                {{ $message }}
                            </span>
                        @enderror

                    </div>
                    <div class="form-group">    
                        <label class="font-weight-bold">Name</label>
                        <input type="text" name="type_name" class="form-control @error('category_name') is-invalid @enderror" placeholder="enter type name">

                        
                        @error('type_name')
                            <span class="invalid-feedback alert alert-danger" role="alert"  height="100">
                                {{ $message }}
                            </span>
                        @enderror 
                

                    </div>
                    <input type="submit" name="btnsubmit" class="btnsubmit float-right btn btn-warning" value="save type">
                </form>
            </div>
        </div>
    </div>
</div> 

   
</div>



@endsection

@section('js')
<script>
$(document).ready(function(){

});

function showSubCategory(value) {

var category_id = value;

$('#subcategory').empty();

$.ajax({
    type: 'POST',
    url: '/showSubCategory',
    dataType: 'json',
    data: {
        "_token": "{{ csrf_token() }}",
        "category_id": category_id,
    },

    success: function(data) {

        console.log(data);
        $('#subcategory').empty();
        $('#subcategory').append($('<option>').text('Select'));

        $.each(data, function(i, value) {

            $('#subcategory').append($('<option>').text(value.name).attr('value', value.id));
        });

    }

});

}


function showBrand(value) {

var subcategory_id = value;

$('#brands').empty();

$.ajax({
    type: 'POST',
    url: '/showBrand',
    dataType: 'json',
    data: {
        "_token": "{{ csrf_token() }}",
        "subcategory_id": subcategory_id,
    },

    success: function(data) {

        console.log(data);

        $('#brands').append($('<option>').text('Select'));

        $.each(data, function(i, value) {

            $('#brands').append($('<option>').text(value.name).attr('value', value.id));
        });

    }

});

}

function ApproveLeave(value){

var type_id = value;

swal({
    title: "@lang('lang.confirm')",
    icon:'warning',
    buttons: ["@lang('lang.no')", "@lang('lang.yes')"]
})

.then((isConfirm)=>{

if(isConfirm){

    $.ajax({
        type:'POST',
        url:'type/delete',
        dataType:'json',
        data:{ 
          "_token": "{{ csrf_token() }}",
          "type_id": type_id,
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

