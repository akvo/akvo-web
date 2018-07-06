<?php
	
	/* BASE CLASS FOR SHORTCODE */
	class AKVO_SHORTCODE{
		
		var $shortcode;
		var $template;
		
		function __construct(){
			add_shortcode( $this->shortcode, array( $this, 'plain_shortcode' ), 100 );
		}
		
		
		
		function get_atts( $atts ){
			$defaults_atts = apply_filters( $this->shortcode.'_atts', $this->get_default_atts() );
			return shortcode_atts( $defaults_atts, $atts, $this->shortcode );
		}
		
		function get_default_atts(){
			return array();
		}
		
		function plain_shortcode( $atts ){
			
			$atts = $this->get_atts( $atts );				/* CREATE ATTS ARRAY FROM DEFAULT AND USER PARAMETERS IN THE SHORTCODE */
			
			ob_start();
			
			include( 'templates/'. $this->template );
			
			return ob_get_clean();
		}
		
	}