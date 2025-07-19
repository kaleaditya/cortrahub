@extends('layouts.admin.app')

@section('content')
<div class="row">
<div class="col-lg-12">
<div class="card cardPdd">
    <div class="card-body topText">
    <div class="col-lg-12 margin-tb">
        <div class="flexBdy">
        <div class="pull-left">
            <h5 class="card-title"> Team Detail</h5>
        </div>
        <div class="pull-right">
            <a class="btn btn-sm mb-2 comnBtn whtTxt borderBtn" href="{{ route('team.index') }}"> Back</a>
        </div>
        </div>
    </div>
    </div>
    
 

<div class="row frmGrp">
    <div class="col-xs-12 col-sm-6 col-md-4">
        <div class="form-group flexClm">
            <strong class="strng dullColor"> Name:</strong>
            {{ $team->name }}
        </div>
    </div>

     <div class="col-xs-12 col-sm-6 col-md-4">
        <div class="form-group flexClm">
            <strong class="strng dullColor">Designation:</strong>
            {{ $team->designation }}
        </div>
    </div>

     <div class="col-xs-12 col-sm-6 col-md-4">
        <div class="form-group flexClm">
            <strong class="strng dullColor">Description:</strong>
            {{ $team->description }}
        </div>
    </div>

     <div class="col-xs-12 col-sm-6 col-md-4">
        <div class="form-group flexClm">
            <strong class="strng dullColor">Designation:</strong>
            {{ $team->designation }}
        </div>
     </div>

    <div class="col-xs-12 col-sm-6 col-md-4">
        <div class="form-group flexClm">
            <strong class="strng dullColor">Image:</strong>
            <img src="{{asset('all_image/'.$team->image)}}"  height="50" width="50" alt="">
        </div>
    </div>

</div>

</div>
</div>
</div>
@endsection
