<?php	
	class AKVO_SHORTCODE_CUSTOM_POSTS extends AKVO_SHORTCODE{
		
		function __construct(){
			
			$this->shortcode 	= 'akvo_custom_posts';
			$this->template 	= 'custom_posts.php';
			
			parent::__construct();	
			
		}
		
		function unique_atts(){
			return array('post_type', 'showposts');
		}
		
		function get_default_atts(){
			return array( 
				'post_type'			=> 'new_staffs', 
				'filters' 			=> '', 
				'showposts'			=> 100,
				//'cache'				=> '4'
			);
		}
		
		/* GET POST TERMS FROM SELECTED TAXONOMIES */
		function get_the_terms( $filters, $post_id ){
			
			
			$terms = array();
			foreach( $filters as $tax ){
				if( $tax ){
					$post_terms = get_the_terms( $post_id, $tax );
					if( is_array( $post_terms ) ){
						foreach( $post_terms as $post_term ){
							$terms[ $tax ] = $post_term->term_id;
						}
					}
				}
			}
				
			return $terms;
		}
		
		
		
	}
	
	new AKVO_SHORTCODE_CUSTOM_POSTS;