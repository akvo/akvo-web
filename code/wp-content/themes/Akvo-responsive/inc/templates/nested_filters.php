<style type="text/css">
	.nested-filters .wrapper.center {text-align:center;margin:0 auto;}
	.nested-filters nav.anchorNav,.nested-filters nav.anchorNav2 {padding:15px 0px;}
	.nested-filters nav.anchorNav,.nested-filters nav.anchorNav2 {background:none!important;}
	.nested-filters ul li.location a {color:#202024!important;border-radius:0px!important;}
	.nested-filters ul li.location a:hover,.nested-filters ul li.location a.active {color:#202024!important;background:#f0f0f0!important;box-shadow:none!important;}
	.nested-filters ul li.group a {color:#797979!important;border-radius:0px!important;}
	.nested-filters ul li.group a:hover,.nested-filters ul li.group a.active {color:#797979!important;background:#f0f0f0!important;box-shadow:none!important;}
	
	.nested-filters ul.staff {padding:0px!important;width:100%!important;}
	.nested-filters ul.staff li {width: 29%;padding: 2%;margin:0!important;}
	.nested-filters ul.staff li div.imgWrapper {background:#fff!important;padding:0px!important;width:100%!important;max-height: 217px;overflow: hidden;}
	.nested-filters ul.staff li:nth-child(3n+1){clear:left;}
	
	
	
	.nested-filters ul.staff.new_partners{padding:0px!important;width:100%!important;}
	.nested-filters ul.staff.new_partners li {width: 21%;padding: 2%;margin:0!important;min-height:auto!important;}
	.nested-filters ul.staff.new_partners li div.imgWrapper {background:#fff!important;padding:0px!important;width:100%!important;max-height: 217px;overflow: hidden;}
	.nested-filters ul.staff.new_partners li:nth-child(4n+1){clear:left;}
	.nested-filters ul.staff.new_partners li img {
		-webkit-filter: grayscale(100%); /* Safari 6.0 - 9.0 */
		filter: grayscale(100%);
	}
	.nested-filters ul.staff.new_partners li:hover img {
		-webkit-filter: none!important; /* Safari 6.0 - 9.0 */
		filter: none!important;
	}
	.nested-filters ul.staff.new_partners .staffName{text-align:center!important;}
	
	@media screen and ( max-width: 1024px ) and ( min-width: 768px ){
		.nested-filters ul.staff li {width:46%;}
		.nested-filters ul.staff li div.imgWrapper {max-height:350px;}
		.nested-filters ul.staff li:nth-child(3n+1){clear:none;}
		.nested-filters ul.staff li:nth-child(2n+1){clear:left;}
		
		.nested-filters ul.staff.new_partners li {width:29%;}
		.nested-filters ul.staff.new_partners li div.imgWrapper {max-height:350px;}
		.nested-filters ul.staff.new_partners li:nth-child(4n+1){clear:none;}
		.nested-filters ul.staff.new_partners li:nth-child(3n+1){clear:left;}

	}

	@media screen and ( max-width: 768px ){
		.nested-filters nav.anchorNav ul li,.nested-filters nav.anchorNav2 ul li {background:none!important;display:inline-block!important;padding:10px!important;} 
		.nested-filters nav.anchorNav ul li a,.nested-filters nav.anchorNav2 ul li a {font-size:16px!important;}
		.nested-filters ul.mobilehidesorting {display:none;}
		.nested-filters ul.staff li div.imgWrapper {max-height:350px;}
		.nested-filters ul.staff li {width:96%;}
		
		.nested-filters ul.staff.new_partners li div.imgWrapper {max-height:350px;}
		.nested-filters ul.staff.new_partners li {width:46%;}
		.nested-filters ul.staff.new_partners li:nth-child(2n+1){clear:left;}

	}
	
	@media screen and ( max-width: 400px ){
		.nested-filters ul.staff.new_partners li {width:97%;}
		.nested-filters ul.staff.new_partners li:nth-child(2n+1){clear:none;}
	}

</style>
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
	<h1 class="backLined" style="color:#000;font-weight:bold;"><?php _e( $atts['title'] );?></h1>  
	<nav class="anchorNav wrapper" style="box-sizing: border-box;" data-behaviour='double-filters' data-target='#partnershipGroup'>
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