$(document).ready(function() {
	// Start Datatable Portion
    var table = $('#allUsers').DataTable({
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
            'type': 'GET',
            'url': baseUrl + '/getAllUsers',
            'data': {
                '_token': $("meta[name='csrf-token']").attr('content')
            },
        },
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'created_at', name: 'created_at' },
            { data: 'updated_at', name: 'updated_at' },
            { data: 'action1', name: 'action1', 'orderable': false, 'searchable': false }
        ],
        "columnDefs": [{
                "render": function(data, type, row, meta) {
                    return `<a href="#" class="btn btn-danger btn-sm deleteUser" id="${row.id}"><i class='fas fa-pencil-alt'</i></a>`
                },
                "targets": 5
            },
        ]
    });
    // End Datatable Portion
    // Why we use on('click') instead of submit or other function Ep_14(07:25)
    // Get User For Delete
    $(document).on('click', '.deleteUser', function(e) {
        e.preventDefault();
        var id = $(this).attr('id');
        alert(id);
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
                    url: baseUrl + '/deleteUser/' + id,
                    type: 'GET',
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        Swal.fire(
                            'Deleted!',
                            'User has been deleted with Relational Data.',
                            'success'
                        )
                        table.ajax.reload();
                        console.log(data);
                    },
                    error: function(data, textStatus, xhr) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Not Found',
                            text: 'Sorry we were unable to find this User.',
                        })
                    },
                })
            }
        })
    });

});
