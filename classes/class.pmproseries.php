<?php
class PMProSeries
{
	//constructor
	function PMProSeries($id = NULL)
	{
		if(!empty($id))
			return $this->getSeriesByID($id);
		else
			return true;
	}
	
	//populate series data by post id passed
	function getSeriesByID($id)
	{
		$this->post = get_post($id);
		if(!empty($this->post->ID))
			$this->id = $id;
		else
			$this->id = false;
			
		return $this->id;
	}
	
	//add a post to this series
	function addPost($post_id, $delay)
	{
		if(empty($post_id) || !isset($delay))
		{
			$this->error = __("Please enter a value for post and delay.", "pmproseries");
			return false;
		}
		
		$post = get_post($post_id);
			
		if(empty($post->ID))
		{
			$this->error = __("A post with that id does not exist.", "pmproseries");
			return false;
		}
		
		$this->getPosts();
				
		//remove any old post with this id
		if($this->hasPost($post_id))
			$this->removePost($post_id);
			
		//add post
		$temp = new stdClass();
		$temp->id = $post_id;
		$temp->delay = $delay;
		$this->posts[] = $temp;
		
		//sort
		usort($this->posts, array("PMProSeries", "sortByDelay"));
		
		//save
		update_post_meta($this->id, "_series_posts", $this->posts);
		
		//add series to post
		$post_series = get_post_meta($post_id, "_post_series", true);
		if(!is_array($post_series))
			$post_series = array($this->id);
		else
			$post_series[] = $this->id;
			
		//save
		update_post_meta($post_id, "_post_series", $post_series);
	}
	
	//remove a post from this series
	function removePost($post_id)
	{
		if(empty($post_id))
			return false;
		
		$this->getPosts();
		
		if(empty($this->posts))
			return true;
		
		//remove this post from the series
		foreach($this->posts as $i => $post)
		{
			if($post->id == $post_id)
			{
				unset($this->posts[$i]);
				$this->posts = array_values($this->posts);
				update_post_meta($this->id, "_series_posts", $this->posts);
				break;	//assume there is only one				
			}
		}
								
		//remove this series from the post
		$post_series = get_post_meta($post_id, "_post_series", true);
		if(is_array($post_series) && ($key = array_search($this->id, $post_series)) !== false)
		{
			unset($post_series[$key]);
			update_post_meta($post_id, "_post_series", $post_series);
		}
		
		return true;
	}
	
	/*
		get array of all posts in this series
		force = ignore cache and get data from DB
	*/
	function getPosts($force = false)
	{
		if(!isset($this->posts) || $force)
			$this->posts = get_post_meta($this->id, "_series_posts", true);
		
		return $this->posts;
	}
	
	//does this series include post with id = post_id
	function hasPost($post_id)
	{
		$this->getPosts();
		
		if(empty($this->posts))
			return false;
				
		foreach($this->posts as $key => $post)
		{
			if($post->id == $post_id)
				return true;
		}
		
		return false;
	}
	
	//get key of post with id = $post_id
	function getPostKey($post_id)
	{
		$this->getPosts();
		
		if(empty($this->posts))
			return false;
				
		foreach($this->posts as $key => $post)
		{
			if($post->id == $post_id)
				return $key;
		}
		
		return false;
	}
	
	function getDelayForPost($post_id)
	{
		$key = $this->getPostKey($post_id);
		
		if($key === false)
			return false;
		else
			return $this->posts[$key]->delay;		
	}
	
	//used to sort posts by delay
	function sortByDelay($a, $b)
	{
		if ($a->delay == $b->delay)
			return 0;
		return ($a->delay < $b->delay) ? -1 : 1;
	}
	
	//send an email RE new access to post_id to email of user_id
	function sendEmail($post_id, $user_id)
	{
        $email = new PMProEmail();

        $user = get_user_by('id', $user_id);
        $post = get_post($post_id);

        $email->email = $user->user_email;
        $email->subject = sprintf(__("New content is available at %s", "pmpro"), get_option("blogname"));
        $email->template = "new_content";
        $email->body = file_get_contents(plugins_url('email/new_content.html', dirname(__FILE__)));

        $email->data = array(
            "name" => $user->display_name,
            "sitename" => get_option("blogname"),
            "post_link" => '<a href="' . get_permalink($post->ID) . '" title="' . $post->post_title . '">' . $post->post_title . '</a>'
        );

        if(!empty($post->post_excerpt))
            $email->data['excerpt'] = '<p>' . __('An excerpt of the post is below.', "pmproseries") . '</p><p>' . $post->post_excerpt . '</p>';
        else
            $email->data['excerpt'] = '';

        $email->sendEmail();
	}
	
