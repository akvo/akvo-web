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
<style>
	.so-widget-next-anchor-widget{
		position: relative;
	}
	.so-widget-next-anchor-widget .next-anchor-widget{
		text-align: center;
		position: absolute;
		box-sizing: border-box;
		width: 100%;
		bottom: 25px;
		z-index:2;
	}
	#intro .so-widget-next-anchor-widget{
		position: absolute;
		width: 100%;
		bottom: 0;
		box-sizing: border-box;
	}
</style>