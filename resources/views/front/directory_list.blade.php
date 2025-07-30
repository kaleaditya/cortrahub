@extends('layouts.front.app')
@section('content')

<section class="bg-light py-3">
  <form method="GET" action="{{ route('directory.list', $slug) }}">
    <div class="container">
      <!-- Line 1: Filter Label -->
      <div class="row mb-2">
        <div class="col-12">
          <strong class="text-orange">Filter :</strong>
        </div>
      </div>

      <!-- Line 2: Country, State, City -->
      <div class="row g-2 mb-2">
        <div class="col-12 col-md-4">
          <select name="country_id" id="country" class="form-select form-select-sm">
            <option value="">Select Country</option>
            @foreach($countries as $country)
              <option value="{{ $country->id }}" {{ request('country_id') == $country->id ? 'selected' : '' }}>
                {{ $country->name }}
              </option>
            @endforeach
          </select>
        </div>
        <div class="col-12 col-md-4">
          <select name="state_id" id="state" class="form-select form-select-sm">
            <option value="">Select State</option>
          </select>
        </div>
        <div class="col-12 col-md-4">
          <select name="city_id" id="city" class="form-select form-select-sm">
            <option value="">Select City</option>
          </select>
        </div>
      </div>

      <!-- Line 3: Speciality, Name, Buttons -->
      <div class="row g-2 align-items-center">
        <div class="col-12 col-md-4">
          <select name="experience" class="form-select form-select-sm">
            <option value="">By Speciality</option>
            @foreach($experience as $exp)
              <option value="{{ $exp->id }}" {{ request('experience') == $exp->id ? 'selected' : '' }}>
                {{ $exp->title }}
              </option>
            @endforeach
          </select>
        </div>
        <div class="col-12 col-md-3">
          <input type="text" name="name" value="{{ request('name') }}" class="form-control form-control-sm" placeholder="By Name">
        </div>
        <div class="col-6 col-md-2">
          <button class="btn btn-danger btn-sm w-100">Filter</button>
        </div>
        <div class="col-6 col-md-2">
          <a href="{{ route('directory.list', $slug) }}" class="btn btn-warning btn-sm w-100">Clear</a>
        </div>
      </div>
    </div>
  </form>
</section>


<section class="bg-primary text-light py-4 px-4">
  <h2 class="text-center">{{ $role->name }} Trainer List</h2>
</section>

<!-- Listings Grid -->
<section class="py-5">
  <div class="container">
    <div class="row">
      <!-- Main Grid -->
      <div class="col-lg-9">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
          @forelse($users as $user)
            <div class="col">
              <div class="card h-100 text-dark bg-light text-center">
                <a href="{{ route('directory.details', $user->slug) }}">
                  <img src="{{ asset('all_image/' . $user->image) }}" class="card-img-top img-fluid rounded mb-2" alt="{{ $user->name }}">
                </a>
                <div class="card-body">
                  <h6 class="card-title mb-2">
                   <p> {{ $user->name }}</p>
                   <p><span class="text-success">Location::</span> {{ optional($user->city_info)->name ?? 'N/A' }}</p>
                  </h6>
                 
                <p class="text-danger">{{ $role->name }} Trainer</p>
                  <div class="d-flex gap-2 justify-content-center">
                    <a href="{{ route('directory.details', $user->slug) }}" class="btn btn-sm btn-danger">Know More</a>
                    @if(Auth::guard('company')->check())
                      @if($shortlistedTrainerIds->contains($user->id))
                        <button class="btn btn-sm btn-secondary" disabled>
                          <i class="bi bi-check-circle"></i> Added
                        </button>
                      @else
                        <button class="btn btn-sm btn-success add-to-list-btn" data-trainer-id="{{ $user->id }}">
                          <i class="bi bi-plus-circle"></i> Add to List
                        </button>
                      @endif
                    @endif
                  </div>
                </div>
              </div>
            </div>
          @empty
            <div class="col-12">
              <p class="text-muted">No data found.</p>
            </div>
          @endforelse
        </div>
      </div>

      <!-- Sidebar -->
      <div class="col-lg-3">
        <div class="bg-light p-3 rounded position-sticky top-0">
          <h6 class="bg-success text-white p-2 text-center rounded">Featured Listings</h6>

          @foreach($feacherdUsers as $user)
            <div class="d-flex my-3 align-items-center">
              <img src="{{ asset('all_image/' . $user->image) }}" alt="{{ $user->image }}" width="60" class="rounded-circle me-2">
              <div>
                <strong>{{ $user->name }}</strong><br>
                <small>{{ $user->qualification }}@if($user->qualification),@endif {{ $user->city_info->name }}</small><br>
                <a href="{{ route('directory.details', $user->slug) }}" class="text-danger small">Click here to know more</a>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>






<script>

  let selectedState = "{{ request('state_id') }}";
let selectedCity  = "{{ request('city_id') }}";

// Add to List functionality for company users
document.querySelectorAll('.add-to-list-btn').forEach(function(btn) {
    btn.addEventListener('click', function(e) {
        e.preventDefault();
        const trainerId = btn.getAttribute('data-trainer-id');
        const originalText = btn.innerHTML;
        
        // Disable button and show loading
        btn.disabled = true;
        btn.innerHTML = '<i class="bi bi-hourglass-split"></i> Adding...';
        
        fetch("{{ url('company/add-to-list') }}/" + trainerId, {
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
                btn.innerHTML = '<i class="bi bi-check-circle"></i> Added!';
                btn.classList.remove('btn-success');
                btn.classList.add('btn-secondary');
                btn.disabled = true;
                // Remove the setTimeout to keep button disabled permanently
            } else {
                alert(data.message || "Error adding to list.");
                btn.innerHTML = originalText;
                btn.disabled = false;
            }
        })
        .catch(error => {
            alert('Error adding trainer to list.');
            btn.innerHTML = originalText;
            btn.disabled = false;
        });
    });
});



    function loadStates(countryID, callback) {
        let stateUrl = `{{ route('location.states', ':id') }}`.replace(':id', countryID);
        $.get(stateUrl, function(states) {
            let options = '<option value="">Select State </option>';
            states.forEach(function(state) {
                let selected = state.id == selectedState ? 'selected' : '';
                options += `<option value="${state.id}" ${selected}>${state.name}</option>`;
            });
            $('#state').html(options);
            if (callback) callback();
        });
    }

    function loadCities(stateID) {
        let cityUrl = `{{ route('location.cities', ':id') }}`.replace(':id', stateID);
        $.get(cityUrl, function(cities) {
            let options = '<option value=""> Select City </option>';
            cities.forEach(function(city) {
                let selected = city.id == selectedCity ? 'selected' : '';
                options += `<option value="${city.id}" ${selected}>${city.name}</option>`;
            });
            $('#city').html(options);
        });
    }

    $(document).ready(function () {
        // Load states and cities if editing user
        let currentCountry = $('#country').val();
        if (currentCountry) {
            loadStates(currentCountry, function () {
                if (selectedState) {
                    loadCities(selectedState);
                }
            });
        }

        // Dynamic on change
        $('#country').on('change', function () {
            selectedState = '';
            selectedCity = '';
            $('#city').html('<option value=""> Select City </option>');
            loadStates($(this).val());
        });

        $('#state').on('change', function () {
            selectedCity = '';
            loadCities($(this).val());
        });
    });
</script>
@endsection