	/*
		Create CPT
	*/
	function createCPT()
	{
		//don't want to do this when deactivating
		global $pmpros_deactivating;
		if(!empty($pmpros_deactivating))
			return false;
		
		register_post_type('pmpro_series',
				array(
					'labels' => array(
					'name' => __( 'Series', 'pmproseries' ),								
					'singular_name' => __( 'Serie', 'pmproseries' ),
					'slug' => 'series',
					'add_new' => __( 'New Series', 'pmproseries' ),
					'add_new_item' => __( 'New Series', 'pmproseries' ),
					'edit' => __( 'Edit Series', 'pmproseries' ),
					'edit_item' => __( 'Edit Series', 'pmproseries' ),
					'new_item' => __( 'Add New', 'pmproseries' ),
					'view' => __( 'View This Series', 'pmproseries' ),
					'view_item' => __( 'View This Series', 'pmproseries' ),
					'search_items' => __( 'Search Series', 'pmproseries' ),
					'not_found' => __( 'No Series Found', 'pmproseries' ),
					'not_found_in_trash' => __( 'No Series Found In Trash', 'pmproseries' )
				),
				'public' => true,					
				/*'menu_icon' => plugins_url('images/icon-series16-sprite.png', dirname(__FILE__)),*/
				'show_ui' => true,
				'show_in_menu' => true,				
				'publicly_queryable' => true,
				'hierarchical' => true,
				'supports' => array('title','editor','thumbnail','custom-fields','author'),
				'can_export' => true,
				'show_in_nav_menus' => true,
				'rewrite' => array(
					'slug' => 'series',
					'with_front' => false
				),
				'has_archive' => 'series'
			)
		);
	}
	
	/*
		Meta boxes
	*/	
	function checkForMetaBoxes()
	{
		//add meta boxes
		if (is_admin())
		{
			wp_enqueue_style('pmpros-select2', plugins_url('css/select2.css', dirname(__FILE__)), '', '3.1', 'screen');
			wp_enqueue_script('pmpros-select2', plugins_url('js/select2.js', dirname(__FILE__)), array( 'jquery' ), '3.1' );
			add_action('admin_menu', array("PMProSeries", "defineMetaBoxes"));
		}
	}	
	function defineMetaBoxes()
	{
		//PMPro box
		add_meta_box('pmpro_page_meta', __('Require Membership', 'pmproseries'), 'pmpro_page_meta', 'pmpro_series', 'side');	
		
		//series meta box
		add_meta_box('pmpro_series_meta', __('Posts in this Series', 'pmproseries'), array("PMProSeries", "seriesMetaBox"), 'pmpro_series', 'normal');	
	}
	
	//this is the actual series meta box
	function seriesMetaBox()
	{
		global $post;
		$series = new PMProSeries($post->ID);
		?>
		<div id="pmpros_series_posts">
		<?php $series->getPostListForMetaBox(); ?>
		</div>				
		<?php		
	}
	
	//this function returns a UL with the current posts
	function getPostList($echo = false)
	{
		global $current_user;
		$this->getPosts();
		if(!empty($this->posts))
		{
			ob_start();
			?>		
			<ul id="pmpro_series-<?php echo $this->id; ?>" class="pmpro_series_list">
			<?php			
				foreach($this->posts as $sp)
				{
				?>
				<li>					
					<?php if(pmpro_getMemberDays() >= $sp->delay) { ?>
						<span class="pmpro_series_item-title"><a href="<?php echo get_permalink($sp->id);?>"><?php echo get_the_title($sp->id);?></a></span>
						<span class="pmpro_series_item-available"><a class="pmpro_btn pmpro_btn-primary" href="<?php echo get_permalink($sp->id);?>"><?php _e('Available Now', 'pmproseries');?></a></span>
					<?php } else { ?>
						<span class="pmpro_series_item-title"><?php echo get_the_title($sp->id);?></span>
						<span class="pmpro_series_item-unavailable"><?php printf(__('available on day %s', 'pmproseries'), $sp->delay);?></span>
					<?php } ?>
					<div class="clear"></div>
				</li>
				<?php
				}		
			?>
			</ul>
			<?php
			$temp_content = ob_get_contents();
			ob_end_clean();
		
			//filter
			$temp_content = apply_filters("pmpro_series_get_post_list", $temp_content, $this);
			
			if($echo)
				echo $temp_content;
				
			return $temp_content;
		}
		
		return false;
	}
	
