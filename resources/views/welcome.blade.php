@extends('layouts.front.app')

@section('content')

  <!-- Hero Section -->
  <section class="bg-dark text-white text-center p-5 pv-5 wow animate__animated animate__fadeIn" style="background-image: url('{{ asset('assets/images/top.jpg') }}'); background-size: cover; background-position: center;">
    <div class="container">
      <img src="{{ asset('assets/images/logo.png') }}" alt="Cortra Logo" class="mb-3 wow animate__animated animate__fadeInDown" data-wow-delay="0.2s" height="60">
      <h1 class="fw-bold wow animate__animated animate__fadeInUp" data-wow-delay="0.4s">Find The Right Trainer</h1>
      <p class="wow animate__animated animate__fadeInUp" data-wow-delay="0.6s">Filter by Speciality, Location and Profile</p>
      @if(!Auth::check() && !Auth::guard('company')->check())
        <a href="{{route('company_register')}}" class="btn btn-pink wow animate__animated animate__fadeInUp" target="_blank" data-wow-delay="0.8s">Register Your Company</a>
      @endif
    </div>
  </section>

  <!-- Search Bar -->
  <section class="bg-primary py-3 wow animate__animated animate__fadeIn">
    <div class="container d-flex flex-column flex-md-row align-items-center gap-2">
    
      <select class="form-control wow animate__animated animate__fadeInLeft" data-wow-delay="0.2s" placeholder="You are searching for...">
          <option>You are searching for...</option>
          @foreach($experience as $exp)
          <option>{{$exp->title}}</option>
          @endforeach
      </select>
      
        <select class="form-control wow animate__animated animate__fadeInLeft" data-wow-delay="0.2s" placeholder="You are searching for...">
          <option>Locations</option>
          @foreach($citys as $city)
          <option>{{$city->name}}</option>
          @endforeach
      </select>
      
      <button class="btn btn-light w-100 wow animate__animated animate__fadeInLeft" data-wow-delay="0.6s"><i class="bi bi-search"> Search</i></button>
      @if(!Auth::check() && !Auth::guard('company')->check())
        <a href="{{route('register_form')}}" target="_blank" class="btn btn-danger w-100 wow animate__animated animate__fadeInLeft" data-wow-delay="0.8s">Register As Trainer</a>
        <a href="{{route('login')}}" target="_blank" class="btn btn-warning w-100 wow animate__animated animate__fadeInLeft" data-wow-delay="0.8s">Login</a>
      @endif
      
    </div>
  </section>

  <!-- How It Works -->
  <section class="py-5 text-center">
    <div class="container">
      <h3 class="mb-3 wow animate__animated animate__fadeInDown">Your ideal trainer is 3 steps away.</h3>
      <p class="text-muted wow animate__animated animate__fadeIn" data-wow-delay="0.2s">Search through our verified professional directory.

