<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>CORTRA- Register</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('admin/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('admin/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('admin/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        .error {
            color: red;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }
    </style>
</head>
<body>
    <main>
        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-8 col-sm-9 mxWD450 d-flex flex-column align-items-center justify-content-center">
                        <div class="d-flex justify-content-center py-4">
                            <a href="{{ url('/') }}" class="logo d-flex align-items-center w-auto">
                                <img src="{{ asset('admin/img/logo.png') }}" alt="Cortra Logo">
            
                            </a>
                        </div><!-- End Logo -->

                        <div class="card mb-3">
                            
                            {{-- Show Success Message --}}
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

{{-- Show General Error --}}
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

{{-- Show Validation Errors --}}
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $msg)
                <li>{{ $msg }}</li>
            @endforeach
        </ul>
    </div>
@endif



                            <div class="card-body">
                                <div class="TitleTop">
                                    <h5 class="card-title text-center pb-0 fs-4">Register As a Trainer</h5>
                                </div>

                                <form method="POST" action="{{ route('registrtion_store') }}" id="registration_form" enctype="multipart/form-data" class="row g-3 needs-validation">
                                    @csrf
                                    <div class="col-12 col-md-6">
                                        <label for="name" class="form-label">Name *</label>
                                        <div class="input-group has-validation">
                                            <input type="text" id="name" name="name" class="form-control setPd" maxlength="200" minlength="2" value="{{ old('name') }}" required>
                                        </div>
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <label for="phone" class="form-label">Mobile No. *</label>
                                        <div class="input-group has-validation">
                                            <input type="text" id="phone" name="phone" class="form-control setPd" maxlength="13" minlength="10" value="{{ old('phone') }}" required onkeypress="return /[0-9+]/i.test(event.key)">
                                        </div>
                                        @error('phone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <label for="email" class="form-label">Email ID *</label>
                                        <div class="input-group has-validation">
                                            <input type="email" id="email" name="email" class="form-control setPd" maxlength="200" minlength="2" value="{{ old('email') }}" required>
                                        </div>
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <label for="whatsapp" class="form-label">WhatsApp *</label>
                                        <div class="input-group has-validation">
                                            <input type="text" id="whatsapp" name="whatsapp" class="form-control setPd" maxlength="12" minlength="10" value="{{ old('whatsapp') }}" required onkeypress="return /[0-9+]/i.test(event.key)">
                                        </div>
                                        @error('whatsapp')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-12">
                                        <label for="register_as" class="form-label">Register (Select Multiple Options) :  *</label>
                                        <div class="input-group has-validation">
                                            <select id="register_as" name="register_as[]" class="form-control setPd open-dropdown" multiple required  style="height: 90px;">
                                                <option value="">Select .. </option>
                                                @foreach($rolesDate as $role)
                                                    <option value="{{ $role->id }}" {{ (collect(old('register_as'))->contains($role->id)) ? 'selected' : '' }}>{{ $role->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('register_as')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-12">
                                        <label for="plan_type" class="form-label">Select Your Plan *</label>
                                        <div class="input-group has-validation">
                                            <select id="plan_type" name="plan_type" class="form-select" required>
                                                <option value="">Choose the plan that suits you...</option>
                                                @foreach($plans as $plan)
                                                    <option value="{{ $plan->value }}" @if(!$plan->is_enabled) disabled @endif>{{ $plan->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <button class="btn btn-primary w-100 comnBtn" type="submit">Register</button>
                                    </div>

                                    <div class="col-12 text-center">
                                        <a href="{{ route('login') }}" class="small txtBtn">Already have an account? Log in</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/js/main.js') }}"></script>

    <!-- jQuery and Validation -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <script>
        jQuery.validator.addMethod("lettersonly", function(value, element) {
            return this.optional(element) || /^[a-z ]+$/i.test(value);
        }, "Letters only please");

        $(document).ready(function() {
            $("#registration_form").validate({
                rules: {
                    name: { required: true, lettersonly: true, minlength: 2, maxlength: 200 },
                    phone: { required: true, number: true, minlength: 10, maxlength: 13 },
                    email: { required: true, email: true, minlength: 2, maxlength: 200 },
                    whatsapp: { required: true, number: true, minlength: 10, maxlength: 12 },
                    register_as: { required: true }
                },
                errorClass: "error",
                errorPlacement: function(error, element) {
                    error.insertAfter(element.parent());
                }
            });
        });
    </script>
</body>
</html>