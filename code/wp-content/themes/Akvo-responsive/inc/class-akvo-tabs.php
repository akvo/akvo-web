<?php
	class akvoTab{
		
		// SHALLOW IMAGE - NEW
		function cover($field){
			$img_src = get_field( $field );
			if( $img_src ):
		?>
			<section>
				<div class="shallow-banner" style="background-image:url(<?php _e( $img_src );?>);"></div>
			</section>
		<?php
			endif;
		}
		
		/* text with shallow or featured image on top */
		function page_section($field, $shallow_banner = false){
			$row_i = 0;
			while(have_rows($field)): the_row();
				$image_flag = false;
				$image_text = get_sub_field('image_text');
				if (strpos($image_text, '<img') !== false) {$image_flag = true;}
					$class = 'full-width-banner';
					
					if($shallow_banner || $row_i || !$image_text){ $class .= ' shallow-banner';}
					if($image_flag){$class .= ' overlay-banner';}
					
			?>
				<section>
					<div class="<?php _e($class);?>" style="background-image:url(<?php _e(get_sub_field('image'));?>);">
						<?php if($image_text):?>
						<a href="<?php _e(get_sub_field('image_link'));?>">
							<?php _e($image_text);?>
						</a>
						<?php endif;?>
					</div>
					<?php $desc = get_sub_field('description');
					if($desc):?><div class='page-section'><?php _e($desc);?></div><?php endif;?>
				</section>
		<?php $row_i++;endwhile;
		}
		
		function counter_css($str){
			
			for( $i = 0; $i <= strlen($str); $i++ ) {
				
				$char = substr( $str, $i, 1 );
					
				if(is_numeric($char)){
					
					_e("<span class='digit'>". $char ."</span>");
				
				}
				else{
					
					_e("<span class='dot'>". $char ."</span>");
				
				}
			}
		}
		
		function time_ticker($el){
			if( have_rows( $el ) ):	
		?>	
			<ul class='list-inline text-center' id="<?php _e($el);?>">
				<?php while(have_rows($el)): the_row();?>
				<li>
					<?php
						$link = get_sub_field('link');
					?>
					<h4><?php if( $link ):?><a href="<?php _e( $link );?>"><?php endif;?><?php the_sub_field('text');?><?php if( $link ):?></a><?php endif;?></h4>
					<div class="timeTicker">            
						<p class="timeSegment clear"><?php $str = get_sub_field('count'); $this->counter_css($str); ?></p>
					</div>
				</li>
				<?php endwhile;?>
			</ul>
			<?php	
			endif;
		}
		
		/* well padded content */
		function inner_section($el){
			
			$section_content = get_field( $el );
			
			if( $section_content ){
			
				_e("<div class='tab-inner-section' id='".$el."'>".$section_content."</div>");
				
			}
		}
		
		/* display an image with center aligned */
		function image($el){
			$image_src = get_field($el);
			if( $image_src ){
				echo "<img id='".$el."' class='aligncenter' src='".get_field($el)."' />";
			}
		}
		
		/* list of inline buttons stacked horizontally */
		function buttons($el){
			
			if( have_rows( $el ) ): 
			
				$video_link = get_field( $el.'_video_link' );
		?>
			<div id="<?php _e($el);?>">
				<ul class="text-center list-inline">
					<?php while( have_rows( $el ) ): the_row();
						
						$desc = get_sub_field('description');
						
						$type = get_sub_field('type');
						
					?>
					<li>
						<?php if($desc):?><h4><?php _e($desc);?></h4><br><?php endif;?>
						<a <?php if( $type ):?>data-behaviour="<?php _e( $type );?>"<?php endif;?> href="<?php the_sub_field('link');?>" title="<?php the_sub_field('text'); ?>" class="button"><?php the_sub_field('text'); ?></a>
					</li>
					<?php endwhile;?>
				</ul>
				<?php if( $video_link ): ?>
				<div id="video" class="videoContainer wrapper">
					<iframe width="600" height="300" frameborder="0" allowfullscreen="" mozallowfullscreen="" webkitallowfullscreen="" src="<?php _e( $video_link );?>"></iframe>
				</div>
				<?php endif;?>
			</div>	
			
			
		<?php
			
			endif;
			
		}
		
		
		
		/* gets the title of the tab */
		function title($el){
			$title = get_field($el['title']."_tab_title");
			
			if(!$title){
				$title = $el['title'];
			}
			return $title;
		}
		
		/**/
		function slugify($text){ 
			$slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $text);
			return strtolower($slug);
		}
		
		/* carousel of multiple images */
		function carousel($el){
			if( have_rows($el) ):
			_e("<ul class='bxslider'>");
			while( have_rows($el) ): the_row();?>
				<li>
					<div class="borderTop"></div>
					<div class="image" style="background-image:url(<?php _e(get_sub_field('image'));?>);">
						<?php if(get_sub_field('image_text')):?>
						<a data-behaviour="anchor-reload" href="<?php _e(get_sub_field('image_link'));?>">
							<?php _e(get_sub_field('image_text'));?>
						</a>
						<?php endif;?>
					</div>
					<div class="borderBottom"></div>
				</li>
			<?php endwhile;
			_e("</ul>");
			endif;
		}
		
		/* GIVEN THE NUMBER OF COLUMNS IN THE ROW, RETURN THE COLUMN CLASS THAT WOULD ADJUST TO THE ROW */
		function get_col_class( $cols ){
			
			if( $cols == 2 ){ return 'col-6';}
			
			if( $cols == 3 ){ return 'col-4';}
			
			if( $cols == 4 ){ return 'col-3';}
			
			return 'col-12';
			
		}
		
		/* testimonials in either 2 cols or 3 cols */
		function testimonials($el){
			
			if( have_rows($el) ):
				
				$col_class = $this->get_col_class( count(get_field( $el ) ) );
				
				$section = 'wrapper';
				if(count(get_field($el)) == 2){
					$section = 'page-section';
				}
				
		?>
			<div class="<?php _e($section);?> testimonials" id="<?php _e($el);?>">	
				<h3 id='<?php _e($el.'_title');?>'><?php the_field($el.'_title');?></h3>
				<div class="row">
					<?php while(have_rows($el)): the_row();$desc = get_sub_field('description');?>
					<div class='<?php _e($col_class);?> text-center'>
						<?php if($desc):?>
						<a href="<?php the_sub_field('link');?>">
							<?php $profile = get_sub_field('profile_picture'); if($profile):?>
							<img class='aligncenter' src="<?php _e( $profile );?>" />
							<?php endif;?>
							
							<?php _e($desc);?>
						</a>
						<?php endif;?>
					</div>	
					<?php endwhile;?>
				</div>
			</div>	
			<div class='clearfix'></div>
			
		<?php	
			endif;
		}
		
		function services_list( $el ){
			
			if( have_rows($el) ):
				
				
				
		?> 
			<div id="<?php _e($el);?>" class="wrapper">
				
				<?php while( have_rows( $el ) ): the_row(); ?>
				<div class="row">
					
					<?php 
						// get the number of columns selected in the dashboard
						$col_class = $this->get_col_class( count( get_sub_field( 'row_list' ) ) );
						
						
					?>
					
					<?php while( have_rows('row_list') ): the_row(); ?>
					
					
					
					<div class="<?php _e( $col_class );?>">
						
						
						<div class="narrow-col">
							
							<!-- ICON FROM FONTAWESOME -->
							<?php $icon = get_sub_field('icon'); if( $icon ):?><h3 class='icon'><i class='fa <?php _e( $icon );?>'></i></h3><?php endif;?>
							<!-- END OF ICON -->
						
							<?php the_sub_field('content');?>
						</div>
						
					</div>
					<?php endwhile; ?>
					
				</div>
				<?php endwhile; ?>
				
			</div>	
		<?php
		
			endif;
		}
		
		
		
		/* OVERVIEW COLUMNS */
		function overview_columns($el){
			
			// CHECK IF THE ELEMENT HAS DATA INPUT
			if( have_rows( $el ) ):
				$col_class = $this->get_col_class( count( get_field( $el ) ) );
		?>
			<div class='row' id="<?php _e($el);?>">
				<?php while(have_rows($el)): the_row();?>
				<div class='<?php _e( $col_class );?> <?php if(get_sub_field('orange_box')){ _e("orange-box");}?> <?php if( get_sub_field('box') ){ _e("colored-box"); }?>'>
					
					<?php $icon = get_sub_field('icon'); if( $icon ):?>
					<img class='aligncenter' src="<?php _e( $icon );?>" />
					<?php endif;?>
					
					<?php the_sub_field('content');?>
				</div>
				<?php endwhile;?>
			</div>
		<?php
			endif;
		}
		
		/* OVERVIEW COLUMNS OF 3 - can be removed once all the product pages are standardised */
		function overview_columns3($el){
			_e("<div class='sub-section' id='".$el."'>");
			_e("<div class='threeColumns wrapper'>");
			while(have_rows($el)): the_row();?>
				<div>
					<img src="<?php the_sub_field('icon');?>" />
					<h3><?php the_sub_field('title');?></h3>
					<p><?php the_sub_field('description');?></p>
				</div>
				
			<?php endwhile;
			_e("</div><div class='clearfix'></div>");
			_e("</div>");
		}
		
		/* main function that displays the tabs */
		function display_tabs($tabs){
			?>
			<!-- Header Section -->
			<hgroup>
				<?php akvo_page_logo('logo');?>
				<h2 id="tagline"></h2>
				<?php //$this->title_button(); ?>
			</hgroup>	
			<!-- END of HEADER Section -->

			<!-- Tab Header Section -->
			<section>
				<ul class="akvo-tabs" data-behaviour="akvo-tabs">	
					<?php foreach($tabs as $tab):?>
					<li class="akvo-tab" data-tagline="<?php the_field($tab['tagline']);?>">
						<a href="#<?php _e($this->slugify($tab['title'])); ?>"><?php _e($this->title($tab));?></a>
					</li>
					<?php endforeach;?>	
				</ul>
			</section>
			<!-- End of Tab Header -->
					
			<!-- Tab Content Section -->
			<?php foreach($tabs as $tab):?>
				<section class="tab-content" id="<?php _e($this->slugify($tab['title'])); ?>">
				<?php	
					/* Displaying the inline elements within the tab */ 
					$elements = $tab['elements'];
					if($elements){ 
						if(is_array($elements)){
							foreach($elements as $key=>$el){
								call_user_func_array(array($this, $el), array($key));
							} 
						}
					}
				?>
				</section>
			<?php endforeach;
		}
		

	}
	
