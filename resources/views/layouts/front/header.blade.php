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

        <!-- Bottom Row: Buttons -->
        <div class="d-flex justify-content-center justify-content-md-end gap-2">
          <a href="{{route('register_form')}}" target="_blank" class="btn btn-danger">Register As Trainer</a>
          <a href="{{route('login')}}" target="_blank" class="btn btn-warning">Login</a>
        </div>
      </div>
      
    </div>
  </div>
</div>