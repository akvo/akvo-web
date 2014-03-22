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
            'supports' => array( 'title', 'revisions'),
            'taxonomies' => array( '' ),
            'menu_icon' => plugins_url( 'images/akvoHeroBox_icn.png', __FILE__ ),
            'has_archive'         => false,
            'exclude_from_search' => true,
            'public' => false,
            'show_ui' => true
        )
    );
}

$plugins_url = dirname(__FILE__) . '/../';
include_once($plugins_url . 'advanced-custom-fields/acf.php');

// Uses ACF for the necessary custom fields
if(function_exists("register_field_group"))
{
    register_field_group(array (
        'id' => 'acf_akvo-hero-box',
        'title' => 'Akvo Hero Box',
        'fields' => array (
            array (
                'key' => 'field_52d7f8511f4f5',
                'label' => 'Hero Box Active',
                'name' => 'hero_box_active',
                'type' => 'true_false',
                'message' => 'Check to show this hero box on the homepage',
                'default_value' => 0,
            ),
            array (
                'key' => 'field_52d7f7c88e310',
                'label' => 'Hero Box Image',
                'name' => 'hero_box_image',
                'type' => 'image',
                'save_format' => 'url',
                'preview_size' => 'thumbnail',
                'library' => 'all',
            ),
            array (
                'key' => 'field_52d7f8078e311',
                'label' => 'Hero Box Title',
                'name' => 'hero_box_title',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_52d7f8168e312',
                'label' => 'Hero Box Subtitle',
                'name' => 'hero_box_subtitle',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_52d7f8348e313',
                'label' => 'Hero Box Link',
                'name' => 'hero_box_link',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'new_herobox',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array (
            'position' => 'normal',
            'layout' => 'no_box',
            'hide_on_screen' => array (
            ),
        ),
        'menu_order' => 0,
    ));
}
?>