@extends('master')

@section('title', 'Sale Page')

@section('place')
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Sale</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Back to Bashboard</a></li>
            <li class="breadcrumb-item active">sale</li>
        </ol>
    </div>

@endsection

@section('content')

    <div class="row mb-3">

        <div class="col-md-4 col-xl-4">

            <label class="focus-label">Search Bar</label>
            <input class="form-control" type="text" onchange="QRcodeTest(this.value)" id="qr_code" autofocus>

        </div>


        <div class="col-md-2">
            <form action="{{ route('get_voucher') }}" method="post" id="vourcher_page">
                @csrf
                <input type="hidden" id="item" name="item">
                <input type="hidden" id="right_now_customer" name="right_now_customer">
                <input type="hidden" id="ownSaleOrWarehouse" name="ownSaleOrWarehouse">
                <input type="hidden" id="grand" name="grand">
                <input type="hidden" id="docServiceItem" name="docServiceItem">
                <input type="hidden" id="docServiceGrandTotal" name="docServiceGrandTotal">
                <input type="hidden" id="pagServiceItem" name="pagServiceItem">
                <input type="hidden" id="pagServicegrandTotal" name="pagServicegrandTotal">





                <div id="add_delivery" class="modal fade" role="dialog">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body text-center">
                                <h3>Medicine Delivery Info!</h3>
                                <hr>
        
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input " type="radio" name="delivery" id="direct" value="0" checked>
                                    <label class="form-check-label" for="direct">Direct</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="delivery" id="pickup" value="1">
                                    <label class="form-check-label" for="pickup">Pick Up</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="delivery" id="deliveryy" value="2">
                                    <label class="form-check-label" for="deliveryy">Delivery</label>
                                  </div>

                                  <div class="pickupform mt-3">
                                    <div class="form-group">
                                        <label>Pick up Name</label>
                                        <input class="form-control" type="text"  name="pickupname">
                                    </div>
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input class="form-control" type="number"  name="pickupphone">
                                    </div>
                                    <div class="form-group">
                                        <label>Date</label>
                                        <div class="cal-icon">
                                            <input type="text" class="form-control" id="check_date2" name="pickupdate">
                                        </div>
                                    </div>
                                  </div>

                                  <div class="deliveryform mt-3">
                                    <div class="form-group">
                                        <label>Receiver Name</label>
                                        <input class="form-control" type="text"  name="receivername">
                                    </div>
                                    <div class="form-group">
                                        <label>Receiver Ph.no</label>
                                        <input class="form-control" type="number"  name="receiverphno">
                                    </div>
                                    <div class="form-group">
                                        <label>Date</label>
                                        <div class="cal-icon">
                                            <input type="text" class="form-control" id="check_date3" name="deliverydate">
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label>State</label>

                                        <select class="select2 floating state_lists" style="width: 100%" name="state_id">

                                             <option value="">Select State</option>
                                            @foreach($state_lists as $doc)

                                            <option value="{{$doc->id}}">{{$doc->state_code}}-{{$doc->state_name}}</option>

                                            @endforeach

                                        </select>

                                    </div>

                                    <div class="form-group mb-4">
                                        <label>Town</label>

                                        <select class="select2 floating" id="towns" style="width: 100%" name="town_id">
                                            <option value="">Select State</option>

                                        </select>

                                    </div>

                                    <div class="form-group">
                                        <label>Addres</label>
                                        <input class="form-control" type="text"  name="address">
                                    </div>

                                    <div class="form-group mt-3">
                                        <label>Delivery charges</label>
                                        <input class="form-control" type="number" id="delivery_charges" name="charges">
                                    </div>
                                  </div>

                                    <div class="m-t-20">
                                        <a href="#" class="btn btn-danger ml-3" data-dismiss="modal">Close</a>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>







            </form>
        </div>

        <div class="col-md-2 col-xl-2 mt-3 pb-2">

            <a href="#" class="btn bpinkcolor text-white btn-rounded mt-3" onclick="qrSearch()"><i class="fa fa-check"></i> Scan Bar Code</a>

        </div>
    </div>


    <div class="row">

        <div class="card col-md-6 shadow-sm" style="overflow: hidden">
            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-tabs customtab" role="tablist">
                        <li class="nav-item
                        @if(session()->get('user')->hasRole('EmployeeC'))
                        d-none
                          @endif
                        ">
                            <a class="nav-link" data-toggle="tab" href="#medicines" role="tab">
                                <span class="hidden-sm-up">
                                    <i class="ti-home"></i>
                                </span>
                                <span class="hidden-xs-down">
                                    medicines
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#services" role="tab">
                                <span class="hidden-sm-up">
                                    <i class="ti-home"></i>
                                </span>
                                <span class="hidden-xs-down">
                                    Services
                                </span>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#doctors" role="tab">
                                <span class="hidden-sm-up">
                                    <i class="ti-home"></i>
                                </span>
                                <span class="hidden-xs-down">
                                    Doctors
                                </span>
                            </a>
                        </li> --}}
                        @if(session()->get('user')->hasRole('Employee'))
                        <li class="nav-item">
                            <button class="btn btn-success ml-5 pt-2 advenced_search_btn">
                                <span class="hidden-xs-down">
                                    Advenced Search
                                </span>
                            </button>
                        </li>
                        @endif

                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane
                        @if(session()->get('user')->hasRole('Employee') || session()->get('user')->hasRole('Doctor') || session()->get('user')->hasRole('DoctorC') )
                      active
                        @endif
                        " id="medicines" role="tabpanel"><br>
                            @if(session()->get('user')->hasRole('Employee'))
                            <div class="advenced_search">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Category</label>
                                            <select class="form-control" onchange="showRelatedSubCategoryFr(this.value)">
                                                <option value="">Select</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->category_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Subcategory</label>
                                            <select class="form-control" id="subcategory"
                                                onchange="showRelatedBrandFr(this.value)">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">

                                            <label class="control-label">Brand</label>
                                            <select class="form-control" id="also_brand"
                                                onchange="showRelatedTypeFr(this.value)">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label">Type</label>
                                        <select class="form-control" id="also_type"
                                            onchange="showRelatedItemList(this.value)">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Category</label>
                                        <select class="form-control" onchange="showRelatedItemClinic(this.value)">
                                            <option value="">Select</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->category_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            @endif


                            <table class="table" id="table_4">
                                    <div class="row">
                                        <div class="col-md-8 offset-4">
                                            <div class="row">
                                            <div class="col-3 mt-2">
                                                <p>Search</p>
                                            </div>
                                            <div class="col-7">
                                                <input type="text" class="form-control" id="itemsearch">
                                            </div>
                                        </div>
                                        </div>
                                    </div>

                                <thead class="text-center">
                                    <tr>
                                        <th>Code</th>
                                        <th>Name</th>
                                        {{-- <th>Photo</th> --}}
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center" id="all">

                                    @foreach ($items as $item)

                                        <tr>
                                            <td>{{ $item->item_code }}</td>
                                            <td>{{ $item->item_name }}
                                            </td>
                                            {{-- <td>
                                                <img src="{{ asset('/photo/Item/' . $item->photo_path) }}"
                                                    class="img-rounded" width="100" height="70" />
                                            </td> --}}
                                            <td class="text-center">
                                                <button style="border-radius: 8px" class="btn bbluecolor text-white" onclick="getCountingUnit({{ $item->id }})"><i
                                                class="fas fa-plus"></i>Sale</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane
                        @if(session()->get('user')->hasRole('EmployeeC') )
                        active
                          @endif
                        " id="services" role="tabpanel"><br>
                            <div class="row mt-2">
                                <div class="col-md-5">
                                    <label class="font-weight-bold pinkcolor">Filter By</label>
                                    <select class="form-control mr-2" id="serviceor" class="serviceOrpackage" style="width: 100%"
                                        onchange="serviceOrpackage(this.value)">
                                        <option value="service">Services</option>
                                        <option value="package">Packages</option>
                                    </select>
                                </div>
                            </div>

                            <table class="table" id="table_2">
                                {{-- <thead class="text-center">
                                    <tr>
                                        <th>Service Name</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead> --}}
                                <thead class="text-center">
                                    <tr>
                                        <th>Service Name</th>
                                        <th>Action</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($otherServices as $otherService)
                                        <tr>
                                            <input type="hidden" id="serCharges_{{$otherService->id}}" value="{{$otherService->charges}}">
                                            <td id="serName_{{$otherService->id}}">{{ $otherService->name }}</td>
                                            <td class="text-center">
                                                <button style="border-radius:8px" class="btn bbluecolor text-white" onclick="tgService({{ $otherService->id }})"><i class="fas fa-plus"></i>Add</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{-- <div class="tab-pane" id="doctors" role="tabpanel"><br>

                            <table class="table" id="table_1">
                                <thead>
                                    <tr>
                                        <th>Code</th>
                                        <th>Name</th>
                                        <th class="text-center">Action</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($doctors as $doctor)
                                        <tr>
                                            <td>{{ $doctor->doctor_code }}</td>
                                            <td>{{ $doctor->name }}</td>
                                            <td class="text-center">
                                                <i class="btn btn-success" onclick="getDocotorService({{ $doctor->id }})"><i class="fas fa-plus"></i>Services</i>
                                            </td>
                                        </tr>

                                    @endforeach
                                </tbody>
                            </table>
                        </div> --}}
                        <div class="modal fade" id="unit_table_modal" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title pinkcolor">unit information</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                                            id="#close_modal">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <div class="modal-body" id="checkout_modal_body">
                                        <table class="table">

                                            <thead>
                                                <tr class="text-center">
                                                    <th>Item name</th>
                                                    <th>Unit name</th>
                                                    <th>Current qty</th>
                                                </tr>
                                            </thead>
                                            <input type="hidden" id="item_name">
                                            <tbody id="count_unit">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="doctor_services_modal" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title pinkcolor">Services</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                                            id="#close_modal">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <div class="modal-body" id="checkout_modal_body">
                                        <table class="table">

                                            <thead>
                                                <tr class="text-center">
                                                    <th>Service name</th>
                                                    <th>Cost</th>
                                                    <th>Check</th>
                                                </tr>
                                            </thead>
                                            <input type="text" id="doctor_idid">
                                            <tbody id="doctor_services_modal_tbody">

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

        <div class="col-md-6 shadow-sm">
            <div class="card">
                <div class="card-title">
                    <a href="" class="float-right pinkcolor" onclick="deleteItems()">Refresh Here &nbsp<i class="fas fa-sync"></i></a>
                </div>
                <div class="card-body">
                    <h5 class="now_customer text-warning">Customer <span id="now_customer_no"></span></h5>
                    <input type="hidden" name="now_customer" value="0" id="now_customer">
                    <div class="row justify-content-center">
                        <table class="table">
                            <thead>
                                <tr class="text-center">
                                    <th class="font-weight-bold text-info">No</th>
                                    <th class="font-weight-bold text-info">Name</th>
                                    <th class="font-weight-bold text-info">Unit name</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="sale">

                            </tbody>
                            <tbody id="doctorSer">

                            </tbody>
                            <tbody id="serVice">

                            </tbody>

                        </table>
                    </div>
                    <div class="row ml-2 float-right">

                        @if(session()->get('user')->hasRole('Employee'))
                        <div class="">
                            <i class="btn btn-warning ml-4" onclick="storePendingVoucher()"><i
                                    class="fas fa-arrow-alt-circle-down"></i> Pending voucher </i>
                            <i class="btn btn-success ml-4" onclick="showCheckOut()"><i class="fas fa-calendar-check"></i>
                                Check out </i>
                        </div>
                        @elseif(session()->get('user')->hasRole('EmployeeC'))
                        <div class="">
                            <form action="{{route('addserviceCounter')}}" id="addservices" method="post">
                                @csrf
                                <div class="form-group row">
                                    <label for="addserviceCharge" class="col-6 offset-1 mt-2">Total Amount</label>
                                    <input type="text" class="form-control col-md-3" name="addserviceCharge" id="addserviceCharge">
                                </div>
                                <input type="hidden" id="appointment_id" name="appintment_id">
                                <input type="hidden" id="pagServ" name="pagServiceItem">
                                <input type="hidden" id="pagServicegra" name="pagServicegrandTotal">
                            </form>
                            <div class="row offset-6">
                                <i class="btn btn-success ml-4" onclick="addservices()"><i class="fas fa-calendar-check"></i>
                                Add Service </i>
                            </div>


                        </div>
                        @else
                        <div class="">

                            <button class="btn bpinkcolor text-white ml-4" onclick="medicineRecord()"><i class="fa fa-plus-circle"></i>
                                Medicine </button>
                        </div>
                        @endif



                        <div class="modal fade" id="customer_order" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title pinkcolor">Add customer order</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 offset-md-6">
            <div class="pending-voucher row">

            </div>
        </div>

    </div>


