<?php
  /*
    Template Name: hero-series
  */
?>
<?php get_header(); ?>
<!--Start of Akvo.org DASH Product Page-->

<div id="content">
	
	<div id="hero-series-wrapper" class="wrapper">
  		<h1 class="text-center space-one"><?php the_title();?></h1>
    
    	<section class="space-one">
    		<ul class="text-center">
    			<?php while(have_rows('series')): the_row();?>
    			<li class="box">
    				<a href="<?php the_sub_field('link');?>">
    					<div class="box-image" style="background-image:url('<?php the_sub_field('image');?>');"></div>
    					<div class="box-text"><?php the_sub_field('title');?></div>
    				</a>	
    			</li>
    			<?php endwhile;?>
    		</ul>
    	
    	</section>
    
    </div>
  	
</div>  



<?php get_footer(); ?>
