<?php
	
	class AKVO_POST_TYPE{
		
		var $meta_fields;
		
		function __construct(){
			add_action( 'init', array( $this, 'create') );
			
			/* SET POST THUMBNAIL SIZES */
			add_theme_support( 'post-thumbnails' );
			set_post_thumbnail_size( 240, 135, true );
			/* SET POST THUMBNAIL SIZES */
			
			
			/* META BOXES */
			add_action( 'admin_init', function(){
				add_meta_box( 'new_staff_meta_box', 'New Staff Details', array( $this, 'meta_box' ), 'new_staffs', 'normal', 'high');
			} );

			$this->meta_fields = array(
				'new_staffs'	=> array(
					'staff_name' 		=> 'Full Name', 
					'staff_title'		=> 'Job Title', 
					'staff_twitter'		=> 'Twitter Link',
					'staff_linkedin'	=> 'LinkedIn Link',
					'staff_blog'		=> 'Blog Link'
				)
			);
			
			/* SAVE POST - FOR SAVING META FIELDS */
			add_action( 'save_post', array( $this, 'save_meta_fields' ), 10, 2 );
			
		}
		
		function create(){
			
			/* FUNNEL ELEMENTS */
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
						'author', 
					),
				)
			);
			/* FUNNEL ELEMENTS */
			
			/* STAFF */
			register_post_type( 'new_staffs',
				array(
					'labels' => array(
						'name' => 'Akvo staff',
						'singular_name' => 'New staff',
						'add_new' => 'Add a new staff',
						'add_new_item' => 'Add new staff',
						'edit' => 'Edit',
						'edit_item' => 'Edit staff',
						'new_item' => 'New staff',
						'view' => 'View',
						'view_item' => 'View staff',
						'search_items' => 'Search staff',
						'not_found' => 'No staff found',
						'not_found_in_trash' => 'No staff found in Trash',
						'parent' => 'Parent staff'
					),
		 
					'public' => true,
					'menu_position' => 15,
					'supports' => array( 'title', 'thumbnail', 'revisions'),
					'taxonomies' => array( '' ),
					'menu_icon' => get_bloginfo('template_url').'/images/akvoStaff_icn.png',
					'has_archive' => true
				)
			);
			register_taxonomy(
				'new_staffs_team',
				'new_staffs',
				array(
					'labels' => array(
						'name' => 'Akvo staff team',
						'add_new_item' => 'Add new Akvo team',
						'new_item_name' => "New Akvo team"
					),
					'show_ui' => true,
					'show_tagcloud' => false,
					'hierarchical' => true,
					'query_var' => true,
					'rewrite' => array('slug' => 'new_staffs_team' )
				)
			);
			
			register_taxonomy(
				'staff_hub',
				'new_staffs',
				array(
					'labels' => array(
						'name' => 'Staff hub',
						'add_new_item' => 'Add new staff hub',
						'new_item_name' => "New staff hub"
					),
					'show_ui' => true,
					'show_tagcloud' => false,
					'hierarchical' => true,
					'query_var' => true,
					'rewrite' => array('slug' => 'staff_hub' )
				)
			);
			
			/* STAFF */
			
		}
		
		
		function meta_box( $post ) {
			
			$fields = $this->meta_fields[ $post->post_type ];
			
			
			?>
			<table>
				<?php foreach( $fields as $slug => $field ): $value = esc_html( get_post_meta( $post->ID, $slug, true ) );?>
				<tr>
					<td style="width: 100%"><?php _e( $field );?></td>
					<td><input type="text" size="80" name="<?php _e( $slug );?>" value="<?php _e( $value ); ?>" /></td>
				</tr>
				<?php endforeach;?>
			</table>
			<?php
		}
		function save_meta_fields( $post_id, $post ){
			
			// Check post type for new Staffs
			if ( isset( $this->meta_fields[ $post->post_type ] ) ) {
				
				$fields = $this->meta_fields[ $post->post_type ];
				
				foreach( $fields as $slug => $field ){
					// Store data in post meta table if present in post data
					if ( isset( $_POST[ $slug ] ) && $_POST[ $slug ] != '' ) {
						update_post_meta( $post_id, $slug, $_POST[ $slug ] );
					}
				}
			}
			
		}
		
	}
	
	global $akvo_post_type;
	$akvo_post_type = new AKVO_POST_TYPE;