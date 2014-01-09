<?php
function register_heroBox() {

//Display in WP backend UI
  $labels = array(
    'name' => 'heroBox',
    'singular_name' => 'heroBox',
    'add_new' => 'Add New',
    'add_new_item' => 'Add New heroBox',
    'edit_item' => 'Edit heroBox',
    'new_item' => 'New heroBox',
    'all_items' => 'All heroBox',
    'view_item' => 'View heroBox',
    'search_items' => 'Search heroBox',
    'not_found' =>  'No heroBox found',
    'not_found_in_trash' => 'No heroBox found in Trash', 
    'parent_item_colon' => '',
    'menu_name' => 'heroBox'
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => array( 'slug' => 'heroBox' ),
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
  ); 

  register_post_type( 'heroBox', $args );
}
add_action( 'init', 'register_heroBox' );

 ?>