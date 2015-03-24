<?php
/*
	Template Name: newsletterPage
*/
?>
<?php get_header();?>
<!--Start of Akvo.org newsletterPage-->
<div class="newsletter-container">
  <h1 class="backLined">Akvo Newsletters and Bulletins</h1>
  <?php if ( have_posts() ) while ( have_posts() ) : the_post();?>
  <section class="wrapper">
    <?php the_content();?>
  </section>
  <?php endwhile; // end of the loop.?>

  <section class="wrapper newsletter-profiles">

    <?php if( have_rows('newsletters') ): ?>
      <?php while( have_rows('newsletters') ): the_row(); ?>
        <div class="newsletter-profile fullWidthParag">
        <h2><?php the_sub_field('newsletter_name'); ?></h2>
        <p><?php the_sub_field('newsletter_description'); ?></p>
        <div class="link-button">
        <a href="<?php the_sub_field('archive_url'); ?>" target="_blank" title="Archive for <?php the_sub_field('newsletter_name'); ?>">
          <input type="submit" value="<?php the_field('link_label'); ?>" name="subscribe" class="button">
        </a>
        </div>
        <hr class="delicate">
        </div>      
      <?php endwhile; ?>
    <?php endif; ?>

  </section>
</div>

<!-- end content --> 
<?php get_footer();?>
