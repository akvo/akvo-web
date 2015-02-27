<?php
  /*
    Template Name: product-rsr-v3
  */
?>
<?php get_header(); ?>
<!--Start of Akvo.org RSR Product Page-->
<div id="content" class="floats-in productPage withSubMenu rsrProdPag">

  <div class="projectGateWay">
    <p>Already an RSR user?</p>
    <a href="http://rsr.akvo.org/signin" class="">Log in to Akvo RSR &rsaquo;</a>
  </div>

  <hgroup>
  <h1>
  <?php the_field('rsr_name'); ?>
  </h1>
  <h2>
  <?php the_field('rsr_tagline'); ?>
  </h2>
  </hgroup>

  <section class="figure">
    <div class="figcaption">
      <?php the_field('rsr_figcaption'); ?>
    </div>
    <img src="<?php the_field('product_rsr_img'); ?>" title="rsrImg" class="wrapper">
  </section>

  <section class="productDescr rsr" id="rsrDescr">
    <div class="wrapper">
      <h3>
      <?php the_field('rsr_descr_title'); ?>
      </h3>
      <p class="fullWidthParag centerED">
      <?php the_field('rsr_descr_text'); ?>
      </p>
    </div>
  </section>

  <nav class="anchorNav wrapper">
    <h5>Menu</h5>
    <div class="mShownCollapse"><a></a></div>
    <ul>
      <li><a href="#nuggets"><?php the_field('rsr_nav_nuggets'); ?></a></li>
      <li><a href="#rsrRealWorld"><?php the_field('rsr_nav_whats_happening'); ?></a></li>
      <li><a href="#rsrTech"><?php the_field('rsr_nav_tech_specs'); ?></a></li>
      <li><a href="#download"><?php the_field('rsr_nav_downloads'); ?></a></li>
    </ul>
  </nav>

  <section class="soloImageSection">
    <img src="<?php the_field('rsr_solo_image'); ?>" title="<?php the_field('rsr_feature_solo_title'); ?>" class="centerED soloImage">
  </section>

  <section id="nuggets" class="rsrNuggetsSection">
    <ul class="wrapper">
    <?php if( have_rows('rsr_feature_nuggets') ): ?>
      <?php while( have_rows('rsr_feature_nuggets') ): the_row(); ?>
        <li class="rsrNuggets floats-in">
          <h3 class="nuggetTitle nuggetAside"><?php the_sub_field('nugget_title'); ?></h3>
          <img src="<?php the_sub_field('nugget_image'); ?>" class="nuggetImage">
          <p class="nuggetDescription nuggetAside"><?php the_sub_field('nugget_description'); ?></p>
        </li>      
      <?php endwhile; ?>
    <?php endif; ?>
    <li class="rsrNuggets floats-in supportingYourTeam">
      <h3 class="nuggetTitle nuggetAside"><?php the_field('support_nugget_title'); ?></h3>
      <img src="<?php the_field('support_nugget_image'); ?>" class="nuggetImage">
      <p class="nuggetDescription nuggetAside"><?php the_field('support_nugget_description'); ?></p>  
    </li>
    </ul>
  </section>

  <section class="whoUseIt marginVertical" id="rsrRealWorld">
    <h2><?php the_field('whouse_title'); ?></h2>
    <p  class="fullWidthParag centerED"><?php the_field('whouse_text'); ?></p>
    <ul class="wrapper twoColumns floats-in">
    <?php while( have_rows('feature_images') ): the_row(); ?>
      <li><p class="centerED"><?php the_sub_field('image_text'); ?></p><a href="<?php the_sub_field('image_link'); ?>"><img src="<?php the_sub_field('image'); ?>" title=""></a></li>
    <?php endwhile; ?>
    </ul>
  </section>

  <section id="rsrTech">
    <h2 class="rsrProductPage">Technical specifications</h2>
    <ul class="floats-in wrapper">
      <li>
        <h3>
        <?php the_field('rsr_tech_title_First'); ?>
        </h3>
        <p class="fullWidthParag centerED">
        <?php the_field('rsr_tech_text_First'); ?>
        </p>
      </li>
      <li>
        <h3>
        <?php the_field('rsr_tech_title_Second'); ?>
        </h3>
        <p class="fullWidthParag centerED">
        <?php the_field('rsr_tech_text_Second'); ?>
        </p>
      </li>
    </ul>
  </section>

  <section class="twoPager">
    <h2 class="rsrProductPage" id="download">Downloads</h2>
    <div class="twoPagerContainer centerED">
      <h2><?php the_field('two_pager_subtitle'); ?></h2>
      <ul class="wrapper twoColumns floats-in centerED languageHeader">
        <li><?php the_field('region_title_left'); ?></li>
        <li><?php the_field('region_title_right'); ?></li>
      </ul>
      <ul class="wrapper twoColumns floats-in centerED">
        <?php while( have_rows('download_brochures') ): the_row(); ?>
        <li><a href="<?php the_sub_field('image_link'); ?>"><img src="<?php the_sub_field('image'); ?>" title="akvosites"></a></li>
        <?php endwhile; ?>
      </ul>
    </div>
  </section>

  <section class="wrapper centerED marginVertical">
    <a href="/help/akvo-policies-and-terms-2/akvo-rsr-terms-of-use/">Akvo RSR terms of use </a>
  </section>

</div>
<!-- end content -->
<?php get_footer(); ?>
