function pmpros_addPost() {
	// don't send useless requests
	if ( '' == jQuery('#pmpros_post').val() || undefined != jQuery('#pmpros_save').attr('disabled') )
		return false;
	
	//disable save button
	jQuery('#pmpros_save').attr('disabled','disabled');
	jQuery('#pmpros_save').html(pmpro_series.lang.saving);

	//pass field values to AJAX service and refresh table above
	jQuery.ajax({
		url: ajaxurl,
		type: 'POST',
		timeout: 2000,
		dataType: 'html',
		data: {
			action: 'pmpros_add_post',
			pmpros_series: jQuery('#pmpros_serie').val(),
			pmpros_post: jQuery('#pmpros_post').val(),
			pmpros_delay: jQuery('#pmpros_delay').val(),
			pmpros_addpost_nonce: jQuery('#pmpros_addpost_nonce').val()
		},
		error: function(xml){
			alert(pmpro_series.lang.saving_error_1);
			//enable save button
			jQuery('#pmpros_save').html(pmpro_series.lang.save);
		},
		success: function(responseHTML){
			if (responseHTML == 'error')
			{
				alert(pmpro_series.lang.saving_error_2);
				//enable save button
				jQuery('#pmpros_save').html(pmpro_series.lang.save);
			}
			else
			{
				jQuery('#pmpros_series_posts').html(responseHTML);
			}
		}
	});
}

function pmpros_editPost(post_id, delay)
{
	jQuery('#newmeta').focus();
	jQuery('#pmpros_post').val(post_id).trigger("change");
	jQuery('#pmpros_delay').val(delay);
	jQuery('#pmpros_save').html(pmpro_series.lang.save);
}

function pmpros_removePost(post_id)
{								
	jQuery.ajax({
		url: ajaxurl,
		type: 'POST',
		timeout:2000,
		dataType: 'html',
		data: {
			action: 'pmpros_rm_post',
			pmpros_series: jQuery('#pmpros_serie').val(),
			pmpros_post: post_id,
			pmpros_rmpost_nonce: jQuery('#pmpros_rmpost_nonce').val()
		},
		error: function(xml){
			alert(pmpro_series.lang.remove_error_1);
		},
		success: function(responseHTML){
			if (responseHTML == 'error')
			{
				alert(pmpro_series.lang.remove_error_2);
			}
			else
			{
				jQuery('#pmpros_series_posts').html(responseHTML);
			}
		},
		complete: function() {
			//enable save button
			jQuery('#pmpros_save').removeAttr('disabled');
		}
	});
}