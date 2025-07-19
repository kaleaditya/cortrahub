@extends('layouts.admin.app')
@section('content')
    <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row diffBxRw">
                    <div class="row g-4">
                        <!-- Total Users Card -->
                        <div class="col-xxl-3 col-md-4 col-sm-6">
                            <a href="{{ route('users.index') }}" class="text-decoration-none">
                                <div class="card info-card shadow-sm border-0">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="card-icon bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                                <i class="bi bi-people-fill fs-4"></i>
                                            </div>
                                            <div class="ms-3">
                                                <h6 class="mb-0 text-dark">My Certifications</h6>

                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h4 class="mb-0 text-primary">{{ $imagescount }}</h4>
                                            <a href="{{ route('user-images.index') }}?user_id={{ Auth::id() }}" class="btn btn-sm btn-primary">
                                                <i class="bi bi-plus-lg"></i> Add New
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <!-- Roles Card -->
                        <div class="col-xxl-3 col-md-4 col-sm-6">
                            <a href="{{ route('roles.index') }}" class="text-decoration-none">
                                <div class="card info-card shadow-sm border-0">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="card-icon bg-success text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                                <i class="bi bi-person-badge fs-4"></i>
                                            </div>
                                            <div class="ms-3">
                                                <h6 class="mb-0 text-dark">My Awards</h6>

                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h4 class="mb-0 text-success">{{ $videoscount}}</h4>
                                            <a href="{{ route('video-galleries.index') }}?user_id={{ Auth::id() }}" class="btn btn-sm btn-success">
                                                <i class="bi bi-plus-lg"></i> Add New
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>














                    </div>


                </div>
            </div>
        </div>
    </section>

    <!-- Auto-refresh script -->
    <script>
        // Refresh the page every 30 seconds
        setInterval(function() {
            location.reload();
        }, 30000);

        // Add smooth hover effects
        document.querySelectorAll('.info-card').forEach(card => {
            card.addEventListener('mouseover', function() {
                this.style.transform = 'translateY(-5px)';
                this.style.transition = 'transform 0.3s ease';
            });

            card.addEventListener('mouseout', function() {
                this.style.transform = 'translateY(0)';
            });
        });
    </script>

    <!-- Custom Styles -->
    <style>
        .info-card {
            transition: all 0.3s ease;
        }

        .info-card:hover {
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
        }

        .card-icon {
            transition: all 0.3s ease;
        }

        .info-card:hover .card-icon {
            transform: scale(1.1);
        }

        .table th {
            font-weight: 600;
            background-color: #f8f9fa;
        }

        .btn-group .btn {
            margin: 0 2px;
        }

        .badge {
            font-weight: 500;
            padding: 0.5em 0.8em;
        }

        .btn-sm {
            padding: 0.25rem 0.5rem;
            font-size: 0.875rem;
        }
    </style>
@endsection
