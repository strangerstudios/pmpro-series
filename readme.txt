=== Paid Memberships Pro - Series ===
Contributors: strangerstudios
Tags: series, drip feed, serial, delayed, limited, memberships
Requires at least: 5.2
Tested up to: 6.8
Stable tag: 1.0
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.html

Drip feed content to your members over the course of their membership. Serializes content by # of days post-registration.

== Description ==
This plugin currently requires Paid Memberships Pro.

How this plugin works:

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

== Installation ==

1. Upload the `pmpro-series` directory to the `/wp-content/plugins/` directory of your site.
1. Activate the plugin through the 'Plugins' menu in WordPress.
1. Navigate to the Series menu in the WordPress dashboard to create a new series.
1. Add posts to series using the "Posts in this Series" meta box under the post content.

== Frequently Asked Questions ==

= I found a bug in the plugin. =

Please post it in the issues section of GitHub and we'll fix it as soon as we can. Thanks for helping. https://github.com/strangerstudios/pmpro-series/issues

== Changelog ==
= 1.0 - 2025-07-17 =
* SECURITY: Improved escaping of output throughout the plugin. #117 (@dparker1005)
* ENHANCEMENT: Now integrating with the abstract PMPro_Email_Template class when running PMPro v3.4+. #116 (@dparker1005)
* BUG FIX/ENHANCEMENT: Added missing "help" text when editing the "new content" email template. #113 (@MaximilianoRicoTabo)
* BUG FIX: Fixed a conflict with third-party code that renders the series page inside of an output buffer. #110 (@dwanjuki)
* DEPRECATED: Removed support for custom .html email template files. The Email Template editor should now be used. #116 (@dparker1005)

= 0.7 - 2024-07-19 =
* ENHANCEMENT: Updated the frontend UI for compatibility with PMPro v3.1. #108, #109 (@dparker1005, @kimcoleman)
* BUG FIX: Fixed some PHP 8.2+ warnings. #109 (@kimcoleman)

= 0.6.1 -2024-06-20 =
* BUG FIX: Fix an issue where the new content emails would not send to customers when content becomes available. (@dparker1005,@JarrydLong)

= 0.6 - 2023-08-16 =
* BUG FIX/ENHANCEMENT: Improving compatibility with PMPro Multiple Memberships Per User Add On. #92 (@dparker1005)
* BUG FIX/ENHANCEMENT: Improving compatibility with Avada theme to prevent some content from being duplicated. #101 (@JarrydLong)
* BUG FIX/ENHANCEMENT: Updated localization and escaping of strings. #104 (@dparker1005)
* BUG FIX: Now only sending “new content” emails for series in “publish” status. #83 (@andrewlimaza)
* BUG FIX: Fixed PHP8 compatibility issue with the plugin action links. #99 (@JarrydLong)
* BUG FIX: Fixed an error on archive pages when the `$post` global is not set. #100 (@JarrydLong)
* BUG FIX: Fixed incorrect class attributes for `<li>` items in the series list. #93 (@kimcoleman)
* BUG FIX: Fixed issue where crons would not be cleared on deactivation. #105 (@dparker1005)
* BUG FIX: Fixed the version of select2 that is being enqueued to match included select2 files. #103 (@dparker1005)
* REFACTOR: Removing functions that have been merged into the core Paid Memberships Pro plugin. #91 (@dparker1005)

= 0.5 - 2020-10-16=
* ENHANCEMENT: Now showing a different message at the top of a series when all content is now available.
* ENHANCEMENT: Now wrapping content of series pages in a <div> so that it can be targeted with CSS.
* ENHANCEMENT: Added classes around text at the top of series pages so that it can be targeted with CSS.
* ENHANCEMENT: Now using date_i18n() instead of date().
* BUG FIX/ENHANCEMENT: Posts that have not yet been published will no longer be shown in series on frontend.
* BUG FIX/ENHANCEMENT: Updated select2 library.
* BUG FIX: Fixed issue where custom "new_content.html" files would not be found.
* BUG FIX: Now updating "_post_series" postmeta when a series is deleted.
* BUG FIX: Fixed PHP warning when sending the "new_content.html" email.
* BUG FIX: Fixed issue where startdates may have been shifted based on SQL timezone.

