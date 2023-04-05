@extends('master')
@section('title','Company General Infomation')
@section('link','Company General Infomation')
@section('content')

<div class="card">
    <div class="card-body p-b-0">
        <h3 class="text-success text-center">Company General Infomation</h3>
        @if($com == null)
                        <form action="{{route('store_company')}}" method="POST" class="mt-5">
                            @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Company Name</label>
                                        <input type="text" class="form-control" name="company_name">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Company Address</label>
                                        <input type="text" class="form-control" name="company_address">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Company Contact</label>
                                        <input type="text" class="form-control" placeholder="" name="company_contact">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Company Email</label>
                                        <input type="text" class="form-control" placeholder="" name="company_email">

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Company MD Name</label>
                                        <input type="text" class="form-control" placeholder="" name="md_name">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Starting Capital</label>
                                        <input type="text" class="form-control" placeholder="" name="capital">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Financial Year Start Date</label>
                                        <input type="date" class="form-control" placeholder="" name="start_date" id="mdate">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Financial Year End Date</label>
                                        <input type="date" class="form-control" placeholder="" name="end_date" id="mdate">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Net Profit for Previous Year</label>
                                        <input type="text" class="form-control" placeholder="" name="pre_year" id="mdate">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Net Profit for Current Year</label>
                                        <input type="text" class="form-control" placeholder="" name="curr_year" id="mdate">
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class=" col-md-9">
                                                <button type="submit" class="btn btn-primary">Create</button>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                           </div>
                        </div>
                    </form>
                    @else
                    <form action="{{route('update_company')}}" method="POST" class="mt-5">
                        @csrf
                     <div class="form-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Company Name</label>
                                    <input type="text" class="form-control" name="company_name" value="{{$com->company_name}}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Company Address</label>
                                    <input type="text" class="form-control" name="company_address" value="{{$com->company_address}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Company Contact</label>
                                    <input type="text" class="form-control" placeholder="" name="company_contact" value="{{$com->company_contact}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Company Email</label>
                                    <input type="text" class="form-control" placeholder="" name="company_email" value="{{$com->company_email}}">

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Company MD Name</label>
                                    <input type="text" class="form-control" placeholder="" name="md_name" value="{{$com->company_md_name}}">

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Starting Capital</label>
                                    <input type="text" class="form-control" placeholder="" name="capital" value="{{$com->starting_capital}}">
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Financial Year Start Date</label>
                                    <input type="date" class="form-control" placeholder="" name="start_date" id="mdate" value="{{$com->financial_start_date}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Financial Year End Date</label>
                                    <input type="date" class="form-control" placeholder="" name="end_date" id="mdate" value="{{$com->financial_end_date}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Net Profit for Previous Year</label>
                                    <input type="text" class="form-control" placeholder="" name="pre_year" id="mdate" value="{{$com->netprofit_pre_year}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Net Profit for Current Year</label>
                                    <input type="text" class="form-control" placeholder="" name="curr_year" id="mdate" value="{{$com->netprofit_current_year}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class=" col-md-9">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                       </div>
                    </div>
            </form>
                @endif
                </div>

                </div>

@endsection
