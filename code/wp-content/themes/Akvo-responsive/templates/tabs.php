<?php
	
	function akvo_tab_title($el){
		$title = get_field($el['title']."_tab_title");
		
		if(!$title){
			$title = $el['title'];
		}
		return $title;
	}
	
	function akvo_tab_inner_section($el){
		_e("<div class='tab-inner-section' id='".$el."'>");
		the_field($el);
		_e("</div>");
	}
	
	function akvo_tab_buttons($el){
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
	
	function akvo_tab_image($el){
		echo "<img id='".$el."' class='aligncenter' src='".get_field($el)."' />";
	}
	
	function akvo_carousel($el){
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
	
	function testimonials($el){
		$cols = 'threeColumns';
		$section = 'sub-section';
	?>
		<div class="<?php _e($section);?> testimonials" id="<?php _e($el);?>">	
			<h3 id='<?php _e($el.'_title');?>'><?php the_field($el.'_title');?></h3>
			<div class="<?php _e($cols);?> wrapper">
				<?php while(have_rows($el)): the_row();?>
				<div class='col text-center'>
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
        	<a href="#<?php _e(akvo_slugify($tab['title'])); ?>"><?php _e(akvo_tab_title($tab));?></a>
        </li>
        <?php endforeach;?>	
    </ul>
</section>
<!-- End of Tab Header -->
		
<!-- Tab Content Section -->
<?php foreach($tabs as $tab):?>
	<section class="tab-content" id="<?php _e(akvo_slugify($tab['title'])); ?>">
  	<?php	
  		/* Displaying the inline elements within the tab */ 
  		$elements = $tab['elements'];
  		if($elements){ 
  			if(is_array($elements)){
  				foreach($elements as $key=>$el){
  					call_user_func($el, $key);
  				}
  			}
  		}
  	?>
  	</section>
<?php endforeach;?>	
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/jquery.bxslider.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">