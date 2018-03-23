<?php
/*
	Template Name: Homepage-2019
*/
?>
<?php get_header();?>
<div id="content" class="floats-in homePage">
	<?php if ( have_posts() ): while ( have_posts() ) : the_post(); the_content(); endwhile; endif; ?>
	<?php the_hubs_list();?>	
</div>
<?php get_footer();?>
<style>
	#intro{
		position: relative;
		height: 100vh;
	}
	
	#intro .siteorigin-widget-tinymce{
		position: absolute;
		width: 90%;
		max-width: 800px;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%);
	}
	#intro .siteorigin-widget-tinymce p{
		font-family: helvetica;
		font-weight: bold;
		color: white;
	}
</style>