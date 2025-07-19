<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cortra: Connecting Companies and Corporate Trainers for Business Growth</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link href="https://fonts.googleapis.com/css2?family=Big+Shoulders+Inline:wght@600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

</head>
<body>

  <!-- Hero Section -->
  <section class="bg-dark text-white text-center p-5 pv-5 wow animate__animated animate__fadeIn" style="background-image: url('{{ asset('assets/images/top.jpg') }}'); background-size: cover; background-position: center;">
    <div class="container">
      <img src="{{ asset('assets/images/logo.png') }}" alt="Cortra Logo" class="mb-3 wow animate__animated animate__fadeInDown" data-wow-delay="0.2s" height="60">
      <h1 class="fw-bold wow animate__animated animate__fadeInUp" data-wow-delay="0.4s">Find The Right Trainer</h1>
      <p class="wow animate__animated animate__fadeInUp" data-wow-delay="0.6s">Filter by Speciality, Location and Profile</p>
      <a href="{{route('company_register')}}" class="btn btn-pink wow animate__animated animate__fadeInUp" target="_blank" data-wow-delay="0.8s">Register Your Company</a>
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
      <a href="{{route('register_form')}}" target="_blank" class="btn btn-danger w-100 wow animate__animated animate__fadeInLeft" data-wow-delay="0.8s">Register As Trainer</a>
      <a href="{{route('login')}}" target="_blank" class="btn btn-warning w-100 wow animate__animated animate__fadeInLeft" data-wow-delay="0.8s">Login</a>
      
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
            <a href="{{route('company_register')}}" class="btn btn-pink mt-3 wow animate__animated animate__fadeInUp" target="_blank" data-wow-delay="0.8s">Start By registering Your Company</a>
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

  <!-- Call to Action -->
  <section class="py-5 pv-5 wow animate__animated animate__fadeIn" style="background-image: url('{{ asset('assets/images/cta-bg.jpg') }}'); background-size: cover; background-position: top center;">
    <div class="container text-end text-white">
      <div class="bg-dark p-4 d-inline-block text-center wow animate__animated animate__fadeInRight">
        <h4>Professional Trainer and Coach?</h4>
        <p>Join us to increase your online visibility. You'll have access to more customers looking for service.</p>
        <a href="{{route('register_form')}}" class="btn btn-danger w-100 w-md-40 wow animate__animated animate__fadeInLeft" data-wow-delay="0.8s">Register With Us!</a>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-primary text-white text-center py-4">
    <div class="container">
     <p>
     <a href="{{route('about')}}" class="text-white text-decoration-none mx-2">About Us</a>|
      <a href="{{route('team')}}" class="text-white text-decoration-none mx-2">Our Team</a>|
       <a href="{{route('company_register')}}" class="text-white text-decoration-none mx-2">Register As Company</a>|
      <a href="{{route('register_form')}}" class="text-white text-decoration-none mx-2">Register as Trainer</a>|
      <a href="{{route('login')}}" class="text-white text-decoration-none mx-2">Login</a></p>
      
      <p><a href="{{route('terms')}}" class="text-white text-decoration-none mx-2">Terms & Conditions</a>|
      <a href="{{route('privacy')}}" class="text-white text-decoration-none mx-2">Privacy Policy</a>|
      <a href="{{route('refund')}}" class="text-white text-decoration-none mx-2">Refund Policy</a>|
     
    </p>
      <p class="wow animate__animated animate__fadeIn" data-wow-delay="0.2s">
        <i class="bi bi-facebook mx-2"></i>
        <i class="bi bi-instagram mx-2"></i>
        <i class="bi bi-youtube mx-2"></i>
        <i class="bi bi-envelope mx-2"></i>
      </p>
      <p class="mb-0 wow animate__animated animate__fadeIn" data-wow-delay="0.4s">&copy; CORTRA 2025. All Rights Reserved.</p>
      <p class="small wow animate__animated animate__fadeIn" data-wow-delay="0.6s"Project by <strong>Urja Media and Entertainment</strong></p>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Required for Slick -->
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

</body>
</html>