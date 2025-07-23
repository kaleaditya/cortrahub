@extends('layouts.admin.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Program Enquiry #{{ $enquiry->id }}</h4>
                    <div>
                        <a href="{{ route('admin.program_enquiries.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Back to List
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Company Information -->
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h5>Company Information</h5>
                            <table class="table table-borderless">
                                <tr>
                                    <td><strong>Company Name:</strong></td>
                                    <td>{{ $enquiry->company->company_name }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Contact Person:</strong></td>
                                    <td>{{ $enquiry->company->contact_name }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Email:</strong></td>
                                    <td>{{ $enquiry->company->email }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Phone:</strong></td>
                                    <td>{{ $enquiry->company->phone ?? 'Not provided' }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <h5>Program Details</h5>
                            <table class="table table-borderless">
                                <tr>
                                    <td><strong>Category:</strong></td>
                                    <td><span class="badge bg-primary">{{ $enquiry->selected_category }}</span></td>
                                </tr>
                                <tr>
                                    <td><strong>Date:</strong></td>
                                    <td>{{ $enquiry->date->format('d M Y') }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Location:</strong></td>
                                    <td>{{ $enquiry->location }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Duration:</strong></td>
                                    <td>{{ $enquiry->duration }} hours</td>
                                </tr>
                                <tr>
                                    <td><strong>Start Time:</strong></td>
                                    <td>{{ $enquiry->start_time }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Attendees:</strong></td>
                                    <td>{{ $enquiry->attendees }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Budget:</strong></td>
                                    <td>₹{{ $enquiry->budget ?? 'Not specified' }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Status:</strong></td>
                                    <td>
                                        @if($enquiry->status == 'pending')
                                            <span class="badge bg-warning">Pending</span>
                                        @elseif($enquiry->status == 'sent_to_trainers')
                                            <span class="badge bg-info">Sent to Trainers</span>
                                        @else
                                            <span class="badge bg-success">Completed</span>
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <!-- Program Brief -->
                    <div class="row mb-4">
                        <div class="col-12">
                            <h5>Program Brief</h5>
                            <div class="card">
                                <div class="card-body">
                                    {{ $enquiry->program_brief }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- PDF Attachment -->
                    @if($enquiry->pdf_path)
                    <div class="row mb-4">
                        <div class="col-12">
                            <h5>Attached PDF</h5>
                            <a href="{{ asset('storage/' . $enquiry->pdf_path) }}" 
                               class="btn btn-outline-primary" target="_blank">
                                <i class="bi bi-file-pdf"></i> View PDF
                            </a>
                        </div>
                    </div>
                    @endif

                    <!-- Selected Trainers -->
                    <div class="row mb-4">
                        <div class="col-12">
                            <h5>Selected Trainers ({{ count($trainers) }})</h5>
                            <div class="row">
                                @foreach($trainers as $trainer)
                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <img src="{{ asset('all_image/'.$trainer->image) }}" 
                                                 class="rounded-circle mb-3" alt="Trainer" 
                                                 width="80" height="80" style="object-fit: cover;">
                                            <h6 class="card-title">{{ $trainer->name }}</h6>
                                            <p class="card-text small text-muted">
                                                <i class="bi bi-geo-alt"></i> {{ $trainer->city_info->name ?? 'Location not specified' }}
                                            </p>
                                            <p class="card-text small text-muted">
                                                <i class="bi bi-envelope"></i> {{ $trainer->email }}
                                            </p>
                                            <button class="btn btn-sm btn-success send-email-btn" 
                                                    data-trainer-id="{{ $trainer->id }}"
                                                    data-trainer-name="{{ $trainer->name }}">
                                                <i class="bi bi-envelope"></i> Send Email
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Admin Notes -->
                    <div class="row mb-4">
                        <div class="col-12">
                            <h5>Admin Notes</h5>
                            <textarea id="adminNotes" class="form-control" rows="3" 
                                      placeholder="Add notes about this enquiry...">{{ $enquiry->admin_notes }}</textarea>
                            <button class="btn btn-primary mt-2" onclick="updateNotes()">
                                <i class="bi bi-save"></i> Save Notes
                            </button>
                        </div>
                    </div>

                    <!-- Status Update -->
                    <div class="row">
                        <div class="col-12">
                            <h5>Update Status</h5>
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-warning" onclick="updateStatus('pending')">
                                    <i class="bi bi-clock"></i> Pending
                                </button>
                                <button type="button" class="btn btn-info" onclick="updateStatus('sent_to_trainers')">
                                    <i class="bi bi-envelope"></i> Sent to Trainers
                                </button>
                                <button type="button" class="btn btn-success" onclick="updateStatus('completed')">
                                    <i class="bi bi-check-circle"></i> Completed
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Email Modal -->
<div class="modal fade" id="emailModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Send Email to <span id="trainerName"></span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="emailForm">
                    <div class="mb-3">
                        <label class="form-label">Message</label>
                        <textarea class="form-control" id="emailMessage" rows="8" required
                                  placeholder="Write your message to the trainer..."></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="sendEmail()">
                    <i class="bi bi-send"></i> Send Email
                </button>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
let selectedTrainerId = null;

// Send email button click
document.querySelectorAll('.send-email-btn').forEach(btn => {
    btn.addEventListener('click', function() {
        selectedTrainerId = this.getAttribute('data-trainer-id');
        const trainerName = this.getAttribute('data-trainer-name');
        document.getElementById('trainerName').textContent = trainerName;
        document.getElementById('emailMessage').value = '';
        new bootstrap.Modal(document.getElementById('emailModal')).show();
    });
});

// Send email function
function sendEmail() {
    const message = document.getElementById('emailMessage').value.trim();
    
    if (!message) {
        alert('Please enter a message');
        return;
    }
    
    fetch("{{ route('admin.program_enquiries.send_email', $enquiry->id) }}", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": "{{ csrf_token() }}",
            "Accept": "application/json",
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            trainer_id: selectedTrainerId,
            message: message
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert(data.message);
            bootstrap.Modal.getInstance(document.getElementById('emailModal')).hide();
        } else {
            alert('Error: ' + data.message);
        }
    })
    .catch(error => {
        alert('Error sending email');
    });
}

// Update notes function
function updateNotes() {
    const notes = document.getElementById('adminNotes').value;
    
    fetch("{{ route('admin.program_enquiries.update_status', $enquiry->id) }}", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": "{{ csrf_token() }}",
            "Accept": "application/json",
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            status: "{{ $enquiry->status }}",
            admin_notes: notes
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Notes saved successfully!');
        } else {
            alert('Error: ' + data.message);
        }
    })
    .catch(error => {
        alert('Error saving notes');
    });
}

// Update status function
function updateStatus(status) {
    const notes = document.getElementById('adminNotes').value;
    
    fetch("{{ route('admin.program_enquiries.update_status', $enquiry->id) }}", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": "{{ csrf_token() }}",
            "Accept": "application/json",
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            status: status,
            admin_notes: notes
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Status updated successfully!');
            location.reload();
        } else {
            alert('Error: ' + data.message);
        }
    })
    .catch(error => {
        alert('Error updating status');
    });
}
</script>
@endpush 