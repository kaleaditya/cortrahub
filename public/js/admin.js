// Admin Panel JavaScript

// Initialize DataTables
$(document).ready(function() {
    // Initialize all DataTables
    $('.datatable').DataTable({
        responsive: true,
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });

    // Initialize Select2 for all select elements
    $('.select2').select2({
        theme: 'bootstrap4',
        width: '100%'
    });

    // Form validation
    $('form').on('submit', function(e) {
        var requiredFields = $(this).find('[required]');
        var isValid = true;

        requiredFields.each(function() {
            if (!$(this).val()) {
                isValid = false;
                $(this).addClass('is-invalid');
            } else {
                $(this).removeClass('is-invalid');
            }
        });

        if (!isValid) {
            e.preventDefault();
            alert('Please fill in all required fields.');
        }
    });

    // Remove validation styling on input
    $('input, select, textarea').on('input change', function() {
        $(this).removeClass('is-invalid');
    });

    // Confirm delete
    $('.delete-form').on('submit', function(e) {
        if (!confirm('Are you sure you want to delete this item?')) {
            e.preventDefault();
        }
    });

    // Toggle status
    $('.status-toggle').on('change', function() {
        var id = $(this).data('id');
        var url = $(this).data('url');
        var status = $(this).prop('checked') ? 1 : 0;

        $.ajax({
            url: url,
            type: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                status: status
            },
            success: function(response) {
                if (response.success) {
                    toastr.success('Status updated successfully');
                } else {
                    toastr.error('Failed to update status');
                }
            },
            error: function() {
                toastr.error('An error occurred');
            }
        });
    });

    // Image preview
    $('.image-input').on('change', function() {
        var input = this;
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $(input).siblings('.image-preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    });

    // Dynamic form fields
    $('.add-field').on('click', function() {
        var template = $(this).data('template');
        var container = $(this).data('container');
        $(container).append(template);
    });

    $(document).on('click', '.remove-field', function() {
        $(this).closest('.field-group').remove();
    });
}); 