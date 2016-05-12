<?php
  /*
    Template Name: product-caddisfly-v1.0
  */
?>
<?php get_header(); ?>
<!--Start of Akvo.org CADDISFLY Product Page-->


<?php
	
	function akvo_page_section($field, $shallow_banner = false){
		$row_i = 0;
		while(have_rows($field)): the_row();
			$image_flag = false;
			$image_text = get_sub_field('image_text');
			if (strpos($image_text, '<img') !== false) {$image_flag = true;}
				$class = 'full-width-banner';
				
				if($shallow_banner || $row_i){ $class .= ' shallow_banner';}
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
    			<?php $desc = get_sub_field('description');if($desc):?>
    			<div class='page-section'><?php _e($desc);?></div>
    	<?php endif;?>
  	</section>
  	<?php $row_i++;endwhile;
	}
	
?>

<div id="content" class="floats-in productPage withSubMenu caddisflyProduct">
	<hgroup>
  		<img class='prod-logo' src="<?php the_field('logo');?>" />
    	<h2 id="tagline"><?php the_field('tagline');?></h2>
    </hgroup>
	
	<?php akvo_page_section('section');?>
	
  	
  	<section>
  		<div class='page-section full-width'>
  			<?php the_field('tests_section');?>
  			<br>
  			<ul>
  				<?php while(have_rows('tests')): the_row();?>
  				<li class="box">
  					<i class="fa fa-2x <?php the_sub_field('icon');?>"></i>
  					<p><?php the_sub_field('description');?></p>
  				</li>
  				<?php endwhile;?>
  				<li class="clearfix"></li>
  			</ul>
  		</div>
  		<div class='page-section'><?php the_field('tests_footer');?></div>
  	</section>
  	<?php akvo_page_section('section_end');?>
  	<section>
  		<div class='page-section'>
  			<?php the_field('get_involved_section');?>
  			<br>
  			<ul class="text-center">
  				<?php while(have_rows('get_involved_buttons')): the_row();?>
  				<li class='box-btn'><a class="button orange-bg" href="<?php the_sub_field('link');?>"><?php the_sub_field('text');?></a></li>
  				<?php endwhile;?>
  				<li class="clearfix"></li>
  			</ul>
  		</div>	
  	</section>
  	
  	<section class="grey-bg">
  		<div class='page-section'>
  			<?php the_field('about_section');?>
  		</div>
  	</section>
  	
</div>  
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<?php get_footer(); ?>