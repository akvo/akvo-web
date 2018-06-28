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
		<?php the_post_thumbnail(); ?>
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
