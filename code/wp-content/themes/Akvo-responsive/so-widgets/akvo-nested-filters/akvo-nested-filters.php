<?php
/*
	Widget Name: Akvo Nested Filters
	Description: To add nested filters on akvo custom post types 
	Author: Samuel Thomas, Akvo
	Author URI: 
	Widget URI: 
	Video URI: 
*/

class Akvo_Nested_Filters extends SiteOrigin_Widget {
	
	function __construct() {
		//Here you can do any preparation required before calling the parent constructor, such as including additional files or initializing variables.

		//Call the parent constructor with the required arguments.
		parent::__construct(
			// The unique id for your widget.
			'akvo-nested-filters',

			// The name of the widget for display purposes.
			__('Akvo Nested Filters', 'siteorigin-widgets'),

			// The $widget_options array, which is passed through to WP_Widget.
			// It has a couple of extras like the optional help URL, which should link to your sites help or support page.
			array(
				'description' => __('To add nested filters on akvo custom post types', 'siteorigin-widgets'),
				'help'        => '',
			),

			//The $control_options array, which is passed through to WP_Widget
			array(),

			//The $form_options array, which describes the form fields used to configure SiteOrigin widgets. We'll explain these in more detail later.
			array(
				'title' => array(
					'type' 			=> 'text',
					'label' 		=> __( 'Title', 'siteorigin-widgets' ),
					'default' 		=> '',
				),
				'post_type' => array(
					'type' 			=> 'select',
					'label' 		=> __( 'Choose Post Type', 'siteorigin-widgets' ),
					'default' 		=> 'new_staffs',
					'options' 		=> $this->get_post_types(),
					'description'	=> 'Choose from Wordpress Custom Post Types'
				),
				'showposts' => array(
					'type' 			=> 'number',
					'label' 		=> __( 'Total number of Items', 'siteorigin-widgets' ),
					'default' 		=> '100',
					'description'	=> 'Items per request to be shown'
				),
				'label_all' => array(
					'type' 			=> 'text',
					'label' 		=> __( 'Label to show all', 'siteorigin-widgets' ),
					'default' 		=> 'All',
					'description'	=> 'If left empty, the all filter will be hidden'
				),
				'primary_filter' => array(
					'type' 			=> 'select',
					'label' 		=> __( 'Primary Filter', 'siteorigin-widgets' ),
					'default' 		=> 'new_staffs',
					'options' 		=> $this->get_taxonomies(),
					'description'	=> 'Choose Primary Filter from Wordpress Custom Taxonomies'
				),
				'secondary_filter' => array(
					'type' 			=> 'select',
					'label' 		=> __( 'Secondary Filter', 'siteorigin-widgets' ),
					'default' 		=> 'new_staffs',
					'options' 		=> $this->get_taxonomies(),
					'description'	=> 'Choose Secondary Filter from Wordpress Custom Taxonomies'
				),
				'cache' => array(
					'type' 			=> 'number',
					'label' 		=> __( 'Cache expiry time', 'siteorigin-widgets' ),
					'default' 		=> '0',
					'description'	=> 'Number of hours for which the cache will remain valid'
				),
			),

			//The $base_folder path string.
			get_template_directory()."/so-widgets/akvo-nested-filters"
		);
	}
	
	function get_post_types(){
		
		global $akvo_post_type;
		
		$post_types = array();
		
		foreach( $akvo_post_type->post_types as $slug => $post_type ){
			$post_types[ $slug ] = $post_type['name'];
		}
		
		return $post_types;
		
	}
	
	function get_taxonomies(){
		
		global $akvo_post_type;
		
		$taxonomies = array();
	
		foreach( $akvo_post_type->taxonomies as $slug => $tax ){
			$taxonomies[ $slug ] = $tax['labels']['name'];
		}
		
		return $taxonomies;
		
	}
	
	function get_template_name($instance) {
		return 'template';
	}

	function get_template_dir($instance) {
		return 'templates';
	}

    function get_style_name($instance) {
        return '';
    }
}
siteorigin_widget_register('akvo-nested-filters', __FILE__, 'Akvo_Nested_Filters');