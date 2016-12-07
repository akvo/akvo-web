<?php
	function akvo_create_post_type() {
		
  		register_post_type( 'case-study',
    		array(
      			'labels' => array(
        			'name' => __( 'Case Studies' ),
        			'singular_name' => __( 'Case Study' )
      			),
      		'public' => true,
      		'has_archive' => true,
      		'menu_position' => 20,
      		'menu_icon' => 'dashicons-format-aside',
      		'supports' => array(
        			'title',
	        		'editor',
    	    		'author', 
        			'thumbnail', 
        			'excerpt', 
        			'comments', 
      			),
    		)
  		);
  		
  		akvo_create_taxonomy('region', 'Regions', 'Region');
  		akvo_create_taxonomy('sector', 'Sectors', 'Sector');
		
  	}
  	add_action('init', 'akvo_create_post_type');
  	
  	function akvo_create_taxonomy($slug, $plural_label, $singular_label){
  		$labels = array(
			'name'                       => _x( $plural_label, 'Taxonomy General Name', 'text_domain' ),
			'singular_name'              => _x( $singular_label, 'Taxonomy Singular Name', 'text_domain' ),
			'menu_name'                  => __( $plural_label, 'text_domain' ),
			'all_items'                  => __( 'All Items', 'text_domain' ),
			'parent_item'                => __( 'Parent Item', 'text_domain' ),
			'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
			'new_item_name'              => __( 'New Item Name', 'text_domain' ),
			'add_new_item'               => __( 'Add New Item', 'text_domain' ),
			'edit_item'                  => __( 'Edit Item', 'text_domain' ),
			'update_item'                => __( 'Update Item', 'text_domain' ),
			'view_item'                  => __( 'View Item', 'text_domain' ),
			'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
			'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
			'popular_items'              => __( 'Popular Items', 'text_domain' ),
			'search_items'               => __( 'Search Items', 'text_domain' ),
			'not_found'                  => __( 'Not Found', 'text_domain' ),
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
		);
		register_taxonomy($slug, array( 'case-study' ), $args );
  	}