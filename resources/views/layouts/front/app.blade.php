<!DOCTYPE html>
<html lang="en">
@include('layouts.front.head')
<body>

@include('layouts.front.header')
<!-- Filter Bar -->

@yield('content')

@if(!Auth::check() && !Auth::guard('company')->check())
 <!-- Call to Action -->
  <section class="py-5 pv-5 wow animate__animated animate__fadeIn" style="background-image: url('{{ asset('assets/images/cta-bg.jpg') }}'); background-size: cover; background-position: top center;">
    <div class="container text-end text-white">
      <div class="bg-dark p-4 d-inline-block text-center wow animate__animated animate__fadeInRight">
        <h4>Professional Trainer and Coach?</h4>
        <p>Join us to increase your online visibility. You'll have access to more customers looking for service.</p>
        <a href="{{route('register_form')}}" class="btn btn-danger w-100 w-md-40 wow animate__animated animate__fadeUpBottom" data-wow-delay="0.8s">Register With Us!</a>
      </div>
    </div>
  </section>
@endif
  

@include('layouts.front.footer')


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>

<script>
  const lightbox = GLightbox({
    selector: '.glightbox'
  });
</script>

@stack('scripts')
</body>
</html>