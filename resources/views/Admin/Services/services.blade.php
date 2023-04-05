@extends('master')
@section('title', 'Services')
@section('content')

<div class="col-md-5 col-8 align-self-center">
    <h3 class="text-themecolor m-b-0 m-t-0">Services</h3>
   
</div>

<div class="row mt-5">
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-body">
                <h4 class="card-title">Services Lists</h4>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                            <th>#</th>
                                <th>Services Name</th>
                                <th>Description</th>
                                <th class="text-center">Action</th>
                     
                            </tr>
                        </thead>
                        <tbody>
                        <?php $i=1;?>
                            @foreach($services as $service)
                            
                            <tr>
                            <td>{{$i++}}</td>
                                <td>{{$service->name}}</td>
                                <td class="description"  data-description="{{$service->description}}">{{$service->description}}</td>
                                <td class="text-center">
                                    <a href="#" class="btn bneonblue text-white" data-toggle="modal" data-target="#edit_service{{$service->id}}">
                                Edit</a>

                                   
                            
                                <a href="#" class="btn bpinkcolor text-white" onclick="ApproveLeave('{{$service->id}}')">
                                Delete</a>
                                   
                                </td>
                                
                                <div class="modal fade" id="edit_service{{$service->id}}" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                  <div class="modal-header">
                                    <h4 class="modal-title pinkcolor">Edit Service Form</h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>

                                    <div class="modal-body">
                                        <form class="form-material m-t-40" method="post" action="{{route('services.update', $service->id)}}">
                                            @csrf
                                            
                                            <div class="form-group">    
                                                <label class="font-weight-bold">Name</label>
                                                <input type="text" name="name" class="form-control" value="{{$service->name}}"> 
                                            </div>
                                            <div class="form-group">    
                                                <label class="font-weight-bold">Description</label>
                                                <input type="text" name="description" class="form-control" value="{{$service->description}}"> 
                                            </div>
                                                <input type="hidden" name="charges" class="form-control" value="0"> 
                                                <input type="hidden" name="cost" class="form-control" value=""> 
                                            <div class="form-group">    
                                                <label class="font-weight-bold">Doctor Or Other</label>  <select class="form-control" name="status" id="status">
                                                    <option value="0" 
                                                    @if ($service->status==0)
                                                        selected
                                                    @endif
                                                    >Doctor</option>
                                                    <option value="1" 
                                                    @if ($service->status==1)
                                                    selected
                                                    @endif
                                                    >Others</option>
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


    <div class="col-md-4">
        <div class="card shadow">
            <div class="card-body">
                <h3 class="card-title">Create Service Form</h3>
                <form class="form-material m-t-40" method="post" action="{{route('services.store')}}">
                    @csrf
                 
                    <div class="form-group">    
                        <label class="font-weight-bold">Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter name">

                        @error('name')
                            <span class="invalid-feedback text-danger" role="alert"  height="100">
                                {{ $message }}
                            </span>
                        @enderror

                    </div>
                    <div class="form-group">    
                        <label class="font-weight-bold">Descrioption</label>
                        <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" placeholder="Enter description">
                       
                        @error('description')
                            <span class="invalid-feedback text-danger" role="alert"  height="100">
                                {{ $message }}
                            </span>
                        @enderror 

                    </div>
                        <input type="hidden" value="0" name="charges" class="form-control @error('charges') is-invalid @enderror" placeholder="Enter charges">
                       
                        <input type="hidden" value="0" name="cost" class="form-control @error('cost') is-invalid @enderror" placeholder="Enter cost">
                       
                    <div class="form-group">    
                        <label class="font-weight-bold">For</label>
                        <select class="form-control" name="status" id="status">
                            <option value="">select</option>
                            <option value="0">Doctor</option>
                            <option value="1" selected>Others</option>
                        </select>

                        @error('status')
                            <span class="invalid-feedback alert alert-danger" role="alert"  height="100">
                                {{ $message }}
                            </span>
                        @enderror 
                        
                    </div>

                    <input type="submit" name="btnsubmit" class="btnsubmit float-right btn bbluecolor text-white" value="Save">
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
    var max= 100;
    var tot,str;
    $('.description').each(function(){
        str = String($(this).html());
        tot = str.length;
        str= (tot <= max) ? str : str.substring(0,(max+1))+`<a class="seemore text-primary" data-str="${str}">...see more</a>`;
        $(this).html(str);
    })
    $('.description').on('click','.seemore',function(){
        var strr = $(this).data(str.str);
        tot = strr.str.length;
        console.log(tot);
        var seeless= (tot <= max) ? strr.str : strr.str.substring(0,(max+1))+`<a class='seemore text-primary' data-str='${strr.str}'>...see more</a>`;

        $(this).parent().html(strr.str+`<a class="seeless text-primary" data-str="${seeless}">...see less</a>`);
        // console.log(class);
        // $(this).html(str);
    })
    $('.description').on('click','.seeless',function(){
        var strr = $(this).data(str.str);
        $(this).parent().html(strr.str);
    })
});



function ApproveLeave(value){

var service_id = value;

swal({
    title: "@lang('lang.confirm')",
    icon:'warning',
    buttons: ["@lang('lang.no')", "@lang('lang.yes')"]
})

.then((isConfirm)=>{

if(isConfirm){

    $.ajax({
        type:'POST',
        url:'services/delete',
        dataType:'json',
        data:{ 
          "_token": "{{ csrf_token() }}",
          "service_id": service_id,
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

