@extends('master')
@section('title', 'Packages')
@section('content')

<div class="col-md-5 col-8 align-self-center">
    <h3 class="text-themecolor m-b-0 m-t-0">Packages</h3>
   
</div>

<div class="row mt-5">
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-body">
                <h4 class="card-title">Package Lists</h4>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                            <th>#</th>
                                <th>Package Name</th>
                                <th>Services</th>
                                <th>Total Charges</th>
                                <th>Cost</th>
                                <th>Description</th>
                                <th class="text-center">Action</th>
                     
                            </tr>
                        </thead>
                        <tbody>
                        <?php $i=1;?>
                            @foreach($packages as $package)
                            
                            <tr>
                            <td>{{$i++}}</td>
                                <td>{{$package->name}}</td>
                                <td>
                                @foreach ($package->services as $service)
                                {{$service->name}},
                                    
                                @endforeach
                                </td>
                                <td>{{$package->total_charges}}</td>
                                <td>{{$package->cost}}</td>
                                <td>{{$package->description}}</td>
                               
                                <td class="text-center">
                                    <a href="#" class="btn bneonblue text-white" data-toggle="modal" data-target="#edit_package{{$package->id}}">
                                Edit</a>

                                   
                            
                                <a href="#" class="btn bpinkcolor text-white" onclick="ApproveLeave('{{$package->id}}')">
                                Delete</a>
                                   
                                </td>
                                
                                <div class="modal fade" id="edit_package{{$package->id}}" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                  <div class="modal-header">
                                    <h4 class="modal-title pinkcolor">Edit package Form</h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>

                                    <div class="modal-body">
                                        <form class="form-material m-t-40" method="post" action="{{route('packages.update', $package->id)}}">
                                            @csrf
                                            
                                            <div class="form-group">    
                                                <label class="font-weight-bold">Name</label>
                                                <input type="text" name="name" class="form-control" value="{{$package->name}}"> 
                                            </div>
                                            <div class="form-group">    
                                                <label class="font-weight-bold">Description</label>
                                                <input type="text" name="description" class="form-control" value="{{$package->description}}"> 
                                            </div>
                                            <div class="form-group">
                                                <label>Services</label>
                                                <select id="services" class="select form-control" name="services[]" multiple>    
                                                    @foreach($otherServices as $otherService)
                                                    <option value="{{$otherService->id}}">{{$otherService->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">    
                                                <label class="font-weight-bold">Charges</label>
                                                <input type="number" name="charges" class="form-control" value="{{$package->charges}}"> 
                                            </div>
                                            <div class="form-group">    
                                                <label class="font-weight-bold">Cost</label>
                                                <input type="number" name="cost" class="form-control" value="{{$package->cost}}"> 
                                            </div>
                                            <div class="form-group">    
                                                <label class="font-weight-bold">Doctor Or Other</label>  <select class="form-control" name="status" id="status">
                                                    <option value="0" 
                                                    @if ($package->status==0)
                                                        selected
                                                    @endif
                                                    >Doctor</option>
                                                    <option value="1" 
                                                    @if ($package->status==1)
                                                    selected
                                                    @endif
                                                    >Others</option>
                                                </select>
                                            </div>

                                            <input type="button" name="btnsubmit" class="btnsubmit float-right btn btn-primary" value="Save">
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
                <h3 class="card-title">Create package Form</h3>
                <form class="form-material m-t-40" method="post" action="{{route('packages.store')}}" id="package_submit" enctype="multipart/form-data">
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

                    <div class="form-group">
                        <label>Services</label>
                        <select id="" class="select form-control" name="services[]" multiple>    							
                            @foreach($otherServices as $otherService)
                            <option value="{{$otherService->id}}">{{$otherService->name}}</option>
                            @endforeach
                        </select>

                        @error('services')
                        <span class="invalid-feedback text-danger" role="alert"  height="100">
                            {{ $message }}
                        </span>
                    @enderror 

                    </div>

                    <div class="form-group">    
                        <label class="font-weight-bold">Cost</label>
                        <input type="number" name="cost" class="form-control @error('cost') is-invalid @enderror" placeholder="Enter cost">
                       
                        @error('cost')
                            <span class="invalid-feedback text-danger" role="alert"  height="100">
                                {{ $message }}
                            </span>
                        @enderror 
                        
                    </div>

                    <div class="form-group">    
                        <label class="font-weight-bold">Charges</label>
                        <input type="number" name="total_charges" class="form-control"  >
                    </div>
               
                    <div class="form-group">    
                        <label class="control-label">Create Advertisements</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" checked type="radio" name="advertise_yesOrno" id="advertise_no" value="0">
                            <label class="form-check-label" for="advertise_no">No</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="advertise_yesOrno" id="advertise_yes" value="1" data-target="#add_adv" data-toggle="modal">
                            <label class="form-check-label" for="advertise_yes">Yes</label>
                          </div>

                          {{-- add advertisemnt --}}
                          <div id="add_adv" class="modal fade" role="dialog">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-body text-center">
                                        <h3>Add Advertisement!</h3>                                   
                                            <div class="form-group">
                                                <label>Advertisement Title</label>
                                                <input class="form-control" type="text" id="adver_title"  name="adver_title">
                                            </div>
            
                                            <div class="form-group">
                                                <label>Short Description</label>
                                                <input class="form-control" type="text" id="adver_short_description"  name="adver_short_description">
                                            </div>

                                            <div class="form-group">
                                                <label>Long Description</label>
                                                <input class="form-control" type="text" id="adver_description"  name="adver_description">
                                            </div>
            
                                            <div class="form-group">
                                                <label>Advertisement Photo</label>
                                                <input class="form-control" type="file" id="img" name="img">
                                            </div>
                                            <div class="form-group">
                                                <label>Start Date </label>
                                                    <div class="cal-icon">
                                                        <input type="text" class="form-control" id="check_date2" name="start_date">
                                                    </div>
                                            </div>
            
                                            <div class="form-group">
                                                <label class="gen-label">Advertisement Range:</label>
                                                <input class="form-control" type="number" id="adver_range" name="range">
            
                                                <div class="form-check-inline">
                                                    <label class="form-check-label">
                                                        <input type="radio" name="weekormonth" checked value="week" class="form-check-input">Week
                                                    </label>
                                                </div>
                                                <div class="form-check-inline">
                                                    <label class="form-check-label">
                                                        <input type="radio" name="weekormonth" value="month" class="form-check-input">Month
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="m-t-20"> 
                                                <a href="#" class="btn btn-danger ml-3" data-dismiss="modal">Close</a>
                                                <a href="#" class="btn btn-info ml-3 saveAdvertisement" >Save</a>
                                                {{-- <button type="" class="btn btn-primary">Save</button> --}}
                                            </div>      
                                    </div>
                                </div>
                            </div>
                        </div>
                     

                    </div>

                    <input type="button" name="btnsubmit" class="btnsubmit float-right btn bbluecolor text-white" onclick="checkAdvertisement()" value="Save">
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
    $("#check_date2").datetimepicker({
            format: 'YYYY-MM-DD'
        });
});

$('.saveAdvertisement').click(function(){
    $('#add_adv').modal('hide');
})
function checkAdvertisement(){
    var advertise_yesOrno = $("input:radio[name=advertise_yesOrno]:checked").val();
    var adver_title = $('#adver_title').val();
    var adver_description = $('#adver_description').val();
    var check_date2 = $('#check_date2').val();
    var adver_range = $('#adver_range').val();
    if(advertise_yesOrno==1){
        
    if($.trim(adver_title) == '' || $.trim(adver_description) == '' || $.trim(check_date2) == '' || $.trim('adver_range')=='')
    {

        swal({
              title:"Failed!",
              text:"Please fill all basic unit Field of Advertisement",
              icon:"info",
              timer: 3000,
          });
        
      }
    }

    $('#package_submit').submit();

}


function ApproveLeave(value){

var package_id = value;

swal({
    title: "@lang('lang.confirm')",
    icon:'warning',
    buttons: ["@lang('lang.no')", "@lang('lang.yes')"]
})

.then((isConfirm)=>{

if(isConfirm){

    $.ajax({
        type:'POST',
        url:'packages/delete',
        dataType:'json',
        data:{ 
          "_token": "{{ csrf_token() }}",
          "package_id": package_id,
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

