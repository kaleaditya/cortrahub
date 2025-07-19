@extends('layouts.admin.app')

@section('content')
<div class="container">
    <h3>Add New Document</h3>

    <form action="{{ route('manage-documents.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="user_id" value="{{ $userId }}">

        <div class="mb-3">
            <label for="document" class="form-label">Upload Document</label>
            <input type="file" name="document" id="document" class="form-control" required>
            @error('document')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" name="status" id="status" class="form-check-input" checked>
            <label for="status" class="form-check-label">Active</label>
        </div>

        <button type="submit" class="btn btn-success">Save Document</button>
        <a href="{{ route('manage-documents.index', ['user_id' => $userId]) }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
