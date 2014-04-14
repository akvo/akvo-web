<?php
/*
Plugin Name: Global Hide/Remove ToolBar: 2. BRUTE FORCE Remover
Plugin URI: http://fischercreativemedia.com/wordpress-plugins/global-hide-admin-bar-plugin/
Description: Use this plugin to remove <strong>ALL</strong> toolbars, including Admin. Recommended you use the <strong>Global Hide/Remove ToolBar: 1. Front End Toolbar Remover</strong> unless you REALLY need the Admin toolbar removed - DO NOT USE BOTH.
Version: 1.6
Author: Don Fischer, sLa NGjI's
Author URI: http://www.fischercreativemedia.com/
Donate link: http://www.fischercreativemedia.com/wordpress-plugins/donate/
Requires at least: 3.1
Tested up to: 3.8.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the [GNU General Public License](http://wordpress.org/about/gpl/)
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * on an "AS IS", but WITHOUT ANY WARRANTY; without even the implied
 * warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 * See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, see [GNU General Public Licenses](http://www.gnu.org/licenses/),
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
 * The license for this software can be found on [Free Software Foundation](http://www.gnu.org/licenses/gpl-2.0.html) and as license.txt into this plugin package.
 *
 * The author of this plugin is available at any time, to make all changes, or corrections, to respect these specifications.
 *
 * THERMS
 *
 * This global-brute-force-wordpress-toolbar-removal.php uses (or it parts) code derived from:
 *
 * wp-admin-bar-removal.php by slangjis <slangjis [at] googlemail [dot] com>
 * Copyright (C) 2010-2014 [slangjis](http://slangji.wordpress.com/) (email: <slangjis [at] googlemail [dot] com>)
 *
 * wp-admin-bar-removal-node-addon.php by slangjis <slangjis [at] googlemail [dot] com>
 * Copyright (C) 2010-2013 [slangjis](http://slangji.wordpress.com/) (email: <slangjis [at] googlemail [dot] com>)
 *
 * one-click-logout-barless.php by olyma <olyma [at] rack of power [dot] com>)
 * Copyright (C) 2011-2012 [olyma](http://rackofpower.com/) (email: <olyma [at] rack of power [dot] com>)
 *
 * toolbar-removal-completely-disable.php by slangjis <slangjis [at] googlemail [dot] com>
 * Copyright (C) 2011-2013 [slangjis](http://slangji.wordpress.com/) (email: <slangjis [at] googlemail [dot] com>)
 *
 * wp-toolbar-removal.php by slangjis <slangjis [at] googlemail [dot] com>
 * Copyright (C) 2012-2014 [slangjis](http://slangji.wordpress.com/) (email: <slangjis [at] googlemail [dot] com>)
 *
 * wp-toolbar-removal-node-addon.php by slangjis <slangjis [at] googlemail [dot] com>
 * Copyright (C) 2012-2013 [slangjis](http://slangji.wordpress.com/) (email: <slangjis [at] googlemail [dot] com>)
 *
 * according to the terms of the GNU General Public License version 2 (or later) this uses or it parts code was derived.
 *
 * According to the Terms of the GNU General Public License version 2 (or later) part of Copyright belongs to your own author and part belongs to their respective others authors:
 *
 * Copyright (C) 2008-2014 [slangjis](http://slangji.wordpress.com/) (email: <slangjis [at] googlemail [dot] com>)
 * Copyright (C) 2011-2012 [olyma](http://rackofpower.com/) (email: <olyma [at] rack of power [dot] com>)
 *
 * VIOLATIONS
 *
 * [Violations of the GNU Licenses](http://www.gnu.org/licenses/gpl-violation.en.html)
 * The author of this plugin is available at any time, to make all changes, or corrections, to respect these specifications.
 */

	global $wp_version;
	if ( !defined('ABSPATH')){die(__('not allowed'));}
	if ( $wp_version < 3.1 ){wp_die( __( 'This Plugin Requires WordPress 3.1 or higher: Could Not Install!' ) );}
	if ( $wp_version >= 3.2 ){add_action( 'admin_head', 'bftoolbar_admin_back_menu_remove' );}
	add_action( 'network_admin_notices', 'appip_warning_notice');
	add_action( 'admin_notices', 'bftoolbar_warning_notice');
	add_action( 'admin_print_styles', 'bftoolbar_admin_styles', 21 );
	add_filter( 'plugin_row_meta', 'bftoolbar_filter_plugin_links', 10, 2);
	add_action( 'plugin_action_links_' . plugin_basename(__FILE__), 'bftoolbar_filter_plugin_actions');
	function bftoolbar_warning_notice(){if(is_plugin_active( 'global-admin-bar-hide-or-remove/global-admin-bar-hide-or-remove.php' )){echo '<div class="error"><h2><strong>'.__('Important Global Hide/Remove WordPress ToolBar WARNING!').'</strong></h2><p>'.__('Please note: You cannot use <strong style="color:#880000;">Global Hide/Remove WordPress ToolBar: Front End Remover</strong> AND <strong style="color:#880000;">Global Hide/Remove WordPress ToolBar: BRUTE FORCE Remover</strong> plugins at the same time. Please deactivate one of them.').'</p></div>';}}
	function bftoolbar_admin_back_menu_remove(){echo '<style type="text/css">#adminmenushadow,#adminmenuback{background-image:none}</style>';}
	function bftoolbar_admin_styles(){echo '<style type="text/css">#wp-bftoolbar-bar-menu-toggle {color: #fff;font-size: 26px;text-align: center;line-height: 29px;display:none;cursor: pointer;width: 30px;height: 27px;float: left;margin-right: 8px;background: #222;margin-top: 3px;}html.wp-toolbar,html.wp-toolbar #wpcontent,html.wp-toolbar #adminmenu,html.wp-toolbar #wpadminbar,body.admin-bar,body.admin-bar #wpcontent,body.admin-bar #adminmenu,body.admin-bar #wpadminbar{padding-top:0px !important}</style>';}
	function bftoolbar_filter_plugin_actions($links){$new_links = array();$new_links[] = '<a href="http://www.fischercreativemedia.com/wordpress-plugins/donate/">Donate</a>';return array_merge($links,$new_links );}
	function bftoolbar_filter_plugin_links($links, $file){if ( $file == plugin_basename(__FILE__) ){$links[] = '<a target="_blank" href="http://www.fischercreativemedia.com/wordpress-plugins/global-hide-admin-bar-plugin/">FAQs</a>';$links[] = '<a target="_blank" href="http://www.fischercreativemedia.com/wordpress-plugins/donate/">Donate</a>';}return $links;}
	function bftoolbar_new_toolbar(){
		wp_get_current_user();
		global $wp_version;
		$current_user = wp_get_current_user();
		if ( !( $current_user instanceof WP_User ) ){return;}
		$date_format = get_option( 'date_format' );
		$time_format = get_option( 'time_format' );
		$formatteddate = date($date_format . ' ' . $time_format, current_time( 'timestamp' ));
		$logout_link = '<a href="'.wp_logout_url( home_url() ).'">'.__( 'Log Out' ).'</a>';
		$admin_link = is_multisite() && is_super_admin() ? (!is_network_admin() ? ' | <a href="'.network_admin_url().'">'.__( 'Network Admin' ).'</a>' : ' | <a href="'.get_DashBoard_url( get_current_user_id() ).'">'.__( 'Site Admin' ).'</a>') : '';
		$displayname = $current_user->display_name;
		$toggle = 	($wp_version >= 3.8) ? '<div id="wp-bftoolbar-bar-menu-toggle" class="dashicons dashicons-menu"></div>' : '';
		$homelink = '<a href="'.home_url().'">'.__( get_bloginfo() ).'</a>';
		echo '
		<style type="text/css">
			@media screen and (max-width: 782px){
				#wp-bftoolbar-bar-menu-toggle {display:block;}
				.wp-responsive-open #bftoobar {right: -190px;}
				.wp-responsive-open #bftoobar #bftoobar_ttl{width:auto;padding-right:2%;}
				.wp-responsive-open #bftoobar #bftoobar_lgt{width:auto;}
			}
			#bftoobar {position: relative;z-index: 10;border-bottom:1px solid #e1e1e1;height: 33px;line-height: 33px;}
			#bftoobar #bftoobar_ttl a:link,
			#bftoobar #bftoobar_ttl a:visited{text-decoration:none}
			#bftoobar #bftoobar_lgt,
			#bftoobar #bftoobar_lgt a{text-decoration:none}
			#bftoobar #bftoobar_ttl{width:33%;float:left;text-align:left;}
			#bftoobar #bftoobar_lgt{width:65%;float:left;text-align:right;padding-right: 2%;}
		</style>
		<div id="bftoobar">
			<div id="bftoobar_ttl">'.$toggle.$homelink.'</div>
			<div id="bftoobar_lgt">'.$formatteddate.' | '.$displayname.$admin_link.' | '.$logout_link.'</div>
		</div>';
		if($wp_version >= 3.8){
			echo '<script>jQuery(document).ready( function(){var $wpwrap = jQuery( "#wpwrap" );jQuery( "#wp-bftoolbar-bar-menu-toggle" ).on( "click", function( event ) {console.log("clicked");event.preventDefault();$wpwrap.toggleClass( "wp-responsive-open" );} );});</script>';
		}
	}

	if ( $wp_version >= 3.3 ){add_action( 'in_admin_header', 'bftoolbar_new_toolbar' );add_filter( 'show_wp_pointer_admin_bar', '__return_false' );}
	function wp_toolbar_init(){add_filter( 'show_admin_bar', '__return_false' );add_filter( 'wp_admin_bar_class', '__return_false' );}
	add_filter( 'init', 'wp_toolbar_init', 9 );

	function bftoolbar_remove_profile_option(){echo '<style type="text/css">.show-admin-bar{display:none}</style>';}
	add_action( 'admin_print_styles-profile.php', 'bftoolbar_remove_profile_option' );

	$wp_scripts = new WP_Scripts();
	wp_deregister_script( 'admin-bar' );

	$wp_styles = new WP_Styles();
	wp_deregister_style( 'admin-bar' );

	$hooks_filters = array(
			'init' 						=> array(array( 'wp_admin_bar_init', '')),
			'admin_footer' 				=> array(array( 'wp_admin_bar', ''),array('wp_admin_bar_class', ''),array('wp_admin_bar_render', '1000'),array('wp_admin_bar_js', ''),array('wp_admin_bar_dev_js', '')),
			'admin_head' 				=> array(array( 'wp_admin_bar', ''),array('wp_admin_bar_class', ''),array( 'wp_admin_bar_css', ''),array( 'wp_admin_bar_dev_css', ''),array( 'wp_admin_bar_rtl_css', ''),array( 'wp_admin_bar_rtl_dev_css', ''),array( 'wp_admin_bar_render', 1000)),
			'locale' 					=> array(array( 'wp_admin_bar_lang', '')),
			'wp_head' 					=> array(array( 'wp_admin_bar', ''),array( 'wp_admin_bar_class', ''),array( 'wp_admin_bar_css', ''),array( 'wp_admin_bar_dev_css', ''),array( 'wp_admin_bar_rtl_css', ''),array( 'wp_admin_bar_rtl_dev_css', ''),array( 'wp_admin_bar_render', 1000)),
			'wp_footer' 				=> array(array( 'wp_admin_bar', ''),array( 'wp_admin_bar_class', ''),array( 'wp_admin_bar_render', 1000),array( 'wp_admin_bar_js', ''),array( 'wp_admin_bar_dev_js', '')),
			'wp_ajax_adminbar_render' 	=> array(array( 'wp_admin_bar_ajax_render', 1000)),
		);
	
	foreach($hooks_filters as $hookkey => $hookval){foreach($hookval as $hook){remove_action( $hook[0], $hook[1] );remove_filter( $hook[0], $hook[1] );}}