= .4.1 - 2020-01-09=
* BUG FIX: Fixed issues where posts belonging to more than one series would show up multiple times in the new content email.
* BUG FIX: Fixed JavaScript issues of posts/pages not being added to series.

= .4 =
* BUG FIX: Fixed issues that came up if PMPro was not active.
* BUG FIX: Fixes issues when running certain versions of PHP.
* BUG FIX: Fixed issue where users couldn't access pages that were part of a deleted series. (Thanks, Thomas Sjolshagen)
* BUG FIX/ENHANCEMENT: Works with Gutenberg and PMPro 2.0+ now.
* BUG FIX/ENHANCEMENT: You can now add posts into a series before saving/refreshing a new post.
* BUG FIX/ENHANCEMENT: Fixed menu_icon for Series CPT to use dashicons-clock in place of custom image.
* BUG FIX/ENHANCEMENT: Updated to the latest version of select2.
* BUG FIX/ENHANCEMENT: Using current_time('timestamp') instead of time(). (Thanks, Thomas Sjolshagen)
* ENHANCEMENT: Wrapped strings for translation and added French language files. (Thanks, Charlie Merland)
* ENHANCEMENT: Added pmpros_days_left_message, pmpros_content_access_message_single_item, and pmpros_content_access_message_many_items filters to filter the text shown in certain cases via hooks. (Thanks, Curtis McHale)
* ENHANCEMENT: Added pmpros_new_content_subject filter. (Thanks, Curtis McHale)
* ENHANCEMENT: Improved styling of the series list.
* ENHANCEMENT: Updating to add support for the Email Templates Admin Editor Add On.

= .3.7 =
* Fixed new content email cron to remember which posts members were notified of.

= .3.6 =
* Updated format of the notification email. Will now send 1 email with a list of all new content instead of 1 email for each post.

= .3.5 =
* Added pmpros_series_registration filter to change PMPro Series post type settings. e.g. https://gist.github.com/strangerstudios/4fc33f3ee209b9dca00f/

= .3.4 =
* Can now use custom email templates for new content notifications. (.../your_theme/paid-memberships-pro/series/new_content.html)
* Fixed bug in code that adds links to series posts in the member links section of the membership account page.
* Fixed bug with Day 0 content if timezones/etc aren't lined up on server/site.
* Changed series list to show dates of availability instead of "on day X".

= .3.3 =
* Now showing the date content in a series will become available instead of the number of days.
* Fixed bug where pmpros_check_for_new_content() function was not being fired by the cron.

= .3.2 =
* Fixed a warning. (Thanks, Karmyn)

= .3.1 =
* Fixed some warnings. (Thanks, Virtualced)
* Added pmpros_series_labels filter

= .3 =
* Added account page links
* Added emails when new content is available

= .2.3.1 =
* Fixed bug in pmpro_getMemberDays that sometimes reported more days than the user had really been a member. (Thanks, surefireweb)

= .2.3 =
* Added pmpro_member_startdate filter to pmpro_getMemberStartdate function.

= .2.2 =
* Flushing rewrite rules on activation and deactivation so /series/ URLs work without having to update permalink settings.
* Added pmpro_series_get_post_list filter.

= .2.1 =
* Fixed a warning message (Thanks, moneysharp on the WP.org forums.)

= .2 =
* Styled the post list on a series page.
* Hiding the post list if a user doesn't have access to the series page.
* Hiding links to posts user doesn't have access to yet due to delay.
* Fixed bug with editing the first post in the series.
* Now allowing 0 day content. Forcing delay (and post ids) to be integers.

= .1.1 =
* Fixed code for hasAccess logic.
* Updating the message shown when a user doesn't have access.
* Fixed edit link in the "Posts in this Series" meta box.

= .1 =
* This is the initial version of the plugin.
