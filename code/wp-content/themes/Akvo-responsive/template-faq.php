<?php
/*
	Template Name: FAQ
*/
?>

<?php get_header(); ?>
<!-- #content --> 

<!-- #main --> 
<div id="content" class="floats-in">
  <div class="">
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    <header>
		<h1 class="backLined">
			<?php the_title(); ?>
		</h1>
    </header>

    <hr class="delicate" />

	<div class="wrapper">
	<?php
		$categories = get_terms('faq_category', 'hide_empty=1');
		foreach( $categories as $category ): 
	?>
		<ul>
			<li class="faqMenu">
				<a href="#" class="faqMenuHead"><?php echo $category->name; // Prints the cat/taxonomy group title ?></a>
				<ul class="faqMenuList">
					<?php

						$posts = get_posts(array(
							'post_type' => 'qa_faqs',
							'taxonomy' => $category->taxonomy,
							'term' => $category->slug,
							'nopaging' => true,
							'orderby' => 'menu_order',
							'order' => 'ASC'
						));
						foreach($posts as $post): 
							setup_postdata($post); //enables the_title(), the_content(), etc. without specifying a post ID
					?>
					<li><a href="#<?php the_field('anchor_title'); ?>"><?php the_title(); ?></a></li>
					<?php endforeach; ?>
				</ul>
		<?php endforeach; wp_reset_query(); ?>
		<hr class="delicate" />

		<?php the_content(); ?>
    <?php endwhile; // end of the loop. ?>
	</div><!--wrapper-->
  </div>
<!-- /#main --> 
  
</div>
<!-- /#content --> 

<br style="clear:both;">


<?php get_footer(); ?>