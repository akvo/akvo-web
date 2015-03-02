<?php
	/*
		Template Name: product-rsr-whatsNew
	*/
?>
<?php get_header(); ?>

<!--Start of Akvo.org RSR What's New Product Page-->

<div id="content" class="floats-in productPage withSubMenu rsrProdPagWhatsNew rsrProdPag">
  <hgroup>
    <h1 class="rsrLogo"> Akvo RSR - What's New</h1>
    <h2><?php the_field('rsr_tagline'); ?></h2>
  </hgroup>
  <section class="introText">
    <div class="wrapper">
      <p class="fullWidthParag centerED">
        <?php the_field('intro_text'); ?>
      </p>
    </div>
  </section>
  <section class="figure" id="rsrWhatsNewHero"> <img src="<?php the_field('hero_image'); ?>" title="rsrImg"/> </section>

  <section class="textOfImage">
    <h2><?php the_field('img_text_title'); ?></h2>
    <div class="textOfImage container">
      <?php if( have_rows('img_txt_points') ): ?>
        <?php while( have_rows('img_txt_points') ): the_row(); ?>
          <div class="textOfImage row">
            <span class="textOfImage pointTitle cell"><?php the_sub_field('point_title'); ?></span>
            <span class="textOfImage pointBody cell"><?php the_sub_field('point_body'); ?></span>
          </div>      
        <?php endwhile; ?>
      <?php endif; ?>

    </div>
  </section> 
  <section class="contributing">
    <h2><?php the_field('contrib_title'); ?></h2>
    <div class="wrapper">
      <p class="fullWidthParag centerED">
        <?php the_field('contrib_text'); ?>
      </p>
    </div>    
  </section>
  <section class="sideBySide">
    <div class="wrapper floats-in">
      <div class="iati container">
        <img src="<?php the_field('iati_image'); ?>" class="sideBySide iatiImage">
        <h3><?php the_field('iati_title'); ?></h3>
        <div class="wrapper">
          <p class="fullWidthParag">
          <?php the_field('iati_text'); ?>
          </p>
        </div>
      </div>
      <div class="backEnd container">
        <img src="<?php the_field('backend_image'); ?>" class="sideBySide backendImage">
        <h3><?php the_field('backend_title'); ?></h3>
        <div class="wrapper">
          <p class="fullWidthParag">
          <?php the_field('backend_text'); ?>
          </p>
        </div>          
      </div>
    </div>
  </section>
  <section class="improvedNavigation">
    <div class="improvedNavigationWrapper">
      <img class="backgroundImage" src="<?php the_field('improved_nav_image'); ?>">
      <div class="improvedNavigationCaption">
        <h3><?php the_field('improved_nav_title'); ?></h3>
        <p class="fullWidthParag">
          <?php the_field('improved_nav_text'); ?>
        </p>
      </div>
    </div>
  </section>
</div>
<!-- end content -->

<?php get_footer(); ?>
