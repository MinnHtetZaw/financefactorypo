@extends('master')

@section('title','Purchase Details')

@section('place')

@endsection

@section('content')

<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h4 class="font-weight-normal">@lang('lang.purchase') @lang('lang.details') @lang('lang.page')</h4>
    </div>
</div>

<div class="row mt-2">
    <div class="col-md-14">
        <div class="card">
            <div class="card-header ">
                <h4 class="font-weight-bold mt-2" style="font-size: 20px">@lang('lang.purchase') @lang('lang.details')</h4>
            </div>
            <div class="card-body">

            	<div class="row">
            		<div class="col-md-6">

            			<div class="row">
			              	<div class="font-weight-bold text-primary col-md-5">@lang('lang.purchase_date')</div>
			              	<h5 class="font-weight-bold col-md-4 mt-1" style="font-size: 18px">
			              		{{date('d-m-Y', strtotime($purchase->purchase_date))}}
			              	</h5>
				        </div>

				        <div class="row mt-1">
			              	<div class="font-weight-bold text-primary col-md-5">@lang('lang.total') @lang('lang.price')</div>
			              	{{-- @php
			              	    $backup_total = 0;
			              	    $sub_total = 0;
			              	    foreach($purchase->counting_unit as $unit){
			              	        $sub_total = $unit->pivot->quantity * $unit->purchase_price;
			              	        $backup_total += $sub_total;
			              	    }
			              	@endphp --}}
			              	<h5 class="font-weight-bold col-md-4 mt-1" style="font-size: 18px">{{($purchase->total_price==0)? $backup_total : $purchase->total_price}} ကျပ်</h5>
				        </div>

				        <div class="row mt-1">
			              	<div class="font-weight-bold text-primary col-md-5">@lang('lang.total') @lang('lang.quantity')</div>
			              	<h5 class="font-weight-bold col-md-4 mt-1" style="font-size: 18px">{{$purchase->total_quantity}}</h5>
				        </div>

				        <div class="row mt-1">
			              	<div class="font-weight-bold text-primary col-md-5">@lang('lang.supplier_name')</div>
			              	<h5 class="font-weight-bold col-md-4 mt-1" style="font-size: 18px">{{$purchase->supplier_name}}</h5>
				        </div>

				        <div class="row mt-1">
			              	<div class="font-weight-bold text-primary col-md-5">@lang('lang.purchase_by')</div>
			              	<h5 class="font-weight-bold col-md-4 mt-1" style="font-size: 18px">Purchaser</h5>
				        </div>




            		</div>

            		<div class="col-md-8 mt-4" style="margin-left:auto;margin-right:auto;">
            			<h4 class="font-weight-bold mt-2 text-primary text-center">@lang('lang.purchase_unit')</h4>
            			<div class="table-responsive text-black">
		                    <table class="table" id="example23" >
		                        <thead>
		                            <tr  class="text-center">
		                                <th >#</th>
		                                <th>@lang('lang.index')</th>

		                                <th>@lang('lang.item') @lang('lang.name')</th>
		                                <th>@lang('lang.purchase_qty')</th>
		                                <th>Arrived Quantity</th>
                                        <th>Remaining Quantity</th>
		                                <th>@lang('lang.purchase_price')</th>
		                                <th>@lang('lang.sub_total')</th>
		                            </tr>
		                        </thead>
		                        <tbody id="units_table">
		                            @php
                                        $i = 1 ;
                                    @endphp


                                    @if($purchase->type_flag ==1)

		                            @foreach($purchase->factory_item as $unit)


		                                <tr  class="text-center">
		                                    <td ><input class="w-2 form-check-input mt-1" type="checkbox" value="{{$unit->id}}" id="checkitem{{$unit->id}}" data-itemname="{{$unit->item_name}}" data-purchaseqty="{{$unit->pivot->quantity}}" {{$unit->pivot->arrive_complete == 1 ? 'disabled' : ''}} >
                            <label class="w-2 form-check-label font14" for="checkitem{{$unit->id}}"></label></td>
		                                    <td>{{$i++}}</td>
		                                	<td>{{$unit->item_name}}</td>
											<td class="w-25">

												<input type="number" class="form-control w-100 purchaseinput text-black" data-purchaseinput="purchaseinput{{$unit->id}}" data-olderqty="{{$unit->pivot->quantity}}"
												data-purchaseid="{{$purchase->id}}" id="purchaseinput{{$unit->id}}" data-id="{{$unit->id}}" value="{{$unit->pivot->quantity}}" disabled>

											</td>


                                            <td class="w-25">
                                                <input type="number" class="form-control w-100 arriveinput text-black" data-arriveinput="arriveinput{{$unit->id}}"  data-purchaseid="{{$purchase->id}}" id="arriveinput{{$unit->id}}" data-id="{{$unit->id}}" value="0"
                                                @if ($unit->pivot->arrive_complete === 1)
                                                disabled
                                                @endif >

                                            </td>
                                            <td class="w-25">
                                                <input type="number" class="form-control w-100 text-black"

                                                @if ($purchase->type_flag === 2)
                                                value= "0"
                                                @elseif ($purchase->type_flag === 1)
                                                value="{{$unit->pivot->remaining_amount}}"
                                                @endif
                                            disabled>
                                            </td>

		                                	<td>{{$unit->pivot->price}}</td>
		                                	<td>{{$unit->pivot->quantity * $unit->pivot->price}}</td>
                                            <td>
                                                <button class="btn btn-primary" data-toggle="collapse" href="#factoryitem{{$unit->id}}" role="button" aria-expanded="false" aria-controls="factoryitem">Related</button>
                                            </td>
		                                </tr>
                                        <tr>
                                            <td colspan="9">
                                                <div class="collapse" id="factoryitem{{$unit->id}}">
                                                    <table style="background-color:antiquewhite" class="table">
                                                      <thead>
                                                        <tr class="text-center">
                                                            <th>arrive date</th>
                                                            <th>arrive quantity</th>
                                                            <th>remark</th>
                                                        </tr>
                                                      </thead>
                                                      <tbody>
                                                        @foreach ($factoryitemdate as $unitdate)
                                                        @if($unitdate->factory_item_id == $unit->id)
                                                        <tr class="text-center">
                                                            <td>{{ $unitdate->arrive_date }}</td>
                                                            <td>{{ $unitdate->arrive_quantity }}</td>
                                                            <td>{{ $unitdate->remark }}</td>
                                                        </tr>
                                                        @endif
                                                        @endforeach

                                                      </tbody>

                                                    </table>
                                                </div>
                                            </td>
                                        </tr>
		                            @endforeach

                                    @elseif ($purchase->type_flag ==2)

                                    @foreach($purchase->factory_item as $unit)

                                        <tr class="text-center">
		                                   <td></td>
		                                    <td>{{$i++}}</td>
		                                	<td>{{$unit->item_name}}</td>
											<td class="w-25">

												<input type="number" class="form-control w-100 purchaseinput text-black" data-purchaseinput="purchaseinput{{$unit->id}}" data-olderqty="{{$unit->pivot->quantity}}"
												data-purchaseid="{{$purchase->id}}" id="purchaseinput{{$unit->id}}" data-id="{{$unit->id}}" value="{{$unit->pivot->quantity}}" disabled>

											</td>

											<td class="w-25">
											    <input type="number" class="form-control w-100 arriveinput text-black" data-arriveinput="arriveinput{{$unit->id}}"  data-purchaseid="{{$purchase->id}}" id="arriveinput{{$unit->id}}" data-id="{{$unit->id}}" value="{{$unit->pivot->quantity}}" disabled>

											</td>


		                                	<td>{{$unit->pivot->price}}</td>
		                                	<td>{{$unit->pivot->quantity * $unit->pivot->price}}</td>
		                                </tr>
                                        @endforeach
                                    @endif




		                        </tbody>
		                    </table>
		                </div>
            		</div>



            	</div>

            	<div class="row">
            	        <div class="col-md-1 offset-5">

            	        <button class="btn btn-success float-right" id="arrive_input">Factory</button>
					</div>


            		    <div class="col-md-1 ml-2">
						{{-- <form action="{{route('purchase_delete')}}" method="POST">
							@csrf
							<input type="hidden" name="purchase_id" value="{{$purchase->id}}">
							<button class="btn btn-danger float-right">Delete</button>

						</form> --}}
					</div>


            		</div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="FabricEntryModal" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-info">
                        <h4 class="modal-title text-white">Fabric Entry @lang('lang.form')</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                    </div>

                    <div class="modal-body">
                        <form class="form-horizontal m-t-20">

                            <div class="form-group row">
                                <label class="control-label text-right col-md-3 text-black">Date</label>
                                <div class="col-md-6">
                                    <input type="date" class="form-control font14 text-black" id="arrive_date" name="arrive_date">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3 text-black">Remark</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="arrive_remark" id="arrive_remark">
                                </div>
                            </div>


                            <div class="col-md-12 m-t-30 ml-2 text-center">
                <button class="btn btn-success px-4" id="entry_sent" >Save</button>
            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    <input type="hidden" name="arrived_items_ids" id="arrived_items_ids">
    <input type="hidden" name="purchase_id" id="purchase_id" value="{{$purchase->id}}">
