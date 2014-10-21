<?php
	/*
		Template Name: Flow Monitoring
	*/
?>
<?php get_header(); ?>

<!--Start of Akvo.org Flow Monitoring Page-->

<div id="content" class="floats-in productPage withSubMenu flowMonProdPag">
  <hgroup>
    <h1 class="flowLogo"> Akvo Flow Monitoring</h1>
    <h2><?php the_field('subtitle'); ?></h2>
  </hgroup>
  <section class="figure fullWidthImg"> <img src="<?php the_field('hero_image'); ?>"/> </section>
  <section class="flowMonDescr" style="background:rgb(248,248,248);">
    <div class="wrapper">
      <p class="fullWidthParag centerED"><?php the_field('text'); ?></p>
    </div>
  </section>
  <?php while( have_rows('image_items') ): the_row(); ?>
    <section class="productImage <?php the_sub_field('css_class'); ?>">
        <div class="wrapper">
            <h3><?php the_sub_field('text'); ?></h3>
        </div>
        <img src="<?php the_sub_field('image'); ?>" style="max-width:<?php the_sub_field('max_width'); ?>px;"/>
    </section>
  <?php endwhile; ?>
  <section id="flowMonTech" class="techSpecs">
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
