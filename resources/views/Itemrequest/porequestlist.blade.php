@extends('master')

@section('title','Order Page')

@section('place')


@endsection

@section('content')

<style>
    th{
    overflow:hidden;
    white-space: nowrap;
  }
</style>

<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h4 class="font-weight-normal text-black">Factory PO List @lang('lang.page')</h4>
    </div>
</div>
{{-- <div class="row justify-content-start">
    <div class="col-8">
       <div class="mb-4">
            <div class="row">

            @csrf
                <div class="col-2">
                    <label class="">@lang('lang.from')</label>
                    <input type="date" name="from" id="from" class="form-control form-control-sm" onChange="setFrom(this.value)"  required>
                </div>
                <div class="col-2">
                    <label class="">@lang('lang.to')</label>
                    <input type="date" name="to" id="to" class="form-control form-control-sm" onChange="setTo(this.value)" required>
                </div>

                <div class="col-md-2 m-t-30">
                    <button class="btn btn-sm rounded btn-outline-info" id="search_PO">
                        <i class="fas fa-search mr-2"></i>Search
                    </button>
                </div>
            </div>
        </div>
    </div>


     <div class="col-md-4 mt-4">

         <form id="exportForm" onsubmit="return exportForm()" method="get">
             <div class="row">
            <input type="hidden" name="export_from" id="export_from" class="form-control form-control-sm hidden" required>
            <input type="hidden" name="export_to" id="export_to" class="form-control form-control-sm hidden" required>
            <div class="col-3">
                <select name="export_data_type" id="export_data_type" class="form-control form-control-sm select2" style="font-size: 12px;">
                           <option value=1 selected>PoList</option>
                           <option value=2 >Items</option>
                   </select>

           </div>

            <div class="col-9">
            <input type="submit" class="btn btn-sm rounded btn-outline-info col-4" value=" Export ">
            </div>
            </div>

        </form>

    </div>


</div> --}}

<div class="container mt-4" >
<div class="row">
    <div class="col-12">
{{--
            <div class="">
                <h4 class="font-weight-bold mt-2">Factory PO @lang('lang.list')</h4>
            </div> --}}
            <div class="">
                <div class="table-responsive text-black rounded" style="background-color: white;">
                    <table class="table " id="example23">
                        <thead class="text-center bg-info">
                            <tr>
                                <th>PO @lang('lang.number')</th>
                                <th>PO Date</th>
                                <th>Receive Date</th>
                                <th>Total Amount</th>
                                <th>@lang('lang.total') @lang('lang.quantity')</th>
                                <th>Requested By</th>
                                <th>PO @lang('lang.status')</th>
                                <th class="text-center">@lang('lang.details')</th>

                                <th class="text-center">@lang('lang.action')</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($po_lists as $po)
                                <tr class="text-center">
                                	<td>{{$po->po_number}}</td>
                                    <td style="overflow:hidden;white-space: nowrap;">{{date('d-m-Y', strtotime($po->po_date))}}</td>
                                    <td style="overflow:hidden;white-space: nowrap;">{{date('d-m-Y', strtotime($po->receive_date))}}</td>
                                    <td>{{$po->total_price}}</td>
                                    <td>{{$po->total_quantity}}</td>
                                    <td>{{$po->requested_by}}</td>

                                    @if($po->status == 0)
                                	<td><span class="badge badge-info font-weight-bold">Pending</span></td>
                                    @elseif($po->status == 1)
                                    <td><span class="badge badge-info font-weight-bold">Approved</span></td>
                                    @elseif($po->status == 2)
                                    <td><span class="badge badge-info font-weight-bold">Purchased</span></td>
                                    @elseif($po->status == 3)
                                    <td><span class="badge badge-info font-weight-bold">Arrived</span></td>
                                    @endif
                                	<td class="text-center"><a href="{{ route('po_details',$po->id)}}" class="btn btn-sm rounded btn-outline-info">Check Details</a>
                                    </td>

                                        @if($po->status !== 1)
                                        <td class="text-center">
                                            <a href="#" class="btn btn-outline-info" onclick="ApprovePO('{{$po->id}}')">Approve</a>
                                        </td>
                                        @else
                                        <td class="text-center" style="overflow:hidden;white-space: nowrap;">
                                            <a href="#" class="btn btn-sm btn-info rounded">
                                                <i class="fas fa-info-circle"></i>
                                            </a>
                                        </td>
                                        @endif

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@section('js')

<script type="text/javascript">

    $('#example23').DataTable( {

        "paging":   false,
        "ordering": true,
        "info":     false

    });

    function ApprovePO(value) {

        var po_id = value;

        swal({
            title: "Are you Sure to approve this PO?",
            icon: 'warning',
            buttons: ["@lang('lang.no')", "@lang('lang.yes')"]
         })
        .then((isConfirm) => {

            if (isConfirm) {

                $.ajax({
                    type: 'POST',
                    url: 'PO/Approve',
                    dataType: 'json',
                     data: {
                        "_token": "{{ csrf_token() }}",
                        "po_id": po_id,
                     },

                    success: function(data) {
                        if(data == 1){
                        swal({
                            title: "Success!",
                            text: "Successfully approved PO!",
                            icon: "success",
                        });

                               setTimeout(function () {
                                    location.reload(true);
                                }, 1000);
                        }


                    },
                });
             }
        });
    }

</script>
@endsection
