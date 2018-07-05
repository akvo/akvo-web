<?php

	class AKVO{
		
		function __construct(){
			
			/* REMOVE UNNECESSARY CODE */
			remove_action('wp_head', 'rest_output_link_wp_head', 10);				// Disable REST API link tag
			remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);			// Disable oEmbed Discovery Links
			remove_action('template_redirect', 'rest_output_link_header', 11, 0);	// Disable REST API link in HTTP headers
			remove_action( 'wp_head', 'print_emoji_detection_script', 7 );			// Disable wp emoji
			remove_action( 'wp_print_styles', 'print_emoji_styles' );
			add_filter('show_admin_bar', '__return_false');							// REMOVE THE ADMIN BAR FROM THE FRONT END
			/* REMOVE UNNECESSARY CODE */
			
			/* SHOW ALL PAGES IN THE PARENT DROPDOWN INCLUDING DRAFTS, PRIVATE ETC */
			add_filter( 'page_attributes_dropdown_pages_args', array( $this, 'page_slug_show_all_parents' ) );
			add_filter( 'quick_edit_dropdown_pages_args', array( $this, 'page_slug_show_all_parents' ) );
			/* SHOW ALL PAGES IN THE PARENT DROPDOWN INCLUDING DRAFTS, PRIVATE ETC */
			
			/* SCRIPTS AND STYLES */
			add_action( 'wp_enqueue_scripts', array( $this, 'assets' ) );
			
			/* LIMITS THE NUMBER OF WORDS WHEN USING THE EXCERPT FUNCTION */
			add_filter( 'excerpt_length', function( $length ){ return 20; }, 999 );
			
		}
		
		/* SHOW ALL PAGES IN THE PARENT DROPDOWN INCLUDING DRAFTS, PRIVATE ETC */
		function page_slug_show_all_parents( $args ) {
			$args['post_status'] = array( 'publish', 'pending', 'draft', 'private' );
			return $args;
		}
		
		/* ENQUEUE STYLES AND SCRIPTS */
		function assets(){
			wp_deregister_script('jquery');
			wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery.min.js', array(), null);
			
			wp_deregister_script('jquery-ui');
			wp_enqueue_script('jquery-ui', get_template_directory_uri() . '/js/jquery-ui.min.js', array(), null, true);
			
			wp_enqueue_script('akvo-common', get_template_directory_uri() . '/js/common-js.js', array('jquery'), null, true );
			wp_enqueue_script('akvo-jquery', get_template_directory_uri() . '/js/akvo-jquery.js', array('jquery'), '1.0.5', true );
			wp_enqueue_script('jquery-fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js', array('jquery'), null, true );
			wp_enqueue_script('akvo-script', get_template_directory_uri() . '/js/script.js', array('jquery'), null, true );
			wp_enqueue_script('jquery-bxslider', get_template_directory_uri() . '/js/jquery.bxslider.min.js', array('jquery'), null, true );
			wp_enqueue_script('akvo-tabs', get_template_directory_uri() . '/js/tabs.js', array('jquery-bxslider'), "1.0.0", true );
			wp_enqueue_script('fontawesome', 'https://use.fontawesome.com/641b62259f.js', array('akvo-tabs'), null, true );	
			
			if ( is_singular() ) wp_enqueue_script('comment-reply');
			
			//enqueue style in the head section
			wp_enqueue_style('akvo-style', get_template_directory_uri().'/css/main.css', false, '2.5.3' );
			wp_enqueue_style('akvo-fonts', '//fonts.googleapis.com/css?family=Source+Code+Pro:400,900,700,600,300,200,500|Quando|Questrial|Inconsolata|Muli:400,300italic,400italic,300|Raleway:400,900,800,700,600,500,100,200,300|Lobster|Lobster+Two:400,400italic,700,700italic|Lato:400,100,300,700,900,100italic,300italic,400italic,900italic,700italic', false, null );
			wp_enqueue_style('jquery-bxslider', get_template_directory_uri().'/css/jquery.bxslider.css', false, '1.0.0' );
			
			wp_deregister_script('wp-embed');
		}
		
		
		
		function custom_post_type_list( $post_type, $tax, $tax_slug, $template = 'staff', $new = true ){
			$args = array(
				'post_type' => $post_type,
				'showposts' => '100',
				'tax_query' => array(
					array(
						'taxonomy' => $tax,
						'field' => 'slug', //can be set to ID
						'terms' => $tax_slug //if field is ID you can reference by cat/term number
					)
				)
			);
			_e('<ul class="staff floats-in">');
			$the_query = new WP_Query( $args );
			if( $the_query->have_posts() ):
				while( $the_query->have_posts() ) : $the_query->the_post();
					get_template_part('templates/'.$template);
				endwhile;
			endif;	
			if($new){
				get_template_part('templates/new_'.$template);	
			}
			_e('</ul>');
			wp_reset_query();
		}
		
		function foundation_list( $partner_type ){
			$this->custom_post_type_list( 'foundation_member', 'new_foundation_team', $partner_type, 'foundation', false);
		}
		
		function partner_list($partner_type){
			$this->custom_post_type_list( 'new_partners', 'new_partners_category', $partner_type, 'partner', false);
		}
		
		function staff_list($staff_type, $new_staff_flag = true){
			$this->custom_post_type_list( 'new_staffs', 'new_staffs_team', $staff_type, 'staff', $new_staff_flag );
		}
	}
	
	global $akvo;
	
	$akvo = new AKVO;