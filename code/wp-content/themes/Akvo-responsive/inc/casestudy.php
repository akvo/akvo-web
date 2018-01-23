<?php	
	function casestudy_list() {
		ob_start();
		$tax_query = array();
		$filters = array('region', 'sector');
		
		$i = 0;
		
		foreach($filters as $filter){
			$r_slug = 'akvo_'.$filter;
			
			$taxonomy = get_taxonomy($filter);
			
			if($taxonomy && isset($taxonomy->labels->name)){
				$filters[$filter] = array(
					'slug' 	=> $filter,
					'label' => $taxonomy->labels->name
				);
				if(isset($_GET[$r_slug]) && $_GET[$r_slug]){
					array_push($tax_query, array(
						'taxonomy' 	=> $filter,
						'field' 	=>	'id',
						'terms'		=> $_GET[$r_slug]
					));
				
					$filters[$filter]['id'] = $_GET[$r_slug];
				}
				
			}
			
			unset($filters[$i]);
			$i++;
		}
		
		$paged = 1;
		if(isset($_REQUEST['akvo-paged'])){
			$paged = $_REQUEST['akvo-paged'];
		}
		
		$args = array(
			'post_type' 		=> 'case-study', 
			'posts_per_page' 	=> get_option( 'posts_per_page' ),
			'paged'				=> $paged,
			'tax_query' 		=> $tax_query
		);
		
		$the_query = new WP_Query( $args );
		include("templates/card-form.php");
		echo '<div id="index-list" data-target="#index-list .row" class="">';
		$i = 0;
		if ( $the_query->have_posts() ) {
			
			
			while ( $the_query->have_posts() ):
				$the_query->the_post();
				global $post_id;
				if($i % 3 == 0 || $i == 0) {echo "<div class='row'>";}
				include("templates/card.php");
				$i++;
				if(($i % 3 == 0) || ($i == $the_query->post_count)) echo "</div>";
			endwhile;
			echo '</div>';
			
			
			if ($the_query->max_num_pages > 1):?>
            <div class="text-center">
            	<a data-behaviour='ajax-loading' data-list="#index-list" id="loadMore" class="btn btn-primary loadMore" data-paged-attr="akvo-paged" href="#">
            		Load More
				</a>
            </div>  
			<?php endif;
			
			
			wp_reset_postdata();
		} else {
			echo "<div>No Items were found.</div>";
		}
		echo '</div>';
		return ob_get_clean();
	}
	add_shortcode( 'casestudy-list', 'casestudy_list' );
	
	function akvo_dropdown_filters($arr){	
		$terms = get_terms(array('taxonomy' => $arr['slug'], 'hide_empty' => false));
		if($terms){
			include "templates/card-filter.php";
		}	
	}
	
	function akvo_card_taxonomy($post_id, $slug){
		$terms = wp_get_post_terms( $post_id, $slug);
		
		if(is_array($terms) && count($terms)){
			return $terms[0]->name;
		}
		return '';
	}
	