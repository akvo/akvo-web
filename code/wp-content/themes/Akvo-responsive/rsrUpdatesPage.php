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
    <ul id="updatesWrapperJS" class="floats-in">
      <?php do_shortcode('[jsondata_feed slug="rsr-many-updates" limit="60"]'); ?>
    </ul>

    <h4 id="loadingCaption" class="backLined">
      Fetching updates...<br/>
      <img src="<?php bloginfo('template_directory'); ?>/images/loading.gif" title="" alt="" />
    </h4>
    <a id="loadMore" class="btn btn-primary loadMore" style="display: none;">Fetch more updates</a>
  </section>

  <script type="text/javascript">
    $(function() {
      var akvoDomain = 'http://rsr.akvo.org';
      var original = $("#updateTemplate");
      // how many updates to display in one go. should be a multiple of 3
      var updateBatchSize = 12;
      // keep track of how many updates with images found in this batch so far
      var successCount = 0;
      // keep track of how many updates we're showing
      var updatesShown = 0;
      // keep track of how many updates we've looked at
      var offset = 0;

      var populateUpdates = function(data) {
        for (var i=0; i<updateBatchSize*2; i++) {
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
              console.log('i: ' + i);
              offset = offset + i + 1;
              console.log('offset: ' + offset);
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

      var callAPI = function(path) {
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
        root.find("> span").text(update.project.title);
        root.find("a").prop('href', akvoDomain + update.absolute_url);
        root.find("div img").prop("src", akvoDomain + update.photo);
        root.find("time").text(update.time.split("T")[0]);
        root.find(".userName").text("by" + " " + update.user.first_name + " " + update.user.last_name);
        root.find("p").text(update.text);
      };

      var cloneUpdateDOM = function(original, index) {
        console.log('Cloning ' + index);
        original
          .clone()
          .attr("id", "update_" + index)
          //.css("display", "block")
          .appendTo( "#updatesWrapper" );
      }

      var createUpdates = function() {
        $("#loadMore").css('display', 'none');
        for (var i=updatesShown; i<updatesShown+updateBatchSize; i++) {
          cloneUpdateDOM(original, i);
        }
      }

      var showUpdates = function() {
        for (var i=updatesShown; i<updatesShown+updateBatchSize; i++) {
          $("#update_" + (i)).css("display", "block");
        }
        $("#loadMore").css('display', '');
      }

      $('#loadMore').click(function() {
        createUpdates();
        var path = '/api/v1/project_update/?limit=' +
          updateBatchSize * 2 + '&depth=1&callback=callback_even_more_updates&offset=' + offset;
        callAPI(path);
      });

      createUpdates();
      var path = '/api/v1/project_update/?depth=1&limit=' + updateBatchSize * 2;
      callAPI(path);
      console.log('offset; ' + offset);

    });
  </script>

</div>

<!-- end content -->
<?php get_footer(); ?>
