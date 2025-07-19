@extends('layouts.admin.app')
<script src="https://code.jquery.com/jquery-1.11.3.js"></script>
@section('content')

<div class="row">
<div class="col-lg-12">
<div class="card cardPdd">
    <div class="card-body topText">
        <div class="col-lg-12 margin-tb">
            <div class="flexBdy">
            <div class="pull-left">
                <h5 class="card-title"> Edit</h5>
            </div>

            <div class="pull-right">
                <a class="btn btn-sm mb-2 comnBtn whtTxt borderBtn" href="{{ route('languages.index') }}"> Back</a>
            </div>
            </div>
        </div>
    </div>
    <section class="section frmGrp">
      <div class="row">
        <div class="col-lg-12">


              <!-- Horizontal Form -->
              <form action="{{ route('languages.update',$language->id) }}" method="POST" enctype="multipart/form-data"> @csrf
@method('put')
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-1 col-form-label strng flexCntr"> Language <span class="text-danger">*</span></label>
                  <div class="col-sm-5">
                    <input type="text" name="title" value="{{ $language->title }}" class="form-control" id="inputText">
                        @error('title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                  </div>
                </div>
                <div class="row mb-3">
                    <label for="is_active" class="col-sm-1 col-form-label strng flexCntr"> Active </label>
                    <div class="col-sm-5 d-flex align-items-center">
                                <input type="hidden" name="is_active" value="0">

                        <input type="checkbox" name="is_active" id="is_active" value="1" {{ $language->is_active == 1 ? 'checked' : '' }}>
                    </div>
                </div>


                <div class="text-left mt50 pddLftStLow">
                  <button type="submit" class="btn btn-sm comnBtn whtTxt">Update</button>

                </div>
              </form>

          </div>
        </div>

    </section>
    </div>
  </div>
</div>

@endsection
