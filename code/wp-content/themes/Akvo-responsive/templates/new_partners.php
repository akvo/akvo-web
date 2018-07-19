<?php
	
	
	$partner_fields = array(
		'partners_link'		=> '',
	);
		
	foreach( $partner_fields as $slug => $field ){
		$partner_fields[ $slug ] = esc_html( get_post_meta( get_the_ID(), $slug, true ) );
	}
	
	
?>
<!-- Display featured image in right-aligned floating div -->
<div class="imgWrapper">
	<?php the_post_thumbnail(); ?>
</div>
<a style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;" href='<?php _e( $partner_fields['partners_link'] );?>'></a>

	
