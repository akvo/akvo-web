<?php
  /*
    Template Name: product-dash-v1.0
  */
?>
<?php get_header(); ?>
<!--Start of Akvo.org DASH Product Page-->

<div id="content" class="floats-in productPage withSubMenu dashProduct">
	
	<!--div class="projectGateWay">
    	<p>Already an RSR user?</p>
    	<a href="http://rsr.akvo.org/sign_in" class="">Log in to Akvo RSR &rsaquo;</a>
  	</div-->

  	<hgroup>
    	<h1><?php the_field('rsr_name'); ?></h1>
    	<h2 id="tagline">Make sense of your data</h2>
    </hgroup>
	
	
	<?php 
		$row_i = 0;
		while(have_rows('section')): 
			the_row();
			$image_flag = false;
			
			$image_text = get_sub_field('image_text');
			
			if (strpos($image_text, '<img') !== false) {
 			   $image_flag = true;
			}
	?>
  	<section>
  		<div class="full-width-banner <?php if($row_i){_e('shallow-banner');}?> <?php if($image_flag){_e('overlay-banner');}?>" style="background-image:url(<?php _e(get_sub_field('image'));?>);">
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
  	<?php $row_i++;endwhile;?>
  	
  	<section>
  		<div class='page-section full-width'>
  			<?php the_field('components_section');?>
  			<br>
  			<ul>
  				<?php while(have_rows('components')): the_row();?>
  				<li class="box">
  					<i class="fa fa-2x <?php the_sub_field('icon');?>"></i>
  					<h4><?php the_sub_field('title');?></h4>
  					<p><?php the_sub_field('description');?></p>
  				</li>
  				<?php endwhile;?>
  				<li class="clearfix"></li>
  			</ul>
  		</div>
  	</section>
  	
  	<section>
  		<div class='page-section'>
  			<?php the_field('get_involved_section');?>
  			<ul class="text-center">
  				<?php while(have_rows('get_involved_buttons')): the_row();?>
  				<li><a class="button green-bg" href="<?php the_sub_field('link');?>"><?php the_sub_field('text');?></a></li>
  				<?php endwhile;?>
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
