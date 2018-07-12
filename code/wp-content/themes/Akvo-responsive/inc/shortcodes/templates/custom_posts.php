<?php
	_e('<ul class="staff floats-in '.$atts['post_type'].'">');
	
	$the_query = new WP_Query( array( 'post_type' => $atts['post_type'], 'showposts' => $atts['showposts'], ) );
	
	if( $the_query->have_posts() ):
		
		/* CONVERT THE COMMA SEPERATED LIST INTO ARRAY */
		$filters = explode(',', $atts['filters'] );
		
		while( $the_query->have_posts() ) : $the_query->the_post();
			
			$data_str = "data-item='1'";
			
			if( count( $filters ) ){
				$terms = $this->get_the_terms( $filters, get_the_ID() );
				
				foreach( $terms as $slug => $ids ){
					$data_str .= " data-".$slug."='".implode( ' ', $ids )."'";			/* ACCUMULATING DATA STRING FROM TERMS */
				}
			}
					
			_e( '<li id="post-'.get_the_ID().'" '.$data_str.'>' );
			get_template_part( 'templates/'.$atts['post_type'] );
			_e('</li>');
					
		endwhile;
	endif;	
	wp_reset_query();
	_e('</ul>');