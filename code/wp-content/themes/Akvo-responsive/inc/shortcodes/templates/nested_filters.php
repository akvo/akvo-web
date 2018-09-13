<div class='nested-filters'>
	<h1 class="backLined"><?php _e( $atts['title'] );?></h1>  
	<nav class="anchorNav wrapper" data-behaviour='double-filters' data-target='#archive-results'>
		<?php $this->print_terms_list( $atts['primary_filter'], 'location', 'primary', $atts['label_all'] );?>
		<br/>
		<?php $this->print_terms_list( $atts['secondary_filter'], 'group', 'secondary' );?>
	</nav>
	<section class="wrapper" id='archive-results'>
	<?php 
		$filters = array( $atts['primary_filter'], $atts['secondary_filter'] );
		echo do_shortcode('[akvo_custom_posts filters="'.implode( ',', $filters ).'" post_type="'.$atts['post_type'].'" showposts="'.$atts['showposts'].'"]');
	?>
	</section>
</div>