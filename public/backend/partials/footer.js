$(document).ready(function() {

	// Create or Update About Page
	$('#footer_section_form').submit(function(event){ // Ep_36(11:20)
		event.preventDefault();
		var form = $('#footer_section_form')[0];
		var formData = new FormData(form); // New object and pass data Ep_36(12:17)

		$.ajax({
			url : baseUrl+'/createOrUpdateFooter',
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
					$('#footer_section').val(data.footer.section_name);
					Swal.fire({
						icon: 'success',
						title: 'Success',
						text: 'Social Section Created_Successfully.',
					})
				}
				else
				{
					$('#footer_section').val(data.footer.section_name);
					Swal.fire({
						icon: 'success',
						title: 'Success',
						text: 'Social Section Updated_Successfully.',
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
		$('#facebook').removeClass('is-invalid');
		$('#facebook_help').text('');
		$('#twitter').removeClass('is-invalid');
		$('#twitter_help').text('');
		$('#instagram').removeClass('is-invalid');
		$('#instagram_help').text('');
	}
});