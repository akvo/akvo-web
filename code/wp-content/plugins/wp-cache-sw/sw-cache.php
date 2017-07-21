<?php
   /*
   Plugin Name: WP SW Offline Cache
   Plugin URI: 
   Description: A plugin to enhance offline capabilities using a service worker
   Version: 1.0
   Author: Mr. Samuel Thomas
   Author URI: 
   License: GPL2
   */


	
	$sw_cache_setting = new sw_cache_setting;

	class sw_cache_setting{
    	
    	function __construct( ) {
        	
        	add_filter( 'admin_init' , array( &$this , 'register_fields' ) );
        	
        	add_action('wp_footer', array( &$this, 'enqueue_script' ) );
    	
    	}
    	
    	function register_fields() {
        	
        	register_setting( 'general', 'wp_sw_cache', 'esc_attr' );
        	
        	add_settings_field('fav_color', '<label for="wp_sw_cache">'.__('Enable WP SW Cache' , 'wp_sw_cache' ).'</label>' , array(&$this, 'fields_html') , 'general' );
    
    	}
    	
    	function is_cache_enabled(){
    		
    		$value = get_option( 'wp_sw_cache', '' );
    		
    		if( $value == 1 ){
    			
    			return true; 
    		
    		}
    		
    		return false;
    		
    	}
    	
    	function fields_html() {
        	
			$checked = '';
        	
        	if( $this->is_cache_enabled() ){
        		
        		$checked = 'checked=checked';
        		
        	}
        	
        	
        	echo '<input type="checkbox" id="wp_sw_cache" name="wp_sw_cache" value="1" '.$checked.' />';
    	
    	}
    	
    	function get_js_url(){
    		
    		return plugins_url('wp-cache-sw/js/');
    		
    	}
    	
    	function enqueue_script(){
    		
			$js_url = $this->get_js_url();
    		
    		wp_enqueue_script('sw-cache', $js_url . 'main.js', array('jquery'), '3.3.9');
    		
    		$sw_url = $js_url . 'sdk.js?v=6';
		
			$url = site_url('service-worker.js') . "?file=" . $sw_url;
    		
			
    		wp_localize_script('sw-cache', 'wp_sw_cache_settings', array( 
			
				'sw_js_url'	=> $url,
			
				'sw_enable'	=> $this->is_cache_enabled()
			
			));
			
    		
    	}
	
	}
	
	
	