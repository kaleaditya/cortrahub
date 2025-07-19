@extends('layouts.admin.app')
<script src="https://code.jquery.com/jquery-1.11.3.js"></script>
@section('content')
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card cardPdd">
            <div class="card-body topText">
              <div class="flexBdy">
                <div class="pull-left">
                  <h5 class="card-title">Create City</h5>
                </div>
                <div class="pull-right">
                  <a class="btn btn-sm mb-2 comnBtn whtTxt borderBtn" href="{{ route('cities.index') }}">Back</a>
                </div>
              </div>
            </div>

            <!-- Horizontal Form -->
            <div class="frmGrp antherGrp">
              <form action="{{ route('cities.store') }}" method="POST" id="cityForm">
                @csrf
                <div class="row mb-3">
                  <label for="country_id" class="col-sm-1 col-form-label strng flexCntr">Country <span class="text-danger">*</span></label>
                  <div class="col-sm-5">
                    <select name="country_id" class="form-control required" id="country_id">
                      <option value="">Select Country</option>
                      @foreach($countries as $country)
                        <option value="{{ $country->id }}" {{ old('country_id') == $country->id ? 'selected' : '' }}>
                          {{ $country->name }}
                        </option>
                      @endforeach
                    </select>
                    @error('country_id')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="state_id" class="col-sm-1 col-form-label strng flexCntr">State <span class="text-danger">*</span></label>
                  <div class="col-sm-5">
                    <select name="state_id" class="form-control required" id="state_id">
                      <option value="">Select State</option>
                    </select>
                    @error('state_id')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="name" class="col-sm-1 col-form-label strng flexCntr">Name <span class="text-danger">*</span></label>
                  <div class="col-sm-5">
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control required" id="name">
                    @error('name')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>

                {{-- <div class="row mb-3">
                  <label for="code" class="col-sm-1 col-form-label strng flexCntr">Code <span class="text-danger">*</span></label>
                  <div class="col-sm-5">
                    <input type="text" name="code" value="{{ old('code') }}" class="form-control required" id="code">
                    @error('code')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div> --}}

                <input type="hidden" name="is_active" value="1">

                <div class="mt50 pddLftStLow">
                  <button type="submit" class="btn btn-sm comnBtn">Submit</button>
                </div>
              </form>
            </div>
          </div>

        </div>
      </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <script>
      $(document).ready(function() {
        // Handle country change
        $('#country_id').on('change', function() {
          var countryId = $(this).val();
          var stateSelect = $('#state_id');

          // Clear current state selection
          stateSelect.empty().append('<option value="">Select State</option>');

          if (countryId) {
            console.log('Fetching states for country:', countryId);

            // Show loading state
            stateSelect.prop('disabled', true);

            $.ajax({
              url: '/public/get-by-country',
              type: 'GET',
              data: { country_id: countryId },
              dataType: 'json',
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'Accept': 'application/json'
              },
              beforeSend: function() {
                console.log('Sending request for country_id:', countryId);
                console.log('Request URL:', '/public/get-by-country');
              },
              success: function(response) {
                console.log('Raw response:', response);

                if (response && response.states) {
                  var states = response.states;
                  if (states.length > 0) {
                    // Add states to dropdown
                    $.each(states, function(index, state) {
                      stateSelect.append(
                        $('<option></option>')
                          .val(state.id)
                          .text(state.name)
                      );
                    });
                  } else {
                    console.log('No states found for country');
                    stateSelect.append('<option value="">No states available</option>');
                  }
                } else {
                  console.error('Invalid response format:', response);
                  stateSelect.append('<option value="">Error loading states</option>');
                }
              },
              error: function(xhr, status, error) {
                console.error('Error details:', {
                  status: status,
                  error: error,
                  responseText: xhr.responseText,
                  statusCode: xhr.status,
                  readyState: xhr.readyState
                });

                var errorMessage = 'Error loading states';
                try {
                  if (xhr.responseText) {
                    var response = JSON.parse(xhr.responseText);
                    if (response.error) {
                      errorMessage = response.error;
                    }
                  }
                } catch (e) {
                  console.error('Error parsing response:', e);
                }

                stateSelect.append('<option value="">' + errorMessage + '</option>');
              },
              complete: function() {
                // Re-enable state select
                stateSelect.prop('disabled', false);
              }
            });
          }
        });

        // Form validation
        $('#cityForm').validate({
          rules: {
            country_id: {
              required: true
            },
            state_id: {
              required: true
            },
            name: {
              required: true
            },
            code: {
              required: true
            }
          },
          messages: {
            country_id: {
              required: "Please select a country"
            },
            state_id: {
              required: "Please select a state"
            },
            name: {
              required: "Please enter city name"
            },
            code: {
              required: "Please enter city code"
            }
          },
          errorElement: 'span',
          errorPlacement: function(error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
          },
          highlight: function(element, errorClass, validClass) {
            $(element).addClass('is-invalid');
          },
          unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
          }
        });
      });
    </script>
    <style>
      .error {
        color: red;
      }
    </style>
@endsection
