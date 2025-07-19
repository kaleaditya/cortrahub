@extends('layouts.admin.app')

@section('content')

<style>
  /* Modal Design */
  .modal-content {
    border-radius: 8px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
  }

  .modal-body {
    font-size: 1rem;
    line-height: 1.5;
  }

  /* Order Details */
  .order-details p {
    margin-bottom: 0.5rem;
  }

  .order-details strong {
    color: #343a40;
  }

  /* Order Tracking Timeline */
  .timeline {
    list-style-type: none;
    position: relative;
    padding-left: 0;
  }

  .timeline:before {
    content: '';
    background: #28a745;
    position: absolute;
    top: 0;
    left: 24px;
    width: 3px;
    height: 100%;
  }

  .timeline-item {
    position: relative;
    margin: 20px 0;
    padding-left: 60px;
  }

  .timeline-item:before {
    content: '';
    background: #fff;
    border: 3px solid #28a745;
    position: absolute;
    top: 0;
    left: 15px;
    width: 20px; /* Smaller width */
    height: 20px; /* Smaller height */
    border-radius: 50%;
  }

  .timeline-item .badge {
    font-size: 0.875rem;
  }

  /* POD Image */
  .pod-image {
    border-radius: 4px;
    border: 1px solid #dee2e6;
    transition: transform 0.3s ease;
  }

  .pod-image:hover {
    transform: scale(1.1);
  }

  .modal-footer {
    background-color: #f8f9fa;
    border-top: 1px solid #dee2e6;
  }

  /* Badge Icons */
  .badge-icon {
    margin-right: 8px;
  }

    /* Custom styling for the search box */
    .dataTables_filter {
        text-align: left !important; /* Align search box to the left */
    }

    /* Styling the input box inside the search filter */
    .dataTables_filter input {
        background-color: red;  /* Red background color */
        color: black;           /* Text color */
        border: none;
        padding: 5px;
        border-radius: 4px;
        padding-left: 30px;     /* Space for the magnifier icon */
        background-image: url('https://cdn-icons-png.flaticon.com/512/622/622669.png'); /* Magnifier icon */
        background-size: 20px;
        background-position: 5px center;
        background-repeat: no-repeat;
        float: left;
    }

    /* Optional: Hover effect */
    .dataTables_filter input:focus {
        outline: none;
        background-color: darkred;
    }
</style>
<style>
    /* Align the export button to the right */
    .dt-buttons {
        float: right;  /* Align the buttons to the right */
    }

    /* Custom styles for the export button */
    .btn-export {
        background-color: #007bff;  /* Bootstrap primary blue color */
        color: white;
        border-radius: 4px;
        padding: 5px 10px;
        border: none;
        font-size: 14px;
        float: right;
    }

    .btn-export i {
        margin-right: 5px;  /* Space between icon and text */
    }

    /* Change button color on hover */
    .btn-export:hover {
        background-color: #0056b3;  /* Darker blue */
        color: white;
    }

    /* Ensure the search box aligns to the left */
    .dataTables_filter {
        text-align: left !important;
    }
    #datatable_filter{
        float: left;
    }
    #datatable_wrapper > div.dt-buttons{
        float: right;
    }

    /* Custom styling for the search input box */

</style>
<style>
    /* Custom styling for the sort button */
    .btn-sort {
        background-color: #28a745;  /* Bootstrap success green color */
        color: white;
        border-radius: 4px;
        padding: 5px 10px;
        border: none;
        font-size: 14px;
        margin-left: 5px;  /* Add space between export and sort buttons */
    }

    .btn-sort i {
        margin-right: 5px;  /* Space between icon and text */
    }

    /* Change button color on hover */
    .btn-sort:hover {
        background-color: #218838;  /* Darker green */
        color: white;
    }

    /* Existing styles for the export button */
    .btn-export {
        background-color: #007bff;
        color: white;
        border-radius: 4px;
        padding: 5px 10px;
        border: none;
        font-size: 14px;
    }

    .btn-export i {
        margin-right: 5px;
    }

    .btn-export:hover {
        background-color: #0056b3;
        color: white;
    }

    /* Align buttons to the right */
    .dt-buttons {
        float: right;
    }

    /* Custom styling for the search input box */
    .dataTables_filter input {
        background-color: red;
        color: white;
        border: none;
        padding: 5px;
        border-radius: 4px;
        padding-left: 30px;
        background-image: url('https://cdn-icons-png.flaticon.com/512/622/622669.png');
        background-size: 20px;
        background-position: 5px center;
        background-repeat: no-repeat;
    }

    .dataTables_filter {
        text-align: left !important;
    }
</style>

