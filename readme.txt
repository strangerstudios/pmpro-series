=== PMPro Series ===
Contributors: strangerstudios
Tags: series, drip feed, serial, delayed, limited, memberships
Requires at least: 3.4
Tested up to: 4.0
Stable tag: .3.7

Create "Series" which are groups of posts/pages where content is revealed to members over time. This is the "drip feed content" module for Paid Memberships Pro.

== Description ==
This plugin currently requires Paid Memberships Pro. 

== Installation ==

1. Upload the `pmpro-series` directory to the `/wp-content/plugins/` directory of your site.
1. Activate the plugin through the 'Plugins' menu in WordPress.
1. Navigate to the Series menu in the WordPress dashboard to create a new series.
1. Add posts to series using the "Posts in this Series" meta box under the post content.

== Frequently Asked Questions ==

= I found a bug in the plugin. =

Please post it in the issues section of GitHub and we'll fix it as soon as we can. Thanks for helping. https://github.com/strangerstudios/pmpro-series/issues

== Changelog ==
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
