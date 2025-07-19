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
    .btn-add-image {
        background-color: #28a745; /* Bootstrap success green color */
        color: white;
        border-radius: 4px;
        padding: 5px 10px;
        border: none;
        font-size: 14px;
        margin-left: 5px;
    }

    .btn-add-image i {
        margin-right: 5px; /* Space between icon and text */
    }

    .btn-add-image:hover {
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
</style>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">My Certifications</h5>

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <!-- Table with DataTables -->
                    <table id="datatable" class="table">
                        <thead class="mobileHide">
                            <tr>
                                <th width="100px">No.</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th width="280px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 0; @endphp
                            @foreach ($userImages as $img)
                                <tr class="flexTbl">
                                    <td><span class="mobileShow">No. :</span> {{ ++$i }}</td>
                                    <td>
                                        <span class="mobileShow">Image :</span>
                                        @if($img->image)
                                            <img src="{{ asset('all_user_image/' . $img->image) }}" alt="User Image" height="50" width="50">
                                        @else
                                            <img src="{{ asset('all_user_image/default.jpg') }}" alt="Default Image" height="50" width="50">
                                        @endif
                                    </td>
                                    <td>
                                        <span class="mobileShow">Status :</span>
                                        <span class="badge {{ $img->status ? 'bg-success' : 'bg-danger' }}">
                                            {{ $img->status ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="mobileShow">Actions :</span>
                                        <div class="ThreeBtns">
                                            <a href="{{ route('user-images.edit', $img->id) }}" class="btn btn-outline-primary btn-sm">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <form action="{{ route('user-images.destroy', $img->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure?')">
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
                text: '<img src="{{ asset('admin/img/plus-icon.png') }}" class="iconbt img-fluid" alt="plus icon"> Add New Image',
                className: 'btn-add-image',
                action: function(e, dt, node, config) {
                    window.location.href = "{{ route('user-images.create', ['user_id' => request('user_id', Auth::id())]) }}";
                }
            }
        ],
        language: {
            search: " ",
            searchPlaceholder: "Search",
            emptyTable: "No images found."
        }
    });
});
</script>
@endsection
