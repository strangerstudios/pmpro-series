<?php
/**
 * Plugin Name: Paid Memberships Pro - Series
 * Plugin URI: https://www.paidmembershipspro.com/add-ons/pmpro-series-for-drip-feed-content/
 * Description: Drip feed content to your members over the course of their membership. Serializes content by # of days post-registration.
 * Version: 1.0
 * Author: Paid Memberships Pro
 * Author URI: https://www.paidmembershipspro.com
 * Text Domain: pmpro-series
 * Domain Path: /languages
 */

/*
	Includes
*/
require_once dirname( __FILE__ ) . '/classes/class.pmproseries.php';
require_once dirname( __FILE__ ) . '/scheduled/crons.php';

/*
	Load textdomain
*/
function pmpros_load_textdomain() {
	$locale = apply_filters( 'plugin_locale', get_locale(), 'pmpro-series' );
	load_textdomain( 'pmpro-series', trailingslashit( WP_LANG_DIR ) . basename( __DIR__ ) . '/languages/pmpro-series-' . $locale . '.mo');
	load_plugin_textdomain( 'pmpro-series', FALSE, basename( __DIR__ ) . '/languages/');
}
add_action( 'init', 'pmpros_load_textdomain' );


/**
 * [pmpros_scripts] Load frontend CSS file.
 *
 * @return void
 */
function pmpros_scripts() {
	wp_enqueue_style( 'pmpros_pmpro', plugins_url( 'css/pmpro_series.css', __FILE__ ) );
}
add_action( 'wp_enqueue_scripts', 'pmpros_scripts' );

/**
 * [pmpros_admin_scripts] Load admin JS files.
 *
 * @param  [type] $hook
 * @return void
 */
function pmpros_admin_scripts( $hook ) {
	if ( in_array( $hook, array( 'post.php', 'post-new.php' ) ) && 'pmpro_series' == get_post_type() ) {
		wp_enqueue_style( 'pmpros-select2', plugins_url( 'css/select2.css', __FILE__ ), '', '4.0.13', 'screen' );
		wp_enqueue_script( 'pmpros-select2', plugins_url( 'js/select2.js', __FILE__ ), array( 'jquery' ), '4.0.13' );
		wp_enqueue_style( 'pmpros-admin', plugins_url( 'css/pmpro-series-admin.css', __FILE__ ) );
		wp_register_script( 'pmpros_pmpro', plugins_url( 'js/pmpro-series.js', __FILE__ ), array( 'jquery' ), null, true );

		if ( ! empty( $_GET['post'] ) ) {
			$post_id = intval( $_GET['post'] );
		} else {
			$post_id = '';
		}

		$localize = array(
			'series_id'      => $post_id,
			'save'           => esc_html__( 'Save', 'pmpro-series' ),
			'saving'         => esc_html__( 'Saving', 'pmpro-series' ) . '...',
			'saving_error_1' => esc_html__( 'Error saving series post', 'pmpro-series' ) . ' [1]',
			'saving_error_2' => esc_html__( 'Error saving series post', 'pmpro-series' ) . ' [2]',
			'remove_error_1' => esc_html__( 'Error removing series post', 'pmpro-series' ) . ' [1]',
			'remove_error_2' => esc_html__( 'Error removing series post', 'pmpro-series' ) . ' [2]',
		);

		wp_localize_script( 'pmpros_pmpro', 'pmpro_series', $localize );
		wp_enqueue_script( 'pmpros_pmpro' );
	}
}
add_action( 'admin_enqueue_scripts', 'pmpros_admin_scripts' );

/*
	PMPro Series CPT
*/
add_action( 'init', array( 'PMProSeries', 'createCPT' ) );

/*
	Add the PMPro meta box and the meta box to add posts/pages to series
*/
add_action( 'init', array( 'PMProSeries', 'checkForMetaBoxes' ), 20 );


