<?php

class AkvoHomepageWidget extends WP_Widget {
    private $textDomain = 'akvohomepagewidget';
	function __construct() {
		// Instantiate the parent object
		parent::__construct(
	 		'akvo_homepage_widget', // Base ID
			'Akvo Homepage Widget', // Name
			array( 'description' => __( 'Widget with title, image background and link'), ) // Args
		);
        
        add_action('admin_enqueue_scripts', array($this, 'upload_scripts'));
	}
    
    /**
     * Upload the Javascripts for the media uploader
     */
    public function upload_scripts()
    {
        wp_enqueue_script('media-upload');
        wp_enqueue_script('thickbox');
        wp_register_script(
            'upload-media-widget',
            plugins_url('upload-media.js',__FILE__),
            array('thickbox'),
            '1.0',
            true
        );
        wp_enqueue_script('upload-media-widget');
        wp_enqueue_style('thickbox');
        
    }
    
    
	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
        extract( $args );
		echo $before_widget;
        ?>
        <div class="videoIcon">
          <h3><a href="<?php echo $instance['link'];?>"><?php echo $instance['title'];?></a></h3>
    <!--      <hr class="delicateSmall"> -->      
          <div>
            <figure>
                <div> <a href="<?php echo $instance['link'];?>" style="background-image: url(<?php echo $instance['background_image'];?>)" alt="<?php echo $instance['title'];?>"></a></div>
              <figcaption><a href="<?php echo $instance['link'];?>"><?php echo $instance['link_title'];?>  &raquo;</a></figcaption>
            </figure>
          </div>
        </div>
        
        <?php
        echo $after_widget;
    
        
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['background_image'] = strip_tags( $new_instance['background_image'] );
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['link'] = strip_tags( $new_instance['link'] );
		$instance['link_title'] = strip_tags( $new_instance['link_title'] );

		return $instance;
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
			$bgImage = ( isset( $instance[ 'background_image' ] ) ) ? $instance[ 'background_image' ] : '';
			$title = ( isset( $instance[ 'title' ] ) ) ? $instance[ 'title' ] : '';
			$link = ( isset( $instance[ 'link' ] ) ) ? $instance[ 'link' ] : '/';
			$linkTitle = ( isset( $instance[ 'link_title' ] ) ) ? $instance[ 'link_title' ] : '';
		?>
        <p>
            <label for="<?php echo $this->get_field_name( 'background_image' ); ?>"><?php _e( 'Image:' ); ?></label>
            <input name="<?php echo $this->get_field_name( 'background_image' ); ?>" id="<?php echo $this->get_field_id( 'background_image' ); ?>" class="widefat" type="hidden" size="36"  value="<?php echo esc_url( $bgImage ); ?>" />
            <br />
            <img src="<?php echo esc_url( $bgImage ); ?>" id="image_upload_example_<?php echo $this->get_field_id( 'background_image' ); ?>" width="50%" class="upload_image_button" data-input="<?php echo $this->get_field_id( 'background_image' ); ?>" />
            <br />
            <input class="upload_image_button button button-primary" type="button" value="Upload image" data-input="<?php echo $this->get_field_id( 'background_image' ); ?>" />
        </p>
		<p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
            <input class="widefat" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $title;?>" />
		</p>
		
        <p>
            <label for="<?php echo $this->get_field_id('link'); ?>"><?php _e('Link:'); ?></label>
            <input class="widefat" name="<?php echo $this->get_field_name( 'link' ); ?>" value="<?php echo $link;?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('link_title'); ?>"><?php _e('Link title:'); ?></label>
            <input class="widefat" name="<?php echo $this->get_field_name( 'link_title' ); ?>" value="<?php echo $linkTitle;?>" />
        </p>
		
		
        
		<?php 
	}
}


?>