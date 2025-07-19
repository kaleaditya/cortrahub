@extends('layouts.admin.app')

@section('content')
<div class="container">
    <h3>Manage Documents</h3>
    <a href="{{ route('manage-documents.create', ['user_id' => $userId]) }}" class="btn btn-primary mb-3">Add New Document</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Document</th>
                <th>Status</th>
                <th>Uploaded At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($documents as $index => $doc)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>
                        @if($doc->document)
                            <a href="{{ asset('storage/' . $doc->document) }}" target="_blank">
                                {{ basename($doc->document) }}
                            </a>
                        @endif
                    </td>
                    <td>
                        <span class="badge {{ $doc->status ? 'bg-success' : 'bg-danger' }}">
                            {{ $doc->status ? 'Active' : 'Inactive' }}
                        </span>
                    </td>
                    <td>{{ $doc->created_at->format('Y-m-d') }}</td>
                    <td>
                        <a href="{{ route('manage-documents.edit', $doc->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('manage-documents.destroy', $doc->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="text-center">No documents found.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
