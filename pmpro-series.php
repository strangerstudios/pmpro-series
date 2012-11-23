<?php
/*
Plugin Name: PMPro Series
Plugin URI: http://www.paidmembershipspro.com/pmpro-series/
Description: Offer serialized (drip feed) content to your PMPro members.
Version: .1
Author: Stranger Studios
Author URI: http://www.strangerstudios.com
*/

/*
	The Story
	
	1. There will be a new "Series" tab in the Memberships menu of the WP dashboard.
	2. Admins can create a new "Series".
	3. Admins can add a page or post to a series along with a # of days after signup.
	4. Admins can add a series to a membership level.
	5. Admins can adjust the email template via an added page to their active theme.
	
	Then...
	
	1. User signs up for a membership level that gives him access to Series A.
	2. User gets access to any "0 days after" series content.
	3. Each day a script checks if a user should gain access to any new content, if so:
	- User is given access to the content.
	- A link to the content is added to the Membership Account page.
	- An email is sent to the user letting them know that content is available.	
	
	Checking for access:
	* Is a membership level required?
	* If so, does the user have one of those levels?
	* Is the user's level "assigned" to a series?
	* If so, does the user have access to that content yet? (count days)
	* If not, then the user will have access. (e.g. Pro members get access to everything right away.)
	
	Checking to send emails:
	* For all members with series levels.
	* What day of the membership is it?
	* For all series.
	* Get content.
	* Send content for this day.
	* Email update.
	
	Data Structure
	* Series is a CPT
	* Use wp_pmpro_memberships_pages to link to membership levels
	* wp_pmpro_series_content (series_id, post_id, day) stored in post meta
*/

/*
	Includes
*/
require_once(dirname(__FILE__) . "/classes/class.pmproseries.php");

/*
	PMPro Series CPT
*/
function create_post_type_pmpro_series()
{
	register_post_type('pmpro_series',
				array(
						'labels' => array(
                                'name' => __( 'Series' ),
                                'singular_name' => __( 'Series' ),
                                'slug' => 'series',
                                'add_new' => __( 'New Series' ),
                                'add_new_item' => __( 'New Series' ),
                                'edit' => __( 'Edit Series' ),
                                'edit_item' => __( 'Edit Series' ),
                                'new_item' => __( 'Add New' ),
                                'view' => __( 'View This Series' ),
                                'view_item' => __( 'View This Series' ),
                                'search_items' => __( 'Search Series' ),
                                'not_found' => __( 'No Series Found' ),
                                'not_found_in_trash' => __( 'No Series Found In Trash' )
                        ),
					'public' => true,					
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
add_action("init", "create_post_type_pmpro_series");
