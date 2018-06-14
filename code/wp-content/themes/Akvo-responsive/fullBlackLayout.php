<?php
/*
	Template Name: Fullblack Layout
*/
?>
<?php get_header();?>
<div id="content" class="floats-in">
	<?php if ( have_posts() ): while ( have_posts() ) : the_post(); the_content(); endwhile; endif; ?>
	<?php the_hubs_list();?>	
</div>
<?php get_footer();?>