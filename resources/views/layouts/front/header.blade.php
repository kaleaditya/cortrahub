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