@extends('master')
@section('title', 'Add Payment')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card-box">
            <h4 class="payslip-title">Add Payment Method</h4>
            <div class="row">
                <div class="col-lg-12 m-b-20">
                    <ul class="list-unstyled">
                        <li>
                            <h5 class="mb-0"><strong>Name::{{$patient->name}}</strong></h5></li>
                        <li><span>Patient Code:{{$patient->patient_code}}</span></li>
                        <li>Joining Date: {{$patient->created_at->format('d-m-Y')}}</li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div>
                        <form>
                            
                            <h4 class="m-b-10"><strong>Payment</strong></h4>

                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Blood G croup</label>
                                <div class="col-md-5">
                                    <select class="select">
                                        <option>Select</option>
                                        <option value="1">Debit</option>
                                        <option value="2">Credit</option>
                                
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Card</label>
                                <div class="col-md-5">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="gender_male" value="option1" checked>
                                        <label class="form-check-label" for="gender_male">
                                            <i class="fa fa-cc-mastercard"></i>
                                        Master
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="gender_female" value="option2">
                                        <label class="form-check-label" for="gender_female">
                                            <i class="fa fa-cc-visa"></i>
                                        VISA
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="gender_female" value="option2">
                                        <label class="form-check-label" for="gender_female">
                                            <i class="fa fa-cc-jcb"></i>
                                        JCB
                                        
                                        </label>
                                    </div>
                                </div>
                            </div>
                            

                        </form>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('js')



@endsection