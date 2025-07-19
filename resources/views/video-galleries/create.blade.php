@extends('layouts.admin.app')

@section('content')
<div class="container">
    <h2>My Awards</h2>

    <form action="{{ route('video-galleries.store') }}" method="POST"  enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="user_id" value="{{ $selectedUserId }}">

        <div class="mb-3">
            <label for="link" class="form-label">Image</label>
            <input type="file" class="form-control" id="link" name="image" value="{{ old('link') }}" required>
            @error('link')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" name="is_active" id="is_active" checked>
            <label class="form-check-label" for="is_active">Active</label>
        </div>

        <button type="submit" class="btn btn-primary">Add Video</button>
        <a href="{{ route('video-galleries.index', ['user_id' => $selectedUserId]) }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
