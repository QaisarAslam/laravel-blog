$(document).ready(function() {

	var table = $('#tags').DataTable({
		processing: true,
		serverSide: true,
		reponsive: true,
		autowidth: true,
		pageLength: 10, /* Set PageLength Either 10 25 50 100 */
		order: [0, 'desc'], /* or 'asc' */
		"ajax" : {
			'type': 'POST',
			'url': baseUrl+'/getAllTags',
			'data' : {
				'_token' : $("meta[name='csrf-token']").attr('content')
			},
		},
		columns: [

		{data: 'id', name: 'id'},
		{data: 'name', name: 'name'},
		{data: 'created_at', name: 'created_at'},
		{data: 'updated_at', name: 'updated_at'},
		{data: 'action', name: 'action', 'orderable' : false, 'searchable' : false},
		{data: 'action1', name: 'action1', 'orderable' : false, 'searchable' : false}
		],
		"columnDefs" :
		[
		{
			"render" : function (data, type, row, meta)
			{
				return `<a href="#" class="btn btn-primary btn-sm editTag" id="${row.id}"><i class='fas fa-pencil-alt'</i></a>`
			},
			"targets" : 4
		},
		{
			"render" : function (data, type, row, meta)
			{
				return `<a href="#" class="btn btn-danger btn-sm deleteTag" id="${row.id}"><i class='far fa-trash-alt'</i></a>`
			},
			"targets" : 5
		},
		]
	});

	$('#addTag').submit(function(event){
		event.preventDefault();
		var form = $('#addTag')[0];
		var formData = new FormData(form);

		$.ajax({
			url : baseUrl+'/addTag',
			type : 'POST',
			data : formData,
			contentType : false,
			processData : false,

			success: function(data)
			{
				$('#addTagModal').modal('hide')
				onSuccessRemoveErrors();
				Swal.fire({
					icon: 'success',
					title: 'Success',
					text: 'Tag_Created_Successfully.',
				})
				table.ajax.reload();
				// $('#tags').DataTable().ajax.reload();
			},

			error: function(reject)
			{
				if(reject.status = 422){
					refreshErrors();
					var errors = $.parseJSON(reject.responseText);
					$.each(errors.errors , function(key, value){
						$('#'+key).addClass('is-invalid');
						$('#'+ key + 'Help' ).text(value[0]);
						// $('#'+'tagNameHelp' ).text(value[0]);
					})
				}
			}
		});
	});

	// Get Tag For Edit
	$(document).on('click', '.editTag', function(e){
		e.preventDefault();
		var id = $(this).attr('id');
		// alert(id);
		$.ajax({
			url : baseUrl+'/getTag/'+id,
			type  :  'POST',
			processData : false,
			contentType : false,
			success : function(data)
			{
				// console.log(data.name);  /* To get specific value use '.' notation like 'data.name' etc */
				// console.log(data);
				$('#editTagId').val(data.id);
				$('#editTag').val(data.name);
				$('#editTagModal').modal('show');
			},
			error: function(data, textStatus, xhr)
			{
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
	$('#editTagg').submit(function(e){
		e.preventDefault();
		var form = $('#editTagg')[0];
		var formData = new FormData(form);
		$.ajax({
			url : baseUrl+'/updateTag',
			type : 'POST',
			data : formData,
			processData : false,
			contentType : false,
			success: function(data)
			{
				// console.log(data);
				onSuccessRemoveEditErrors();
				$('#editTagModal').modal('hide');
				Swal.fire({
					icon: 'success',
					title: 'Success',
					text: 'Tag_Updated_Successfully.',
				})
				table.ajax.reload();
			},

			error: function(reject)
			{
				if(reject.status = 422){
					refreshEditErrors();
					var errors = $.parseJSON(reject.responseText);
					$.each(errors.errors , function(key, value){
						$('#'+key).addClass('is-invalid');
						$('#'+ key + 'Help' ).text(value[0]);
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
		$(document).on('click', '.deleteTag', function(e){
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
						url : baseUrl+'/deleteTag/'+id,
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
							console.log(data);
						},
						error : function(data, textStatus, xhr)
						{
							Swal.fire({
								icon : 'error',
								title: 'Not Found',
								text : 'Sorry we were unable to find this record.',
							})
						},
					})
				}
			})
		});

		$('#editTagModal').on('hidden.bs.modal', function(){
			onSuccessRemoveEditErrors();
		})
		
		function onSuccessRemoveEditErrors() {
			$('#editTag').removeClass('is-invalid');
			$('#editTag').val('');
			$('#editTagHelp').text('');
		}
		
		function refreshEditErrors(){
			$('#editTag').removeClass('is-invalid');
			$('#editTagHelp').text('');
		}

		$('#addTagModal').on('hidden.bs.modal', function(){
			onSuccessRemoveErrors();
		})
		
		function onSuccessRemoveErrors() {
			$('#tagName').removeClass('is-invalid');
			$('#tagName').val('');
			$('#tagNameHelp').text('');
		}

		function refreshErrors(){
			$('#tagName').removeClass('is-invalid');
			$('#tagNameHelp').text('');
		}

	});