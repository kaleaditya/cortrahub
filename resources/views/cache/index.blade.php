@extends('layouts.admin.app')

@section('title', 'Cache Management')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Cache Management</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Cache Status</h5>
                    <div id="cache-status" class="mb-4">
                        <div class="text-center">
                            <div class="spinner-border" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <h5 class="card-title">Clear All Caches</h5>
                    <p class="text-muted">This will clear all types of caches including config, route, view, and application cache.</p>
                    <button type="button" class="btn btn-danger" onclick="clearAllCaches()">
                        <i class="fas fa-trash"></i> Clear All Caches
                    </button>

                    <hr>

                    <h5 class="card-title">Clear Specific Cache</h5>
                    <p class="text-muted">Clear a specific type of cache.</p>
                    <div class="row">
                        <div class="col-md-3 mb-2">
                            <button type="button" class="btn btn-outline-primary w-100" onclick="clearSpecificCache('config')">
                                <i class="fas fa-cog"></i> Config Cache
                            </button>
                        </div>
                        <div class="col-md-3 mb-2">
                            <button type="button" class="btn btn-outline-primary w-100" onclick="clearSpecificCache('route')">
                                <i class="fas fa-route"></i> Route Cache
                            </button>
                        </div>
                        <div class="col-md-3 mb-2">
                            <button type="button" class="btn btn-outline-primary w-100" onclick="clearSpecificCache('view')">
                                <i class="fas fa-eye"></i> View Cache
                            </button>
                        </div>
                        <div class="col-md-3 mb-2">
                            <button type="button" class="btn btn-outline-primary w-100" onclick="clearSpecificCache('cache')">
                                <i class="fas fa-database"></i> App Cache
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 mb-2">
                            <button type="button" class="btn btn-outline-primary w-100" onclick="clearSpecificCache('compiled')">
                                <i class="fas fa-code"></i> Compiled Files
                            </button>
                        </div>
                    </div>

                    <hr>

                    <div id="result-message"></div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
// Load cache status on page load
document.addEventListener('DOMContentLoaded', function() {
    loadCacheStatus();
});

function loadCacheStatus() {
    fetch('{{ route("admin.cache.status") }}')
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                displayCacheStatus(data.status);
            } else {
                showMessage('Error loading cache status', 'danger');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showMessage('Error loading cache status', 'danger');
        });
}

function displayCacheStatus(status) {
    const statusDiv = document.getElementById('cache-status');
    const sizeInMB = (status.cache_size / (1024 * 1024)).toFixed(2);
    const sessionsSizeInMB = (status.sessions_size / (1024 * 1024)).toFixed(2);
    
    statusDiv.innerHTML = `
        <div class="row">
            <div class="col-md-6">
                <div class="card bg-light">
                    <div class="card-body">
                        <h6 class="card-title">Cache Files Status</h6>
                        <ul class="list-unstyled">
                            <li><i class="fas ${status.config_cache_exists ? 'fa-check text-success' : 'fa-times text-danger'}"></i> Config Cache: ${status.config_cache_exists ? 'Exists' : 'Not Found'}</li>
                            <li><i class="fas ${status.route_cache_exists ? 'fa-check text-success' : 'fa-times text-danger'}"></i> Route Cache: ${status.route_cache_exists ? 'Exists' : 'Not Found'}</li>
                            <li><i class="fas ${status.view_cache_exists ? 'fa-check text-success' : 'fa-times text-danger'}"></i> View Cache: ${status.view_cache_exists ? 'Exists' : 'Not Found'}</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card bg-light">
                    <div class="card-body">
                        <h6 class="card-title">Cache Size</h6>
                        <ul class="list-unstyled">
                            <li><i class="fas fa-hdd"></i> Framework Cache: ${sizeInMB} MB</li>
                            <li><i class="fas fa-hdd"></i> Sessions: ${sessionsSizeInMB} MB</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    `;
}

function clearAllCaches() {
    if (!confirm('Are you sure you want to clear all caches? This action cannot be undone.')) {
        return;
    }

    showMessage('Clearing all caches...', 'info');
    
    fetch('{{ route("admin.cache.clear.all") }}')
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showMessage('All caches cleared successfully!', 'success');
                loadCacheStatus(); // Refresh status
            } else {
                showMessage('Error: ' + data.message, 'danger');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showMessage('Error clearing caches', 'danger');
        });
}

function clearSpecificCache(type) {
    if (!confirm(`Are you sure you want to clear the ${type} cache?`)) {
        return;
    }

    showMessage(`Clearing ${type} cache...`, 'info');
    
    const formData = new FormData();
    formData.append('type', type);
    formData.append('_token', '{{ csrf_token() }}');
    
    fetch('{{ route("admin.cache.clear.specific") }}', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            showMessage(data.message, 'success');
            loadCacheStatus(); // Refresh status
        } else {
            showMessage('Error: ' + data.message, 'danger');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showMessage('Error clearing cache', 'danger');
    });
}

function showMessage(message, type) {
    const resultDiv = document.getElementById('result-message');
    resultDiv.innerHTML = `
        <div class="alert alert-${type} alert-dismissible fade show" role="alert">
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    `;
    
    // Auto-hide after 5 seconds
    setTimeout(() => {
        const alert = resultDiv.querySelector('.alert');
        if (alert) {
            alert.remove();
        }
    }, 5000);
}
</script>
@endsection 