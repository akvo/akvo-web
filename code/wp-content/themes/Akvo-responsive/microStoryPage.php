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
	.cover-row .so-panel.widget_sow-image{
		max-height: 100vh;
		overflow: hidden;
	}
	
	.cover-row .caption{
		bottom: 30px;
		position: absolute;
		background: rgba(0, 0, 0, 0.6);
		color: #fff;
		padding: 30px;
		width: 100%;
		box-sizing: border-box;
	}
	.cover-row .widget_sow-editor{
		margin-bottom: 0 !important;
	}
	
	.language{
		position: absolute;
		top: 100px;
		z-index: 120;
		font-size: 2.5em;
		width: 100%;
	}
	.language a[href]{
		color: inherit;
	} 
	.language a[href].active{
		font-size: 1.1em;
	}
	.language li{
		margin-right: 0;
		margin-left: 0;
		color: #fff;
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
	.quote-row{
		position: relative;
		z-index: 0;
	}
	.quote-row .panel-grid-cell{
		z-index: 2;
	}
	.quote-row::before, .quote-row::after{
		position: absolute;
		top: 15%;
		left: 18%;
		width: 200px;
		height: 200px;
		content: " ";
		background-image: url('<?php bloginfo('template_url');?>/images/quote_mark_start.png');
		background-position: center;
		background-size: cover;
		z-index: 1;
	}
	.quote-row::after{
		bottom: 5%;
		right: 18%;
		top: auto;
		left: auto;
		background-image: url('<?php bloginfo('template_url');?>/images/quote_mark_end.png');
	}
	@media( max-width: 992px ){
		.quote-row::before{
			top: 20%;
			left: 10%;
		}
		.quote-row::after{
			right: 10%;
		}
	}
	@media( max-width: 768px ){
		.quote-row::before,.quote-row::after{
			width: 150px;
			height: 150px;
		}
		.quote-row::before{
			top: 25%;
			left: 5%;
			
		}
		.quote-row::after{
			right: 5%;
		}
	}
	.quote-row img{
		margin-left: auto;
		margin-right: auto;
	}
</style>