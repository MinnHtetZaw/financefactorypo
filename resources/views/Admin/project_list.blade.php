@extends('master')
@section('title','Sale Project List')
@section('link','Sale Project List')
@section('content')

<div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Sale Project List</h3>
              <a href="{{route('create_project')}}" class="btn btn-primary float-right" style="border-radius:50px"> <i class="fa fa-plus ml-2 mr-2"></i>Add Project</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

              @foreach($show_year as $ypj)
              <h4 class="font-weight-bold text-secondary"><span class="text-dark"><i class="far fa-calendar-alt"></i></span>&nbsp;<i>Year</i>- <span class="badge badge-pill badge-danger">{{$ypj}}</span></h4>
              <div class="container">
                <div class="row mt-3 mb-3">
                  <div class="col-md-3">
                  <a class="btn btn-outline-primary" data-toggle="collapse" href="#rfqstatus{{$ypj}}" role="button" aria-expanded="false" aria-controls="collapseExample">RFQ Issused State<i class="fa fa-chevron-circle-down ml-2" aria-hidden="true"></i></a>
                  </div>
                  <div class="col-md-3">
                  <a class="btn btn-outline-warning" data-toggle="collapse" href="#bidstatus{{$ypj}}" role="button" aria-expanded="false" aria-controls="collapseExample">Bidded State<i class="fa fa-chevron-circle-down ml-2" aria-hidden="true"></i></a>
                  </div>
                  <div class="col-md-4">
                  <a class="btn btn-outline-success" data-toggle="collapse" href="#awdstatus{{$ypj}}" role="button" aria-expanded="false" aria-controls="collapseExample">Awarded State<i class="fa fa-chevron-circle-down ml-2" aria-hidden="true"></i></a>

                  </div>
                </div>
              </div>
              <?php $i=1; ?>
              <!-- Begin RFQ status collaspe-->
              <div class="collapse" id="rfqstatus{{$ypj}}">
                <div class="card card-header">
                  <h5 class="text-success"><span class="text-info"><i class="fas fa-circle"></i></span>&nbsp;RFQ Issued</h5>
                </div>
                <div class="card card-body">
                <div class="row bg-info font-weight-bold p-2">

                    <div class="col-md-1">
                      <span>#</span>
                    </div>

                    <div class="col-md-2">

                      <span>Name</span>
                    </div>
                    <div class="col-md-2">
                      <span>Project Value</span>
                    </div>
                    <div class="col-md-2">
                      <span>Expected Budget</span>
                    </div>
                    <div class="col-md-2">
                      <span>ROI</span>
                    </div>

                    <div class="col-md-3">
                      <span class="ml-2">Action</span>

                    </div>



                  </div>
                  <?php $i=1; ?>
                  @foreach($sale_project_yearly as $saleyear)
                  @if($ypj == $saleyear->year && $saleyear->status == 1)
                  <div class="row mb-1 mt-3 font-weight-bold" style="font-size:18px;">

                    <div class="col-md-1">

                        <span>{{$i++}}.</span>
                    </div>
                    <div class="col-md-2">
                      <span style="font-size:15px;"><i>{{$saleyear->name}}</i></span>
                    </div>
                    <div class="col-md-2">
                      <span style="font-size:15px;"><i>{{$saleyear->project_value}}</i></span>
                    </div>
                    <div class="col-md-2">
                      <span style="font-size:15px;"><i>{{$saleyear->expected_budget}}</i></span>
                    </div>
                    <div class="col-md-2">
                      <!-- <a href="#" class="btn btn-danger btn-sm"  data-toggle="modal" data-target="#project_detail{{$saleyear->id}}"><i class="fa fa-info mr-2" aria-hidden="true"></i></i>Detail</a> -->
                      <span style="font-size:15px;"><i>{{$saleyear->roi_value}}</i></span>
                    </div>
                    <div class="col-md-3 btn-group">
                      <a href="{{route('change_pj_status',$saleyear->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-plus mr-2" aria-hidden="true"></i>Change Status</a>

                      <a href="{{route('show_pay_invoice',$saleyear->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-plus mr-2" aria-hidden="true"></i>Invoice</a>
                      <!-- <a href="{{route('invoice_accounting',$saleyear->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-plus mr-2" aria-hidden="true"></i>Invoices</a> -->
                      <a href="{{route('show_pay_po',$saleyear->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-plus mr-2" aria-hidden="true"></i>PO</a>
                      <!-- <a href="{{route('po_accounting',$saleyear->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-plus mr-2" aria-hidden="true"></i>PO</a> -->

                    </div>
                  </div>
                    <hr>
                  @endif
                  @endforeach
                </div>
              </div>
              <!-- End RFQ status -->
              <!-- Begin Bidded status collaspe-->
              <div class="collapse" id="bidstatus{{$ypj}}">
                <div class="card card-header">
                  <h5 class="text-success"><span class="text-warning"><i class="fas fa-circle"></i></span>&nbsp;Bidded State</h5>
                </div>
                <div class="card card-body">
                <div class="row bg-info font-weight-bold p-2">

                <div class="col-md-1">
                      <span>#</span>
                    </div>

                    <div class="col-md-2">
                      <span>Name</span>
                    </div>
                    <div class="col-md-2">

                      <span>Project Value</span>
                    </div>
                    <div class="col-md-2">
                      <span>Expected Budget</span>
                    </div>
                    <div class="col-md-2">
                      <span>ROI</span>

                    </div>
                    <div class="col-md-3">
                      <span class="ml-2">Action</span>
                    </div>



                  </div>
                  <?php $i=1; ?>
                  @foreach($sale_project_yearly as $saleyear)
                  @if($ypj == $saleyear->year && $saleyear->status == 2)
                  <div class="row mb-1 mt-3 font-weight-bold" style="font-size:18px;">

                  <div class="col-md-1">
                        <span>{{$i++}}.</span>
                    </div>
                    <div class="col-md-2">
                      <span style="font-size:15px;"><i>{{$saleyear->name}}</i></span>
                    </div>
                    <div class="col-md-2">
                      <span style="font-size:15px;"><i>{{$saleyear->project_value}}</i></span>
                    </div>
                    <div class="col-md-2">
                      <span style="font-size:15px;"><i>{{$saleyear->expected_budget}}</i></span>
                    </div>
                    <div class="col-md-2">
                      <!-- <a href="#" class="btn btn-danger btn-sm"  data-toggle="modal" data-target="#project_detail{{$saleyear->id}}"><i class="fa fa-info mr-2" aria-hidden="true"></i></i>Detail</a> -->
                      <span style="font-size:15px;"><i>{{$saleyear->roi_value}}</i></span>
                    </div>
                    <div class="col-md-3 btn-group">
                    <a href="{{route('change_pj_status',$saleyear->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-plus mr-2" aria-hidden="true"></i>Change Status</a>

                      <a href="{{route('show_pay_invoice',$saleyear->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-plus mr-2" aria-hidden="true"></i>Invoice</a>
                      <!-- <a href="{{route('invoice_accounting',$saleyear->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-plus mr-2" aria-hidden="true"></i>Invoices</a> -->
                      <a href="{{route('show_pay_po',$saleyear->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-plus mr-2" aria-hidden="true"></i>PO</a>
                      <!-- <a href="{{route('po_accounting',$saleyear->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-plus mr-2" aria-hidden="true"></i>PO</a> -->

                    </div>
                  </div>
                    <hr>
                  @endif
                  @endforeach
                </div>
              </div>
              <!-- End Bidded status -->
               <!-- Begin Awarded status collaspe-->
               <div class="collapse" id="awdstatus{{$ypj}}">
                <div class="card card-header">
                  <h5 class="text-success"><span class="text-success"><i class="fas fa-circle"></i></span>&nbsp;Awarded State</h5>
                </div>
                <div class="card card-body">
                <div class="row bg-info font-weight-bold p-2">

                <div class="col-md-1">
                      <span>#</span>
                    </div>

                    <div class="col-md-2">
                      <span>Name</span>
                    </div>
                    <div class="col-md-2">

                      <span>Project Value</span>
                    </div>
                    <div class="col-md-2">
                      <span>Expected Budget</span>
                    </div>
                    <div class="col-md-2">
                      <span>ROI</span>
                    </div>
                    <div class="col-md-3">
                      <span class="ml-2">Action</span>

                    </div>

                  </div>
                  <?php $i=1; ?>
                  @foreach($sale_project_yearly as $saleyear)
                  @if($ypj == $saleyear->year && $saleyear->status == 3)
                  <div class="row mb-1 mt-3 font-weight-bold" style="font-size:18px;">

                  <div class="col-md-1">
                        <span>{{$i++}}.</span>
                    </div>
                    <div class="col-md-2">
                      <span style="font-size:15px;"><i>{{$saleyear->name}}</i></span>
                    </div>
                    <div class="col-md-2">
                      <span style="font-size:15px;"><i>{{$saleyear->project_value}}</i></span>
                    </div>
                    <div class="col-md-2">
                      <span style="font-size:15px;"><i>{{$saleyear->expected_budget}}</i></span>
                    </div>
                    <div class="col-md-2">
                      <!-- <a href="#" class="btn btn-danger btn-sm"  data-toggle="modal" data-target="#project_detail{{$saleyear->id}}"><i class="fa fa-info mr-2" aria-hidden="true"></i></i>Detail</a> -->
                      <span style="font-size:15px;"><i>{{$saleyear->roi_value}}</i></span>
                    </div>
                    <div class="col-md-3 btn-group">
                    <a href="{{route('change_pj_status',$saleyear->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-plus mr-2" aria-hidden="true"></i>Change Status</a>

                      <a href="{{route('show_pay_invoice',$saleyear->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-plus mr-2" aria-hidden="true"></i>Invoice</a>
                      <!-- <a href="{{route('invoice_accounting',$saleyear->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-plus mr-2" aria-hidden="true"></i>Invoices</a> -->
                      <a href="{{route('show_pay_po',$saleyear->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-plus mr-2" aria-hidden="true"></i>PO</a>
                      <!-- <a href="{{route('po_accounting',$saleyear->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-plus mr-2" aria-hidden="true"></i>PO</a> -->

                    </div>
                  </div>
                    <hr>
                  @endif
                  @endforeach
                </div>
              </div>
              <!-- End Awarded status -->
              <hr><!-- one end hr -->
              <!-- Detail Modal -->
              @foreach($sale_project_yearly as $saleyear)
              <div class="modal fade bd-example-modal-lg" id="project_detail{{$saleyear->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel"><span class="font-weight-bold text-success"><i>{{$saleyear->name}}</i></span> Project Detail Information</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                        <div class="row bg-info font-weight-bold p-2">
                      <!-- <div class="col-md-1">
                          <span>#</span>
                        </div> -->
                        <div class="col-md-2">
                          <span>RFQ File</span>
                        </div>
                        <div class="col-md-2">
                          <span>Contact Person Phone</span>
                        </div>
                        <div class="col-md-2">
                          <span>Contact Person Email</span>
                        </div>
                        <div class="col-md-2">
                          <span>Submission Date</span>
                        </div>
                        <div class="col-md-2">
                          <span>Location</span>
                        </div>
                        <div class="col-md-2">
                          <span>Description</span>
                        </div>

                      </div>
                      @foreach($sale_project_yearly as $sale_detail)
                      @if($saleyear->id == $sale_detail->id)
                      <div class="row mb-1 mt-3 font-weight-bold" style="font-size:18px;">
                      <!-- <div class="col-md-1">
                          {{$i++}}
                        </div> -->
                        <div class="col-md-2">
                        <img src="{{asset('image/'.$saleyear->rfq_file_path)}}" style="width: 70px; height: 50px; cursor: pointer;">
                        </div>
                        <div class="col-md-2">
                          {{$saleyear->phone}}
                        </div>
                        <div class="col-md-2">
                          {{$saleyear->email}}
                        </div>
                        <div class="col-md-2">
                          {{$saleyear->submission_date}}
                        </div>
                        <div class="col-md-2">
                          {{$saleyear->location}}
                        </div>
                        <div class="col-md-2">
                          {{$saleyear->description}}
                        </div>
                      </div>
                        <hr>
                        @endif
                        @endforeach
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
              <!-- End Modal -->
              @endforeach
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>


@endsection


