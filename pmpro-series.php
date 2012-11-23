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
	
	if($post->post_type == "pmpro_series")
	{
		$series = new PMProSeries($post->ID);	
		$content .= $series->getPostList();						
	}
	
	return $content;
}
add_filter("the_content", "pmpros_the_content");

/*
	Make sure people can't view content they don't have access to.
*/
//returns true if a user has access to a page
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
		if(pmpro_has_membership_access($series_id, $user_id))
		{
			//has the user been around long enough for any of the delays?
			$series_posts = get_post_meta($series_id, "_series_posts", true);
			foreach($series_posts as $sp)
			{
				if($sp->id == $post_id)
				{
					if(pmpro_getMemberDays($user_id) >= $sp->delay)
					{						
						return true;
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
			$hasaccess = false;		
	}
	
	return $hasaccess;
}
add_filter("pmpro_has_membership_access_filter", "pmpros_pmpro_has_membership_access_filter", 10, 4);

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
				$sqlQuery = "SELECT UNIX_TIMESTAMP(startdate) FROM $wpdb->pmpro_memberships_users WHERE status = 'active' AND membership_id IN(" . $wpdb->escape($level) . ") AND user_id = '" . $current_user->ID . "' ORDER BY id LIMIT 1";		
			else
				$sqlQuery = "SELECT UNIX_TIMESTAMP(startdate) FROM $wpdb->pmpro_memberships_users WHERE status = 'active' AND user_id = '" . $user_id . "' ORDER BY id LIMIT 1";		
					
			$startdate = $wpdb->get_var($sqlQuery);
			
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
				
			$now = time();
			$days = ($now - $startdate)/3600/24;
		
			$pmpro_member_days[$user_id][$level_id] = $days;
		}
		
		return $pmpro_member_days[$user_id][$level_id];
	}
}
