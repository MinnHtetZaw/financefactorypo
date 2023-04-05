@extends('master')
@section('title','Invoice List')
@section('link','Invoice List')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row justify-content-between">

                    <label class="">Invoice List<span class="float-right">	<a href="{{route('add_invoice')}}"  class="btn btn-primary"><i class="fas fa-plus"></i> Add Invoice</a></span></label>

                
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead class="text-center bg-info">
                        <th>#</th>
                        <th>Invoice No</th>                                   
                        <th>Project Name</th>
                        <th>No Product Qty</th>
                        <th>Date</th>
                        <th>Action</th>
                    </thead>
                    <tbody class="text-center">
                        <?php $i=1; ?>
                        @foreach($invoice as $inv)
                        <tr>
                            <td>{{$i++}}</td>

                            <td>{{$inv->invoice_no}}</td>

                            <td>{{$inv->saleproject->name}}</td>
                            <td>{{$inv->total_product_qty}}</td>
                            <td>{{$inv->invoice_date}}</td>
                            <td><button class="btn btn-info" onclick="bom_product_list('{{$inv->id}}')" data-toggle="modal" data-target="#list_{{$inv->id}}">Product List</button>
                            <button class="btn btn-dark" data-toggle="modal" data-target="#price_{{$inv->id}}">Price</button>
                            <button class="btn btn-danger" data-toggle="modal" data-target="#attach_{{$inv->id}}">Attach</button>
                            </td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- Product List Modl -->

                @foreach($invoice as $inv)
                <div class="modal fade bd-example-modal-lg" id="list_{{$inv->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5><span class="text-success mr-2">{{$inv->invoice_no}}</span>Product Lists</h5>

                        </div>
                        <div class="modal-body">
                            <div class="row bg-info font-weight-bold p-2">
                                <div class="col-md-1">
                                <span>No</span>
                                </div>

                                <div class="col-md-3">

                                <span>Name</span>
                                </div>
                                <div class="col-md-2">
                                <span>Brand</span>
                                </div>

                                <div class="col-md-3 text-center">

                                <span>Category</span>
                                </div>
                                <div class="col-md-2">
                                <span>Stock Qty</span>
                                </div>
                            </div>

                            <div id="productspace{{$inv->id}}">

                            </div>
                           

                        </div><!--modal body end -->
                    </div>
                </div>
                </div>
                @endforeach
               
               
                <!-- End Product -->
            </div>
        </div>
    </div>
</div>


@endsection
@section('js')

<script>


function bom_product_list(inv_id)

{
    // alert(bom_id);
    $.ajax({
           type:'POST',

           url:'/ajax_invoice_product',
           dataType:'json',
           data:{ "_token": "{{ csrf_token() }}",
           "invoice_id":inv_id,

        },
           success:function(data){
                var htmlbom = "";
                var i=0;
                var j=1;
                for(i=0;i<data.product.length;i++)
                {
                    // alert(data.product[i].name);
                    htmlbom +=`
                    
                    <div class="row mb-1 mt-3 font-weight-bold" style="font-size:18px;">  
                        <div class="col-md-1">
                            <span>${i+1}</span>
                        </div>             

                        <div class="col-md-3">
                            <span>${data.product[i].name}<span>
                        </div>
                        <div class="col-md-2">
                            <span>Brand One</span>
                        </div>
                        <div class="col-md-3 text-center">
                            <span>Category One</span>

                        </div>
                        
                        <div class="col-md-2">
                            <span>${data.product[i].stock_qty}</span>
                        </div>
                       
                    </div>
                    
                    `;
                }

                $('#productspace'+inv_id).html(htmlbom);

                
                
           }
    });
}



</script>

@endsection