@extends('master')

@section('title','Counting Unit List')

@section('place')

<div class="col-md-5 col-8 align-self-center">
    <h3 class="text-themecolor m-b-0 m-t-0">Branch</h3>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="">Back to dashboard</a></li>
        <li class="breadcrumb-item active">Counting unit list</li>
    </ol>
</div>

@endsection

@section('content')

<style>
    .btn {
    width: 100px;
    overflow: hidden;
    white-space: nowrap;
  }
</style>

<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">        
        <h2 class="font-weight-bold">counting unit list</h2>
    </div>
</div>

<input type="hidden" value="{{$item->id}}" id="item_id">
<div class="row">
    <div class="col-md-9">
        <div class="card shadow">
            <div class="card-body">
                <h4 class="card-title pinkcolor">{{$item->item_name}}'s unit list</h4>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>unit code</th>
                                <th>unit original code</th>
                                <th>unit name</th>
                                <th class="text-center">action </th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                            <?php $i=1;?>

                            @foreach($units as $unit)
                        
                            <tr>
                                <td>{{$i++}}</td>

                                <td style="overflow:hidden;white-space: nowrap;">{{$unit->unit_code}}</td>
                                <td style="overflow:hidden;white-space: nowrap;">{{$unit->original_code}}</td>
                                <td style="overflow:hidden;white-space: nowrap;">{{$unit->unit_name}}</td>
                                <td style="text-overflow: ellipsis; white-space: nowrap;">
                                    <a href="#" class="btn btn-outline-info" data-toggle="modal" data-target="#unit_code{{$unit->id}}">
                                    Add Code</a>

                                    <a href="#" class="btn btn-outline-info" data-toggle="modal" data-target="#original_code{{$unit->id}}">
                                    Add Original Code</a>

                                    <a href="#" class="btn btn-outline-warning" data-toggle="modal" data-target="#edit_item{{$unit->id}}">
                                    Edit</a>

                                    <a href="#" class="btn btn-outline-danger" onclick="ApproveLeave('{{$unit->id}}')">
                                        <i class="mdi mdi-delete"></i>
                                        Delete
                                    </a>
                                </td>

                                <div class="modal fade" id="unit_code{{$unit->id}}" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title pinkcolor">unit code form</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                    <div class="modal-body">
                                        <form class="form-material" method="post" action="{{route('count_unit_code_update',$unit->id)}}">
                                            @csrf
                                            
                                                       <input type="hidden" name="cat_code" class="form-control" value="{{$item->category->category_code}}"> 
                                              
                                                
                                                    <input type="hidden" name="item_code" class="form-control" value="{{$unit->item->item_code}}"> 
                                            <div class="row jusitify-content-center">
                                                <div class="form-group col-12">   
                                                    <label class="font-weight-bold">unit code</label>
                                                    <input type="text" name="code" class="form-control" value="{{$unit->unit_code}}{{$item->category->category_code}}{{$unit->item->item_code}}"> 
                                                </div>
                                                
                                            </div>

                                            <input type="submit" name="btnsubmit" class="btnsubmit float-right btn btn-primary" value="Update unit">
                                        </form>           
                                    </div>
                                   
                                  </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="original_code{{$unit->id}}" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title pinkcolor">Original code form</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                    <div class="modal-body">
                                        <form class="form-material" method="post" action="{{route('original_code_update',$unit->id)}}">
                                            @csrf
                                            
                                            <div class="row jusitify-content-center">
                                                <div class="form-group col-12">   
                                                    <label class="font-weight-bold">unit original code</label>
                                                    <input type="text" name="code" class="form-control" value="{{$unit->original_code}}"> 
                                                </div>
                                                
                                            </div>

                                            <input type="submit" name="btnsubmit" class="btnsubmit float-right btn btn-primary" value="update_counting_unit')">
                                        </form>           
                                    </div>
                                   
                                  </div>
                                    </div>
                                </div>
                                
                                <div class="modal fade" id="edit_item{{$unit->id}}" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title pinkcolor">Edit counting unit form</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                    <div class="modal-body">
                                        <form class="form-material" method="post" action="{{route('count_unit_update',$unit->id)}}">
                                            @csrf
                                            
                                            <div class="row jusitify-content-center">
                                                <div class="form-group col-12">   
                                                    <label class="font-weight-bold">unit name</label>
                                                    <input type="text" name="name" class="form-control" value="{{$unit->unit_name}}"> 
                                                </div>
                                                <div class="form-group col-12">   
                                                    <label class="font-weight-bold">Item</label>
                                                    <select class="form-control select2 m-b-10" name="item_id" style="width: 100%">
                                                        @foreach ($items as $itemoption)
                                                        <option value="{{$itemoption->id}}"
                                                            @if ($itemoption->id==$unit->item_id)
                                                                selected
                                                            @endif
                                                            >{{$itemoption->item_name}}</option>
                                                        @endforeach
                                                     </select>
                                                </div>
                                               
                                                
                                            </div>

                                            <input type="submit" name="btnsubmit" class="btnsubmit float-right btn btn-primary" value="update counting unit">
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

    <div class="col-md-3">
        <div class="card shadow">
            <div class="card-body">
                <h3 class="card-title">unit create form</h3>
                <form class="form-material m-t-40" method="post" action="{{route('count_unit_store')}}">
                    @csrf
                    <input type="hidden" value="{{$item->id}}" name="item_id">

                    <div class="form-group">    
                        <label class="font-weight-bold">unit name</label>
                        <input type="text" name="name" class="form-control"> 
                    </div>
                    <input type="submit" name="btnsubmit" class="btnsubmit float-right btn bpinkcolor text-white" value="save">
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
<script>

    $(document).ready(function(){

        $(".select2").select2();
    });
     
     function ajaxCountUnit (value){
         var from_id =value;
        var item_id = $('#item_id').val();

        $.ajax({
              type:'POST',
                url:'/ajaxCountUnit',
                dataType:'json',
                data:{ 
                  "_token": "{{ csrf_token() }}",
                  "from_id": from_id,
                  "item_id": item_id,
                },

              success: function(data){
                      console.log(data);

                      var html="";

                      $('#from_ajax_replace').empty();

                    $.each(data[0],function(i,v){
                    
                        $.each(data[2],function(u,value){
                            // console.log('hi');
                            if(v.id==value.counting_unit_id){
                                var url1 = "#countingunitid";
                                var url2= v.id;
                                url=url1+url2;
                                console.log(url);
                                $(url).text(value.stock_qty);
                                // $('#from_ajax_replace').append($('<td>').text(value.stock_qty).attr('value', value.id));
                            }
});
                    });
                   

                    },            
                });


     }




    function ApproveLeave(value){

        var unit_id = value;

        swal({
            title: "Confirm",
            icon:'warning',
            buttons: ["no", "yes"]
        })

      .then((isConfirm)=>{
        
        if(isConfirm){

          $.ajax({
              type:'POST',
                url:'delete',
                dataType:'json',
                data:{ 
                  "_token": "{{ csrf_token() }}",
                  "unit_id": unit_id,
                },

              success: function(data){
                      console.log(data);
                      swal({
                            title: "Success!",
                            text : "Successfully deleted!",
                            icon : "success",
                        });

                        setTimeout(function(){
               window.location.reload();
            }, 1000);

                        
                    },            
                });
        }
      });

    }

</script>
@endsection