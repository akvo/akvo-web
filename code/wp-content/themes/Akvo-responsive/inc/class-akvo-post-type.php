<?php
	
	class AKVO_POST_TYPE{
		
		function __construct(){
			add_action( 'init', array( $this, 'create') );
		}
		
		function create(){
			register_post_type( 'funnel',
				array(
					'labels' => array(
						'name' => __( 'Funnels' ),
						'singular_name' => __( 'Funnel' )
					),
				'public' => true,
				'exclude_from_search' => true,
				'show_in_nav_menus' => false,
				'has_archive' => false,
				'menu_position' => 20,
				'menu_icon' => 'dashicons-format-aside',
				'supports' => array(
						'title',
						//'editor',
						'author', 
						//'thumbnail', 
						//'excerpt', 
						//'comments', 
						//'custom-fields'
					),
				)
			);
		}
		
	}
	
	global $akvo_post_type;
	$akvo_post_type = new AKVO_POST_TYPE;