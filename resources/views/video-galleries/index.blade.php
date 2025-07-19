@extends('layouts.admin.app')

@section('content')
<style>
    /* Modal Design (for consistency, though not used in this table) */
    .modal-content {
        border-radius: 8px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    }

    .modal-body {
        font-size: 1rem;
        line-height: 1.5;
    }

    /* Badge Icons */
    .badge-icon {
        margin-right: 8px;
    }

    /* Custom styling for the search box */
    .dataTables_filter {
        text-align: left !important; /* Align search box to the left */
    }

    .dataTables_filter input {
        background-color: red; /* Red background color */
        color: black; /* Text color */
        border: none;
        padding: 5px;
        border-radius: 4px;
        padding-left: 30px; /* Space for the magnifier icon */
        background-image: url('https://cdn-icons-png.flaticon.com/512/622/622669.png'); /* Magnifier icon */
        background-size: 20px;
        background-position: 5px center;
        background-repeat: no-repeat;
        float: left;
    }

    .dataTables_filter input:focus {
        outline: none;
        background-color: darkred;
    }

    /* Align the export button to the right */
    .dt-buttons {
        float: right; /* Align the buttons to the right */
    }

    /* Custom styles for the export button */
    .btn-export {
        background-color: #007bff; /* Bootstrap primary blue color */
        color: white;
        border-radius: 4px;
        padding: 5px 10px;
        border: none;
        font-size: 14px;
        margin-left: 5px;
    }

    .btn-export i {
        margin-right: 5px; /* Space between icon and text */
    }

    .btn-export:hover {
        background-color: #0056b3; /* Darker blue */
        color: white;
    }

    /* Custom styling for the add button */
    .btn-add-video {
        background-color: #28a745; /* Bootstrap success green color */
        color: white;
        border-radius: 4px;
        padding: 5px 10px;
        border: none;
        font-size: 14px;
        margin-left: 5px;
    }

    .btn-add-video i {
        margin-right: 5px; /* Space between icon and text */
    }

    .btn-add-video:hover {
        background-color: #218838; /* Darker green */
        color: white;
    }

    /* Ensure search box aligns to the left */
    #datatable_filter {
        float: left;
    }

    #datatable_wrapper > div.dt-buttons {
        float: right;
    }

    /* Video player styling */
    .video-player {
        width: 320px;
        height: 180px;
        border-radius: 4px;
        display: block;
    }

    @media (max-width: 576px) {
        .video-player {
            width: 100%;
            height: auto;
        }
    }
</style>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">My Awards</h5>

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <!-- Table with DataTables -->
                    <table id="datatable" class="table">
                        <thead class="mobileHide">
                            <tr>
                                <th width="100px">#</th>
                                <th>Video</th>
                                <th>Status</th>
                                <th width="280px">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 0; @endphp
                            @foreach($videos as $video)
                                <tr class="flexTbl">
                                    <td><span class="mobileShow">No. :</span> {{ ++$i }}</td>
                                    <td>
                                        <span class="mobileShow">Video :</span>
                                        @php
                                            $isYouTube = preg_match('/(?:youtube\.com\/(?:watch\?v=|embed\/)|youtu\.be\/)([\w-]+)/', $video->link, $ytMatches);
                                            $isVimeo = preg_match('/vimeo\.com\/(\d+)/', $video->link, $vimeoMatches);
                                            $isDirectVideo = preg_match('/\.(mp4|ogg|webm)$/i', $video->link);
                                            $extension = $isDirectVideo ? strtolower(pathinfo($video->link, PATHINFO_EXTENSION)) : '';
                                            $videoType = $extension === 'mp4' ? 'video/mp4' : ($extension === 'ogg' ? 'video/ogg' : 'video/webm');
                                        @endphp

                                        @if($isYouTube)
                                            <iframe
                                                class="video-player"
                                                src="https://www.youtube.com/embed/{{ $ytMatches[1] }}?autoplay=1&mute=1&controls=1"
                                                frameborder="0"
                                                allow="autoplay; encrypted-media"
                                                allowfullscreen
                                            ></iframe>
                                        @elseif($isVimeo)
                                            <iframe
                                                class="video-player"
                                                src="https://player.vimeo.com/video/{{ $vimeoMatches[1] }}?autoplay=1&muted=1"
                                                frameborder="0"
                                                allow="autoplay; fullscreen"
                                                allowfullscreen
                                            ></iframe>
                                        @elseif($isDirectVideo)
                                            <video
                                                class="video-player"
                                                width="320"
                                                controls
                                                autoplay
                                                muted
                                            >
                                                <source src="{{ $video->link }}" type="{{ $videoType }}">
                                                Your browser does not support HTML video.
                                            </video>
                                        @else
                                            <a href="{{ $video->link }}" target="_blank">{{ \Illuminate\Support\Str::limit($video->link, 50) }}</a>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="mobileShow">Status :</span>
                                        <span class="badge {{ $video->is_active ? 'bg-success' : 'bg-danger' }}">
                                            {{ $video->is_active ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="mobileShow">Actions :</span>
                                        <div class="ThreeBtns">
                                            <a href="{{ route('video-galleries.edit', $video->id) }}" class="btn btn-outline-warning btn-sm">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <form action="{{ route('video-galleries.destroy', $video->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Delete this video?')">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
$(document).ready(function() {
    var table = $('#datatable').DataTable({
        dom: 'Bfrtip',
        pageLength: 5,
        buttons: [

            {
                text: '<img src="{{ asset('admin/img/plus-icon.png') }}" class="iconbt img-fluid" alt="plus icon"> Add New Video',
                className: 'btn-add-video',
                action: function(e, dt, node, config) {
                    window.location.href = "{{ route('video-galleries.create', ['user_id' => request('user_id', Auth::id())]) }}";
                }
            }
        ],
        language: {
            search: " ",
            searchPlaceholder: "Search",
            emptyTable: "No videos found."
        }
    });
});
</script>
@endsection
