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
        <div class="tooltipContainer">
          <a href="#" class="tooltipTrigger">info</a>
          <div class="tooltips">
            <p><em style='display:block;color:rgb(114, 205, 255);'>How is this data collected?</em> Automatically from the Akvo RSR database via the <a href='https://github.com/akvo/akvo-rsr/wili/Akvo-RSR-API'>RSR API</a></p>
            <p><em style='display:block;color:rgb(114, 205, 255);'>How often is this data refreshed?</em> Every four hours.</p>
          </div>
        </div>
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
                <h4>Organisations using FLOW:</h4>
                <span>
                  <?php the_field('organisations_using_flow'); ?>
                </span>
              </li>
            </ul>
            <a href="#"
              title="<p><em style='display:block;color:rgb(114, 205, 255);'>How is this data collected?</em> Manually, via a script run on the Google App Enging FLOW instances.</p>
              <p><em style='display:block;color:rgb(114, 205, 255);'>How often is this data refreshed?</em> Monthly.</p>"
              class="tooltips moreLink">info</a> <a href="" class="moreLink darkBg  hidden">See more</a>
            </li>
            
            <li class="dashSingle" id="opendaidDash">
              <h2>Akvo Openaid</h2>
              <ul class="openAidData dashData">
                <li>
                  <h4>Total activities:</h4>
                  <span id="">
                    <?php do_shortcode('[jsondata_feed slug="openaid-activities" format="json" limit="1"]'); ?>
                  </span> </li>
                  <li>
                    <h4>Total organisations:</h4>
                    <span id="">
                      <?php do_shortcode('[jsondata_feed slug="openaid-orgs" format="json" limit="1"]'); ?>
                    </span> </li>
                    <li>
                      <h4>Total commitments:</h4>
                      <span id="">
                        <?php the_field('openaid_commit'); ?>
                        <span class="unit">billion</span> </span> </li>
                        <li>
                          <h4>More Stats soon</h4>
                        </li>
                      </ul>
                      <a href="#"
                        title="<p><em style='display:block;color:rgb(114, 205, 255);'>How is this data collected?</em> 'Total commitments' is collected manually,
                          the other values are collected via the <a href='https://github.com/openaid-IATI/'>OpenAid API</a></p>
                          <p><em style='display:block;color:rgb(114, 205, 255);'>How often is this data refreshed?</em> 'Total commitments' is updated monthly,
                          the rest is refreshed every four hours.</p>"
                          class="tooltips moreLink">info</a> <a href="" class="moreLink darkBg hidden">See more</a>
                        </li>
                        
                        <li class="dashSingle" id="akvopediaDash">
                          <h2>Akvopedia</h2>
                          <?php do_shortcode('[jsondata_feed slug="akvopedia-analytics" module="API" method="API.get" idSite="9" period="range" date="2013-04-01,today" format="json" token_auth="1d1b520b11bea9a3b525b99531ec171a"]'); ?>
                          <a href="#"
                            title="<p><em style='display:block;color:rgb(114, 205, 255);'>How is this data collected?</em> 'Articles' is collected automatically using the Mediawiki API.
                            The rest is collected automatically from the Piwik API</p>
                            <p><em style='display:block;color:rgb(114, 205, 255);'>How often is this data refreshed?</em> Every four hours.</p>"
                            class="tooltips moreLink">info</a> <a href="" class="moreLink darkBg hidden">See more</a>
                          </li>
                        </ul>
                      </section>
                      <section id="rsrProjectUpdates">
                        <h2>RSR: Latest project updates</h2>
                        <nav class="anchorNav2 wrapper">
                          <ul class>
                            <li><a href="/seeithappen/all-rsr-project-updates/">Browse all latest project updates</a> </li>
                            <li  class="rss"><a href="http://rsr.akvo.org/rss/all-updates" rel="alternate" type="application/rss+xml">RSS link for all RSR updates</a></li>
                          </ul>
                        </nav>
                        <ul id="updatesWrapperJS" class="floats-in wrapper">
                          <?php do_shortcode('[jsondata_feed slug="rsr-updates" limit="3" photo__gte="a"]'); ?>
                        </ul>
                      </section>
                    </div>
                    <!-- end content -->
                    <?php get_footer(); ?>