<?php
	
	class AKVO_POST_TYPE{
		
		var $meta_fields;
		var $taxonomies;
		var $post_types;
		
		function __construct(){
			add_action( 'init', array( $this, 'create') );
			
			/* SET POST THUMBNAIL SIZES */
			add_theme_support( 'post-thumbnails' );
			set_post_thumbnail_size( 240, 135, true );
			/* SET POST THUMBNAIL SIZES */
			
			
			/* META BOXES */
			add_action( 'admin_init', function(){
				
				/* META BOX FOR STAFF */
				add_meta_box( 'new_staff_meta_box', 'New Staff Details', array( $this, 'meta_box' ), 'new_staffs', 'normal', 'high');
			} );

			$this->meta_fields = array(
				'new_staffs'	=> array(
					//'staff_name' 		=> 'Full Name', 
					'staff_title'		=> 'Job Title', 
					'staff_twitter'		=> 'Twitter Link',
					'staff_linkedin'	=> 'LinkedIn Link',
					'staff_blog'		=> 'Blog Link'
				)
			);
			
			/* SAVE POST - FOR SAVING META FIELDS */
			add_action( 'save_post', array( $this, 'save_meta_fields' ), 10, 2 );
			
			/* POST TYPES */
			$this->post_types = array(
				/* FUNNEL ELEMENTS */
				'funnel'	=> array(						
					'name'			=> 'Funnels',
					'singular_name'	=> 'Funnel',
					'menu_icon' 	=> 'dashicons-format-aside',
					'has_archive' 	=> false,
					'supports'		=> array( 'title', 'author' )
				),
				/* STAFF */
				'new_staffs'	=> array(
					'name' 			=> 'Akvo staff',
					'singular_name' => 'Akvo staff',
					'supports' 		=> array( 'title', 'thumbnail', 'revisions'),
					'menu_icon' 	=> get_bloginfo('template_url').'/images/akvoStaff_icn.png',
					'has_archive' 	=> true	
				),
				/* PARTNERS */
				'new_partners'	=> array(
					'name' 			=> 'Akvo Partner',
					'singular_name' => 'Akvo Partner',
					'supports' 		=> array( 'title', 'thumbnail', 'revisions'),
					'menu_icon' 	=> get_bloginfo('template_url').'/images/akvoPartner_icn.png',
					'has_archive' 	=> true	
				)
			);
			
			/* TAXONOMIES */
			$this->taxonomies = array(
				'new_staffs_team'	=> array(
					'post_type'	=> 'new_staffs',
					'labels'	=> array(
						'name' 			=> 'Staff team',
						'add_new_item' 	=> 'New Akvo team',
						'new_item_name' => 'New Akvo team'
					)
				),
				'staff_hub'		=> array(
					'post_type'	=> array( 'new_staffs', 'new_partners' ),
					'labels'	=> array(
						'name' 			=> 'Staff hub',
						'add_new_item' 	=> 'Add new staff hub',
						'new_item_name' => 'New staff hub'
					)
				),
				'new_partners_category'	=> array(
					'post_type'	=> 'new_partners',
					'labels'	=> array(
						'name' 			=> 'Akvo partner category',
						'add_new_item' 	=> 'Add new Akvo category',
						'new_item_name' => "New Akvo category"
					)
				),
			);
		}
		
		function create(){
			
			/* registering post types */
			foreach( $this->post_types as $slug => $post_type ){
				register_post_type( $slug,
					array(
						'labels' => array(
							'name' 			=> $post_type['name'],
							'singular_name' => $post_type['singular_name'],
							'add_new'	 	=> 'Add New Item',
							'add_new_item' 	=> 'Add New Item',
							'edit' 			=> 'Edit',
							'edit_item' 	=> 'Edit',
							'new_item' 		=> 'New',
							'view' 			=> 'View',
							'view_item' 	=> 'View',
						),
						'public' 		=> true,
						'supports' 		=> $post_type['supports'],
						'menu_icon' 	=> $post_type['menu_icon'],
						'has_archive' 	=> $post_type['has_archive']
					)
				);
			}
			
			/* registering taxonomies */
			foreach( $this->taxonomies as $slug => $tax ){
				register_taxonomy(
					$slug,
					$tax['post_type'],
					array(
						'labels' 		=> $tax['labels'],
						'show_ui' 		=> true,
						'show_tagcloud' => false,
						'hierarchical' 	=> true,
						'query_var' 	=> true,
						'rewrite' 		=> array('slug' => $slug )
					)
				);
			}
			
			
			
		}
		
		/* META BOXES */
		function meta_box( $post ) {
			$fields = $this->meta_fields[ $post->post_type ];
			_e('<table>');
			foreach( $fields as $slug => $field ): $value = esc_html( get_post_meta( $post->ID, $slug, true ) );?>
			<tr>
				<td style="width: 100%"><?php _e( $field );?></td>
				<td><input type="text" size="80" name="<?php _e( $slug );?>" value="<?php _e( $value ); ?>" /></td>
			</tr>
		<?php endforeach;
			_e('</table>');
		}
		
		/* SAVE META BOXES */
		function save_meta_fields( $post_id, $post ){
			
			if ( isset( $this->meta_fields[ $post->post_type ] ) ) {					/* CHECK FIELDS FOR POST TYPE */
				
				$fields = $this->meta_fields[ $post->post_type ];
				
				foreach( $fields as $slug => $field ){									/* ITERATE THROUGH THE FIELDS */
					
					if ( isset( $_POST[ $slug ] ) && $_POST[ $slug ] != '' ) {
						update_post_meta( $post_id, $slug, $_POST[ $slug ] );			/* Store data in post meta table if present in post data */
					}
				}	
			}
			
		}
		
	}
	
	global $akvo_post_type;
	$akvo_post_type = new AKVO_POST_TYPE;