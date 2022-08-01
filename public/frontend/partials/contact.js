$(document).ready(function() {
    // Create Contact Message
    $('#contactForm').submit(function(e) {
        e.preventDefault();
        var form = $('#contactForm')[0];
        var formData = new FormData(form);
        $.ajax({
            'url': baseUrl+'/createContactMessage',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(data) {
                // console.log(data);
                onSuccessRemoveErrors();
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Thanks for Contacting us. We will respond to your query asap',
                })
            },
            error: function(reject) {
                if (reject.status = 422) {
                    refreshErrors();
                    var errors = $.parseJSON(reject.responseText);
                    $.each(errors.errors, function(key, value) {
                        $('#' + key).addClass('is-invalid');
                        $('#' + key + '_help').text(value[0]);
                    })
                }
            }
        });
    });
    function onSuccessRemoveErrors()
    {
    	$('#name').removeClass('is-invalid');
    	$('#name').val('');
    	$('#name_help').text('');
    	$('#email').removeClass('is-invalid');
    	$('#email').val('');
    	$('#email_help').text('');
    	$('#message').removeClass('is-invalid');
    	$('#message').val('');
    	$('#message_help').text('');
    }
    function refreshErrors()
    {
    	$('#name').removeClass('is-invalid');
    	$('#name_help').text('');
    	$('#email').removeClass('is-invalid');
    	$('#email_help').text('');
    	$('#message').removeClass('is-invalid');
    	$('#message_help').text('');
    }
});
