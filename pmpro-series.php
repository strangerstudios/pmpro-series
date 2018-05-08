<?php
/*
Plugin Name: PMPro Series
Plugin URI: http://www.paidmembershipspro.com/pmpro-series/
Description: Offer serialized (drip feed) content to your PMPro members.
Version: .3.7
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
	- An email is sent to the user letting them know that content is available.	
	
	Checking for access:
	* Is a membership level required?
	* If so, does the user have one of those levels?
	* Is the user's level "assigned" to a series?
	* If so, does the user have access to that content yet? (count days)
	* If not, then the user will have access. (e.g. Pro members get access to everything right away.)
	
	Checking to send emails: (planned feature)
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
require_once(dirname(__FILE__) . "/scheduled/crons.php");

/*
	Load CSS, JS files
*/
function pmprors_scripts()
{
	if(!is_admin())
	{
		/*if(!defined("PMPRO_VERSION"))
		{*/
			//load some styles that we need from PMPro
			wp_enqueue_style("pmprors_pmpro", plugins_url('css/pmpro_series.css',__FILE__ ));
		/*}*/
	}
}
add_action("init", "pmprors_scripts");


/*
	PMPro Series CPT
*/
add_action("init", array("PMProSeries", "createCPT"));

/*
	Add the PMPro meta box and the meta box to add posts/pages to series
*/
add_action("init", array("PMProSeries", "checkForMetaBoxes"), 20);

/*
	Detect AJAX calls
*/
function pmpros_ajax()
{
	if(isset($_REQUEST['pmpros_add_post']))
	{
		$series_id = $_REQUEST['pmpros_series'];				
		$series = new PMProSeries($series_id);
		$series->getPostListForMetaBox();
		exit;
	}
}
add_action("init", "pmpros_ajax");

/*
	Show list of series pages at end of series
*/
function pmpros_the_content($content)
{
	global $post;
	
	if($post->post_type == "pmpro_series" && pmpro_has_membership_access())
	{
		$series = new PMProSeries($post->ID);	
		$content .= "<p>You are on day " . intval(pmpro_getMemberDays()) . " of your membership.</p>";
		$content .= $series->getPostList();						
	}
	
	return $content;
}
add_filter("the_content", "pmpros_the_content");

/*
	Make sure people can't view content they don't have access to.
*/
//returns true if a user has access to a page, including logic for series/delays
function pmpros_hasAccess($user_id, $post_id)
{
	//is this post in a series?
	$post_series = get_post_meta($post_id, "_post_series", true);
	if(empty($post_series))
		return true;		//not in a series
		
	//does this user have a level giving them access to everything?
	$all_access_levels = apply_filters("pmproap_all_access_levels", array(), $user_id, $post_id);	
	if(!empty($all_access_levels) && pmpro_hasMembershipLevel($all_access_levels, $user_id))
		return true;	//user has one of the all access levels
		
	//check each series
	foreach($post_series as $series_id)
	{
		//does the user have access to any of the series pages?
		$results = pmpro_has_membership_access($series_id, $user_id, true);	//passing true there to get the levels which have access to this page
		if($results[0])	//first item in array is if the user has access
		{
			//has the user been around long enough for any of the delays?
			$series_posts = get_post_meta($series_id, "_series_posts", true);
			if(!empty($series_posts))
			{
				foreach($series_posts as $sp)
				{
					//this post we are checking is in this series
					if($sp->id == $post_id)
					{
						//check specifically for the levels with access to this series
						foreach($results[1] as $level_id)
						{
							if(max(0, pmpro_getMemberDays($user_id, $level_id)) >= $sp->delay)
							{						
								return true;	//user has access to this series and has been around longer than this post's delay
							}
						}
					}
				}
			}
		}		
	}	
	
	//haven't found anything yet. so must not have access
	return false;
}

/*
	Filter pmpro_has_membership_access based on series access.
*/
function pmpros_pmpro_has_membership_access_filter($hasaccess, $mypost, $myuser, $post_membership_levels)
{	
	//If the user doesn't have access already, we won't change that. So only check if they already have access.
	if($hasaccess)
	{			
		//okay check if the user has access
		if(pmpros_hasAccess($myuser->ID, $mypost->ID))
			$hasaccess = true;
		else
		{
			$hasaccess = false;		
		}
	}
	
	return $hasaccess;
}
add_filter("pmpro_has_membership_access_filter", "pmpros_pmpro_has_membership_access_filter", 10, 4);

