<?php get_header(); ?>

<div id="content" class="wrapper floats-in">
	<?php //get_sidebar(); ?>
	<div id="main">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<article <?php post_class('floats-in') ?> id="post-<?php the_ID(); ?>">
			<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
			<div class="meta">
				<time><?php the_time('M j, Y') ?></time>
				<em>by</em>
				<?php the_author() ?>
			</div>
			<div class="entry">
				<p><?php the_content(); ?></p>
			</div>
			<div class="postmetadata">
				<em>Tags:</em>
				<?php the_tags('',', '); ?><br>
				<em>Posted in</em>
				<?php the_category(', ') ?>
			</div>
		</article>
		<?php endwhile; ?>
		<div id="navbelow" class="clearfix">
			<div class="nav-prev"><?php previous_posts_link("&laquo; Newer Entries"); ?></div>
			<div class="nav-next"><?php next_posts_link("Older Entries &raquo;"); ?></div>
		</div>
		<?php else : ?>
		<article id="post-not-found" class="post">
			<header class="posthead">
				<h2>Whoops! Looks like we can't find this post.</h2>
			</header>
			<section class="post-content">
				<p>It seems like this post is missing somewhere. Double-check the URL or try navigating back via the website menu links.</p>
			</section>
		</article>
		<?php endif; ?>
	</div>
  <!-- /#main --> 
</div>
<!-- /#content --> 

<div style="clear:both;"></div>
<?php get_sidebar( 'responsive' ); ?>
<?php get_footer(); ?>
