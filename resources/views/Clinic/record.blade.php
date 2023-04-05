@extends('master')
@section('title', 'Record')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">


                <div class="row p-2" id="doc_info">
                    <div class="col-sm-3 col-3 text-center">
                        <h5 class="page-title font-weight-bold text-info">Patient ID</h5>
                        <span class="custom-badge  status-blue" id="book_count">
                            {{ $appointment->clinic_patient->code }}</span>
                    </div>
                    
                    <div class="col-sm-3 col-3 text-center">
                        <h5 class="page-title font-weight-bold text-info">Name</h5>
                        <span class="custom-badge  status-blue" id=""> {{ $appointment->clinic_patient->name }} </span>
                    </div>
                    <div class="col-sm-3 col-3 text-center">
                        <h5 class="page-title font-weight-bold text-info">Age</h5>
                        <span class="custom-badge  status-blue" id="doc_dept">{{ $appointment->clinic_patient->age }}-y/{{ $appointment->clinic_patient->age_month}}-m</span>
                    </div>
                    <div class="col-sm-3 col-3 text-center">
                        <h5 class="page-title font-weight-bold text-info">Phone</h5>
                        <span class="custom-badge  status-blue"
                            id="doc_dept">{{ $appointment->clinic_patient->phone }}</span>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="card-body ">
            @php
                if (
                    session()
                        ->get('user')
                        ->hasRole('EmployeeC')
                ) {
                    $dNoneemployee = 'd-none';
                } else {
                    $dNoneemployee = '';
                }
            @endphp
            <form action="{{ route('storeRecordInfo') }}" class="shadow p-3" method="post">
                @csrf
                <input type="hidden" name="patient_id" value=" {{ $appointment->clinic_patient->id }}">
                <input type="hidden" name="appointment_id" value="{{ $appointment->id }}">
                @if (session()->get('user')->hasRole('EmployeeC'))



                    <div class="form-group row">
                        <label for="temperature" class="col-sm-2 offset-2 col-form-label">&deg;T</label>
                        <div class="col-sm-7">
                            <div class="row" style="margin-left: 0px">
                                <input type="text" class="form-control col-sm-7" name="temperature"
                                    value="{{ $appointmentinfo ? $appointmentinfo->body_temperature : '' }}">
                                <span class="col-sm-1 mt-2">&deg;T</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lowerpressure" class="col-sm-2 offset-2 col-form-label">BP</label>
                        <div class="col-sm-7">
                            <div class="row" style="margin-left: 0px">
                                <input type="text" class="form-control col-sm-3" name="upperpressure"
                                    value="{{ $appointmentinfo ? $appointmentinfo->bloodpressure_higher : '' }}">
                                <span class="col-sm-1 mt-2">/</span>
                                <input type="text" class="form-control col-sm-3" name="lowerpressure"
                                    value="{{ $appointmentinfo ? $appointmentinfo->bloodpressure_lower : '' }}">
                                <span class="mt-2 ml-2">mmHg</span>
                            </div>

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="oxygen" class="col-sm-2 offset-2 col-form-label">SPO<sub>2</sub></label>
                        <div class="col-sm-7">
                            <div class="row" style="margin-left: 0px">
                                <input type="text" class="form-control col-sm-7" name="oxygen"
                                    value="{{ $appointmentinfo ? $appointmentinfo->oxygen : '' }}">
                                <span class="col-sm-1 mt-2">%&nbsp;on&nbsp;air</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="weight" class="col-sm-2 offset-2 col-form-label">Body Weight</label>
                        <div class="col-sm-7">
                            <div class="row" style="margin-left: 0px">
                                <input type="text" class="form-control col-sm-3" name="weight_kg"
                                    value="{{ $appointmentinfo ? $appointmentinfo->weight_kg : '' }}">
                                <span class="col-sm-1 mt-2">kg</span>
                                <input type="text" class="form-control col-sm-3" name="weight_lb"
                                    value="{{ $appointmentinfo ? $appointmentinfo->weight_lb : '' }}">
                                <span class="mt-2 ml-2">lb</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="pr" class="col-sm-2 offset-2 col-form-label">PR</label>
                        <div class="col-sm-7">
                            <div class="row" style="margin-left: 0px">
                                <input type="text" class="form-control col-sm-7" name="pr"
                                    value="{{ $appointmentinfo ? $appointmentinfo->pr : '' }}">
                                <span class="col-sm-1 mt-2">/min</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-7 offset-5">
                        <button type="submit" class="btn bpinkcolor text-white px-3">Submit</button>
                    </div>
                @endif
                @if (session()->get('user')->hasRole('DoctorC'))
                <div class="form-group row">
                    <label for="lowerpressure" class="col-sm-2 offset-2 col-form-label">BP</label>
                    <div class="col-sm-7">
                        <div class="row" style="margin-left: 0px">
                            <input type="text" class="form-control col-sm-3" name="upperpressure"
                                value="{{ $appointmentinfo ? $appointmentinfo->bloodpressure_higher : '' }}">
                            <span class="col-sm-1 mt-2">/</span>
                            <input type="text" class="form-control col-sm-3" name="lowerpressure"
                                value="{{ $appointmentinfo ? $appointmentinfo->bloodpressure_lower : '' }}">
                            <span class="mt-2 ml-2">mmHg</span>
                        </div>

                    </div>
                </div>
                <div class="form-group row">
                    <label for="pr" class="col-sm-2 offset-2 col-form-label">PR</label>
                    <div class="col-sm-7">
                        <div class="row" style="margin-left: 0px">
                            <input type="text" class="form-control col-sm-7" name="pr"
                                value="{{ $appointmentinfo ? $appointmentinfo->pr : '' }}">
                            <span class="col-sm-1 mt-2">/min</span>
                        </div>
                    </div>
                </div>
                    <div class="form-group row">
                        <label for="complaint" class="col-sm-4 col-form-label">Complaint H/O</label>
                        <div class="col-sm-7">
                            <textarea name="complaint" class="form-control" name="complaint" cols="10"
                                rows="6">{{ $appointmentinfo ? $appointmentinfo->complaint : '' }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Physicial Examination</label>
                        <div class="col-sm-7 px-3">
                            <div class="border p-3">
                                <div class="row my-1">
                                    <div class="col-md-2">
                                        <label for="gc" class=" col-form-label">GC-</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" id="gc" class="form-control"
                                            value="{{ $appointmentinfo ? $appointmentinfo->gc : '' }}" name="gc">
                                    </div>

                                </div>
                                <div class="row my-1">
                                    <div class="col-md-2">
                                        <label for="ht" class=" col-form-label">Ht-</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" id="ht" class="form-control"
                                            value="{{ $appointmentinfo ? $appointmentinfo->ht : '' }}" name="ht">
                                    </div>

                                </div>
                                <div class="row my-1">
                                    <div class="col-md-2">
                                        <label for="lgs" class=" col-form-label">Lgs -</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" id="lgs" class="form-control"
                                            value="{{ $appointmentinfo ? $appointmentinfo->lgs : '' }}" name="lgs">
                                    </div>
                                </div>
                                <div class="row my-1">
                                    <div class="col-md-2">
                                        <label for="abd" class=" col-form-label">Abd -</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" id="abd" class="form-control"
                                            value="{{ $appointmentinfo ? $appointmentinfo->abd : '' }}" name="abd">
                                    </div>
                                </div>
                                @php
                                    
                                @endphp
                                @if ($appointmentinfo)

                                @if ($appointmentinfo->titles!="")
                                    @php
                                        $titles = json_decode($appointmentinfo->titles);
                                        $descriptions = json_decode($appointmentinfo->descriptions);
                                        $counttitle = count($titles);
                                    @endphp
                                    @if ($counttitle)
                                        @for ($i = 0; $i < $counttitle; $i++)
                                            <div class="row">
                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="titles[]"
                                                            value="{{ $titles[$i] }}">
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id="descriptions"
                                                                name="descriptions[]" value="{{ $descriptions[$i] }}"
                                                                placeholder="Description">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endfor

                                    @endif
                                @endif
                                @endif

                                <div id="education_fields"></div>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="titles[]">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="descriptions"
                                                    name="descriptions[]" placeholder="Description">
                                                <div class="input-group-append">
                                                    <button class="btn btn-primary" type="button"
                                                        onclick="education_fields();"><i
                                                            class="fa fa-plus"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="procedure" class="col-sm-4 col-form-label">Procedure & etc</label>
                        <div class="col-sm-7">
                            <textarea name="procedure" class="form-control" name="procedure" cols="30"
                                rows="6">{{ $appointmentinfo ? $appointmentinfo->procedure : '' }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row diagnosisRow">
                        <label for="diagnosis" class="col-sm-4 col-form-label">Diagnosis</label>
                        <div class="col-sm-6">
                            <select id="diagnosis" class="select form-control" name="diagnosis[]" multiple>
                                @foreach ($diagnosis as $diag)
                                    <option value="{{ $diag->id }}" @foreach ($appointment->diagnosis as $aptdiag)
                                        @if ($aptdiag->id === $diag->id)
                                            selected
                                        @endif
                                @endforeach

                                >{{ $diag->name }}</option>
                                @endforeach
                                </select>
                        </div>
                        <div class="col-sm-2">
                            <a href="#" class="btn btn-info text-white" data-toggle="modal" data-target="#create_diagnosis"><i class="fas fa-plus pinkcolor"></i>Add</a>
                        </div>
                      
    </div>
    <div class="form-group row">
        <label for="check_date2" class="col-sm-4 col-form-label">Next Appointment Date</label>
        <div class="col-sm-7">
            <div class="cal-icon">
                <input type="text" class="form-control" id="check_date2" name="nextappointment_date" placeholder="Y-M-D"
                    value="{{ $appointmentinfo ? $appointmentinfo->next_appointmentdate : '' }}">
            </div>
        </div>
    </div>

    <div class="col-sm-7 offset-5">
        <button type="submit" class="btn bpinkcolor text-white px-3">Submit</button>
    </div>
    </form>

    <form class="shadow p-3" action="{{ route('storeRecord') }}" method="post" id="storeRecordForm">
        @csrf
        {{-- <div class="form-group row pt-3 {{$dNoneemployee}}"> --}}
        <div class="form-group row pt-3">
            <div class="col-md-6">
                <a onclick="chooseMedicine({{ $appointment->id }})" class="btn bbluecolor btn-rounded ml-2 text-white"><i
                        class="fa fa-plus"></i> Medicine</a>
            </div>
            <div class="col-md-6">
                    <a href="" class="float-right pinkcolor" onclick="deleteItems()">Refresh Here &nbsp<i class="fas fa-sync"></i></a>
            </div>

            <table class="table custom-table mt-4 m-2">
                <thead>
                    <tr class="text-center">
                        {{-- <th><i class="fa fa-check-square checkall"></i></th> --}}
                        <th>No.</th>
                        <th>Name</th>
                        <th>Unit Name</th>
                        <th>Qty/Dose</th>
                        <th>Duration/Days</th>
                        <th>Look Procedure</th>
                        <th>Dose</th>
                        <th>Total-Qty</th>
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

        <input type="hidden" name="patient_id" value=" {{ $appointment->clinic_patient->id }}">
        <input type="hidden" name="appointment_id" value="{{ $appointment->id }}">
        <input type="hidden" id="item" name="item">
        <input type="hidden" id="grand" name="grand">
        <input type="hidden" id="pagServiceItem" name="pagServiceItem">
        <input type="hidden" id="pagServicegrandTotal" name="pagServicegrandTotal">
        <div class="col-sm-7 offset-5">
            <button type="button" onclick="storeRecord()" class="btn bpinkcolor text-white px-3">Submit</button>
        </div>

    </form>
    <div class="modal fade" id="create_diagnosis" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title pinkcolor">Create Diagnosis</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                   
                        <div class="form-body">
                            <div class="row col-md-8 offset-md-2">
                                <div class="form-group">
                                    <label class="control-label">Name</label>
                                    <input type="text" name="name" id="diagnosisName" class="form-control" autofocus>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class=" col-md-6 offset-md-4">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        <button class="btn bbluecolor text-white" id="save_diagnosis">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    </div>
    </div>
@endsection

@section('js')

    <script>
        $(document).ready(function() {

            var vouchers = @json($vouchers);
            var mycart = localStorage.getItem('mycart');
            var mycartobj = JSON.parse(mycart);

        
            if (mycartobj) {
                mycartOBJ = mycartobj;
            } else {
                mycartOBJ = [];
            }

            var pagServiceCart = localStorage.getItem('pagServiceCart');
            var pagServiceCartobj = JSON.parse(pagServiceCart);
            if (pagServiceCartobj) {
                pagServiceCartOBJ = pagServiceCartobj;
            } else {
                pagServiceCartOBJ = [];
            }
            if (vouchers) {
                var counting_units = vouchers.counting_unit;
            } else {
                var counting_units = [];
            }
           
           if(vouchers){
            if(vouchers.services){
                var services = vouchers.services;
            }else {
                var services = [];
            }

            var edit_medicine = localStorage.getItem('edit_medicine');
            if (!edit_medicine) {
                if (counting_units.length > 0) {
                    $.each(counting_units, function(i, v) {
                        var item = {
                            id: v.id,
                            item_name: v.item.item_name,
                            unit_name: v.unit_name,
                            qty_dose: v.pivot.doseper_qty ?? 1,
                            duration: v.pivot.duration ?? 1,
                            dose: v.pivot.dose ?? 1,
                            total: v.pivot.quantity ?? 0,
                            selling_price: 0,
                            look_procedure: v.pivot.look_procedure ?? 0,
                        };
                        var hasid = false;
                        if (mycartobj) {
                            $.each(mycartOBJ, function(i, localcart) {
                                if (localcart.id == v.id) {
                                    hasid = true;
                                }
                            });
                            if (!hasid) {
                                mycartobj.push(item);
                            }
                        } else {
                            mycartOBJ.push(item);
                        }
                    });
                    var grandTotal = {
                        sub_total: 0,
                        total_qty: 0
                    }
                    localStorage.setItem('mycart', JSON.stringify(mycartOBJ));
                    localStorage.setItem('grandTotal', JSON.stringify(grandTotal));

                }
                if (services.length > 0) {
                console.log('here');

                    $.each(services, function(i, v) {

                        var ser_pac="service";

                     var item = {
                                    id: v.id,
                                    type:ser_pac,
                                    service_name: v.name,
                                    qty: v.pivot.quantity,
                                    charges: 0
                                };
                        var hasid = false;
                        var total_amount = {
                                sub_total: 0,
                                total_qty: 0
                            };
                        if (pagServiceCartobj) {
                            $.each(pagServiceCartOBJ, function(i, localcart) {
                                if (localcart.id == v.id) {
                                    hasid = true;
                                }
                            });
                            if (!hasid) {
                                pagServiceCartobj.push(item);
                            }
                        } else {
                            pagServiceCartOBJ.push(item);
                        }
                    });
                    var pagServicegrandTotal = {
                        sub_total: 0,
                        total_qty: 0
                    }
                    localStorage.setItem('pagServiceCart', JSON.stringify(pagServiceCartOBJ));
                    localStorage.setItem('pagServicegrandTotal', JSON.stringify(pagServicegrandTotal));

                }


            }
           }
        //    else{    //no voucher

        //    }

            showmodal();
            $("#check_date2").datetimepicker({
                format: 'YYYY-MM-DD'
            });
        }); //jquery end

        function deleteItems() {
            localStorage.removeItem('mycart');
            localStorage.removeItem('grandTotal');
            localStorage.removeItem('docServiceCart');
            localStorage.removeItem('docServiceGrandTotal');
            localStorage.removeItem('pagServiceCart');
            localStorage.removeItem('pagServicegrandTotal');
            localStorage.removeItem('edit_medicine');
            window.location.reload();
        }

        function chooseMedicine(appointment_id) {
            var mycart = localStorage.getItem('recordAppointId');

            localStorage.setItem('recordAppointId', JSON.stringify(appointment_id));

            window.location.href = '{{ route('sale_page') }}';
        }

        $('#sale').on('click', '#department', function() {
            var times = $(this).children('option:selected').data('doseqty');
            var dit = $(this).parent().parent().data('id');
            var qtyDose = $('#qtyDose' + dit).val();
            var duration = $('#duration' + dit).val();

            var total = (times * qtyDose * duration);
            if(Number.isInteger(total)){
                total= total;
            }else{
                total= total.toFixed(2);
            }
            $('#totalqty' + dit).val(total);
        })


        var room = 1;

        function education_fields() {

            room++;
            var objTo = document.getElementById('education_fields')
            var divtest = document.createElement("div");
            divtest.setAttribute("class", "form-group removeclass" + room);
            var rdiv = 'removeclass' + room;

            // divtest.innerHTML = '<div id="education_fields"></div><div class="row"><div class="col-sm-6"><div class="form-group"><input type="text" class="form-control" id="car_number" name="car_num[]"  placeholder="Enter Car Number"></div></div><div class="col-sm-6"><div class="form-group"><div class="input-group"><input type="text" class="form-control" id="car_code" name="code_number[]" value="" placeholder="Enter Code Number"><div class="input-group-append"><button class="btn btn-danger" type="button" onclick="remove_education_fields(' + room + ');"> <i class="fa fa-minus"></i> </button></div></div></div></div></div>'
            divtest.innerHTML =
                '<div id="education_fields"></div><div class="row"><div class="col-sm-2"><div class="form-group"><input type="text" class="form-control" id="" name="titles[]"></div></div><div class="col-sm-4"><div class="form-group"><div class="input-group"><input type="text" class="form-control" id="descriptions" name="descriptions[]" placeholder="Description"><div class="input-group-append"><button class="btn btn-danger" type="button" onclick="remove_education_fields(' +
                room + ');"><i class="fa fa-minus"></i> </button></div></div></div></div>'

            objTo.appendChild(divtest)
        }

        function remove_education_fields(rid) {
            $('.removeclass' + rid).remove();
        }

        function showmodal() {
            var allTotal = 0;
            var allQty = 0;
            var vouchers = @json($vouchers);
            if (vouchers) {
                var voucher = true;
            } else {
                var voucher = false;
            }
            $('#total_quantity').empty();
            $('#sub_total').empty();
            $('#sale').empty();
            $('#doctorSer').empty();
            $('#serVice').empty();
            var mycart = localStorage.getItem('mycart');
            var grandTotal = localStorage.getItem('grandTotal');
            var doses = @json($doses);
            var grandTotal_obj = JSON.parse(grandTotal);
            var mycartobj = JSON.parse(mycart);
            if (mycartobj) {

                var html = '';
                var increNo = 1;
                // $.each(doses, function(i, v) {
                //     dosehtml +=
                //         `<option id="d${v.qty}-${v.name}" data-doseqty="${v.qty}" value="${v.id}">${v.qty} - ${v.name}</option>`
                // })
                if (mycartobj.length > 0) {
                    var medicineCharges = 0;
                    $.each(mycartobj, function(i, v) {
                        var dosehtml = ``;

                        $.each(doses, function(k, j) {
                            var local = v.dose;
                            var doses = j.name;
                            console.log('v',v);
                            console.log(local,doses);
                            if(local== doses){
                                var selected = "selected"
                            }
                            else {
                                var selected = "";
                            }
                       
                            dosehtml +=
                                `<option id="d${j.qty}-${j.name}" ${selected} data-doseqty="${j.qty}" value="${j.id}"> ${j.name}</option>` 
                        })

                        var id = v.id;

                        var item = v.item_name;

                        var qty = v.order_qty;

                        var count_name = v.unit_name;
                        if(v.look_procedure){
                            var lookProcedure = "checked";
                        }else{
                            var lookProcedure = "";
                        }
                        html += `<tr class="text-center">
                                <td class="font-weight-normald">${increNo++}</td>

                                <td class=" font-weight-normal">${item}</td>

                                <td class=" font-weight-normal">${count_name}</td>
                                <td class="font-weight-normal">
                                    <input type="text" id="qtyDose${increNo}" class="text-primary w-50 text-center mt-2 plaintext" name="qtyDose[]" value="${v.qty_dose ?? 1}">
                                </td>
                                <td class="font-weight-normal">
                                    <input type="text" id="duration${increNo}" class="text-primary w-50 text-center mt-2 plaintext" name="duration[]" value = ${v.duration ?? 1}>
                                </td>
                                <td class="font-weight-normal">
                                    <div class="form-check">
      <input class="form-check-input"  type="checkbox" value="${v.id}" name="look_procedure[]" ${lookProcedure}
      >
    </div>
                                </td>
                                <td class="font-weight-normal">
                                <div class="row do" data-id="${increNo}">
                                    <div class="form-group pt-3">
                                    <select class="select form-control" id="department" name="dose[]">
                                    ` +
                            dosehtml +
                            `
                                   
                                    </select>
                                </div>
                                </div>

                                </td>
                              
                                <td class="font-weight-normal">
                                    <input type="text" id="totalqty${increNo}" class="text-primary w-50 text-center mt-2 plaintext" name="totlaqty[]" value = ${v.total}>
                                </td>
                                </tr>`;
                        var idddd = 'd' + v.dose;
                    });
                }
                $("#sale").html(`
                <tr>
                    <td colspan="8">
                    Medicine
                    </td>
                </tr>
                `);
                $("#sale").append(html);
                $("#sale").append(`
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td colspan="2">
                    Medicine Total Charges
                    </td>
                    <td>
                        <input type="number" class="text-primary w-100 text-center mt-2 plaintext"  value="${vouchers ? vouchers.medicine_charges : 0}" name="medicineTotalbyHand">
                    </td>
                </tr>
                `);
                allQty += grandTotal_obj.total_qty ?? 0;

                allTotal += grandTotal_obj.sub_total ?? 0;

            }

            var pagService_cart = localStorage.getItem('pagServiceCart');

            var pagService_grandTotal = localStorage.getItem('pagServicegrandTotal');

            var pagService_grandTotal_obj = JSON.parse(pagService_grandTotal);

            if (pagService_grandTotal_obj) {

                var pagService_cartobj = JSON.parse(pagService_cart);
                var increNo = increNo ? increNo : 1;
                var pshtml = '';
                if (pagService_cartobj.length > 0) {
                    var serviceTotalCharges = 0;
                    $.each(pagService_cartobj, function(l, ps) {

                        pshtml += `<tr class="text-center">
                            <td class="font-weight-normal">${increNo++}</td>

                            <td class=" font-weight-normal">${ps.service_name}</td>

                            <td class=" font-weight-normal">${ps.type}</td>

                            <td>
                                ${ps.qty}  
                            </td>
                            <td>
                            </td>
                            <td>
                            </td>
                            <td>
                            </td>
                            <td class=" font-weight-normal"></td>
                            </tr>`;
                        serviceTotalCharges += ps.charges * ps.qty;
                    });
                }
                $('#serVice').html(`
            <tr>
                <td colspan="8">
                Services And Package
                </td>
            </tr>
            `);
                $("#serVice").append(pshtml);

                allQty += pagService_grandTotal_obj.total_qty ?? 0;

                allTotal += pagService_grandTotal_obj.sub_total ?? 0;

            }

            $("#serVice").append(`
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td colspan="2">
                    Service Total Charges
                    </td>
                    <td>
                        <input type="number" class="text-primary w-100 text-center mt-2 plaintext"  value="${voucher ? vouchers.service_charges : 0}" name="serviceTotalbyHand">
                    </td>
                </tr>
                `);
            $("#serVice").append(`
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td colspan="2">
                    Doctor Charges
                    </td>
                    <td>
                        <input type="number" class="text-primary w-100 text-center mt-2" style='outline:0;border-width:0 0 1px;' value="${voucher?  vouchers.doctor_charges : 0}" name="doctorChargesbyHand">
                    </td>
                </tr>
                `);

            $("#total_quantity").text(allQty);

            $("#sub_total").text(allTotal);
        }

        function storeRecord() {
            var mycart = localStorage.getItem('mycart');

            var grand_total = localStorage.getItem('grandTotal');

            var pagServiceCart = localStorage.getItem('pagServiceCart');

            var pagServicegrandTotal = localStorage.getItem('pagServicegrandTotal');

            // if (!mycart) {

            //     swal({
            //         title: "Please Check",
            //         text: "Item Cannot be Empty to Check Out",
            //         icon: "info",
            //     });

            // } else {

            $("#item").attr('value', mycart);

            $("#grand").attr('value', grand_total);

            $("#pagServiceItem").attr('value', pagServiceCart);

            $("#pagServicegrandTotal").attr('value', pagServicegrandTotal);

            localStorage.removeItem('mycart');
            localStorage.removeItem('grandTotal');

            localStorage.removeItem('docServiceCart');
            localStorage.removeItem('docServiceGrandTotal');
            localStorage.removeItem('pagServiceCart');
            localStorage.removeItem('pagServicegrandTotal');
            localStorage.removeItem('edit_medicine');


            $("#storeRecordForm").submit();


            // }
        }
        $('#save_diagnosis').click(function(){


            var selectedDiagnose = [];
            $("#diagnosis :selected").each(function() {
                selectedDiagnose.push(parseInt(this.value));
            });

            var name=  $('#diagnosisName').val();
            
            if ($.trim(name) == '' ) {
                swal({
                    title: "Failed!",
                    text: "Please fill the diagnosis!",
                    icon: "error",
                    timer: 2000,
                });
            }
            else{
                $.ajax({
                type:'POST',
                url:'{{ route('diagnosis_store_ontime') }}',
                dataType:'json',
                data:{
                        "_token": "{{ csrf_token() }}",
                        "name":name,
                    },

                success:function(data){
                    console.log(data);

                    if(!data['status']){
                        swal({
                            title: "Warning!",
                            text: "Already added !",
                            icon: "warning",
                            timer: 2000,
                        });
                    }
                    else{
                        var html= ``;
                        var j=1;

                        $.each(data.diagnose, function(i, diagnosis) {
                            var selected= "";
                            if(selectedDiagnose){

                                console.log(selectedDiagnose);
                                console.log(diagnosis.id);

                                if(jQuery.inArray(diagnosis.id, selectedDiagnose) !== -1){
                                    console.log('same');
                                     selected= "selected";
                                }else{
                                    selected= "";
                                }

                            }
                            html+= `
                            <option ${selected} value="${diagnosis.id}"> ${diagnosis.name}</option>
                              
                            `;

                        });
                        $('#diagnosis').empty();
                        $('.diagnosisRow #diagnosis').html(html);
                        $('#diagnosisName').val(null);
                        $('#create_diagnosis').modal('hide');
                        swal({
                            icon: 'success',
                            // showConfirmButton: true,
                            timer: 1500
                        });
                    }
                      
                }

                });
            }
        })
    </script>


@endsection
