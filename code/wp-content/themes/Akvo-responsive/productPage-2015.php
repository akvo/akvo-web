<?php
/*
	Template Name: Product page 2015
*/
?>
<?php get_header(); ?>
<!--Start of Akvo.org homepage-->

<div id="content" class="floats-in productPage-2015">
	<section class="topIcons wrapper">
		<div class="topIcon capture"><img src="<?php the_field('topIcon_capture_img'); ?>"></div>
		<div class="topIcon understand"><img src="<?php the_field('topIcon_understand_img'); ?>"></div>
		<div class="topIcon share"><img src="<?php the_field('topIcon_share_img'); ?>"></div>
		<div class="readMoreContainer">
			<a href="<?php the_field('topIcon_readMoreLink'); ?>">
				<?php the_field('topIcon_readMoreText'); ?>
			</a>
		</div>
	</section>

	<section class="bigImage wrapper">
		<a href="<?php the_field('big_image_link'); ?>">
			<img class="<?php the_field('big_image_color'); ?>" src="<?php the_field('big_image'); ?>">
		</a>
	</section>

	<!-- The ugly formatting here is necessary to prevent whitepace or newlines between the
	elements, which interferes with wrapping when widths add up to 100% -->
	<section class="products wrapper">
		<?php if( have_rows('products') ): ?>
			<?php while( have_rows('products') ): the_row(); ?><a href="<?php the_sub_field('product_link'); ?>"><img class="<?php the_sub_field('product_color'); ?>" src="<?php the_sub_field('product_image'); ?>"></a><?php endwhile; ?>
		<?php endif; ?>
	</section>
</div>
<!-- end content -->

<script type="text/javascript">    
$(document).ready(function() {
    $('.bxslider').bxSlider();
});
</script>

<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/jquery.bxslider.css">

<?php get_footer(); ?>
    