<section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
               <!--  <div class="row">
                    <div class="col-11">
                    <h5 class="card-title">User Management</h5>
                    </div>
                    <div class="col-1">
                    {{-- <a href="{{ route('users.create')}}" class="btn btn-outline-primary btn-sm mt-3">Add</a> --}}
                    </div>
                </div> -->
            <!-- Table with stripped rows -->
              <div class="table-responsive">
                  <table id="datatable" class="table">
                <thead class="mobileHide">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    
                    <th>Status</th>
                    <th>Category</th>
                    <th>Send-Email</th>
                    <th width="280px">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($data as $key => $user)
                        <tr class="flexTbl">
                            <td><span class="mobileShow">No. :</span> {{ ++$i }}</td>
                            <td><span class="mobileShow">Name :</span> {{ $user->name }}</td>
                            <td><span class="mobileShow">Email :</span> {{ $user->email }}</td>
                            
                            <td>
                                <span class="mobileShow">Status :</span>
                                @if($user->is_active)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-secondary">Inactive</span>
                                @endif

                                @if($user->is_featured)
                                    <span class="badge bg-info">Featured</span>
                                @endif

                                @if($user->is_locked)
                                    <span class="badge bg-warning">Locked</span>
                                @endif

                                @if($user->is_block)
                                    <span class="badge bg-danger">Blocked</span>
                                @endif
                            </td>

                            <td><span class="mobileShow">Roles :</span>
                            @if(!empty($user->getRoleNames()))
                                @foreach($user->getRoleNames() as $v)
                                <label class="text-primary">{{ $v }}</label>
                                @endforeach
                            @endif
                            </td>

                            <td><span class="mobileShow">Mail Status :</span>
                                                    @if ($user->mail_status == 0)
                                                        <a href="{{ route('send.mail', $user->id) }}"
                                                            onclick="return confirm('Are you sure ?')"><label
                                                                class="badge bg-danger">Pending</label></a>
                                                    @else
                                                        <label class="badge bg-success">Sent</label>
                                                    @endif
                                                </td>

                            <td>
                            <div class="ThreeBtns">
                                <!--<a href="{{ route('user-images.create', ['user_id' => $user->id]) }}" class="btn btn-sm btn-info me-1" data-bs-toggle="tooltip" title="Add Image">
                                    <i class="bi bi-image"></i>
                                </a>

                                <a href="{{ route('manage-documents.create', ['user_id' => $user->id]) }}" class="btn btn-sm btn-info me-1" data-bs-toggle="tooltip" title="Add Document">
                                    <i class="bi bi-file-earmark-text"></i>
                                </a>

                                <a href="{{ route('video-galleries.create', ['user_id' => $user->id]) }}" class="btn btn-sm btn-warning me-1" data-bs-toggle="tooltip" title="Add Video">
                                    <i class="bi bi-camera-video"></i>
                                </a>-->

                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-primary me-1" data-bs-toggle="tooltip" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>

                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" data-bs-toggle="tooltip" title="Delete" onclick="return confirm('Are you sure you want to delete this user?')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>

                        </tr>
                    @endforeach
                </tbody>
              </table>
              </div>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

    <script>
     $(document).ready(function() {
    var table = $('#datatable').DataTable({
        dom: 'Bfrtip',
        pageLength: 10,
        buttons: [
            {
                extend: 'excelHtml5',
                text: '<img src="{{asset('admin')}}/img/export.png" class="iconbt img-fluid" alt="export icon"> Export',  // Adding upload icon and "Export" text
                className: 'btn-export',  // Custom class for styling the button
                exportOptions: {
                    // Ensure all rows are exported (not just visible ones)
                    columns: ':visible',
                    format: {
                        body: function (data, row, column, node) {
                            // Use jQuery to remove span elements with 'mobileShow' class
                            var strippedData = $('<div>').html(data).find('.mobileShow').remove().end().text();
                            return strippedData.trim(); // Trim extra spaces
                        }
                    },
                    columns: ':not(:last-child)'
                }
            },
            {
                text: '<img src="{{asset('admin')}}/img/plus-icon.png" class="iconbt img-fluid" alt="plus icon"> Add New',  // Adding a plus icon with "Add Order" text
                className: 'btn-add-order greenBtn',  // Custom class for the button
                action: function(e, dt, node, config) {
                    window.location.href = "{{ route('users.create') }}";  // Redirect to the order creation route
                }
            }
        ],
        language: {
            search: " ",  // Hide default 'Search' label
            searchPlaceholder: "Search"  // Placeholder for the search box
        }
    });
});
  </script>

<style>
  .ThreeBtns {
    display: flex;
    gap: 5px;
  }
  .btn-sm {
    padding: 0.25rem 0.5rem;
  }
  .bi {
    font-size: 0.875rem;
  }
</style>
@endsection