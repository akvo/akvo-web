<?php
/*
	Widget Name: Akvo Map Markers
	Description: To add markers of hubs on the map - Inspired from Contact Info
	Author: Samuel Thomas, Akvo
	Author URI: 
	Widget URI: 
	Video URI: 
*/

class Akvo_Map_Markers extends SiteOrigin_Widget {
	
	function __construct() {
		//Here you can do any preparation required before calling the parent constructor, such as including additional files or initializing variables.

		//Call the parent constructor with the required arguments.
		parent::__construct(
			// The unique id for your widget.
			'akvo-map-markers',

			// The name of the widget for display purposes.
			__('Akvo Map Markers', 'siteorigin-widgets'),

			// The $widget_options array, which is passed through to WP_Widget.
			// It has a couple of extras like the optional help URL, which should link to your sites help or support page.
			array(
				'description' => __('To add markers of hubs on the map - Inspired from Contact Info', 'siteorigin-widgets'),
				'help'        => '',
			),

			//The $control_options array, which is passed through to WP_Widget
			array(),

			//The $form_options array, which describes the form fields used to configure SiteOrigin widgets. We'll explain these in more detail later.
			array(
				'map' => array(
					'type' 	=> 'media',
					'label' 	=> __( 'Upload Map', 'siteorigin-widgets' ),
					'choose' 	=> __( 'Choose image', 'siteorigin-widgets' ),
					'update' 	=> __( 'Set image', 'siteorigin-widgets' ),
					'library' 	=> 'image',
					'fallback' 	=> true
				),
				'markers' 	=> array(
					'type' 			=> 'repeater',
					'label' 		=> __( 'Markers' , 'siteorigin-widgets' ),
					'item_name'  	=> __( 'Marker', 'siteorigin-widgets' ),
					'fields' => array(
						'image' => array(
							'type' 		=> 'media',
							'label' 	=> __( 'Choose Image', 'siteorigin-widgets' ),
							'choose' 	=> __( 'Choose image', 'siteorigin-widgets' ),
							'update' 	=> __( 'Set image', 'siteorigin-widgets' ),
							'library' 	=> 'image',
							'fallback' 	=> false
						),
						'left' => array(
							'type' 		=> 'number',
							'label' 	=> __( 'X-Axis', 'siteorigin-widgets' ),
							'default' 	=> '0'
						),
						'top' => array(
							'type' 		=> 'number',
							'label' 	=> __( 'Y-Axis', 'siteorigin-widgets' ),
							'default' 	=> '0'
						),
						'link' => array(
							'type' 	=> 'text',
							'label' => __( 'Link', 'siteorigin-widgets' )
						),
					)
				)
			),

			//The $base_folder path string.
			get_template_directory()."/so-widgets/akvo-map-markers"
		);
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
siteorigin_widget_register('akvo-map-markers', __FILE__, 'Akvo_Map_Markers');