<?php
	
	
	add_shortcode( 'akvo_staff', function( $atts ){
		
		/* CREATE ATTS ARRAY FROM DEFAULT AND USER PARAMETERS IN THE SHORTCODE */
		$atts = shortcode_atts( array( 'category' => 'contractors', 'new_staff'	=> true ), $atts, 'akvo_staff' );
		
		ob_start();
		
		global $akvo;
		$akvo->custom_post_type_list( 'new_staffs', 'new_staffs_team', $atts['category'], 'staff', $atts['new_staff'] );
		
		return ob_get_clean();
		
	} );