	//this code updates the posts and draws the list/form
	function getPostListForMetaBox()
	{
		global $wpdb;
		
		//boot out people without permissions
		if(!current_user_can("edit_posts"))
			return false;

		//show posts
		$this->getPosts();
				
		?>		
			
		<?php if(!empty($this->error)) { ?>
			<div class="message error"><p><?php echo $this->error;?></p></div>
		<?php } ?>
		
		<table id="pmpros_table" class="wp-list-table widefat fixed">
		<thead>
			<th><?php _e('Order', 'pmproseries');?></th>
			<th width="50%"><?php _e('Title', 'pmproseries');?></th>
			<th><?php _e('Delay (# of days)', 'pmproseries');?></th>
			<th></th>
			<th></th>
		</thead>
		<tbody>
		<?php		
		$count = 1;
		
		if(empty($this->posts))
		{
		?>
		<?php
		}
		else
		{
			foreach($this->posts as $post)
			{
			?>
				<tr>
					<td><?php echo $count?>.</td>
					<td><?php echo get_the_title($post->id)?></td>
					<td><?php echo $post->delay?></td>
					<td>
						<a href="javascript:pmpros_editPost('<?php echo $post->id;?>', '<?php echo $post->delay;?>'); void(0);"><?php _e('Edit');?></a>
					</td>
					<td>
						<a href="javascript:pmpros_removePost('<?php echo $post->id;?>'); void(0);"><?php _e('Remove');?></a>
					</td>
				</tr>
			<?php
				$count++;
			}
		}
		?>
		</tbody>
		</table>
		
		<div id="postcustomstuff">
			<p><strong><?php _e('Add/Edit Posts:', 'pmproseries');?></strong></p>
			<table id="newmeta">
				<thead>
					<tr>
						<th><?php _e('Post/Page', 'pmproseries');?></th>
						<th><?php _e('Delay (# of days)', 'pmproseries');?></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>
						<select id="pmpros_post" name="pmpros_post">
							<option value=""></option>
						<?php
							$pmpros_post_types = apply_filters("pmpros_post_types", array("post", "page"));
							$allposts = $wpdb->get_results("SELECT ID, post_title, post_status FROM $wpdb->posts WHERE post_status IN('publish', 'draft') AND post_type IN ('" . implode("','", $pmpros_post_types) . "') AND post_title <> '' ORDER BY post_title");
							foreach($allposts as $p)
							{
							?>
							<option value="<?php echo $p->ID;?>"><?php echo esc_textarea($p->post_title);?> (#<?php echo $p->ID;?><?php if($p->post_status == "draft") echo "-DRAFT";?>)</option>
							<?php
							}
						?>
						</select>
						<style>
							.select2-container {width: 100%;}
						</style>
						<script>
							jQuery('#pmpros_post').select2();
						</script>
						</td>
						<td>
							<input id="pmpros_delay" name="pmpros_delay" type="text" value="" size="7" />
							<input id="pmpros_serie" name="pmpros_serie" type="hidden" value="<?php echo $this->id;?>" />
							<?php wp_nonce_field('pmpros-serie-add-post','pmpros_addpost_nonce'); ?>
							<?php wp_nonce_field('pmpros-serie-rm-post','pmpros_rmpost_nonce'); ?>
						</td>
						<td><a class="button" id="pmpros_save" onclick="javascript:pmpros_addPost(); return false;"><?php _e('Add to Series', 'pmproseries');?></a></td>
					</tr>
				</tbody>
			</table>
		</div>	
		<?php
	}
}
