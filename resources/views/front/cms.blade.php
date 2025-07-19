 @extends('layouts.front.app')
@section('content')


<section class="bg-light py-5 ">
  <div class="container d-flex flex-wrap align-items-center justify-content-center">
    <div class="shadow rounded p-4 w-100" style="max-width: 90%;">
      <h2 class="text-center py-5">{{ $cms->title }}</h2>
      <div class="bg-light px-5">{!! $cms->description !!}</div>
    </div>
  </div>
</section>



@endsection