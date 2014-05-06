<?php
class PMProSeries
{
    private $options;

	//constructor
	function PMProSeries($id = NULL)
	{
        $this->dbgOut('Instantiated class & fetching series: ' . $id);
		if(!empty($id))
			return $this->getSeriesByID($id);
		else
			return true;
	}

    public function getOptions()
    {
        return $this->options;
    }

	//populate series data by post id passed
	function getSeriesByID($id)
	{
		$this->post = get_post($id);
		if(!empty($this->post->ID)) {
			$this->id = $id;
            $this->getSeriesOptions( $this->id );
        } else
			$this->id = false;
			
		return $this->id;
	}

    // Options for the series
    public function getSeriesOptions( $series_id )
    {
        $args = array(
            'post_type' => 'pmpro_series',
            'orderby' => 'title',
            'posts_per_page' => -1,
            'caller_get_posts' => 1
        );

        $tmpPosts = null;
        $tmpPosts = get_posts($args);

        foreach ( $tmpPosts as $post) : setup_postdata($post);

            if ( $series_id === $post->ID )
                $this->options = get_option( $post->post_name );

        endforeach;

        wp_reset_postdata();

        $this->dbgOut('Retrieved options for the series');

    }

    //add a post to this series
	function addPost($post_id, $delay)
	{
		if(empty($post_id) || !isset($delay))
		{
			$this->error = "Please enter a value for post and delay.";
			return false;
		}

        $this->dbgOut('Post ID: ' . $post_id . ' and delay: ' . $delay);

		$post = get_post($post_id);
			
		if(empty($post->ID))
		{
			$this->error = "A post with that id does not exist.";
			return false;
		}
		
		$this->getPosts();
				
		//remove any old post with this id
		if($this->hasPost($post_id))
			$this->removePost($post_id);

        // Calculate delay

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

        // usort($this->posts, array("PMProSeries", "sortByDelay"));

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
            return $this->normalizeDelay( $this->posts[$key]->delay );
	}

    function normalizeDelays($a, $b)
    {

//        $aIsDate = $this->isValidDate($a->delay);
//        $bIsDate = $this->isValidDate($b->delay);

        // Check whether we're operating w/Dates rather than days.
//        if ($this->options['delayType'] == 'byDate')
//        {
//            if (($aIsDate) && ($bIsDate)) {
                $aDelay = $this->convertToDays($a->delay);
                $bDelay = $this->convertToDays($b->delay);
                //$this->dbgOut("Both are dates. a: " . $aDelay . " b: " . $bDelay);
//            } elseif (($aIsDate) && (! $bIsDate )) {
//                $aDelay = $this->convertToDays($a->delay);
                //$this->dbgOut("Only a->delay is a date (" . $a->delay . ") translates to " . $aDelay . " days" );
//                $bDelay = $b->delay;
//            } elseif (((! $aIsDate) && ($bIsDate ))) {
//                $bDelay = $this->convertToDays($b->delay);
                //$this->dbgOut("Only b->delay is a date (" . $bDelay . ") days");
//                $aDelay = $a->delay;
//            } elseif ((!$aIsDate) && (!$bIsDate)) {
//                $aDelay = $a->delay;
//                $bDelay = $b->delay;
                //$this->dbgOut("Both are day counts since start. a: " . $aDelay . " b: " . $bDelay);
//            }
//        } elseif ($this->options['delayType'] == 'byDays')
//        {
//            if ((! $aIsDate) && (! $bIsDate)) {
//                $aDelay = $a->delay;
//                $bDelay = $b->delay;
                //$this->dbgOut("Both are day counts since start. a: " . $aDelay . " b: " . $bDelay);
//            } elseif (($aIsDate) && (! $bIsDate )) {
//                $aDelay = $this->convertToDays($a->delay);
                //$this->dbgOut("Only a->delay is a date (" . $a->delay . ") translates to " . $aDelay . " days" );
//                $bDelay = $b->delay;
//            } elseif (((! $aIsDate) && ($bIsDate))) {
//                $bDelay = $this->convertToDays($b->delay);
                //$this->dbgOut("Only b->delay is a date (" . $b->delay . ") translates to " . $bDelay . " days" );
//                $aDelay = $a->delay;
//            } elseif (($aIsDate) && ($bIsDate)) {
//                $aDelay = $this->convertToDays($a->delay);
//                $bDelay = $this->convertToDays($b->delay);
                // $this->dbgOut("a->delay is a date (" . $a->delay . ") translates to " . $aDelay . " days" );
                //$this->dbgOut("b->delay is a date (" . $b->delay . ") translates to " . $bDelay . " days" );
//            }
//        }

        return array($aDelay, $bDelay);
    }

