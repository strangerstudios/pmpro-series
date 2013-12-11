=== PMPro Series ===
Contributors: strangerstudios
Tags: series, drip feed, serial, delayed, limited, memberships
Requires at least: 3.0
Tested up to: 3.4.2
Stable tag: .2.1

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
= .2.2 =
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
