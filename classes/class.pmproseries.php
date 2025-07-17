<?php

class PMProSeries {
	/**
	 * ID of the series
	 *
	 * @var int $id
	 */
	public $id;

	/**
	 * Post object associated with the series
	 *
	 * @var object $post
	 */
	private $post;

	

	/**
	 * Array of posts in the series
	 *
	 * @var array $posts
	 */
	private $posts;

	/**
	 * Error message
	 *
	 * @var string $error
	 */
	private $error;

	/**
	 * [__construct] Class constructor.
	 *
	 * @param integer $id
	 */
	function __construct( $id = null ) {
		if ( ! empty( $id ) ) {
			return $this->getSeriesByID( $id );
		} else {
			return true;
		}
	}

	/**
	 * [getSeriesByID] Populate series data by post id passed.
	 *
	 * @param  integer $id
	 * @return integer
	 */
	function getSeriesByID( $id ) {
		$this->post = get_post( $id );
		if ( ! empty( $this->post->ID ) ) {
			$this->id = $id;
		} else {
			$this->id = false;
		}

		return $this->id;
	}

	/**
	 * [addPost] Add a post to this series.
	 *
	 * @param integer $post_id
	 * @param integer $delay
	 */
	function addPost( $post_id, $delay ) {
		if ( empty( $post_id ) || ! isset( $delay ) ) {
			$this->error = esc_html__( 'Please enter a value for post and delay.', 'pmpro-series' );
			return false;
		}

		$post = get_post( $post_id );

		if ( empty( $post->ID ) ) {
			$this->error = esc_html__( 'A post with that id does not exist.', 'pmpro-series' );
			return false;
		}

		$this->getPosts();

		if ( empty( $this->posts ) ) {
			$this->posts = array();
		}

		// remove any old post with this id
		if ( $this->hasPost( $post_id ) ) {
			$this->removePost( $post_id );
		}

		// add post
		$temp          = new stdClass();
		$temp->id      = $post_id;
		$temp->delay   = $delay;
		$this->posts[] = $temp;

		// sort
		usort( $this->posts, array( 'PMProSeries', 'sortByDelay' ) );

		// save
		update_post_meta( $this->id, '_series_posts', $this->posts );

		// add series to post
		$post_series = get_post_meta( $post_id, '_post_series', true );
		if ( ! is_array( $post_series ) ) {
			$post_series = array( $this->id );
		} else {
			$post_series[] = $this->id;
		}

		// save
		update_post_meta( $post_id, '_post_series', $post_series );
	}

	/**
	 * [removePost] Remove a post from this series.
	 *
	 * @param integer $post_id
	 * @param integer $delay
	 */
	function removePost( $post_id ) {
		if ( empty( $post_id ) ) {
			return false;
		}

		$this->getPosts();

		if ( empty( $this->posts ) ) {
			return true;
		}

		// remove this post from the series
		foreach ( $this->posts as $i => $post ) {
			if ( $post->id == $post_id ) {
				unset( $this->posts[ $i ] );
				$this->posts = array_values( $this->posts );
				update_post_meta( $this->id, '_series_posts', $this->posts );
				break;  // assume there is only one
			}
		}

		// remove this series from the post
		$post_series = get_post_meta( $post_id, '_post_series', true );
		if ( is_array( $post_series ) && ( $key = array_search( $this->id, $post_series ) ) !== false ) {
			unset( $post_series[ $key ] );
			update_post_meta( $post_id, '_post_series', $post_series );
		}

		return true;
	}

	/**
	 * [getPosts] Get array of all posts in this series.
	 * force = ignore cache and get data from DB.
	 *
	 * @param boolean $force update from database.
	 * @param null|string $status of posts to return.
	 * @return array of posts with status, if applicable. $this->posts will not be filtered by $status.
	 */
	function getPosts( $force = false, $status = null ) {
		if ( ! isset( $this->posts ) || $force ) {
			$this->posts = get_post_meta( $this->id, '_series_posts', true );
			if ( ! is_array( $this->posts ) ) {
				$this->posts = array();
			}
		}

		if ( ! empty( $status ) ) {
			$posts_with_status = array();
			foreach ($this->posts as $key => $post) {
				if ( $status === get_post_status( $post->id ) ) {
					$posts_with_status[] = $post;
				}
			}
			return $posts_with_status;
		}
		return $this->posts;
	}

