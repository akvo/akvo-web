<?php
/*
	Template Name: AboutUs
*/
?>
<?php get_header(); ?>

<!--Start of Akvo.org Flow Product page-->

<div id="content" class="floats-in aboutUsPag">
  <h1 class="backLined">About us</h1>
  <div class="wrapper" style="background:rgb(0,0,0); padding:1em 0 1em 0; margin:1em auto;">
    <iframe width="800" height="450" frameborder="0" allowfullscreen="" mozallowfullscreen="" webkitallowfullscreen="" src="http://player.vimeo.com/video/56641129"></iframe>
    <p class="darkCenter"> Thomas Bjelkeman-Pettersson - Co-founder and co-director</p>
  </div>
  <div class="splitImgMid floats-in wrapper"> <a href="http://www.flickr.com/photos/charmermrk/sets/72157607214638092/with/2363864968/"> <img src="<?php bloginfo('template_directory'); ?>/images/postcards-400.jpg"> </a>
    <div class="paragraphesLeft">

    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    <div class=""><?php the_content(); ?></div>
    <?php endwhile; // end of the loop. ?>

    </div>
  </div>
  <div class="wrapper" style="background:rgb(0,0,0); padding:1em 0 1em 0; margin:1em auto;">
    <iframe width="800" height="450" frameborder="0" allowfullscreen="" mozallowfullscreen="" webkitallowfullscreen="" src="http://player.vimeo.com/video/56645801?title=0&byline=0&portrait=0"></iframe>
    <p class="darkCenter"> Peter Van Der Linde - Co-founder And Co-director </p>
  </div>
  <a href="http://akvo.org/the-akvo-platform-why-what-and-how/" class="seeMore moreLink">Learn more about how Akvo.org works</a> </div>
<!-- end content -->

<?php get_footer(); ?>
