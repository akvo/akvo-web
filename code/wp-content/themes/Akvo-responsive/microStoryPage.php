<?php
/*
	Template Name: MicroStory Page
*/
?>
<?php get_header(); ?>

<div id="content" class="floats-in micro-story">
  
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
   
    <?php the_content(); ?>
    <?php endwhile; // end of the loop. ?>
  
  
</div>


<br style="clear:both;">
<?php get_footer(); ?>

<style>
	.micro-story p{
		font-size: 1.9em;
		line-height: 1.3em;
	}
	.micro-story #back-top{
		font-size: 1em;
	}
	.micro-story h3{
		color: inherit;
		margin: 0;
		font-size: 2.5em;
		font-weight: bold;
	}
	.micro-story .so-widget-sow-button-wire-617179370c67 .ow-button-base a.ow-button-hover{
		font-size: 2.0em;
	}
	
	.cover-row{
		width: 100%;
		position: relative;
		padding:0 !important;
		margin: 0 !important;
	}
	.cover-row .so-panel.widget_sow-editor{
		bottom: 30px;
		position: absolute;
		background: rgba(0, 0, 0, 0.6);
		color: #fff;
		padding: 30px;
		width: 100%;
		box-sizing: border-box;
	}
	.cover-row .so-panel.widget_sow-image{
		max-height: 100vh;
		overflow: hidden;
	}
	.quote-row .so-panel.widget_sow-editor .siteorigin-widget-tinymce, .cover-row .so-panel.widget_sow-editor .siteorigin-widget-tinymce{
		max-width: 920px;
		margin-left: auto;
		margin-right: auto;
	}
	.cover-row .so-panel.widget_sow-editor .siteorigin-widget-tinymce{
		max-width: 850px;
	}
	
	/* TEXT ROW */
	.text-row .so-panel.widget_sow-editor{
		padding: 30px;
		max-width: 1100px;
		margin-left: auto;
		margin-right: auto;
	}
	.text-row .so-panel.widget_sow-editor p{
		
	}
	
	/* QUOTE ROW */
	.quote-row, .quote-row p{
		text-align: center;
	}
	.quote-row img{
		margin-left: auto;
		margin-right: auto;
	}
</style>