/*
	Detect AJAX calls
*/
function pmpros_ajax() {
	if ( isset( $_REQUEST['pmpros_add_post'] ) ) {
		$series_id = $_REQUEST['pmpros_series'];
		$series    = new PMProSeries( $series_id );
		$series->getPostListForMetaBox();
		exit;
	}
}
add_action( 'init', 'pmpros_ajax' );


/**
 * [pmpros_the_content] Show list of series pages at end of series.
 *
 * @param  [type] $content
 * @return [type]
 */
function pmpros_the_content( $content ) {
	global $post;

	if ( ! empty( $post ) && $post->post_type == 'pmpro_series' ) {
		
		// Display the Series if Paid Memberships Pro is active.
		if ( !function_exists( 'pmpro_has_membership_access' ) || pmpro_has_membership_access() ) {
			ob_start();
			$series   = new PMProSeries( $post->ID );
			$member_days = intval( $series->get_member_days() );
			?>
			<div class="<?php echo esc_attr( pmpro_get_element_class( 'pmpro' ) ); ?>">
				<div id="pmpro-series-<?php echo esc_attr( absint( $post->ID ) ); ?>" class="<?php echo esc_attr( pmpro_get_element_class( 'pmpro_card pmpro-series-post-list', 'pmpro-series-post-list' ) ); ?>">
					<h2 class="<?php echo esc_attr( pmpro_get_element_class( 'pmpro_card_title pmpro_font-large' ) ); ?>"><?php esc_html_e( 'Content in This Series', 'pmpro-series' ); ?></h2>
					<div class="<?php echo esc_attr( pmpro_get_element_class( 'pmpro_card_content' ) ); ?>">
						<?php
							if ( $member_days >= $series->getLongestPostDelay( 'publish' ) ) {
								?>
								<p class="<?php echo esc_attr( pmpro_get_element_class( 'pmpro_series_all_posts_available_text' ) ); ?>"><?php esc_html_e( 'All posts in this series are now available.', 'pmpro-series' ); ?></p>
								<?php
							} else {
								?>
								<p class="<?php echo esc_attr( pmpro_get_element_class( 'pmpro_series_days_into_membership_text' ) ); ?>"><?php echo sprintf( esc_html__( 'You are on day %d of your membership.', 'pmpro-series' ), esc_html( (int) $member_days ) ); ?></p>
								<?php
							}
						?>
						<?php echo wp_kses_post( $series->getPostList() ); ?>
					</div> <!-- end pmpro_card_content -->
				</div> <!-- end pmpro_card -->
			</div> <!-- end pmpro -->
			<?php
			$content = ob_get_contents();
			ob_end_clean();
		}

		// Note: Let's eventually work to make this compatible if Paid Memberships Pro is not active.		
	}
	
	return $content;
}
add_filter( 'the_content', 'pmpros_the_content' );

/**
 * Adds compatibility for the Avada theme by removing our 
 * hooks from their content
 * 
 * @since 0.6
 */
function pmpros_avada_remove_content_changes_avada() {
	remove_filter( 'the_content', 'pmpros_the_content' );
}
add_action( 'awb_remove_third_party_the_content_changes', 'pmpros_avada_remove_content_changes_avada', 5 );

// Add the_content restriction back for Avada.
function pmpros_avada_readd_content_changes_avada() {
	add_filter( 'the_content', 'pmpros_the_content' );
}
add_action( 'awb_readd_third_party_the_content_changes', 'pmpros_avada_readd_content_changes_avada', 99 );


/**
 * Check if a user has access to a series.
 */
function pmpros_hasAccessToSeries( $series_id, $user_id, $return_membership_levels = false ) {
	if ( function_exists( 'pmpro_has_membership_access' ) ) {
		// Remove our filter to avoid loops.
		remove_filter( 'pmpro_has_membership_access_filter', 'pmpros_pmpro_has_membership_access_filter', 10, 4 );
		
		// Get results.
		$results = pmpro_has_membership_access( $series_id, $user_id, true );
		
		// Add the filter back.
		add_filter( 'pmpro_has_membership_access_filter', 'pmpros_pmpro_has_membership_access_filter', 10, 4 );
	} else {
		// Assume true
		$results = array();
		$results[] = true;
		$results[] = array();
	}
	
	if ( $return_membership_levels ) {
		return $results;
	} else {
		return $results[0];
	}
}