	/**
	 * [hasPost] Does this series include post with id = post_id.
	 *
	 * @param  [type] $post_id
	 * @return boolean
	 */
	function hasPost( $post_id ) {
		$this->getPosts();

		if ( empty( $this->posts ) ) {
			return false;
		}

		foreach ( $this->posts as $key => $post ) {
			if ( $post->id == $post_id ) {
				return true;
			}
		}

		return false;
	}

	/**
	 * [getPostKey] Get key of post with id = $post_id.
	 *
	 * @param  [type] $post_id
	 * @return [type]
	 */
	function getPostKey( $post_id ) {
		$this->getPosts();

		if ( empty( $this->posts ) ) {
			return false;
		}

		foreach ( $this->posts as $key => $post ) {
			if ( $post->id == $post_id ) {
				return $key;
			}
		}

		return false;
	}

	/**
	 * [getDelayForPost]
	 *
	 * @param  [type] $post_id
	 * @return [type]
	 */
	function getDelayForPost( $post_id ) {
		$key = $this->getPostKey( $post_id );

		if ( $key === false ) {
			return false;
		} else {
			return $this->posts[ $key ]->delay;
		}
	}

	/**
	 * [getLongestPostDelay]
	 *
	 * @param null|string $status of posts to consider.
	 * @return int longest post delay.
	 */
	function getLongestPostDelay( $status = null ) {
		$posts = $this->getPosts( false, $status );
		$delay = 0;
		foreach ( $posts as $post ) {
			if ( ! empty( $post->delay ) && $post->delay > $delay ) {
				$delay = $post->delay;
			}
		}
		return $delay;
	}

	/**
	 * [sortByDelay] Sort posts by delay.
	 *
	 * @param  [type] $a
	 * @param  [type] $b
	 * @return [type]
	 */
	function sortByDelay( $a, $b ) {
		if ( $a->delay == $b->delay ) {
			return 0;
		}
		return ( $a->delay < $b->delay ) ? -1 : 1;
	}

		/**
		 * [sendEmail] Send an email RE new access to post_id to email of user_id.
		 *
		 * @param  [type] $post_ids
		 * @param  [type] $user_id
		 * @return [type]
		 */
	function sendEmail( $post_ids, $user_id ) {
		if ( class_exists( 'PMPro_Email_Template_New_Content' ) ) {
			// PMPro v3.4+. Use the new email template class.
			$user = get_user_by( 'id', $user_id );
			$email_template = new PMPro_Email_Template_New_Content( $post_ids, $user );
			return $email_template->send();
		}

		// PMPro v3.3 and earlier. Use the legacy email class.
		if ( ! class_exists( 'PMProEmail' ) ) {
			return;
		}

		$email = new PMProEmail();

		$user = get_user_by( 'id', $user_id );

		// build list of posts
		$post_list = "<ul>\n";
		foreach ( $post_ids as $post_id ) {
			$post_list .= '<li><a href="' . esc_url( get_permalink( $post_id ) ) . '">' . esc_html( get_the_title( $post_id ) ) . '</a></li>' . "\n";
		}
		$post_list .= "</ul>\n";

		$email->email    = $user->user_email;
		$email->template = 'new_content';
		$email->data = array(
			'name'       => $user->display_name,
			'sitename'   => get_option( 'blogname' ),
			'post_list'  => $post_list,
			'login_link' => wp_login_url(),
		);

		$email->sendEmail();
	}

