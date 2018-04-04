<?php
/*
	Template Name: Homepage-2019
*/
?>
<?php get_header();?>
<div id="content" class="floats-in homePage">
	<?php if ( have_posts() ): while ( have_posts() ) : the_post(); the_content(); endwhile; endif; ?>
	<?php the_hubs_list('Find us in five continents');?>	
</div>
<?php get_footer();?>