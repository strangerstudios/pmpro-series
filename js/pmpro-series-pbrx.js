jQuery(document).ready(function() {
	jQuery('#pmpros_save').click(function() {
		
		if(jQuery(this).html() == 'Saving...')
			return;	//already saving, ignore this request
		
		//disable save button
		jQuery(this).html('Saving...');					
		
		//pass field values to AJAX service and refresh table above
		jQuery.ajax({
			url: '<?php echo home_url()?>',type:'GET',timeout:2000,
			dataType: 'html',
			data: "pmpros_add_post=1&pmpros_series=<?php echo $this->id;?>&pmpros_post=" + jQuery('#pmpros_post').val() + '&pmpros_delay=' + jQuery('#pmpros_delay').val(),
			error: function(xml){
				alert('Error saving series post [1]');
				//enable save button
				jQuery(this).html('Save');												
			},
			success: function(responseHTML){
				if (responseHTML == 'error')
				{
					alert('Error saving series post [2]');
					//enable save button
					jQuery(this).html('Save');		
				}
				else
				{
					jQuery('#pmpros_series_posts').html(responseHTML);
				}																						
			}
		});
	});	
});				

function pmpros_editPost(post_id, delay)
{
	jQuery('#pmpros_post').val(post_id).trigger("change");
	jQuery('#pmpros_delay').val(delay);
	jQuery('#pmpros_save').html('Save');
	location.href = "#pmpros_edit_post";
}

function pmpros_removePost(post_id) {
	jQuery.ajax({
		url: '<?php echo home_url()?>',type:'GET',timeout:2000,
		dataType: 'html',
		data: "pmpros_add_post=1&pmpros_series=<?php echo $this->id;?>&pmpros_remove="+post_id,
		error: function(xml){
			alert('Error removing series post [1]');
			//enable save button
			jQuery('#pmpros_save').removeAttr('disabled');												
		},
		success: function(responseHTML){
			if (responseHTML == 'error')
			{
				alert('Error removing series post [2]');
				//enable save button
				jQuery('#pmpros_save').removeAttr('disabled');	
			}
			else
			{
				jQuery('#pmpros_series_posts').html(responseHTML);
			}																						
		}
	});
}