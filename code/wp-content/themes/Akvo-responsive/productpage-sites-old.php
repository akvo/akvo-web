<?php
	/*
		Template Name: product-akvosites
	*/
?>
<?php get_header(); ?>

<!--Start of Akvo.org akvo sites Product Page-->

<div id="content" class="floats-in productPage withSubMenu akvoSitesProdPag">
  <hgroup>
    <?php akvo_page_logo('logo');?>
    <h2><?php the_field('subtitle'); ?></h2>
  </hgroup>
  <section class="figure marginVertical"> 
    <img src="<?php the_field('hero_image'); ?>" title="akvosites image"/> 
  </section>
      <h2  style="background:rgb(248,248,248); padding:1em 0; font-size:1.8em;"><span class="wrapper centerED"><?php the_field('bigDescr'); ?></span></h2>      
  <section class="akvositesDescr  marginVertical">
    <div class="wrapper">
      <p class="fullWidthParag centerED"><?php the_field('text'); ?></p>
 
    <a href="<?php the_field('descr_image_link'); ?>">
      <img src="<?php the_field('descr_image'); ?>" title="akvosites description image" class="centerED"/> 
    </a>

    <p class="fullWidthParag centerED">
      <?php the_field('text2'); ?>
    </p>   </div>
  </section>
  
  <section class="whoUseIt marginVertical" style="background:rgb(248,248,248);">
    <h1><?php the_field('whouse_title'); ?></h1>
    <p  class="fullWidthParag centerED"><?php the_field('whouse_text'); ?></p>
    <ul class="wrapper twoColumns floats-in">
    <?php while( have_rows('feature_images') ): the_row(); ?>
      <li><a href="<?php the_sub_field('image_link'); ?>"><img src="<?php the_sub_field('image'); ?>" title="akvosites"/></a></li>
    <?php endwhile; ?>
    </ul>
    </section>
  
  <section id="akvositesTech" class="marginVertical">
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