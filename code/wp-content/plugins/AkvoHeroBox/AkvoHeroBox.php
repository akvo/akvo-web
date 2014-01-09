<?php
/*
Plugin Name: Akvo Hero Box admin
Plugin URI: http://akvo.org/
Description: Add new Akvo Hero Box and manage them all easily.
Version: 1.0
Author: Loic Sans
Author URL: http://akvo.org/
*/


add_action( 'init', 'create_new_heroBox' );

function create_new_heroBox() {
    register_post_type( 'new_heroBox',
        array(
            'labels' => array(
                'name' => 'Akvo Hero Box',
                'singular_name' => 'New heroBox',
                'add_new' => 'Add a new heroBox',
                'add_new_item' => 'Add new heroBox',
                'edit' => 'Edit',
                'edit_item' => 'Edit heroBox',
                'new_item' => 'New heroBox',
                'view' => 'View',
                'view_item' => 'View heroBox',
                'search_items' => 'Search heroBox',
                'not_found' => 'No heroBox found',
                'not_found_in_trash' => 'No heroBox found in Trash',
                'parent' => 'Parent heroBox'
            ),
 
            'public' => true,
            'menu_position' => 15,
            'supports' => array( 'title', 'editor', 'author','thumbnail', 'custom-fields', 'revisions', 'post-formats'),
            'taxonomies' => array( '' ),
            'menu_icon' => plugins_url( 'images/akvoHeroBox_icn.png', __FILE__ ),
            'has_archive' => true
        )
    );
}
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 240, 135, true );
add_action( 'admin_init', 'heroBox_admin' );

function heroBox_admin() {
    add_meta_box( 
		'new_heroBox_meta_box',
        'New hero box details',
        'new_heroBox_img',
		'New hero box image',
        'display_new_heroBox_meta_box',
        'new_heroBox', 'normal', 'high'
    );
}

function display_new_heroBox_meta_box( $new_heroBox ) {
    // Retrieve current name of the staff and title based on staff ID
    $heroBox_img = esc_html( get_post_meta( $new_heroBox->ID, 'heroBox_img', true ) );
    $heroBox_title = esc_html( get_post_meta( $new_heroBox->ID, 'heroBox_title', true ) );
    $heroBox_subTitle = esc_html( get_post_meta( $new_heroBox->ID, 'heroBox_subTitle', true ) );
    $heroBox_descr = esc_html( get_post_meta( $new_heroBox->ID, 'heroBox_descr', true ) );
    ?>
    <table>
    <tr>
    		<td style="width: 100%">Hero Box Image</td>
           <td><input type="file" size="80" name="new_heroBox_img" value="<?php echo $heroBox_img; ?>" /></td>
    </tr>
        <tr>
            <td style="width: 100%">HeroBox Title</td>
            <td><input type="text" size="80" name="new_heroBox_title" value="<?php echo $heroBox_title; ?>" /></td>
        </tr>
        <tr>
            <td style="width: 100%">HeroBox subtitle</td>
            <td><input type="text" size="80" name="new_heroBox_subTitle" value="<?php echo $heroBox_subTitle; ?>" /></td>
        </tr>
      <tr>
            <td style="width: 100%">HeroBox short description</td>
            <td><textarea type="text" size="80" name="new_heroBox_descr" value="<?php echo $heroBox_descr; ?>"></textarea></td>
        </tr>
    </table>
    <?php
}

add_action( 'save_post',
'add_new_heroBox_fields', 10, 2 );

function add_new_heroBox_fields( $new_heroBox_id, $new_heroBox ) {
    // Check post type for new heroBox
    if ( $new_heroBox>post_type == 'new_heroBox' ) {
        // Store data in post meta table if present in post data
        if ( isset( $_POST['heroBox_img'] ) && $_POST['heroBox_img'] != '' ) {
            update_post_meta( $new_heroBox_id, 'heroBox_img', $_POST['heroBox_img'] );
        }
        if ( isset( $_POST['heroBox_title'] ) && $_POST['heroBox_title'] != '' ) {
            update_post_meta( $new_heroBox_id, 'heroBox_title', $_POST['heroBox_title'] );
        }
        if ( isset( $_POST['heroBox_subTitle'] ) && $_POST['heroBox_subTitle'] != '' ) {
            update_post_meta( $new_heroBox_id, 'heroBox_subTitle', $_POST['heroBox_subTitle'] );
        }
        if ( isset( $_POST['heroBox_descr'] ) && $_POST['heroBox_descr'] != '' ) {
            update_post_meta( $new_heroBox_id, 'heroBox_descr', $_POST['heroBox_descr'] );
        }
    }
}


add_filter( 'template_include', 'include_heroBoxtemplate_function', 1 );

function include_heroBoxtemplate_function( $template_path ) {
    if ( get_post_type() == 'new_heroBox' ) {
        if ( is_single() ) {
            // checks if the file exists in the theme first,
            // otherwise serve the file from the plugin
            if ( $theme_file = locate_template( array ( 'single-new_heroBox.php' ) ) ) {
                $template_path = $theme_file;
            } else {
                $template_path = plugin_dir_path( __FILE__ ) . '/single-new_heroBox.php';
            }
        }
		  elseif ( is_archive() ) {
            if ( $theme_file = locate_template( array ( 'archive-new_heroBox.php' ) ) ) {
                $template_path = $theme_file;
            } else { $template_path = plugin_dir_path( __FILE__ ) . '/archive-new_heroBox.php';
 
            }
    }
	}
    return $template_path;
}

?>