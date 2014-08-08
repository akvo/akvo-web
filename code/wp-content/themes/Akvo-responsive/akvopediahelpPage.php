<?php
/*
	Template Name: akvopediaHelpPage
*/
?>
<?php get_header(); ?>
<!--Start of Akvo.org helpPage-->

<div id="content" class="floats-in akvopediaHelpSupport">
<h1 class="backLined akvopediaHelp">Akvopedia Help</h1>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<section class="wrapper">
  <?php the_content(); ?>
</section>
<?php endwhile; // end of the loop. ?>
<hr class="delicate" />
<!--<section class="wrapper">
  <h2>Manuals</h2>
  <p>For a list of manuals and other documents in several languages:</p>
  <a href="#">Akvopedia support documentation</a>
  <hr class="delicate" />
</section>
--></div>

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
