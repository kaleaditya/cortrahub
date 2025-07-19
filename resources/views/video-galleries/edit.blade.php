@extends('layouts.admin.app')

@section('content')
<div class="container">
    <h2>Edit My Awards</h2>

    <form action="{{ route('video-galleries.update', $videoGallery->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="link" class="form-label">Awards</label>
            <input type="url" class="form-control @error('link') is-invalid @enderror" id="link" name="link" value="{{ old('link', $videoGallery->link) }}" required>
            @error('link')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" name="is_active" id="is_active" {{ $videoGallery->is_active ? 'checked' : '' }}>
            <label class="form-check-label" for="is_active">Active</label>
        </div>

        <button type="submit" class="btn btn-primary">Update Award</button>
        <a href="{{ route('video-galleries.index', ['user_id' => $videoGallery->user_id]) }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection