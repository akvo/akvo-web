<?php
/*
	Widget Name: Akvo Downloads Dropdown
	Description: Downloads Dropdown - created for organisations page
	Author: Samuel Thomas, Akvo
	Author URI: 
	Widget URI: 
	Video URI: 
*/

class Akvo_Downloads_Dropdown extends SiteOrigin_Widget {
	
	function __construct() {
		//Here you can do any preparation required before calling the parent constructor, such as including additional files or initializing variables.

		//Call the parent constructor with the required arguments.
		parent::__construct(
			// The unique id for your widget.
			'akvo-downloads-dropdown',

			// The name of the widget for display purposes.
			__('Akvo Downloads Dropdown', 'siteorigin-widgets'),

			// The $widget_options array, which is passed through to WP_Widget.
			// It has a couple of extras like the optional help URL, which should link to your sites help or support page.
			array(
				'description' => __('Downloads Dropdown - created for organisations page', 'siteorigin-widgets'),
				'help'        => '',
			),

			//The $control_options array, which is passed through to WP_Widget
			array(),

			//The $form_options array, which describes the form fields used to configure SiteOrigin widgets. We'll explain these in more detail later.
			array(
				'downloads' => array(
					'type' 	=> 'repeater',
					'label' => __( 'Downloads Section' , 'siteorigin-widgets' ),
					'item_name'  => __( 'Repeater item', 'siteorigin-widgets' ),
					'fields' => array(
						'label' => array(
							'type' => 'text',
							'label' => __( 'Download Label', 'siteorigin-widgets' )
						),
						'link' => array(
							'type' => 'text',
							'label' => __( 'Download Link', 'siteorigin-widgets' )
						),
					)
				)
			),

			//The $base_folder path string.
			get_template_directory()."/so-widgets/akvo-downloads-dropdown"
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
siteorigin_widget_register('akvo-downloads-dropdown', __FILE__, 'Akvo_Downloads_Dropdown');