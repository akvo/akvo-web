<?php	
	class AKVO_SHORTCODE_NESTED_FILTERS extends AKVO_SHORTCODE{
		
		function __construct(){
			
			$this->shortcode = 'akvo_nested_filters';
			$this->template = 'nested_filters.php';
			
			parent::__construct();	
			
		}
		
		function unique_atts(){
			return array('post_type', 'showposts', 'primary_filter', 'secondary_filter');
		}
		
		function get_default_atts(){
			return array( 
				'title' 			=> '', 
				'post_type'			=> '', 
				'primary_filter' 	=> '', 
				'secondary_filter'	=> '',
				'showposts'			=> 100,
				//'cache'				=> '4'
			);
		}
		
		/* GET TERMS FOR PRIMARY AND SECONDARY FILTERS */
		function get_terms( $taxonomy ){
			
			$terms = array();
			if( $taxonomy ){
				$terms = get_terms( $taxonomy );
			}
			
			return $terms;
		}
		
		function print_terms_list( $taxonomy, $list_class, $filter_type, $global_text = '' ){
			
			$terms = $this->get_terms( $taxonomy );
			
			
			if( count( $terms ) ):
				echo "<ul>";
			
				if( $global_text ):
				
				?>
				<li class="<?php _e( $list_class );?>">
					<a href="#" data-filter='primary'><?php _e( $global_text );?></a>
				</li>
				<?php endif;
				
				/* ITERATING THROUGH THE LIST OF TERMS AND PRINTING THEM AS THE PART OF THE LIST */
				foreach( $terms as $term ):?>
				<li class="<?php _e( $list_class );?>">
					<a href="#" data-filter='<?php _e( $filter_type );?>' data-tax='<?php _e( $term->taxonomy );?>' data-id='<?php _e( $term->term_id );?>'><?php _e( $term->name );?></a>
				</li>
				<?php endforeach;
			
				echo "</ul>";
			endif;
		}
		
	}
	
	new AKVO_SHORTCODE_NESTED_FILTERS;