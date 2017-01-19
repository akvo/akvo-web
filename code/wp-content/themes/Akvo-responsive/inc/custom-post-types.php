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
					'custom-fields'
      			),
    		)
  		);
  		
  		akvo_create_taxonomy('region', 'Regions', 'Region');
  		akvo_create_taxonomy('sector', 'Sectors', 'Sector');
		akvo_create_taxonomy('product', 'Products', 'Product');
		
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
	
	
	
	function casestudy_add_meta_box() {
		//this will add the metabox for the member post type
		$screens = array( 'case-study' );

		foreach ( $screens as $screen ) {
			add_meta_box('casestudy_meta_box',__( 'Project Information', 'member_textdomain' ), 'casestudy_meta_box_callback', $screen);
		}
	}
	add_action( 'add_meta_boxes', 'casestudy_add_meta_box' );
	
	
	
	/**
	 * Prints the box content.
	 *
	 * @param WP_Post $post The object for the current post/page.
	 */
	function casestudy_meta_box_callback( $post ) {

		// Add a nonce field so we can check for it later.
		wp_nonce_field( 'casestudy_save_meta_box_data', 'casestudy_meta_box_nonce' );
		
		$fields_arr = array('partner-name' => 'Partner');

		foreach($fields_arr as $key => $label):?>
			<input type="text" name="<?php _e($key);?>" placeholder="<?php _e($label);?>" style="width:100%;" value="<?php _e(get_post_meta( $post->ID, $key, true ));?>">
		<?php endforeach;
		
	}

	/**
	 * When the post is saved, saves our custom data.
	 *
	 * @param int $post_id The ID of the post being saved.
	 */
	 function casestudy_save_meta_box_data( $post_id ) {

		if ( ! isset( $_POST['casestudy_meta_box_nonce'] ) ) {return;}

		if ( ! wp_verify_nonce( $_POST['casestudy_meta_box_nonce'], 'casestudy_save_meta_box_data' ) ) {return;}

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) { return;}
/*
	 // Check the user's permissions.
	 if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {

		if ( ! current_user_can( 'edit_page', $post_id ) ) {
			return;
		}

	 } else {

		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
	 }

	 if ( ! isset( $_POST['member_new_field'] ) ) {
		return;
	 }
	 
	 */
		$fields_arr = array('partner-name' => 'Partner');
	 
		foreach($fields_arr as $key => $label){
			if(isset($_POST[$key])){
				$my_data = sanitize_text_field( $_POST[$key] );
				update_post_meta( $post_id, $key, $my_data );
			}
		}

	 

	 
	}
	add_action( 'save_post', 'casestudy_save_meta_box_data' );