<?php
/*
Plugin Name: Akvo Hero Box admin
Plugin URI: http://akvo.org/
Description: Add new Akvo Hero Box and manage them all easily.
Version: 1.1
Author: Loic Sans, Dan Rowden
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
                'instructions' => 'If this slide is a video, the image should be the first frame of the video',
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
            array (
                'key' => 'field_5093aa24a4641',
                'label' => 'Hero Box Text Position',
                'name' => 'hero_box_text_position',
                'type' => 'select',
                'required' => 1,
                'choices' => array (
                    'bottom_right' => 'Bottom right (default)',
                    'top_left' => 'Top left',
                    'top_right' => 'Top right',
                    'bottom_left' => 'Bottom left',
                ),
                'default_value' => 'bottom_right',
                'allow_null' => 0,
                'multiple' => 0,
            ),
            array (
                'key' => 'field_2f0ed209871a8',
                'label' => 'Hero Box Color',
                'name' => 'hero_box_color',
                'type' => 'select',
                'required' => 0,
                'choices' => array (
                    'orange' => 'orange',
                    'green' => 'green',
                    'yellow' => 'yellow',
                    'pink' => 'pink',
                    'lightblue' => 'lightblue',
                    'darkblue' => 'darkblue',
                ),
                'allow_null' => 0,
                'multiple' => 0,
            ),
            array (
                'key' => 'field_18e90d9a8101',
                'label' => 'Slide type',
                'name' => 'hero_box_slide_type',
                'type' => 'select',
                'required' => 0,
                'choices' => array (
                    'image' => 'Image',
                    'video' => 'Video',
                ),                
                'default_value' => 'image',
                'allow_null' => 0,
                'multiple' => 0,
                'instructions' => 'Please only include one active video slide in the hero box at any one time',
            ),    
            array (
                'key' => 'field_8a019283910a1',
                'label' => 'MP4 Video URL',
                'name' => 'hero_box_video_mp4',
                'type' => 'text',
                'required' => 0,               
                'allow_null' => 0,
                'multiple' => 0,
                'instructions' => 'A URL to a 5-10 second mp4 video encoded via h.264 with a resolution of 960x540. The top portion of the clip may be obscured depnding on browser dimensions, so the important part should be towards the bottom of the frame. The file size should be under 2MB. NOTE - an ogg/theora version of the same video is required.',
            ),
            array (
                'key' => 'field_213890309e81982a',
                'label' => 'Theora Video URL',
                'name' => 'hero_box_video_ogv',
                'type' => 'text',
                'required' => 0,               
                'allow_null' => 0,
                'multiple' => 0,
                'instructions' => 'Link to the same clip as the mp4, encoded as theora video in an ogv container, with the same resolution (960x540)',
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