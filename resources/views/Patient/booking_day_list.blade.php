@extends('master')
@section('title', 'Bookings')
@section('content')
<div class="row">
    <div class="col-sm-8 col-4">
        <h4 class="page-title font-weight-bold">Choose a Date You Want to Book.</h4>
    </div>          
</div>
<div class="row">
	<div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-striped custom-table mb-0 datatable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Room</th>
                        <th>Get Token</th>
                    </tr>
                </thead>
                <?php
                    $i = 1;
                ?>
                <tbody> 
                	@foreach($date_arry as $date)
                	<tr>
                		<td>{{$i++}}</td>

                		<td>{{$date}}</td>

                        <td>{{$doctor_time->room->name}}</td>

                        <td>                         

                            <button class="btn btn-primary"  onclick="ApproveLeave('{{$date}}','{{$doctor_time->room_id}}','{{$doc_id}}','{{$doctor_time->start_time}}')" type="submit">Take A Token
                            </button>
                        
                       
                      
                       </td> 

                	</tr>

                	@endforeach
                    
                </tbody>

            </table>
        </div>
    </div>
	
</div>


@endsection

@section('js')
<script type="text/javascript">
	
	function ApproveLeave(date,room_id,doc_id,start_time){

        var date = date;

        var start_time = start_time;

        var room_id = room_id;

        var doc_id = doc_id;

         swal({
            title: "Are You Sure?",
            icon:'warning',
            buttons: ["No", "Yes"]
        })

        .then((isConfirm)=>{

            if(isConfirm){

                $.ajax({
                    type:'post',
                    url:'{{route('TakeBookingToken')}}',
                    dataType:'json',
                    data:{
                        "_token": "{{ csrf_token() }}",
                        "date": date,
                        "doc_id": doc_id,
                        "start_time": start_time,
                        "room_id": room_id,
                    },


                    success: function(data){

                        var token_number = data.token_number;

                        swal({
                            title: "Success!",
                            text : "Your Token Number is" + token_number,
                            icon : "success",
                        });

                        console.log(data);

                    },

                    error:function(data){

                        swal({
                            icon: 'error',
                            title: 'No Data',
                            text: 'Something Wrong!',
                        })
                    }

                });
            }
        });
      }

</script>
@endsection