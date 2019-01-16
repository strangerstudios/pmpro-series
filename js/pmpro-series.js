
function pmpros_editPost(post_id, delay){
	jQuery('#pmpros_post').val(post_id).trigger("change");
	jQuery('#pmpros_delay').val(delay);
	jQuery('#pmpros_save').html('Save');
	location.href = "#pmpros_edit_post";
}

function pmpros_removePost(post_id) {
	var seriesid = jQuery('#post_ID').val();
	jQuery.ajax({
		url: ajaxurl,
		type:'GET',
		timeout:2000,
		dataType: 'html',
		data: "pmpros_add_post=1&pmpros_series=" + seriesid + "&pmpros_remove="+post_id,
		error: function(xml){
			alert('Error removing series post [1]');
			//enable save button
			jQuery('#pmpros_save').removeAttr('disabled');												
		},
		success: function(responseHTML){
			if (responseHTML == 'error'){
				alert('Error removing series post [2]');
				//enable save button
				jQuery('#pmpros_save').removeAttr('disabled');	
			}else{
				jQuery('#pmpros_series_posts').html(responseHTML);
				pmpros_Setup();
			}																						
		}
	});
}

function pmpros_updatePost() {
	var seriesid = jQuery('#post_ID').val();
	$.ajax({
		url: ajaxurl,
		type: 'GET',
		dataType: 'html',
		data: "pmpros_add_post=1&pmpros_series=" + seriesid + "&pmpros_post=" + $('#pmpros_post').val() + '&pmpros_delay=' + $('#pmpros_delay').val(),
		error: function(xml){
			alert('Error saving series post [1]');
			//enable save button
			$('#pmpros_save').html('Save');												
		},
		success: function(responseHTML){
			if (responseHTML == 'error'){
				alert('Error saving series post [2]');
				//enable save button
				$('#pmpros_save').html('Save');		
			}else{
				$('#pmpros_series_posts').html(responseHTML);
				pmpros_Setup();
			}																						
		}
	});
}

function pmpros_Setup() {
	$('#pmpros_post').select2({width: 'elements'});
	
	$('#pmpros_save').click(function() {	
		if($(this).html() != 'Saving...'){
			pmpros_updatePost();
		}
	});
}

jQuery(document).ready(function($) {
	pmpros_Setup();
});
