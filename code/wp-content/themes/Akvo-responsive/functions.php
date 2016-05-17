<?php
/*
	Custom functions designed specifically for Akvo Responsive theme.
*/

// Loads advancedcustomfields fields required for FAQ and pricing page
$includes_path = get_template_directory() . '/inc/';
require_once($includes_path . 'acf-functions.php');

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
function new_excerpt_more($more)
{
    global $post;
    return '... <a href="' . get_permalink($post->ID) . '" class="moreLink">Read more</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');


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
        
        if (is_page()) {
            echo the_title();
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
function custom_more_link($link, $link_text)
{
    return str_replace($link_text, 'Read More &raquo;', $link);
}
add_filter('the_content_more_link', 'custom_more_link', 10, 2);


/**
 * Remove the hash(#) from all 'Read More' links
 *
 */
function remove_more_jump($link)
{
    $offset = strpos($link, '#more-');
    if ($offset) {
        $end = strpos($link, '"', $offset);
    }
    if ($end) {
        $link = substr_replace($link, '', $offset, $end - $offset);
    }
    return $link;
}
add_filter('the_content_more_link', 'remove_more_jump');

//ADD PAGES NAME AS A BODY CLASS

function my_bodyclass() // add pagename as class to <body> tag
{
    global $wp_query;
    $page = '';
    if (is_front_page()) {
        $page = 'home';
    } elseif (is_page()) {
        $page = $wp_query->query_vars["pagename"] . ' Page';
    }
    if ($page) {
        echo ' class= "' . $page, '"';
    }
    if ($page = 'blog') {
        echo ' class= "' . $page, ' ' . '"';
    }
}

//LIMITS NUMBER OF WORDS WHEN USING THE EXcerpt FUNCTION

function custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

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
add_filter( 'post_class', 'custom_taxonomy_post_class', 10, 3 );
    if( !function_exists( 'custom_taxonomy_post_class' ) ) {
        function custom_taxonomy_post_class( $classes, $class, $ID ) {
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
        }
    }
	
function post_type_pagesize( $query ) {
	$postTypes = array('new_staffs', 'new_partners','foundation_member');
    if ( is_post_type_archive( $postTypes ) ) {
        // Display 120 posts per page (archive page) for a custom post type called 'new_staffs' & 'new_partners'
        $query->set( 'posts_per_page', 120 );
        return;
    }
}
add_action( 'pre_get_posts', 'post_type_pagesize', 1);
add_filter('show_admin_bar', '__return_false');

// Events listing thumbnail to sidebar widget

function custom_widget_featured_image() {
global $post;

echo tribe_event_featured_image( $post->ID, 'thumbnail' );

}
add_action( 'tribe_events_list_widget_before_the_event_title', 'custom_widget_featured_image' );

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
				
				if($shallow_banner || $row_i){ $class .= ' shallow-banner';}
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
    			<?php $desc = get_sub_field('description');if($desc):?>
    			<div class='page-section'><?php _e($desc);?></div>
    	<?php endif;?>
  	</section>
  	<?php $row_i++;endwhile;
	}
	
	function akvo_page_logo($field){
		_e("<img class='prod-logo' src='".get_field($field)."' />");
	}
	
?>
