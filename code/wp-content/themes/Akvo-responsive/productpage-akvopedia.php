<?php
  /*
    Template Name: product-akvopedia
  */
?>
<?php get_header(); ?>

<!--Start of Akvo.org akvopedia Product Page-->

<div id="content" class="floats-in productPage withSubMenu akvopediaProdPag">
<hgroup>
  <h1>
    <?php the_field('akvopedia_name'); ?>
  </h1>
  <h2>
    <?php the_field('akvopedia_tagline'); ?>
  </h2>
</hgroup>
<section class="productDescr wrapper" id="akvopediaDescr">
  <h3>
    <?php the_field('akvopedia_descr_title'); ?>
  </h3>
  <p class="fullWidthParag centerED">
    <?php the_field('akvopedia_descr_text'); ?>
  </p>
</section>
<nav class="anchorNav wrapper">
  <h5>Menu</h5>
  <div class="mShownCollapse"><a></a></div>
  <ul>
    <li><a href="#akvopediaDescr">Description</a></li>
    <li><a href="#akvopediaInFour">Five portals</a></li>
    <li><a href="#akvopediaProject">Project links</a></li>
    <li class="hidden"><a href="#akvopediaRealWorld">Who is using Akvopedia?</a></li>
    <li><a href="#akvopediaContribute">Contribute</a></li>
  </ul>
</nav>
<section class="figure"> 
  <div class="figcaption">
    <?php the_field('akvopedia_figcaption'); ?>
  </div>
  <img src="<?php the_field('product_akvopedia_img'); ?>" title="akvopediaImg" class="wrapper"/> </section>
<section class="" id="akvopediaInFour">
  <h1 class="">Five portals</h1>
  <div class="fullWidthParag centerED">
   <?php the_field('akvopedia_fourPortal_txt'); ?>
  </div>
  <ul class="wrapper fiveColumns floats-in pedia4points">
    <li class="pointOne floats-in"> 
      <a href="http://akvopedia.org/wiki/Water_Portal"><h3> <span>01</span>
        <?php the_field('akvopedia_point_one_h3'); ?>
      </h3>
      <img src="<?php the_field('akvopedia_point_one_img'); ?>" class="centerED" /></a> </li>
    <li class="pointTwo floats-in">
      <a href="http://akvopedia.org/wiki/Sanitation_Portal"><h3> <span>02</span>
        <?php the_field('akvopedia_point_two_h3'); ?>
      </h3>
      <img src="<?php the_field('akvopedia_point_two_img'); ?>"  class="centerED" /></a> </li>
    <li class="pointThree floats-in">
     <a href="http://akvopedia.org/wiki/Finance_Portal"><h3> <span>03</span>
        <?php the_field('akvopedia_point_three_h3'); ?>
      </h3>
      <img src="<?php the_field('akvopedia_point_three_img'); ?>"  class="centerED" /></a> </li>
    <li class="pointFour floats-in">
      <a href="http://akvopedia.org/wiki/Sustainability_Portal"><h3> <span>04</span>
        <?php the_field('akvopedia_point_four_h3'); ?>
      </h3>
      <img src="<?php the_field('akvopedia_point_four_img'); ?>"  class="centerED" /></a></li>
    <li class="pointFive floats-in">
      <a href="http://akvopedia.org/wiki/Decision_%26_Assessment_Tools"><h3> <span>05</span>
        <?php the_field('akvopedia_point_five_h3'); ?>
      </h3>
      <img src="<?php the_field('akvopedia_point_five_img'); ?>"  class="centerED" /></a></li>
    <li class="pointSix floats-in">
      <a href="http://akvopedia.org/wiki/Food_%26_Nutrition_Security_Portal"><h3> <span>06</span>
        <?php the_field('akvopedia_point_six_h3'); ?>
      </h3>
      <img src="<?php the_field('akvopedia_point_six_img'); ?>"  class="centerED" /></a></li>      
  </ul>
</section>
<section id="akvopediaProject" class="wrapper floats-in">
  <h1 class="">Project Links</h1>
  <p class="fullWidthParag centerED">
    <?php the_field('akvopedia_project_text'); ?>
  </p>
  <img src="<?php the_field('akvopedia_project_img'); ?>" /> </section>
<section id="akvopediaContribute">
  <h1 class="">Contribute</h1>
  <p class="fullWidthParag centerED">
    <?php the_field('akvopedia_cont_text'); ?>
  </p>
</section>

<!-- end content -->

<?php get_footer(); ?>
