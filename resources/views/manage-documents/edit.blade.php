@extends('layouts.admin.app')

@section('content')
<div class="container">
    <h3>Edit Document</h3>

    <form action="{{ route('manage-documents.update', $manageDocument->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="document" class="form-label">Upload Document</label>
            <input type="file" name="document" id="document" class="form-control">
            @if($manageDocument->document)
                <p>Current file: <a href="{{ asset('storage/' . $manageDocument->document) }}" target="_blank">{{ basename($manageDocument->document) }}</a></p>
            @endif
            @error('document')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" name="status" id="status" class="form-check-input" {{ $manageDocument->status ? 'checked' : '' }}>
            <label for="status" class="form-check-label">Active</label>
        </div>

        <button type="submit" class="btn btn-primary">Update Document</button>
        <a href="{{ route('manage-documents.index', ['user_id' => $manageDocument->user_id]) }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
