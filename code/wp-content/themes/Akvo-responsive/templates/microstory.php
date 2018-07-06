<?php
	
	global $post;
	
	$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
	if( is_array( $thumbnail ) ){
		$url = $thumbnail[0];
	}
	
	/* MAKE THE HTML MARKUP SIMILAR TO THE ONE IN REGIONAL PAGES, SO THAT IT CAN BE REUSED THERE ALSO */
	
?>
<a href='<?php the_permalink();?>'>
<!-- Display featured image in right-aligned floating div -->
<div class="imgWrapper" style="background-image: url('<?php echo $url;?>');">
	<div class='excerpt'><?php the_excerpt();?></div>
</div>
<!-- Display Title and Name -->
<div class="staffName"><?php the_title(); ?></div>
</a>
	
	
