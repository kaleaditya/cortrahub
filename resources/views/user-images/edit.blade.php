@extends('layouts.admin.app')

@section('content')
<div class="container">
    <h3>Edit My Certifications</h3>
    <a href="{{ route('user-images.index', ['user_id' => $userImage->user_id]) }}" class="btn btn-secondary mb-3">Back</a>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form action="{{ route('user-images.update', $userImage->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="image" class="form-label">Current Image</label><br>
            @if($userImage->image)
                <img src="{{ asset('storage/'.$userImage->image) }}" alt="User Image" style="width: 150px; height: auto;">
            @endif
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Change Image (optional)</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>

       <div class="form-check mb-3">
                        <input type="hidden" name="status" value="0">
                        <input class="form-check-input" type="checkbox" name="status" id="status" value="1" {{ $userImage->status ? 'checked' : '' }}>
                        <label class="form-check-label" for="status">Active</label>
                    </div>

        <button type="submit" class="btn btn-primary">Update Image</button>
    </form>
</div>
@endsection
