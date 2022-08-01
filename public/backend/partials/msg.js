$(document).ready(function() {

	var table = $('#msgs').DataTable({
		processing: true,
		serverSide: true,
		reponsive: true,
		autowidth: true,
		pageLength: 10, /* Set PageLength Either 10 25 50 100 */
		order: [0, 'desc'], /* or 'asc' */
		"ajax" : {
			'type': 'GET',
			'url': baseUrl+'/getAllMsg',
			'data' : {
				'_token' : $("meta[name='csrf-token']").attr('content')
			},
		},
		columns: [

		{data: 'id', name: 'id'},
		{data: 'name', name: 'name'},
		{data: 'email', name: 'email'},
		{data: 'message', name: 'message'},
		{data: 'created_at', name: 'created_at'},
		{data: 'action', name: 'action', 'orderable' : false, 'searchable' : false},
		{data: 'action1', name: 'action1', 'orderable' : false, 'searchable' : false}
		],
		"columnDefs" :
		[
		{
			"render" : function (data, type, row, meta)
			{
				return `<a href="#" class="btn btn-primary btn-sm viewMsg" id="${row.id}"><i class='far fa-eye'</i></a>`
			},
			"targets" : 5
		},
		{
			"render" : function (data, type, row, meta)
			{
				return `<a href="#" class="btn btn-danger btn-sm deleteMsg" id="${row.id}"><i class='far fa-trash-alt'</i></a>`
			},
			"targets" : 6
		},
		]
	});

	// Get Message For View
	$(document).on('click', '.viewMsg', function(e){
		e.preventDefault();
		var id = $(this).attr('id');
		// alert(id);
		$.ajax({
			url : baseUrl+'/getMsg/'+id, // Ep_45(06:50)
			type  :  'POST',
			processData : false,
			contentType : false,
			success : function(data)
			{
				// console.log(data.name);  /* To get specific value use '.' notation like 'data.name' etc */
				// console.log(data);
				$('#name').val(data.name); // Ep_45(07:10)
				$('#email').val(data.email);
				$('#message').val(data.message);
				$('#msgModal').modal('show');
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

		// Delete Category
		$(document).on('click', '.deleteMsg', function(e){
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
						url : baseUrl+'/deleteMsg/'+id,
						type : 'POST',
						processData : false,
						contentType : false,
						success : function(data)
						{
							Swal.fire(
							          'Deleted!',
							          'Msg has been deleted.',
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