<?php
	
	class akvoBlackBody{
		
		function get_templates(){
			return array('regionalPage.php', 'homepage-2018.php', 'microStoryPage.php');
		}
		
		function funnel_section(){
			include("funnel.php");
		}
		
		function projects( $el ){
			if( have_rows( $el ) ){
				_e('<ul class="list-inline text-center">');
			
				while(have_rows('projects')): the_row();
					_e('<li><figure>');
					
					$image = get_sub_field('image');
					if( $image ){
						_e('<img src="'. $image .'" />');
					}
					
					$caption = get_sub_field('title');
					if( $caption ){
						_e('<figcaption>'. $caption .'</figcaption>');
					}
					
					$desc = get_sub_field('description');
					if( $desc ){
						_e('<p>'. $desc .'</p>');
					}
					
					$link = get_sub_field('link');
					if( $link ){
						_e('<a href="'. $link .'"></a>');
					}
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
			
			
			$col_class = 'col-12';
			
			$col_count = count( get_field('contacts') );
			
			if( $col_count == 2 ){ $col_class = 'col-6';}
			if( $col_count == 3 ){ $col_class = 'col-4';}
			
			_e('<div class="row">');
			while(have_rows('contacts')){ 
				the_row();
				_e('<div class="'.$col_class.' col-contact"><div class="contact">');
				_e('<div class="map-icon"><a href="'.get_sub_field( $el.'_link' ).'"></a></div>');
				_e('<div class="map-addr">'.get_sub_field( $el.'_address' ).'</div>');
				_e('<div style="clear:both"></div>');
				_e('</div></div>');
			}
			_e('</div>');	
		}
		
		function intro_section( $el ){
			
			
			$overlay_image = get_field('overlay_image');
			if( $overlay_image ){
				_e('<div class="swooch hubEA" style="background-image:url(\''.$overlay_image.'\');"></div>');		
			}
			
			_e('<div class="hubIntro">');
			
			/* LANGUAGES */
			if( have_rows('languages') ){
				$num_languages = count( get_field('languages') );
				_e('<ul class="list-inline text-center">');
				$language_i = 1; while( have_rows('languages') ): the_row();?>
					<li><a <?php if( get_sub_field('is_active') ){ _e("class='active'");} ?> href="<?php the_sub_field('link');?>"><?php the_sub_field('text');?></a></li>
					<?php if( $language_i < $num_languages ):?><li>/</li><?php endif;?>
				<?php $language_i++;endwhile;
				_e('</ul>');
			}
			
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
			$hubs = array(
				array(
					'class'		=> 'EU',
					'bg_image'	=> get_bloginfo('template_url').'/images/location-hexagons_Europe.png',
					'text'		=> 'Netherlands, Amsterdam',
					'helloMsg'	=> 'Welkom'
				),
				array(
					'class'		=> 'WA',
					'bg_image'	=> get_bloginfo('template_url').'/images/location-hexagons_WestAfrica.png',
					'text'		=> 'Mali, Bamako',
					'helloMsg'	=> 'Bienvenue'
				),
				array(
					'class'		=> 'EA',
					'bg_image'	=> get_bloginfo('template_url').'/images/location-hexagons_EastAfrica.png',
					'text'		=> 'Kenya, Nairobi',
					'helloMsg'	=> 'Karibu'
				),
				array(
					'class'		=> 'IN',
					'bg_image'	=> get_bloginfo('template_url').'/images/location-hexagons_SEAsia_SEAP.png',
					'text'		=> 'Indonesia, Bali',
					'helloMsg'	=> 'Selamat datang'
				),
				array(
					'class'		=> 'SA',
					'bg_image'	=> get_bloginfo('template_url').'/images/location-hexagons_SouthAsia.png',
					'text'		=> 'India, Delhi',
					'helloMsg'	=> 'Welcome'
				),
				array(
					'class'		=> 'US',
					'bg_image'	=> get_bloginfo('template_url').'/images/location-hexagons_Americas.png',
					'text'		=> 'USA, Washington',
					'helloMsg'	=> 'Welcome'
				),
			);
			_e("<h1>Looking for one of our other offices?</h1>");
			_e('<ul class="list-scroll">');
			foreach( $hubs as $hub ){
				_e('<li class="'.$hub['class'].'">');
				_e('<a href="#" style="background-image:url(\''.$hub['bg_image'].'\');">'.$hub['text'].'</a>');
				_e('<div class="helloMsg"><h2>'.$hub['helloMsg'].'</h2></div>');
				_e('</li>');
			}
			_e('</ul>');
			
			
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
	
