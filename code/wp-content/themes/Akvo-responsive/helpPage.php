<?php
/*
	Template Name: HelpPage
*/
?>
<?php get_header(); ?>
<!--Start of Akvo.org helpPage-->
<div id="content" class="floats-in helpSupport">
	<h1 class="backLined"><?php the_title();?></h1>
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<div class="centerED wrapper">
		<?php the_content(); ?>
	</div>
	<?php endwhile; // end of the loop. ?>
	<hr class="delicate" /> 
	<?php if( have_rows('products') ):?>
	<section>
		<nav>
			<ul class="wrapper threeColumns floats-in">
				<?php while( have_rows('products') ): the_row();?>
				<li class="bgDeco text-center" style="min-height: 120px;margin-bottom: 5px;padding-top: 40px;">
					<a href="<?php the_sub_field( 'link' );?>">
						<img style="max-height: 40px;" src="<?php the_sub_field('logo');?>" />
					</a>
				</li>
				<?php endwhile;?>
			</ul>
		</nav>	
	</section>
	<?php endif;?>
</div>

<!-- end content -->
<?php get_footer(); ?>
