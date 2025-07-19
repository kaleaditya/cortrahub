<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>CORTRA</title>
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
  <link href="{{ asset('admin/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('admin/vendor/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{ asset('admin/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{ asset('admin/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('admin/vendor/simple-datatables/style.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">

</head>

<body>

  <main>

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 col-sm-9 mxWD450 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="{{ url('/') }}" class="logo d-flex align-items-center w-auto">
                  <img src="{{ asset('admin/img/logo.png') }}" alt="">
                 <!-- <span class="d-none d-lg-block">CORTA</span>-->
             
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="TitleTop">
                    <h5 class="card-title text-center pb-0 fs-4">Register Your Company</h5>
                  </div>

                  <form method="POST" action="{{ route('company.register') }}" id="login" class="lognFrm row g-3 needs-validation">
                    @csrf
                    
                     <div class="col-12">
                        <label for="company_name" class="form-label"> Company Name </label>
                        <div class="input-group has-validation inPtGp">
                            <input id="company_name" type="text" name="company_name" class="form-control setPd" value="{{ old('company_name') }}" required>
                            @error('company_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-12">
                        <label for="your_name" class="form-label">Your Name</label>
                        <div class="input-group has-validation inPtGp">
                            <input id="your_name" type="text" name="your_name" class="form-control setPd" value="{{ old('your_name') }}" required >
                            @error('your_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="email" class="form-label">Email</label>
                        <div class="input-group has-validation inPtGp">
                            <input id="email" type="email" name="email" class="form-control setPd" value="{{ old('email') }}" required >
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
                     <div class="col-12">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group has-validation inPtGp">
                            <input id="password" type="password" name="password" class="form-control setPd" required >
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <div class="input-group has-validation inPtGp">
                            <input id="password_confirmation" type="password" name="password_confirmation" class="form-control setPd" required >
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="designation" class="form-label">Designation</label>
                        <div class="input-group has-validation inPtGp">
                            <input id="designation" type="text" name="designation" class="form-control setPd" value="{{ old('designation') }}" >
                            @error('designation')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                      <div class="col-12">
                        <label for="mobile" class="form-label">Mobile No</label>
                        <div class="input-group has-validation inPtGp">
                            <input id="mobile" type="text" name="mobile" class="form-control setPd" value="{{ old('mobile') }}" >
                            @error('mobile')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                      <div class="col-12">
                        <label for="website" class="form-label">Company Website</label>
                        <div class="input-group has-validation inPtGp">
                            <input id="website" type="text" name="website" class="form-control setPd" value="{{ old('website') }}" >
                            @error('website')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                
                    <div class="col-12">
                      <button class="btn btn-primary w-100 comnBtn" type="submit">Register</button>
                    </div>
                    
                       <div class="col-12 text-center">
                                        <a href="{{ route('login') }}" class="small txtBtn">Already have an account? Log in</a>
                                    </div>

                    {{-- <div class="col-12 text-center">
                      <a href="{{ route('password.request') }}" class="small txtBtn">Forgot your password?</a>
                    </div> --}}

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
  <script src="{{ asset('admin/vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('admin/vendor/chart.js/chart.umd.js') }}"></script>
  <script src="{{ asset('admin/vendor/echarts/echarts.min.js') }}"></script>
  <script src="{{ asset('admin/vendor/quill/quill.js') }}"></script>
  <script src="{{ asset('admin/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ asset('admin/vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('admin/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('admin/js/main.js') }}"></script>

  <!-- Password Toggle Script -->

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
  <script>
      $(document).ready(function() {
          // alert("well done");

          $("#login").validate({
              errorClass: "error"
          });

      });
      </script>
      <style>
          .error {
              color: red;

          }
      </style>

</body>

</html>