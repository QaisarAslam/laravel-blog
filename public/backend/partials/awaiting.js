$(document).ready(function() {
	var table = $('#awaiting').DataTable({ /*implement data on #awaiting id="awaiting" in awaiting.blade.php*/
		processing: true,
		serverSide: true,
		reponsive: true,
		autowidth: true,
		pageLength: 10, /* Set PageLength Either 10 25 50 100 */
		order: [0, 'desc'], /* or 'asc' */
		"ajax" : {
			'type': 'POST',
			'url': baseUrl+'/getAwaitingApprovalBlogs',
			'data' : {
				'_token' : $("meta[name='csrf-token']").attr('content')
			},
		},
		columns: [

		{data: 'id', name: 'id'},
		{data: 'image', name: 'image'},
		{data: 'user_id', name: 'user_id'},
		{data: 'category_id', name: 'category_id'},
		// {data: 'id', name: 'id'}, //Tags id
		{data: 'title', name: 'title'},
		{data: 'short_description', name: 'short_description'},
		{data: 'active', name: 'active'},
		// {data: 'description', name: 'description'},
		{data: 'action', name: 'action', 'orderable' : false, 'searchable' : false},
		{data: 'action1', name: 'action1', 'orderable' : false, 'searchable' : false}
		],
		"columnDefs" :
		[
		// {
		// 	// "width" : "80%" , "targets" : 5
		// },
		{
			"render" : function (data, type, row, meta)
			{
				return `<img src="${baseUrl}/images/blogImages/${row.image}" class="img-thumbnail rounded">`;
			},
			"targets" : 1
		},
		{
			"render" : function (data, type, row, meta)
			{
				return `<a href="${baseUrl}/editBlog/${row.id}" class="btn btn-primary btn-sm editTag" id="${row.id}"><i class='fas fa-pencil-alt'</i></a>`;
			},
			"targets" : 7
		},
		{
			"render" : function (data, type, row, meta)
			{
				return `<a href="#" class="btn btn-danger btn-sm deleteBlog" id="${row.id}"><i class='far fa-trash-alt'</i></a>`;
			},
			"targets" : 8
		},
		{
			"render" : function (data, type, row, meta)
			{
				return `<input type="checkbox" class="approveBlog" id="${row.id}" name="approveBlog">`;
			},
			"targets" : 9
		},
		]
	});

		//Delete Blog Alert with ID for checking purposes
		$(document).on('change', '.approveBlog', function(e){ //Ep_23(04:32)
			e.preventDefault();
			var id = $(this).attr('id');
			alert(id);
		})

		// Delete Blog
		$(document).on('click', '.deleteBlog', function(e){
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
						url : baseUrl+'/deleteBlog/'+id,
						type : 'GET',
						processData : false,
						contentType : false,
						success : function(data)
						{
							Swal.fire(
							          'Deleted!',
							          'Tag has been deleted.',
							          'success'
							          )
							table.ajax.reload();
							// console.log(data);
						},
						error : function(data, textStatus, xhr)
						{
							Swal.fire({
								icon : 'error',
								title: 'Not Deleted',
								text : 'Sorry we were unable to delete this record.',
							})
						},
					})
				}
			})

		});
		//Approve Blog Alert with ID for checking purposes
		$(document).on('click', '.approveBlog', function(e){
			e.preventDefault();
			var id = $(this).attr('id');
			alert(id);

			Swal.fire({
				title: 'Are you sure?',
				text: "You want to Approve/Publish this Blog!",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes, Approve it!'
			}).then((result) => {
				if (result.isConfirmed) {
					$.ajax({
						url : baseUrl+'/approveBlog/'+id,
						type : 'GET',
						processData : false,
						contentType : false,
						success : function(data)
						{
							Swal.fire(
							          'Approved!',
							          'Blog has been Approved.',
							          'success'
							          )
							// table.ajax.reload();
							$('#awaiting').DataTable().ajax.reload();
							// console.log(data);
						},
						error : function(data, textStatus, xhr)
						{
							Swal.fire({
								icon : 'error',
								title: 'Not Approved',
								text : 'Sorry we were unable to Approve this Blog.',
							})
						},
					})
				}
			})
		});
	});