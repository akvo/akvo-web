<?php
	
	/* BASE CLASS FOR SHORTCODE */
	class AKVO_SHORTCODE{
		
		var $shortcode;
		var $template;
		
		function __construct(){
			add_shortcode( $this->shortcode, array( $this, 'main_shortcode' ), 100 );
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
		
		function unique_atts(){
			return array();
		}
		
		function get_cache_key( $atts ){
			$atts = $this->get_atts( $atts );
			
			$cache_key = $this->shortcode;
			
			$unique_atts = $this->unique_atts();
			
			foreach( $unique_atts as $unique_att ){
				$cache_key .= $atts[$unique_att];	
			}
			
			return $cache_key;
		}
		
		function get_cache( $atts ){
			$cache_key = $this->get_cache_key( $atts );
			
			// try to get value from Wordpress cache
			return get_transient( $cache_key );
		}
		
		function set_cache( $data, $atts ){
			$cache_key = $this->get_cache_key( $atts );
			// store value in cache for hours
			set_transient( $cache_key, $data, 3600 * $atts['cache'] ); 
		}
		
		function main_shortcode( $atts ){
			
			$atts = $this->get_atts( $atts );
			
			$data = false;
			
			/* CHECK IF THE DATA EXISTS IN CACHE */
			if( isset( $atts['cache'] ) && $atts['cache'] && is_numeric( $atts['cache'] ) ){
				$data = $this->get_cache( $atts ); 
			}
			
			// if no value in the cache
			if ( $data === false ) {
				
				$data = $this->plain_shortcode( $atts );
				
				if( isset( $atts['cache'] ) && $atts['cache'] ){
					$this->set_cache( $data, $atts );
				}
			}
			
			return $data;
			
		}
		
	}