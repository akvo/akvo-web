=== Advanced Custom Fields Migration Cleanup ===
Contributors: comprock
Donate link: http://typo3vagabond.com/about-typo3-vagabond/donate/
Tags: advanced custom fields, migration, autoload, advanced, admin, custom
Requires at least: 3.0.0
Tested up to: 3.4
Stable tag: 0.0.5
License: GPLv2 or later

Correct and prevent Advanced Custom Fields options migration autoload 'yes' to 'no'.

== Description ==
Argh… it turn's out that I was having problems with postmeta and options data being mixed. There went a day's coding a migrator when I didn't need it and doubt you either.

Anyways, just use the autoload cleanup and enforcer. That's still quite valid.

~~Migrate left over [Advanced Custom Fields](http://wordpress.org/extend/plugins/advanced-custom-fields/ "Advanced Custom Fields WordPress plugin") fields from wp_postmeta to wp_options while correcting autoload settings.~~

Convert previous ACF value migrations from autoload = 'yes' to 'no'. This is very handy for performance optimization when you've got tens of thousands of custom fields. Can help drastically improve website load times.

= Thank you… =
* [MediaBurn.org](http://mediaburn.org "Media Burn Archive — four decades of documentaries") for development funding.
* [Advanced Custom Fields](http://wordpress.org/extend/plugins/advanced-custom-fields/ "Advanced Custom Fields WordPress plugin") for making custom WordPress site easier
* [Viper007Bond](http://wordpress.org/support/profile/viper007bond "Viper007Bond WordPress profile") for [Regenerate Thumbnails](http://wordpress.org/extend/plugins/regenerate-thumbnails/ "Regenerate Thumbnails WordPress plugin") Ajax'd code base.
* [Željko Aščić](http://www.ascic.net/ "Željko Aščić's blog") of [Tourist Playground](http://www.touristplayground.com/ "Tourist Playground") for the plugin banner

== Installation ==
1. Via Plugins > Install Plugins, Search for "advanced-custom-fields-migrator"
1. Install "Advanced Custom Fields Migrator"
1. Alternately, download `advanced-custom-fields-migrator.zip` from http://wordpress.org/extend/plugins/advanced-custom-fields-migrator/
1. Unzip `advanced-custom-fields-migrator.zip` locally
1. Upload the `advanced-custom-fields-migrator` folder to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Set options via Settings > ACF Migrator
1. Migrate via Tools > ACF Migrator

== Frequently Asked Questions ==
= Can I sponsor …? =
Yes. Any sponsoring would be greatly welcome. Please [donate](http://typo3vagabond.com/about-typo3-vagabond/donate/ "Help sponsor TYPO3 Importer") and let me know what's wanted

== Screenshots ==
1. Settings - Post Selection
2. Settings - General Settings
3. ACF Migrator
4. ACF Migrator - In progress

== Changelog ==
= trunk =
-

= 0.0.5 =
* Add plugin banner by Željko Aščić
* Argh… Options go to wp_options no Posts postmeta to wp_options
* Add in migration reversion routines for ACF data that's actually part of posts
* Cleanup verbiage

= 0.0.4 =
* Number formatting
* Rename Migration to General
* Add setting - Force Autoload 'no'?
* Split access for edit_posts and manage_options
* Only worry about autoload 'no' for add_option
* Show success or not messages
* Add update_option failover for add_option
* Update General Settings screenshot

= 0.0.3 =
* Settings autoload no by default
* Migration routines in place
* Only ACF fields migrated from wp_postmeta to wp_options
* Bail before deleting postmeta on any failures - data integrity
* Hide Delete… setting
* Add in posts_to_migrate & posts_to_skip to postmeta selection query
* Add language POT file
* Add ACF Migrator in progress screenshot

= 0.0.2 =
* Naming and verbiage corrections
* MediaBurn, Viper007Bond, ACF thanks
* Installation direction updates
* autoload performance fixer verbiage
* Post Selection - select all notice
* Add screenshots
* Validate readme.txt

= 0.0.1 =
* first release

== Upgrade Notice ==
* None

== TODOs ==
* Implement ACF field migration
