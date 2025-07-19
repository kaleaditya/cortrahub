@extends('layouts.admin.app')

@section('content')
<div class="row">
<div class="col-lg-12">
<div class="card cardPdd">
    <div class="card-body topText">
        <div class="col-lg-12 margin-tb">
            <div class="flexBdy">
                <div class="pull-left">
                   <h5 class="card-title">Edit Category</h5>
                </div>
                <div class="pull-right">
                   <a class="btn btn-sm mb-2 comnBtn whtTxt borderBtn" href="{{ route('roles.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
                </div>
            </div>
        </div>
    </div>

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif

<div class="frmGrp">
    <form method="POST" action="{{ route('roles.update', $role->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
<?php
$role_info = get_role_info($role->id);
?>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong class="strng">Name:</strong>
                <input type="text" name="name"   placeholder="Name" class="form-control" value="{{ $role->name }}">
            </div>
        </div>

     

         {{-- <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong class="strng">Meta Title:</strong>
                <input type="text" name="meta_title" value="{{ $role_info->meta_title}}" placeholder="Enter Meta Title" class="form-control required">
            </div>
        </div> --}}
{{--
         <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong class="strng">Meta Keywords:</strong>
                <input type="text" name="meta_kewords" value="{{ $role_info->meta_kewords }}" placeholder="Enter Meta Keywords" class="form-control required">
            </div>
        </div> --}}

         {{-- <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong class="strng">Meta Description:</strong>
                <textarea name="meta_description" class="form-control required" cols="30" placeholder="Enter Meta Description" rows="10">{{ $role_info->meta_description }}</textarea>
            </div>
        </div> --}}

        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong class="strng">Active:</strong>
                 <input type="checkbox" name="is_active" id="is_active" value="1" {{ $role->is_active ? 'checked' : '' }}>
            </div>
        </div>


        {{-- <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group flxfrmGp minGp mbZero">
                <strong class="strng">Permission:</strong>
                <br/>
                <div class="flxLbl">
                @foreach($permission as $value)
                    <label><input type="checkbox" name="permission[{{$value->id}}]" value="{{$value->id}}" class="name" {{ in_array($value->id, $rolePermissions) ? 'checked' : ''}}>
                    {{ $value->name }}</label>
                <br/>
                @endforeach
                </div>
            </div>
        </div> --}}
        <div class="col-xs-12 col-sm-12 col-md-12 mt50">
            <button type="submit" class="btn btn-sm comnBtn whtTxt"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
        </div>
    </div>
</form>
</div>

</div>
</div>
</div>
@endsection