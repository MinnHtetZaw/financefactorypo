@extends('master')
@section('title', 'Change Schedule')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-striped custom-table mb-0 datatable">
                <thead>
                    <tr>
                        <th style="font-weight: 400">#</th>
                        <th style="font-weight: 400">Unit Code</th>
                        <th style="font-weight: 400">Unit Name</th>
                        <th style="font-weight: 400">Stock Qty</th>
                        <th style="font-weight: 400">Reorder Qty</th>
                        <th style="font-weight: 400">Sell Price</th>
                        <th style="font-weight: 400">Purchase Price</th>
                        <th class="text-right" style="font-weight: 400">Action</th>
                    </tr>
                </thead>
                <?php
                $i = 1;
                ?>

                <tbody id="table_body">
                    @if(count($units) == 0)
                    <tr>
                        <td>There is Empty Data!</td>
                    </tr>
                    @else
                   @php
                       $i=1;
                   @endphp 
                    @foreach($units as $list)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$list->unit_code}}</td>
                        <td>{{$list->item->item_name}}({{$list->unit_name}})</td>
                        <td>{{$list->stock_qty}}</td>
                        <td>{{$list->reorder_quantity}}</td>
                        <td>{{$list->normal_sale_price}}</td>
                        <td>{{$list->purchase_price}}</td>
                        <td>
                            <a href="#" class="btn btn-info" data-toggle="modal" data-target="#edit_stock{{$list->id}}">
                                Edit</a>
                        </td>
                      
                    </tr>

                    <div class="modal fade" id="edit_stock{{$list->id}}" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title pinkcolor">Edit Stock Form</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                        <div class="modal-body">
                            <form class="form-material m-t-40" method="post" action="{{route('count_unit_update', $list->id)}}">
                                @csrf
                                <div class="form-group">    
                                    <label class="font-weight-bold">Code</label>
                                    <input type="number" name="type_code" class="form-control" value="{{$list->unit_code}}"> 
                                </div>
                                
                                <div class="form-group">    
                                    <label class="font-weight-bold">Name</label>
                                    <input type="text" name="name" class="form-control" value="{{$list->unit_name}}"> 
                                </div>
                                <div class="form-group">    
                                    <label class="font-weight-bold">Item name</label>
                                    <select class="form-control" name="item_id" required>
                                        @foreach($items as $item)
                                        <option value="{{$item->id}}">{{$item->item_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">    
                                    <label class="font-weight-bold">Stock Qty</label>
                                    <input type="text" name="stock_qty" class="form-control" value="{{$list->stock_qty}}"> 
                                </div>
                                <div class="form-group">    
                                    <label class="font-weight-bold">Reorder Qty</label>
                                    <input type="text" name="reorder_quantity" class="form-control" value="{{$list->reorder_quantity}}"> 
                                </div>
                                <div class="form-group">    
                                    <label class="font-weight-bold">Sell Price</label>
                                    <input type="text" name="normal_sale_price" class="form-control" value="{{$list->normal_sale_price}}"> 
                                </div>
                                <div class="form-group">    
                                    <label class="font-weight-bold">Purchase Price</label>
                                    <input type="text" name="purchase_price" class="form-control" value="{{$list->purchase_price}}"> 
                                </div>
                                
                                <input type="submit" name="btnsubmit" class="btnsubmit float-right btn bbluecolor text-white" value="Save">
                            </form>           
                        </div>
                   
                  </div>
                </div>
            </div>
                    @endforeach
                    @endif
                </tbody>

            </table>

            {{-- modal --}}
          
</div>



@endsection

@section('js')

<script type="text/javascript">
    $(document).ready(function() {
        $('.outdocdiv').hide();

        $(".select2").select2();


        $("#check_date").datetimepicker({
            format: 'YYYY-MM-DD'
        });

        $("#check_date2").datetimepicker({
            format: 'YYYY-MM-DD'
        });

        $('#datetimepicker3').datetimepicker({
            format: 'LT'
        });
    });//end jquery


</script>

@endsection