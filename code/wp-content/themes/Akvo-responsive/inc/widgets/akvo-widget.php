<?php 
	
	class AKVO_WIDGET extends WP_Widget{
		/**
		 * Constructor
		 **/
		public function __construct( $slug, $title, $desc ){
			
			$widget_ops = array(
				'classname' => $slug,
				'description' => $desc
			);
			
			parent::__construct( $slug, $title, $widget_ops );

			add_action('admin_enqueue_scripts', array($this, 'upload_scripts'));
		}

		/**
		 * Upload the Javascripts for the media uploader
		 */
		public function upload_scripts(){
			
			$upload_js = get_bloginfo('template_url') . '/js/upload-media-widget.js';
			
			wp_enqueue_media();
			
			wp_enqueue_editor();
			/*
			wp_enqueue_script('media-upload');
			wp_enqueue_script('thickbox');
			*/
			wp_enqueue_script('upload_media_widget', $upload_js, array('jquery'), '1.0.8' );

			//wp_enqueue_style('thickbox');
			
			
		}

		
		public function widget( $args, $instance ){
			
		}
		
		/**
		 * Displays the form for this widget on the Widgets page of the WP Admin area.
		 *
		 * @param array  An array of the current settings for this widget
		 * @return void
		 **/
		public function form( $instance ){
			
			$defaults = array( 'type' => 'news'); 
			$instance = wp_parse_args( (array) $instance, $defaults );
			
			$fields = $this->get_widget_fields();
			
			foreach( $fields as $slug => $field ){
				
				// SETTING FIELD DEFAULT
				if( isset( $field[ 'default' ] ) ){
					$field[ 'val' ] = $field[ 'default' ];
				}
				
				// SETTING FIELD VALUE
				if( isset( $instance[ $slug ] ) ){
					$field[ 'val' ] = $instance[ $slug ];
				}
				
				$this->field_html( $slug, $field );
			}
			
		}
		
		public function field_html( $slug, $field ){
			
			_e("<p>");
			_e("<label for='".$this->get_field_name( $slug )."'>". $field['title'] ."</label>");
			
			if( $field[ 'type' ] == 'text' ){
				_e("<input class='widefat' id='".$this->get_field_id( $slug )."' name='".$this->get_field_name( $slug )."' type='text' value='".esc_attr( $field['val'] )."' />");
			}
			elseif( $field[ 'type' ] == 'textarea' ){
				_e("<textarea rows='5' class='widefat' id='".$this->get_field_id( $slug )."' name='".$this->get_field_name( $slug )."'>".$field['val']."</textarea>");
			}
			elseif( $field[ 'type' ] == 'tinymce' ){
				_e("<textarea data-behaviour='tinymce' rows='10' class='widefat' id='".$this->get_field_id( $slug )."' name='".$this->get_field_name( $slug )."'>".$field['val']."</textarea>");
			}
			elseif( $field[ 'type' ] == 'dropdown' ){
				_e("<select id='".$this->get_field_id( $slug )."' name='".$this->get_field_name( $slug )."' class='widefat' style='width:100%;'>");
				foreach( $field['options'] as $opt_slug => $opt_val ){
					_e("<option ");
					if( $opt_slug == $field['val'] ){ _e("selected='selected' "); } 
					_e("value='".$opt_slug."'>".$opt_val."</option>");
				}
				_e("</select>");
			}
			elseif( $field[ 'type' ] == 'image' ){
				_e("<input name='".$this->get_field_name( $slug )."' id='".$this->get_field_id( $slug )."' class='widefat' type='text'  value='".$field['val']."' />");
				_e("<input data-img='#".$this->get_field_id( $slug )."' class='upload_image_button' type='button' value='Upload Image' style='margin-top:5px;' />");
			}
			
			_e("</p>");
		}
		
		public function update( $new_instance, $old_instance ) {
			
			$updated_instance = $new_instance;
			return $updated_instance;
		}

		public function get_widget_fields(){
			return array();
		}	
	}