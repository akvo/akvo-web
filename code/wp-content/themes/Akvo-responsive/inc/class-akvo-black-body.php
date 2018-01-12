<?php
	class akvoBlackBody{
		
		function projects( $el ){
			if( have_rows( $el ) ){
				_e('<ul class="list-inline text-center">');
			
				while(have_rows('projects')): the_row();
					_e('<li><figure>');
					_e('<img src="'. get_sub_field('image') .'">');
					_e('<figcaption>'. get_sub_field('title') .'</figcaption>');
					_e('<p>'. get_sub_field('description') .'</p>');
					_e('</figure></li>');
				endwhile;
				_e('</ul>');
			}
		}
		
		function section_break( $el ){
			echo '<hr class="delicate">';
		}
		
		function contacts_section( $el ){
			
			_e('<h1>'.get_field( $el.'_heading' ).'</h1>');
			_e('<div class="row">');
			while(have_rows('contacts')){ 
				the_row();
				_e('<div class="col-6">');
				_e('<div class="map-icon"></div>');
				_e('<div class="map-addr">'.get_sub_field( $el.'_address' ).'</div>');
				_e('<div style="clear:both"></div>');
				_e('</div>');
			}
			_e('</div>');	
		}
		
		function intro_section( $el ){
			
			$overlay_image = get_field('overlay_image');
			if( $overlay_image ){
				_e('<div class="swooch hubEA" style="background-image:url(\''.$overlay_image.'\');"></div>');		
			}
			
			_e('<div class="hubIntro">');
			
			
			
			$this->content_section( $el );
			_e('</div>');
		}
		
		function content_section( $el ){
			$content = get_field( $el );
			if( $content ){
				_e( $content );
			}
		}
		
		function video( $el ){
			
			$video = get_field( $el );
			
			if( $video ):
			?>
			<div style="width: 75%;height: 75%;margin: 0 auto;">
				<iframe width="75%" height="75%" src="https://www.youtube.com/embed/IfgbExC1UV4?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
			</div>
			<?php
			endif;
		}
		
		function logos( $el ){
				
			$content = get_field( $el.'_content' );
				
			if( $content ){
				_e( $content );
				_e( '<ul class="list-scroll">' );
				while( have_rows( $el ) ): the_row();
					_e( '<li class="logo">' );
					_e( '<img src="'. get_sub_field('logo').'">' );
					_e( '</li>' );
				endwhile;
				_e( '</ul>' );
			}
		}
		
		function hubs_list( $el ){
		?>	
			<div class="wrapper">
				<h1>Looking for one of our other offices?</h1>
				<ul class="list-scroll">
					<li class="EU">
						<a href="#" style="background-image:url('<?php bloginfo('template_url');?>/images/location-hexagons_Europe.png');">Netherlands, Amsterdam</a>
						<div class="helloMsg"><h2>Welkom</h2></div>
					</li>
					<li class="WA">						
						<a href="#" style="background-image:url('<?php bloginfo('template_url');?>/images/location-hexagons_WestAfrica.png');">Mali, Bamako</a>
						<div class="helloMsg"><h2>Bienvenue</h2></div>
					</li>
					<li class="EA">						
						<a href="#" style="background-image:url('<?php bloginfo('template_url');?>/images/location-hexagons_EastAfrica.png');">Kenya, Nairobi</a>
						<div class="helloMsg"><h2>Karibu</h2></div>
					</li>
					<li class="IN">							
						<a href="#" style="background-image:url('<?php bloginfo('template_url');?>/images/location-hexagons_SEAsia_SEAP.png');">Indonesia, Bali</a>
						<div class="helloMsg"><h2>Selamat datang</h2></div>
					</li>
					<li class="SA">							
						<a href="#" style="background-image:url('<?php bloginfo('template_url');?>/images/location-hexagons_SouthAsia.png');">India, Delhi</a>
						<div class="helloMsg"><h2>Welcome</h2></div>
					</li>
					<li class="US">							
						<a href="#" style="background-image:url('<?php bloginfo('template_url');?>/images/location-hexagons_Americas.png');">USA, Washington</a>
						<div class="helloMsg"><h2>Welcome</h2></div>
					</li>
				</ul>
			</div>
			
		<?php	
			
		}
		
		/* main function that displays the sections */
		function display_sections( $sections ){
			foreach( $sections as $section => $el ){
				if(is_array( $el )){
					
					$section_id = $section;
					$section_class = '';
					$section_styles = '';
					
					if( isset( $el['id'] ) ){ $section_id = $el['id'];}
					if( isset( $el['class'] ) ){ $section_class = $el['class'];}
					if( isset( $el['bg_image'] ) ){
						
						$bg_image = get_field( $el['bg_image'] );
						
						// ADDING BG IMAGE TO THE SECTION 
						if( $bg_image ){
							$section_styles = "background-image: url('". $bg_image ."');";	
						}
						
						
					}
					
					if( isset( $el['fn'] ) ){
						
						_e('<section class="'.$section_class.'" id="'.$section_id.'" style="'.$section_styles.'">');
						
						if( isset( $el['wrapper'] ) && $el['wrapper'] ){
							_e('<div class="wrapper">');
						}
						
						// SECTION FUNCTION
						call_user_func_array( array( $this, $el['fn'] ), array( $section ) );
						
						// LINK TO NEXT SECTION
						if( isset( $el['next_link'] ) ){
							
							if( !isset( $el['next_link_class'] ) ){ $el['next_link_class'] = 'nxtSection'; }
							
							_e('<a href="'.$el['next_link'].'" class="'.$el['next_link_class'].'"></a>');
						}
						
						if( isset( $el['wrapper'] ) && $el['wrapper'] ){
							_e('</div>');
						}
						
						_e('</section>');
					}
				}
			} 
		}
		

	}
	
