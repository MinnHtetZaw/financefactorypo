@extends('master')

@section('title','Voucher Details')

@section('place')

<div class="col-md-5 col-8 align-self-center">
    <h3 class="text-themecolor m-b-0 m-t-0">Sale Page</h3>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin_dashboard')}}">Back to Dashborad</a></li>
        <li class="breadcrumb-item active">Sale Page</li>
    </ol>
</div>

@endsection

@section('content')

<style>
    /* td{

        text-align:left;
        font-size:20px;
        font-weight:bold;
        overflow:hidden;
        white-space: nowrap; 
    }
    th{
        text-align:left;
        font-size:15px;
    } */
    h6{
        font-size:15px;
        font-weight:600;
    }

    .btn {
    width: 130px;
    overflow: hidden;
    white-space: nowrap;
  }
</style>

@if(session()->get('user')->hasRole('Employee') || session()->get('user')->hasRole('Doctor'))

    <div class="row justify-content-center hospital">
        <div class="col-md-10 offset-2">
            <div class="col-md-8 printableArea" style="width:50%;">
                <div class="card card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-center">
                                <address>
                                    <h5> &nbsp;<b class="text-center">K-Win Clinic</b></h5>
                                    <h6>(ဆေးခန်းသုံး POS )</h6>
                                    <h6><i class="fas fa-mobile-alt"></i> 01-9669013,9669014,663371 , 09-8623171 , 09-5171618,Fax: 01-9669014 </h6>
                                </address>
                            </div>
                            <div class="pull-right text-left">
                                <h6>Date : <i class="fa fa-calendar"></i> {{date('d-m-Y', strtotime($unit->voucher_date))}}</h6>
                                <h6>Voucher Number :{{$unit->voucher_code}} </h6>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="table-responsive" style="clear: both;">
                                <table class="table" style="font-size: 15px">
                                    <thead style="font-size: 15px">
                                        <tr>
                                            <th>Name</th>
                                            <th>Unit</th>
                                            <th>Price*Qty</th>
                                            <th >Total</th>
                                        </tr>
                                    </thead>
                                    <tbody style="font-size: 15px">
                                        <tr>
                                            <td colspan="4" style="font-size: 15px">Doctor's Services</td>
                                        </tr>
                                
                                        @if(!empty($docAndservices))
                                    
                                        @foreach($docAndservices as $docAndservice)
                                        @if ($docAndservice->pivot->doctor_id !=null)
                                        <tr>
                                                <td style="font-size:15px;">{{$docAndservice->name}}</td>
                                                <td style="font-size:15px;">
                                                </td>
                                            <td style="font-size:15px;">{{$docAndservice->charges}} * {{$docAndservice->pivot->quantity}} </td>
                                            <td style="font-size:15px;text-align:right" id="subtotal">{{$docAndservice->charges * $docAndservice->pivot->quantity}}</td> 
                                        </tr>
                                            
                                        @endif
                                        @endforeach
                                        @endif
                                        <tr>
                                            <td colspan="4" style="font-size: 15px">Package & Services</td>
                                        </tr>
                                        @if (!empty($packages))
                                        @foreach($packages as $package)
                                        <tr>
                                    
                                                <td style="font-size:15px;">{{$package->name}}</td>
                                                <td style="font-size:15px;">Packages
                                                </td>
                                            <td style="font-size:15px;">{{$package->total_charges}} * {{$package->pivot->quantity}} </td>
                                            <td style="font-size:15px;text-align:right" id="subtotal">{{$package->total_charges * $package->pivot->quantity}}</td> 
                                    
                                        </tr>
                                        @endforeach
                                        
                                        @endif
                                        @foreach($docAndservices as $docAndservice)
                                        @if ($docAndservice->pivot->doctor_id ==null)
                                        <tr>
                                                <td style="font-size:15px;">{{$docAndservice->name}}</td>
                                                <td style="font-size:15px;"> Services
                                                </td>
                                            <td style="font-size:15px;">{{$docAndservice->charges}} * {{$docAndservice->pivot->quantity}} </td>
                                            <td style="font-size:15px;text-align:right" id="subtotal">{{$docAndservice->charges * $docAndservice->pivot->quantity}}</td> 
                                        </tr>
                                            
                                        @endif
                                        @endforeach
                                        <tr>
                                            <td colspan="4" style="font-size: 15px">Medicine</td>
                                        </tr>

                                        @if (!empty($unit))
                                        @foreach($unit->counting_unit as $countingunit)
                                        <tr>
                                    
                                                <td style="font-size:15px;">{{$countingunit->item->item_name}}</td>
                                                <td style="font-size:15px;">{{$countingunit->unit_name}}
                                                </td>
                                            <td style="font-size:15px;">{{$countingunit->normal_sale_price}} * {{$countingunit->pivot->quantity}} </td>
                                            <td style="font-size:15px;text-align:right" id="subtotal">{{$countingunit->normal_sale_price * $countingunit->pivot->quantity}}</td> 
                                    
                                        </tr>
                                        @endforeach
                                    
                                        @endif
                                        @if ($unit->delivery_status==2)
                                        <tr>
                                            <td colspan="3" style="font-size:15px">Delivery charges</td>
                                            <td style="font-size:15px;text-align:right">{{$unit->delivery_charges}}</td>
                                        </tr>
                                        @endif
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td class="text-right" style="font-size:18px;">Total</td>
                                            <td id="total_charges" class="font-weight-bold" style="font-size:18px;"> {{$unit->total_price}}</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td class="text-right" style="font-size:18px;">Pay</td>
                                            <td id="pay" style="font-size:18px;"></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td class="text-right" style="font-size:15px;">Change</td>
                                            <td id="changes" style="font-size:15px;"></td>
                                        </tr>
                                    </tbody>
                                    </table>
                                <h6 class="text-center font-weight-bold">**ကျေးဇူးတင်ပါသည်***</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else

    <div class="row justify-content-center">
        <div class="col-md-10 offset-1 clinic">
            <div class="printableArea" style="">
                <div class="card card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-center">
                                <address>
                                    <h5> &nbsp;<b class="text-center">K-Win Clinic</b></h5>
                                    <h6>(ဆေးခန်းသုံး POS )</h6>
                                    <h6><i class="fas fa-mobile-alt"></i> 01-9669013,9669014,663371 , 09-8623171 , 09-5171618,Fax: 01-9669014 </h6>
                                </address>
                            </div>
                            <div class="pull-right text-left">
                                <h6>Date : <i class="fa fa-calendar"></i> {{date('d-m-Y', strtotime($unit->voucher_date ?? null))}}</h6>
                                <h6>Voucher Number :{{$unit->voucher_code ?? null}} </h6>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="table-responsive" style="clear: both;">
                                <table class="table" style="font-size: 0.75rem">
                                    <thead>
                                        <tr class="text-center">
                                            <th>No.</th>
                                            <th>Name</th>
                                            <th>Unit Name</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody id="sale">
                                    @if (!empty($unit->counting_unit))
                                    <tr class="detail">
                                        <td colspan="5">
                                        Medicine
                                        </td>
                                    </tr>
                                    @php
                                        $j=1
                                    @endphp
                                    @foreach ($unit->counting_unit as $medicine)
                                        {{-- {{$medicine}} --}}

                                        <tr class="text-center detail" >
                                            <td class="font-weight-normal">{{$j++}}.</td>

                                            <td class=" font-weight-normal">{{$medicine->item->item_name}}</td>

                                            <td class=" font-weight-normal">{{$medicine->unit_name}}</td>

                                            <td>
                                                {{$medicine->pivot->quantity}}
                                            </td>
                                            <td></td>
                                        </tr>
                                    @endforeach
                                    @endif
                                        <tr>
                                        <td colspan="4">
                                        Medicine Total Charges
                                        </td>
                                        <td>
                                        {{$unit->medicine_charges ?? null}}
                                            
                                        </td>
                                    </tr>

                                    <tr class="detail">
                                        <td colspan="5">
                                        Services And Package
                                        </td>
                                    </tr>

                                    @if (!empty($unit->services))
                                    @foreach ($unit->services as $service)
                                    <tr class="text-center detail">
                                    <td class="font-weight-normal">{{$j++}}</td>

                                    <td class=" font-weight-normal">{{$service->name}}</td>

                                    <td class=" font-weight-normal">service</td>

                                    <td>
                                        {{$service->pivot->quantity}}
                                    </td>
                                    <td></td>
                                    </tr>
                                    @endforeach
                                    @endif

                                    <tr>
                                        <td colspan="4">
                                        Service Total Charges
                                        </td>
                                        <td>
                                        {{$unit->service_charges ?? null}}
                                        
                                        </td>
                                    </tr>
                                
                                    <tr>
                                        <td colspan="4">
                                        Doctor Charges
                                        </td>
                                        <td>
                                        {{$unit->doctor_charges ?? null}}
                                        </td>
                                    </tr>

                                    <tr>
                                    <td colspan="4">
                                    Total
                                    </td>
                                    <td>
                                        {{$unit->total_price ?? null}}
                                    </td>
                                </tr>
                                    </tbody>
                                </table>
                                <h6 class="text-center font-weight-bold">**ကျေးဇူးတင်ပါသည်***</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

        <div class="row">
            @if(session()->get('user')->hasRole('EmployeeC') || session()->get('user')->hasRole('DoctorC'))
            
            <div class="custom-control col-md-1 offset-3 custom-switch float-right">
                <input type="checkbox" class="custom-control-input bg-danger" id="customSwitch2" checked>
                <label class="custom-control-label pinkcolor" for="customSwitch2"> Voucher Details</label>
              </div>
      
            @endif

            <div class="col-md-4 mb-3 text-center">
                <button id="print" class="btn bpinkcolor text-white btn-rounded" type="button"> 
                    <span><i class="fa fa-print"></i>&nbsp;&nbsp;Print</span> 
                </button>
            
            </div>
          
          
        </div>

@endsection

@section('js')

<script src="{{asset('assets/js/jquery.PrintArea.js')}}" type="text/JavaScript"></script>

<script>
    $(document).ready(function() {
        $("#print").click(function() {
            detail();
            $(".printableArea").css("width", "45%");


            var mode = 'iframe'; //popup
            var close = mode == "popup";
            var options = {
                mode: mode,
                popClose: close
            };
            $("div.printableArea").printArea(options);
        });
 
    });

    function detail(){
          if(!$('#customSwitch2').is(':checked')){
            $(".detail").addClass("d-none");
          }
          else{
            $(".detail").removeClass("d-none");
          }
        }

    $('#customSwitch2').on('change.bootstrapSwitch', function(e) {
        detail();
    });
</script>
@endsection