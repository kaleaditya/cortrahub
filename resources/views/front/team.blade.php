@extends('layouts.front.app')

@section('content')

<!-- Main Content -->
<div class="container py-4">
    <h2 class="text-center">Meet Our Team</h2>
    <div class="row g-4">
        @foreach($teams as $team)
            <div class="col-sm-6 col-md-4 mb-4">
                <div class="card p-3 h-100 border rounded-4 shadow-sm" style="border-width: 2px;">
                    <img src="{{ asset('all_image/' . $team->image) }}" class="card-img-top rounded-circle mx-auto mt-2" alt="{{ $team->name }}" style="width: 150px; height: 150px; object-fit: cover;">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $team->name }}</h5>
                        <p class="card-subtitle text-muted">{{ $team->designation }}</p>

                        @php
                            $words = explode(' ', strip_tags($team->description));
                            $first20 = implode(' ', array_slice($words, 0, 20));
                            $remaining = implode(' ', array_slice($words, 20));
                        @endphp

                        <div class="team-description mt-2">
                            <span class="short-text">
                                {!! $first20 !!}
                                @if(count($words) > 20)
                                    ... <a href="javascript:void(0);" class="read-more text-primary">Read More</a>
                                @endif
                            </span>

                            @if(count($words) > 20)
                                <span class="full-text d-none">
                                    {!! $first20 !!} {!! $remaining !!}
                                    <a href="javascript:void(0);" class="read-less text-danger">Read Less</a>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {
        $('.read-more').click(function () {
            var parent = $(this).closest('.team-description');
            parent.find('.short-text').hide();
            parent.find('.full-text').removeClass('d-none');
        });

        $('.read-less').click(function () {
            var parent = $(this).closest('.team-description');
            parent.find('.full-text').addClass('d-none');
            parent.find('.short-text').show();
        });
    });
</script>

@endsection
