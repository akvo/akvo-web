<?php
	/*
		Template Name: product-iati
	*/
?>
<?php get_header(); ?>

<!--Start of Akvo.org akvo sites Product Page-->

<div id="content" class="floats-in productPage withSubMenu akvoIatiPag">
  <hgroup>
    <h1 class="akvoIatiLogo"> Akvo / IATI </h1>
    <h2><?php the_field('subtitle'); ?></h2>
  </hgroup>
  <section class="figure marginVertical"> 
    <div style="background-image:url(<?php the_field('hero_image'); ?>); height:500px;" title="akvosites image" class="heroFormat"></div> 
  </section>
  
  <section class="akvoIatiDescr" style="background:rgb(248,248,248); padding:1em 0;">
    <div class="wrapper">
      <p class="fullWidthParag centerED"><?php the_field('text'); ?></p>
    </div> 
  </section>

  <div class="twoColumns wrapper descrTwoCol floats-in">
      <div>
        <img src="<?php the_field('descrImgOne'); ?>" title="akvoiati image"/>
        <p class="">
          <?php the_field('text2'); ?>
        </p>
      </div>        
      <div>
        <img src="<?php the_field('descrImgTwo'); ?>" title="akvoiati image"/>
        <p class="">
          <?php the_field('text3'); ?>
        </p>
      </div>
  </div>  

  <section class="figure marginVertical"> 
    <div style="background-color:#BFCED4; background-image:url(<?php the_field('descr_image'); ?>); height:400px;" title="akvoiati description image" class="heroFormatContain"></div> 
  </section>

  <h2 class="marginVertical"><span class="wrapper centerED"><?php the_field('bigDescr'); ?></span></h2>      
  <div class="wrapper">
    <p class="fullWidthParag centerED"><?php the_field('bigDescrTxt'); ?></p>
  </div>


  <section class="figure marginVertical"> 
      <div style="background-color:#BFCED4; background-image:url(<?php the_field('descr_image_two'); ?>); height:400px;" title="akvoiati description image XML" class="heroFormatContain"></div>
  </section>
  
  <h2 class="marginVertical"><span class="wrapper centerED"><?php the_field('bigDescr2'); ?></span></h2>      
  <div class="wrapper">
    <p class="fullWidthParag centerED"><?php the_field('bigDescrTxt2'); ?></p>
  </div>  

  <h2 class="marginVertical"><span class="wrapper centerED"><?php the_field('bigDescr3'); ?></span></h2>      
  <div class="wrapper">
    <p class="fullWidthParag centerED"><?php the_field('bigDescrTxt3'); ?></p>
  </div>

  <section class="whoUseIt marginVertical" style="background:rgb(248,248,248);">
    <h2><?php the_field('whouse_title'); ?></h2>
    <p  class="fullWidthParag centerED"><?php the_field('whouse_text'); ?></p>
    <ul class="wrapper twoColumns floats-in">
    <?php while( have_rows('feature_images') ): the_row(); ?>
      <li><a href="<?php the_sub_field('image_link'); ?>"><img src="<?php the_sub_field('image'); ?>" title="images"/></a></li>
    <?php endwhile; ?>
    </ul>
  </section>
  </div>

</div>
<!-- end content -->

<?php get_footer(); ?>