</p>
      <div class="row align-items-center mt-5">
        <div class="col-md-6 mb-4 mb-md-0">
          <div class="how-image-container wow animate__animated animate__fadeInLeft">
            <img src="{{ asset('assets/images/how-1.jpg') }}" alt="How it works" class="img-fluid rounded-4 shadow">
          </div>
        </div>
        <div class="col-md-6 text-start">
          <div class="how-steps">
            <div class="step-item mb-4 wow animate__animated animate__fadeInRight" data-wow-delay="0.2s">
              <h4 class="step-number text-pink">#01.</h4>
              <h5 class="step-title">Select The Right Trainer </h5>
              <p class="step-description">Search from our expanding data verified professionals that match your criteria.</p>
            </div>
            <div class="step-item mb-4 wow animate__animated animate__fadeInRight" data-wow-delay="0.4s">
              <h4 class="step-number text-pink">#02.</h4>
              <h5 class="step-title">View Professional Profile</h5>
              <p class="step-description">Introduction Video, Certifications, Awards and Complete Profile.</p>
            </div>
            <div class="step-item mb-4 wow animate__animated animate__fadeInRight" data-wow-delay="0.6s">
              <h4 class="step-number text-pink">#03.</h4>
              <h5 class="step-title">Add them to your list</h5>
              <p class="step-description">We will connect you to the required trainers!</p>
            </div>
            @if(!Auth::check() && !Auth::guard('company')->check())
              <a href="{{route('company_register')}}" class="btn btn-pink mt-3 wow animate__animated animate__fadeInUp" target="_blank" data-wow-delay="0.8s">Start By registering Your Company</a>
            @endif
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Categories -->
  <section class="bg-primary text-white text-center py-5">
    <div class="container">
      <h3 class="wow animate__animated animate__fadeInDown">Discover expert trainers for every level of management</h3>
     
      <div class="row row-cols-1 row-cols-md-4 g-4 mt-4">
        <!-- Repeat these for each category -->
        @foreach($roles as $role)
        <div class="col wow animate__animated animate__zoomIn" data-wow-delay="0.2s">
             <a class="category-text" href="{{route('directory.list',$role->slug)}}"style="color: rgb(255, 255, 255); text-decoration: none;">
          <div class="category-letter mb-2">{{ $role->name ? substr($role->name, 0, 1) : '' }}</div>
           <a class="category-text" href="{{route('directory.list',$role->slug)}}"style="color: rgb(255, 255, 255); text-decoration: none;"><p>{{$role->name}}</p></a>
           </a>
        </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- Popular Professionals -->
  <section class="py-5 text-center">
    <div class="container">
      <h3 class="wow animate__animated animate__fadeInDown">Featured Listings</h3>
      <div class="featured-slider mt-4">
  @foreach($feacherdUsers as $user)
    <div class="px-2 position-relative"> <!-- position-relative allows overlay -->

      <a href="{{ route('directory.details', $user->slug) }}" class="stretched-link"></a>

      <div class="card h-100">
        <img src="{{ asset('all_image/'.$user->image) }}" class="card-img-top" alt="{{ $user->name }}">
        <div class="card-body text-start">
          <h5 class="card-title text-capitalize">{{ $user->name }}</h5>
          <p class="card-text">{{ $user->qualification }}</p>
          
          @if($user->city_info)
            <p class="card-text"><span class="text-success">Location: </span>{{ $user->city_info->name }}</p>
          @else
            <p class="card-text">N/A</p>
          @endif
          <p class="card-text">
  @foreach($user->getRoleNames() as $role)
    <!--<span class="badge bg-danger">{{ $role }}</span>-->
      <p class="text-danger">{{ $role}} Trainer</p>
  @endforeach
</p>
        </div>
      </div>
    </div>
  @endforeach
</div>


    </div>
  </section>



@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<script>
  new WOW().init();
</script>

<script>
$(document).ready(function(){
  $('.featured-slider').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 3000,
    arrows: true,
    dots: false,
    responsive: [
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 3
        }
      },
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 2
        }
      },
      {
        breakpoint: 576,
        settings: {
          slidesToShow: 1
        }
      }
    ]
  });
});
</script>

<style>
  .slick-prev, .slick-next {
    background: #fff;
    border: 1px solid #ccc;
    color: #000;
    padding: 8px;
    border-radius: 50%;
    z-index: 10;
    transition: all 0.3s ease;
  }
  .slick-prev:hover, .slick-next:hover {
    background: #dc3545; /* Bootstrap red */
    color: #fff;
  }
  .slick-prev {
    left: -30px;
  }
  .slick-next {
    right: -30px;
  }
  .slick-prev:before, .slick-next:before {
    font-family: "bootstrap-icons";
    font-size: 20px;
    line-height: 1;
  }
  .slick-prev:before {
    content: "\f12f"; /* bi-chevron-left */
  }
  .slick-next:before {
    content: "\f138"; /* bi-chevron-right */
  }
</style>
@endpush