<?php
/*
Plugin Name: Akvo Foundations admin
Plugin URI: http://akvo.org/about-us/foundations/
Description: Manage Akvo foundation members.
Version: 1.0
Author: Loic Sans, Dan Rowden
Author URI: http://akvo.org/
*/


add_action( 'init', 'create_new_foundation_member' );

function create_new_foundation_member() {
    register_post_type( 'foundation_member',
        array(
            'labels' => array(
                'name' => 'Akvo Foundation member',
                'singular_name' => 'New Foundation member',
                'add_new' => 'Add a new Foundation member',
                'add_new_item' => 'Add new Foundation member',
                'edit' => 'Edit',
                'edit_item' => 'Edit Foundation member',
                'new_item' => 'New Foundation member',
                'view' => 'View',
                'view_item' => 'View Foundation member',
                'search_items' => 'Search Foundation member',
                'not_found' => 'No Foundation member found',
                'not_found_in_trash' => 'No Foundation member found in Trash',
                'parent' => 'Parent Foundation member'
            ),
 
            'public' => true,
            'menu_position' => 15,
            'supports' => array( 'title', 'editor', 'author','thumbnail', 'revisions', 'post_tag'),
            'taxonomies' => array( 'post_tag' ),
            'menu_icon' => plugins_url( 'images/akvoStaff_icn.png', __FILE__ ),
            'has_archive' => true
        )
    );
}
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 240, 135, true );
add_action( 'admin_init', 'foundations_admin' );

function foundations_admin() {
    add_meta_box( 'new_foundation_meta_box',
        'New Foundation member Details',
        'display_new_foundation_meta_box',
        'foundation_member', 'normal', 'high'
    );
}

function display_new_foundation_meta_box( $new_member ) {
    // Retrieve current name of the staff and title based on staff ID
    $member_title = esc_html( get_post_meta( $new_member->ID, 'member_title', true ) );
    ?>
    <table>
        <tr>
            <td style="width: 100%">Job title</td>
            <td><input type="text" size="80" name="new_member_title" value="<?php echo $member_title; ?>" /></td>
        </tr>
    </table>
    <?php
}

add_action( 'save_post',
'add_new_foundation_fields', 10, 2 );

function add_new_foundation_fields( $new_member_id, $new_member ) {
    // Check post type for new Staffs
    if ( $new_member->post_type == 'foundation_member' ) {
        // Store data in post meta table if present in post data
        if ( isset( $_POST['new_member_title'] ) && $_POST['new_member_title'] != '' ) {
            update_post_meta( $new_member_id, 'member_title', $_POST['new_member_title'] );
        }
    }
}


//CREATE CUSTOM TAXONOMIES

add_action( 'init', 'create_foundation_taxonomies', 0 );

function create_foundation_taxonomies() {

    register_taxonomy(
        'new_foundation_team',
        'foundation_member',
        array(
            'labels' => array(
                'name' => 'Akvo Foundation group',
                'add_new_item' => 'Add new Foundation group',
                'new_item_name' => "New Foundation group"
            ),
            'show_ui' => true,
            'show_tagcloud' => false,
            'hierarchical' => true,
			 'query_var' => true,
			'rewrite' => array('slug' => 'new_foundation_team' )
        )
    );
}
?>