/**
 * [pmpros_hasAccess] Makes sure people can't view content they don't have access to. This function returns true if a user has access to a page, including logic for series/delays.
 *
 * @param  [type] $user_id
 * @param  [type] $post_id
 * @return [type]
 */
function pmpros_hasAccess( $user_id, $post_id ) {
	// Is this post in a series?
	$post_series = pmpros_getPostSeries( $post_id );
	if ( empty( $post_series ) ) {
		return true;        // not in a series
	}
	
	// Does this user have a level giving them access to everything?
	$all_access_levels = apply_filters( 'pmproap_all_access_levels', array(), $user_id, $post_id );
	if ( ! empty( $all_access_levels )
	&& function_exists( 'pmpro_hasMembershipLevel' )
	&& pmpro_hasMembershipLevel( $all_access_levels, $user_id ) ) {
		return true;    // user has one of the all access levels
	}

	// Loop through all series containing this post.
	foreach ( $post_series as $series_id ) {
		// Check if the user is a member of this series.
		if ( ! function_exists( 'pmpro_has_membership_access' ) || pmpros_hasAccessToSeries( $series_id, $user_id ) ) {
			// Check if the user has been a part of this series long enough to view this post.
			$series = new PMProSeries( $series_id );
			$post_delay  = $series->getDelayForPost( $post_id );
			$member_days = intval( $series->get_member_days( $user_id ) );
			if ( empty( $post_delay ) || $member_days >= $post_delay ) {
				return true;    // user has access to this post
			}
		}
	}

	// haven't found anything yet. so must not have access
	return false;
}

/**
 * [pmpros_pmpro_has_membership_access_filter] Filter pmpro_has_membership_access based on series access.
 *
 * @param  [type] $hasaccess
 * @param  [type] $mypost
 * @param  [type] $myuser
 * @param  [type] $post_membership_levels
 * @return [type]
 */
function pmpros_pmpro_has_membership_access_filter( $hasaccess, $post, $user, $post_membership_levels ) {
	// If the user doesn't have access already, we won't change that. So only check if they already have access.
	if ( $hasaccess && !empty( $post ) ) {
		// okay check if the user has access
		if ( pmpros_hasAccess( $user->ID, $post->ID ) ) {
			$hasaccess = true;
		} else {
			$hasaccess = false;
		}
	}

	return $hasaccess;
}
add_filter( 'pmpro_has_membership_access_filter', 'pmpros_pmpro_has_membership_access_filter', 10, 4 );

/**
 * Get the series a post is in.
 * @param $post_id	int	ID of the post to check series for.
 * NOTE: When getting/setting the _post_series post meta, use get_post_meta
 * 		 to get the value directly.
 */
function pmpros_getPostSeries( $post_id = NULL ) {
	// Default to the global post.
	if ( empty( $post_id ) ) {
		global $post;
		
		if ( ! empty( $post ) && ! empty( $post->ID ) ) {
			$post_id = $post->ID;
		}
	}
	
	// Get ID from post object if passed in.
	if ( is_object( $post_id ) && ! empty( $post_id->ID ) ) {
		$post_id = $post_id->ID;
	}
	
	// Bail if no post.
	if ( empty( $post_id ) ) {
		return array();
	}
	
	// If this is a series itself, bail.
	if ( get_post_type( $post_id ) == 'pmpro_series' ) {
		return array();
	}
	
	// Get series from post meta.
	$post_series = get_post_meta( $post_id, '_post_series', true );

	// Make sure it's an array.
	if ( empty( $post_series ) ) {
		$post_series = array();
	} elseif ( ! is_array( $post_series ) ) {
		$post_series = array( $post_series );
	}
	
	// Make sure the posts are published.
	$new_post_series = array();
	$deleted_post_series = array();
	foreach( $post_series as $series_id ) {
		if ( ! empty( $series_id ) ) {
			$post_status = get_post_status( $series_id );
			if ( 'publish' === $post_status ) {
				$new_post_series[] = $series_id;
			} elseif ( 'trash' === $post_status || false === $post_status ) {
				$deleted_post_series[] = $series_id;
			}
		}
	}

	if ( ! empty( $deleted_post_series ) ) {
		update_post_meta( $post_id, '_post_series', array_diff( $post_series, $deleted_post_series ) );
	}

	return $new_post_series;
}

