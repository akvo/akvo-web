<?php get_header(); ?>

<div id="contentWrap" class="floats-in">
  <div id="content" class="floats-in">
    <?php if ( have_posts() ) : ?>
		<?php if (is_category()) { ?>
            <h2 id="archiveTitle">Archive for the &#8216;<?php single_cat_title(); ?>&#8217; Category</h2>
        <?php } elseif( is_tag() ) { ?>
            <h2 id="archiveTitle">Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h2>
		<?php } elseif (is_day()) { ?>
            <h2 id="archiveTitle">Archive for <?php the_time('M j, Y'); ?></h2>
        
        <?php } elseif (is_month()) { ?>
            <h2 id="archiveTitle">Archive for <?php the_time('F, Y'); ?></h2>
        
        <?php } elseif (is_year()) { ?>
            <h2 id="archiveTitle">Archive for <?php the_time('Y'); ?></h2>
        
        <?php } elseif (is_author()) { ?>
            <h2 id="archiveTitle">Author Archive</h2>
        
        <?php } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
            <h2 id="archiveTitle">Archives</h2>
        <?php } ?>
    <?php while ( have_posts() ) : the_post(); ?>
    <article <?php post_class('floats-in') ?> id="post-<?php the_ID(); ?>">
      <h2>
        <?php the_title(); ?>
      </h2>
      <div class="meta">
        <time><?php the_time('M j, Y') ?></time>
        <em>by</em>
        <?php the_author() ?>
      </div>
      <div class="entry">
        <?php the_content(); ?>
      </div>
      <?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
      <div class="postmetadata">
        <?php the_tags('Tags: ', ', ', '<br />'); ?>
        <em>Posted in</em> <?php the_category(', ') ?>
      </div>
    </article>
    <?php comments_template(); ?>
    <?php endwhile; ?>
    <?php else : ?>
    <h2>Not found</h2>
    <?php endif; ?>
  </div>
  <!-- end content -->
  <?php get_sidebar(); ?>
</div>
<!-- end contentWrap -->
<?php get_footer(); ?>
