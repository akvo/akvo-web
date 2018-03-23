<?php
/*
	Template Name: MicroStory Page
*/
?>
<?php get_header(); ?>

<div id="content" class="floats-in micro-story">
	
    <?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>
   
    <?php the_content(); ?>
    <?php endwhile; // end of the loop. ?>
  
	<?php endif;?>
	<?php the_hubs_list();?>
</div>


<br style="clear:both;">
<?php get_footer(); ?>
