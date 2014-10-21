<?php
/*
	Template Name: flowHelpPage
*/
?>
<?php get_header();?>
<!--Start of Akvo.org helpPage-->

<div id="content" class="floats-in flowHelpSupport">
  <h1 class="backLined flowHelp">Flow Help</h1>
  <?php if ( have_posts() ) while ( have_posts() ) : the_post();?>
  <section class="wrapper">
    <?php the_content();?>
  </section>
  <?php endwhile; // end of the loop.?>
  <hr class="delicate" />
  <section class="wrapper">
    <h2><?php the_field('manuals_title'); ?></h2>
    <?php the_field('manuals_text'); ?>

    <?php if( have_rows('flow_manuals') ): ?>
    <ul class="threeColumns vertMargin floats-in" id="manuals">
 
    <?php while( have_rows('flow_manuals') ): the_row(); ?>
 
        <li><a href="<?php the_sub_field('url'); ?>" style="background-image: url(<?php the_sub_field('icon'); ?>)"></a></li>
        
    <?php endwhile; ?>
 
    </ul>
    <?php endif; ?>
    <hr class="delicate" />
    <p>If you need further help contact us at support[at]akvoflow.org.</p>
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
<?php get_footer();?>