    public function normalizeDelay( $delay )
    {
        $this->dbgOut('In normalizeDelay() for delay:' . $delay);

        if ( $this->isValidDate($delay) )
            return $this->convertToDays($delay);

        return $delay;
    }

    function sortByDelay($a, $b)
    {
        switch ($this->options['sortOrder'])
        {
            case SORT_ASC:
                $this->dbgOut('Sorted in Ascending order');
                return $this->sortAscending($a, $b);
                break;
            case SORT_DESC:
                $this->dbgOut('Sorted in Descending order');
                return $this->sortDescending($a, $b);
                break;
        }
    }

    public function dbgOut($msg)
    {
        $tmpFile = './debug_log.txt';
        $fh = fopen($tmpFile, 'a');
        fwrite($fh, $msg . "\r\n");
        fclose($fh);
    }
	//used to sort posts by delay
	public function sortAscending($a, $b)
	{
        list($aDelay, $bDelay) = $this->normalizeDelays($a, $b);

        // Now sort the data
        if ($aDelay == $bDelay)
            return 0;
        // Ascending sort order
        return ($aDelay > $bDelay) ? -1 : 1;

	}

    public function sortDescending($a, $b)
    {
        list($aDelay, $bDelay) = $this->normalizeDelays($a, $b);

        if ($aDelay == $bDelay)
            return 0;
        // Descending Sort Order
        return ($aDelay < $bDelay) ? 1 : -1;
    }


    public function convertToDays( $date )
    {
        if ( $this->isValidDate( $date ) )
        {
            $startDate = pmpro_getMemberStartdate();
            $dStart = new DateTime( date( 'Y-m-d', $startDate ) );
            $dEnd = new DateTime( date( 'Y-m-d', strtotime($date) ) ); // Today's date
            $dDiff = $dStart->diff($dEnd);
            $dDiff->format('%d');

            $days = $dDiff->days;
            $this->dbgOut('C2Days - Member start date: ' . date('Y-m-d', $startDate) . ' and end date: ' . $date .  ' for delay day count: ' . $days);
        } else {
            $days = $date;
            $this->dbgOut('C2Days - Days of delay from start: ' . $date);
        }

        return $days;
    }

    public function convertToDate( $days )
    {
        $startDate = pmpro_getMemberStartdate();
        $endDate = date( 'Y-m-d', strtotime( $startDate . " +" . $days . ' days' ));
        $this->dbgOut('C2Date - Member start date: ' . date('Y-m-d', $startDate) . ' and end date: ' . $endDate .  ' for delay day count: ' . $days);
        return $endDate;
    }

	//send an email RE new access to post_id to email of user_id
	function sendEmail($post_id, $user_id)
	{
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
                                'name' => __( 'Sequences' ),
								'singular_name' => __( 'Sequence' ),
                                'slug' => 'series',
                                'add_new' => __( 'New Sequence' ),
                                'add_new_item' => __( 'New Sequence' ),
                                'edit' => __( 'Edit Sequence' ),
                                'edit_item' => __( 'Edit Sequence' ),
                                'new_item' => __( 'Add New' ),
                                'view' => __( 'View Sequence' ),
                                'view_item' => __( 'View This Sequence' ),
                                'search_items' => __( 'Search Sequences' ),
                                'not_found' => __( 'No Sequence Found' ),
                                'not_found_in_trash' => __( 'No Sequence Found In Trash' ),
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
						'slug' => 'sequence',
						'with_front' => false
						),
				'has_archive' => 'sequences'
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
		add_meta_box('pmpro_page_meta', 'Require Membership', 'pmpro_page_meta', 'pmpro_series', 'side');	
		
		//series meta box
		add_meta_box('pmpro_series_meta', 'Posts in this Series', array("PMProSeries", "seriesMetaBox"), 'pmpro_series', 'normal');

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
            // Order the posts in accordance with the 'sortOrder' option
            if ($this->options['sortOrder'] == SORT_DESC)
                    usort($this->posts, array("PMProSeries", "sortDescending"));

            // TODO: Have upcoming posts be listed before or after the currently active posts (own section?) - based on sort setting

