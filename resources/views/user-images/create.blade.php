@extends('layouts.admin.app')

@section('content')
<div class="container">
    <h3>Add New My Certifications</h3>
    <a href="{{ route('user-images.index', ['user_id' => $selectedUserId]) }}" class="btn btn-secondary mb-3">Back</a>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form action="{{ route('user-images.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="user_id" value="{{ $selectedUserId }}">

        <div class="mb-3">
            <label for="image" class="form-label">Upload Image</label>
            <input type="file" class="form-control" id="image" name="image" required>
        </div>

         <div class="form-check mb-3">
            <input type="hidden" name="status" value="0">
            <input class="form-check-input" type="checkbox" name="status" id="status" value="1" checked>
            <label class="form-check-label" for="status">Active</label>
        </div>

        <button type="submit" class="btn btn-primary">Add Image</button>
    </form>
</div>
@endsection
