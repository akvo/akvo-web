<?php	
	class AKVO_SHORTCODE_CUSTOM_POSTS extends AKVO_SHORTCODE{
		
		function __construct(){
			
			$this->shortcode 	= 'akvo_custom_posts';
			$this->template 	= 'custom_posts.php';
			
			parent::__construct();	
			
		}
		
		function get_default_atts(){
			return array( 
				'post_type'			=> 'new_staffs', 
				'filters' 			=> '', 
				'showposts'			=> 100	
			);
		}
		
		
		
	}
	
	new AKVO_SHORTCODE_CUSTOM_POSTS;