<?php
/*
Plugin Name: Akvo Hompepage widgets
Plugin URI: http://akvo.org/
Description: Set content for right two boxes on homepage.
Version: 1.0
Author: Eveline Sparreboom
Author URL: http://akvo.org/
*/

require_once('classes/HomepageWidget.php');


function akvohomepage_register_widgets() {
	register_widget( 'AkvoHomepageWidget' );
	
}

add_action( 'widgets_init', 'akvohomepage_register_widgets' );

?>