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
    width: 20px;
    height: 20px;
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
    text-align: left !important;
  }

  .dataTables_filter input {
    background-color: red;
    color: black;
    border: none;
    padding: 5px;
    border-radius: 4px;
    padding-left: 30px;
    background-image: url('https://cdn-icons-png.flaticon.com/512/622/622669.png');
    background-size: 20px;
    background-position: 5px center;
    background-repeat: no-repeat;
    float: left;
  }

  .dataTables_filter input:focus {
    outline: none;
    background-color: darkred;
  }
</style>
<style>
  /* Align the export button to the right */
  .dt-buttons {
    float: right;
  }

  /* Custom styles for the export button */
  .btn-export {
    background-color: #007bff;
    color: white;
    border-radius: 4px;
    padding: 5px 10px;
    border: none;
    font-size: 14px;
    float: right;
  }

  .btn-export i {
    margin-right: 5px;
  }

  .btn-export:hover {
    background-color: #0056b3;
    color: white;
  }

  .dataTables_filter {
    text-align: left !important;
  }
  #datatable_filter{
    float: left;
  }
  #datatable_wrapper > div.dt-buttons{
    float: right;
  }
</style>
<style>
  /* Custom styling for the sort button */
  .btn-sort {
    background-color: #28a745;
    color: white;
    border-radius: 4px;
    padding: 5px 10px;
    border: none;
    font-size: 14px;
    margin-left: 5px;
  }

  .btn-sort i {
    margin-right: 5px;
  }

  .btn-sort:hover {
    background-color: #218838;
    color: white;
  }

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

  .dt-buttons {
    float: right;
  }

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
          @if(session('success'))
            <div class="alert alert-success">
              {{ session('success') }}
            </div>
          @endif
          
          <div class="table-responsive">
            <table id="datatable" class="table">
              <thead class="mobileHide">
                <tr>
                  <th>Id</th>
                  <th>Title</th>
                  <th>Page Title</th>
                  <th>Meta Title</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($cms as $key => $page)
                  <tr class="flexTbl">
                    <td><span class="mobileShow">Id :</span> {{ $key + 1 }}</td>
                    <td><span class="mobileShow">Title :</span> {{ $page->title }}</td>
                    <td><span class="mobileShow">Page Title :</span> {{ $page->page_title }}</td>
                    <td><span class="mobileShow">Meta Title :</span> {{ $page->meta_title }}</td>
                    <td>
                      <span class="mobileShow">Status :</span>
                      @if($page->is_active)
                        <span class="badge badge-success">Active</span>
                      @else
                        <span class="badge badge-danger">Inactive</span>
                      @endif
                    </td>
                    <td>
                      <div class="ThreeBtns">
                        <a href="{{ route('cms.edit', $page->id) }}" class="bi bi-pencil-square btn btn-outline-primary btn-sm"></a>
                        <form action="{{ route('cms.destroy', $page->id) }}" method="POST" class="d-inline">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="bi bi-trash btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure you want to delete this page?')"></button>
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
  </div>
</section>

<script>
$(document).ready(function() {
  var table = $('#datatable').DataTable({
    dom: 'Bfrtip',
    pageLength: 10,
    buttons: [
      {
        text: '<img src="{{asset('admin')}}/img/plus-icon.png" class="iconbt img-fluid" alt="plus icon"> Add New',
        className: 'btn-add-order greenBtn',
        action: function(e, dt, node, config) {
          window.location.href = "{{ route('cms.create') }}";
        }
      }
    ],
    language: {
      search: " ",
      searchPlaceholder: "Search"
    }
  });
});
</script>
@endsection

