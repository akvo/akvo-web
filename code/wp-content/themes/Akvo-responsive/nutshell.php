<?php
/*
	Template Name: nutshell
*/
?>
<?php get_header();?>
<!--Start of Akvo in a nutshell page -->
<div id="content" class="floats-in nutshell">
  <section class="wrapper heading">
    <h1><?php the_field('nut_title'); ?></h1>
  </section>

  <section class="headerImage">
    <div class="wrapper">
      <img src="<?php the_field('nut_header_img'); ?>">
    </div>
  </section> 

  <section class="introText">
    <div class="introTextWrapper">
      <h2><?php the_field('nut_intro_title'); ?></h2>
      <?php the_field('nut_intro_text'); ?>
    </div>
  </section>

  <section class="wrapper nutPoints">
    <div class="nutPoint nutPoint1">
      <img src="<?php the_field('nut_point_img_1'); ?>">
      <h3><?php the_field('nut_point_title_1'); ?></h3>
      <div class="pointText">
        <?php the_field('nut_point_text_1'); ?>
      </div>
    </div>
    <div class="nutPoint nutPoint2">
      <img src="<?php the_field('nut_point_img_2'); ?>">
      <h3><?php the_field('nut_point_title_2'); ?></h3>
      <div class="pointText">
        <?php the_field('nut_point_text_2'); ?>
      </div>
    </div>
    <div class="nutPoint nutPoint3">
      <img src="<?php the_field('nut_point_img_3'); ?>">
      <h3><?php the_field('nut_point_title_3'); ?></h3>
      <div class="pointText">
        <?php the_field('nut_point_text_3'); ?>
      </div>
    </div>           
  </section>  

  <section class="openSource">  
    <img src="<?php the_field('nut_os_img'); ?>">
    <h2><?php the_field('nut_os_title'); ?></h2>
    <div class="osText">
      <?php the_field('nut_os_text'); ?>
    </div>

    <div class="cta-links">
      <a class="button" href="<?php the_field('nut_os_cta_url'); ?>"><?php the_field('nut_os_cta_text'); ?></a>
      <a class="button" href="<?php the_field('nut_os_cta_url2'); ?>"><?php the_field('nut_os_cta_text2'); ?></a>    
    </div>
  </section>
</div>
<div class="clearfix"></div>
<!-- end content --> 
<?php get_footer();?>
