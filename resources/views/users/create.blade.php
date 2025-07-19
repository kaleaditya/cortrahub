@extends('layouts.admin.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card cardPdd">
            <div class="card-body topText">
                <div class="col-lg-12 margin-tb">
                    <div class="flexBdy">
                        <div class="pull-left">
                            <h5 class="card-title">Create New User</h5>
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
                <form method="POST" action="{{ route('users.store') }}" id="userform" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <!-- BASIC INFO -->
                        <div class="col-md-12"><h6 class="section-title">Basic Info</h6></div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <strong class="strng required-label">Directory Name:</strong>
                                <input type="text" name="name" placeholder="Name" class="form-control required">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <strong class="strng required-label">Mobile No:</strong>
                                <input type="text" name="phone" placeholder="Enter Mobile No." class="form-control required">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <strong class="strng required-label">Email:</strong>
                                <input type="email" name="email" placeholder="Enter Email" class="form-control required">
                            </div>
                        </div>

                        <!-- SOCIAL LINKS -->
                        <div class="col-md-12"><h6 class="section-title">Social Info</h6></div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <strong class="strng">Facebook:</strong>
                                <input type="text" name="facebook" placeholder="Enter Facebook" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <strong class="strng ">Website:</strong>
                                <input type="text" name="website" placeholder="Enter Website" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <strong class="strng required-label">WhatsApp:</strong>
                                <input type="text" name="whatsup" placeholder="Enter WhatsApp No" class="form-control required">
                            </div>
                        </div>

                        <!-- LOCATION -->
                        <div class="col-md-12"><h6 class="section-title">Location</h6></div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <strong class="strng required-label">Country:</strong>
                                <select name="country_id" class="form-control required">
                                    <option value="">-- Select Country --</option>
                                    <option value="india">India</option>
                                    <option value="usa">United States</option>
                                    <option value="uk">United Kingdom</option>
                                    <option value="canada">Canada</option>
                                    <option value="australia">Australia</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <strong class="strng required-label">State:</strong>
                                <select name="state_id" class="form-control required">
                                    <option value="">-- Select State --</option>
                                    <option value="gujarat">Gujarat</option>
                                    <option value="california">California</option>
                                    <option value="ontario">Ontario</option>
                                    <option value="new_south_wales">New South Wales</option>
                                    <option value="london">London</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <strong class="strng required-label">City:</strong>
                                <select name="city_id" class="form-control required">
                                    <option value="">-- Select City --</option>
                                    <option value="ahmedabad">Ahmedabad</option>
                                    <option value="los_angeles">Los Angeles</option>
                                    <option value="toronto">Toronto</option>
                                    <option value="sydney">Sydney</option>
                                    <option value="manchester">Manchester</option>
                                </select>
                            </div>
                        </div>

                        <!-- PROFILE INFO -->
                        <div class="col-md-12"><h6 class="section-title">Profile Info</h6></div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <strong class="strng required-label">Exposure (In Years):</strong>
                                <input type="text" name="age" placeholder="Exposure in Years" class="form-control required">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <strong class="strng required-label">Gender:</strong>
                                <select name="gender" class="form-control required">
                                    <option value=""> Select Gender </option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <strong class="strng required-label">Image:</strong>
                                <input type="file" name="image" class="form-control required">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <strong class="strng required-label">Speciality:</strong>
                                <select name="experience" class="form-control required">
                                    <option value="">Select Speciality</option>
                                    @foreach($experiences as $experience)
                                    <option value="{{$experience->id}}">{{$experience->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <strong class="strng required-label">Language:</strong>
                                <select name="language" class="form-control required">
                                    <option value="">Select Language</option>
                                    @foreach($languages as $language)
                                    <option value="{{$language->id}}">{{$language->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <strong class="strng required-label">Others:</strong>
                                <select name="other" class="form-control required">
                                    <option value="">Select Other</option>
                                    @foreach($others as $other)
                                    <option value="{{$other->id}}">{{$other->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- META INFO -->
                        <div class="col-md-12"><h6 class="section-title">Meta Info</h6></div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <strong class="strng ">Page Title:</strong>
                                <input type="text" name="page_title" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <strong class="strng ">Meta Title:</strong>
                                <input type="text" name="meta_title" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <strong class="strng">Meta Keywords:</strong>
                                <input type="text" name="meta_keyword" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <strong class="strng required-label">Description:</strong>
                                <textarea name="description" class="form-control required" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <strong class="strng ">Short Description:</strong>
                                <textarea name="short_description" class="form-control" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <strong class="strng ">Meta Description:</strong>
                                <textarea name="meta_description" class="form-control" rows="3"></textarea>
                            </div>
                        </div>

                        <!-- PASSWORD -->
                        <div class="col-md-12"><h6 class="section-title">Security</h6></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong class="strng required-label">Password:</strong>
                                <input type="password" name="password" class="form-control required">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong class="strng required-label">Confirm Password:</strong>
                                <input type="password" name="confirm-password" class="form-control required">
                            </div>
                        </div>

                        <!-- CATEGORY -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <strong class="strng required-label">Category (Roles):</strong>
                                <select name="roles[]" class="form-control hg100" multiple>
                                    @foreach ($roles as $value => $label)
                                    <option value="{{ $value }}">{{ $label }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- STATUS TOGGLES -->
                        <div class="col-md-12"><h6 class="section-title">Status Options</h6></div>
                        @foreach(['is_active' => 'Is Active?', 'is_featured' => 'Is Featured?', 'is_block' => 'Is Blocked?', 'is_locked' => 'Is Locked?'] as $name => $label)
                        <div class="col-md-3">
                            <div class="form-group">
                                <strong class="strng">{{ $label }}</strong><br>
                                <input type="hidden" name="{{ $name }}" value="0">
                                <input type="checkbox" name="{{ $name }}" value="1"> Yes
                            </div>
                        </div>
                        @endforeach

                        <div class="col-md-12 mt-4">
                            <button type="submit" class="btn btn-sm comnBtn">
                                <i class="fa-solid fa-floppy-disk"></i> Submit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- jQuery + Validation -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
<script>
    $(document).ready(function () {
        $("#userform").validate({
            errorClass: "error"
        });
    });
</script>

<!-- Styles -->
<style>
    .error { color: red; }
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
</style>
@endsection