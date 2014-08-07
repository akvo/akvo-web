<?php
/*
	Template Name: rsrHelpPage
*/
?>
<?php get_header(); ?>
<!--Start of Akvo.org helpPage-->

<div id="content" class="floats-in rsrHelpSupport">
  <h1 class="backLined rsrHelp">RSR Help</h1>
  <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
  <section class="wrapper">
    <h2><?php the_field('faq_title'); ?></h2>
    <?php the_content(); ?>
  </section>
  <?php endwhile; // end of the loop. ?>
  <hr class="delicate" />
  <section class="wrapper">
    <h2><?php the_field('downloads_title'); ?></h2>
    <h4><?php the_field('desktop_title'); ?></h4>
    <?php the_field('rsr_desktop_text'); ?>

    <?php if( have_rows('rsr_manuals') ): ?>
    <ul class="threeColumns vertMargin floats-in" id="manuals">
 
    <?php while( have_rows('rsr_manuals') ): the_row(); ?>
 
        <li><a href="<?php the_sub_field('pdf_file'); ?>" style="background-image: url(<?php the_sub_field('icon'); ?>)"><span><?php the_sub_field('title'); ?></span></a></li>
        
    <?php endwhile; ?>
 
    </ul>
    <?php endif; ?>
      
    <h4><?php the_field('android_title'); ?></h4>
      
    
    <?php if( have_rows('android_items') ): ?>
    <ul class="threeColumns vertMargin floats-in" id="android">
 
    <?php while( have_rows('android_items') ): the_row(); ?>
 
        <li><a href="<?php the_sub_field('url'); ?>" style="background-image: url(<?php the_sub_field('icon'); ?>)"><span><?php the_sub_field('title'); ?></span></a></li>
        
    <?php endwhile; ?>
 
    </ul>
    <?php endif; ?>
      
    <hr class="delicate" />
    <?php the_field('footer_text'); ?>
  </section>
</div>

<!-- end content --> 
<script type="text/javascript">
$("document").ready(function () {

        $('ul.faqMenuList').hide();
        $('.faqMenu .faqMenuHead').toggle(function(){
                if($(this).next().is("ul")) {
                    $('.faqMenuHead').removeClass("openED");
                    $('.faqMenuList').hide('fast');
                $(this).toggleClass("openED").next().slideToggle();}
                
        } , function() {
                $(this).removeClass("openED").next().slideToggle();});
});
</script>
<?php get_footer(); ?>
