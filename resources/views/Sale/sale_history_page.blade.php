@extends('master')

@section('title','Sale History Page')

@section('place')

<div class="col-md-5 col-8 align-self-center">
    <h3 class="text-themecolor m-b-0 m-t-0">Sale history</h3>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin_dashboard')}}">Back to Dashboard</a></li>
        <li class="breadcrumb-item active">Sale History</li>
    </ol>
</div>

@endsection

@section('content')
<section id="plan-features">
    <div class="row ml-2 mr-2">
            <div class="col-xl-3 col-lg-6">
                <div class="card card-stats mb-4 mb-xl-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                            <h5 class="card-title text-uppercase bluecolor font-weight-bold mb-0">Total sale</h5>
                            <span class="h3 font-weight-bold mb-0 pinkcolor" style="font-size: 20px;">{{$total_sales}} ks</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape text-white rounded-circle shadow" style="background-color:#473C70;">
                                <i class="fas fa-hand-holding-usd"></i>
                                </div>
                            </div>
                        </div>
                        <p class="mt-3 mb-0 bluecolor font-weight-bold text-sm">
                        <span>All Time Sale</span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6">
                <div class="card card-stats mb-4 mb-xl-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase bluecolor font-weight-bold mb-0">Today sales</h5>
                                <span class="h3 font-weight-bold mb-0 pinkcolor" style="font-size: 20px;">{{$daily_sales}} Ks</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape text-white rounded-circle shadow" style="background-color:#473C70;">
                                    <i class="fas fa-hand-holding-usd"></i>
                                </div>
                            </div>
                        </div>
                        <p class="mt-3 mb-0 bluecolor font-weight-bold text-sm">
                        <span>Today sales</span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6">
                <div class="card card-stats mb-4 mb-xl-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase bluecolor font-weight-bold mb-0">Weekly sales</h5>
                                <span class="h2 font-weight-bold mb-0 pinkcolor" style="font-size: 25px;">{{$weekly_sales}} Ks</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape text-white rounded-circle shadow" style="background-color:#473C70;">
                                    <i class="fas fa-hand-holding-usd"></i>
                                </div>
                            </div>
                        </div>
                        <p class="mt-3 mb-0 bluecolor font-weight-bold text-sm">
                        <span>This week</span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6">
                <div class="card card-stats mb-4 mb-xl-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                            <h5 class="card-title text-uppercase bluecolor font-weight-bold mb-0">Monthly Sales</h5>
                            <span class="h3 font-weight-bold mb-0 pinkcolor" style="font-size: 20px;">{{$monthly_sales}} Ks</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape text-white rounded-circle shadow" style="background-color:#473C70;">
                                <i class="fas fa-hand-holding-usd"></i>
                                </div>
                            </div>
                        </div>
                        <p class="mt-3 mb-0 bluecolor font-weight-bold text-sm">
                        <span>This month</span>
                        </p>
                    </div>
                </div>
            </div>
    </div>

    <div class="row ml-4 mt-3">
        <form action="{{route('search_sale_history')}}" method="POST" class="form">
            @csrf 
            <div class="row">
                <div class="col-md-5">
                    <label class="control-label font-weight-bold">From</label>
                    <input type="date" name="from" class="form-control" required>
                </div>
                
                <div class="col-md-5">
                    <label class="font-weight-bold">To</label>
                    <input type="date" name="to" class="form-control" required>
                </div>

                <div class="col-md-2 m-t-30">
                    <input type="submit" name="btnsubmit" class="btnsubmit float-right btn bbluecolor text-white" value="search">
                </div>
            </div>
        </form>

    </div>

    <br/>


    <div class="col-12">
                     
        <ul class="nav nav-pills m-t-30 m-b-30 ">
            <li class="nav-item">
                <a href="#navpills-1" class=" nav-link pinkcolor active" data-toggle="tab" aria-expanded="false">
                    Option One
                </a>
            </li>
            <li class=" nav-item">
                <a href="#navpills-2" class="nav-link pinkcolor" data-toggle="tab" aria-expanded="false">
                    Option Two
                </a>
            </li>
        </ul>
        <div class="tab-content br-n pn">
            <div id="navpills-2" class="tab-pane">
            <button id="print" style="margin-top: -60px;" class="btn bpinkcolor text-white btn-rounded float-right" type="button">
                <span class="float-right"><i class="fa fa-print"></i>Print</span>
            </button>
            <div class="clearfix"></div>
                <div class="row">
              
           
     
                    <div class="col-md-12">
                        <div class="card shadow p-5" style="color:black;">
                            @foreach ($countunits as $countunit)
                            @foreach ($total_qty as $tole)
                            
                            @if ($tole['countingunit_id']==$countunit->id)
                            @foreach ($counting_units as $counting_unit)
                                @if($counting_unit->id==$countunit->id)
                                @php
                                $item_name= $counting_unit->item->item_name;
                                @endphp
                               
                            <div class="row mb-3">
                                <div class="col-3"></div>
                                <div class="col-4">{{$item_name}}</div>
                                <div class="col-3"  style="font-weight:600">
                                    {{$countunit->unit_name}} 
                                </div>
                                <div class="col-2"  style="font-weight:600">
                                    {{$tole['qty']}}
                                </div>
                            </div>
                            @endif
                            @endforeach
                            @endif

                            @endforeach
                            

                         
                            
                            

                           

                                @endforeach
                        </div>
                    </div>

                  
                </div>
            </div>
            <div id="navpills-1" class="tab-pane active">
                <div class="card">
                    <div class="card-body shadow">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive" id="slimtest2">
                                    <table class="table" id="item_table">
                                        <thead>
                                            <tr>
                                                <th class="font-weight-bold text-themecolor">#</th>
                                                <th class="font-weight-bold text-themecolor">Voucher number</th>
                                                <th class="font-weight-bold text-themecolor">Voucher date</th>
                                                <th class="font-weight-bold text-themecolor">Name</th>
                                                <th class="font-weight-bold text-themecolor">Total quantity</th>
                                                <th class="font-weight-bold text-themecolor">Total price</th>
                                                <th class="font-weight-bold text-themecolor">Details</th>
                                            </tr>
                                        </thead>
                                        <tbody id="item_list">
                                            <?php
                                                $i = 1;
                                                $name = "Customer"
                                            ?>
                                           @foreach($voucher_lists as $voucher) 
                                            <tr>
                                                <td class="font-weight-bold">{{$i++}}</td>
                                                <td class="font-weight-bold">{{$voucher->voucher_code}}</td>
                                                <td class="font-weight-bold">{{$voucher->voucher_date}}</td>
                                                <td class="font-weight-bold">{{$voucher->appointment->clinic_patient->name ?? "customer" }}</td>
                                                <td class="font-weight-bold">{{$voucher->total_quantity}}</td>
                                                <td class="font-weight-bold">{{$voucher->total_price}}</td>
                                                <td style="text-align: center;"><a href="{{ route('getVoucherDetails',$voucher->id)}}" class="btn bbluecolor" style="color: white;">Details</a></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <div class="container">
        
    </div>
</section>

@endsection

@section('js')

<script src="{{asset('assets/js/jquery.slimscroll.js')}}"></script>

<script type="text/javascript">

    $(document).ready(function(){
        $('#item_table').DataTable( {
            "bDestroy": true,
            "paging":   false,
            "ordering": true,
            "info":     false,
            "scrollX": true
    });
    })

        
    $('#slimtest2').slimScroll({
        color: '#00f',
        height: '600px'
    });
	
</script>

@endsection