/**
 * Filter the header message for the no access message.
 *
 * @since 1.0
 *
 * @param string $header The header message for the no access message.
 * @return string The filtered header message for the no access message.
 */
function pmpros_no_access_message_header( $header ) {
	global $current_user, $post;

	// We are running PMPro v3.1+, so make sure that deprecated filters don't run later.
	remove_filter( 'pmpro_non_member_text_filter', 'pmpros_pmpro_text_filter' );
	remove_filter( 'pmpro_not_logged_in_text_filter', 'pmpros_pmpro_text_filter' );

	// Check if the post is locked in a series.
	if ( ! empty( $current_user ) && ! empty( $post ) && ! pmpros_hasAccess( $current_user->ID, $post->ID ) ) {
		// Check if the user has access to any series containing this post.
		$post_series = pmpros_getPostSeries( $post->ID );
		$inseries = array();
		foreach ( $post_series as $ps ) {
			if ( !function_exists('pmpro_has_membership_access') || pmpro_has_membership_access( $ps ) ) {
				$inseries[] = $ps;
			}
		}
		if ( ! empty( $inseries ) ) {
			$header = __( 'Waiting For Access', 'pmpro-series' );
		} else {
			$header = __( 'Membership Required', 'pmpro-series' );
		}
	}

	return $header;
}
add_filter( 'pmpro_no_access_message_header', 'pmpros_no_access_message_header' ); // PMPro v3.1+.

/**
 * [pmpros_pmpro_text_filter] Filter the message for users without access.
 *
 * @param  string $text
 * @return string
 */
function pmpros_pmpro_text_filter( $text ) {
	global $current_user, $post;

	if ( ! empty( $current_user ) && ! empty( $post ) ) {
		if ( ! pmpros_hasAccess( $current_user->ID, $post->ID ) ) {
			// Update text. The either have to wait or sign up.
			$post_series = pmpros_getPostSeries( $post->ID );
			$inseries = array();
			foreach ( $post_series as $ps ) {
				if ( !function_exists('pmpro_has_membership_access') || pmpro_has_membership_access( $ps ) ) {
					$inseries[] = $ps;
				}
			}

			if ( ! empty( $inseries ) ) {
				// User is a part of a series that has this post. Figure out which series will give them access soonest and tell them.
				$days_left      = null;
				$soonest_series = null;
				foreach ( $inseries as $series_id ) {
					$series = new PMProSeries( $series_id );
					$post_delay  = $series->getDelayForPost( $post->ID );
					$member_days = intval( $series->get_member_days() );
					if ( empty( $soonest_series ) || $post_delay - $member_days < $days_left ) {
						$days_left      = $post_delay - $member_days;
						$soonest_series = $series;
					}
				}

				// Show the user when they will have access.
				$series_date_text        = date_i18n( get_option( 'date_format' ), strtotime( "+ $days_left Days", current_time( 'timestamp' ) ) );
				$series_link_text = '<a href="' . esc_url( get_permalink( $soonest_series->id ) ) . '">' . esc_html( get_the_title( $soonest_series->id ) ) . '</a>';
				/* translators: 1: series link, 2: date */
				$text = '<p>' . sprintf( esc_html__( 'This content is part of the %1$s series. You will gain access on %2$s.', 'pmpro-series' ),  $series_link_text, esc_html( $series_date_text ) ) . '</p>';

				$text = apply_filters( 'pmpros_days_left_message', $text, $member_days, $days_left, $current_user->ID );
			} else {
				// user has to sign up for one of the series
				if ( count( $post_series ) == 1 ) {
					$series_link_text = '<a href="' . esc_url( get_permalink( $post_series[0] ) ) . '">' . esc_html( get_the_title( $post_series[0] ) ) . '</a>';
					$text = '<p>' . sprintf( esc_html__( 'This content is part of the %s series.', 'pmpro-series' ),  $series_link_text ) . '</p>';
					
					$text = apply_filters( 'pmpros_content_access_message_single_item', $text, $post_series );
				} else {
					$series = array();
					foreach ( $post_series as $series_id ) {
						$series[] = "<a href='" . esc_url( get_permalink( $series_id ) ) . "'>" . esc_html( get_the_title( $series_id ) ) . '</a>';
					}
					$series_list_text = implode( ', ', $series ) . '.';
					
					$text   = '<p>' . sprintf( esc_html__( 'This content is part of the following series: %s', 'pmpro-series' ), $series_list_text ) . '</p>';
					
					$text  = apply_filters( 'pmpros_content_access_message_many_items', $text, $post_series );
				}
			}
		}
	}

	return $text;
}
add_filter( 'pmpro_no_access_message_body', 'pmpros_pmpro_text_filter' ); // PMPro v3.1+.
add_filter( 'pmpro_non_member_text_filter', 'pmpros_pmpro_text_filter' ); // Pre-PMPro v3.1.
add_filter( 'pmpro_not_logged_in_text_filter', 'pmpros_pmpro_text_filter' ); // Pre-PMPro v3.1.

