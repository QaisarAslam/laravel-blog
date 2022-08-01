$(document).ready(function() {

	// Create or Update About Page
	$('#about_cms').submit(function(event){ // Ep_36(11:20)
		event.preventDefault();
		var form = $('#about_cms')[0];
		var formData = new FormData(form); // New object and pass data Ep_36(12:17)

		$.ajax({
			url : baseUrl+'/createOrUpdateAbout',
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
					$('#about_section_name').val(data.about.section_name);
					Swal.fire({
						icon: 'success',
						title: 'Success',
						text: 'About Section Created_Successfully.',
					})
				}
				else
				{
					$('#about_section_name').val(data.about.section_name);
					Swal.fire({
						icon: 'success',
						title: 'Success',
						text: 'About Section Updated_Successfully.',
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
		$('#about_heading').removeClass('is-invalid');
		$('#about_heading_help').text('');
		$('#about_short_description').removeClass('is-invalid');
		$('#about_short_description_help').text('');
		$('#about_description').removeClass('is-invalid');
		$('#about_description_help').text('');
	}
});