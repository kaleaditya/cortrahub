@extends('layouts.admin.app')
@section('content')
<div class="container py-4">
    <h4 class="text-center mb-4 fw-bold">SHORT LISTED EXPERTS</h4>
    <div class="d-flex justify-content-center flex-wrap mb-5">
        @foreach($shortlistedTrainers as $trainer)
            <div class="text-center m-2">
                <img src="{{ asset('all_image/'.$trainer->image) }}" class="rounded-circle mb-2" alt="Expert" width="100" height="100">
                <div class="fw-bold">{{ $trainer->name }}</div>
                <div>Location: {{ $trainer->city_info->name ?? '' }}</div>
                <div>{{ $trainer->getRoleNames()->first() ?? '' }} Trainer</div>
                <button class="btn btn-sm btn-outline-danger remove-trainer-btn" data-trainer-id="{{ $trainer->id }}">Remove</button>
            </div>
        @endforeach
    </div>
    <div class="text-center mb-4">
        <a href="/" class="btn btn-primary">Add More</a>
    </div>

    <h5 class="text-center fw-bold mb-4">PROGRAM DETAILS FOR SELECTED TRAINERS</h5>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('company.submit_enquiry') }}" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col-md-6">
                <label>Date</label>
                <input type="date" name="date" class="form-control" required min="{{ date('Y-m-d') }}">
            </div>
            <div class="col-md-6">
                <label>Program Brief</label>
                <textarea name="program_brief" class="form-control" rows="3" required minlength="10" maxlength="2000"></textarea>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label>Location</label>
                <input type="text" name="location" class="form-control" required maxlength="255">
            </div>
            <div class="col-md-6">
                <label>Upload PDF</label>
                <input type="file" name="pdf" class="form-control" accept=".pdf">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label>Duration (Hours)</label>
                <input type="number" name="duration" class="form-control" required min="1" max="24">
            </div>
            <div class="col-md-6">
                <label>Approx Budget</label>
                <input type="number" name="budget" class="form-control" min="0" step="any">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label>Start Time</label>
                <input type="time" name="start_time" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label>Attendees</label>
                <input type="number" name="attendees" class="form-control" min="1" max="1000" required>
            </div>
        </div>
        <div class="text-center mt-4">
            <button type="submit" class="btn btn-danger px-5">SEND EMAIL</button>
        </div>
    </form>
</div>
<script>
    document.querySelectorAll('.remove-trainer-btn').forEach(function(btn) {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const trainerId = btn.getAttribute('data-trainer-id');
            fetch("{{ url('company/remove-from-list') }}/" + trainerId, {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    "Accept": "application/json",
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({})
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    btn.closest('.text-center').remove();
                } else {
                    alert(data.message || "Error removing from list.");
                }
            });
        });
    });
</script>
@endsection 