</div>

@endsection

@section('js')

<script>


    $('#arrive_input').click(function(){
        var myarrivedCart = '[]';
        var myarrivedCartobj = JSON.parse(myarrivedCart);
        $('#units_table input.form-check-input:checkbox:checked').each(function () {
            var id = $(this).val();
            var name = $(this).data('itemname');
            var purchase_qty = $(this).data('purchaseqty');
            var arrive_qty = $('#arriveinput' + id).val();
            var arrive_complete = 0;
            console.log(purchase_qty,arrive_qty);
            if(parseInt(purchase_qty) == parseInt(arrive_qty)){
                arrive_complete = 1;
            }
            var entryItem = {
                id: id,
                name: name,
                arrive_qty: arrive_qty,
                arrive_complete: arrive_complete
            };
            myarrivedCartobj.push(entryItem);
        });
        localStorage.setItem('myarrivedCart', JSON.stringify(myarrivedCartobj));
        if(!Object.keys(myarrivedCartobj).length){
            swal({
                icon: 'error',
                title: 'Order ရွေးပါ!',
                text : 'Please choose arrived items for Fabric Entry',
                button: true,
            })
        }
        else{

            $('#FabricEntryModal').modal('show');

        }
    })

    $('#entry_sent').click(function(){

            var arrivedItems = localStorage.getItem('myarrivedCart');
            var arrive_date = $('#arrive_date').val();
            var arrive_remark = $('#arrive_remark').val();
            var purchase_id = $('#purchase_id').val();
            console.log(arrivedItems,arrive_date,arrive_remark,purchase_id);

        if( $.trim(arrive_date) == '' || $.trim(arrive_remark) =='')
        {
            swal({
                title:"Failed!",
                text:"Please fill all basic unit field",
                icon:"error",
                timer: 3000,
            });

        }
        else{

            $.ajax({

            type: 'POST',

            url: '{{ route('saveArriveFactory') }}',

            data: {
                "_token": "{{ csrf_token() }}",
               'arrivedItems': arrivedItems,
               'arrive_date': arrive_date,
               'arrive_remark': arrive_remark,
               'purchase_id' : purchase_id
            },

            success: function (data) {

                                console.log(data);
                                 swal({
                                     title: "Success",
                                     text: "Arrived Fabric Entry is Successfully Stored",
                                     icon: "success",
                                 });

                            },

                            error: function (status) {
                                console.log(status);

                                swal({
                                    title: "Something Wrong!",
                                    text: "Something Wrong When Store Arrived Fabric Entry",
                                    icon: "error",
                                });
                            }
            });
        }
        })



</script>
@endsection
