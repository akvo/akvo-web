<?php
/*
	Template Name: rsrMultipleUpdates
*/
?>
<?php get_header(); ?>

<!--Start of Akvo.org Network page-->

<div id="content" class="floats-in networkPage">
  <h1 class="backLined">All latest project updates</h1>
    <nav class="anchorNav2 wrapper"><ul><li  class="rss"><a href="http://rsr.akvo.org/rss/all-updates/">RSS Link for All RSR Updates ></a></li></ul></nav>
  <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
  <div class="fullWidthParag wrapper"><?php the_content(); ?></div>

  <?php endwhile; // end of the loop. ?>
  <li id="updateTemplate" class="rsrUpdate" style="display: none;"> <span>RSR Update</span>
    <h2><a></a></h2>
    <ul class="floats-in">
      <li class="upImag">
        <div class="imgWrap"><a><img src=""/></a></div>
      </li>
      <li class="upInfo">
        <div class="authorTime floats-in">
          <time datetime="" class=""></time>
          <em class="">by</em><span class="userName"> </span></div>
        <div class="orgAndPlace"><span class="org">Organisation</span><span class="place">Town, Country</span></div>
      </li>
      <li class="upTxt">
        <p></p>
      </li>
      <li class="upMore"><a href="" class=""><span>Read more ></span></a></li>
    </ul>
  </li>
  <section class="wrapper">
    <ul class="floats-in">
      <?php do_shortcode('[jsondata_feed slug="rsr-many-updates" limit="60" photo__gte="a"]'); ?>
    </ul>
  </section>

</div>

<!-- end content -->
<?php get_footer(); ?>
