<?php
/*
	Template Name: roadMaps
*/
?><?php get_header(); ?>
<!-- #content --> 

<!-- #main --> 
<div id="content" class="floats-in">
	<div class="wrapper">
		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		<header>
			<h1 class="backLined"><?php the_title(); ?></h1>
		</header>
		<?php the_content(); ?>
		<?php endwhile; // end of the loop. ?>
	</div>
<!-- /#main --> 
</div>
<!-- /#content --> 

<div style="clear:both;"></div>


<?php get_footer(); ?>
