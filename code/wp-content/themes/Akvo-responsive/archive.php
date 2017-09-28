<?php get_header(); ?>

<div id="content" class="wrapper">
	<?php get_sidebar(); ?>
	<div id="main">
		
		<header class="archiveshead">
			<?php if (is_category()):?>
				<h2>'<?php single_cat_title(); ?>' Category Archives:</h2>
			<?php elseif(is_tag()):?>
				<h2>Posts Tagged '<?php single_tag_title(); ?>' :</h2>
			<?php elseif(is_author()):?>
				<h2><?php get_the_author_meta('display_name'); ?> Author Archives:</h2>
			<?php elseif(is_day()):?>
				<h2><?php the_time('l, F j, Y'); ?> : Daily Archives:</h2>
			<?php elseif(is_month()):?>
				<h2><?php the_time('F Y'); ?> Monthly Archives:</h2>
			<?php elseif(is_year()):?>
				<h2><?php the_time('Y'); ?> Yearly Archives:</h2>
			<?php endif; ?>
		</header>
    
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" class="post postbrdr floats-in" role="article">
			<div class="floatThumb"><?php the_post_thumbnail('thumbnail'); ?></div>	
			<header class="posthead">
				<h2>
					<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
						<?php the_title(); ?>
					</a>
				</h2>
				<div class="meta">
					<time datetime="<?php echo the_time('M j, Y'); ?>"><?php echo the_time(get_option('date_format')); ?></time>
					<em>by</em>
					<?php the_author_posts_link(); ?>
				</div>
			</header>
			<section class="post-content clearfix entry">
				<?php the_excerpt(); ?>
			</section>
			<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
			<div class="postmetadata">
				<em>Tags:</em>
				<?php the_tags('',', '); ?><br>
				<em>Posted in</em>
				<?php the_category(', ') ?>
			</div>
		</article>
		<!-- /.post -->
		<?php endwhile; ?>
		<div id="navbelow" class="clearfix">
			<div class="nav-prev"><?php previous_posts_link("&laquo; Newer Entries"); ?></div>
			<div class="nav-next"><?php next_posts_link("Older Entries &raquo;"); ?></div>
		</div>
		<?php else : ?>
		<article id="post-not-found" class="post">
			<header class="posthead"><h2>Whoops! Looks like we can't find this post.</h2></header>
			<section class="post-content">
				<p>It seems like this post is missing somewhere. Double-check the URL or try navigating back via the website menu links.</p>
			</section>
		</article>
		<?php comments_template(); ?>
		<?php endif; ?>
	</div>
  <!-- /#main --> 
</div>
<!-- /#content --> 
<div style="clear:both;"></div>
<?php get_sidebar( 'responsive' ); ?>
<?php get_footer(); ?>