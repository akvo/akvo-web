<?php
	/*
		Template Name: New Partner
	*/
?>
<?php get_header(); ?>
<div id="content" role="main" class="floats-in singlePartnerPage withSubMenu">
  <?php get_sidebar(); ?>
  <div id="main">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" class="post" role="article">
      <header class="posthead">
        <h2 class="bigger staffName">
          <?php the_title(); ?>
        </h2>
         <p class="staffTitle"><?php echo esc_html( get_post_meta( get_the_ID(), 'staff_title', true ) ); ?></p>
         <span class="akvoTeam"><?php the_terms( $post->ID, 'new_partners_category' ,  ' ' ); ?></span>
      </header>        
       <div class="imgWrapper">
          <?php the_post_thumbnail('thumbnail'); ?>
        </div>

      <section class="post-content clearfix entry">
        <?php the_content(); ?>
      </section>
    </article>
    <!-- /.post -->
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
  </div>
  <!-- /#main --> 
  
</div>
<!-- /#content --> 

<br style="clear:both;">
<?php get_sidebar( 'responsive' ); ?>
<?php get_footer(); ?>
