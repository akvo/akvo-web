<?php
/*
Plugin Name: Akvo partner admin
Plugin URI: http://akvo.org/about-us/partners/
Description: Add and manage new Akvo partner easily.
Version: 1.0
Author: Loic Sans
Author URI: http://akvo.org/
*/



/*
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 240, 135, true );
add_action( 'admin_init', 'partner_admin' );

function partner_admin() {
    add_meta_box( 'new_partner_meta_box',
        'New partner details',
        'display_new_partner_meta_box',
        'new_partners', 'normal', 'high'
    );
}

function display_new_partner_meta_box( $new_partner ) {
    // Retrieve current name of the partner and title based on partner ID
    $partner_name = esc_html( get_post_meta( $new_partner->ID, 'partner_name', true ) );
    $partner_tagline = esc_html( get_post_meta( $new_partner->ID, 'partner_tagline', true ) );
    $partner_descr = esc_html( get_post_meta( $new_partner->ID, 'partner_descr', true ) );
    ?>
    <table>
        <tr>
            <td style="width: 100%">Partner name</td>
            <td><input type="text" size="80" name="new_partner_name" value="<?php echo $partner_name; ?>" /></td>
        </tr>
        <tr>
            <td style="width: 100%">Partner tagline</td>
            <td><input type="text" size="80" name="new_partner_tagline" value="<?php echo $partner_tagline; ?>" /></td>
        </tr>
        <tr>
            <td style="width: 100%">Partner Description</td>
            <td><textarea type="text" size="80" name="new_partner_descr" value="<?php echo $partner_descr; ?>"></textarea></td>
        </tr>
    </table>
    <?php
}

add_action( 'save_post',
'add_new_partner_fields', 10, 2 );

function add_new_partner_fields( $new_partner_id, $new_partner ) {
    // Check post type for new partners
    if ( $new_partner->post_type == 'new_partners' ) {
        // Store data in post meta table if present in post data
        if ( isset( $_POST['new_partner_name'] ) && $_POST['new_partner_name'] != '' ) {
            update_post_meta( $new_partner_id, 'partner_name', $_POST['new_partner_name'] );
        }
        if ( isset( $_POST['new_partner_tagline'] ) && $_POST['new_partner_tagline'] != '' ) {
            update_post_meta( $new_partner_id, 'partner_tagline', $_POST['new_partner_tagline'] );
        }
        if ( isset( $_POST['new_partner_descr'] ) && $_POST['new_partner_descr'] != '' ) {
            update_post_meta( $new_partner_id, 'partner_descr', $_POST['new_partner_descr'] );
        }
    }
}

/*
add_filter( 'template_include', 'include_partnertemplate_function', 1 );

function include_partnertemplate_function( $template_path ) {
    if ( get_post_type() == 'new_partners' ) {
        if ( is_single() ) {
            // checks if the file exists in the theme first,
            // otherwise serve the file from the plugin
            if ( $theme_file = locate_template( array ( 'single-new_partners.php' ) ) ) {
                $template_path = $theme_file;
            } else {
                $template_path = plugin_dir_path( __FILE__ ) . '/single-new_partners.php';
            }
        }
		  elseif ( is_archive() ) {
            if ( $theme_file = locate_template( array ( 'archive-new_partners.php' ) ) ) {
                $template_path = $theme_file;
            } else { $template_path = plugin_dir_path( __FILE__ ) . '/archive-new_partners.php';
 
            }
    }
	}
    return $template_path;
}

//CREATE CUSTOM TAXONOMIES

add_action( 'init', 'create_partner_taxonomies', 0 );

function create_partner_taxonomies() {

    register_taxonomy(
        'new_partners_category',
        'new_partners',
        array(
            'labels' => array(
                'name' => 'Akvo partner category',
                'add_new_item' => 'Add new Akvo category',
                'new_item_name' => "New Akvo category"
            ),
            'show_ui' => true,
            'show_tagcloud' => false,
            'hierarchical' => true,
			 'query_var' => true,
			'rewrite' => array('slug' => 'new_partners_category' )
        )
    );
}
*/
?>