			ob_start();
			?>		
			<ul id="pmpro_series-<?php echo $this->id; ?>" class="pmpro_series_list">
			<?php			
				foreach($this->posts as $sp)
				{
				?>

					<?php
                        $memberFor = pmpro_getMemberDays();

                        if ($this->isPastDelay( $memberFor, $sp->delay )) {
                    ?>
                    <li>
						<span class="pmpro_series_item-title"><a href="<?php echo get_permalink($sp->id);?>"><?php echo get_the_title($sp->id);?></a></span>
						<span class="pmpro_series_item-available"><a class="pmpro_btn pmpro_btn-primary" href="<?php echo get_permalink($sp->id);?>">Available Now</a></span>
                    </li>
 					<?php } elseif ( ($this->isPastDelay( $memberFor, $sp->delay )) && ( ! $this->hideUpcomingPosts() ) ) { ?>
                    <li>
						<span class="pmpro_series_item-title"><?php echo get_the_title($sp->id);?></span>
						<span class="pmpro_series_item-unavailable">available on day <?php echo $sp->delay;?></span>
                    </li>
					<?php } ?>
					<div class="clear"></div>
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

    // Test whether to show future series posts (i.e. not yet available to member)
    public function hideUpcomingPosts()
    {
        return ($this->options['hidden'] == 'on' ? true : false );
    }

    public function isValidDate( $data )
    {
        if ( count( preg_split( "/-/", $data ) ) == 3 )
            return true;

        return false;
    }

    public function isPastDelay( $memberFor, $delay )
    {
        if ($this->isValidDate($delay))
            return ( time() >= strtotime( $delay . ' 00:00:00.0' )) ? true : false; // a date specified as the $delay

        return ( $memberFor >= $delay ) ? true : false;
    }

    //this code updates the posts and draws the list/form
	function getPostListForMetaBox()
	{
		global $wpdb;
		
		//boot out people without permissions
		if(!current_user_can("edit_posts"))
			return false;
		
		if(isset($_REQUEST['pmpros_post']))
			$pmpros_post = intval($_REQUEST['pmpros_post']);
		if(isset($_REQUEST['pmpros_delay'])) {
            if ( $this->isValidDate( $_REQUEST['pmpros_delay'] ) )
                $delay = $_REQUEST['pmpros_delay'];
            else
                $delay = intval($_REQUEST['pmpros_delay']);
        }

		if(isset($_REQUEST['pmpros_remove']))
			$remove = intval($_REQUEST['pmpros_remove']);
			
		//adding a post
		if(!empty($pmpros_post))			
			$this->addPost($pmpros_post, $delay);
			
		//removing a post
		if(!empty($remove))
			$this->removePost($remove);
						
		//show posts
		$this->getPosts();
				
		?>		
			
		<?php if(!empty($this->error)) { ?>
			<div class="message error"><p><?php echo $this->error;?></p></div>
		<?php } ?>
		
		<table id="pmpros_table" class="wp-list-table widefat fixed">
		<thead>
			<th>Order</th>
			<th width="50%">Title</th>
			<?php if ($this->options['delayType'] == 'byDays'): ?>
                <th>Delay (# of days)</th>
            <?php else: ?>
                <th>Date</th>
            <?php endif; ?>
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
					<td><?php echo $post->delay ?></td>
					<td>
						<a href="javascript:pmpros_editPost('<?php echo $post->id;?>', '<?php echo $post->delay;?>'); void(0);">Edit</a>
					</td>
					<td>
						<a href="javascript:pmpros_removePost('<?php echo $post->id;?>'); void(0);">Remove</a>
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
			<p><strong>Add/Edit Posts:</strong></p>
			<table id="newmeta">
				<thead>
					<tr>
						<th>Post/Page</th>
                        <?php if ($this->options['delayType'] == 'byDays'): ?>
                            <th>Delay (# of days)</th>
                        <?php else: ?>
                            <th>Date ('yyyy-mm-dd')</th>
                        <?php endif; ?>
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
							$allposts = $wpdb->get_results("SELECT ID, post_title, post_status FROM $wpdb->posts WHERE post_status IN('publish', 'draft', 'future', 'pending', 'private') AND post_type IN ('" . implode("','", $pmpros_post_types) . "') AND post_title <> '' ORDER BY post_title");
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
						<td><input id="pmpros_delay" name="pmpros_delay" type="text" value="" size="7" /></td>
						<td><a class="button" id="pmpros_save">Add to Series</a></td>
					</tr>
				</tbody>
			</table>
		</div>
		<script>						
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
			
			function pmpros_removePost(post_id)
			{								
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
		</script>		
		<?php		
	}
}
