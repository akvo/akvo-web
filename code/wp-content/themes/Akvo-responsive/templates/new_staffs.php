<?php
		
	$staff_fields = array(
		//'staff_name'		=> '',
		'staff_title'		=> '',
		'staff_twitter'		=> '',
		'staff_linkedin'	=> '',
		'staff_blog'		=> ''
	);
		
	foreach( $staff_fields as $slug => $field ){
		$staff_fields[ $slug ] = esc_html( get_post_meta( get_the_ID(), $slug, true ) );
	}
	
	
	
?>

	<!-- Display featured image in right-aligned floating div -->
	<div class="imgWrapper">
	<?php
		
		$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
		if( is_array( $thumbnail ) ){
			_e( "<img data-behaviour='unveil' src='".get_bloginfo('template_url')."/images/chruch.png' data-src='".$thumbnail[0]."' width='".$thumbnail[1]."' height='".$thumbnail[2]."' />" );
		}
		
	?>
		
	<?php //the_post_thumbnail(); ?>
	</div>
	<!-- Display Title and Name -->
	<div class="staffName"><?php the_title(); ?></div>
	<p class="staffTitle"><?php _e( $staff_fields['staff_title'] ); ?></p>
	<!-- Display LINKS -->
	<p>
		<?php if( $staff_fields['staff_twitter'] ):?>
		<a href="<?php _e( $staff_fields['staff_twitter'] ); ?>" target="_blank"><i class="fa fa-twitter" style="font-size:20px;padding:10px;"></i></a>
		<?php endif;?>
		<?php if( $staff_fields['staff_linkedin'] ):?>
		<a href="<?php _e( $staff_fields['staff_linkedin'] ); ?>" target="_blank"><i class="fa fa-linkedin" style="font-size:20px;padding:10px;"></i></a>
		<?php endif;?>
		<?php if( $staff_fields['staff_blog'] ):?>
		<a href="<?php _e( $staff_fields['staff_blog'] ); ?>" style="float:right;margin-top:8px;padding-right:10px;">Read my Blogs</a>
		<?php endif;?>
	</p>
