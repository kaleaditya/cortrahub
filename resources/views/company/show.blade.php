@extends('layouts.admin.app')

@section('content')
<div class="row">
<div class="col-lg-12">
<div class="card cardPdd">
    <div class="card-body topText">
    <div class="col-lg-12 margin-tb">
        <div class="flexBdy">
        <div class="pull-left">
            <h5 class="card-title"> Company Detail</h5>
        </div>
        <div class="pull-right">
            <a class="btn btn-sm mb-2 comnBtn whtTxt borderBtn" href="{{ route('register.company') }}"> Back</a>
        </div>
        </div>
    </div>
    </div>
    
 

<div class="row frmGrp">
    <div class="col-xs-12 col-sm-6 col-md-4">
        <div class="form-group flexClm">
            <strong class="strng dullColor">Company Name:</strong>
            {{ $company->company_name }}
        </div>
    </div>

     <div class="col-xs-12 col-sm-6 col-md-4">
        <div class="form-group flexClm">
            <strong class="strng dullColor">Company Member Name:</strong>
            {{ $company->your_name }}
        </div>
    </div>

     <div class="col-xs-12 col-sm-6 col-md-4">
        <div class="form-group flexClm">
            <strong class="strng dullColor">Email:</strong>
            {{ $company->email }}
        </div>
    </div>

     <div class="col-xs-12 col-sm-6 col-md-4">
        <div class="form-group flexClm">
            <strong class="strng dullColor">Designation:</strong>
            {{ $company->designation }}
        </div>
    </div>


      <div class="col-xs-12 col-sm-6 col-md-4">
        <div class="form-group flexClm">
            <strong class="strng dullColor">Mobile no:</strong>
            {{ $company->mobile }}
        </div>
    </div>

    <div class="col-xs-12 col-sm-6 col-md-4">
        <div class="form-group flexClm">
            <strong class="strng dullColor">Website:</strong>
            {{ $company->website }}
        </div>
    </div>

</div>

</div>
</div>
</div>
@endsection
