$(document).ready(function() {

	// Create or Update About Page
	$('#contact_cms').submit(function(event){ // Ep_36(11:20)
		event.preventDefault();
		var form = $('#contact_cms')[0];
		var formData = new FormData(form); // New object and pass data Ep_36(12:17)

		$.ajax({
			url : baseUrl+'/createOrUpdateContact',
			type : 'POST',
			data : formData,
			contentType : false,
			processData : false,

			success: function(data)
			{
				refreshErrors();
				console.log(data);
				// console.log(data.msg);
				if(data.msg == 'Created'){
					$('#contact_section_name').val(data.contact.section_name);
					Swal.fire({
						icon: 'success',
						title: 'Success',
						text: 'Contact Section Created_Successfully.',
					})
				}
				else
				{
					$('#contact_section_name').val(data.contact.section_name);
					Swal.fire({
						icon: 'success',
						title: 'Success',
						text: 'Contact Section Updated_Successfully.',
					})
				}
			},

			error: function(reject)
			{
				if(reject.status = 422){
					refreshErrors();
					var errors = $.parseJSON(reject.responseText);
					$.each(errors.errors , function(key, value){
						$('#'+ key).addClass('is-invalid');
						$('#'+ key + '_help' ).text(value[0]);
					})
				}
			}
		});
	});
	// Ep_36(28:00) Why use refreshErrors?
	function refreshErrors(){
		$('#contact_heading').removeClass('is-invalid');
		$('#contact_heading_help').text('');
		$('#contact_short_description').removeClass('is-invalid');
		$('#contact_short_description_help').text('');
		$('#contact_description').removeClass('is-invalid');
		$('#contact_description_help').text('');
	}
});