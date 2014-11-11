<?php
	/*
		Template Name: product-rsrUp
	*/
?>
<?php get_header(); ?>

<!--Start of Akvo.org RSR Product Page-->

<div id="content" class="floats-in productPage withSubMenu rsrUpProdPag">
  <hgroup>
    <h1 class="rsrUpLogo"> Akvo RSR Up </h1>
    <h2><?php the_field('subtitle'); ?></h2>
  </hgroup>
  <section class="figure"> <img src="<?php the_field('hero_image'); ?>" title="rsrImg"/> </section>
  <section class="rsrUpDescr" style="background:rgb(248,248,248);">
    <div class="wrapper">
      <p class="fullWidthParag centerED"><?php the_field('text'); ?></p>
    </div>
    <ul class="wrapper fourColumns floats-in">
    <?php while( have_rows('feature_images') ): the_row(); ?>
      <li><img src="<?php the_sub_field('image'); ?>" title="rsrImg"/></li>
    <?php endwhile; ?>
    </ul>
    <div class="wrapper fullWidthParag centerED">
      <?php the_field('text_2'); ?>
    </div>
  </section>
  <section id="rsrUpTech">
    <h1><?php the_field('specifications_title'); ?></h1>
    <ul class="floats-in wrapper fullWidthParag" style="list-style-type:disc;">
    <?php while( have_rows('specifications') ): the_row(); ?>
      <li><?php the_sub_field('text'); ?></li>
    <?php endwhile; ?>
    </ul>
  </section>
</div>
<!-- end content -->

<?php get_footer(); ?>
