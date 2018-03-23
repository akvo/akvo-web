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

<style>
	.quote-row .so-panel.widget_sow-editor .siteorigin-widget-tinymce, .cover-row .so-panel.widget_sow-editor .siteorigin-widget-tinymce, .iframe-row .so-panel.widget_sow-editor .siteorigin-widget-tinymce{
		max-width: 920px;
		margin-left: auto;
		margin-right: auto;
	}
	
	/* TEXT ROW */
	.text-row .so-panel.widget_sow-editor{
		padding: 30px;
		max-width: 1100px;
		margin-left: auto;
		margin-right: auto;
	}
	.text-row .so-panel.widget_sow-editor p{}
</style>