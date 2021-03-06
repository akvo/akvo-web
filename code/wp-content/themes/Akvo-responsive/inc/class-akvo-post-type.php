<?php
	
	class AKVO_POST_TYPE{
		
		var $meta_boxes;
		var $taxonomies;
		var $post_types;
		
		function __construct(){
			
			add_action( 'init', array( $this, 'create') );			// REGISTERING POST TYPES AND TAXONOMIES
			
			add_theme_support( 'post-thumbnails' );					// ADD THEME SUPPORT FOR THUMBNAILS
			set_post_thumbnail_size( 240, 135, true );				// SET POST THUMBNAIL SIZES 
			
			/* change permalinks */
			add_filter('post_type_link', function( $permalink, $post_id, $leavename ){
				
				$post = get_post( $post_id );
				
				if( $post->post_type == 'microstory' ){
					
					$rewritecode = array(
						$leavename? '' : '%postname%',
						'%post_id%',
						'%category%',
						$leavename? '' : '%pagename%',
					);
					
					$category = "akvo-hub";
					$hubs = get_the_terms( $post, 'staff_hub' );
					if( is_array( $hubs ) ){
						$category = $hubs[0]->slug;
					}
					
					$rewritereplace = array(
						$post->post_name,
						$post->ID,
						$category,
						$post->post_name,
					);
					
					$permalink = str_replace($rewritecode, $rewritereplace, $permalink);
					
					//print_r( $permalink );
					
					//$permalink = 'hello1';
				}
				
				return $permalink;
			}, 10, 3);   
			
			$this->meta_boxes = array(
				'new_staffs'	=> array(
					'title'		=> 'New Staff Details',
					'fields'	=> array(
						'staff_title'		=> 'Job Title', 
						'staff_twitter'		=> 'Twitter Link',
						'staff_linkedin'	=> 'LinkedIn Link',
						'staff_blog'		=> 'Blog Link'
					)
				),
				'new_partners'	=> array(
					'title'		=> 'Partner Details',
					'fields'	=> array(
						'partners_link'		=> 'Link to a microstory or a partners page'
					)
				),
				'page'			=> array(
					'title'		=> 'Page Settings',
					'fields'	=> array(
						'hubs_headline'		=> 'Hubs Headline'
					)
				),
				'microstory'	=> array(
					'title'		=> 'Settings',
					'fields'	=> array(
						'featured'	=> 'Featured'
					)
				),
				'foundation_member'	=> array(
					'title'		=> 'Settings',
					'fields'	=> array(
						'member_title'	=> 'Job Title',
						'staff_twitter'		=> 'Twitter Link',
						'staff_linkedin'	=> 'LinkedIn Link',
						'staff_blog'		=> 'Blog Link'
					)
				),
			);
			
			add_filter( 'custom_posts_microstory_class', function( $class ){
				
				global $post;
				
				$featured = get_post_meta( $post->ID, 'featured', true );
				
				if( $featured && $featured == '1' ){
					$class = 'featured';
				}
				
				return $class;
			} );
			
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
					'name' 			=> 'Akvo Staff',
					'singular_name' => 'Akvo Staff',
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
				),
				/* MICROSTORY */
				'microstory'	=> array(
					'name' 			=> 'Akvo Microstories',
					'singular_name' => 'Akvo Microstory',
					'supports' 		=> array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions' ),
					//'menu_icon' 	=> get_bloginfo('template_url').'/images/akvoPartner_icn.png',
					'rewrite'		=> false,
					'has_archive' 	=> true	
				),
				/* FOUNDATION MEMBERS */
				'foundation_member'	=> array(
					'name' 			=> 'Akvo Foundation Members',
					'singular_name' => 'Akvo Foundation Member',
					'supports' 		=> array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions' ),
					'menu_icon' 	=> get_bloginfo('template_url').'/images/akvoStaff_icn.png',
					'has_archive' 	=> true	
				)
			);
			
			/* TAXONOMIES */
			$this->taxonomies = array(
				'new_staffs_team'	=> array(
					'post_type'	=> 'new_staffs',
					'labels'	=> array(
						'name' 			=> 'Staff Team',
						'add_new_item' 	=> 'New Akvo team',
						'new_item_name' => 'New Akvo team'
					)
				),
				'staff_hub'		=> array(
					'post_type'	=> array( 'new_staffs', 'new_partners', 'microstory' ),
					'labels'	=> array(
						'name' 			=> 'Staff Hub',
						'add_new_item' 	=> 'Add New Hub',
						'new_item_name' => 'New Hub'
					)
				),
				'new_partners_category'	=> array(
					'post_type'	=> 'new_partners',
					'labels'	=> array(
						'name' 			=> 'Akvo Partner Category',
						'add_new_item' 	=> 'New Akvo Category',
						'new_item_name' => "New Akvo Category"
					)
				),
				'akvo_sector' 	=> array(
					'post_type'	=> array( 'microstory' ),
					'labels'	=> array(
						'name' 			=> 'Akvo Sector',
						'add_new_item' 	=> 'New Akvo Sector',
						'new_item_name' => "New Akvo Sector"
					)
				),
				'new_foundation_team' 	=> array(
					'post_type'	=> array( 'foundation_member' ),
					'labels'	=> array(
						'name' 			=> 'Akvo Foundation Group',
						'add_new_item' 	=> 'New Akvo Foundation Group',
						'new_item_name' => "New Akvo Foundation Group"
					)
				),
				'foundation_type' 	=> array(
					'post_type'	=> array( 'foundation_member' ),
					'labels'	=> array(
						'name' 			=> 'Akvo Foundation Type',
						'add_new_item' 	=> 'New Akvo Foundation Type',
						'new_item_name' => "New Akvo Foundation Type"
					)
				),
			);
		}
		
		function create(){
			
			/* rewrite urls for microstory links */
			global $wp_rewrite;
			$microstory_structure = '/stories/%category%/%microstory%/';
			$wp_rewrite->add_rewrite_tag( "%microstory%", '([^/]+)', "microstory=" );
			$wp_rewrite->add_permastruct( 'microstory', $microstory_structure, false );
			
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
						'has_archive' 	=> $post_type['has_archive'],
						'rewrite' 		=> isset( $post_type['rewrite'] ) ? $post_type['rewrite'] : array( 'slug' => $slug, 'with_front'=> false, 'feed' => true, 'pages' => true )
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
			
			/* META BOXES */
			add_action( 'admin_init', function(){
				
				foreach( $this->meta_boxes as $post_type => $metabox ){
					$this->add_meta_box( $post_type, $metabox[ 'title' ] );
				}
			} );
			
			
		}
		
		/* ADD META BOX */
		function add_meta_box( $post_type, $title ){
			add_meta_box( $post_type.'_meta_box', $title, array( $this, 'meta_box' ), $post_type, 'normal', 'high');
		}
		
		/* META BOXES */
		function meta_box( $post ) {
			$fields = $this->meta_boxes[ $post->post_type ]['fields'];
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
			
			if ( isset( $this->meta_boxes[ $post->post_type ] ) && isset( $this->meta_boxes[ $post->post_type ]['fields'] ) ) {	/* CHECK FIELDS FOR POST TYPE */
				
				$fields = $this->meta_boxes[ $post->post_type ]['fields'];
				
				foreach( $fields as $slug => $field ){									/* ITERATE THROUGH THE FIELDS */
					
					if ( isset( $_POST[ $slug ] ) ) {
						update_post_meta( $post_id, $slug, $_POST[ $slug ] );			/* Store data in post meta table if present in post data */
					}
				}	
			}
			
		}
		
	}
	
	global $akvo_post_type;
	$akvo_post_type = new AKVO_POST_TYPE;