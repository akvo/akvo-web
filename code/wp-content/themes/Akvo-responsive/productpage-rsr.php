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
      <li><a href="#rsrRealWorld">Real world use</a></li>
      <li><a href="#rsrTech">Technical specifications</a></li>
      <li class="hidden"><a href="#rsrPricing">Pricing</a></li>
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
    <img src="<?php the_field('rsr_support_img'); ?>" />
  </section>
  <section id="rsrRealWorld" class="wrapper">
    <h1 class="">Who is using Akvo RSR?</h1>
    <p class="fullWidthParag centerED">
      <?php the_field('rsr_real_world_text'); ?>
    </p>
    <a href="http://rsr.akvo.org/organisations/">
    <img src="<?php the_field('rsr_who_is_img'); ?>" />
</a>
  </section>
  <section id="rsrTech">
    <h1 class="">Technical Specifications</h1>
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

  <section id="rsrPricing" class="hidden">
    <h1 class="">Pricing</h1>
    <p class="wrapper centerED">
      <?php the_field('rsr_pricing_text'); ?>
    </p>
  </section>
  <section class="wrapper centerED "><a href="/help/akvo-policies-and-terms-2/akvo-rsr-terms-of-use/">Akvo RSR terms of use </a></section>
</div>
<!-- end content -->

<?php get_footer(); ?>
