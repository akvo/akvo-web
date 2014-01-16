<?php if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_akvo-pricing',
		'title' => 'Akvo Pricing',
		'fields' => array (
			array (
				'key' => 'field_52d7ab45b5ba6',
				'label' => 'Pricing',
				'name' => 'pricing',
				'type' => 'repeater',
				'sub_fields' => array (
					array (
						'key' => 'field_52d7abcab5ba7',
						'label' => 'Price Title',
						'name' => 'price_title',
						'type' => 'text',
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'formatting' => 'html',
						'maxlength' => '',
					),
					array (
						'key' => 'field_52d7abcfb5ba8',
						'label' => 'Price Image',
						'name' => 'price_image',
						'type' => 'image',
						'column_width' => '',
						'save_format' => 'url',
						'preview_size' => 'thumbnail',
						'library' => 'all',
					),
					array (
						'key' => 'field_52d7abeab5ba9',
						'label' => 'Price Description',
						'name' => 'price_description',
						'type' => 'textarea',
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'maxlength' => '',
						'formatting' => 'br',
					),
				),
				'row_min' => '',
				'row_limit' => '',
				'layout' => 'table',
				'button_label' => 'Add Row',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page',
					'operator' => '==',
					'value' => '9535',
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
	register_field_group(array (
		'id' => 'acf_faq',
		'title' => 'FAQ',
		'fields' => array (
			array (
				'key' => 'field_52d68bab5c84b',
				'label' => 'Anchor Title',
				'name' => 'anchor_title',
				'type' => 'text',
				'instructions' => 'No spaces allowed.',
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
					'value' => 'qa_faqs',
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