@endsection

@section('js')

    <script type="text/javascript">
        $(document).ready(function() {
            $(document).ajaxStart(function(){
                $("#preloaders").hide();
            });
            $(document).ajaxComplete(function(){
                $("#preloaders").hide();
            });
            $("#check_date2").datetimepicker({
                format: 'YYYY-MM-DD'
            });
            $("#check_date3").datetimepicker({
                format: 'YYYY-MM-DD'
            });
            $('.now_customer').hide();
            showmodal();
            local_customer_lists();
            $('.advenced_search').hide();
            $('.pickupform').hide();
            $('.deliveryform').hide();

            $('#table_1').DataTable({
                // "bDestroy": true,
                // "paging": false,
                // "ordering": true,
                // "info": false,
                // scrollY: 700,
                "paging":   false,
                "ordering": false,
                "info":     false,

            });


            $('#table_2').DataTable({
                "bDestroy": true,
                "paging": false,
                "ordering": true,
                "info": false,
                scrollY: 700,

            });

            $('#table_3').DataTable({
                "bDestroy": true,

                "paging": false,
                "ordering": true,
                "info": false,
                scrollY: 700,

            });
            $('#table_4').DataTable({
                "bDestroy": true,
                "paging": false,
                "ordering": true,
                "info": false,
                "scrollY": 700,
                "search": {
                    return: true
                }
            });


        });


        function deleteItems() {
            localStorage.removeItem('mycart');
            localStorage.removeItem('grandTotal');
            localStorage.removeItem('docServiceCart');
            localStorage.removeItem('docServiceGrandTotal');
            localStorage.removeItem('pagServiceCart');
            localStorage.removeItem('pagServicegrandTotal');
        }

        function qrSearch() {

            document.getElementById("qr_code").focus();

        }

        $('.form-check-inline').click(function(){
            var delivery= $("input[name='delivery']:checked").val();
            if(delivery==0){
                $('.pickupform').hide();
                $('.deliveryform').hide();
            }
            else if(delivery==1){
                $('.pickupform').show();
                $('.deliveryform').hide();
            }
            else{
                $('.pickupform').hide();
                $('.deliveryform').show();
            }
        });
        $('.state_lists').change(function(){
            var state_id = $(".state_lists option:selected").val();
            $.ajax({
                type: 'POST',
                url: '/delivery/states',
                dataType: 'json',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "state_id": state_id,
                },

                success: function(data) {

                    var html= ``;
                    $.each(data,function(i,v){
                        html+= `
                    <option data-charges="${v.delivery_charges}" value="${v.id}">${v.town_code}-${v.town_name}</option>

                        `;
                    });
                    $('#towns').html(html);


                }
            });
        });
        $('#towns').change(function(){
            var delivery_charges = $("#towns option:selected").data('charges');
            $('#delivery_charges').val(delivery_charges);
        });

        //begin

        function showRelatedSubCategoryFr(value) {

            console.log(value);

            $('#subcategory').prop("disabled", false);

            var category_id = value;
            var from_id = $("#saleFromWarehouse option:selected").val();
            $('#subcategory').empty();

            $.ajax({
                type: 'POST',
                url: '/showSubCategoryFrom',
                dataType: 'json',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "category_id": category_id,
                    "from_id": from_id,
                },

                success: function(data) {

                    console.log(data);
                    $('#subcategory').append($('<option>').text('Select Subcategory'));
                    $.each(data, function(i, value) {

                        $('#subcategory').append($('<option>').text(value.name).attr('value', value
                        .id));
                    });
                }
            });
        }

        function showRelatedBrandFr(value) {
            var subcategory_id = value;
            $('#also_brand').empty();
            var from_id = $("#saleFromWarehouse option:selected").val();
            $.ajax({
                type: 'POST',
                url: '/showBrandFrom',
                dataType: 'json',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "subcategory_id": subcategory_id,
                    "from_id": from_id,
                },

                success: function(data) {

                    console.log(data);
                    $('#also_brand').append($('<option>').text('Select Brand'));

                    $.each(data, function(i, value) {

                        $('#also_brand').append($('<option>').text(value.name).attr('value', value.id));
                    });
                }
            });
        }

        function showRelatedTypeFr(value) {
            var subcategory_id = $('#subcategory').val();
            var brand_id = value;
            var from_id = $('#saleFromWarehouse option:selected').val();


            $('#also_type').empty();

            $.ajax({
                type: 'POST',
                url: '/showTypeFrom',
                dataType: 'json',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "subcategory_id": subcategory_id,
                    "brand_id": brand_id,
                    "from_id": from_id,
                },

                success: function(data) {

                    console.log(data);

                    if (data.length == 0) {
                        $('#also_type').append($('<option>').text("No Found"));
                    } else {
                        $('#also_type').append($('<option>').text("Select Type"));
                        $.each(data, function(i, value) {
                            $('#also_type').append($('<option>').text(value.name).attr('value', value
                                .id));
                        });
                    }
                }

            });

        }

        function showRelatedItemList(value) {

            $('#item').empty();

            console.log(value);

            var type_id = value;

            var brand_id = $('#also_brand').val();

            var from_id = $('#from_id').val();
            console.log(from_id);


            $.ajax({
                type: 'POST',
                url: '/filterItem',
                dataType: 'json',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "type_id": type_id,
                    "brand_id": brand_id,
                    "from_id": from_id,
                },

                success: function(data) {

                    console.log(data);

                    var html = "";

                    $.each(data, function(i, v) {

                        var url1 = '{{ route('count_unit_list', ':item_id') }}';
                        url1 = url1.replace(':item_id', v.id);


                        var url2 = '{{ route('unit_relation_list', ':item_id') }}';

                        url2 = url2.replace(':item_id', v.id);

                        var item_path1 = '{{ asset('/photo/Item/' . 'item_photo_path') }}';

                        item_path1 = item_path1.replace('item_photo_path', v.photo_path);

                        html += `
                            <tr>
                            <td>${v.item_code}</td>
                            <td>${v.item_name}</td>
                            <td> <img src="${item_path1}" class="img-rounded" width="100" height="70" /></td>
                            <td class="text-center"> <button style="border-radius: 8px" class="btn bbluecolor text-white" onclick="getCountingUnit(${v.id})"><i class="fas fa-plus"></i>Sale</button></td>

                            </tr>`

                        $('#all').html(html);
                    });

                }

            });

        }

        //end

        function QRcodeTest(value) {

            let sale_type = $("#price_type").val();

            $.ajax({

                type: 'POST',

                url: '/getCountingUnitsByItemCode',

                data: {
                    "_token": "{{ csrf_token() }}",
                    "unit_code": value,
                },

                success: function(data) {

                    var item_name = data.item.item_name;

                    var id = data.id;

                    var name = data.unit_name;

                    var qty = parseInt(data.current_quantity);

                    if (sale_type == 1) {

                        var price = data.normal_sale_price;

                    } else if (sale_type == 2) {

                        var price = data.normal_sale_price;

                    } else {

                        var price = data.order_price;

                    }

                    swal("Please Enter Quantity:", {
                            content: "input",
                        })

                        .then((value) => {


                            if (value.toString().match(/^\d+$/)) {
                                if (value === qty) {

                                    swal({
                                        title: "Can't Add",
                                        text: "Your Input is higher than Current Quantity!",
                                        icon: "info",
                                    });

                                } else {

                                    var total_price = price * value;

                                    var item = {
                                        id: id,
                                        item_name: item_name,
                                        unit_name: name,
                                        qty_dose: 1,
                                        duration: 1,
                                        dose: 1,
                                        total: 1,
                                        selling_price: 0
                                    };

                                    var total_amount = {
                                        sub_total: total_price,
                                        total_qty: value
                                    };

                                    var mycart = localStorage.getItem('mycart');

                                    var grand_total = localStorage.getItem('grandTotal');

                                    if (mycart == null) {

                                        mycart = '[]';

                                        var mycartobj = JSON.parse(mycart);

                                        mycartobj.push(item);

                                        localStorage.setItem('mycart', JSON.stringify(mycartobj));

                                    } else {

                                        var mycartobj = JSON.parse(mycart);

                                        var hasid = false;

                                        $.each(mycartobj, function(i, v) {

                                            if (v.id == id) {
                                                alert('qrcode');
                                                // hasid = true;

                                                // v.order_qty = parseInt(value) + parseInt(v
                                                //     .order_qty);
                                            }
                                        })

                                        if (!hasid) {

                                            mycartobj.push(item);
                                        }

                                        localStorage.setItem('mycart', JSON.stringify(mycartobj));
                                    }

                                    if (grand_total == null) {

                                        localStorage.setItem('grandTotal', JSON.stringify(total_amount));

                                    } else {

                                        var grand_total_obj = JSON.parse(grand_total);

                                        grand_total_obj.sub_total = 0 + grand_total_obj.sub_total;

                                        grand_total_obj.total_qty = 0 + parseInt(
                                            grand_total_obj.total_qty);

                                        localStorage.setItem('grandTotal', JSON.stringify(grand_total_obj));
                                    }

                                    showmodal();

                                    $("#qr_code").val("");
                                }
                            } else {
                                swal({
                                    title: "Input Invalid",
                                    text: "Please only type english digit for quantity!",
                                    icon: "info",
                                });
                            }

                        })
                }

            });
        }


        //admin choose
        function showRelatedFromItemNoPsw(value) {


            $('#all').empty();


            var from_id = value;
            console.log(value);

            $.ajax({
                type: 'POST',
                url: '/showRelatedFromItemNoPsw',
                dataType: 'json',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "from_id": from_id,
                },


                success: function(data) {
                    console.log("itemsbrandtype" + data[1]);
                    var html = '';
                    $.each(data[0], function(i, v) {
                        var category;
                        var subcategory;
                        var brand;
                        var type;

                        $.each(data[1], function(i, val) {
                            if (val.id == v.id) {
                                category = val.category.category_name;
                                subcategory = val.sub_category.name;
                                brand = val.brand.name;
                                type = val.type.name;
                            }
                        });

                        var url1 = '{{ asset('/photo/Item/' . ':photo_path') }}';
                        url1 = url1.replace(':photo_path', v.photo_path);

                        html += `
                                    <tr>
                                        <td>${v.item_code}</td>
                                        <td>${v.item_name} (${type}) (${brand})</td>
                                        <td>
                                            <img src="${url1}" class="img-rounded" width="100" height="70" />
                                        </td>
                                        <td class="text-center">
                                            <button style="border-radius:8px" class="btn bbulecolor text-white" onclick="getCountingUnit(${v.id})"><i class="fas fa-plus"></i>Sale</i>
                                        </td>
                                    </tr>
                        `;

                        $('#all').html(html);
                    });
                }

            });

        }

        function getCountingUnit(item_id) {

            var html = "";

            $.ajax({

                type: 'POST',

                url: '/getCountingUnitsByItemId',

                data: {
                    "_token": "{{ csrf_token() }}",
                    "item_id": item_id,

                },

                success: function(data) {

                    console.log(data);
                    $.each(data, function(i, unit) {
                        var itemNamebrand = unit.item.item_name;
                        // console.log(unit);
                        $('#item_name').val(itemNamebrand);

                        html += `<tr class="text-center">
                            <input type="hidden" id="qty_${unit.id}" value="${unit.stock_qty}">
                            <input type="hidden" id="price_${unit.id}" value="${unit.normal_sale_price}">
                                <td>${itemNamebrand}</td>
                                <td id="name_${unit.id}">${unit.unit_name}</td>
                                <td><button style="border-radius:8px" class="btn bbluecolor text-white" onclick="tgPanel(${unit.id})" ><i class="fas fa-plus"></i> Add</button></td>
                          </tr>`;
                    });

                    $("#count_unit").html(html);

                    $("#unit_table_modal").modal('show');
                }

            });
        }


        function getDocotorService(doctor_id) {

            $('#doctor_idid').val(doctor_id);

            var html = "";

            $.ajax({

                type: 'POST',

                url: '/doctor/services',

                data: {
                    "_token": "{{ csrf_token() }}",
                    "doctor_id": doctor_id,

                },

                success: function(data) {
                    $.each(data, function(i, service) {
                        // var itemNamebrand= unit.item.item_name +'('+unit.item.brand.name+')'+'('+unit.item.type.name+')';
                        // <input type="hidden" id="qty_${service.id}" value="${unit.stock_qty}">
                        html += `<tr class="text-center">

                    <input type="hidden" id="servicecharges_${service.id}" value="${service.charges}">
                        <td id="servicename_${service.id}">${service.name}</td>
                        <td>${service.charges}</td>
                        <td>
                            <input id="form-check-input" type="checkbox" class="styled" value="${service.id}" checked>
                        </td>

                  </tr>

                  `;
                    });

                    var addServiceBtn = `
            <div class="float-right row">
                <i class="btn btn-primary" onclick="addDoctorService()" ><i class="fas fa-plus"></i> Add</i>

            </div>
            `;
                    $("#doctor_services_modal_tbody").html(html);
                    $("#doctor_services_modal_tbody").append(addServiceBtn);

                    $("#doctor_services_modal").modal('show');
                }

            });
        }

        function addDoctorService(id) {
            var doctor_id= $('#doctor_idid').val();
            var checkedIds = [];
            $(':checkbox:checked').each(function(i) {
                checkedIds[i] = $(this).val();
            })

            $.each(checkedIds, function(k, ckeckedId) {
                var servicename = $('#servicename_' + ckeckedId).text();
                var servicecharges_check = $('#servicecharges_' + ckeckedId).val();

                var qty_check = 1;

                var qty = parseInt(qty_check);

                var price = parseInt(servicecharges_check);

                if (price == "") {
                    Swal.fire({
                        title: "Please Check",
                        text: "Please Select Price To Sell",
                        icon: "info",
                    });
                } else {


                    var total_price = price * qty;
                    var item = {
                        id: ckeckedId,
                        doctor_id:doctor_id,
                        name: servicename,
                        qty: qty,
                        charges: price
                    };
                    console.log(item);
                    var total_amount = {
                        sub_total: total_price,
                        total_qty: qty
                    };
                    var docService_cart = localStorage.getItem('docServiceCart');
                    var docService_cartobjtest = JSON.parse(docService_cart);

                    var docService_grandTotal = localStorage.getItem('docServiceGrandTotal');
                    var docService_cartobjtest = JSON.parse(docService_grandTotal);


                    if (docService_cartobjtest == null) {
                        console.log('null');
                        docService_cart = '[]';

                        var docService_cartobj = JSON.parse(docService_cart);

                        docService_cartobj.push(item);

                        localStorage.setItem('docServiceCart', JSON.stringify(docService_cartobj));

                    } else {

                        var docService_cartobj = JSON.parse(docService_cart);

                        var hasid = false;
                        var value =1;
                        $.each(docService_cartobj, function(m, docService) {
                          console.log("local"+docService.id +"net"+id);
                            if (docService.id == id) {

                                hasid = true;

                                docService.qty = parseInt(value) + parseInt(docService.qty);
                            }
                        })

                        if (!hasid) {

                            docService_cartobj.push(item);
                        }

                        localStorage.setItem('docServiceCart', JSON.stringify(docService_cartobj));
                    }

                    if (docService_cartobjtest == null) {

                        localStorage.setItem('docServiceGrandTotal', JSON.stringify(total_amount));

                    } else {
                        var value =1;

                        var docService_grandTotal_obj = JSON.parse(docService_grandTotal);

                        docService_grandTotal_obj.sub_total = total_price + docService_grandTotal_obj.sub_total;

                        docService_grandTotal_obj.total_qty = parseInt(value) + parseInt(docService_grandTotal_obj.total_qty);

                        localStorage.setItem('docServiceGrandTotal', JSON.stringify(docService_grandTotal_obj));
                    }

                }
            });
            $("#doctor_services_modal").modal('hide');

            showmodal();

        }


        function tgPanel(id) {

            var item_name = $('#item_name').val();
            console.log(item_name);
            var name = $('#name_' + id).text();
            var item = {
                id: id,
                item_name: item_name,
                unit_name: name,
                qty_dose: 1,
                duration: 1,
                dose: 1,
                total: 0,
                selling_price: 0,
                look_procedure:0
            };
            console.log(item);
            var total_amount = {
                sub_total: 0,
                total_qty: 0
            };

            var mycart = localStorage.getItem('mycart');

            var grand_total = localStorage.getItem('grandTotal');
            var mycartobjtest = JSON.parse(mycart);
            var grand_totaltest = JSON.parse(grand_total);

            //console.log(item);

            if (mycartobjtest == null) {

                mycart = '[]';

                var mycartobj = JSON.parse(mycart);

                mycartobj.push(item);

                localStorage.setItem('mycart', JSON.stringify(mycartobj));

            } else {

                var mycartobj = JSON.parse(mycart);

                var hasid = false;

                $.each(mycartobj, function(i, v) {

                    if (v.id == id) {
                    hasid = true;
                        swal({
                                title: "Already Added",
                                text: "This medicine is already added!",
                                icon: "info",
                            });
                    }
                })

                if (!hasid) {

                    mycartobj.push(item);
                }

                localStorage.setItem('mycart', JSON.stringify(mycartobj));
            }

            if (grand_totaltest == null) {

                localStorage.setItem('grandTotal', JSON.stringify(total_amount));

            } else {

                var grand_total_obj = JSON.parse(grand_total);

                grand_total_obj.sub_total = 0 + grand_total_obj.sub_total;

                grand_total_obj.total_qty = 0 + parseInt(grand_total_obj.total_qty);

                localStorage.setItem('grandTotal', JSON.stringify(grand_total_obj));
            }

            $("#unit_table_modal").modal('hide');

            showmodal();


        }

        function tgService(id) {

            var serviceOrpackage = $("#serviceor option:selected").val();

            var name = $('#serName_' + id).text();

            var item_price_check = $('#serCharges_' + id).val();

            var price = parseInt(item_price_check);

            if (item_price_check == "") {

                Swal.fire({
                    title: "Please Check",
                    text: "Please Select Price To Sell",
                    icon: "info",
                });
            } else {

                swal("Please Enter Quantity:", {
                        content: "input",
                    })
                    .then((value) => {
                        if (value.toString().match(/^\d+$/)) {
                            if (value) {

                                var total_price = price * value;
                                if(serviceOrpackage=="service"){
                                    var ser_pac='service';
                                }else{
                                    var ser_pac="package";
                                }
                                var item = {
                                    id: id,
                                    type:ser_pac,
                                    service_name: name,
                                    qty: value,
                                    charges: price
                                };
                                var total_amount = {
                                    sub_total: total_price,
                                    total_qty: value
                                };
                                var mycart = localStorage.getItem('pagServiceCart');

                                var grand_total = localStorage.getItem('pagServicegrandTotal');
                                var mycartobjtest = JSON.parse(mycart);
                                var grand_totaltest = JSON.parse(grand_total);

                                //console.log(item);

                                if (mycartobjtest == null) {

                                    mycart = '[]';

                                    var mycartobj = JSON.parse(mycart);

                                    mycartobj.push(item);

                                    localStorage.setItem('pagServiceCart', JSON.stringify(mycartobj));

                                } else {

                                    var mycartobj = JSON.parse(mycart);

                                    var hasid = false;

                                    $.each(mycartobj, function(i, v) {

                                        if (v.id == id) {
                                            hasid = true;
                                                swal({
                                                        title: "Already Added",
                                                        text: "This medicine is already added!",
                                                        icon: "info",
                                                    });
                                        }
                                    })

                                    if (!hasid) {

                                        mycartobj.push(item);
                                    }

                                    localStorage.setItem('pagServiceCart', JSON.stringify(mycartobj));
                                }

                                if (grand_totaltest == null) {

                                    localStorage.setItem('pagServicegrandTotal', JSON.stringify(total_amount));

                                } else {

                                    var grand_total_obj = JSON.parse(grand_total);

                                    grand_total_obj.sub_total = 0 + grand_total_obj.sub_total;

                                    grand_total_obj.total_qty = 0 + parseInt(grand_total_obj.total_qty);

                                    localStorage.setItem('pagServicegrandTotal', JSON.stringify(grand_total_obj));
                                }

                                showmodal();
                            }
                        } else {
                            swal({
                                title: "Input Invalid",
                                text: "Please only input english digit",
                                icon: "info",
                            });
                        }
                    })

            }

        }

        function plus(id, type) {
            count_change(id, 'plus', 1,type);
        }

        function minus(id, type) {
            count_change(id, 'minus', 1, type);
        }

        function remove(id, qty,type) {
            count_change(id, 'remove', qty, type)
        }

        function count_change(id, action, qty, type) {
            if(type=='medicine'){

                var grand_total = localStorage.getItem('grandTotal');

                var mycart = localStorage.getItem('mycart');

                var mycartobj = JSON.parse(mycart);

                var grand_total_obj = JSON.parse(grand_total);

                var item = mycartobj.filter(item => item.id == id);

                if (action == 'plus') {

                        if (item[0].order_qty == item[0].current_qty) {

                            swal({
                                title: "Can't Add",
                                text: "Can't Added Anymore!",
                                icon: "info",
                            });

                            $('#btn_plus_' + item[0].id).attr('disabled', 'disabled');
                            } else {

                            item[0].order_qty++;

                            grand_total_obj.sub_total += parseInt(item[0].selling_price);

                            grand_total_obj.total_qty++;

                            localStorage.setItem('mycart', JSON.stringify(mycartobj));

                            localStorage.setItem('grandTotal', JSON.stringify(grand_total_obj));

                            count_item('medicine');

                            showmodal();

                            }




                } else if (action == 'minus') {

                    if (item[0].order_qty == 1) {

                        //var ans=confirm('Are you sure');

                        swal({
                            title: "Are you sure?",
                            text: "The item will be remove from cart list",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonColor: '#DD6B55',
                            confirmButtonText: 'Yes',
                            cancelButtonText: "No",
                            closeOnConfirm: false,
                            closeOnCancel: false
                        }).then(
                            function(isConfirm) {
                                if (isConfirm) {

                                    let item_cart = mycartobj.filter(item => item.id !== id);

                                    grand_total_obj.sub_total -= parseInt(item[0].selling_price);

                                    grand_total_obj.total_qty--;

                                    localStorage.setItem('mycart', JSON.stringify(item_cart));

                                    localStorage.setItem('grandTotal', JSON.stringify(grand_total_obj));

                                    count_item('medicine');

                                    showmodal();

                                } else {

                                    item[0].order_qty;

                                    localStorage.setItem('mycart', JSON.stringify(mycartobj));

                                    localStorage.setItem('grandTotal', JSON.stringify(grand_total_obj));

                                    count_item('medicine');

                                    showmodal();
                                }
                            });



                    } else {

                        item[0].order_qty--;

                        grand_total_obj.sub_total -= parseInt(item[0].selling_price);

                        grand_total_obj.total_qty--;

                        localStorage.setItem('mycart', JSON.stringify(mycartobj));

                        localStorage.setItem('grandTotal', JSON.stringify(grand_total_obj));

                        count_item('medicine');

                        showmodal();
                    }
                } else if (action == 'remove') {
                    //var ans=confirm('Are you sure?');

                    swal({
                        title: "Are you sure?",
                        text: "The item will be remove from cart list",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: '#DD6B55',
                        confirmButtonText: 'Yes',
                        cancelButtonText: "No",
                        closeOnConfirm: false,
                        closeOnCancel: false
                    }).then(
                        function(isConfirm) {

                            if (isConfirm) {
                                let item_cart = mycartobj.filter(item => item.id !== id);

                                grand_total_obj.sub_total = grand_total_obj.sub_total - (parseInt(item[0].selling_price) *
                                    qty);

                                grand_total_obj.total_qty = grand_total_obj.total_qty - qty;

                                localStorage.setItem('mycart', JSON.stringify(item_cart));

                                localStorage.setItem('grandTotal', JSON.stringify(grand_total_obj));

                                count_item('medicine');

                                showmodal();

                            } else {
                                item[0].order_qty;

                                localStorage.setItem('mycart', JSON.stringify(mycartobj));

                                localStorage.setItem('grandTotal', JSON.stringify(grand_total_obj));

                                count_item('medicine');

                                showmodal();
                            }
                        });

                    // if(ans){



                    // }else{


                    // }
                }
            }
            else if(type== 'docService'){

                var doc_grand_total = localStorage.getItem('docServiceGrandTotal');

                var docServiceCart = localStorage.getItem('docServiceCart');

                var docServiceCartobj = JSON.parse(docServiceCart);

                var doc_grand_total_obj = JSON.parse(doc_grand_total);

                var item = docServiceCartobj.filter(item => item.id == id);

                if (action == 'plus') {

                    item[0].qty++;

                    doc_grand_total_obj.sub_total += parseInt(item[0].charges);

                    doc_grand_total_obj.total_qty++;

                    localStorage.setItem('docServiceCart', JSON.stringify(docServiceCartobj));

                    localStorage.setItem('docServiceGrandTotal', JSON.stringify(doc_grand_total_obj));

                    count_item('docService');

                    showmodal();

                } else if (action == 'minus')
                {

                    if (item[0].qty == 1) {

                        //var ans=confirm('Are you sure');

                        swal({
                            title: "Are you sure?",
                            text: "This Doctor Service will be remove from cart list",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonColor: '#DD6B55',
                            confirmButtonText: 'Yes',
                            cancelButtonText: "No",
                            closeOnConfirm: false,
                            closeOnCancel: false
                        }).then(
                            function(isConfirm) {
                                if (isConfirm) {

                                    let item_cart = docServiceCartobj.filter(item => item.id !== id);

                                    doc_grand_total_obj.sub_total -= parseInt(item[0].charges);

                                    doc_grand_total_obj.total_qty--;

                                    localStorage.setItem('docServiceCart', JSON.stringify(item_cart));

                                    localStorage.setItem('docServiceGrandTotal', JSON.stringify(doc_grand_total_obj));

                                    count_item('docService');

                                    showmodal();

                                } else {

                                    item[0].qty;

                                    localStorage.setItem('docServiceCart', JSON.stringify(docServiceCartobj));

                                    localStorage.setItem('docServiceGrandTotal', JSON.stringify(doc_grand_total_obj));

                                    count_item('pagService');

                                    showmodal();
                                }
                            });



                    } else {

                        item[0].qty--;

                        doc_grand_total_obj.sub_total -= parseInt(item[0].selling_price);

                        doc_grand_total_obj.total_qty--;

                        localStorage.setItem('docServiceCart', JSON.stringify(docServiceCartobj));

                        localStorage.setItem('docServiceGrandTotal', JSON.stringify(doc_grand_total_obj));

                        count_item('pagService');

                        showmodal();
                    }
                } else if (action == 'remove') {
                    //var ans=confirm('Are you sure?');

                    swal({
                        title: "Are you sure?",
                        text: "This Doctor Service will be remove from cart list",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: '#DD6B55',
                        confirmButtonText: 'Yes',
                        cancelButtonText: "No",
                        closeOnConfirm: false,
                        closeOnCancel: false
                    }).then(
                        function(isConfirm) {

                            if (isConfirm) {
                                let item_cart = docServiceCartobj.filter(item => item.id != id);

                                doc_grand_total_obj.sub_total = doc_grand_total_obj.sub_total - (parseInt(item[0].charges) *
                                    qty);

                                doc_grand_total_obj.total_qty = doc_grand_total_obj.total_qty - qty;

                                localStorage.setItem('docServiceCart', JSON.stringify(item_cart));

                                localStorage.setItem('docServiceGrandTotal', JSON.stringify(doc_grand_total_obj));

                                count_item('docService');

                                showmodal();

                            } else {
                                item[0].qty;

                                localStorage.setItem('docServiceCart', JSON.stringify(docServiceCartobj));

                                localStorage.setItem('docServiceGrandTotal', JSON.stringify(doc_grand_total_obj));

                                count_item('docService');

                                showmodal();
                            }
                        });

                    // if(ans){



                    // }else{


                    // }
                }
            }
            else if (type == 'pagService' )
            {
                var pagSer_grand_total = localStorage.getItem('pagServicegrandTotal');

                var pagServiceCart = localStorage.getItem('pagServiceCart');

                var pagServiceCartobj = JSON.parse(pagServiceCart);

                var pagSer_grand_total_obj = JSON.parse(pagSer_grand_total);

                var item = pagServiceCartobj.filter(item => item.id == id);
                if (action == 'plus') {
                    item[0].qty++;

                    pagSer_grand_total_obj.sub_total += parseInt(item[0].charges);

                    pagSer_grand_total_obj.total_qty++;

                    localStorage.setItem('pagServiceCart', JSON.stringify(pagServiceCartobj));

                    localStorage.setItem('pagServicegrandTotal', JSON.stringify(pagSer_grand_total_obj));

                    count_item('pagService');

                    showmodal();

                } else if (action == 'minus') {

                    if (item[0].qty == 1) {

                        //var ans=confirm('Are you sure');

                        swal({
                            title: "Are you sure?",
                            text: "The Service/Package will be removed from cart list",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonColor: '#DD6B55',
                            confirmButtonText: 'Yes',
                            cancelButtonText: "No",
                            closeOnConfirm: false,
                            closeOnCancel: false
                        }).then(
                            function(isConfirm) {
                                if (isConfirm) {

                                    let item_cart = pagServiceCartobj.filter(item => item.id !== id);

                                    pagSer_grand_total_obj.sub_total -= parseInt(item[0].charges);

                                    pagSer_grand_total_obj.total_qty--;

                                    localStorage.setItem('pagServiceCart', JSON.stringify(item_cart));

                                    localStorage.setItem('pagServicegrandTotal', JSON.stringify(pagSer_grand_total_obj));

                                    count_item('pagService');

                                    showmodal();

                                } else {

                                    item[0].qty;

                                    localStorage.setItem('pagServiceCart', JSON.stringify(pagServiceCartobj));

                                    localStorage.setItem('pagServicegrandTotal', JSON.stringify(pagSer_grand_total_obj));

                                    count_item('pagService');

                                    showmodal();
                                }
                            });



                    } else {

                        item[0].qty--;

                        pagSer_grand_total_obj.sub_total -= parseInt(item[0].charges);

                        pagSer_grand_total_obj.total_qty--;

                        localStorage.setItem('pagServiceCart', JSON.stringify(pagServiceCartobj));

                        localStorage.setItem('pagServicegrandTotal', JSON.stringify(pagSer_grand_total_obj));

                        count_item('pagService');

                        showmodal();
                    }
                } else if (action == 'remove') {
                    //var ans=confirm('Are you sure?');

                    swal({
                        title: "Are you sure?",
                        text: "This Service/Package will be removed from cart list",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: '#DD6B55',
                        confirmButtonText: 'Yes',
                        cancelButtonText: "No",
                        closeOnConfirm: false,
                        closeOnCancel: false
                    }).then(
                        function(isConfirm) {

                            if (isConfirm) {
                                let item_cart = pagServiceCartobj.filter(item => item.id !== id);

                                pagSer_grand_total_obj.sub_total = pagSer_grand_total_obj.sub_total - (parseInt(item[0].charges) *
                                    qty);

                                pagSer_grand_total_obj.total_qty = pagSer_grand_total_obj.total_qty - qty;

                                localStorage.setItem('pagServiceCart', JSON.stringify(item_cart));

                                localStorage.setItem('pagServicegrandTotal', JSON.stringify(pagSer_grand_total_obj));

                                count_item('pagService');

                                showmodal();

                            } else {
                                item[0].qty;

                                localStorage.setItem('pagServiceCart', JSON.stringify(pagServiceCartobj));

                                localStorage.setItem('pagServicegrandTotal', JSON.stringify(pagSer_grand_total_obj));

                                count_item('pagService');

                                showmodal();
                            }
                        });

                    // if(ans){



                    // }else{


                    // }
                }
            }


        }

        function local_customer_lists() {
            var local_customer_lists = localStorage.getItem('local_customer_lists');

            var local_customer_array = JSON.parse(local_customer_lists);

            $('.pending-voucher').empty();

            $.each(local_customer_array, function(i, v) {

                var btnpending = `

                <div class="buttonrelative mb-2">
                    <button class="btn btn-warning mx-2" data-pendingvoucherno="${v}"><i class="fas fa-arrow-alt-circle-up"></i> Customer ${v}</button>
                <p class="bg-danger text-white deletevoucher rounded" data-pendingvoucherno="${v}">x</p>
                </div>

                `;
                $('.pending-voucher').append(btnpending);
            })
        }

        function showmodal() {
            var allTotal=0;
            var allQty=0;
            $('#total_quantity').empty();
            $('#sub_total').empty();
            $('#sale').empty();
            $('#doctorSer').empty();
            $('#serVice').empty();
            var mycart = localStorage.getItem('mycart');
            var grandTotal = localStorage.getItem('grandTotal');

            var grandTotal_obj = JSON.parse(grandTotal);
            if (grandTotal_obj) {
                var mycartobj = JSON.parse(mycart);

                var html = '';
                var increNo = 1;
                if (mycartobj.length > 0) {

                    $.each(mycartobj, function(i, v) {

                        var id = v.id;

                        var item = v.item_name;

                        var qty = v.order_qty;

                        var count_name = v.unit_name;

                        html += `<tr class="text-center">
                                <td class="bluecolor font-weight-bold">${increNo++}</td>

                                <td class="bluecolor font-weight-bold">${item}</td>

                                <td class="bluecolor font-weight-bold">${count_name}</td>
                                <td></td>

                                <td><i class="bluecolor fa fa-times" onclick="remove(${id},${qty},'medicine')" id="${id}"></i> </td>
                                </tr>`;

                    });
                }
                $("#sale").html(`
                <tr>
                    <td colspan="4">
                    Medicine
                    </td>
                </tr>
                `);

                $("#sale").append(html);
             allQty+= grandTotal_obj.total_qty??0;

             allTotal+= grandTotal_obj.sub_total??0;

        }
        dshtml="";
        var docService_cart = localStorage.getItem('docServiceCart');
        console.log("showmodal"+docService_cart);
        var docService_grandTotal = localStorage.getItem('docServiceGrandTotal');

        var docService_grandTotal_obj = JSON.parse(docService_grandTotal);

        if (docService_grandTotal_obj) {
            var increNo= increNo ? increNo :1;

            var docService_cartobj = JSON.parse(docService_cart);

            var docserhtml = '';
            if (docService_cartobj.length > 0) {
                $.each(docService_cartobj, function(j, ds) {

                    dshtml += `<tr class="text-center">
                            <td class="bluecolor font-weight-bold">${increNo++}</td>

                            <td class="bluecolor font-weight-bold">${ds.name}</td>

                            <td class="bluecolor font-weight-bold"></td>

                            <td>
                                <i class="bluecolor fa fa-plus-circle btnplus" onclick="plus(${ds.id},'docService')" id="${ds.id}"></i>
                                ${ds.qty}
                                <i class="bluecolor fa fa-minus-circle btnminus"  onclick="minus(${ds.id},'docService')" id="${ds.id}"></i>
                            </td>

                            <td class="bluecolor font-weight-bold">${ds.charges}</td>
                            <td><i class="bluecolor fa fa-times" onclick="remove(${ds.id},${ds.qty},'docService')" id="${ds.id}"></i> </td>
                            </tr>`;

                });
            }
            $('#doctorSer').html(`
            <tr>
                <td colspan="4">
                Doctor Services
                </td>
            </tr>
            `
            )
            $("#doctorSer").append(dshtml);
            console.log(docService_grandTotal_obj);
            allQty+= docService_grandTotal_obj.total_qty??0;

            allTotal+= docService_grandTotal_obj.sub_total??0;


            qrSearch();
        }
        var pagService_cart = localStorage.getItem('pagServiceCart');

        var pagService_grandTotal = localStorage.getItem('pagServicegrandTotal');

        var pagService_grandTotal_obj = JSON.parse(pagService_grandTotal);

        if (pagService_grandTotal_obj) {

            var pagService_cartobj = JSON.parse(pagService_cart);
            var increNo= increNo ? increNo :1;
            var pshtml = '';
            if (pagService_cartobj.length > 0) {
                $.each(pagService_cartobj, function(l, ps) {

                    pshtml += `<tr class="text-center">
                            <td class="bluecolor font-weight-bold">${increNo++}</td>

                            <td class="bluecolor font-weight-bold">${ps.service_name}</td>

                            <td class="bluecolor font-weight-bold">${ps.type}</td>

                            <td>
                                <i class="bluecolor fa fa-plus-circle btnplus" onclick="plus(${ps.id},'pagService')" id="${ps.id}"></i>
                                ${ps.qty}
                                <i class="bluecolor fa fa-minus-circle btnminus"  onclick="minus(${ps.id},'pagService')" id="${ps.id}"></i>
                            </td>

                            <td><i class="bluecolor fa fa-times" onclick="remove(${ps.id},${ps.qty},'pagService')" id="${ps.id}"></i> </td>
                            </tr>`;

                });
            }
            $('#serVice').html(`
            <tr>
                <td colspan="4">
                Services And Package
                </td>
            </tr>
            `);
            $("#serVice").append(pshtml);
            allQty+= pagService_grandTotal_obj.total_qty??0;

            allTotal+= pagService_grandTotal_obj.sub_total??0;
            qrSearch();
        }
            $("#total_quantity").text(allQty);

            $("#sub_total").text(allTotal);
        }
        function count_item(type) {
            if(type=='medicine'){
                var mycart = localStorage.getItem('mycart');

                if (mycart) {

                    var mycartobj = JSON.parse(mycart);

                    var total_count = 0;

                    $.each(mycartobj, function(i, v) {

                        total_count += v.order_qty;

                    })

                    $(".item_count_text").html(total_count);

                } else {

                    $(".item_count_text").html(0);

                }
            }
            else if (type=='docService'){
                var mycart = localStorage.getItem('mycart');

                if (mycart) {

                    var mycartobj = JSON.parse(mycart);

                    var total_count = 0;

                    $.each(mycartobj, function(i, v) {

                        total_count += v.order_qty;

                    })

                    $(".doc_count_text").html(total_count);

                } else {

                    $(".doc_count_text").html(0);

                }
            }
            else if (type== 'pagService'){
                var mycart = localStorage.getItem('mycart');

                if (mycart) {

                var mycartobj = JSON.parse(mycart);

                var total_count = 0;

                $.each(mycartobj, function(i, v) {

                    total_count += v.order_qty;

                })

                $(".item_count_text").html(total_count);

                } else {

                $(".item_count_text").html(0);

                }
            }

        }

        function storePendingVoucher() {

            var mycart = localStorage.getItem('mycart');

            var grand_total = localStorage.getItem('grandTotal');

            var docServiceCart = localStorage.getItem('docServiceCart');

            var docServiceGrandTotal = localStorage.getItem('docServiceGrandTotal');

            var pagServiceCart = localStorage.getItem('pagServiceCart');

            var pagServicegrandTotal = localStorage.getItem('pagServicegrandTotal');

            var nextvoucherno = parseInt(pendingvoucherno) + 1;

            var now_customer = $('#now_customer').val();

            var local_customer_lists = localStorage.getItem('local_customer_lists');
            var local_last_customer_no = localStorage.getItem('last_customer_no');
            if (!mycart && !docServiceCart && !pagServiceCart) {

                swal({
                    title: "Please Check",
                    text: "Item Cannot be Empty to Store Voucher",
                    icon: "info",
                });

            } else {

                if (now_customer == 0) {
                    // 0 means new customer

                    var last_customer_no = JSON.parse(local_last_customer_no);
                    var local_customer_obj = JSON.parse(local_customer_lists);

                    if (local_customer_obj) {
                        // console.log("not null ="+local_customer_obj.length);
                        // console.log("not nullllllll");
                        if (!local_customer_obj.length == 0) {
                            var pendingvoucherno = last_customer_no + 1;
                        } else {
                            var pendingvoucherno = 1;
                        }
                    } else {
                        // console.log("in null"+local_customer_obj);
                        var pendingvoucherno = 1;
                        var local_customer_obj = [];
                    }

                    localStorage.setItem('last_customer_no', JSON.stringify(pendingvoucherno));
                    local_customer_obj.push(parseInt(pendingvoucherno));
                    localStorage.setItem('local_customer_lists', JSON.stringify(local_customer_obj));
                    var cartname = "mycart_" + pendingvoucherno;
                    var grand_totalname = "grandTotal_" + pendingvoucherno;

                    var docServiceCartName = "docServiceCart_" + pendingvoucherno;
                    var docServiceGrandTotalName = "docServiceGrandTotal_" + pendingvoucherno;
                    var pagServiceCartName = "pagServiceCart_" + pendingvoucherno;
                    var pagServicegrandTotalName = "pagServicegrandTotal_" + pendingvoucherno;

                    var btnpending = `
                <div class="buttonrelative mb-2">
                    <button class="btn btn-warning mx-2" data-pendingvoucherno="${pendingvoucherno}"><i class="fas fa-arrow-alt-circle-up"></i> Customer ${pendingvoucherno}</button>
                <p class="bg-danger text-white deletevoucher rounded" data-pendingvoucherno="${pendingvoucherno}">x</p>
                </div>

                `;
                    $('.pending-voucher').append(btnpending);
                } else {
                    var cartname = "mycart_" + now_customer;
                    var grand_totalname = "grandTotal_" + now_customer;
                    var docServiceCartName = "docServiceCart_" + now_customer;
                    var docServiceGrandTotalName = "docServiceGrandTotal_" + now_customer;
                    var pagServiceCartName = "pagServiceCart_" + now_customer;
                    var pagServicegrandTotalName = "pagServicegrandTotal_" + now_customer;

                }
                localStorage.setItem(cartname, mycart);
                localStorage.setItem(grand_totalname, grand_total);

                localStorage.setItem(docServiceCartName, docServiceCart);
                localStorage.setItem(docServiceGrandTotalName, docServiceGrandTotal);
                localStorage.setItem(pagServiceCartName, pagServiceCart);
                localStorage.setItem(pagServicegrandTotalName, pagServicegrandTotal);

                localStorage.removeItem('mycart');
                localStorage.removeItem('grandTotal');
                localStorage.removeItem('docServiceCart');
                localStorage.removeItem('docServiceGrandTotal');
                localStorage.removeItem('pagServiceCart');
                localStorage.removeItem('pagServicegrandTotal');

                $('.now_customer').hide();
                $('#now_customer').val(0);
                $('#total_quantity').empty();
                $('#sub_total').empty();
                $('#sale').empty();
                $('#doctorSer').empty();
                $('#serVice').empty();
                showmodal();

            }

        }


        $('.pending-voucher').on('click', '.buttonrelative .deletevoucher', function() {
            var now_customer = $('#now_customer').val();
            var pendingvoucherno = $(this).data('pendingvoucherno');
            var cartname = "mycart_" + pendingvoucherno;
            var grand_totalname = "grandTotal_" + pendingvoucherno;

            var docServiceCartName = "docServiceCart_" + pendingvoucherno;
            var docServiceGrandTotalName = "docServiceGrandTotal_" + pendingvoucherno;
            var pagServiceCartName = "pagServiceCart_" + pendingvoucherno;
            var pagServicegrandTotalName = "pagServicegrandTotal_" + pendingvoucherno;

            var local_customer = localStorage.getItem('local_customer_lists');
            var local_customer_array = JSON.parse(local_customer);
            $.each(local_customer_array, function(i, v) {
                if (v == pendingvoucherno) {
                    local_customer_array.splice(i, 1);
                }
            })
            localStorage.setItem('local_customer_lists', JSON.stringify(local_customer_array));
            localStorage.removeItem(cartname);
            localStorage.removeItem(grand_totalname);

            localStorage.removeItem(docServiceCartName);
            localStorage.removeItem(docServiceGrandTotalName);
            localStorage.removeItem(pagServiceCartName);
            localStorage.removeItem(pagServicegrandTotalName);

            if (now_customer == pendingvoucherno) {
                localStorage.removeItem('mycart');
                localStorage.removeItem('grandTotal');

                localStorage.removeItem('docServiceCart');
                localStorage.removeItem('docServiceGrandTotal');
                localStorage.removeItem('pagServiceCart');
                localStorage.removeItem('pagServicegrandTotal');

                $('.now_customer').hide();
                $('#now_customer').val(0);
                $('#total_quantity').empty();
                $('#sub_total').empty();
                $('#sale').empty();
                $('#doctorSer').empty();
                $('#serVice').empty();
            }

            local_customer_lists();
            showmodal();


        });


        $('.pending-voucher').on('click', '.buttonrelative button', function() {

            var pendingvoucherno = $(this).data('pendingvoucherno');

            $('#now_customer').val(pendingvoucherno);
            $('#now_customer_no').text(pendingvoucherno);
            $('.now_customer').show();
            var cartname = "mycart_" + pendingvoucherno;
            var grand_totalname = "grandTotal_" + pendingvoucherno;

            var docServiceCartName = "docServiceCart_" + pendingvoucherno;
            var docServiceGrandTotalName = "docServiceGrandTotal_" + pendingvoucherno;
            var pagServiceCartName = "pagServiceCart_" + pendingvoucherno;
            var pagServicegrandTotalName = "pagServicegrandTotal_" + pendingvoucherno;

            var mycart_pending_vocher = localStorage.getItem(cartname);

            var grand_total_pending_voucher = localStorage.getItem(grand_totalname);

            var docServiceCartNamepending=    localStorage.getItem(docServiceCartName);
            var docServiceGrandTotalNamepending=     localStorage.getItem(docServiceGrandTotalName);
            var pagServiceCartNamepending=   localStorage.getItem(pagServiceCartName);
            var pagServicegrandTotalNamepending=   localStorage.getItem(pagServicegrandTotalName);


            localStorage.setItem('mycart', mycart_pending_vocher);
            localStorage.setItem("grandTotal", grand_total_pending_voucher);

            localStorage.setItem("docServiceCart", docServiceCartNamepending);
            localStorage.setItem("docServiceGrandTotal", docServiceGrandTotalNamepending);
            localStorage.setItem("pagServiceCart", pagServiceCartNamepending);
            localStorage.setItem("pagServicegrandTotal", pagServicegrandTotalNamepending);

            showmodal();

        })

        function showCheckOut() {

            // mycart
            // grandTotal
            // docServiceCart
            // docServiceGrandTotal

            // pagServiceCart
            // pagServicegrandTotal


            var mycart = localStorage.getItem('mycart');

            var grand_total = localStorage.getItem('grandTotal');

            var docServiceCart = localStorage.getItem('docServiceCart');

            var docServiceGrandTotal = localStorage.getItem('docServiceGrandTotal');

            var pagServiceCart = localStorage.getItem('pagServiceCart');

            var pagServicegrandTotal = localStorage.getItem('pagServicegrandTotal');

            var now_customer = $('#now_customer').val();

            if (!mycart && !docServiceCart && !pagServiceCart) {

                swal({
                    title: "Please Check",
                    text: "Item Cannot be Empty to Check Out",
                    icon: "info",
                });

            } else {

                $("#item").attr('value', mycart);

                $("#grand").attr('value', grand_total);

                $("#docServiceItem").attr('value', docServiceCart);

                $("#docServiceGrandTotal").attr('value', docServiceGrandTotal);

                $("#pagServiceItem").attr('value', pagServiceCart);

                $("#pagServicegrandTotal").attr('value', pagServicegrandTotal);

                $('#right_now_customer').val(now_customer);

                if(!mycart){

                    $("#vourcher_page").submit();

                }
                else{

                    $('#add_delivery').modal('show');

                }
                // $("#vourcher_page").submit();

            }
        }

        function getCustomerInfo(value) {

            $.ajax({

                type: 'POST',

                url: '/getCustomerInfo',

                data: {
                    "_token": "{{ csrf_token() }}",
                    "customer_id": value,
                },

                success: function(data) {

                    $("#phone").val(data.phone);

                    $("#address").val(data.address);
                },


            });
        }

        function storeCustomerOrder() {

            var item = localStorage.getItem('mycart');

            var grand_total = localStorage.getItem('grandTotal');

            var customer_id = $('#customer_id').val();

            var phone = $('#phone').val();

            var order_date = $('#order_date').val();

            var delivered_date = $('#delivered_date').val();

            var employee = $('#employee').val();

            var address = $('#address').val();

            if (!item || !grand_total) {

                swal({
                    title: "@lang('lang.please_check')",
                    text: "@lang('lang.cannot_checkout')",
                    icon: "info",
                });

            } else {

                $.ajax({

                    type: 'POST',

                    url: '/storeCustomerOrder',

                    data: {
                        "_token": "{{ csrf_token() }}",
                        "item": item,
                        "grand_total": grand_total,
                        "customer_id": customer_id,
                        "phone": phone,
                        "address": address,
                        "order_date": order_date,
                        "delivered_date": delivered_date,
                        "employee": employee,
                    },

                    success: function(data) {

                        localStorage.clear();

                        swal({
                            title: "Success",
                            text: "Order is Successfully Stored",
                            icon: "success",
                        });

                        var url = '{{ route('voucher_order_details', ':order_id') }}';

                        url = url.replace(':order_id', data.id);

                        setTimeout(function() {
                            window.location.href = url;
                        }, 1000);
                    },

                    error: function(status) {

                        swal({
                            title: "Something Wrong!",
                            text: "Something Wrong When Store Customer Order",
                            icon: "error",
                        });
                    }
                });

            }
        }

        function showItemforAll(value) {

            $('#all').empty();

            console.log(value);

            var sub_category_id = value;

            var items = @json($items);

            var html = "";

            console.log(items);

            $.each(items, function(i, v) {

                if (v.sub_category_id == sub_category_id) {

                    var url = '{{ asset('/photo/Item/' . ':photo_path') }}';

                    url = url.replace(':photo_path', v.photo_path);

                    html += `
                            <tr>
                                        <td>${v.item_code}</td>
                                        <td>${v.item_name}</td>
                                        <td>
                                            <img src="${url}" class="img-rounded" width="100" height="70" />
                                        </td>
                                        <td class="text-center">
                                            <button style="border-radius:8px" class="btn bbluecolor text-white" onclick="getCountingUnit(${v.id})"><i class="fas fa-plus"></i>Sale</button>
                                        </td>
                                    </tr>`

                    $('#all').html(html);
                }

            });
        }

        function showItemForFrozen(value) {

            $('#frozen').empty();

            console.log(value);

            var sub_category_id = value;

            var items = @json($items);

            var html = "";

            console.log(items);

            $.each(items, function(i, v) {

                if (v.sub_category_id == sub_category_id) {

                    var url = '{{ asset('/photo/Item/' . ':photo_path') }}';

                    url = url.replace(':photo_path', v.photo_path);

                    html += `
                            <tr>
                                        <td>${v.item_code}</td>
                                        <td>${v.item_name}</td>
                                        <td>
                                            <img src="${url}" class=getCountingUnit"img-rounded" width="100" height="70" />
                                        </td>
                                        <td class="text-center">
                                            <button style="border-radius:8px" class="btn bbulecolor text-white" onclick="getCountingUnit(${v.id})"><i class="fas fa-plus"></i>Sale</button>
                                        </td>
                                    </tr>`

                    $('#frozen').html(html);
                }

            });
        }

        function showItemForDry(value) {

            $('#dry').empty();

            console.log(value);

            var sub_category_id = value;

            var items = @json($items);

            var html = "";

            console.log(items);

            $.each(items, function(i, v) {

                if (v.sub_category_id == sub_category_id) {

                    var url = '{{ asset('/photo/Item/' . ':photo_path') }}';

                    url = url.replace(':photo_path', v.photo_path);

                    html += `
                            <tr>
                                        <td>${v.item_code}</td>
                                        <td>${v.item_name}</td>
                                        <td>
                                            <img src="${url}" class="img-rounded" width="100" height="70" />
                                        </td>
                                        <td class="text-center">
                                            <button style="border-radius:8px" class="btn bbluecolor text-white" onclick="getCountingUnit(${v.id})"><i class="fas fa-plus"></i>Sale</button>
                                        </td>
                                    </tr>`

                    $('#dry').html(html);
                }

            });
        }

        function showItemForSea(value) {

            $('#sea').empty();

            console.log(value);

            var sub_category_id = value;

            var items = @json($items);

            var html = "";

            console.log(items);

            $.each(items, function(i, v) {

                if (v.sub_category_id == sub_category_id) {

                    var url = '{{ asset('/photo/Item/' . ':photo_path') }}';

                    url = url.replace(':photo_path', v.photo_path);

                    html += `
                            <tr>
                                        <td>${v.item_code}</td>
                                        <td>${v.item_name}</td>
                                        <td>
                                            <img src="${url}" class="img-rounded" width="100" height="70" />
                                        </td>
                                        <td class="text-center">
                                            <button style="border-radius:8px" class="btn bbluecolor text-white" onclick="getCountingUnit(${v.id})"><i class="fas fa-plus"></i>Sale</i>
                                        </td>
                                    </tr>`

                    $('#sea').html(html);
                }

            });
        }

        function serviceOrpackage(value){
            if(value=="service")
            {
            $.ajax({
                type: 'POST',
                url: '/ajaxservices/other-services',
                dataType: 'json',
                data: {
                    "_token": "{{ csrf_token() }}",
                },

                success: function(data) {


                var html = "";

                $.each(data,function(i, v){

                    var id = v.id;

                    var item = v.name;

                    html+=`<tr>
                        <input type="hidden" id="serCharges_${id}" value="${v.charges}">
                                <td id="serName_${id}">${item}</td>
                                <td>${v.charges}</td>
                                <td class="text-center">
                                    <button style="border-radius:8px" class="btn bbluecolor text-white" onclick="tgService onclick="tgService(${id})"><i class="fas fa-plus"></i>Add</button>
                                </td>
                            </tr>`
                });

                $("#table_2").html(html);
                }
            });
            }
            else
            {

            $.ajax({
                type: 'POST',
                url: '/ajaxpackages',
                dataType: 'json',
                data: {
                    "_token": "{{ csrf_token() }}",
                },

                success: function(data) {


                    var html = "";

                $.each(data,function(i, v){

                    var id = v.id;

                    var item = v.name;

                    html+=`  <input type="hidden" id="serCharges_${id}" value="${v.total_charges}">
                                <td id="serName_${id}">${item}</td>
                                <td>${v.total_charges}</td>
                                <td class="text-center">
                                    <button style="border-radius:8px" class="btn bbluecolor text-white" onclick="tgService(${id})"><i class="fas fa-plus"></i>Add</button>
                                </td>
                            </tr>`
                });

                $("#table_2").html(html);
                }
            });
            }
        }

        function medicineRecord(){


        localStorage.setItem('edit_medicine', 1);

        var recordAppointId = localStorage.getItem('recordAppointId');

        var url = '{{ route('appointmentRecord', ':appointment_id') }}';

        url = url.replace(':appointment_id',recordAppointId);

            window.location.href = url;
        }

        function addservices(){

            var pagServiceCart = localStorage.getItem('pagServiceCart');

            var pagServicegrandTotal = localStorage.getItem('pagServicegrandTotal');
            if (!pagServiceCart) {

                swal({
                    title: "Please Add Service",
                    text: "Item Cannot be Empty to Check Out",
                    icon: "info",
                });

            } else {
                $("#pagServ").attr('value', pagServiceCart);

                $("#pagServicegra").attr('value', pagServicegrandTotal);

                var appointmentId = localStorage.getItem('recordAppointId');

                $('#appointment_id').val(appointmentId);

                $("#addservices").submit();
        }
        }

        function showRelatedItemClinic(value) {

        $('#item').empty();


    $.ajax({
        type: 'POST',
        url: '/AjaxGetItem',
        dataType: 'json',
        data: {
            "_token": "{{ csrf_token() }}",
            "category_id": value,
        },

        success: function(data) {

            console.log(data);

            var html = "";

            $.each(data, function(i, v) {

                var url1 = '{{ route('count_unit_list', ':item_id') }}';
                url1 = url1.replace(':item_id', v.id);


                var url2 = '{{ route('unit_relation_list', ':item_id') }}';

                url2 = url2.replace(':item_id', v.id);

                var item_path1 = '{{ asset('/photo/Item/' . 'item_photo_path') }}';

                item_path1 = item_path1.replace('item_photo_path', v.photo_path);

                html += `
                <tr>
                <td>${v.item_code}</td>
                <td>${v.item_name}</td>
                <td> <img src="${item_path1}" class="img-rounded" width="100" height="70" /></td>
                <td class="text-center"> <button style="border-radius:8px" class="btn bbluecolor text-white" onclick="getCountingUnit(${v.id})"><i class="fas fa-plus"></i>Sale</button></td>

                </tr>`

                $('#all').html(html);
                });

                        }

                    });

                }

    $('#itemsearch').keyup(function(){
        var searchquery = $('#itemsearch').val();
        $.ajax({
        type: 'POST',
        url: '/searchItem',
        dataType: 'json',
        data: {
            "_token": "{{ csrf_token() }}",
            "searchquery": searchquery,
        },

        success: function(data) {

            console.log(data);

            var html = "";

            $.each(data, function(i, v) {

                var url1 = '{{ route('count_unit_list', ':item_id') }}';
                url1 = url1.replace(':item_id', v.id);


                var url2 = '{{ route('unit_relation_list', ':item_id') }}';

                url2 = url2.replace(':item_id', v.id);

                var item_path1 = '{{ asset('/photo/Item/' . 'item_photo_path') }}';

                item_path1 = item_path1.replace('item_photo_path', v.photo_path);

                html += `
                <tr>
                <td>${v.item_code}</td>
                <td>${v.item_name}</td>
                <td> <img src="${item_path1}" class="img-rounded" width="100" height="70" /></td>
                <td class="text-center"> <button style="border-radius:8px" class="btn bbluecolor text-white" onclick="getCountingUnit(${v.id})"><i class="fas fa-plus"></i>Sale</i></td>

                </tr>`

                $('#all').html(html);
                });

                        }

                    });
                })


        /*function removeProduct(productId){

            let storageProducts = JSON.parse(localStorage.getItem('mycart'));

            let products = storageProducts.filter(item =>item.id !== productId );

            localStorage.setItem('mycart', JSON.stringify(products));

            showmodal();
        }*/

    </script>

@endsection
