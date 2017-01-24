<?php
	class akvoTab{
		
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
		
		function time_ticker($el){
		?>	
			<ul class='list-inline text-center' id="<?php _e($el);?>">
				<?php while(have_rows($el)): the_row();?>
				<li>
					<h4><a href="<?php the_sub_field('link');?>"><?php the_sub_field('text');?></a></h4>
					<div class="timeTicker">            
						<p class="timeSegment clear">
						<?php 
							$str = get_sub_field('count');
							for( $i = 0; $i <= strlen($str); $i++ ) {
								$char = substr( $str, $i, 1 );
								if(is_numeric($char)){
									_e("<span class='digit'>". $char ."</span>");
								}
								else{
									_e("<span class='dot'>". $char ."</span>");
								}
							}
						?>
						</p>
					</div>
				</li>
				<?php endwhile;?>
			</ul>
			<?php	
		}
		
		/* well padded content */
		function inner_section($el){
			_e("<div class='tab-inner-section' id='".$el."'>");
			the_field($el);
			_e("</div>");
		}
		
		/* display an image with center aligned */
		function image($el){
			echo "<img id='".$el."' class='aligncenter' src='".get_field($el)."' />";
		}
		
		/* list of inline buttons stacked horizontally */
		function buttons($el){
		?>
			<div class='' id="<?php _e($el);?>">
				<ul class="text-center list-inline">
					<?php while(have_rows($el)): the_row();
						$desc = get_sub_field('description');
					?>
					<li>
						<?php if($desc):?><h4><?php _e($desc);?></h4><br><?php endif;?>
						<a href="<?php the_sub_field('link');?>" title="<?php the_sub_field('text'); ?>" class="button"><?php the_sub_field('text'); ?></a>
					</li>
					<?php endwhile;?>
				</ul>
			</div>	
			
			
		<?php
			
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
			
			_e("<ul class='bxslider'>");
			while(have_rows($el)): the_row();?>
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
		}
		
		/* testimonials in either 2 cols or 3 cols */
		function testimonials($el){
			$cols = 'col-4';
			$section = 'wrapper';
			if(count(get_field($el)) == 2){
				$section = 'page-section';
				$cols = 'col-6';
			}
		?>
			<div class="<?php _e($section);?> testimonials" id="<?php _e($el);?>">	
				<h3 id='<?php _e($el.'_title');?>'><?php the_field($el.'_title');?></h3>
				<div class="row">
					<?php while(have_rows($el)): the_row();?>
					<div class='<?php _e($cols);?> text-center'>
						<?php $desc = get_sub_field('description');if($desc):?>
						<a href="<?php the_sub_field('link');?>">
							<img class='aligncenter' src="<?php the_sub_field('profile_picture');?>" />
							<?php _e($desc);?>
						</a>
						<?php endif;?>
					</div>	
					<?php endwhile;?>
				</div>
			</div>	
			<div class='clearfix'></div>
			
		<?php	
		}
		
		/* main function that displays the tabs */
		function display_tabs($tabs){
			?>
			<!-- Header Section -->
			<hgroup>
				<?php akvo_page_logo('logo');?>
				<h2 id="tagline"></h2>
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
			<?php endforeach;?>	
			<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/jquery.bxslider.css">
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
			<?php
		}
		

	}
	
