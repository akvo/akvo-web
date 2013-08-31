<?php
/*
	Template Name: Akvo-Policies
*/
?>
<?php get_header(); ?>
<!--Start of Akvo.org helpPage-->
<div id="content" class=" floats-in akvoPolicies">
			<div class="wrapper">
					<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
					<header>
						<h1 class="backLined"><?php the_title(); ?></h1>
					</header>
					<?php the_content(); ?>
				<?php endwhile; // end of the loop. ?>
				<?php edit_post_link( "Admin Edit", '<p class="editlink">', '</span>' ); ?>
			</div> <!-- /#main -->
		</div> <!-- /#content -->
		<br style="clear:both;">
<!-- end content -->

<?php get_footer(); ?>
