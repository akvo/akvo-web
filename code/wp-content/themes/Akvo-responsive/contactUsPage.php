<?php
/*
	Template Name: Contact us
*/
?>
<?php get_header();?>
<!--Start of Akvo.org helpPage-->

<div id="content" class="floats-in">
  <?php if ( have_posts() ) while ( have_posts() ) : the_post();?>
  <h1 class="backLined"><?php the_title(); ?></h1>
  <section class="wrapper">
    <?php the_content();?>
  </section>
  <?php endwhile; // end of the loop.?>
  <hr class="delicate" />
  <section class="wrapper">
    <h2><?php the_field('hub_title'); ?></h2>
    <?php the_field('manuals_text'); ?>
      <div class="hubmap">
    <?php if( have_rows('hubs') ): ?>
    <?php while( have_rows('hubs') ): the_row(); ?>
        <a href="#<?php the_sub_field('marker_text'); ?>" class="marker" style="left: <?php the_sub_field('marker_x'); ?>%; top: <?php the_sub_field('marker_y'); ?>%;"><?php the_sub_field('marker_text'); ?></a>
    <?php endwhile; ?>
    <?php endif; ?>
      </div>
      
    <?php if( have_rows('hubs') ): ?>
      <ul class="hubs">
    <?php while( have_rows('hubs') ): the_row(); ?>
      <li>
          <img src="<?php the_sub_field('image'); ?>">
          <div class="text">
              <a name="<?php the_sub_field('marker_text'); ?>"></a>
              <h3><?php the_sub_field('title'); ?></h3>
              <h4><?php the_sub_field('location'); ?></h4>
              <p><?php the_sub_field('info'); ?></p>
          </div>
      </li>
    <?php endwhile; ?>
      </ul>
    <?php endif; ?>
    <hr class="delicate" />
    <?php if( have_rows('contact_group') ): ?>
      <ul class="threeColumns wrapper floats-in">
    <?php while( have_rows('contact_group') ): the_row(); ?>
        <li class="bgDecoB">
            <div>
            <h2><?php the_sub_field('title'); ?></h2>
            <?php the_sub_field('text'); ?>
            </div>
        </li>
    <?php endwhile; ?>
      </ul>
    <?php endif; ?>
  </section>
    
</div>

<?php get_footer();?>
