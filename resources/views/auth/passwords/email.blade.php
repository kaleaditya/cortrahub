<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Cortra</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('admin')}}/img/favicon.png" rel="icon">
  <link href="{{asset('admin')}}/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('admin')}}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{asset('admin')}}/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{asset('admin')}}/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="{{asset('admin')}}/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="{{asset('admin')}}/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="{{asset('admin')}}/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="{{asset('admin')}}/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('admin')}}/css/style.css" rel="stylesheet">

  <style>
    .login-type-selector {
      margin-bottom: 20px;
    }
    
    .login-type-selector .form-select {
      border-radius: 8px;
      border: 2px solid #e9ecef;
      padding: 12px 15px;
      font-size: 16px;
      background-color: #fff;
      transition: all 0.3s ease;
    }
    
    .login-type-selector .form-select:focus {
      border-color: #007bff;
      box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }
    
    .login-type-selector .form-label {
      font-weight: 600;
      color: #495057;
      margin-bottom: 8px;
    }
  </style>

</head>

<body>

  <main>

     <section class="min-vh-100 d-flex align-items-center justify-content-center bg-light">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 col-lg-4">

        <div class="card shadow rounded-4">
          <div class="card-body p-4">

            <h4 class="text-center mb-4">Reset Your Password</h4>

            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif

            <!-- Login Type Selector -->
            <div class="login-type-selector">
              <label for="loginType" class="form-label">Reset password for:</label>
              <select class="form-select" id="loginType" name="loginType">
                <option value="trainer" selected>Trainer Account</option>
                <option value="company">Company Account</option>
              </select>
            </div>

            <form method="POST" action="{{ route('password.email') }}" id="passwordResetForm" class="needs-validation" novalidate>
              @csrf

              <div class="mb-3">
                <label for="email" class="form-label">{{ __('Email Address') }}</label>
                <input type="email" 
                       class="form-control @error('email') is-invalid @enderror" 
                       id="email" 
                       name="email" 
                       value="{{ old('email') }}" 
                       required 
                       autocomplete="email" 
                       autofocus>
                @error('email')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>

              <div class="d-grid">
                <button type="submit" class="btn btn-primary">{{ __('Send Password Reset Link') }}</button>
              </div>
            </form>

          </div>
        </div>

      </div>
    </div>
  </div>
</section>

  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('admin')}}/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="{{asset('admin')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{asset('admin')}}/vendor/chart.js/chart.umd.js"></script>
  <script src="{{asset('admin')}}/vendor/echarts/echarts.min.js"></script>
  <script src="{{asset('admin')}}/vendor/quill/quill.js"></script>
  <script src="{{asset('admin')}}/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="{{asset('admin')}}/vendor/tinymce/tinymce.min.js"></script>
  <script src="{{asset('admin')}}/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('admin')}}/js/main.js"></script>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
      $(document).ready(function() {
          // Handle login type change
          $('#loginType').change(function() {
              var loginType = $(this).val();
              var form = $('#passwordResetForm');
              
              if (loginType === 'company') {
                  // For now, we'll use the same route but you can create a specific company password reset route
                  form.attr('action', '{{ route("password.email") }}');
                  // You can add a hidden field to identify it's for company
                  if (form.find('input[name="user_type"]').length === 0) {
                      form.append('<input type="hidden" name="user_type" value="company">');
                  } else {
                      form.find('input[name="user_type"]').val('company');
                  }
              } else {
                  form.attr('action', '{{ route("password.email") }}');
                  if (form.find('input[name="user_type"]').length > 0) {
                      form.find('input[name="user_type"]').val('trainer');
                  }
              }
          });
      });
  </script>

</body>

</html>