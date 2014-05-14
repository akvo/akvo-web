<?php
/*
	Template Name: akvoNetwork
*/
?>
<?php get_header(); ?>

<!--Start of Akvo.org Network page-->

<div id="content" class="floats-in networkPage">
<h1 class="backLined">See it happen</h1>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
  <div class="fullWidthParag wrapper">
    <?php the_content(); ?>
  </div>
<?php endwhile; // end of the loop. ?>

<section id="akvoDashboard">
  <h2>Data collected with Akvo tools</h2>
  <ul class="wrapper">
    <li class="dashSingle" id="rsrDash">
      <h2>Akvo RSR</h2>

      <?php do_shortcode('[jsondata_feed slug="right-now-in-akvo"]'); ?>

      <a href="#"
         title="<p>How is this data collected? Automatically from the Akvo RSR database via the RSR API
            (https://github.com/akvo/akvo-rsr/wili/Akvo-RSR-API)</p>
            <p>How often is this data refreshed? Every four hours.</p>"
         class="tooltips moreLink ">info</a>
      <a href="" class="moreLink darkBg  hidden">See more</a>
    </li>
    <li class="dashSingle" id="flowDash">
      <h2>Akvo Flow</h2>
      <ul class="flowData dashData">
        <li>
          <h4>Surveys Created:</h4>
            <span>
            <?php the_field('flow_surveys'); ?>
            </span></li>
        <li>
          <h4>Data Points:</h4>
            <span>
            <?php the_field('flow_data_points'); ?>
            </span></li>
        <li>
          <h4>Devices:</h4>
            <span>
            <?php the_field('flow_devices'); ?>
            </span></li>
        <li><!--<h4>People Helped:</h4><span>2,013,237</span>-->
          <h4>Organisations using FLOW</h4>
            <span>
            <?php the_field('organisations_using_flow'); ?>
            </span> </li>
      </ul>
      <a href="#"
         title="<p>How is this data collected? Manually, via a script run on the Google App Enging FLOW instances.</p>
            <p>How often is this data refreshed? Monthly.</p>"
         class="tooltips moreLink">info</a>
      <a href="" class="moreLink darkBg  hidden">See more</a>
    </li>
    <li class="dashSingle" id="opendaidDash">
      <h2>Akvo Openaid</h2>
      <ul class="openAidData dashData">
        <li>
          <h4>Total activities:</h4>
          <span id=""><?php do_shortcode('[jsondata_feed slug="openaid-activities" format="json" limit="1"]'); ?></span>
        </li>
        <li>
          <h4>Total organisations:</h4>
          <span id=""><?php do_shortcode('[jsondata_feed slug="openaid-orgs" format="json" limit="1"]'); ?></span>
        </li>
        <li>
          <h4>Total commitments:</h4>
            <span id="">
            <?php the_field('openaid_commit'); ?>
              <span class="unit">billion</span> </span>
        </li>
        <li>
          <h4>More Stats soon</h4>
        </li>
      </ul>
      <a href="#"
         title="<p>How is this data collected? 'Total commitments' is collected manually,
            the other values are collected via the OpenAid API (https://github.com/openaid-IATI/)</p>
            <p>How often is this data refreshed? 'Total commitments' is updated monthly,
            the rest is refreshed every four hours.</p>"
         class="tooltips moreLink">info</a>
      <a href="" class="moreLink darkBg hidden">See more</a>
    </li>
    <li class="dashSingle" id="akvopediaDash">
      <h2>Akvopedia</h2>
      <?php do_shortcode('[jsondata_feed slug="akvopedia-analytics"]'); ?>
      <a href="#"
         title="<p>How is this data collected? 'Articles' is collected automatically using the Mediawiki API ()
            The rest is collected automatically from the Piwik API ()</p>
            <p>How often is this data refreshed? Every four hours.</p>"
         class="tooltips moreLink">info</a> <a href="" class="moreLink darkBg hidden">See more</a>
    </li>
  </ul>
</section>

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

<section id="rsrProjectUpdates">
  <h2>RSR: Latest project updates</h2>
  <nav class="anchorNav2 wrapper">
    <ul class>
      <li><a href="/seeithappen/all-rsr-project-updates/">Browse all latest project updates</a> </li>
      <li  class="rss"><a href="http://rsr.akvo.org/rss/all-updates" rel="alternate" type="application/rss+xml">RSS Link for All RSR Updates</a></li>
    </ul>
  </nav>
  <ul id="updatesWrapperJS" class="floats-in wrapper">
    <?php do_shortcode('[jsondata_feed slug="rsr-updates" format="json"]'); ?>
  </ul>
</section>

<section id="rsrNetworkMap">
  <h2>Akvo Map</h2>
  <div class="wrapper">
    <p class="fullWidthParag centerED">Due to performance issues we have temporarily disabled the live Akvo RSR project map. It will be enabled again soon.</p>
    <img src="<?php bloginfo('template_directory'); ?>/images/rsr_projectMap.png" class="centerED"/> </div>
  <!--<iframe src="http://www.akvo.org/rsr/widget/project-map/organisation/969/?bgcolor=000000&textcolor=undefined&height=518&width=968&state=dynamic" height="518" width="968" frameborder="0" allowTransparency="true" seamless scrolling="no"> </iframe>-->
</section>
</div>
<!-- end content -->
<?php get_footer(); ?>
