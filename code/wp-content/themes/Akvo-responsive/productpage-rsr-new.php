<?php
  /*
    Template Name: product-rsr-v3.1
  */
?>
<?php get_header(); ?>
<!--Start of Akvo.org RSR Product Page-->

<?php
	$tabs = array(
		'overview' => array(
			'title' => 'overview',
			'tagline' => 'overview_tagline',
			'elements' => array(
				'overview_carousel' 		=> 'carousel',
				'overview_columns' 			=> 'rsr_overview_columns',
				'overview_call_to_action' 	=> 'rsr_overview_buttons',
				'testimonials' 				=> 'testimonials',
				'counters'					=> 'rsr_overview_counters',
				'overview_buttons' 			=> 'buttons'
			)
		),
		'features' => array(
			'title' => 'features',
			'tagline' => 'feature_tagline',
			'elements' => array(
				'feature_banner' 	=> 'rsr_banner',
				'feature_columns' 	=> 'rsr_feature_columns',
				'tour' 				=> 'rsr_tour',
				'features_section' 	=> 'rsr_features_section'
				
			)
		),
		'support' => array(
			'title' => 'support',
			'tagline' => 'support_tagline',
			'elements' => array(
				'support_banner' 			=> 'rsr_banner',
				'support_content' 			=> 'inner_section',
				'support_training_title' 	=> 'rsr_title',
				'support_columns' 			=> 'rsr_overview_columns',
				'support_button_title' 		=> 'inner_section',
				'support_buttons' 			=> 'buttons',
				'support_testimonial_title' => 'rsr_title',
				'support_testimonials' 		=> 'testimonials'
				
			)
		),
		'pricing' => array(
			'title' => 'pricing',
			'tagline' => 'pricing_tagline',
			'elements' => array(
				'pricing_banner' 		=> 'rsr_banner',
				'pricing_image' 		=> 'image',
				'pricing_description' 	=> 'inner_section',
				'pricing_buttons' 		=> 'buttons',
				'pricing_description_2' => 'inner_section'
			)
		)
		
	);
	
	
	class rsrTab extends akvoTab{
	
		function rsr_title($el){
			_e("<h3 id=".$el.">".get_field($el)."</h3>");
		}
		
		
		function rsr_overview_columns($el){
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
		
		function rsr_overview_buttons($el){
		?>
			<div class='sub-section'>
				<ul class="text-center list-inline">
					<li>
						<a data-behaviour="show-video" href="#video" title="<?php the_field('video_link_text'); ?>" class="button"><?php the_field('video_link_text'); ?></a>
					</li>
					<li>
						<a href="<?php the_field('tour_link'); ?>" data-behaviour="anchor-reload" title="<?php the_field('tour_link_text'); ?>" class="button"><?php the_field('tour_link_text'); ?></a>
					</li>
				</ul>
				<div id="video" class="videoContainer wrapper">
					<div class="vimeoBlockedMessage">
						<?php the_field('rsr_video_backup_message'); ?>
					</div>
					<iframe width="600" height="300" frameborder="0" allowfullscreen="" mozallowfullscreen="" webkitallowfullscreen="" src="<?php the_field('video_link'); ?>"></iframe>
				</div>
			</div>	
			
		<?php	
		}
		
		
		function rsr_overview_counters($el){
			echo "<div class='sub-section' data-behaviour='time-ticker'>";
			
			$json = akvo_json('http://rsr.akvo.org/api/v1/right_now_in_akvo/?format=json');
			
			?>
			<ul class="list-box">
				<li class="box">
					<a href="http://rsr.akvo.org/en/organisations/">      		
						<h4>Organisations<br></h4>
						<div class="timeTicker">            
							<p class="timeSegment clear"><?php $this->counter_css($json->number_of_organisations);?></p>
						</div>
					</a>
				</li>
				<li class="box">
					<a href="http://rsr.akvo.org/en/projects/">
						<h4>Projects<br></h4>
						<div class="timeTicker">            
							<p class="timeSegment clear"><?php $this->counter_css($json->number_of_projects);?></p>
						</div>
					</a>
				</li>
			</ul>
				<?php
			
			echo "</div>";
		}
		
		function rsr_feature_columns($el){
		?>
			<div class='sub-section'>
			<div class='threeColumns wrapper'>
			<?php while(have_rows($el)): the_row();?>
				<div>
					<img src="<?php the_sub_field('icon');?>" />
					<h3><?php _e(get_sub_field('heading'));?></h3>
					<?php
						$boxes = get_sub_field('box');
						foreach($boxes as $box):
					?>
					<div class="box-col">
						<i class="fa fa-2x <?php _e($box['icon']);?>"></i>
						<h4><?php _e($box['title']);?></h4>
						<p><?php _e($box['description']);?></p>
					</div>	
					<?php endforeach;?>
				<p><?php _e(get_sub_field('description'));?></p>
				</div>
			<?php endwhile;?>
			</div>
			<div class='clearfix'></div>
			</div>
		<?php }
		
		
		
		function rsr_tour(){
			_e("<div class='sub-section'>");
			_e("<h3>".get_field('tour_title')."</h3>");
			$i = 0;
			while(have_rows('tour')): the_row();$i++;?>
				<div class="screenshot" id="screenshot-<?php _e($i);?>">
					<h4><?php the_sub_field('title');?></h4>
					<p><?php the_sub_field('description');?></p>
					<img src="<?php the_sub_field('image');?>" />
				</div>
			<?php endwhile;
			_e("</div>");
		}
		
		function rsr_banner($el){
		?>
			<div class="banner" style="background-image:url('<?php the_field($el);?>');"></div>
		<?php	
		}
		/*
		function rsr_buttons($el){
			
		?>
			<div class='sub-section' id="<?php _e($el);?>">
				<ul class='text-center list-inline'>
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
		*/
		
		function rsr_media_section($el){
		
		?>
			<div class="sub-section">
				<div class="wrapper">
					
					<?php $sections = get_field($el);?>
					
					<ul>
						<?php foreach($sections as $section):?>
						<li class="media-box">
							
								<div class="media-big <?php if($section['image_text']):?>media-left<?php else:?>media-right<?php endif;?>">
									<h3><?php _e($section['title']);?></h3>
									<p><?php _e($section['description']); ?></p>
								</div>
								<div class="media-small text-center <?php if($section['image_text']):?>media-right<?php else:?>media-left<?php endif;?>">
									<a href="<?php _e($section['link']);?>"><img src="<?php _e($section['image']); ?>" /></a>	
									<?php _e($section['image_text']);?>
								</div>
							
							<div class="clear"></div>
						</li>
						<?php endforeach;?>
					</ul>
					
					
					
				</div>
			</div>
			
	  <?php
		
		}
		
		function rsr_features_section($el){
		
		?>
			<div class="sub-section" id="<?php _e($el);?>">
				<div class="wrapper">
					
					<?php $sections = get_field($el);?>
					<ul>
						<?php foreach($sections as $section):?>
						<li class="media-box">
								<h3><?php _e($section['title']);?></h3>
								<div class="media-big media-left">
									<p><?php _e($section['description']); ?></p>
								</div>
								<div class="media-small media-right">
									<a href="<?php _e($section['link']);?>"><img src="<?php _e($section['image']); ?>" /></a>	
									<?php _e($section['image_text']);?>
								</div>
							
							<div class="clear"></div>
						</li>
						<?php endforeach;?>
					</ul>
					
					
					
				</div>
			</div>
			
	  <?php
		
		}
	}
?>

<div id="content" class="floats-in productPage withSubMenu rsrProdPag">
	<?php
		$akvo_tab = new rsrTab;
		$akvo_tab->display_tabs($tabs);
	?>
</div>  





<?php get_footer(); ?>
<script type="text/javascript" src="<?php bloginfo('template_url');?>/js/tabs.js"></script>
<script type="text/javascript">
	(function($){
		console.log('init');
		$('.bxslider').bxSlider({
  			onSliderLoad: function(){
  				console.log('slider:after-load');
    			
    			$('body').find('[data-behaviour~=akvo-tabs]').akvo_tabs();
    			
    			$('[data-behaviour~=show-video]').click( function(event) {
      				event.preventDefault();
      				$('.videoContainer').fadeToggle();
    			});
    			
    			
    			$('[data-behaviour~=time-ticker]').rsr_time_ticker();
    			$('[data-behaviour~=anchor-reload]').rsr_anchor_reload();
    			
    		}
		});
    }(jQuery));  
</script>