	/**
	 * [createCPT] Create the Custom Post Type for Series.
	 *
	 * @return [type]
	 */
	static function createCPT() {
		// don't want to do this when deactivating
		global $pmpros_deactivating;
		if ( ! empty( $pmpros_deactivating ) ) {
			return false;
		}

		$labels = apply_filters(
			'pmpros_series_labels',
			array(
				'name'               => esc_html__( 'Series', 'pmpro-series' ),
				'singular_name'      => esc_html__( 'Series', 'pmpro-series' ),
				'slug'               => 'series',
				'add_new'            => esc_html__( 'New Series', 'pmpro-series' ),
				'add_new_item'       => esc_html__( 'New Series', 'pmpro-series' ),
				'edit'               => esc_html__( 'Edit Series', 'pmpro-series' ),
				'edit_item'          => esc_html__( 'Edit Series', 'pmpro-series' ),
				'new_item'           => esc_html__( 'Add New', 'pmpro-series' ),
				'view'               => esc_html__( 'View This Series', 'pmpro-series' ),
				'view_item'          => esc_html__( 'View This Series', 'pmpro-series' ),
				'search_items'       => esc_html__( 'Search Series', 'pmpro-series' ),
				'not_found'          => esc_html__( 'No Series Found', 'pmpro-series' ),
				'not_found_in_trash' => esc_html__( 'No Series Found In Trash', 'pmpro-series' ),
			)
		);

		register_post_type(
			'pmpro_series',
			apply_filters(
				'pmpros_series_registration',
				array(
					'labels'             => $labels,
					'public'             => true,
					'menu_icon'          => 'dashicons-clock',
					'show_ui'            => true,
					'show_in_menu'       => true,
					'show_in_rest'       => true,
					'publicly_queryable' => true,
					'hierarchical'       => true,
					'supports'           => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'author' ),
					'can_export'         => true,
					'show_in_nav_menus'  => true,
					'rewrite'            => array(
						'slug'       => 'series',
						'with_front' => false,
					),
					'has_archive'        => 'series',
				)
			)
		);
	}

	/**
	 * [checkForMetaBoxes] Meta boxes
	 *
	 * @return [type]
	 */
	static function checkForMetaBoxes() {
		// add meta boxes
		if ( is_admin() ) {
			add_action( 'admin_menu', array( 'PMProSeries', 'defineMetaBoxes' ) );
		}
	}

	/**
	 * [defineMetaBoxes] Meta boxes
	 *
	 * @return [type]
	 */
	static function defineMetaBoxes() {
		// Add "Require Membership" meta box if Paid Memberships Pro is active.
		if ( defined( 'PMPRO_VERSION' ) ) {
			add_meta_box( 'pmpro_page_meta', esc_html__( 'Require Membership', 'pmpro-series' ), 'pmpro_page_meta', 'pmpro_series', 'side' );
		}
		// series meta box
		add_meta_box( 'pmpro_series_meta', esc_html__( 'Manage Series', 'pmpro-series'), array( 'PMProSeries', 'seriesMetaBox' ), 'pmpro_series', 'normal' );
	}

	/**
	 * [seriesMetaBox] This is the actual series meta box.
	 *
	 * @return [type]
	 */
	static function seriesMetaBox() {
		global $post;
		$series = new PMProSeries( $post->ID );
		?>
		<div id="pmpros_series_posts">
		<?php $series->getPostListForMetaBox(); ?>
		</div>				
		<?php
	}

	/**
	 * [seriesMetaBox] This function returns a UL with the current posts.
	 *
	 * @return [type]
	 */
	function getPostList( $echo = false ) {
		global $current_user;
		$posts = $this->getPosts( false, 'publish' );
		if ( ! empty( $posts ) ) {
			ob_start();
			?>
			<ul id="pmpro_series-<?php echo intval( $this->id ); ?>" class="<?php echo esc_attr( pmpro_get_element_class( 'pmpro_list pmpro_list-plain pmpro_series_list', 'pmpro_series_list' ) ); ?>">
			<?php
				$member_days = $this->get_member_days( $current_user->ID );
				$post_list_posts = $posts;

				// Filter to allow plugins to modify the posts included in the Series.
				$post_list_posts = apply_filters('pmpro_series_post_list_posts', $post_list_posts, $this);

			foreach ( $post_list_posts as $sp ) {
				$days_left = ceil( $sp->delay - $member_days );
				$date      = date_i18n( get_option( 'date_format' ), strtotime( "+ $days_left Days", current_time( 'timestamp' ) ) );

				// Build the selectors for the series item in the list.
				$classes = array();
				$classes[] = 'pmpro_list_item';
				if ( apply_filters( 'pmpro_series_override_delay', ( max( 0, $member_days ) >= $sp->delay ), $member_days, $sp->delay, $current_user->ID ) ) {
					$classes[] = 'pmpro_series_item-li-available';
				} else {
					$classes[] = 'pmpro_series_item-li-unavailable';
				}
				$class = implode( ' ', array_unique( $classes ) );
				?>
				<li class="<?php echo esc_attr( pmpro_get_element_class( $class ) ); ?>">
				<?php if ( apply_filters( 'pmpro_series_override_delay', ( max( 0, $member_days ) >= $sp->delay ), $member_days, $sp->delay, $current_user->ID ) ) { ?>
						<span class="<?php echo esc_attr( pmpro_get_element_class( 'pmpro_series_item-title' ) ); ?>"><a href="<?php echo esc_url( get_permalink( $sp->id ) ); ?>"><?php echo esc_html( get_the_title( $sp->id ) ); ?></a></span>
						<span class="<?php echo esc_attr( pmpro_get_element_class( 'pmpro_series_item-available' ) ); ?>"><a class="<?php echo esc_attr( pmpro_get_element_class( 'pmpro_btn' ) ); ?>" href="<?php echo esc_url( get_permalink( $sp->id ) ); ?>"><?php esc_html_e( 'Available Now', 'pmpro-series' );?></a></span>
					<?php } else { ?>
						<span class="<?php echo esc_attr( pmpro_get_element_class( 'pmpro_series_item-title' ) ); ?>"><?php echo esc_html( get_the_title( $sp->id ) ); ?></span>
						<span class="<?php echo esc_attr( pmpro_get_element_class( 'pmpro_series_item-unavailable pmpro_font-small' ) ); ?>">
							<?php
								/* translators: %s: series post available date */
								printf( esc_html__( 'available on %s', 'pmpro-series' ), esc_html( $date ) );
							?>
						</span>
					<?php } ?>
				</li>
				<?php
			}
			?>
			</ul>
			<?php
			$temp_content = ob_get_contents();
			ob_end_clean();

			// filter
			$temp_content = apply_filters( 'pmpro_series_get_post_list', $temp_content, $this );

			if ( $echo ) {
				echo wp_kses_post( $temp_content );
			}

			return $temp_content;
		}

		return false;
	}

	/**
	 * [getPostListForMetaBox] This code updates the posts and draws the list/form.
	 *
	 * @return [type]
	 */
	function getPostListForMetaBox() {
		global $wpdb;

		// boot out people without permissions
		if ( ! current_user_can( 'edit_posts' ) ) {
			return false;
		}

		if ( isset( $_REQUEST['pmpros_post'] ) ) {
			$pmpros_post = intval( $_REQUEST['pmpros_post'] );
		}
		if ( isset( $_REQUEST['pmpros_delay'] ) ) {
			$delay = intval( $_REQUEST['pmpros_delay'] );
		}
		if ( isset( $_REQUEST['pmpros_remove'] ) ) {
			$remove = intval( $_REQUEST['pmpros_remove'] );
		}

		// adding a post
		if ( ! empty( $pmpros_post ) ) {
			$this->addPost( $pmpros_post, $delay );
		}

		// removing a post
		if ( ! empty( $remove ) ) {
			$this->removePost( $remove );
		}

		// show posts
		$this->getPosts();

		?>
				
			
		<?php if ( ! empty( $this->error ) ) { ?>
			<div class="message error"><p><?php echo esc_html( $this->error ); ?></p></div>
		<?php } ?>
		<h3><?php esc_html_e( 'Posts in this Series', 'pmpro-series' ); ?></h3>
		<table id="pmpros_table" class="wp-list-table widefat striped">
		<thead>
			<th><?php esc_html_e( 'Order', 'pmpro-series' ); ?></th>
			<th width="50%"><?php esc_html_e( 'Title', 'pmpro-series' ); ?></th>
			<th width="20%"><?php esc_html_e( 'Delay (# of days)', 'pmpro-series' ); ?></th>
			<th width="20%"><?php esc_html_e( 'Actions', 'pmpro-series' ); ?></th>
		</thead>
		<tbody>
		<?php
		$count = 1;

		if ( empty( $this->posts ) ) {
			?>
			<?php
		} else {
			foreach ( $this->posts as $post ) {
				?>
				<tr>
					<td><?php echo esc_html( $count ); ?>.</td>
					<td><?php echo esc_html( get_the_title( $post->id ) ); ?></td>
					<td><?php echo esc_html( $post->delay ); ?></td>
					<td>
						<a class="button button-secondary" href="javascript:pmpros_editPost('<?php echo esc_attr( $post->id ); ?>', '<?php echo esc_attr( $post->delay ); ?>'); void(0);"><?php esc_html_e( 'edit', 'pmpro-series' ); ?></a>
						<a class="button button-secondary" href="javascript:pmpros_removePost('<?php echo esc_attr( $post->id ); ?>'); void(0);"><?php esc_html_e( 'remove', 'pmpro-series' ); ?></a>
					</td>
				</tr>
				<?php
				$count++;
			}
		}
		?>
		</tbody>
		</table>
		<h3><?php esc_html_e( 'Add/Edit Posts', 'pmpro-series' ); ?></h3>
		<table id="newmeta" class="wp-list-table widefat striped">
			<thead>
				<tr>
					<th><?php esc_html_e( 'Post/Page', 'pmpro-series' ); ?></th>
					<th><?php esc_html_e( 'Delay (# of days)', 'pmpro-series' ); ?></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>
					<select id="pmpros_post" name="pmpros_post">
						<option value=""></option>
					<?php
						$pmpros_post_types = apply_filters( 'pmpros_post_types', array( 'post', 'page' ) );
						$allposts          = $wpdb->get_results( "SELECT ID, post_title, post_status FROM $wpdb->posts WHERE post_status IN('publish', 'draft') AND post_type IN ('" . implode( "','", $pmpros_post_types ) . "') AND post_title <> '' ORDER BY post_title" );
					foreach ( $allposts as $p ) {
						?>
						<option value="<?php echo esc_attr( $p->ID ); ?>"><?php echo esc_textarea( $p->post_title ); ?> (#
						<?php
						echo esc_html( $p->ID );

						if ( $p->post_status == 'draft' ) {
							echo esc_html( '-DRAFT' );
						}
						?>
							)</option>
						<?php
					}
					?>
					</select>
					</td>
					<td width="20%"><input id="pmpros_delay" name="pmpros_delay" type="text" value="" size="7" /></td>
					<td width="20%"><a class="button button-primary" id="pmpros_save"><?php esc_html_e( 'Add to Series', 'pmpro-series' ); ?></a></td>
				</tr>
			</tbody>
		</table>
		<?php
	}

	/**
	 * Get the number of days that a user has been a member for this series.
	 *
	 * @since 0.6
	 *
	 * @param int|null $user_id The user ID to check. Defaults to the current user.
	 *
	 * @return int Number of days that the user has been a member of this series.
	 */
	public function get_member_days( $user_id = null ) {
		global $wpdb;

		if ( empty( $user_id ) ) {
			$user_id = get_current_user_id();
		}

		// Get the level IDs that have access to this series.
		$series_levels = $wpdb->get_col( "SELECT membership_id FROM $wpdb->pmpro_memberships_pages WHERE page_id = '" . $this->id . "'" );

		// If series is not restricted, we just need to check pmpro_getMemberDays() without passing a level.
		if ( empty( $series_levels ) ) {
			return pmpro_getMemberDays( $user_id );
		}

		// If series is restricted, we need to find the maximum number of days that the user has been a member of any of the restricted levels.
		$member_days = 0;
		foreach ( $series_levels as $level_id ) {
			$days = pmpro_getMemberDays( $user_id, $level_id );
			if ( $days > $member_days ) {
				$member_days = $days;
			}
		}

		return $member_days;
	}
}
