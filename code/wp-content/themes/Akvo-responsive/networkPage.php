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
        <ul class="rsrData dashData">
          <li>
            <h4>Projects:</h4>
            <span id="number_of_projects"><span style="font-size: 0.2em;">Fetching data...</span></span> </li>
          <li>
            <h4>Number of updates:</h4>
            <span id="number_of_updates"><span style="font-size: 0.2em;">Fetching data...</span></span> </li>
          <li>
            <h4>Organisations Using RSR:</h4>
            <span id="number_of_organisations"><span style="font-size: 0.2em;">Fetching data...</span></span> </li>
          <li>
            <h4>Project Budgets:</h4>
            <span id="projects_budget_millions"><span style="font-size: 0.2em;">Fetching data...</span></span> </li>
        </ul>
        <a href="#" title="How is this data collected? Automatically from the Akvo RSR database via
the RSR API (https://github.com/akvo/akvo-rsr/wiki/Akvo-RSR-API)
How often is this data refreshed? Whenever the page is loaded" class="tooltips moreLink ">info</a> <a href="" class="moreLink darkBg  hidden">See more</a> </li>
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
            <h4>More Stats soon</h4>
          </li>
        </ul>
        <a href="#" title="How is this data collected? Manually, via a script run on the Google App
Engine
FLOW
instances
How often is this data refreshed? Monthly" class="tooltips moreLink">info</a> <a href="" class="moreLink darkBg  hidden">See more</a> </li>
      <li class="dashSingle" id="opendaidDash">
        <h2>Akvo Openaid</h2>
        <ul class="openAidData dashData">
          <li>
            <h4>Total activities:</h4>
            <span id="openaid_total_activities"><span style="font-size: 0.2em;">Fetching data...</span></span> </li>
          <li>
            <h4>Total organisations:</h4>
            <span id="openaid_total_organisations"><span style="font-size: 0.2em;">Fetching data...</span></span> </li>
          <li>
            <h4>Total commitments:</h4>
            <span id="openaid_total_commitments">
            <?php the_field('openaid_commit'); ?>
            <span class="unit">billion</span> </span> </li>
          <li>
            <h4>More Stats soon</h4>
          </li>
        </ul>
        <a href="#" title="How is this data collected? ‘Total commitments’ is collected manually, the
rest is automated via the use of the Openaid API
(https://github.com/openaid-IATI/)
How often is this data refreshed? ‘Total commitments’ is updated monthly,
the rest refreshes whenever the page is loaded" class="tooltips moreLink">info</a> <a href="" class="moreLink darkBg hidden">See more</a> </li>
      <li class="dashSingle" id="akvopediaDash">
        <h2>Akvopedia</h2>
        <ul class="wikiData dashData">
          <li>
            <h4>Articles:</h4>
            <span id="number_of_articles"><span style="font-size: 0.2em;">Fetching data...</span></span> </li>
          <li>
            <h4>Page Views:</h4>
            <span id="number_of_page_views"><span style="font-size: 0.2em;">Fetching data...</span></span> </li>
          <li>
            <h4>Visits:</h4>
            <span id="number_of_visits"><span style="font-size: 0.2em;">Fetching data...</span></span> </li>
          <li>
            <h4>More Stats soon</h4>
          </li>
        </ul>
        <a href="#" title="How is this data collected? ‘Articles’ is collected automatically using the
Mediawiki API (
http://www.mediawiki.org/wiki/API:Main_page
)
.
,
T
t
he rest is
collected
automatically
via the Piwik API
(
https://piwikapi.readthedocs.org/en/latest/
)
How often is this data refreshed? Whenever the page is loaded" class="tooltips moreLink">info</a> <a href="" class="moreLink darkBg hidden">See more</a> </li>
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
    <a href="/seeithappen/all-rsr-project-updates/" class="moreLink">Browse all latest project updates</a>
    <ul id="updatesWrapper" class="floats-in wrapper">
    </ul>
    <h4 id="loadingCaption" class="backLined"> Fetching updates...<br/>
      <img src="<?php bloginfo('template_directory'); ?>/images/loading.gif" title="" alt="" /> </h4>
    
    <!-- <ul class="threeColumns wrapper">
      <li id="update_0" class="rsrUpdate">
      <span class="updatedTitle">RSR Update</span>
        <div class="imgWrap"> <a> <img src=""/> </a> </div>
        <h2> <a></a> </h2>
        <div class="authorTime floats-in">
          <time datetime=""></time>
               <em class="userName"></em></div>
        <div class="orgAndPlace"> <span class="org"></span> <span class="place"></span> </div>
        <p></p>
        <a href="" class="moreLink">Read more</a> </li>
      <li id="update_1" class="rsrUpdate"> <span class="updatedTitle">RSR Update</span>
        <div class="imgWrap"> <a> <img src=""/> </a> </div>
        <h2> <a></a> </h2>
        <div class="authorTime floats-in">
          <time datetime=""></time>
                <em class="userName"></em></div>
        <div class="orgAndPlace"> <span class="org"></span> <span class="place"></span> </div>
        <p></p>
        <a href="" class="moreLink">Read more</a> </li>
      <li id="update_2" class="rsrUpdate"> <span class="updatedTitle">RSR Update</span>
        <div class="imgWrap"> <a> <img src=""/> </a> </div>
        <h2> <a></a> </h2>
        <div class="authorTime floats-in">
          <time datetime=""></time>
                <em class="userName"></em>></div>
        <div class="orgAndPlace"> <span class="org"></span> <span class="place"></span> </div>
        <p></p>
        <a href="" class="moreLink">Read more</a> </li>
    </ul>
    --> 
  </section>
  <script type="text/javascript">
    // populate the dashboard from various Akvo APIs
    // NOTE: extremely hacky/ugly, should be moved to server side ASAP!
    $(function() {
      var akvoDomain = 'http://rsr.akvo.org';
      var akvopedia_domain = 'http://akvopedia.org';
      var oipa_domain = 'http://staging.oipa.openaidsearch.org';
      var piwik_domain = 'http://analytics.akvo.org';
      var error_message = '<span style="font-size: 0.3em;">Data not available</span>';

      $.ajax({
        url: akvoDomain + '/api/v1/right_now_in_akvo/',
        dataType: "jsonp",
        jsonp: 'callback',
        jsonpCallback: 'callback',
        cache: true,
        success: function(data) {
          $("#number_of_projects").text(data.number_of_projects);
          $("#number_of_organisations").text(data.number_of_organisations);
          $("#projects_budget_millions").html("€" + data.projects_budget_millions + '<span class="unit">million</span>');
        },
        //after 10 seconds the error callback fires
        // See http://stackoverflow.com/questions/10093497/jquery-doesnt-fire-error-callback-with-cross-domain-script
        timeout: 10000,
        error: function() {
          $("#number_of_projects").html(error_message);
          $("#number_of_organisations").html(error_message);
          $("#projects_budget_millions").html(error_message);
        }
      });

      $.ajax({
        url: akvoDomain + '/api/v1/project_update/?limit=1&callback=callback_update_count',
        dataType: "jsonp",
        jsonp: 'callback_update_count',
        jsonpCallback: 'callback_update_count',
        cache: true,
        success: function(data) {
          $("#number_of_updates").text(data.meta.total_count);
        },
        timeout: 10000,
        error: function() {
          $("#number_of_updates").html(error_message);
        }
      });

      $.ajax({
        url: akvopedia_domain + '/wiki/api.php?action=query&meta=siteinfo&siprop=statistics&format=json',
        dataType: "jsonp",
        jsonp: 'callback',
        cache: true,
        success: function(data) {
          $("#number_of_articles").text(data.query.statistics.articles);
        },
        timeout: 10000,
        error: function() {
          $("#number_of_articles").html(error_message);
        }
      });

      $.ajax({
        url: piwik_domain + '/index.php?module=API&method=API.get&idSite=9&period=range&date=2013-04-01,today&format=json&token_auth=1d1b520b11bea9a3b525b99531ec171a&jsoncallback=callback',
        dataType: "jsonp",
        jsonp: 'callback',
        cache: true,
        success: function(data) {
          $("#number_of_page_views").html(Math.round((2792519 + data.nb_pageviews)/1000)/1000 + '<span class="unit">million</span>');
          $("#number_of_visits").text(data.nb_visits + 737347);
        },
        timeout: 30000,
        error: function(data) {
          $("#number_of_page_views").html(error_message);
          $("#number_of_visits").html(error_message);
        }
      });

      $.ajax({
        url: oipa_domain + '/api/v3/organisations/?format=jsonp&callback=callback&limit=1',
        dataType: "jsonp",
        jsonp: 'callback',
        cache: true,
        success: function(data) {
          $("#openaid_total_organisations").text(data.meta.total_count);
        },
        timeout: 20000,
        error: function(data) {
          $("#openaid_total_organisations").html(error_message);
        }
      });

      $.ajax({
        url: oipa_domain + '/api/v3/activities/?format=jsonp&callback=callback&limit=1',
        dataType: "jsonp",
        jsonp: 'callback',
        cache: true,
        success: function(data) {
          $("#openaid_total_activities").text(data.meta.total_count);
        },
        timeout: 20000,
        error: function(data) {
          $("#openaid_total_activities").html(error_message);
        }
      });

      /*
        NOTE the rest of the code is a(n almost exact) copy of the code in rsrUpdatesPage.php and
        should be consolidated into one .js file
       */
      var original = $("#updateTemplate");
      // how many updates to display in one go. should be a multiple of 3
      var updateBatchSize = 3;
      // how many updates we get from the API
      var limit = updateBatchSize * 2 + 4;
      // keep track of how many updates with images found in this batch so far
      var successCount = 0;
      // keep track of how many updates we're showing
      var updatesShown = 0;
      // keep track of how many updates we've looked at
      var offset = 0;

      var populateUpdates = function (data) {
        for (var i = 0; i < limit; i++) {
          if (data.objects[i].photo === '') {
            console.log('no photo, moving on');
            continue;
          } else {
            update = data.objects[i];
            console.log('pic! ' + i + ' ' + update.title);
            populateUpdate($("#update_" + (updatesShown + successCount)), update);
            successCount++;
            if (successCount >= updateBatchSize) {
              showUpdates();
              offset = offset + i + 1;
              updatesShown += successCount;
              successCount = 0;
              console.log("Batch done, updatesShown:" + updatesShown + " offset: " + offset)
              break;
            }
          }
        }
        $("#updatesWrapper").css('display', 'block');
        $("#loadMore").css('display', '');
        $("#loadingCaption").css('display', 'none');
      }

      var callAPI = function (path) {
        $("#loadMore").css('display', 'none');
        $("#loadingCaption").css('display', 'block');
        $.ajax({
          url: akvoDomain + path,
          dataType: "jsonp",
          jsonp: 'callback',
          cache: true,
          success: populateUpdates
        });
      }

      var populateUpdate = function (root, update) {
        root.find("h2 a").text(update.title);
    root.find("span.updatedTitle").text(update.project.title);
        root.find("a").prop('href', akvoDomain + update.absolute_url);
        root.find("div img").prop("src", akvoDomain + update.photo);
        root.find("time").text(update.time.split("T")[0]);
        root.find(".userName").text(" " + update.user.first_name + " " + update.user.last_name);
        root.find("p").text(update.text);
      };

      var cloneUpdateDOM = function (original, index) {
        console.log('Cloning ' + index);
        original
          .clone()
          .attr("id", "update_" + index)
          //.css("display", "block")
          .appendTo("#updatesWrapper");
      }

      var createUpdates = function () {
        $("#loadMore").css('display', 'none');
        for (var i = updatesShown; i < updatesShown + updateBatchSize; i++) {
          cloneUpdateDOM(original, i);
        }
      }

      var showUpdates = function () {
        for (var i = updatesShown; i < updatesShown + updateBatchSize; i++) {
          $("#update_" + (i)).css("display", "block");
        }
        $("#loadMore").css('display', '');
      }

      createUpdates();
      var path = '/api/v1/project_update/?depth=1&limit=' + limit;
      callAPI(path);

    });
  </script>
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
