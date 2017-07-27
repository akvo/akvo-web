<?php
	/*
		Template Name: product-caddisfly v2.0
	*/
?>
<?php get_header(); ?>
<!--Start of Akvo.org RSR Product Page-->
<?php
	
	$tabs = array(
		'overview' => array(
			'title' => 'overview',   // tab title, 2nd field is the acf id
			'tagline' => 'overview_tagline',  // tagline for the particular tab
			'elements' => array(
				'overview_carousel' => 'carousel',
				'overview_columns' => 'overview_columns',
				'overview_buttons' => 'overview_buttons',
				'overview_testimonials' => 'testimonials',
				'overview_counter' => 'time_ticker'
			)
		),
		'services' => array(
			'title' => 'services',
			'tagline' => 'services_tagline',
			'elements' => array(
				'services_cover' => 'page_section',
				'services_intro' => 'inner_section',
				'services_list' => 'services_list',
				'services_buttons' => 'buttons',
				'services_testimonials' => 'testimonials'
			)
		),
		'features' => array(
			'title' => 'features',
			'tagline' => 'features_tagline',
			'elements' => array(
				'features_cover' => 'page_section',
				'features_rows' => 'features_rows'
			)
		),
		'pricing' => array(
			'title' => 'pricing',
			'tagline' => 'pricing_tagline',
			'elements' => array(
				'pricing_cover' => 'page_section',
				'pricing_image' => 'image',
				'pricing_intro' => 'inner_section',
				'pricing_buttons' => 'buttons',
				'pricing_ending' => 'inner_section'
				
			)
		)
	);
	
	
	class caddisflyTab extends akvoTab{
		
		/*
		function overview_columns($el){
		?>
			<div class='row' id="<?php _e($el);?>">
				<?php while(have_rows($el)): the_row();?>
				<div class='col-3 <?php if(get_sub_field('orange_box')){ _e("orange-box");}?>'>
					<img class='aligncenter' src="<?php the_sub_field('icon');?>" />
					<?php the_sub_field('content');?>
				</div>
				<?php endwhile;?>
			</div>
		<?php	
		}
		*/
		
		function overview_buttons($el){
		?>
			<div id="<?php _e($el);?>">
				<ul class="text-center list-inline">
					<?php while(have_rows($el)): the_row();?>
						<li>
							<a <?php if(get_sub_field('is_video')):?>data-behaviour="show-video"<?php endif;?> href="<?php the_sub_field('link');?>" title="<?php the_sub_field('text');?>" class="button"><?php the_sub_field('text');?></a>
						</li>
					<?php endwhile;?>
				</ul>
				
				<div id="video" class="videoContainer wrapper">
					<div class="vimeoBlockedMessage">
						<?php the_field('rsr_video_backup_message'); ?>
					</div>
					<iframe width="600" height="300" frameborder="0" allowfullscreen="" mozallowfullscreen="" webkitallowfullscreen="" src="<?php the_field('overview_video_link'); ?>"></iframe>
				</div>
			</div>	
			
		<?php	
		}
  	
  	
		function services_list($el){
		?> 
		<div id="<?php _e($el);?>">
			<?php while( have_rows($el) ): the_row(); ?>
			<ul class="wrapper twoColumns floats-in">
				<?php while( have_rows('row_list') ): the_row(); ?>
				<li><div class='desc'><?php the_sub_field('description');?></div></li>
				<?php endwhile; ?>
			</ul>
			<?php endwhile; ?>
		</div>	
		<?php
		}
		
		function features_rows($el){
		?> 
		<div id="<?php _e($el);?>">
			<?php while( have_rows($el) ): the_row(); ?>
			<ul class="wrapper threeColumns floats-in">
				<?php while( have_rows('row_list') ): the_row(); ?>
				<li>
					<h3 class='icon'><i class='fa <?php the_sub_field('icon');?>'></i></h3>
					<?php the_sub_field('content');?>
				</li>
				<?php endwhile; ?>
			</ul>
			<?php endwhile; ?>
		</div>	
		<?php
		}
			
		
	}
	
?>

<div id="content" class="floats-in productPage tabsProduct caddisflyProduct">
	<?php
		$akvo_tab = new caddisflyTab;
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