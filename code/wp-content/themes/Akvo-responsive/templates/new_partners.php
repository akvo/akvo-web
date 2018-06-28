<?php
	
	/*
	$staff_fields = array(
		'staff_name'		=> '',
		'staff_title'		=> '',
		'staff_twitter'		=> '',
		'staff_linkedin'	=> '',
		'staff_blog'		=> ''
	);
		
	foreach( $staff_fields as $slug => $field ){
		$staff_fields[ $slug ] = esc_html( get_post_meta( get_the_ID(), $slug, true ) );
	}
	
	*/
	
?>
<!-- Display featured image in right-aligned floating div -->
<div class="imgWrapper">
	<?php the_post_thumbnail(); ?>
</div>
<!-- Display Title and Name -->
<div class="staffName"><?php the_title(); ?></div>
	