/*
	We need to flush rewrite rules on activation/etc for the CPTs.
	Register/unregister crons on activation/deactivation.
*/
/**
 * [pmpros_activation description]
 *
 * @return [type]
 */
function pmpros_activation() {
	// flush rewrite rules
	PMProSeries::createCPT();
	flush_rewrite_rules();

	// setup cron
	wp_schedule_event( current_time( 'timestamp' ), 'daily', 'pmpros_check_for_new_content' );
}
register_activation_hook( __FILE__, 'pmpros_activation' );
function pmpros_deactivation() {
	// flush rewrite rules
	global $pmpros_deactivating;
	$pmpros_deactivating = true;
	flush_rewrite_rules();

	// remove cron
	wp_clear_scheduled_hook( 'pmpros_check_for_new_content' );
}
register_deactivation_hook( __FILE__, 'pmpros_deactivation' );

/*
	Add series post links to account page
*/
function pmpros_member_links_bottom() {
	global $wpdb, $current_user;

	// get all series
	$all_series = $wpdb->get_results(
		"
        SELECT *
        FROM $wpdb->posts
        WHERE post_type = 'pmpro_series'
    "
	);

	if ( empty( $all_series ) ) {
		return;
	}

	// Build our list of series posts to show.
	$series_posts_list = array();

	foreach ( $all_series as $s ) {
		$series       = new PMProSeries( $s->ID );
		$series_posts = $series->getPosts();

		if ( ! empty( $series_posts ) ) {
			foreach ( $series_posts as $series_post ) {
				if ( pmpros_hasAccess( $current_user->ID, $series_post->id ) ) {
					$series_posts_list[$series_post->id] = array(
						'title' => get_the_title( $series_post->id ),
						'permalink' => get_permalink( $series_post->id ),
					);
				}
			}
		}
	}

	if ( empty( $series_posts_list ) ) {
		return;
	}

	// Remove duplicate array keys.
	$series_posts_list = array_values( $series_posts_list );

	// Show the list.
	foreach ( $series_posts_list as $series_post ) {
		?>
		<li class="<?php esc_attr( pmpro_get_element_class( 'pmpro_list_item' ) ); ?>"><a href="<?php echo esc_url( $series_post['permalink'] ); ?>" title="<?php echo esc_attr( $series_post['title'] ); ?>"><?php echo esc_html( $series_post['title'] ); ?></a></li>
		<?php
	}
}
add_action( 'pmpro_member_links_bottom', 'pmpros_member_links_bottom' );

