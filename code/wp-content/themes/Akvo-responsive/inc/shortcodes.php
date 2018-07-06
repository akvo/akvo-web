<?php
	
	$inc_files = array(
		'class-akvo-shortcode.php',					// BASE CLASS FOR SHORTCODE WHICH NEEDS TO BE IMPORTED FIRST
		'class-akvo-shortcode-nested-filters.php',
		'class-akvo-shortcode-custom-posts.php',
	);
	
	foreach( $inc_files as $inc_file ){
		include( 'shortcodes/' . $inc_file );
	}
	
	
	
	
	
	
	add_shortcode( 'akvo_staff', function( $atts ){
		
		/* CREATE ATTS ARRAY FROM DEFAULT AND USER PARAMETERS IN THE SHORTCODE */
		$atts = shortcode_atts( array( 'category' => 'contractors', 'new_staff'	=> true ), $atts, 'akvo_staff' );
		
		ob_start();
		
		global $akvo;
		$akvo->custom_post_type_list( 'new_staffs', 'new_staffs_team', $atts['category'], 'staff', $atts['new_staff'] );
		
		return ob_get_clean();
		
	} );
	
	add_shortcode( 'akvo_partner', function( $atts ){
		
		/* CREATE ATTS ARRAY FROM DEFAULT AND USER PARAMETERS IN THE SHORTCODE */
		$atts = shortcode_atts( array( 'category' => 'governments' ), $atts, 'akvo_partner' );
		
		ob_start();
		
		global $akvo;
		$akvo->custom_post_type_list( 'new_partners', 'new_partners_category', $atts['category'], 'partner', false);
		
		return ob_get_clean();
		
	} );