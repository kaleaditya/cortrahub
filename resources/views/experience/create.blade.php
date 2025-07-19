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
                <h5 class="card-title"> Create</h5>
            </div>
            <div class="pull-right">
                <a class="btn btn-sm mb-2 comnBtn whtTxt borderBtn" href="{{ route('experiences.index') }}"> Back</a>
           </div>
        </div>
    </div>

              <!-- Horizontal Form -->
    <div class="frmGrp antherGrp">
              <form action="{{ route('experiences.store') }}" method="POST" enctype="multipart/form-data" id="item"> @csrf

                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-1 col-form-label strng flexCntr"> Speciality <span class="text-danger">*</span></label>
                  <div class="col-sm-5">
                    <input type="text" name="title" value="{{old('title')}}" class="form-control required" id="inputText">
                   </div>
                </div>

                 <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-1 col-form-label strng flexCntr"> Category <span class="text-danger">*</span></label>
                  <div class="col-sm-5">
                   <select name="category_id" id="" class="form-control required" >
                    <option value="">Select</option>
                    @foreach($roles as $role)
                        <option value="{{$role->id}}">{{$role->name}}</option>
                    @endforeach
                   </select>
                   </div>
                </div>

                 <input type="hidden" name="is_active" value="0">
                <div class="row mb-3">
                    <label for="is_active" class="col-sm-1 col-form-label strng flexCntr"> Active </label>
                    <div class="col-sm-5 d-flex align-items-center">
                        <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                    </div>
                </div>

                <!-- <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">content <span class="text-danger">*</span></label>
                  <div class="col-sm-10">
                    <textarea name="content" class="form-control" >{{old('content')}}</textarea>

                    @error('content')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div> -->

                <!-- <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label"> Image</label>
                  <div class="col-sm-10">
                    <input type="file" name="image" class="form-control" >
                    @error('image')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div> -->
                <div class="mt50 pddLftStLow">
                  <button type="submit" class="btn btn-sm comnBtn">Submit</button>
                  <!-- <a href="{{ route('order-item')}}" class="btn btn-secondary btn-sm">Back</a> -->
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
            // alert("well done");

            $("#item").validate({
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
