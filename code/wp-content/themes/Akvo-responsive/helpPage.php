<?php
/*
	Template Name: HelpPage
*/
?>
<?php get_header(); ?>
<!--Start of Akvo.org helpPage-->

<div id="content" class="floats-in helpSupport">
  <h1 class="backLined">Help & support</h1>
  <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
  <div class="centerED wrapper">
    <?php the_content(); ?>
  </div>
  <?php endwhile; // end of the loop. ?>
  <hr class="delicate" /> 
  <section>
    <nav>
      <ul class="wrapper threeColumns floats-in">
        <li class="bgDeco"><a href="http://rsrsupport.akvo.org/" class="rsrHelp">RSR Help</a><p class="centerED fullWidthParag">Do you need some help with Akvo RSR? We can throw you a life line.</p><a href="http://rsrsupport.akvo.org/" class="moreHelp rsrH">Get Help</a></li>
        <li class="bgDeco"><a href="http://flowsupport.akvo.org/" class="flowHelp">Flow Help</a><p class="centerED fullWidthParag">Are you feeling a bit lost in Akvo FLOW? We can show you the way.</p><a href="http://flowsupport.akvo.org/" class="moreHelp flowH">Get Help</a></li>
        <li class="bgDeco"><a href="akvopedia-help" class="akvopediaHelp">Akvopedia Help</a><p class="centerED fullWidthParag">Do you need help with Akvopedia? Have a look in our first aid kit.</p><a href="akvopedia-help" class="moreHelp pediaH">Get Help</a></li>
      </ul>
    </nav>	
  </section>
</div>

<!-- end content -->
<?php get_footer(); ?>
