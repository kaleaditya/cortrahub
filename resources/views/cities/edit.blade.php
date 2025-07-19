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
                  <h5 class="card-title">Edit City</h5>
                </div>
                <div class="pull-right">
                  <a class="btn btn-sm mb-2 comnBtn whtTxt borderBtn" href="{{ route('cities.index') }}">Back</a>
                </div>
              </div>
            </div>

            <!-- Horizontal Form -->
            <div class="frmGrp antherGrp">
              <form action="{{ route('cities.update', $city->id) }}" method="POST" id="cityForm">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                  <label for="country_id" class="col-sm-1 col-form-label strng flexCntr">Country <span class="text-danger">*</span></label>
                  <div class="col-sm-5">
                    <select name="country_id" class="form-control required" id="country_id">
                      <option value="">Select Country</option>
                      @foreach($countries as $country)
                        <option value="{{ $country->id }}" {{ (old('country_id', $city->country_id) == $country->id) ? 'selected' : '' }}>
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
                      @foreach($states as $state)
                        <option value="{{ $state->id }}" {{ (old('state_id', $city->state_id) == $state->id) ? 'selected' : '' }}>
                          {{ $state->name }}
                        </option>
                      @endforeach
                    </select>
                    @error('state_id')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="name" class="col-sm-1 col-form-label strng flexCntr">Name <span class="text-danger">*</span></label>
                  <div class="col-sm-5">
                    <input type="text" name="name" value="{{ old('name', $city->name) }}" class="form-control required" id="name">
                    @error('name')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>

                {{-- <div class="row mb-3">
                  <label for="code" class="col-sm-1 col-form-label strng flexCntr">Code <span class="text-danger">*</span></label>
                  <div class="col-sm-5">
                    <input type="text" name="code" value="{{ old('code', $city->code) }}" class="form-control required" id="code">
                    @error('code')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div> --}}

                <input type="hidden" name="is_active" value="{{ $city->is_active }}">

                <div class="mt50 pddLftStLow">
                  <button type="submit" class="btn btn-sm comnBtn">Update</button>
                </div>
              </form>
            </div>
          </div>

        </div>
      </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    @push('scripts')
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
                    url: '{{ route("states.get-by-country") }}',
                    type: 'GET',
                    data: { country_id: countryId },
                    dataType: 'json',
                    success: function(response) {
                        console.log('States response:', response);

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

                                // If we have a selected state, try to select it
                                var selectedStateId = '{{ old("state_id", $city->state_id) }}';
                                if (selectedStateId) {
                                    stateSelect.val(selectedStateId);
                                }
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
                        console.error('Error fetching states:', {
                            status: status,
                            error: error,
                            response: xhr.responseText
                        });
                        stateSelect.append('<option value="">Error loading states</option>');
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

        // Trigger change event if country is pre-selected
        if($('#country_id').val()) {
            $('#country_id').trigger('change');
        }
    });
    </script>
    @endpush
    <style>
      .error {
        color: red;
      }
    </style>
@endsection
