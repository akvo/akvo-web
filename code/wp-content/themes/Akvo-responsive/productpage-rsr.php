<?php
  /*
    Template Name: product-rsr
  */
?>
<?php get_header(); ?>
<!--Start of Akvo.org RSR Product Page-->
<div id="content" class="floats-in productPage withSubMenu rsrProdPag">
  <div class="projectGateWay"><p>Already an RSR user?</p><a href=" http://rsr.akvo.org/signin" class="">Log in to Akvo RSR &rsaquo;</a></div>
  <hgroup>
  <h1>
  <?php the_field('rsr_name'); ?>
  </h1>
  <h2>
  <?php the_field('rsr_tagline'); ?>
  </h2>
  </hgroup>
  <section class="productDescr wrapper" id="rsrDescr">
    <h3>
    <?php the_field('rsr_descr_title'); ?>
    </h3>
    <p class="fullWidthParag centerED">
    <?php the_field('rsr_descr_text'); ?>
    </p>
  </section>
  <nav class="anchorNav wrapper">
    <h5>Menu</h5>
    <div class="mShownCollapse"><a></a></div>
    <ul>
      <li><a href="#rsrDescr">Description</a></li>
      <li class="hidden"><a href="#rsrInAction">See it in action</a></li>
      <li><a href="#rsrInFive">RSR in three points</a></li>
      <li><a href="#rsrRealWorld">Who's using RSR?</a></li>
      <li><a href="#rsrTech">Technical specifications</a></li>
      <li><a href="#download">Downloads</a></li>
    </ul>
  </nav>
  <section class="figure">
    <div class="figcaption">
      <?php the_field('rsr_figcaption'); ?>
    </div>
  <img src="<?php the_field('product_rsr_img'); ?>" title="rsrImg" class="wrapper"/> </section>
  <section id="rsrInAction" class="hide wrapper">
    <h1 class="">RSR in Action</h1>
  </section>
  <section class="inFivePoints" id="rsrInFive">
    <h1 class=""></h1>
    <ul class="wrapper">
      <li class="pointOne floats-in">
        <h3> <span>01</span>
        <?php the_field('rsr_point_one_h3'); ?>
        </h3>
        <img src="<?php the_field('rsr_point_one_img'); ?>" />
        <div class="textFivePoints">
          <p>
          <?php the_field('rsr_point_one_text'); ?>
          </p>
        </div>
      </li>
      <li class="pointTwo floats-in">
        <h3> <span>02</span>
        <?php the_field('rsr_point_two_h3'); ?>
        </h3>
        <img src="<?php the_field('rsr_point_two_img'); ?>" />
        <div class="textFivePoints">
          <p>
          <?php the_field('rsr_point_two_text'); ?>
          </p>
        </div>
      </li>
      <li class="pointThree floats-in">
        <h3> <span>03</span>
        <?php the_field('rsr_point_three_h3'); ?>
        </h3>
        <img src="<?php the_field('rsr_point_three_img'); ?>" />
        <div class="textFivePoints">
          <p>
          <?php the_field('rsr_point_three_text'); ?>
          </p>
        </div>
      </li>
      <li class="pointFour floats-in">
        <img src="<?php the_field('rsr_point_four_img'); ?>"/>
        <div class="textFivePoints">
          <p>
          <?php the_field('rsr_point_four_text'); ?>
          </p>
        </div>
      </li>
    </ul>
  </section>
  <section id="rsrSupport" class="wrapper">
    <h1 class="">Supporting your team on the journey</h1>
    <p class="fullWidthParag centerED">
    <?php the_field('rsr_support_text'); ?>
    </p>
  </section>

  <section class="whoUseIt marginVertical" style="background:rgb(248,248,248);">
    <h2><?php the_field('whouse_title'); ?></h2>
    <p  class="fullWidthParag centerED"><?php the_field('whouse_text'); ?></p>
    <ul class="wrapper twoColumns floats-in">
    <?php while( have_rows('feature_images') ): the_row(); ?>
      <li><p class="centerED"><?php the_sub_field('image_text'); ?></p><a href="<?php the_sub_field('image_link'); ?>"><img src="<?php the_sub_field('image'); ?>" title=""/></a></li>
    <?php endwhile; ?>
    </ul>
  </section>

  <section id="rsrTech">
    <h1 class="">Technical specifications</h1>
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
    <h1 class="" id="download">Downloads</h1>
    <div class="twoPagerContainer centerED">
      <h2><?php the_field('two_pager_subtitle'); ?></h2>
      <ul class="wrapper twoColumns floats-in centerED">
        <li><?php the_field('region_title_left'); ?></li>
        <li><?php the_field('region_title_right'); ?></li>
      </ul>
      
      <ul class="wrapper twoColumns floats-in centerED">
      <?php while( have_rows('download_brochures') ): the_row(); ?>
        <li><a href="<?php the_sub_field('image_link'); ?>"><img src="<?php the_sub_field('image'); ?>" title="akvosites"/></a></li>
        <?php endwhile; ?>
      </ul></div>
    </section>
    <section class="wrapper centerED marginVertical"><a href="/help/akvo-policies-and-terms-2/akvo-rsr-terms-of-use/">Akvo RSR terms of use </a></section>
  </div>
  <!-- end content -->
  <?php get_footer(); ?>