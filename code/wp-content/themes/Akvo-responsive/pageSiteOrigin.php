<?php
/*
	Template Name: SiteOrigin Page Builder
*/
?>
<?php get_header(); ?>
<!-- #content --> 

<!-- #main --> 
<div id="content" class="floats-in">
  <div class="wrapper">
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
   
    <?php the_content(); ?>
    <?php endwhile; // end of the loop. ?>
  </div>
<!-- /#main --> 
  
</div>
<!-- /#content --> 

<br style="clear:both;">


<?php get_footer(); ?>
