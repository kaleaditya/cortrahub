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
                  <h5 class="card-title">Edit Country</h5>
                </div>
                <div class="pull-right">
                  <a class="btn btn-sm mb-2 comnBtn whtTxt borderBtn" href="{{ route('countries.index') }}">Back</a>
                </div>
              </div>
            </div>

            <!-- Horizontal Form -->
            <div class="frmGrp antherGrp">
              <form action="{{ route('countries.update', $country) }}" method="POST" id="countryForm">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                  <label for="name" class="col-sm-1 col-form-label strng flexCntr">Name <span class="text-danger">*</span></label>
                  <div class="col-sm-5">
                    <input type="text" name="name" value="{{ old('name', $country->name) }}" class="form-control required" id="name">
                    @error('name')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>

                {{-- <div class="row mb-3">
                  <label for="code" class="col-sm-1 col-form-label strng flexCntr">Code <span class="text-danger">*</span></label>
                  <div class="col-sm-5">
                    <input type="text" name="code" value="{{ old('code', $country->code) }}" class="form-control required" id="code">
                    @error('code')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div> --}}

                <input type="hidden" name="is_active" value="{{ $country->is_active }}">

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
    <script>
      $(document).ready(function() {
        $("#countryForm").validate({
          errorClass: "error"
        });
      });
    </script>
    <style>
      .error {
        color: red;
      }
    </style>
@endsection
