<?php
/*
	Template Name: teamPage
*/
?>
<?php get_header(); ?>

<!--Start of Akvo.org Team Page-->
<div id="content" class=" floats-in teamPage">
			
			<div class="wrapper">
					<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<!--					
					<header>
						<h1 class="backLined"><?php /*?><?php the_title(); ?><?php */?></h1>
					</header>

-->					<?php the_content(); ?>

				<?php endwhile; // end of the loop. ?>
				
				<?php edit_post_link( "Admin Edit", '<p class="editlink">', '</span>' ); ?>
			</div> <!-- /#main -->
			
			
		</div> <!-- /#content -->
		
		<br style="clear:both;">
<!-- end content -->
<?php get_footer(); ?>
