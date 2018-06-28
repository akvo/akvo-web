<?php
/*
	Template Name: product-openaid
*/
?>
<?php get_header(); ?>

<!--Start of Akvo.org Openaid Product page-->

<div id="content" class="floats-in productPage withSubMenu openaidProdPag"> 
  <!-- <div class="projectGateWay wrapper"><p>Already an openaid user?</p><a href="#" class="">Get to Openaid.nl &rsaquo;</a></div>
-->
  <hgroup>
    <h1>
      <?php the_field('openaid_name'); ?>
    </h1>
    <h2>
      <?php the_field('openaid_tagline'); ?>
    </h2>
  </hgroup>
  <section class="productDescr wrapper" id="openaidDescr">
    <p class="fullWidthParag centerED">
      <?php the_field('openaid_descr_text'); ?>
    </p>
  </section>
  <nav class="anchorNav wrapper">
    <h5>Menu</h5>
    <div class="mShownCollapse"><a></a></div>
    <ul>
      <li><a href="#openaidDescr">Description</a></li>
      <li class="hidden"><a href="#openaidInAction">See it in action</a></li>
      <li><a href="#openaidInFive">Openaid in four points</a></li>
      <li><a href="#openaidRealWorld">In Action</a></li>
      <li><a href="#openaidTech">Technical specifications</a></li>
      <li class="hidden"><a href="#openaidPricing">Pricing</a></li>
    </ul>
  </nav>
  <section class="figure">
    <div class="figcaption"><small>
      <?php the_field('openaid_figcaption'); ?>
      </small></div>
    <img src="<?php the_field('product_openaid_img'); ?>" title="openaidImg"/> </section>
  <section class="productDescr wrapper" id="openaidDescr2">
    <p class="fullWidthParag centerED">
      <?php the_field('openaid_descr_title'); ?>
    </p>
  </section>
  <section id="openaidInAction wrapper" class="hide">
    <h1 class="">openaid in action</h1>
  </section>
  <section class="inFivePoints wrapper" id="openaidInFive">
    <h1 class="">Akvo Openaid features</h1>
    <ul>
      <li class="pointOne floats-in">
        <h3> <span>01</span>
          <?php the_field('openaid_point_one_h3'); ?>
        </h3>
        <img src="<?php the_field('openaid_point_one_img'); ?>" />
        <div class="textFivePoints">
          <p class="fullWidthParag centerED">
            <?php the_field('openaid_point_one_text'); ?>
          </p>
        </div>
      </li>
      <li class="pointTwo floats-in">
        <h3> <span>02</span>
          <?php the_field('openaid_point_two_h3'); ?>
        </h3>
        <img src="<?php the_field('openaid_point_two_img'); ?>" />
        <div class="textFivePoints">
          <p class="fullWidthParag centerED">
            <?php the_field('openaid_point_two_text'); ?>
          </p>
        </div>
      </li>
      <li class="pointThree floats-in">
        <h3> <span>03</span>
          <?php the_field('openaid_point_three_h3'); ?>
        </h3>
        <img src="<?php the_field('openaid_point_three_img'); ?>" />
        <div class="textFivePoints">
          <p class="fullWidthParag centerED">
            <?php the_field('openaid_point_three_text'); ?>
          </p>
        </div>
      </li>
      <li class="pointFour floats-in">
        <h3> <span>04</span>
          <?php the_field('openaid_point_four_h3'); ?>
        </h3>
        <img src="<?php the_field('openaid_point_four_img'); ?>" />
        <div class="textFivePoints">
          <p class="fullWidthParag centerED">
            <?php the_field('openaid_point_four_text'); ?>
          </p>
        </div>
      </li>
      <li class="pointFive floats-in hidden">
        <h3> <span>05</span>
          <?php the_field('openaid_point_five_h3'); ?>
        </h3>
        <img src="<?php the_field('openaid_point_five_img'); ?>" />
        <div class="textFivePoints">
          <p class="fullWidthParag centerED">
            <?php the_field('openaid_point_five_text'); ?>
          </p>
        </div>
      </li>
    </ul>
  </section>
  <section id="openaidRealWorld" class="wrapper">
    <h1 class="">Akvo Openaid in action</h1>
    <p class="fullWidthParag centerED">
      <?php the_field('openaid_real_world_text'); ?>
    </p>
  </section>
  <section id="openaidTech" class="wrapper">
    <h1 class="">Technical specifications</h1>
    <ul>
      <li>
        <h3>
          <?php the_field('openaid_tech_title_First'); ?>
        </h3>
        <p class="fullWidthParag centerED">
          <?php the_field('openaid_tech_text_First'); ?>
        </p>
      </li>
      <li>
        <h3>
          <?php the_field('openaid_tech_title_Second'); ?>
        </h3>
        <p class="fullWidthParag centerED">
          <?php the_field('openaid_tech_text_Second'); ?>
        </p>
      </li>
    </ul>
  </section>
</div>
<!-- end content -->

<?php get_footer(); ?>
