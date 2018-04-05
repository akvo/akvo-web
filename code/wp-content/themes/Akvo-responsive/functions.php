<?php
	
	/*
		Custom functions designed specifically for Akvo Responsive theme.
	*/

	// Loads advancedcustomfields fields required for FAQ and pricing page
	$includes_path = get_template_directory() . '/inc/';
	require_once($includes_path . 'acf-functions.php');
	//require_once($includes_path . 'custom-post-types.php');  /* CASE STUDIES - THAT ARE NO LONGER USED */
	require_once($includes_path . 'class-akvo-post-type.php');  
	require_once($includes_path . 'class-akvo-tabs.php');
	require_once($includes_path . 'class-akvo-black-body.php');
	require_once($includes_path . 'widgets.php');

	
	/* ENQUEUE STYLES AND SCRIPTS */
	add_action('wp_enqueue_scripts', function(){
		
		wp_deregister_script('jquery');
		wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery.min.js', array(), null);
		
		wp_deregister_script('jquery-ui');
		wp_enqueue_script('jquery-ui', get_template_directory_uri() . '/js/jquery-ui.min.js', array(), null, true);
		
		wp_enqueue_script('akvo-common', get_template_directory_uri() . '/js/common-js.js', array('jquery'), null, true );
		wp_enqueue_script('akvo-jquery', get_template_directory_uri() . '/js/akvo-jquery.js', array('jquery'), '1.0.2', true );
		wp_enqueue_script('jquery-fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js', array('jquery'), null, true );
		wp_enqueue_script('akvo-script', get_template_directory_uri() . '/js/script.js', array('jquery'), null, true );
		wp_enqueue_script('jquery-bxslider', get_template_directory_uri() . '/js/jquery.bxslider.min.js', array('jquery'), null, true );
		wp_enqueue_script('akvo-tabs', get_template_directory_uri() . '/js/tabs.js', array('jquery-bxslider'), "1.0.0", true );
		wp_enqueue_script('fontawesome', 'https://use.fontawesome.com/641b62259f.js', array('akvo-tabs'), null, true );	
		
		if ( is_singular() ) wp_enqueue_script('comment-reply');
		
		//enqueue style in the head section
		wp_enqueue_style('akvo-style', get_template_directory_uri().'/css/main.css', false, '2.4.6' );
		wp_enqueue_style('akvo-fonts', '//fonts.googleapis.com/css?family=Source+Code+Pro:400,900,700,600,300,200,500|Quando|Questrial|Inconsolata|Muli:400,300italic,400italic,300|Raleway:400,900,800,700,600,500,100,200,300|Lobster|Lobster+Two:400,400italic,700,700italic|Lato:400,100,300,700,900,100italic,300italic,400italic,900italic,700italic', false, null );
		wp_enqueue_style('jquery-bxslider', get_template_directory_uri().'/css/jquery.bxslider.css', false, '1.0.0' );
		
		wp_deregister_script('wp-embed');
	});
	
	
	
	function akvo_json($url){
		$cache_key = 'akvo_' . $url;
		
		// try to get value from Wordpress cache
		$json = get_transient( $cache_key ); 
		
		// if no value in the cache
		if ( $json === false ) {
			
			$response = wp_remote_get($url);
			
			if (! is_wp_error( $response ) ) {
				$json = json_decode( $response['body'] );
				set_transient( $cache_key, $json, 3600 * 4 * 12 ); // store value in cache for a 12 hours
			}
			
		}
		return $json;
	}

	add_theme_support( 'post-thumbnails' );
	register_nav_menus(array(
		'header-menu' => 'Header Menu',
		'footer-menu' => 'Footer Menu'
	));

	/**
	 * Setting up custom sidebars
	 *
	 */
	if (function_exists('register_sidebar')) {
		register_sidebar(array(
			'name' => 'Main Sidebar',
			'id' => 'main',
			'before_widget' => '<div class="widget">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="wtitle">',
			'after_title' => '</h3>'
		));
		
		register_sidebar(array(
			'name' => 'Responsive Sidebar',
			'id' => 'responsive',
			'before_widget' => '<div class="widget">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="wtitle">',
			'after_title' => '</h3>'
		));
		register_sidebar(array(
			'name' => 'Homepage box Sidebar',
			'id' => 'sidebar-homepagebox-1',
			'before_widget' => '',
			'after_widget' => '',
			'before_title' => '<h3 class="wtitle">',
			'after_title' => '</h3>'
		));
		
	}

	add_filter('excerpt_more', function( $more ){
		global $post; return '... <a href="' . get_permalink($post->ID) . '" class="moreLink">Read more</a>';
	});


	function the_breadcrumb(){
		global $post_type;
		$sep = '   &rsaquo;  ';
		if (!is_front_page()) {
			echo '<div class="breadcrumbs wrapper">';
			echo '<a href="';
			echo get_option('home');
			echo '">';
			bloginfo('name');
			echo '</a>' . $sep;
			if (is_category() || is_single()) {
				the_category(', ');
			} elseif (is_archive() || is_single()) {
				if (is_day()) {
					printf(__('%s', 'text_domain'), get_the_date());
				} elseif (is_month()) {
					printf(__('%s', 'text_domain'), get_the_date(_x('F Y', 'monthly archives date format', 'text_domain')));
				} elseif (is_year()) {
					printf(__('%s', 'text_domain'), get_the_date(_x('Y', 'yearly archives date format', 'text_domain')));
				} elseif($post_type == 'tribe_events'){
					_e('Events');
				} else {
					_e('Blog Archives', 'text_domain');	
				}
			}
			
			if (is_single()) {
				if($post_type == 'tribe_events'){
					_e('Events');
				}
				echo $sep;
				the_title();
			}
			
			if ( is_page() ) {
				the_title();
			}
			
			if (is_home()) {
				global $post;
				$page_for_posts_id = get_option('page_for_posts');
				if ($page_for_posts_id) {
					$post = get_page($page_for_posts_id);
					setup_postdata($post);
					the_title();
					rewind_posts();
				}
			}
			
			echo '</div>';
		}
	}


	/**
	 * Customize the 'Read More' link text
	 *
	 */
	add_filter('the_content_more_link', function($link, $link_text){
		return str_replace($link_text, 'Read More &raquo;', $link);
	}, 10, 2);


	/**
	 * Remove the hash(#) from all 'Read More' links
	 *
	 */

	add_filter('the_content_more_link', function( $link ){
		$offset = strpos($link, '#more-');
		if ($offset) {
			$end = strpos($link, '"', $offset);
		}
		if ($end) {
			$link = substr_replace($link, '', $offset, $end - $offset);
		}
		return $link;
	});

	/* CHECK IF THE CURRENT PAGE IS USING THE NEW TEMPLATE */
	function is_akvo_full_black_body(){
		
		$akvo_page = new akvoBlackBody;
		$new_templates = $akvo_page->get_templates();
		
		global $post;
		$template_slug = get_page_template_slug( $post->ID );
			
		if( in_array( $template_slug, $new_templates ) ){
			return true;
		}
		
		return false;
		
	}


	

	// add pagename as class to <body> tag
	function akvo_bodyclass() {
		
		global $wp_query;
		$page = '';
		if (is_front_page()) {
			$page = 'home';
		} elseif (is_page()) {
			
			//ADD PAGES NAME AS A BODY CLASS
			$page = $wp_query->query_vars["pagename"] . ' Page';
			
			/* CHECK FOR NEW TEMPLATE */
			if( is_akvo_full_black_body() ){
				$page .= " fullBlack";
			}
			
		}
		
		if ($page) {
			echo ' class= "' . $page, '"';
		}
		if ($page = 'blog') {
			echo ' class= "' . $page, ' ' . '"';
		}
		
	}

	//LIMITS NUMBER OF WORDS WHEN USING THE EXCERPT FUNCTION
	add_filter( 'excerpt_length', function( $length ){
		return 20;
	}, 999 );

	
	
	
	//WILL add CATEGORY NAME AS CLASS TO THE ELEMENT
	function the_category_unlinked($separator = ' ') {
		$categories = (array) get_the_category();
		
		$thelist = '';
		foreach($categories as $category) {    // concate
			$thelist .= $separator . $category->category_nicename;
		}
		
		echo $thelist;
	}

	// Add corresponding class (
	add_filter( 'post_class', function($classes, $class, $ID){
		$taxonomy = array('new_staffs_team','new_partners_category','staff_hub','new_foundation_team');
		$terms = get_the_terms( (int) $ID, $taxonomy);
		if( !empty( $terms ) ) {
			foreach( (array) $terms as $order => $term ) {
				if( !in_array( $term->slug, $classes ) ) {
					$classes[] = $term->slug;
				}
			}
		}
		return $classes;
	}, 10, 3 );
    
	
	
	
	// REMOVE THE ADMIN BAR FROM THE FRONT END
	add_filter('show_admin_bar', '__return_false');

	// Events listing thumbnail to sidebar widget
	add_action( 'tribe_events_list_widget_before_the_event_title', function(){
		global $post;
		echo tribe_event_featured_image( $post->ID, 'thumbnail' );
	} );

	
	// JSON plugin support

	function json_data_render_update($rsr_domain, $updateUrl, $title, $imgSrc, $createdAt, $userName, $organisation, $organisationUrl, $country_and_city, $text)
	{ ?>
	  <li id="updateTemplate" class="rsrUpdate">
		<span>RSR Update</span>
		<h2>
		  <a href="<?= $rsr_domain ?><?= $updateUrl ?>"><?= $title ?></a>
		</h2>
		<ul class="floats-in">
		  <li class="upImag">
			<div class="imgWrap">
				<a href="<?= $rsr_domain ?><?= $updateUrl ?>"><img src="<?= $rsr_domain.$imgSrc ?>"/></a>
			</div>
		  </li>
		  <li class="upInfo">
			<div class="authorTime floats-in">
			  <time datetime="" class=""><?= $createdAt ?></time>
			  <em class="">by&nbsp;</em>
			  <span class="userName"><?= $userName ?></span>
			</div>
			<div class="orgAndPlace">
			  <span class="org"><a href="<?= $rsr_domain ?><?= $organisationUrl ?>"><?= $organisation ?></a></span>
			  <span class="place" title="<?= $country_and_city ?>"><?= $country_and_city ?></span>
			</div>
		  </li>
		  <li class="upTxt">
			<p><?= $text ?></p>
		  </li>
		  <li class="upMore">
			<a href="<?= $rsr_domain ?><?= $updateUrl ?>" class="">
			  <span>Read more ></span>
			</a>
		  </li>
		</ul>
	  </li>
	<?php
	}

	/* custom schedule details for events */
	function tribe_events_event_schedule_details_2( $event = null, $before = '', $after = '' ) {
		if ( is_null( $event ) ) {
			global $post;
			$event = $post;
		}
		
		if ( is_numeric( $event ) ) { $event = get_post( $event );}

		$inner                    = '<span class="tribe-event-date-start">';
		$format                   = '';
		$date_without_year_format = tribe_get_date_format();
		$date_with_year_format    = tribe_get_date_format( true );
		$time_format              = get_option( 'time_format' );
		$datetime_separator       = tribe_get_option( 'dateTimeSeparator', ' @ ' );
		$time_range_separator     = tribe_get_option( 'timeRangeSeparator', ' - ' );

		$settings = array(
			'show_end_time' => true,
			'time'          => true,
		);

		$settings = wp_parse_args( apply_filters( 'tribe_events_event_schedule_details_formatting', $settings ), $settings );
		if ( ! $settings['time'] ) {$settings['show_end_time'] = false;}

		extract( $settings );

		$format = $date_with_year_format;
		
		if ( tribe_event_is_multiday( $event ) ) { // multi-date event

			$format2ndday = apply_filters( 'tribe_format_second_date_in_range', $format, $event );

			if ( tribe_event_is_all_day( $event ) ) {
				$inner .= tribe_get_start_date( $event, true, $format );
				$inner .= '</span>' . $time_range_separator;
				$inner .= '<span class="tribe-event-date-end">';

				$end_date_full = tribe_get_end_date( $event, true, Tribe__Date_Utils::DBDATETIMEFORMAT );
				$end_date_full_timestamp = strtotime( $end_date_full );

				// if the end date is <= the beginning of the day, consider it the previous day
				if ( $end_date_full_timestamp <= strtotime( tribe_beginning_of_day( $end_date_full ) ) ) {
					$end_date = tribe_format_date( $end_date_full_timestamp - DAY_IN_SECONDS, false, $format2ndday );
				} else {
					$end_date = tribe_get_end_date( $event, false, $format2ndday );
				}

				$inner .= $end_date;
			} else {
				$inner .= tribe_get_start_date( $event, false, $format ) . ( $time ? $datetime_separator . tribe_get_start_date( $event, false, $time_format ) : '' );
				$inner .= '</span>' . $time_range_separator;
				$inner .= '<span class="tribe-event-date-end">';
				$inner .= tribe_get_end_date( $event, false, $format2ndday ) . ( $time ? $datetime_separator . tribe_get_end_date( $event, false, $time_format ) : '' );
			}
		} elseif ( tribe_event_is_all_day( $event ) ) { // all day event
			$inner .= tribe_get_start_date( $event, true, $format );
		} else { // single day event
			if ( tribe_get_start_date( $event, false, 'g:i A' ) === tribe_get_end_date( $event, false, 'g:i A' ) ) { // Same start/end time
				$inner .= tribe_get_start_date( $event, false, $format ) . ( $time ? $datetime_separator . tribe_get_start_date( $event, false, $time_format ) : '' );
			} else { // defined start/end time
				$inner .= tribe_get_start_date( $event, false, $format ) . ( $time ? $datetime_separator . tribe_get_start_date( $event, false, $time_format ) : '' );
				$inner .= '</span>' . ( $show_end_time ? $time_range_separator : '' );
				$inner .= '<span class="tribe-event-time">';
				$inner .= ( $show_end_time ? tribe_get_end_date( $event, false, $time_format ) : '' );
			}
		}

		$inner .= '</span>';
		$inner = apply_filters( 'tribe_events_event_schedule_details_inner', $inner, $event->ID );
		$schedule = $before . $inner . $after;
		return apply_filters( 'tribe_events_event_schedule_details_2', $schedule, $event->ID, $before, $after );
	}
	
	
	function akvo_page_section($field, $shallow_banner = false){
		$row_i = 0;
		while(have_rows($field)): the_row();
			$image_flag = false;
			$image_text = get_sub_field('image_text');
			if (strpos($image_text, '<img') !== false) {$image_flag = true;}
				$class = 'full-width-banner';
				
				if($shallow_banner || $row_i || !$image_text){ $class .= ' shallow-banner';}
				if($image_flag){$class .= ' overlay-banner';}
				
		?>
  			<section>
  				<div class="<?php _e($class);?>" style="background-image:url(<?php _e(get_sub_field('image'));?>);">
        			<?php if($image_text):?>
           			<a href="<?php _e(get_sub_field('image_link'));?>">
           				<?php _e($image_text);?>
           			</a>
           			<?php endif;?>
    			</div>
    			<?php $desc = get_sub_field('description');
    			if($desc):?><div class='page-section'><?php _e($desc);?></div><?php endif;?>
  			</section>
  	<?php $row_i++;endwhile;
	}
	
	function akvo_page_logo($field){
		_e("<img class='prod-logo' src='".get_field($field)."' />");
	}
	
	function akvo_slugify($text){ 
  		$slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $text);
   		return strtolower($slug);
	}
	
	// Added to extend allowed files types in Media upload
	add_filter('upload_mimes', function( $existing_mimes = array() ){
		// Add *.EPS files to Media upload
		$existing_mimes['eps'] = 'application/postscript';

		// Add *.AI files to Media upload
		$existing_mimes['ai'] = 'application/postscript';
		
		// Add *.svg files to Media upload
		$existing_mimes['svg'] = 'image/svg+xml';

		return $existing_mimes;
	});
	
	function akvo_latest_rsr(){
		$json = akvo_json('http://rsr.akvo.org/api/v1/project_update/?limit=5&format=json');
		print_r(json_encode($json));
		wp_die();
	}
	add_action( 'akvo_ajax_akvo_latest_rsr', 'akvo_latest_rsr' );
	add_action( 'wp_ajax_akvo_latest_rsr', 'akvo_latest_rsr' );
	add_action( 'wp_ajax_nopriv_akvo_latest_rsr', 'akvo_latest_rsr' );
	
	
	
	function akvo_post_type_list( $post_type, $tax, $tax_slug, $template = 'staff', $new = true ){
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
	
	function akvo_staff_list($staff_type, $new_staff_flag = true){
		akvo_post_type_list( 'new_staffs', 'new_staffs_team', $staff_type, 'staff', $new_staff_flag );
	}
	
	function akvo_partner_list($partner_type){
		akvo_post_type_list( 'new_partners', 'new_partners_category', $partner_type, 'partner', false);
	}
	function akvo_foundation_list( $partner_type ){
		akvo_post_type_list( 'foundation_member', 'new_foundation_team', $partner_type, 'foundation', false);
	}
	
	/* remove unnecessary code */
	// Disable REST API link tag
	remove_action('wp_head', 'rest_output_link_wp_head', 10);

	// Disable oEmbed Discovery Links
	remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);

	// Disable REST API link in HTTP headers
	remove_action('template_redirect', 'rest_output_link_header', 11, 0);
	
	// Diable wp emoji
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	
	
	add_shortcode('funnel', function( $atts ){
		ob_start();
		
		$atts = shortcode_atts( array('id' => 0), $atts, 'funnel' );
		
		
		
		$query = new WP_Query( array(
			'posts_per_page'	=> 1,
			'post_type'			=> 'funnel',
			'post__in'			=> array( $atts['id'] )
		) );
			
		if( $query->have_posts() ){
			
			while( $query->have_posts() ){
				$query->the_post();
				
				include("inc/funnel.php");
				
			}
			
			wp_reset_postdata();
			
		}
		
		return ob_get_clean();
	});
	
	function the_hubs_list( $heading = "Looking for one of our other offices?" ){
		
		$hubs = array(
			array(
				'class'		=> 'EU',
				'bg_image'	=> get_bloginfo('template_url').'/images/location-hexagons_Europe.png',
				'text'		=> 'Netherlands, Amsterdam',
				'helloMsg'	=> 'Welkom',
				'link'		=> 'https://akvo.org/europe/'
			),
			array(
				'class'		=> 'WA',
				'bg_image'	=> get_bloginfo('template_url').'/images/location-hexagons_WestAfrica.png',
				'text'		=> 'Mali, Bamako',
				'helloMsg'	=> 'Bienvenue',
				'link'		=> 'https://akvo.org/west-africa/'
			),
			array(
				'class'		=> 'EA',
				'bg_image'	=> get_bloginfo('template_url').'/images/location-hexagons_EastAfrica.png',
				'text'		=> 'Kenya, Nairobi',
				'helloMsg'	=> 'Karibu',
				'link'		=> 'https://akvo.org/east-africa/'
			),
			array(
				'class'		=> 'SA',
				'bg_image'	=> get_bloginfo('template_url').'/images/location-hexagons_SouthAsia.png',
				'text'		=> 'India, Delhi',
				'helloMsg'	=> 'Namaste',
				'link'		=> 'https://akvo.org/south-asia/'
			),
			array(
				'class'		=> 'IN',
				'bg_image'	=> get_bloginfo('template_url').'/images/location-hexagons_SEAsia_SEAP.png',
				'text'		=> 'Indonesia, Bali',
				'helloMsg'	=> 'Selamat datang',
				'link'		=> 'https://akvo.org/south-east-asia-pacific/'
			),
			array(
				'class'		=> 'US',
				'bg_image'	=> get_bloginfo('template_url').'/images/location-hexagons_Americas.png',
				'text'		=> 'USA, Washington',
				'helloMsg'	=> 'Bienvenido',
				'link'		=> 'https://akvo.org/americas/'
			),
		);
		echo '<hr class="delicate">';
		_e('<section class="allHubBlock floats-in"><div class="wrapper">');
		_e("<h1>".$heading."</h1>");
		_e('<ul class="list-scroll">');
		foreach( $hubs as $hub ){
			_e('<li class="'.$hub['class'].'">');
			_e('<a href="'.$hub['link'].'" style="background-image:url(\''.$hub['bg_image'].'\');">'.$hub['text'].'</a>');
			_e('<div class="helloMsg"><h2>'.$hub['helloMsg'].'</h2></div>');
			_e('</li>');
		}
		_e('</ul>');
		_e('</div></section>');
	}
	
	function akvo_slug_show_all_parents( $args ) {
		$args['post_status'] = array( 'publish', 'pending', 'draft', 'private' );
		return $args;
	}
	add_filter( 'page_attributes_dropdown_pages_args', 'akvo_slug_show_all_parents' );
	add_filter( 'quick_edit_dropdown_pages_args', 'akvo_slug_show_all_parents' );