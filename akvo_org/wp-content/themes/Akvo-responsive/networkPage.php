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
        <a href="" class="moreLink darkBg  hidden">See more</a> </li>
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
        <a href="" class="moreLink darkBg  hidden">See more</a> </li>
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
        <a href="" class="moreLink darkBg hidden">See more</a> </li>
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
        <a href="" class="moreLink darkBg hidden">See more</a> </li>
    </ul>
  </section>
  <section id="rsrProjectUpdates">
    <h2>RSR: Latest Project Updates</h2>
    <a href="http://akvo.org/seeithappen/all-rsr-project-updates/" class="moreLink">Browse all latest project updates</a>
    <ul class="threeColumns wrapper">
      <li id="update_0" class="rsrUpdate"> <span>RSR Update</span>
        <div class="imgWrap"> <a> <img src=""/> </a> </div>
        <h2> <a></a> </h2>
        <div class="authorTime floats-in">
          <time datetime=""></time>
          <em>by</em> <span class="user_name"></span></div>
        <div class="orgAndPlace"> <span class="org"></span> <span class="place"></span> </div>
        <p></p>
        <a href="" class="moreLink">Read more</a> </li>
      <li id="update_1" class="rsrUpdate"> <span>RSR Update</span>
        <div class="imgWrap"> <a> <img src=""/> </a> </div>
        <h2> <a></a> </h2>
        <div class="authorTime floats-in">
          <time datetime=""></time>
          <em>by</em> <span class="user_name"></span></div>
        <div class="orgAndPlace"> <span class="org"></span> <span class="place"></span> </div>
        <p></p>
        <a href="" class="moreLink">Read more</a> </li>
      <li id="update_2" class="rsrUpdate"> <span>RSR Update</span>
        <div class="imgWrap"> <a> <img src=""/> </a> </div>
        <h2> <a></a> </h2>
        <div class="authorTime floats-in">
          <time datetime=""></time>
          <em>by</em> <span class="user_name"></span></div>
        <div class="orgAndPlace"> <span class="org"></span> <span class="place"></span> </div>
        <p></p>
        <a href="" class="moreLink">Read more</a> </li>
    </ul>
  </section>
  <script type="text/javascript">
    // populate the dashboard from various Akvo APIs
    // NOTE: extremely hacky/ugly, should be moved to server side ASAP!
    $(function() {
      var akvo_domain = 'http://www.akvo.org';
      var akvopedia_domain = 'http://akvopedia.org';
      var oipa_domain = 'http://staging.oipa.openaidsearch.org';
      var piwik_domain = 'http://analytics.akvo.org';
      var error_message = '<span style="font-size: 0.3em;">Data not available</span>';
      $.ajax({
        url: akvo_domain + '/api/v1/right_now_in_akvo/',
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
        url: akvo_domain + '/api/v1/project_update/?limit=1&callback=callback_update_count',
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
        url: akvo_domain + '/api/v1/project_update/?limit=10&depth=1&callback=callback_updates',
        dataType: "jsonp",
        jsonp: 'callback_updates',
        jsonpCallback: 'callback_updates',
        cache: true,
        success: function(data) {
          var success_count = 0;
          // loop over the updates, find the first three with an image
          for (i=0; i<10; i++) {
            if (data.objects[i].photo === '') {
              console.log('no photo, moving on');
              continue;
            } else {
              console.log('pic!');
              update = data.objects[i];
              populate_update($("#update_" + success_count), update)
              success_count++;
              if (success_count > 2) {
                break;
              }
            }
          }
        }
      });
/*      $.ajax({
        url: akvo_domain + '/api/v1/project_update/?limit=30&depth=1&callback=callback_more_updates',
        dataType: "jsonp",
        jsonp: 'callback_more_updates',
        jsonpCallback: 'callback_more_updates',
        cache: true,
        success: function(data) {
          var original = $("#more_update_0")
          for (i=1; i<15; i++) {
            clone_update_skel(original, i);
          }
          var success_count = 0;
          // loop over the updates, find the first three with an image
          for (i=0; i<30; i++) {
            if (data.objects[i].photo === '') {
              console.log('no photo, moving on');
              continue;
            } else {
              console.log('pic!');
              update = data.objects[i];
              populate_update($("#more_update_" + success_count), update)
              success_count++;
              if (success_count > 14) {
                break;
              }
            }
          }
        }
      }); */
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
          $("#number_of_visits").text(data.nb_visits);
        },
        timeout: 30000,
        error: function(data) {
          $("#number_of_page_views").html(error_message);
          $("#number_of_visits").html(error_message);
        }
      });
      $.ajax({
        url: oipa_domain + '/api/v2/organisations/?format=jsonp&callback=callback&limit=1',
        dataType: "jsonp",
        jsonp: 'callback',
        cache: true,
        success: function(data) {
          $("#openaid_total_organisations").text(data.meta.total_count);
        },
        timeout: 10000,
        error: function(data) {
          $("#openaid_total_organisations").html(error_message);
        }
      });
      $.ajax({
        url: oipa_domain + '/api/v2/activities/?format=jsonp&callback=callback&limit=1',
        dataType: "jsonp",
        jsonp: 'callback',
        cache: true,
        success: function(data) {
          $("#openaid_total_activities").text(data.meta.total_count);
        },
        timeout: 10000,
        error: function(data) {
          $("#openaid_total_activities").html(error_message);
        }
      });

      // http://staging.oipa.openaidsearch.org/api/v2/organisations/?format=jsonp&callback=callback
      var populate_update = function (root, update) {
        root.find("h2 a").text(update.title);
        root.find("a").prop('href', akvo_domain + update.absolute_url);
        root.find("div img").prop("src", akvo_domain + update.photo);
        root.find("time").text(update.time);
        root.find("em").text("by " + update.user.first_name + " " + update.user.last_name);
        root.find("p").text(update.text);
      };

      var clone_update_skel = function(original, index) {
        console.log('Cloning ' + index);
        var clone = original.clone();
        console.log(clone.innerHTML);
        clone.find("li").prop("id", "more_update_" + index)
        //console.log(clone.find("li"));
        //console.log(clone.find("li").prop("id"));
        clone.appendTo( "#manyUpdatesList" );
      }

    });
  </script>
  <section id="rsrNetworkMap">
    <h2>Akvo Map</h2>
    <div class="wrapper">
      <p class="fullWidthParag centerED">Due to performance issues we have temporarily disabled the live Akvo RSR project map for the time being. It will be enabled again soon.</p>
      <img src="<?php bloginfo('template_directory'); ?>/images/rsr_projectMap.png" class="centerED"/> </div>
    <!--<iframe src="http://www.akvo.org/rsr/widget/project-map/organisation/969/?bgcolor=000000&textcolor=undefined&height=518&width=968&state=dynamic" height="518" width="968" frameborder="0" allowTransparency="true" seamless scrolling="no"> </iframe>--> 
  </section>
</div>
<!-- end content -->

<?php get_footer(); ?>
