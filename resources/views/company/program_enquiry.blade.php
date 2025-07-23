<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Program Enquiry - Cortra</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <style>
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            font-size: 14px;
            line-height: 20px;
            color: #000;
            background: #e4e4e4;
        }

        /* Header Styles */
        .bg-primary {
            background-color: #0d6efd !important;
        }

        .text-decoration-none:hover {
            color: #ffc107 !important;
        }

        .btn-outline-light {
            border-color: #fff;
            color: #fff;
        }

        .btn-outline-light:hover {
            background-color: #fff;
            color: #0d6efd;
        }

        .btn-success {
            background-color: #198754;
            border-color: #198754;
        }

        .btn-success:hover {
            background-color: #157347;
            border-color: #146c43;
        }

        .btn-warning {
            background-color: #ffc107;
            border-color: #ffc107;
            color: #000;
        }

        .btn-warning:hover {
            background-color: #ffca2c;
            border-color: #ffc720;
            color: #000;
        }

        /* Hero Section */
        .top-section {
            background-image: url('{{ asset("front/images/cover-page.jpg") }}');
            background-size: cover;
            background-position: center;
            padding: 60px 0;
            position: relative;
        }

        .top-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
        }

        .top-section .container {
            position: relative;
            z-index: 2;
        }

        .hero-content {
            text-align: center;
            color: #fff;
        }

        .hero-content h1 {
            font-size: 48px;
            font-weight: bold;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .hero-content p {
            font-size: 20px;
            margin-bottom: 30px;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
        }



        /* Content Section */
        .content-section {
            background: #fff;
            padding: 40px 0;
        }

        .section-title {
            color: #333;
            font-weight: bold;
            margin-bottom: 30px;
            text-align: center;
            font-size: 28px;
            position: relative;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background: #F39231;
            border-radius: 2px;
        }

        /* Cards */
        .trainer-card {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            border: 1px solid #ddd;
            margin-bottom: 20px;
            cursor: pointer;
        }

        .trainer-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        .trainer-card.selected {
            border: 2px solid #28a745;
            background-color: #f8fff9;
        }

        .trainer-card {
            position: relative;
        }

        .trainer-card::after {
            content: "Click to select";
            position: absolute;
            top: 10px;
            right: 10px;
            background: rgba(0,0,0,0.7);
            color: white;
            padding: 2px 8px;
            border-radius: 4px;
            font-size: 10px;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .trainer-card:hover::after {
            opacity: 1;
        }

        .trainer-card.selected::after {
            content: "Selected";
            background: #28a745;
        }

        .category-card {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            border: 2px solid transparent;
            transition: all 0.3s ease;
            margin-bottom: 20px;
        }

        .category-card:hover {
            border-color: #F39231;
            transform: translateY(-3px);
        }

        /* Form Styles */
        .form-control, .form-select {
            border: 2px solid #ddd;
            border-radius: 8px;
            padding: 12px 15px;
            transition: all 0.3s ease;
            background: #fff;
        }

        .form-control:focus, .form-select:focus {
            border-color: #F39231;
            box-shadow: 0 0 0 0.2rem rgba(243, 146, 49, 0.25);
        }

        .form-label {
            font-weight: bold;
            color: #333;
            margin-bottom: 8px;
        }

        /* Buttons */
        .btn-primary {
            background: #F39231;
            border: none;
            border-radius: 8px;
            padding: 12px 30px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background: #C03A38;
            transform: translateY(-2px);
        }

        .btn-danger {
            background: #FA0322;
            border: none;
            border-radius: 8px;
            padding: 15px 40px;
            font-weight: 600;
            font-size: 18px;
            transition: all 0.3s ease;
        }

        .btn-danger:hover {
            background: #E0021E;
            transform: translateY(-2px);
        }

        .btn-outline-danger {
            border-color: #FA0322;
            color: #FA0322;
        }

        .btn-outline-danger:hover {
            background: #FA0322;
            border-color: #FA0322;
        }

        /* Budget Guidelines */
        .budget-guidelines {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 15px;
            border-left: 4px solid #F39231;
            margin-top: 10px;
        }

        /* Alerts */
        .alert {
            border-radius: 8px;
            border: none;
            margin-bottom: 20px;
        }

        /* Responsive */
        @media only screen and (max-width: 767px) {
            .hero-content h1 {
                font-size: 32px;
            }
            
            .hero-content p {
                font-size: 16px;
            }
        }

        @media only screen and (max-width: 480px) {
            .hero-content h1 {
                font-size: 24px;
            }
            
            .section-title {
                font-size: 22px;
            }
        }
    </style>
</head>

<body>
    <!-- Header -->
    <div class="bg-primary text-white py-2">
        <div class="container">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center">

                <!-- Left: Logo -->
                <div class="mb-2 mb-md-0 text-center text-md-start">
                    <a href="{{route('front.home')}}">
                        <img src="{{ asset('assets/images/logo.png') }}" alt="Cortra Logo" height="50" class="rounded p-1">
                    </a>
                </div>

                <!-- Right: Contact + Buttons -->
                <div class="w-100">
                    <!-- Top Row: Home, WhatsApp, Email -->
                    <div class="d-flex justify-content-center justify-content-md-end flex-wrap gap-2 mb-2">
                        <a href="{{route('front.home')}}" class="text-white text-decoration-none">
                            <i class="bi bi-house-door-fill me-1"></i> Home
                        </a>
                        <a href="https://wa.me/971522656679" class="text-white text-decoration-none">
                            <i class="bi bi-whatsapp me-1"></i> WhatsApp
                        </a>
                        <a href="mailto:info@cortrahub.com" class="text-white text-decoration-none">
                            <i class="bi bi-envelope me-1"></i> Email
                        </a>
                    </div>

                    <!-- Bottom Row: Welcome Message and Logout OR Login Button -->
                    <div class="d-flex justify-content-center justify-content-md-end gap-2">
                        @if(Auth::check())
                            <!-- Logged in User -->
                            <span class="text-white d-flex align-items-center me-3">
                                <i class="bi bi-person-check me-2"></i>Welcome, {{ Auth::user()->name }}!
                            </span>
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-outline-light">
                                    <i class="bi bi-box-arrow-right me-2"></i>Logout
                                </button>
                            </form>
                        @elseif(Auth::guard('company')->check())
                            <!-- Logged in Company -->
                            <span class="text-white d-flex align-items-center me-3">
                                <i class="bi bi-building-check me-2"></i>Welcome, {{ Auth::guard('company')->user()->company_name }}!
                            </span>
                            <a href="{{ route('company.program_enquiry') }}" class="btn btn-success me-2">
                                <i class="bi bi-list-check me-2"></i>Go to List
                            </a>
                            <form action="{{ route('company.logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-outline-light">
                                    <i class="bi bi-box-arrow-right me-2"></i>Logout
                                </button>
                            </form>
                        @else
                            <!-- Not logged in - Show Login Button -->
                            <a href="{{route('login')}}" target="_blank" class="btn btn-warning">
                                <i class="bi bi-box-arrow-in-right me-2"></i>Login
                            </a>
                        @endif
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    <!-- Hero Section -->
    <div class="top-section">
        <div class="container">
            <div class="hero-content">
                <h1>Program Enquiry</h1>
                <p>Submit your training program requirements and connect with expert trainers</p>
            </div>
        </div>
    </div>



    <!-- Content Section -->
    <div class="content-section">
        <div class="container">
            <!-- Success/Error Messages -->
            <div id="messageContainer"></div>

            <!-- Shortlisted Experts Section -->
            <h2 class="section-title">SHORTLISTED EXPERTS</h2>
            
            @if(!empty($trainersByCategory))
                <!-- Category Selection -->
                <div class="row mb-5">
                    <div class="col-12">
                        <div class="category-card p-4">
                            <h5 class="mb-4 text-center">
                                <i class="bi bi-funnel me-2"></i>Select Category for Program
                            </h5>
                            <div class="row">
                                @foreach($trainersByCategory as $category => $trainers)
                                <div class="col-md-3 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input category-radio" type="radio" name="selected_category" 
                                               id="category_{{ $loop->index }}" value="{{ $category }}" 
                                               data-category="{{ $category }}" data-count="{{ count($trainers) }}">
                                        <label class="form-check-label fw-bold" for="category_{{ $loop->index }}">
                                            {{ $category }} ({{ count($trainers) }} trainers)
                                        </label>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Selected Trainers Row (always visible) -->
                <div id="selectedTrainersSummary" class="mb-5">
                    <h3 class="section-title">SELECTED TRAINERS</h3>
                    <div class="row flex-nowrap overflow-auto" id="selectedTrainersList">
                        <!-- Selected trainers will be displayed here -->
                    </div>
                    <div id="noSelectedTrainersMsg" class="text-muted text-center" style="display:none;">No trainers selected. Click a trainer card to add.</div>
                </div>

                <!-- Trainers Grid by Category -->
                @foreach($trainersByCategory as $category => $trainers)
                <div class="category-section mb-5" data-category="{{ $category }}" style="display: none;">
                    <h3 class="section-title">{{ $category }} TRAINERS</h3>
                    <div class="alert alert-info mb-4">
                        <i class="bi bi-info-circle me-2"></i>
                        <strong>How to select trainers:</strong> Click on any trainer card to select them. Selected trainers will appear in the row above.
                    </div>
                    <div class="row">
                        @foreach($trainers as $trainer)
                        <div class="col-md-3 col-sm-6 mb-4">
                            <div class="trainer-card h-100 text-center p-4" data-trainer-id="{{ $trainer->id }}" data-trainer-name="{{ $trainer->name }}" data-trainer-image="{{ asset('all_image/'.$trainer->image) }}" data-trainer-category="{{ $category }}">
                                <img src="{{ asset('all_image/'.$trainer->image) }}" class="rounded-circle mb-3" alt="Expert" width="80" height="80" style="object-fit: cover;">
                                <h6 class="card-title fw-bold">{{ $trainer->name }}</h6>
                                <p class="card-text small text-muted mb-2">
                                    <i class="bi bi-geo-alt"></i> {{ $trainer->city_info->name ?? 'Location not specified' }}
                                </p>
                                <p class="card-text small text-muted mb-3">
                                    <i class="bi bi-person-badge"></i> {{ $category }}
                                </p>
                                <div class="d-flex justify-content-center gap-2">
                                    <button class="btn btn-sm btn-outline-primary view-profile-btn" data-trainer-id="{{ $trainer->id }}" data-trainer-slug="{{ $trainer->slug }}">
                                        <i class="bi bi-eye"></i> View
                                    </button>
                                    <button class="btn btn-sm btn-outline-danger remove-trainer-btn" data-trainer-id="{{ $trainer->id }}">
                                        <i class="bi bi-trash"></i> Remove
                                    </button>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
            @else
                <div class="text-center">
                    <div class="alert alert-info">
                        <i class="bi bi-info-circle me-2"></i> No trainers in your wishlist. 
                        <a href="/" class="alert-link">Add some trainers</a> to get started.
                    </div>
                </div>
            @endif

            <!-- Program Details Form -->
            <h2 class="section-title">PROGRAM DETAILS FOR SELECTED TRAINERS</h2>
            
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

                            <form method="POST" action="{{ route('company.submit_enquiry') }}" enctype="multipart/form-data" id="programEnquiryForm">
                    @csrf
                    <input type="hidden" name="selected_trainers" id="selectedTrainersInput">
                
                <!-- Date and Program Brief -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <label class="form-label">Date</label>
                        <input type="date" name="date" class="form-control" required min="{{ date('Y-m-d') }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Program Brief</label>
                        <textarea name="program_brief" class="form-control" rows="3" required 
                                  minlength="10" maxlength="2000" 
                                  placeholder="Describe your training program requirements..."></textarea>
                    </div>
                </div>

                <!-- Location and Upload PDF -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <label class="form-label">Location</label>
                        <input type="text" name="location" class="form-control" required maxlength="255" 
                               placeholder="Enter training location">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Upload PDF (Optional)</label>
                        <input type="file" name="pdf" class="form-control" accept=".pdf">
                        <small class="text-muted">Maximum file size: 5MB</small>
                    </div>
                </div>

                <!-- Duration and Selected Category -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <label class="form-label">Duration (Hours)</label>
                        <input type="number" name="duration" class="form-control" required min="1" max="24" 
                               placeholder="Enter duration in hours">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Selected Category</label>
                        <input type="text" id="selectedCategoryDisplay" class="form-control" readonly 
                               placeholder="Select a category above">
                        <input type="hidden" name="selected_category" id="selectedCategoryInput">
                    </div>
                </div>

                <!-- Budget and Start Time -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <label class="form-label">Budget for Selected Category</label>
                        <div class="input-group">
                            <span class="input-group-text">₹</span>
                            <input type="number" name="budget" id="categoryBudget" class="form-control" 
                                   min="0" step="any" placeholder="Enter budget for selected category">
                        </div>
                        <div class="budget-guidelines">
                            <strong>Budget Guidelines:</strong><br>
                            <span id="budgetGuidelines">Select a category to see budget guidelines</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Start Time</label>
                        <input type="time" name="start_time" class="form-control" required>
                    </div>
                </div>

                <!-- Attendees -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <label class="form-label">Number of Attendees</label>
                        <input type="number" name="attendees" class="form-control" min="1" max="1000" required 
                               placeholder="Enter number of attendees">
                    </div>
                </div>

                                    <!-- Submit Button -->
                    <div class="text-center mt-5">
                        <button type="submit" id="submitBtn" class="btn btn-danger px-5" disabled>
                            <i class="bi bi-envelope me-2"></i>SAVE ENQUIRY
                        </button>
                    </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Category selection functionality
        const budgetGuidelines = {
            'Cross Level': '₹15,000 - ₹25,000 per session',
            'Entry Level': '₹8,000 - ₹15,000 per session',
            'Middle Management': '₹20,000 - ₹35,000 per session',
            'Top Management': '₹35,000 - ₹50,000 per session'
        };

        // Message display function
        function showMessage(message, type) {
            const container = document.getElementById('messageContainer');
            const alertClass = type === 'success' ? 'alert-success' : 'alert-danger';
            const icon = type === 'success' ? 'bi-check-circle' : 'bi-exclamation-triangle';
            
            container.innerHTML = `
                <div class="alert ${alertClass} alert-dismissible fade show" role="alert">
                    <i class="bi ${icon} me-2"></i> ${message}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            `;
            
            // Auto-hide after 5 seconds
            setTimeout(() => {
                const alert = container.querySelector('.alert');
                if (alert) {
                    alert.remove();
                }
            }, 5000);
        }

        // Global variables to track selected trainers
        let selectedTrainers = [];
        let selectedCategory = '';

        // Always show selected trainers row, update message if empty
        function updateSelectedTrainersDisplay() {
            const container = document.getElementById('selectedTrainersList');
            const selectedTrainersInput = document.getElementById('selectedTrainersInput');
            const noMsg = document.getElementById('noSelectedTrainersMsg');
            if (selectedTrainers.length === 0) {
                if (noMsg) noMsg.style.display = '';
                container.innerHTML = '';
                selectedTrainersInput.value = '';
            } else {
                if (noMsg) noMsg.style.display = 'none';
                container.innerHTML = '';
                selectedTrainers.forEach(trainer => {
                    const trainerCard = `
                        <div class="col-auto mb-2">
                            <div class="trainer-card selected h-100 text-center p-2" style="min-width:120px;">
                                <img src="${trainer.image}" class="rounded-circle mb-1" alt="Expert" width="50" height="50" style="object-fit: cover;">
                                <div class="fw-bold small">${trainer.name}</div>
                                <button class="btn btn-xs btn-outline-danger remove-selected-trainer mt-1" data-trainer-id="${trainer.id}">
                                    <i class="bi bi-x"></i>
                                </button>
                            </div>
                        </div>
                    `;
                    container.innerHTML += trainerCard;
                });
            }
            selectedTrainersInput.value = JSON.stringify(selectedTrainers);
            // Enable/disable submit button based on trainer selection
            const submitBtn = document.getElementById('submitBtn');
            if (selectedTrainers.length > 0) {
                submitBtn.disabled = false;
                submitBtn.innerHTML = '<i class="bi bi-envelope me-2"></i>SAVE ENQUIRY (' + selectedTrainers.length + ' trainers)';
            } else {
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<i class="bi bi-envelope me-2"></i>SAVE ENQUIRY';
            }
            // Add event listeners to remove buttons
            document.querySelectorAll('.remove-selected-trainer').forEach(btn => {
                btn.addEventListener('click', function() {
                    const trainerId = this.getAttribute('data-trainer-id');
                    selectedTrainers = selectedTrainers.filter(trainer => trainer.id != trainerId);
                    updateSelectedTrainersDisplay();
                });
            });
        }

        function attachTrainerCardHandlers() {
            document.querySelectorAll('.category-section').forEach(section => {
                section.querySelectorAll('.trainer-card').forEach(card => {
                    card.onclick = function(e) {
                        if (e.target.closest('.btn')) return;
                        const trainerId = card.getAttribute('data-trainer-id');
                        const trainerName = card.getAttribute('data-trainer-name');
                        const trainerImage = card.getAttribute('data-trainer-image');
                        const trainerCategory = card.getAttribute('data-trainer-category');
                        const existingIndex = selectedTrainers.findIndex(t => t.id == trainerId);
                        if (existingIndex === -1) {
                            selectedTrainers.push({ id: trainerId, name: trainerName, image: trainerImage, category: trainerCategory });
                            card.classList.add('selected');
                        } else {
                            selectedTrainers.splice(existingIndex, 1);
                            card.classList.remove('selected');
                        }
                        updateSelectedTrainersDisplay();
                    };
                });
            });
        }

        function showSelectedCategorySection() {
            // Hide all
            document.querySelectorAll('.category-section').forEach(function(section) {
                section.style.display = 'none';
            });
            // Show selected
            var checkedRadio = document.querySelector('.category-radio:checked');
            if (checkedRadio) {
                var selectedCategory = checkedRadio.value;
                var selectedSection = document.querySelector('.category-section[data-category="' + selectedCategory + '"]');
                if (selectedSection) {
                    selectedSection.style.display = 'block';
                }
                // Update the Selected Category field
                document.getElementById('selectedCategoryDisplay').value = selectedCategory;
                document.getElementById('selectedCategoryInput').value = selectedCategory;
                // Enable the submit button if trainers are selected
                updateSelectedTrainersDisplay();
                // Attach click handlers to trainer cards
                attachTrainerCardHandlers();
            }
        }

        document.querySelectorAll('.category-radio').forEach(function(radio) {
            radio.addEventListener('change', showSelectedCategorySection);
        });

        document.addEventListener('DOMContentLoaded', function() {
            // If no radio is checked, check the first one
            var checkedRadio = document.querySelector('.category-radio:checked');
            if (!checkedRadio) {
                var firstRadio = document.querySelector('.category-radio');
                if (firstRadio) {
                    firstRadio.checked = true;
                }
            }
            showSelectedCategorySection();
        });

        // View profile functionality
        document.querySelectorAll('.view-profile-btn').forEach(function(btn) {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                const trainerSlug = btn.getAttribute('data-trainer-slug');
                if (trainerSlug) {
                    window.open(`/directory-details/${trainerSlug}`, '_blank');
                }
            });
        });

        // Remove trainer functionality
        document.querySelectorAll('.remove-trainer-btn').forEach(function(btn) {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                const trainerId = btn.getAttribute('data-trainer-id');
                const card = btn.closest('.col-md-3');
                
                if (confirm('Are you sure you want to remove this trainer from your wishlist?')) {
                    fetch("{{ route('company.remove_from_list', '') }}/" + trainerId, {
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
                            card.remove();
                            showMessage(data.message, 'success');
                            
                            // Refresh page if no trainers left
                            if (document.querySelectorAll('.trainer-card').length === 0) {
                                setTimeout(() => {
                                    window.location.reload();
                                }, 2000);
                            }
                        } else {
                            showMessage(data.message, 'error');
                        }
                    })
                    .catch(error => {
                        showMessage('Error removing trainer from wishlist.', 'error');
                    });
                }
            });
        });

        // Form submission functionality
        const enquiryForm = document.getElementById('programEnquiryForm');
        if (enquiryForm) {
            enquiryForm.addEventListener('submit', function(e) {
                // Always update hidden input before submit
                document.getElementById('selectedTrainersInput').value = JSON.stringify(selectedTrainers);
            });
        }

        // Send to admin functionality
        document.getElementById('sendToAdminBtn').addEventListener('click', function() {
            if (selectedTrainers.length === 0) {
                showMessage('Please select at least one trainer first.', 'error');
                return;
            }
            
            const btn = this;
            const originalText = btn.innerHTML;
            
            // Disable button and show loading
            btn.disabled = true;
            btn.innerHTML = '<i class="bi bi-hourglass-split"></i> Sending...';
            
            // Get form data
            const formData = new FormData(document.getElementById('programEnquiryForm'));
            formData.set('selected_trainers', JSON.stringify(selectedTrainers));
            formData.set('send_to_admin', '1');
            
            fetch("{{ route('company.send_enquiry_to_admin') }}", {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    "Accept": "application/json"
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showMessage(data.message, 'success');
                } else {
                    showMessage(data.message, 'error');
                }
            })
            .catch(error => {
                showMessage('Error sending enquiry to admin.', 'error');
            })
            .finally(() => {
                // Re-enable button
                btn.disabled = false;
                btn.innerHTML = originalText;
            });
        });

        // Show success message if exists
        @if(Session::has('success'))
            showMessage("{{ session('success') }}", 'success');
        @endif

        @if(Session::has('error'))
            showMessage("{{ session('error') }}", 'error');
        @endif
    </script>
</body>
</html> 