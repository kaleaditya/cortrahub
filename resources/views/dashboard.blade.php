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
                                                <h6 class="mb-0 text-dark">Member Directory</h6>
                                                <small class="text-muted">Registered Directory</small>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h4 class="mb-0 text-primary">{{ \App\Models\User::count() }}</h4>
                                            <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary">
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
                                                <h6 class="mb-0 text-dark">Category</h6>
                                                <small class="text-muted">User Category</small>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h4 class="mb-0 text-success">{{ \Spatie\Permission\Models\Role::count() }}</h4>
                                            <a href="{{ route('roles.create') }}" class="btn btn-sm btn-success">
                                                <i class="bi bi-plus-lg"></i> Add New
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>







                        <!-- Experiences Card -->
                        <div class="col-xxl-3 col-md-4 col-sm-6">
                            <a href="{{ route('experiences.index') }}" class="text-decoration-none">
                                <div class="card info-card shadow-sm border-0">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="card-icon bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                                <i class="bi bi-briefcase fs-4"></i>
                                            </div>
                                            <div class="ms-3">
                                                <h6 class="mb-0 text-dark">Speciality</h6>
                                                <small class="text-muted">Total Speciality</small>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h4 class="mb-0 text-primary">{{ \App\Models\Experience::count() }}</h4>
                                            <a href="{{ route('experiences.create') }}" class="btn btn-sm btn-primary">
                                                <i class="bi bi-plus-lg"></i> Add New
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <!-- Languages Card -->
                        <div class="col-xxl-3 col-md-4 col-sm-6">
                            <a href="{{ route('languages.index') }}" class="text-decoration-none">
                                <div class="card info-card shadow-sm border-0">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="card-icon bg-success text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                                <i class="bi bi-translate fs-4"></i>
                                            </div>
                                            <div class="ms-3">
                                                <h6 class="mb-0 text-dark">Languages</h6>
                                                <small class="text-muted">Total Languages</small>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h4 class="mb-0 text-success">{{ \App\Models\Language::count() }}</h4>
                                            <a href="{{ route('languages.create') }}" class="btn btn-sm btn-success">
                                                <i class="bi bi-plus-lg"></i> Add New
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <!-- Products Card -->
                        <div class="col-xxl-3 col-md-4 col-sm-6">
                            <a href="{{ route('products.index') }}" class="text-decoration-none">
                                <div class="card info-card shadow-sm border-0">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="card-icon bg-warning text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                                <i class="bi bi-box-seam fs-4"></i>
                                            </div>
                                            <div class="ms-3">
                                                <h6 class="mb-0 text-dark">Programs</h6>
                                                <small class="text-muted">Total Programs</small>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h4 class="mb-0 text-warning">{{ \App\Models\Product::count() }}</h4>
                                            <a href="{{ route('products.create') }}" class="btn btn-sm btn-warning">
                                                <i class="bi bi-plus-lg"></i> Add New
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <!-- CMS Pages Card -->
                        <div class="col-xxl-3 col-md-4 col-sm-6">
                            <a href="{{ route('cms.index') }}" class="text-decoration-none">
                                <div class="card info-card shadow-sm border-0">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="card-icon bg-info text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                                <i class="bi bi-file-text fs-4"></i>
                                            </div>
                                            <div class="ms-3">
                                                <h6 class="mb-0 text-dark">CMS Pages</h6>
                                                <small class="text-muted">Total Pages</small>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h4 class="mb-0 text-info">{{ \App\Models\Cms::count() }}</h4>
                                            <a href="{{ route('cms.create') }}" class="btn btn-sm btn-info">
                                                <i class="bi bi-plus-lg"></i> Add New
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- Recent Users Table -->
                    <div class="col-12 mt-4">
                        <div class="card shadow-sm border-0">
                            <div class="card-header bg-transparent border-0">
                                <h5 class="card-title mb-0">Recent Users</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Roles</th>
                                                <th>Status</th>
                                                <th>Registered</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach(\App\Models\User::latest()->take(5)->get() as $user)
                                            <tr>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>
                                                    @foreach($user->roles as $role)
                                                        <span class="badge bg-info">{{ $role->name }}</span>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @if($user->is_active)
                                                        <span class="badge bg-success">Active</span>
                                                    @else
                                                        <span class="badge bg-warning text-dark">Inactive</span>
                                                    @endif
                                                </td>
                                                <td>{{ $user->created_at->diffForHumans() }}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-primary">
                                                            <i class="bi bi-pencil"></i>
                                                        </a>
                                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">
                                                                <i class="bi bi-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
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