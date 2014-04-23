<?php
/*
	Template Name: HelpPage
*/
?>
<?php get_header(); ?>
<!--Start of Akvo.org helpPage-->

<div id="content" class="floats-in helpSupport">
  <h1 class="backLined">Help and Support</h1>
  <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
  <div class="centerED wrapper">
    <?php the_content(); ?>
  </div>
  <?php endwhile; // end of the loop. ?>
  <hr class="delicate" />
  <section>
    <nav>
      <ul class="wrapper threeColumns floats-in">
        <li class="bgDeco"><a href="rsr-help" class="rsrHelp">RSR Help</a><a href="rsr-help" class="moreHelp">Get Help</a></li>
        <li class="bgDeco"><a href="#" class="flowHelp">Flow Help</a><a href="#" class="moreHelp">Get Help</a></li>
        <li class="bgDeco"><a href="#" class="akvopediaHelp">Akvopedia Help</a><a href="#" class="moreHelp">Get Help</a></li>
      </ul>
    </nav>
  </section>
</div>

<!-- end content -->
<?php get_footer(); ?>
