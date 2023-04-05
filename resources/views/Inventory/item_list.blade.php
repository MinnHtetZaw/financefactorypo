@extends('master')
@section('title', 'Item Lists')
@section('content')

<!-- Begin -->



<div class="col-md-5 col-8 align-self-center">
    <h3 class="text-themecolor m-b-0 m-t-0">ITEM</h3>
   
</div>





<div class="row">
    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-header">

                <h4 class="font-weight-bold mt-2">Item lists</h4>
                <div class="modal fade" id="create_item" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title pinkcolor">Item Create Form</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                <form class="form-material m-t-40" method="post" action="{{route('item_store')}}" enctype='multipart/form-data'>
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Category</label>
                                                    <select class="form-control select2 m-b-10" name="category_id" style="width: 100%" onchange="showSubCategory(this.value)">
                                                        @foreach($all_categories as $category)
                                                        <option value="{{$category->id}}">{{$category->category_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Item Code</label>
                                                    <input type="text" name="item_code" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Item Name</label>
                                                    <input type="text" name="item_name" class="form-control">
                                                </div>
                                            </div>
                                             <div class="col-md-4 col-4">
                                                <div class="form-group">
                                                    <label class="control-label">Item Photo</label>
                                                    <input type="file" name="photo_path" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                       
                                       

                                        <div class="form-actions">
                                            <div class="row">
                                                <div class=" col-md-9">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                    <button class="btn bbluecolor text-white" id="save_values">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="card-body">
            
                <div class="row">

                   
                 

                    



                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label class="control-label">Category</label>
                        <select class="form-control" id="category" onchange="showRelatedItemList(this.value)">
                            <option value="">select category</option>
                            @foreach($all_categories as $category)
                            <option value="{{$category->id}}">{{$category->category_name}}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
                
                <div class="row">
                    <div class="col-12 mb-3">
                    <a href="#" class="btn bbluecolor text-white btn-rounded float-right" data-toggle="modal" data-target="#create_item">
                    <!-- <i class="fas fa-plus"></i> -->
                    Add Item
                </a>
                       
                       
                            <div id="navpills-1" class="tab-pane active">
                                <div class="table-responsive">
                                    <table class="table mt-3" id="example23">
                                        <thead>
                                            <tr>
                                                <th>Item Code</th>
                                                <th>Item Name</th>
                                                <th>Unit List</th>
                                                <th>Unit Conversion</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="item">
                                        @foreach($item_lists as $item)
                                            <tr>
                                            <td>{{$item->item_code}}</td>
                                                <td>{{$item->item_name}} </td>
                                                <td>
                                                    <a href="{{route('count_unit_list',$item->id)}}" class="btn btn-outline-info">
                                                       Check</a>
                                                </td>
                                                <td>
                                                    <a href="{{route('unit_relation_list',$item->id)}}" class="btn btn-outline-info">
                                                        Change Unit</a>
                                                </td>
                                                <td class="text-center">
                                                    <div class="">
                                                        <div class="col-md-2 col-sm-12 mx-md-2 mx-sm-5">
                                                            <a href="#" class="btn bneonblue text-white editItem mx-3" data-toggle="modal" data-target="#edit_item{{$item->id}}">
                                                                Edit</a>
                                                        </div>
                                                        <div class="col-md-6 col-sm-12 mx-md-1 mx-sm-5">
                                                            <form action="{{route('item_delete')}}" method="POST" enctype='multipart/form-data'>
                                                                @csrf
                                                                <input type="hidden" name="item_id" value="{{$item->id}}">
                                                                <button class="btn bpinkcolor text-white"><i class="mdi mdi-delete"></i>Delete</button>
                                                            </form>
                                                        </div>
                                                   
                                                    </div>

                                                       


                                                </td>

                                                <div class="modal fade" id="edit_item{{$item->id}}" role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title pinkcolor">Edit Item Form</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>

                                                            <div class="modal-body">
                                                                <form class="form-material m-t-40" method="post" action="{{route('item_update')}}" enctype='multipart/form-data'>
                                                                    @csrf
                                                                    <input type="hidden" name="item_id" value="{{$item->id}}">
                                                                    <div class="form-group">
                                                                        <label class="font-weight-bold">Code</label>
                                                                        <input type="text"  name="item_code" class="form-control" value="{{$item->item_code}}">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="font-weight-bold">Name</label>
                                                                        <input type="text"  name="item_name" class="form-control" value="{{$item->item_name}}">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="control-label">Item Photo</label>
                                                                        <input type="file" name="photo_path" class="form-control">
                                                                    </div>

                                                                    <div class="form-group" >
                                                                        <label class="font-weight-bold">Related Category</label>
                                                                        <select class="form-control select2 m-b-10" name="category_id" style="width: 100%" onchange="showSubCategory(this.value)">
                                                                            @foreach($all_categories as $category)
                                                                            <option value="{{$category->id}}" 
                                                                            
                                                                                @if ($category->id == $item->category_id)
                                                                                    selected
                                                                                @endif
                                                                            >{{$category->category_name}}</option>
                                                                            @endforeach
                                                                        </select>
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
                </div>
            </div>
        </div>
    </div>


   

   
   


<!-- End -->
@endsection
@section('js')
<script>

    function showRelatedItemList(value) {

    $('#item').empty();


        $.ajax({
            type: 'POST',
            url: '/AjaxGetItem',
            dataType: 'json',
            data: {
                "_token": "{{ csrf_token() }}",
                "category_id": value,
            },

            success: function(data) {

                console.log(data);

                var html = "";

                $.each(data, function(i, v) {

                    var url1 = '{{ route('count_unit_list', ':item_id') }}';
                    url1 = url1.replace(':item_id', v.id);


                    var url2 = '{{ route('unit_relation_list', ':item_id') }}';

                    url2 = url2.replace(':item_id', v.id);

                    html += `
        <tr>
        <td>${v.item_code}</td>
        <td>${v.item_name}</td>
        <td>
            <a href="${url1}" class="btn btn-outline-info">Check</a>
        </td>
        <td>
        <a href="${url2}" class="btn btn-outline-info">Change Unit</a>
        </td>
        <td class="text-center">
            <a href="#" class="btn btn-info" data-toggle="modal" data-target="">Edit</a>                                                                                                                
            <a href="#" class="btn btn-danger" onclick=""><i class="mdi mdi-delete"></i>Delete</a>
        </td>
        </tr>`

                    $('#item').html(html);
                });

            }

        });

}
</script>
@endsection


