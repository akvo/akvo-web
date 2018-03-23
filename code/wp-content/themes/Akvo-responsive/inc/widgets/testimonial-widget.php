<?php

	add_action( 'widgets_init', create_function( '', 'register_widget("testimonial_widget");' ) );

	class testimonial_widget extends AKVO_WIDGET{
		/**
		 * Constructor
		 **/
		public function __construct(){
			
			parent::__construct( 'testimonial_widget', 'Testimonial Widget', 'Blah blah' );

		}

		public function widget( $args, $instance ){
		?>	
			<div class='testimonial-widget'>
				<img class='testimonial-image' src="<?php _e( $instance['image'] );?>" />
				<div class='testimonial-quote'><?php _e( $instance['testimonial'] );?></div>
				<div class='testimonial-title'><?php _e( $instance['title'] );?></div>
			</div>
			
			<style>
				.testimonial-widget{
					padding: 20px;
					text-align: center;
					border: red solid 1px;
				}
				.testimonial-widget .testimonial-title{
					margin-top: 20px;
				}
			</style>
		<?php
		}
		
		public function get_widget_fields(){
			return array(
				'image'	=> array(
					'type'		=> 'image',
					'title'		=> 'Image'
				),
				'testimonial'	=> array(
					'type'		=> 'tinymce',
					'title'		=> 'Content',
					'default'	=> ''
				),
				'title'	=> array(
					'type'		=> 'text',
					'title'		=> 'Title',
					'default'	=> 'Untitled'
				),
			);
		}
		
		
	}