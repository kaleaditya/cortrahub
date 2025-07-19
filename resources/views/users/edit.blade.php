@extends('layouts.admin.app')

@section('content')
<!--<style>
    select.open-dropdown {
        height: 150px; /* adjust height as needed */
        overflow-y: auto;
    }
</style>
<div class="row">
    <div class="col-lg-12">
        <div class="card cardPdd">
            <div class="card-body topText">
                <div class="col-lg-12 margin-tb">
                    <div class="flexBdy">
                        <div class="pull-left">
                            <?php $role = $user->getRoleNames()->first();  ?>
                            <h5 class="card-title">Edit {{$role}}</h5>

                        </div>
                        <div class="pull-right">
                            <a class="btn btn-sm mb-2 comnBtn whtTxt borderBtn" href="{{ route('users.index') }}">
                                <i class="fa fa-arrow-left"></i> Back
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            @if (count($errors) > 0)
            <div class="alert alert-danger frmGrpMt">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="frmGrp">
                <form id="userform" method="POST" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">

                        <!-- BASIC INFO 
                        <div class="col-md-12"><h6 class="section-title">Basic Info</h6></div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <strong class="strng "> Name: </strong>
                                <input type="text" name="name" placeholder="Name" class="form-control " value="{{ old('name', $user->name) }}" >
                                <span class="error-message text-danger"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <strong class="strng ">Mobile No:</strong>
                                <input type="tel" name="phone" placeholder="Enter Mobile No." class="form-control " value="{{ old('phone', $user->phone) }}" pattern="[0-9]{10}" title="Please enter a valid 10-digit mobile number" >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <strong class="strng ">Email:</strong>
                                <input type="email" name="email" placeholder="Enter Email" class="form-control " value="{{ old('email', $user->email) }}" >
                            </div>
                        </div>


                        <div class="col-md-12"><h6 class="section-title">Social Info</h6></div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <strong class="strng">Facebook: </strong>
                                <input type="url" name="facebook" placeholder="Enter Facebook" class="form-control" value="{{ old('facebook', $user->facebook) }}" pattern="https?://.*" title="Please enter a valid URL" >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <strong class="strng">Website: </strong>
                                <input type="url" name="website" placeholder="Enter Website" class="form-control" value="{{ old('website', $user->website) }}" pattern="https?://.*" title="Please enter a valid URL" >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <strong class="strng ">WhatsApp: </strong>
                                <input type="tel" name="whatsup" placeholder="Enter WhatsApp No" class="form-control" value="{{ old('whatsup', $user->whatsup) }}" pattern="[0-9]{10}" title="Please enter a valid 10-digit WhatsApp number" >
                            </div>
                        </div>

                         <div class="col-md-4">
                            <div class="form-group">
                                <strong class="strng ">Linkedin: </strong>
                                <input type="url" name="linkedin" placeholder="Enter linkedin" class="form-control" value="{{ old('linkedin', $user->linkedin) }}" pattern="https?://.*" title="Please enter a valid URL" >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <strong class="strng ">Instagram: </strong>
                                <input type="url" name="instagram" placeholder="Enter Instagram" class="form-control" value="{{ old('instagram', $user->instagram) }}" pattern="https?://.*" title="Please enter a valid URL" >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <strong class="strng ">Youtube: </strong>
                                <input type="url" name="youtube" placeholder="Enter youtube" class="form-control" value="{{ old('youtube', $user->youtube) }}" pattern="[0-9]{10}" >
                            </div>
                        </div>


                        <!-- LOCATION 
                        <div class="col-md-12"><h6 class="section-title">Location</h6></div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <select name="country_id" id="country" class="form-control" >
                                        <option value="">-- Select Country --</option>
                                        @foreach($countries as $country)
                                            <option value="{{ $country->id }}" {{ old('country_id', $user->country_id) == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <select name="state_id" id="state" class="form-control">
                                    <option value="">-- Select State --</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <select name="city_id" id="city" class="form-control" >
                                    <option value="">-- Select City --</option>
                                </select>
                            </div>
                        </div>


                        <!-- PROFILE INFO 
                        <div class="col-md-12"><h6 class="section-title">Profile Info</h6></div>
                       
                       <!--Experience
                        <div class="col-md-4">
                            <div class="form-group">
                                <strong class="strng ">Exposure (In Years) : </strong>
                                <input type="number" name="age" placeholder="Enter Exposure Years " class="form-control" value="{{ old('age', $user->age) }}" min="1" max="120" >
                            </div>
                        </div>-->
                        
                        <!--Gender
                        <div class="col-md-4">
                            <div class="form-group">
                                <strong class="strng ">Gender: </strong>
                                <select name="gender" class="form-control" >
                                    <option value=""> Select Gender </option>
                                    <option value="male" {{ old('gender', $user->gender) == 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ old('gender', $user->gender) == 'female' ? 'selected' : '' }}>Female</option>
                                    <option value="other" {{ old('gender', $user->gender) == 'other' ? 'selected' : '' }}>Other</option>
                                </select>
                            </div>
                        </div>
                        
                        
                           <div class="col-md-4">
                                <div class="form-group">
                                    <strong class="strng ">Language: </strong>
                                    <select name="language[]" class="form-control open-dropdown" multiple >
                                        @foreach($languages as $language)
                                            <option value="{{ $language->id }}"
                                                {{ (collect(old('language', $user->language ?? []))->contains($language->id)) ? 'selected' : '' }}>
                                                {{ $language->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        
                        
                        
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <strong class="strng">Image: </strong>
                                <p>Max image size 50 kb (Dimension: 400 px X 400 px)</p>
                                <input type="file" name="image" class="form-control " accept="image/*">
                                <input type="hidden" name="old_image" value="{{$user->image}}">
                                @if($user->image)
                                    <img src="{{ asset('all_image/' . $user->image) }}" alt="{{$user->name}}" style="max-width: 100px; margin-top: 10px;">
                                @endif
                            </div>
                        </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <strong class="strng ">Speciality: </strong>
                                    <select name="experience[]" class="form-control open-dropdown" multiple>
                                        @foreach($experiences as $experience)
                                            <option value="{{ $experience->id }}"
                                                {{ (collect(old('experience', $user->experience ?? []))->contains($experience->id)) ? 'selected' : '' }}>
                                                {{ $experience->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                         

                        <div class="col-md-4">
                            <div class="form-group">
                                <strong class="strng ">Programs: </strong>
                                <select name="other[]" class="form-control   open-dropdown required" multiple>
                                    <option value="">Select Other</option>
                                    @foreach($others as $other)
                                    <option value="{{$other->id}}" {{ old('other', $user->other) == $other->id ? 'selected' : '' }}>{{$other->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>



                    <select name="roles[]" class="form-control hg100" multiple>
                        @foreach ($roles as $value => $label)
                            <option value="{{ $value }}" {{ in_array($value, old('roles', $selectedRoles)) ? 'selected' : '' }}>
                                {{ $label }}
                            </option>
                        @endforeach
                    </select>-->

                        <!-- META INFO 
                        <div class="col-md-12"><h6 class="section-title">Meta Info</h6></div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <strong class="strng ">Page Title: </strong>
                                <input type="text" name="page_title" class="form-control required" value="{{ old('page_title', $user->page_title) }}" >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <strong class="strng ">Meta Title: </strong>
                                <input type="text" name="meta_title" class="form-control required" value="{{ old('meta_title', $user->meta_title) }}" >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <strong class="strng ">Meta Keywords: </strong>
                                <input type="text" name="meta_keyword" class="form-control required" value="{{ old('meta_keyword', $user->meta_keyword) }}" >
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <strong class="strng ">Description: </strong>
                                <textarea name="description" class="form-control" rows="3" >{{ old('description', $user->description) }}</textarea>
                            </div>
                            <div class="form-group">
                                <strong class="strng ">Short Description: </strong>
                                <textarea name="short_description" class="form-control" rows="3" >{{ old('short_description', $user->short_description) }}</textarea>
                            </div>
                            <div class="form-group">
                                <strong class="strng ">Meta Description: </strong>
                                <textarea name="meta_description" class="form-control required" rows="3" >{{ old('meta_description', $user->meta_description) }}</textarea>
                            </div>
                        </div>-->

                        <!-- PASSWORD 
                        <div class="col-md-12"><h6 class="section-title">Security</h6></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong class="strng required-label">Password (leave blank to keep current):</strong>
                                <input type="password" name="password" id="password" class="form-control" minlength="8">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong class="strng required-label">Confirm Password:</strong>
                                <input type="password" name="confirm-password" class="form-control" minlength="8">
                            </div>
                        </div>

                        <!-- CATEGORY -->
                        <!--{{-- <div class="col-md-12">-->
                        <!--    <div class="form-group">-->
                        <!--        <strong class="strng required-label">Category (Roles): </strong>-->
                        <!--        <select name="roles[]" class="form-control hg100" multiple required>-->
                        <!--            @foreach ($roles as $value => $label)-->
                        <!--            <option value="{{ $value }}" {{ in_array($value, old('roles', $user->roles->pluck('id')->toArray())) ? 'selected' : '' }}>{{ $label }}</option>-->
                        <!--            @endforeach-->
                        <!--        </select>-->
                        <!--    </div>-->
                        <!--</div> --}}-->

                        <!-- STATUS TOGGLES 
                
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>-->

 <div class="frmGrp">
                <form id="userform" method="POST" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

        <div class="col-md-12"><h6 class="section-title">Status Options</h6></div>
                        @foreach(['is_active' => 'Is Active?', 'is_featured' => 'Is Featured?', 'is_block' => 'Is Blocked?', 'is_locked' => 'Is Locked?'] as $name => $label)
                        <div class="col-md-3">
                            <div class="form-group">
                                <strong class="strng">{{ $label }}</strong><br>
                                <input type="hidden" name="{{ $name }}" value="0">
                                <input type="checkbox" name="{{ $name }}" value="1" {{ old($name, $user->$name) ? 'checked' : '' }}> Yes
                            </div>
                        </div>
                        @endforeach

                        <div class="col-md-12 mt-4">
                            <button type="submit" class="btn btn-sm comnBtn">
                                <i class="fa-solid fa-floppy-disk"></i> Submit
                            </button>

  </form>

<!-- jQuery + Validation -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>


<script>
    let selectedState = "{{ old('state_id', $user->state_id) }}";
    let selectedCity  = "{{ old('city_id', $user->city_id) }}";

    function loadStates(countryID, callback) {
        let stateUrl = `{{ route('location.states', ':id') }}`.replace(':id', countryID);
        $.get(stateUrl, function(states) {
            let options = '<option value="">-- Select State --</option>';
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
            let options = '<option value="">-- Select City --</option>';
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
            $('#city').html('<option value="">-- Select City --</option>');
            loadStates($(this).val());
        });

        $('#state').on('change', function () {
            selectedCity = '';
            loadCities($(this).val());
        });
    });
</script>


<script>
    $(document).ready(function() {
        $("#userform").validate({
            rules: {
                name: {
                    required: true,
                    minlength: 2
                },
                phone: {
                    required: true,
                    minlength: 10,
                    maxlength: 10,
                    digits: true
                },
                email: {
                    required: true,
                    email: true
                },
                facebook: {
                    required: false,
                    url: true
                },
                website: {
                    required: false,
                    url: true
                },
                whatsup: {
                    required: true,
                    minlength: 10,
                    maxlength: 10,
                    digits: true
                },
                country_id: "required",
                state_id: "required",
                city_id: "required",
                age: {
                    required: true,
                    min: 1,
                    max: 120,
                    digits: true
                },
                gender: "required",
                experience: "required",
                language: "required",
                other: "required",
                /*page_title: "required",
                meta_title: "required",
                meta_keyword: "required",
                description: "required",
                short_description: "required",
                meta_description: "required",*/
                "roles[]": "required",
                password: {
                    minlength: 8
                },
                "confirm-password": {
                    equalTo: "#password"
                }
            },
            messages: {
                name: {
                    required: "Please enter your name",
                    minlength: "Name must be at least 2 characters long"
                },
                phone: {
                    required: "Please enter your mobile number",
                    minlength: "Mobile number must be 10 digits",
                    maxlength: "Mobile number must be 10 digits",
                    digits: "Please enter only digits"
                },
                email: {
                    required: "Please enter your email",
                    email: "Please enter a valid email address"
                },
                facebook: {
                    required: "Please enter your Facebook URL",
                    url: "Please enter a valid URL"
                },
                website: {
                    required: "Please enter your website URL",
                    url: "Please enter a valid URL"
                },
                whatsup: {
                    required: "Please enter your WhatsApp number",
                    minlength: "WhatsApp number must be 10 digits",
                    maxlength: "WhatsApp number must be 10 digits",
                    digits: "Please enter only digits"
                },
                country_id: "Please select a country",
                state_id: "Please select a state",
                city_id: "Please select a city",
                age: {
                    required: "Please enter your age",
                    min: "Age must be at least 1",
                    max: "Age cannot be more than 120",
                    digits: "Please enter only digits"
                },
                gender: "Please select your gender",
                experience: "Please select your experience",
                language: "Please select your language",
                other: "Please select other option",
                page_title: "Please enter page title",
                meta_title: "Please enter meta title",
                meta_keyword: "Please enter meta keywords",
                description: "Please enter description",
                short_description: "Please enter short description",
                meta_description: "Please enter meta description",
                "roles[]": "Please select at least one role",
                password: {
                    minlength: "Password must be at least 8 characters long"
                },
                "confirm-password": {
                    equalTo: "Passwords do not match"
                }
            },
            errorElement: 'span',
            errorClass: 'error',
            errorPlacement: function(error, element) {
                error.insertAfter(element);
            },
            highlight: function(element, errorClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>

<!-- Styles -->
<style>
    .error {
        color: red;
        display: block;
        margin-top: 5px;
        font-size: 0.875rem;
    }
    .required-label::after {
        content: " *";
        color: red;
    }
    .section-title {
        font-weight: bold;
        font-size: 1.1rem;
        margin-top: 20px;
        margin-bottom: 10px;
        border-bottom: 1px solid #ddd;
        padding-bottom: 5px;
    }
    .is-invalid {
        border-color: #dc3545 !important;
    }
    .form-control.is-invalid:focus {
        border-color: #dc3545;
        box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
    }
</style>
@endsection