/*
	Filter the message for users without access.
*/
function pmpros_pmpro_text_filter($text)
{
	global $wpdb, $current_user, $post;
	
	if(!empty($current_user) && !empty($post))
	{
		if(!pmpros_hasAccess($current_user->ID, $post->ID))
		{						
			//Update text. The either have to wait or sign up.
			$post_series = get_post_meta($post->ID, "_post_series", true);
			
			$inseries = false;
			foreach($post_series as $ps)
			{
				if(pmpro_has_membership_access($ps))
				{
					$inseries = $ps;
					break;
				}
			}
						
			if($inseries)
			{
				//user has one of the series levels, find out which one and tell him how many days left
				$series = new PMProSeries($inseries);
				$day = $series->getDelayForPost($post->ID);
				
				$member_days = pmpro_getMemberDays($current_user->ID);
				$days_left = ceil($day - $member_days);
				$date = date(get_option("date_format"), strtotime("+ $days_left Days", current_time("timestamp")));
				
				$text = "This content is part of the <a href='" . get_permalink($inseries) . "'>" . get_the_title($inseries) . "</a> series. You will gain access on " . $date . ".";
			}
			else
			{
				//user has to sign up for one of the series
				if(count($post_series) == 1)
				{
					$text = "This content is part of the <a href='" . get_permalink($post_series[0]) . "'>" . get_the_title($post_series[0]) . "</a> series.";
				}
				else
				{
					$text = "This content is part of the following series: ";
					$series = array();
					foreach($post_series as $series_id)
						$series[] = "<a href='" . get_permalink($series_id) . "'>" . get_the_title($series_id) . "</a>";
					$text .= implode(", ", $series) . ".";
				}
			}
		}
	}
	
	return $text;
}
add_filter("pmpro_non_member_text_filter", "pmpros_pmpro_text_filter");
add_filter("pmpro_not_logged_in_text_filter", "pmpros_pmpro_text_filter");

/*
	Couple functions from PMPro in case we don't have them yet.
*/
if(!function_exists("pmpro_getMemberStartdate"))
{
	/*
		Get a member's start date... either in general or for a specific level_id.
	*/
	function pmpro_getMemberStartdate($user_id = NULL, $level_id = 0)
	{		
		if(empty($user_id))
		{
			global $current_user;
			$user_id = $current_user->ID;
		}

		global $pmpro_startdates;	//for cache
		if(empty($pmpro_startdates[$user_id][$level_id]))
		{			
			global $wpdb;
			
			if(!empty($level_id))
				$sqlQuery = "SELECT UNIX_TIMESTAMP(startdate) FROM $wpdb->pmpro_memberships_users WHERE status = 'active' AND membership_id IN(" . $wpdb->escape($level_id) . ") AND user_id = '" . $user_id . "' ORDER BY id LIMIT 1";		
			else
				$sqlQuery = "SELECT UNIX_TIMESTAMP(startdate) FROM $wpdb->pmpro_memberships_users WHERE status = 'active' AND user_id = '" . $user_id . "' ORDER BY id LIMIT 1";
				
			$startdate = apply_filters("pmpro_member_startdate", $wpdb->get_var($sqlQuery), $user_id, $level_id);
			
			$pmpro_startdates[$user_id][$level_id] = $startdate;
		}
		
		return $pmpro_startdates[$user_id][$level_id];
	}
	
	function pmpro_getMemberDays($user_id = NULL, $level_id = 0)
	{
		if(empty($user_id))
		{
			global $current_user;
			$user_id = $current_user->ID;
		}
		
		global $pmpro_member_days;
		if(empty($pmpro_member_days[$user_id][$level_id]))
		{		
			$startdate = pmpro_getMemberStartdate($user_id, $level_id);
				
			//check that there was a startdate at all
			if(empty($startdate))
				$pmpro_member_days[$user_id][$level_id] = 0;
			else
			{			
				$now = time();
				$days = ($now - $startdate)/3600/24;
					
				$pmpro_member_days[$user_id][$level_id] = $days;
			}
		}
		
		return $pmpro_member_days[$user_id][$level_id];
	}
}

/*
	We need to flush rewrite rules on activation/etc for the CPTs.
	Register/unregister crons on activation/deactivation.
*/
function pmpros_activation() 
{	
	//flush rewrite rules
	PMProSeries::createCPT();
	flush_rewrite_rules();
	
	//setup cron
	wp_schedule_event(time(), 'daily', 'pmpros_check_for_new_content');
}
register_activation_hook( __FILE__, 'pmpros_activation' );
function pmpros_deactivation() 
{	
	//flush rewrite rules
	global $pmpros_deactivating;
	$pmpros_deactivating = true;
    flush_rewrite_rules();
	
	//remove cron
	wp_clear_scheduled_hook(time(), 'daily', 'pmpros_check_for_new_content');
}
register_deactivation_hook( __FILE__, 'pmpros_deactivation' );

/* 
	Add series post links to account page 
*/
function pmpros_member_links_bottom() {
    global $wpdb, $current_user;

    //get all series
    $all_series = $wpdb->get_results("
        SELECT *
        FROM $wpdb->posts
        WHERE post_type = 'pmpro_series'
    ");
	
	if(empty($all_series))
		return;
		
    foreach($all_series as $s) {
        $series = new PMProSeries($s->ID);
        $series_posts = $series->getPosts();
        		
		if(!empty($series_posts))
		{
			foreach($series_posts as $series_post) {								
				if(pmpros_hasAccess($current_user->user_id, $series_post->id)) {
					?>
					<li><a href="<?php echo get_permalink($series_post->id); ?>" title="<?php echo get_the_title($series_post->id); ?>"><?php echo get_the_title($series_post->id); ?></a></li>
					<?php
				}
			}
		}
    }
}
add_action('pmpro_member_links_bottom', 'pmpros_member_links_bottom');