/**
 * Set up the email templates for the plugin.
 *
 * @since 1.0
 */
function pmpros_load_email_templates() {
	if ( class_exists( 'PMPro_Email_Template' ) ) {
		// PMPro v3.4+. Load the email template classes.
		require_once( dirname( __FILE__ ) . '/classes/email-templates/class-pmpro-email-template-new-content.php' );
	} else {
		// Legacy hook to add email templates.
		add_filter( 'pmproet_templates', 'pmpros_email_templates' );
	}
}
add_action( 'init', 'pmpros_load_email_templates', 8 ); // Priority 8 to ensure the pmproet_templates hook is added before PMPro loads email templates.

/**
 * [pmpros_email_templates] Integrate with Email Templates Admin Editor
 *
 * @param  [type] $templates
 * @return [type]
 */
function pmpros_email_templates( $templates ) {
	// Add the new content template.
	$templates['new_content'] = array(
		'subject'     => esc_html__( 'New content is available at !!sitename!!', 'pmpro-series' ),
		'description' => esc_html__( 'New Series Content Notification', 'pmpro-series' ),
		'body'        => pmpros_get_new_content_email_body(),
		'help_text'   => esc_html__( 'This email is sent to users when new content is available in a series.', 'pmpro-series' ),
	);
	return $templates;
}

/**
 * Get the default body for the new content email.
 *
 * @since 1.0
 *
 * @return string
 */
function pmpros_get_new_content_email_body() {
	ob_start(); ?>
<p><?php esc_html_e( 'New content is available at !!sitename!!.', 'pmpro-series' ); ?></p>

!!post_list!!<?php
	$body = ob_get_contents();
	ob_end_clean();
	return $body;
}

/**
 * [pmpros_add_email_template]
 *
 * @deprecated 1.0
 *
 * @param  [type] $templates
 * @param  [type] $page_name
 * @param  string $type
 * @param  string $where
 * @param  string $ext
 * @return [type]
 */
function pmpros_add_email_template( $templates, $page_name, $type = 'emails', $where = 'local', $ext = 'html' ) {
	_deprecated_function( 'pmpros_add_email_template', '1.0' );
	$templates[] = dirname( __FILE__ ) . '/email/new_content.html';
	return $templates;
}

/**
 * [pmpros_plugin_action_links] Function to add links to the plugin action links
 *
 * @param array $links Array of links to be shown in plugin action links.
 */
function pmpros_plugin_action_links( $links ) {
	if ( current_user_can( 'manage_options' ) ) {
		$new_links = array(
			'<a href="' . esc_url( get_admin_url( null, 'edit.php?post_type=pmpro_series' ) ) . '">' . esc_html__( 'Settings', 'pmpro-series' ) . '</a>',
		);
		return array_merge( $new_links, $links );
	}
	return $links;
}
add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'pmpros_plugin_action_links' );

/**
 * [pmpros_plugin_row_meta] Function to add links to the plugin row meta
 *
 * @param array  $links Array of links to be shown in plugin meta.
 * @param string $file Filename of the plugin meta is being shown for.
 */
function pmpros_plugin_row_meta( $links, $file ) {
	if ( strpos( $file, 'pmpro-series.php' ) !== false ) {
		$new_links = array(
			'<a href="' . esc_url( 'https://www.paidmembershipspro.com/add-ons/pmpro-series-for-drip-feed-content/' ) . '" title="' . esc_attr( __( 'View Documentation', 'pmpro-series' ) ) . '">' . __( 'Docs', 'pmpro-series' ) . '</a>',
			'<a href="' . esc_url( 'https://www.paidmembershipspro.com/support/' ) . '" title="' . esc_attr( __( 'Visit Customer Support Forum', 'pmpro-series' ) ) . '">' . __( 'Support', 'pmpro-series' ) . '</a>',
		);
		$links     = array_merge( $links, $new_links );
	}
	return $links;
}
add_filter( 'plugin_row_meta', 'pmpros_plugin_row_meta', 10, 2 );
