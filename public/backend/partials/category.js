$(document).ready(function() {
	// Start Datatable Portion
    var table = $('#categories').DataTable({
        processing: true,
        serverSide: true,
        reponsive: true,
        autowidth: true,
        pageLength: 10,
        /* Set PageLength Either 10 25 50 100 */
        order: [0, 'asc' /*'desc'*/],
        /* or 'asc' */
        "ajax": {
        	/*
        	// Using GET Method
        	'type': 'GET',
            'url': baseUrl + '/GetAllCategories',
            */
            // Using POST Method
            'type': 'POST',
            'url': baseUrl + '/GetAllCategories',
            'data': {
                '_token': $("meta[name='csrf-token']").attr('content')
            },
        },
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'created_at', name: 'created_at' },
            { data: 'updated_at', name: 'updated_at' },
            { data: 'action', name: 'action', 'orderable': false, 'searchable': false },
            { data: 'action1', name: 'action1', 'orderable': false, 'searchable': false }
        ],
        "columnDefs": [{
                "render": function(data, type, row, meta) {
                    return `<a href="#" class="btn btn-primary btn-sm editCategory" id="${row.id}"><i class='fas fa-pencil-alt'</i></a>`
                },
                "targets": 4
            },
            {
                "render": function(data, type, row, meta) {
                    return `<a href="#" class="btn btn-danger btn-sm deleteCategory" id="${row.id}"><i class='far fa-trash-alt'</i></a>`
                },
                "targets": 5
            },
        ]
    });
    // End Datatable Portion
    $('#add_category').submit(function(event) {
        event.preventDefault();
        var form = $('#add_category')[0];
        var formData = new FormData(form);
        $.ajax({
            url: baseUrl + '/addCategory',
            type: 'POST',
            data: formData,
            "_token": $('#token').val(),
            contentType: false,
            processData: false,
            success: function(data) {
                $('#add_category_modal').modal('hide')
                // Remove Errors after Success
                onSuccessRemoveErrors(); // Ep_12(34:50) // Ep_14(45:55)
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Category_Created_Successfully.',
                })
                table.ajax.reload();
                // $('#categories').DataTable().ajax.reload();
            },
            error: function(reject) {
                if (reject.status = 422) {
                	// Refresh errors for more than one field
                	refreshErrors(); // Ep_12(36:48)
                    var errors = $.parseJSON(reject.responseText);
                    $.each(errors.errors, function(key, value) {
                        $('#' + key).addClass('is-invalid');
                        $('#' + key + '_help').text(value[0]);
                    })
                }
            }
        });
    });
    // Why we use on('click') instead of submit or other function Ep_14(07:25)
    // Get Category For Edit
    $(document).on('click', '.editCategory', function(e) {
        e.preventDefault();
        var id = $(this).attr('id');
        // alert(id);
        $.ajax({
            url: baseUrl + '/getCategory/' + id,
            type: 'GET',
            processData: false,
            contentType: false,
            success: function(data) {
                // console.log(data.name);  /* To get specific value use '.' notation like 'data.name' etc */
                console.log(data);
                $('#edit_category_id').val(data.id);
                $('#edit_category').val(data.name);
                $('#editCategoryModal').modal('show');
            },
            error: function(data, textStatus, xhr) {
                Swal.fire({
                    title: 'Not Found',
                    text: 'Sorry we were unable to find this record.',
                    icon: 'error',
                    confirmButtonText: 'Close',
                    footer: '<a href="">Why do I have this issue?</a>'
                })
            },
        });
    });
    // Update Category
    $('#editCategory').submit(function(e) {
        e.preventDefault();
        var form = $('#editCategory')[0];
        var formData = new FormData(form);
        $.ajax({
            url: baseUrl + '/updateCategory',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(data) {
                // console.log(data);
                onSuccessRemoveEditErrors();
                $('#editCategoryModal').modal('hide');
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Category_Updated_Successfully.',
                })
                table.ajax.reload();
            },
            error: function(reject) {
                if (reject.status = 422) {
                    refreshEditErrors();
                    var errors = $.parseJSON(reject.responseText);
                    $.each(errors.errors, function(key, value) {
                        $('#' + key).addClass('is-invalid');
                        $('#' + key + '_help').text(value[0]);
                    })
                }
            }
        });
    });
    // ]);
    // $(document).on('click', '.deleteCategory', function(e){
    // 	e.preventDefault();
    // 	var id = $(this).attr('id');
    // 	alert(id);
    // })
    // Delete Category
    $(document).on('click', '.deleteCategory', function(e) {
        e.preventDefault();
        var id = $(this).attr('id');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: baseUrl + '/deleteCategory/' + id,
                    type: 'GET',
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        Swal.fire(
                            'Deleted!',
                            'Category has been deleted.',
                            'success'
                        )
                        table.ajax.reload();
                        console.log(data);
                    },
                    error: function(data, textStatus, xhr) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Not Found',
                            text: 'Sorry we were unable to find this record.',
                        })
                    },
                })
            }
        })
    });

    $('#editCategoryModal').on('hidden.bs.modal', function() {
        onSuccessRemoveEditErrors();
    })
    
    function onSuccessRemoveEditErrors() {
        $('#edit_category').removeClass('is-invalid');
        $('#edit_category').val('');
        $('#edit_category_help').text('');
    }
    
    // Ep_14(45:18)
    function refreshEditErrors() {
        $('#edit_category').removeClass('is-invalid');
        $('#edit_category_help').text('');
    }
    
    //Empty Popup Modal Errors Either After Click on Update(Submission) or Close Button
    // Ep_12(37:37)
    $('#add_category_modal').on('hidden.bs.modal', function() {
        onSuccessRemoveErrors();
    })
    
    function onSuccessRemoveErrors() {
        $('#category_name').removeClass('is-invalid');
        $('#category_name').val('');
        $('#category_name_help').text('');
    }
    
    function refreshErrors() {
        $('#category_name').removeClass('is-invalid');
        $('#category_name_help').text('');
    }
    
});
