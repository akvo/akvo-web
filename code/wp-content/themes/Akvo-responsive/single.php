<?php get_header(); ?>
	<div id="content" class="wrapper">
		<?php //get_sidebar(); ?>
			
		<div id="main">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" class="post" role="article">
				<header class="posthead">
					<h2 class="bigger"><?php the_title(); ?></h2>
					<div class="meta">
						<time datetime="<?php echo the_time('M j, Y'); ?>"><?php echo the_time(get_option('date_format')); ?></time>
						<em>by</em>
						<?php the_author_posts_link(); ?>
					</div>
				</header>
				<section class="post-content clearfix entry">
					<?php the_content(); ?>
				</section>
				<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
				<?php // uncomment for tags the_tags('<p class="tags"><span>Post Tags:</span> ', ', ', '</p>'); ?>
				<div class="postmetadata">
					<?php the_tags('Tags: ', ', ', '<br />'); ?>
					<em>Posted in</em> <?php the_category(', ') ?>
				</div>
				<?php comments_template(); ?>
			</article><!-- /.post -->
			<?php endwhile; ?>
				
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
		</div> <!-- /#main -->
			
	</div> <!-- /#content -->
	
	<br style="clear:both;">

	<?php get_sidebar( 'responsive' ); ?>
<?php get_footer(); ?>