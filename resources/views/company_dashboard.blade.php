@extends('layouts.admin.app')
@section('content')
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="row diffBxRw">
                    <div class="col-12">
                        <div class="card info-card shadow-sm border-0 mt-4">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="card-icon bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                        <i class="bi bi-building fs-4"></i>
                                    </div>
                                    <div class="ms-3">
                                        <h4 class="mb-0 text-dark">Welcome, {{ $company->company_name }}</h4>
                                        <small class="text-muted">Company Dashboard</small>
                                    </div>
                                </div>
                                <div>
                                    <h5>Hello, {{ $company->contact_name }}!</h5>
                                    <p>This is your company dashboard. Here you can manage your trainers and company profile.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- You can add more dashboard cards here for company-specific stats or actions -->
                </div>
            </div>
        </div>
    </section>
@endsection 