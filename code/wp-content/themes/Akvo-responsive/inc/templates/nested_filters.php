<?php
	
	$primary_terms = array();
	if( $atts['primary_filter'] ){
		$primary_terms = get_terms( $atts['primary_filter'] );
	}
	
	$secondary_terms = array();
	if( $atts['secondary_filter'] ){
		$secondary_terms = get_terms( $atts['secondary_filter'] );
	}
	
	
?>
<div class='nested-filters'>
	<h1 class="backLined"><?php _e( $atts['title'] );?></h1>  
	<nav class="anchorNav wrapper" data-behaviour='double-filters' data-target='#partnershipGroup'>
		<?php if( count( $primary_terms ) ):?>
		<ul>
			<li class="location">
				<a href="#" data-filter='primary'>Global</a>
			</li>
			<?php foreach( $primary_terms as $term ):?>
			<li class="location">
				<a href="#" data-filter='primary' data-tax='<?php _e( $term->taxonomy );?>' data-id='<?php _e( $term->term_id );?>'><?php _e( $term->name );?></a>
			</li>
			<?php endforeach;?>
		</ul>
		<?php endif; ?>
		<br/>
		<?php if( count( $secondary_terms ) ):?>
		<ul class="mobilehidesorting">
			<?php foreach( $secondary_terms as $term ):?>
			<li class="group">
				<a href="#" data-filter='secondary' data-tax='<?php _e( $term->taxonomy );?>' data-id='<?php _e( $term->term_id );?>'><?php _e( $term->name );?></a>
			</li>
			<?php endforeach;?>
		</ul>
		<?php endif;?>
	</nav>
	<section class="wrapper">
		<div id="partnershipGroup">
		<?php 
			_e('<ul class="staff floats-in '.$atts['post_type'].'">');
			$the_query = new WP_Query( array( 'post_type' => $atts['post_type'], 'showposts' => $atts['showposts'], ) );
			if( $the_query->have_posts() ):
				while( $the_query->have_posts() ) : $the_query->the_post();
					
					/* GET POST TERMS FROM SELECTED TAXONOMIES */
					$terms = array();
					foreach( array( $atts['primary_filter'], $atts['secondary_filter'] ) as $tax ){
						if( $tax ){
							$post_terms = get_the_terms( get_the_ID(), $tax );
							if( is_array( $post_terms ) ){
								foreach( $post_terms as $post_term ){
									$terms[ $tax ] = $post_term->term_id;
								}
							}
						}
					}
					
					
					$data_str = "data-item='1'";
					foreach( $terms as $slug => $id ){
						$data_str .= " data-".$slug."='".$id."'";			/* ACCUMULATING DATA STRING FROM TERMS */
					}
					
					_e( '<li id="post-'.get_the_ID().'" '.$data_str.'>' );
					get_template_part( 'templates/'.$atts['post_type'] );
					_e('</li>');
					
				endwhile;
			endif;	
			wp_reset_query();
			_e('</ul>');
		?>
		</div>
	</section>
</div>