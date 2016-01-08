<?php
/*
Plugin Name: Global Hide Admin Tool Bar
Plugin URI: //wordpress.org/plugins/global-admin-bar-hide-or-remove/
Description: Add Global Options to Hide Frontend Admin Tool Bar According to User Roles
Version: 1.6.1
Author: <a title="Visit author homepage" href="//slangji.wordpress.com/">sLa NGjI's</a> & <a title="Visit plugin-master-author homepage" href="//www.fischercreativemedia.com/">Don Fischer</a>
License: GPLv2 or later
License URI: //www.gnu.org/licenses/gpl-2.0.html
Indentation: GNU style coding standard
Indentation URI: //www.gnu.org/prep/standards/standards.html
 *
Text Domain: global-hide-remove-toolbar-plugin
 *
 * LICENSING
 *
 * [Global Hide Admin Tool Bar](//wordpress.org/plugins/global-admin-bar-hide-or-remove/)
 *
 * Copyright (C) 2013-2014 [slangjis](//slangji.wordpress.com/) (email: <slangjis [at] googlegmail [dot] com>)
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the [GNU General Public License](//wordpress.org/about/gpl/)
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * on an "AS IS", but WITHOUT ANY WARRANTY; without even the implied
 * warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 * See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, see [GNU General Public Licenses](//www.gnu.org/licenses/),
 * or write to the Free Software Foundation, Inc., 51 Franklin Street,
 * Fifth Floor, Boston, MA 02110-1301, USA.
 *
 * DISCLAIMER
 *
 * The license under which the WordPress software is released is the GPLv2 (or later) from the
 * Free Software Foundation. A copy of the license is included with every copy of WordPress.
 *
 * Part of this license outlines requirements for derivative works, such as plugins or themes.
 * Derivatives of WordPress code inherit the GPL license.
 *
 * There is some legal grey area regarding what is considered a derivative work, but we feel
 * strongly that plugins and themes are derivative work and thus inherit the GPL license.
 *
 * The license for this software can be found on [Free Software Foundation](//www.gnu.org/licenses/gpl-2.0.html) and as license.txt into this plugin package.
 *
 * The author of this plugin is available at any time, to make all changes, or corrections, to respect these specifications.
 *
 * THERMS
 *
 * This global-hide-admin-tool-bar.php uses (or it parts) code derived from:
 *
 * global-admin-bar-hide-or-remove.php by Donald J. Fischer (email: <dfischer [at] fischercreativemedia [dot] com>)
 * Copyright (C) 2011-2013 [prophecy2040](//www.fischercreativemedia.com/) (email: <dfischer [at] fischercreativemedia [dot] com>)
 *
 * according to the terms of the GNU General Public License version 2 (or later) this uses or it parts code was derived.
 *
 * According to the Terms of the GNU General Public License version 2 (or later) part of Copyright belongs to your own author and part belongs to their respective others authors:
 *
 * Copyright (C) 2008-2014 [slangjis](//slangji.wordpress.com/) (email: <slangjis [at] googlemail [dot] com>)
 * Copyright (C) 2011-2013 Donald J. Fischer (email: <dfischer [at] fischercreativemedia [dot] com>)
 *
 * VIOLATIONS
 *
 * [Violations of the GNU Licenses](//www.gnu.org/licenses/gpl-violation.en.html)
 * The author of this plugin is available at any time, to make all changes, or corrections, to respect these specifications.
 *
 * GUIDELINES
 *
 * This software meet [Detailed Plugin Guidelines](//wordpress.org/plugins/about/guidelines/)
 * paragraphs 1,4,10,12,13,16,17 quality requirements.
 * The author of this plugin is available at any time, to make all changes, or corrections, to respect these specifications.
 *
 * CODING
 *
 * This software implement [GNU style](//www.gnu.org/prep/standards/standards.html) coding standard indentation.
 * The author of this plugin is available at any time, to make all changes, or corrections, to respect these specifications.
 *
 * VALIDATION
 *
 * This readme.txt rocks. Seriously. Flying colors. It meet the specifications according to
 * WordPress [Readme Validator](//wordpress.org/plugins/about/validator/) directives.
 * The author of this plugin is available at any time, to make all changes, or corrections, to respect these specifications.
 *
 * THANKS
 *
 * To Donald J. Fischer a.k.a prophecy2040 @ www.fischercreativemedia.com for this plugin!
 */

	/**
	 * @package		WordPress Plugin
	 * @subpackage	Global Hide Admin Tool Bar
	 * @author		slangjis
	 * @build		2014.04.16
	 * @keytag		74be16979710d4c4e7c6647856088456
	 * @since		3.1.0
	 */

	if ( !function_exists( 'add_action' ) )

		{

			header( 'HTTP/0.9 403 Forbidden' );
			header( 'HTTP/1.0 403 Forbidden' );
			header( 'HTTP/1.1 403 Forbidden' );
			header( 'Status: 403 Forbidden' );
			header( 'Connection: Close' );
	
			exit();

		}

	global $wp_version;

	if ( $wp_version < 3.1 )

		{
			wp_die( __( 'This Plugin Requires WordPress 3.1+ or Greater: Activation Stopped!' ) );
		}

	function ghatb_1st()

		{

			$wp_path_to_this_file = preg_replace( '/(.*)plugins\/(.*)$/', WP_PLUGIN_DIR . "/$2", __FILE__ );
			$this_plugin          = plugin_basename( trim( $wp_path_to_this_file ) );
			$active_plugins       = get_option( 'active_plugins' );
			$this_plugin_key      = array_search( $this_plugin, $active_plugins );

			if ( $this_plugin_key )

				{

					array_splice( $active_plugins, $this_plugin_key, 1 );
					array_unshift( $active_plugins, $this_plugin );
					update_option( 'active_plugins', $active_plugins );

				}

		}

	add_action( 'activated_plugin', 'ghatb_1st', 0 );
	
	if ( !defined( 'GHATB_VERSION' ) ) define( 'GHATB_VERSION', '1.6.1' );

	$path    = plugin_dir_path( __FILE__ ) . 'lang/';
	$loaded  = $path;
	$loaded2 = load_plugin_textdomain( 'global-hide-remove-toolbar-plugin', false, $loaded );

	global $show_admin_bar;

	add_action( 'admin_init', 'global_adminbar_settings' );
	add_action( 'admin_menu', 'global_adminbar_menu' );

	add_filter( 'show_admin_bar', 'global_show_hide_admin_bar' );

	function myplugin_activate()

		{

			$checkRoles    = get_option( 'global-admin-bar-roles', 0 );
			$checkProfiles = get_option( 'global-admin-bar-profiles', 0 );
			$okRoles       = get_usable_clean_roles();
			$pluginset     = get_option( 'global-admin-bar-plugin-setting', 0 );
			$usersset      = get_option( 'global-admin-bar-plugin-user-setting', 0 );

			if ( $pluginset == 0 )

				{

					add_option( 'global-admin-bar-plugin-setting', '1' );

				}

			if ( $usersset == 0 )

				{

					add_option( 'global-admin-bar-plugin-user-setting', '0' );

				}

			if ( $checkRoles == 0 )

				{

					add_option( 'global-admin-bar-roles', $okRoles );

				}

			if ( $checkProfiles == 0 )

				{

					add_option( 'global-admin-bar-profiles', $okRoles );

				}

		}

	register_activation_hook( __FILE__, 'myplugin_activate' );

	function ghatb_clnp()

		{

			delete_option( 'GHATB_VERSION' );
			delete_option( 'global-admin-bar-plugin-setting' );
			delete_option( 'global-admin-bar-plugin-user-setting' );
			delete_option( 'global-admin-bar-profiles' );
			delete_option( 'global-admin-bar-roles' );

		}

	register_deactivation_hook( __FILE__, 'ghatb_clnp' );

	function global_adminbar_filter_plugin_actions( $links )

		{

			$links[] = '<a title="" href="' . admin_url( 'options-general.php?page=global-hide-admin-tool-bar-plugin' ) . '">' . __( 'Settings', 'global-hide-remove-toolbar-plugin' ) . '</a>';

			return $links;

		}

	add_action( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'global_adminbar_filter_plugin_actions' );

	function ghatb_prml( $links, $file )

		{

			if ( $file == plugin_basename( __FILE__ ) )

				{

					global $wp_version;

					if ( $wp_version < 3.8 )

						{

							$links[] = '<a title="Bugfix and Suggestions" href="//slangji.wordpress.com/contact/">Contact</a>';

						}

					$links[] = '<a title="Offer a Beer to sLa" href="//slangji.wordpress.com/donate/">Donate</a>';

					global $wp_version;

					if ( $wp_version < 3.8 )

						{

							$links[] = '<a title="Visit other author plugins" href="//slangji.wordpress.com/plugins/">Other Author Plugins</a>';

						}

					if ( $wp_version >= 3.8 )

						{

							$links[] = '<a title="Visit other author plugins" href="//slangji.wordpress.com/plugins/">Other</a>';

						}

				}

			return $links;

		}

	add_filter( 'plugin_row_meta', 'ghatb_prml', 10, 2 );

	function ghatb_shfl()

		{

			echo "\n<!--Plugin Global Hide Admin Tool Bar 1.6.1 Active - Tag ".md5(md5("".""))."-->\n";
			echo "\n<!-- This website is patched against a big problem not solved from WordPress 3.3+ to date -->\n\n";

		}

	add_action( 'wp_head', 'ghatb_shfl', 0 );
	add_action( 'wp_footer', 'ghatb_shfl', 0 );

	function global_show_hide_admin_bar( $showvar )

		{

			global $show_admin_bar;

			$theRoles = get_option( 'global-admin-bar-roles' );
			$userRole = get_current_user_role();

			if ( get_option( 'global-admin-bar-plugin-setting' ) == '1' && in_array( $userRole, $theRoles ) )
	
				{

					$show_admin_bar = false;
					return false;

				}
	
			else
	
				{

					return $showvar;

				}

		}

	function get_current_user_role()

		{

			global $wp_roles;

			$current_user = wp_get_current_user();
			$roles        = $current_user->roles;
			$role         = array_shift( $roles );

			return $role;
	
		}

	function get_profile_user_role()

		{

			global $wp_roles, $user_id;

			$user_id      = (int) $user_id;
			$current_user = wp_get_current_user();
			$profileuser  = get_user_to_edit( $user_id );

			if ( $user_id != $current_user->ID )

				{

					$roles = $profileuser->roles;
					$role  = array_shift( $roles );
					return $role;

				}

			return;

		}

	function global_profile_hide_admin_bar()

		{

			if ( get_option( 'global-admin-bar-plugin-user-setting' ) == '1' )

				{

					$checkProfiles = get_option( 'global-admin-bar-profiles' );
					$userrole      = get_profile_user_role();

					if ( is_array( $checkProfiles ) && in_array( $userrole, $checkProfiles ) )

						{

							echo '<style type="text/css">.show-admin-bar{display:none !important}</style>';

						}

				}

			return;

		}

	add_action( 'admin_print_styles-profile.php', 'global_profile_hide_admin_bar' );
	add_action( 'admin_print_styles-user-edit.php', 'global_profile_hide_admin_bar' );

	function global_adminbar_menu()

		{

			$current_user = wp_get_current_user();

			if ( is_multisite() && is_super_admin() )

				{

					add_options_page( __( 'Global Hide Admin Tool Bar Plugin Options', 'global-hide-remove-toolbar-plugin' ), __( 'Hide Toolbar Options', 'global-hide-remove-toolbar-plugin' ), 'manage_network', 'global-hide-admin-tool-bar-plugin', 'ghatb_admin_bar_page' );

				}

			elseif ( is_multisite() && !is_super_admin() )

				{

					$theRoles = get_option( 'global-admin-bar-roles' );

					if ( !is_array( $theRoles ) )

						{

							$theRoles = array();

						}

					if ( !in_array( get_current_user_role(), $theRoles ) )

						{

							add_options_page( __( 'Global Hide Admin Tool Bar Plugin Options', 'global-hide-remove-toolbar-plugin' ), __( 'Hide Toolbar Options', 'global-hide-remove-toolbar-plugin' ), 'manage_options', 'global-hide-admin-tool-bar-plugin', 'ghatb_admin_bar_page' );

						}

				}

			elseif ( !is_multisite() && current_user_can( 'manage_options' ) )

				{

					add_options_page( __( 'Global Hide Admin Tool Bar Plugin Options', 'global-hide-remove-toolbar-plugin' ), __( 'Hide Toolbar Options', 'global-hide-remove-toolbar-plugin' ), 'manage_options', 'global-hide-admin-tool-bar-plugin', 'ghatb_admin_bar_page' );
	
				}

		}

	function global_adminbar_settings()

		{

			register_setting( 'global-admin-bar-group', 'global-admin-bar-plugin-setting' );
			register_setting( 'global-admin-bar-group', 'global-admin-bar-plugin-user-setting' );
			register_setting( 'global-admin-bar-group', 'global-admin-bar-roles' );
			register_setting( 'global-admin-bar-group', 'global-admin-bar-profiles' );

			$checkRoles    = get_option( 'global-admin-bar-roles' );
			$checkProfiles = get_option( 'global-admin-bar-profiles' );
			$okRoles       = get_usable_clean_roles();

			if ( $checkRoles == '' )

				{

					update_option( 'global-admin-bar-roles', $okRoles );

				}

			if ( $checkProfiles == '' )

				{

					update_option( 'global-admin-bar-profiles', $okRoles );

				}

		}

	function get_usable_clean_roles()

		{

			global $wp_roles;

			$all_roles      = $wp_roles->roles;
			$newArr         = array();
			$editable_roles = apply_filters( 'editable_roles', $all_roles );

			if ( count( $editable_roles ) > 0 )

				{
					foreach ( $editable_roles as $key => $roledata )

						{

							$newArr[] = $key;

						}

				}

			return $newArr;

		}

	function get_usable_roles( $name = 'roles' )

		{

			if ( ( is_multisite() && is_super_admin() ) || ( !is_multisite() && current_user_can( 'manage_options' ) ) )

				{

					global $wp_roles;

					$theRoles       = get_option( 'global-admin-bar-' . $name );
					$newArr         = array();
					$all_roles      = $wp_roles->roles;
					$editable_roles = apply_filters( 'editable_roles', $all_roles );

					if ( !is_array( $theRoles ) )

						{

							$theRoles = array();

						}

					if ( count( $editable_roles ) > 0 )

						{

							$newArr[] = '<ul style="width:400px;padding-left:8px;">';

							foreach ( $editable_roles as $key => $roledata )

								{

									if ( in_array( $key, $theRoles ) )

										{

											$newArr[] = '<li style="width:130px;float:left;">&nbsp;&nbsp;<input type="checkbox" checked="checked" name="global-admin-bar-' . $name . '[]" value="' . $key . '"/> ' . $key . '</li>';

										}

									else

										{

											$newArr[] = '<li style="width:130px;float:left;">&nbsp;&nbsp;<input type="checkbox" name="global-admin-bar-' . $name . '[]" value="' . $key . '"/> ' . $key . '</li>';

										}

								}

							$newArr[] = '</ul>';
							$newArr[] = '<div style="clear:both;"></div>';

						}

					return $newArr;

				}

		}

	function ghatb_admin_bar_page()

		{

?>

<div class="wrap">
<h2 class="nav-tab-wrapper">
<a href="?page=global-hide-admin-tool-bar-plugin" class="nav-tab <?php echo $active_tab == 'wp_optimize_settings' ? 'nav-tab-active' : ''; ?>"><?php _e( 'Settings', 'global-hide-remove-toolbar-plugin' ) ?></a>
<?php _e( 'Global Hide Admin Tool Bar', 'global-hide-remove-toolbar-plugin' );

        if ( defined( 'GHATB_VERSION' ) )

			{

				echo ' - ' . GHATB_VERSION ;

			}

?>
</h2>
<form method="post" action="options.php">
<?php settings_fields( 'global-admin-bar-group' ); ?>
<table class="form-table">
<tr valign="top">
<td style="text-align:left;vertical-align:top" colspan="2">
<?php _e( 'This plugin is designed to turn off the <strong>FRONT END</strong> Toolbar that is displayed for logged in users in WordPress 3.1+ or later.', 'global-hide-remove-toolbar-plugin' );?>
</td>
</tr>
<tr valign="top">
<td style="text-align:right;vertical-align:top;width:25px">
<input type="checkbox" name="global-admin-bar-plugin-setting" value="1"
<?php

	if ( get_option( 'global-admin-bar-plugin-setting' ) == '1' )

		{

			echo 'checked="checked"';

		}

?>/>
</td>
<td style="text-align:left;vertical-align:top;line-height:14px">
<strong>
<?php _e( 'Hide Toolbar on Front End for Logged In Users', 'global-hide-remove-toolbar-plugin' ); ?>
</strong>
</td>
</tr>
<tr valign="top">
<td style="text-align:right;vertical-align:top;width:25px">&nbsp;</td>
<td style="text-align:left; vertical-align: top;line-height:14px">
<div style="margin:-10px 0 8px 15px;font-style:italic">
<?php _e( 'Hide only for the following roles:', 'global-hide-remove-toolbar-plugin' ); ?>
<br><br>
</div>
<?php

	$uroles = get_usable_roles();

	echo implode( "\n", $uroles );

?>
</td>
</tr>
<tr valign="top">
<td style="text-align:right;vertical-align:top;width:25px">
<input type="checkbox" name="global-admin-bar-plugin-user-setting" value="1"
<?php

	if ( get_option( 'global-admin-bar-plugin-user-setting' ) == '1' )

		{

			echo 'checked="checked"';

		}

?>/>
</td>
<td style="text-align:left;vertical-align:top;line-height:14px">
<strong>
<?php _e( 'Hide "Show Toolbar when viewing site" on <a href="' . admin_url( 'profile.php' ) . '">Your Profile</a> user page - <strong>(Beta Testing Option Not for Production Sites)</strong>', 'global-hide-remove-toolbar-plugin' ); ?>
</strong>
</td>
</tr>
<tr valign="top">
<td style="text-align:right;vertical-align:top;width:25px">&nbsp;</td>
<td style="text-align:left;vertical-align:top;line-height:14px">
<div style="margin:-10px 0 8px 15px;font-style:italic">
<?php _e( 'Hide only for the following roles:', 'global-hide-remove-toolbar-plugin' ); ?>
<br><br>
</div>
<?php

	$uroles = get_usable_roles( 'profiles' );

	echo implode( "\n", $uroles );

?>
</td>
</tr>
<tr valign="top">
<td style="text-align:left;vertical-align:top" colspan="2">
<?php _e( '<strong>REMEMBER THAT</strong>: it may become obsolete if Core Team ever decides to add their own global option, <a title="WordPress features are being developed plugins first" href="//make.wordpress.org/core/features-as-plugins/">features are being developed plugins first</a>, but for now it is very helpful to have a way to turn it off or on since WordPress 3.3+ or later.', 'global-hide-remove-toolbar-plugin' ); ?>
</td>
</tr>
</table>
<p class="submit"><input type="submit" class="button-primary" value="<?php _e( 'Save Changes', 'global-hide-remove-toolbar-plugin' ); ?>"/></p>
</form>
</div>
<?php

		}

?>