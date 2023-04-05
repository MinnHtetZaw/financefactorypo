@extends('master')
@section('title','Pay Invoice')
@section('link','Pay Invoice')
@section('content')
<style>
        td {

            text-align: left;
            font-size: 20px;
            font-weight: bold;
            overflow: hidden;
            white-space: nowrap;
        }

        th {
            text-align: left;
            font-size: 15px;
        }

        h6 {
            font-size: 15px;
            font-weight: 600;
        }

        .btn {
            width: 130px;
            overflow: hidden;
            white-space: nowrap;
        }

    </style>
    <div class="card card-body">
            <h4 class=""></h4>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive text-black" style="clear: both;">
                            <table class="table table-hover">
                                <thead class="bg-info text-white">
                                    <tr class="">
                                        <th>No.</th>
                                        <th>Invoice Number</th>
                                        <th>Date</th>
                                        <th>Total Qty</th>
                                        <th class="text-center">Total Amount</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-black">
                                <?php $i=1; ?>
                                @foreach($invoice as $inv)
                                @if($inv->paid_status == 0)
                                    <tr>
                                        <td style="font-size:15px;">{{$i++}}</td>
                                        <td style="font-size:15px;">{{$inv->invoice_no}}</td>
                                        <td style="font-size:15px;">{{$inv->invoice_date}}</td>
                                        <td style="font-size:15px;" class="text-center">{{$inv->total_product_qty}}</td>
                                        <td class="text-center" style="font-size:15px;">{{$inv->total_amount}}</td>
                                        <td class="text-center">
                                        <a href="#" class="btn btn-danger btn-sm"  data-toggle="modal" data-target="#invoice_detail{{$inv->id}}"><i class="fa fa-info mr-2" aria-hidden="true"></i></i>Detail</a>
                                        @if($inv->paid_status == 0)
                                        <a href="#" class="btn btn-primary btn-sm"  data-toggle="modal" data-target="#paid_invoice{{$inv->id}}"><i class="fa fa-info mr-2" aria-hidden="true"></i></i>Paid</a></td>
                                        @elseif($inv->paid_status == 1)
                                        <button class="btn btn-secondary btn-sm" disabled><i class="fa fa-info mr-2" aria-hidden="true"></i></i>Paid</button></td>
                                        @endif
                                    </tr>
                                @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

 @foreach($invoice as $inv)
        <div class="modal fade" id="paid_invoice{{$inv->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title" id="exampleModalLabel">Paid Method</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('store_pay_transaction')}}" method="post">
                        @csrf

                        <input type="hidden" name="project_id" value="{{$inv->sale_project_id}}">
                        <input type="hidden" name="invoice_id" value="{{$inv->id}}">
                    <div class="row">
                        <div class="col-md-4 offset-md-2">
                        <div class="form-check form-check-inline col-md-4" id="">
                            <input class="form-check-input" type="radio" name="exist_asset" id="sell" value="1" onclick="select_bank('{{$inv->id}}')">
                            <label class="form-check-label text-success" for="sell">Bank</label>
                        </div>
                        </div>
                        <div class="col-md-4">
                        <div class="form-check form-check-inline col-md-4" id="">
                            <input class="form-check-input" type="radio" name="exist_asset" id="end" value="2" onclick="select_cash('{{$inv->id}}')">
                            <label class="form-check-label text-success" for="end">Cash</label>
                        </div>
                        </div>
                    </div>
                    <div class="form-group bankse" id="bankselect{{$inv->id}}">
                        <label for="name">Bank Accounting List</label>
                        <select class="custom-select border-info" name="account_id">
                        <option>Choose Account</option>
                            @foreach($accounting as $acc)
                            @if($acc->account_type == 'Bank')
                            <option value="{{$acc->id}}">{{$acc->account_code}}-{{$acc->account_name}}-{{$acc->account_type}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Pay Date</label>
                        <input type="date" class="form-control border-info" name="date" id="date">
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="name">Pay Amount</label>
                                <input type="number" class="form-control border-info" name="pay_amt" id="pay_amt" value="{{$inv->total_amount}}">
                            </div>
                        </div>
                        <div class="col-md-4" style="margin-top:6px">
                            <label for="name">Currency</label>
                            <select class="custom-select border-info" name="currency_id">
                            <option>Choose Currency</option>

                                <option value="">MMK</option>
                                <option value="">USD</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Remark</label><br>
                        <textarea class="border-info" name="remark" placeholder="Describe down remark..." rows="3" cols="60"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
    </form>
                </div>
                </div>
            </div>
        </div>
        @endforeach


@endsection
@section('js')
<script>
$(document).ready(function()
{
    $('.bankse').hide();
})
function select_bank(value)
{
    $('#bankselect'+value).show();
}
function select_cash(value)
{
    $('#bankselect'+value).hide();
}
</script>
@endsection
