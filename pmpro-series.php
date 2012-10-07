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
	* Is the user's level "assigned" to that series?
	* If so, does the user have access to that content yet.
	* If not, then the user will have access. (e.g. Pro members get access to everything right away.)
*/