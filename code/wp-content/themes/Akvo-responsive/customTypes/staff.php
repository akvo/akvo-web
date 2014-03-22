<?php
function register_staff() {

//Display in WP backend UI
  $labels = array(
    'name' => 'staffs',
    'singular_name' => 'staff',
    'add_new' => 'Add New',
    'add_new_item' => 'Add New staff',
    'edit_item' => 'Edit staff',
    'new_item' => 'New staff',
    'all_items' => 'All staffs',
    'view_item' => 'View staff',
    'search_items' => 'Search staffs',
    'not_found' =>  'No staffs found',
    'not_found_in_trash' => 'No staffs found in Trash', 
    'parent_item_colon' => '',
    'menu_name' => 'staffs'
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => array( 'slug' => 'staff' ),
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array( 'title', 'editor', 'author', 'thumbnail')
  ); 

  register_post_type( 'staff', $args );
}

add_action( 'init', 'register_staff' );


// Custom Staff Categories
register_taxonomy("teams", array("staff"), array("hierarchical" => true, "label" => "teams", "singular_label" => "team", "rewrite" => true));

// Add custom fields to Staff 
add_action("admin_init", "admin_init");
 
function admin_init(){
  add_meta_box("full_name_meta", "Full Name", "full_name", "staff", "normal", "high");
  add_meta_box("job_title_meta", "Job Title", "job_title", "staff", "normal", "high");
}
 
function full_name(){
  global $post;
  $custom = get_post_custom($post->ID);
  $full_name = $custom["full_name"][0];
  ?>
  <label>Full Name:</label>
  <input name="full_name" value="<?php echo $full_name; ?>" />
  <?php
}
 
function job_title() {
  global $post;
  $custom = get_post_custom($post->ID);
  $job_title = $custom["job_title"][0];
  ?>
  <label>Job title:</label>
  <input name="job_title" value="<?php echo $job_title; ?>" />
  <?php
}

add_action('save_post', 'save_details');

function save_details(){
  global $post;
 
  update_post_meta($post->ID, "full_name", $_POST["full_name"]);
  update_post_meta($post->ID, "job_title", $_POST["job_title"]);
}
?>