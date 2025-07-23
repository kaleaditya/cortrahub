@extends('layouts.admin.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Inquiry List</h4>
                </div>
                <div class="card-body">
                    @if($enquiries->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Company</th>
                                        <th>Category</th>
                                        <th>Date</th>
                                        <th>Trainers</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($enquiries as $enquiry)
                                    <tr>
                                        <td>{{ $enquiry->id }}</td>
                                        <td>{{ $enquiry->company->company_name ?? '-' }}</td>
                                        <td>{{ $enquiry->selected_category }}</td>
                                        <td>{{ $enquiry->date ? $enquiry->date->format('d M Y') : '-' }}</td>
                                        <td>{{ is_array($enquiry->selected_trainers) ? count($enquiry->selected_trainers) : (is_string($enquiry->selected_trainers) ? count(json_decode($enquiry->selected_trainers, true)) : '-') }}</td>
                                        <td>
                                            <a href="{{ route('admin.program_enquiries.show', $enquiry->id) }}" class="btn btn-sm btn-primary">
                                                <i class="bi bi-eye"></i> View
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-center mt-3">
                            {{ $enquiries->links() }}
                        </div>
                    @else
                        <div class="text-center py-5">
                            <i class="bi bi-inbox display-1 text-muted"></i>
                            <h4 class="mt-3">No Inquiries Found</h4>
                            <p class="text-muted">No program enquiries have been submitted yet.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 