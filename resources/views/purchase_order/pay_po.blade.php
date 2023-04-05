@extends('master')
@section('title','Pay Purchase Order')
@section('link','Pay Purchase Order')
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

<div class="row justify-content-center pl-4 mt-2"  style="font-weight: 500">
            <div class="col-md-8 text-left font14">
                <div class="row mb-2">
                    <div class="col-md-6">
                            Project Name :
                         {{$sale_project->name}}
                    </div>
                    <div class="col-md-6">

                        expected_budget : {{$sale_project->expected_budget}}
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-6">
                        Submission Date : {{$sale_project->submission_date}}

                    </div>
                    <div class="col-md-6">
                        Project Value : {{$sale_project->project_value}}</span>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-6">

                        Estimate Date  :
                        {{$sale_project->estimate_date}}
                    </div>
                    <div class="col-md-6">
                        Project Status :
                        @if($sale_project->status == 1)
                        <span class="badge badge-info font-weight-bold">RFQ</span>
                        @elseif($sale_project->status == 2)
                        <span class="badge badge-warning font-weight-bold">Bidded</span>
                        @elseif($sale_project->status == 3)
                        <span class="badge badge-success font-weight-bold">Awarded</span>
                        @endif
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-6">
                        location : {{$sale_project->location}}

                    </div>
                    <div class="col-md-6">
                        Project Contact Person : <span class="badge badge-info font-weight-bold">{{$sale_project->project_contact_person}}</span>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-6">

                    </div>
                    <div class="col-md-6 btn-group">


                    </div>
                </div>
            </div>
    </div>

    <div class="row justify-content-center">
        <div class="row">
            <div class="col-md-8">
                <ul class="nav nav-pills m-t-30 m-b-30 container mb-2" style="margin-left:200px;">
                    <li class="nav-item">
                        <a href="#navpills-1" class="nav-link active" data-toggle="tab" aria-expanded="false">
                        Unpaid PO
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#navpills-2" class="nav-link" data-toggle="tab" aria-expanded="false">
                        Paid PO
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#navpills-3" class="nav-link" data-toggle="tab" aria-expanded="false">
                        Transaction List
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-4">
            <a href="{{route('po_accounting',$sale_project->id)}}" class="btn btn-outline-success">Add PO</a>
            </div>
        </div>
        <div class="col-md-8">
        <!-- Begin navpill -->
        <div class="tab-content br-n pn">
        <div id="navpills-1" class="tab-pane active">
            <div class="card card-body">
            <h4 class=""></h4>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive text-black" style="clear: both;">
                            <table class="table table-hover">
                                <thead class="bg-info text-white">
                                    <tr class="">
                                        <th>No.</th>
                                        <th>PO Number</th>
                                        <th>Date</th>
                                        <th>Total Qty</th>
                                        <th class="text-center">Total Amount</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-black">
                                <?php $i=1; ?>
                                @foreach($purchase_order as $po)
                                @if($po->paid_status == 0)
                                    <tr>
                                        <td style="font-size:15px;">{{$i++}}</td>
                                        <td style="font-size:15px;">{{$po->purchase_order_no}}</td>
                                        <td style="font-size:15px;">{{$po->purchase_order_date}}</td>
                                        <td style="font-size:15px;" class="text-center">{{$po->total_product_qty}}</td>
                                        <td class="text-center" style="font-size:15px;">{{$po->total_amount}}</td>
                                        <td class="text-center">
                                        <a href="#" class="btn btn-danger btn-sm"  data-toggle="modal" data-target="#invoice_detail{{$po->id}}"><i class="fa fa-info mr-2" aria-hidden="true"></i></i>Detail</a>
                                        @if($po->paid_status == 0)
                                        <a href="#" class="btn btn-primary btn-sm"  data-toggle="modal" data-target="#paid_invoice{{$po->id}}"><i class="fa fa-info mr-2" aria-hidden="true"></i></i>Paid</a></td>
                                        @elseif($po->paid_status == 1)
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
        </div><!-- end navpil -1 -->
        <!-- Begin Paid Modal -->
        @foreach($purchase_order as $po)
        <div class="modal fade" id="paid_invoice{{$po->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title" id="exampleModalLabel">Paid Method</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('store_pay_po_transaction')}}" method="post">
                        @csrf
                        <input type="hidden" name="project_id" value="{{$po->sale_project_id}}">
                        <input type="hidden" name="purchase_order_id" value="{{$po->id}}">
                    <div class="row">
                        <div class="col-md-4 offset-md-2">
                        <div class="form-check form-check-inline col-md-4" id="">
                            <input class="form-check-input" type="radio" name="exist_asset" id="sell" value="1" onclick="select_bank('{{$po->id}}')">
                            <label class="form-check-label text-success" for="sell">Bank</label>
                        </div>
                        </div>
                        <div class="col-md-4">
                        <div class="form-check form-check-inline col-md-4" id="">
                            <input class="form-check-input" type="radio" name="exist_asset" id="end" value="2" onclick="select_cash('{{$po->id}}')">
                            <label class="form-check-label text-success" for="end">Cash</label>
                        </div>
                        </div>
                    </div>
                    <div class="form-group bankse" id="bankselect{{$po->id}}">
                        <label for="name">Bank Accounting List</label>
                        <select class="custom-select border-info" name="bank_acc" name="account_id">
                        <option>Choose Account</option>
                            @foreach($accounting as $acc)
                            @if($acc->account_type == 'Bank')
                            <option value="{{$acc->id}}">{{$acc->account_code}}-{{$acc->account_name}}-{{$acc->account_type}}-{{$acc->curr->name}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group cashse" id="cashselect{{$po->id}}">
                        <label for="name">Cash Accounting List</label>
                        <select class="custom-select border-info" name="cash_acc" name="account_id">
                        <option>Choose Account</option>
                            @foreach($accounting as $acc)
                            @if($acc->account_type == 'Cash')
                            <option value="{{$acc->id}}">{{$acc->account_code}}-{{$acc->account_name}}-{{$acc->account_type}}-{{$acc->curr->name}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Pay Date</label>
                        <input type="date" class="form-control border-info" name="date" id="date">
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3">
                            <label for="name">Amount</label>
                        </div>
                        <div class="col-md-1">
                            <label for="">:</label>
                        </div>
                        <div class="col-md-8">
                            <label for="name">{{$po->total_amount}}&nbsp;({{$po->curr->name}})</label>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="name">Pay Amount</label>
                                <input type="number" class="form-control border-info" name="pay_amt" id="pay_amt" value="">
                            </div>
                        </div>
                        <div class="col-md-4" style="margin-top:6px">
                            <label for="name">Currency</label>
                            <select class="custom-select border-info" name="account_id">
                            <option>Choose Currency</option>
                            @foreach($currency as $cc)
                            <option value="{{$cc->id}}">{{$cc->name}}</option>
                            @endforeach

                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Remark</label><br>
                        <textarea class="border-info form-control" name="remark" placeholder="Describe down remark..." rows="3" cols="60"></textarea>
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
        <!-- End Paid Modal -->
        <div id="navpills-2" class="tab-pane">
            <div class="card mt-1">
            <div class="card card-body">
            <h4 class=""></h4>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive text-black" style="clear: both;">
                            <table class="table table-hover">
                                <thead class="bg-info text-white">
                                    <tr class="">
                                        <th>No.</th>
                                        <th>PO Number</th>
                                        <th>Date</th>
                                        <th>Total Qty</th>
                                        <th class="text-center">Total Amount</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-black">
                                <?php $i=1; ?>
                                @foreach($purchase_order as $po)
                                @if($po->paid_status == 1)
                                    <tr>
                                        <td style="font-size:15px;">{{$i++}}</td>
                                        <td style="font-size:15px;">{{$po->purchase_order_no}}</td>
                                        <td style="font-size:15px;">{{$po->invoice_date}}</td>
                                        <td style="font-size:15px;" class="text-center">{{$po->total_product_qty}}</td>
                                        <td class="text-center" style="font-size:15px;">{{$po->total_amount}}</td>
                                        <td class="text-center">
                                        <a href="#" class="btn btn-danger btn-sm"  data-toggle="modal" data-target="#invoice_detail{{$po->id}}"><i class="fa fa-info mr-2" aria-hidden="true"></i></i>Detail</a>
                                        @if($po->paid_status == 0)
                                        <a href="#" class="btn btn-primary btn-sm"  data-toggle="modal" data-target="#paid_invoice{{$po->id}}"><i class="fa fa-info mr-2" aria-hidden="true"></i></i>Paid</a></td>
                                        @elseif($po->paid_status == 1)
                                        <button class="btn btn-secondary btn-sm"  disabled><i class="fa fa-info mr-2" aria-hidden="true"></i></i>Paid</button></td>
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
            </div>
        </div><!-- end navpil -3 -->
        <div id="navpills-3" class="tab-pane">
            <div class="card mt-1">
            <div class="card card-body">
            <h4 class=""></h4>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive text-black" style="clear: both;">
                            <table class="table table-hover">
                            <thead class="bg-info text-white">
                            <tr>
                                <th>#</th>
                                <th class="text-center">Account</th>
                                <th>Type</th>
                                <th class="text-center">Date</th>
                                <th>Amount</th>
                                <th class="text-center">Remark</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <?php $i=1; ?>
                        @foreach($transaction as $trans)
                        @if($trans->project_id == $sale_project->id)
                        @if($trans->type_flag == 1 && $trans->all_flag == 2)
                            <tbody class="text-black">
                            <td style="font-size:15px;">{{$i++}}</td>
                            <td style="font-size:15px;" class="text-center">{{$trans->accounting->account_code}}</br>({{$trans->accounting->account_name}})</td>
                            <td style="font-size:15px;">{{$trans->type}}</td>
                            <td style="font-size:15px;">{{$trans->date}}</td>
                            <td style="font-size:15px;">{{$trans->amount}}</td>
                            <td style="font-size:15px;">{{$trans->remark}}</td>
                            <td><a class="btn btn-primary btn-sm" data-toggle="collapse" href="#related{{$trans->id}}" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Related</a></td>
                            <!-- collapse begin -->
            </tr>
            <tr>

            <td colspan="8">
                <div class="collapse out container mr-5" id="related{{$trans->id}}">
                    <div class="row">
                        <?php $j=1 ?>
                        @foreach($transaction as $transa)
                        @if($trans->related_transaction_id == $transa->id)
                        @if($transa->type_flag == 2)
                        <div class="col-md-2">
                            <label style="font-size:15px;" class="text-info">No</label>
                            <div style="font-size:15px;">{{$j++}}</div>

                        </div>
                        <div class="col-md-3">
                            <label style="font-size:15px;" class="text-info">Account</label>

                            <div style="font-size:15px;">{{$transa->accounting->account_code}}</br>({{$transa->accounting->account_name}})</div>


                        </div>
                        <div class="col-md-2">
                            <label style="font-size:15px;" class="text-info">Type</label>

                            <div style="font-size:15px;">{{$transa->type}}</div>

                        </div>
                        <div class="col-md-2">
                            <label style="font-size:15px;" class="text-info">Date</label>

                            <div style="font-size:15px;">{{$transa->date}}</div>

                        </div>
                        <div class="col-md-2">
                            <label style="font-size:15px;" class="text-info">Amount</label>

                            <div style="font-size:15px;">{{$transa->amount}}</div>

                        </div>
                        @endif
                        @endif
                       @endforeach
                    </div>
                </div>

            <td>
                            <!-- end collapse -->
                            </tbody>
                            @endif
                            @endif
                        @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div><!-- end navpil -2 -->
        </div><!-- all navpill end -->
        </div><!-- all col-md-8 end -->

    </div><!-- row justify end -->
@endsection
@section('js')
<script>
$(document).ready(function()
{
    $('.bankse').hide();
    $('.cashse').hide();
})
function select_bank(value)
{
    $('#bankselect'+value).show();
    $('#cashselect'+value).hide();
}
function select_cash(value)
{
    $('#bankselect'+value).hide();
    $('#cashselect'+value).show();
}
</script>
@endsection
