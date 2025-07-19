@extends('layouts.front.app')
@section('content')

<!-- Main Content -->
<div class="container py-4">
    <div class="row g-4">
    <!-- Main Profile Content -->
        <div class="col-lg-12">
             <div class="profile-card">
        @if($user->header_image != null)
        <img src="{{asset('public/all_image/'.$user->header_image)}}" alt="{{$user->name}}" class="profile-img">
        @else
        <img src="{{asset('public/all_image/')}}/not_found.jpeg" alt="{{$user->name}}" class="profile-img">
        @endif
                <div class="profile-info">
          <h4 class="mb-1">{{$user->name}}</h4>
                    <div class="mb-2 text-muted">{{$user->qualification}} @if($user->qualification)- @endif 
          <a href="{{$user->linkedin}}" target="_blank" class="text-danger small">LinkedIn</a> |
          <a href="{{$user->youtube}}" target="_blank" class="text-danger small">Video Channel</a> |
          <a href="{{$user->instagram}}" target="_blank" class="text-danger small">Watch Introduction Video</a>
                     </div>
                            <div class="profile-tags mb-3">
                            @php
                             $exp = $user->experience;
                             $array = is_string($exp) ? explode(',', $exp) : $exp;
                                @endphp

                            @foreach(get_exp($array) as $title)
                            <span class="badge">{{ $title }}</span>
                            @endforeach


                            </div>
                        <div class="about-section">
                        <h6 class="mb-2">About me</h6>
                        <p class="mb-1">{{$user->description}}</p>
                        <a href="#" class="text-danger small">Read More</a>
                        </div>
        </div>
      </div>
      <div class="tab-section">
        <ul class="nav nav-tabs mb-3" id="profileTab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="languages-tab" data-bs-toggle="tab" data-bs-target="#languages" type="button" role="tab">Expertise</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="experience-tab" data-bs-toggle="tab" data-bs-target="#experience" type="button" role="tab">Programs</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="photo-tab" data-bs-toggle="tab" data-bs-target="#photo" type="button" role="tab">Certifications</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="video-tab" data-bs-toggle="tab" data-bs-target="#video" type="button" role="tab">Awards</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="downloads-tab" data-bs-toggle="tab" data-bs-target="#downloads" type="button" role="tab">Profile</button>
          </li>
        </ul>
        <div class="d-flex justify-content-end mb-3">
          <a href="#" class="btn btn-danger">Add to List</a>
        </div>
        <div class="tab-content" id="profileTabContent">
          <div class="tab-pane fade show active" id="languages" role="tabpanel">
           <ol>
                @foreach(get_exp($array) as $title)
                    <li>{{$title}}</li>
                @endforeach
            </ol>
          </div>

            @php
                $exp = $user->other;
                $array = is_string($exp) ? explode(',', $exp) : $exp;
            @endphp




          <div class="tab-pane fade" id="experience" role="tabpanel">

                <ul>
                   @foreach(get_Product($array) as $title)
                <li>{{ $title }}</li>
            @endforeach


                </ul>

          </div>
   
        
        
        <div class="tab-pane fade" id="photo" role="tabpanel">
  <div class="row g-2">
    @foreach($certificates as $cert)
      <div class="col-6 col-md-3">
        <a href="{{ asset('public/all_user_image/'.$cert->image) }}" class="glightbox" data-gallery="photo-gallery">
          <img src="{{ asset('public/all_user_image/'.$cert->image) }}" alt="" class="img-fluid rounded">
        </a>
      </div>
    @endforeach
  </div>
        <div class="tab-pane fade" id="photo" role="tabpanel">
  <div class="row g-2">
    @foreach($videoGallery as $video)
      <div class="col-6 col-md-3">
        <a href="{{ asset('public/all_user_image/'.$cert->image) }}" class="glightbox" data-gallery="video-gallery">
          <img src="{{asset('public/all_user_image/'.$video->link)}}" alt="" class="img-fluid rounded">
        </a>
      </div>
    @endforeach
  </div>
</div>

        
        
        
        
        
        
        
      </div>
     
            <!-- Advertisement Section-->
            <div class="profile-card">
           <a href="#" target="_blank">
            @if($user->banner_image != null)
             <img src="{{asset('public/all_image/'.$user->banner_image)}}" alt="banner_ad" class="profile-img">
             @else
             <img src="{{asset('public/all_image/')}}/not_found.jpeg" alt="banner_ad" class="profile-img">
             @endif
            </a>
            </div>

    </div>
    <!-- Sidebar -->
    
  </div>
</div>


@endsection