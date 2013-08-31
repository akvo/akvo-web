<?php
/*
	Template Name: rsrMultipleUpdates
*/
?>
<?php get_header(); ?>

<!--Start of Akvo.org Network page-->

<div id="content" class="floats-in networkPage">
  <h1 class="backLined">All latest project updates</h1>
  <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
  <div class="fullWidthParag wrapper"><?php the_content(); ?></div>

  <?php endwhile; // end of the loop. ?>


  <h4 id="loadingCaption" class="backLined">
    Loading updates...<br/>
    <img src="<?php bloginfo('template_directory'); ?>/images/loading.gif" title="" alt="" />
  </h4>

  <li id="updateTemplate" class="rsrUpdate" style="display: none;">
    <span>RSR Update</span>
    <div class="imgWrap">
      <a><img src=""/></a>
    </div>
    <h2><a></a></h2>
    <div class="authorTime floats-in">
      <time datetime=""></time>
      <em>by</em> <span class="user_name"></span>
    </div>
    <div class="orgAndPlace">
      <span class="org"></span>
      <span class="place"></span>
    </div>
    <p></p>
    <a href="" class="moreLink">Read more</a>
  </li>

  <section class="wrapper">
    <ul id="updatesWrapper" class="threeColumns floats-in" style="display: none;">
    </ul>

    <a id="loadMore"href="#" class="btn btn-primary loadMore" style="display: none;">Load more</a>
  </section>

  <script type="text/javascript">
    $(function() {
      var akvoDomain = 'http://www.akvo.org';
      var original = $("#updateTemplate");
      // how many updates to display in one go. should be a multiple of 3
      var updateBatchSize = 6;
      // keep track of how many updates with images found in this batch so far
      var successCount = 0;
      // keep track of how many updates we're showing
      var updatesShown = 0;
      // keep track of how many updates we've looked at
      var offset = 0;

      var populateUpdates = function(data) {
        for (i=0; i<updateBatchSize*2; i++) {
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

      var callAPI = function(path) {
        $("#loadMore").css('display', 'none');
        $.ajax({
          url: akvoDomain + path,
          dataType: "jsonp",
          jsonp: 'callback',
          cache: true,
          success: populateUpdates
        });
        $("#loadMore").css('display', '');
      }
      // http://staging.oipa.openaidsearch.org/api/v2/organisations/?format=jsonp&callback=callback
      var populateUpdate = function (root, update) {
        root.find("h2 a").text(update.title);
        root.find("a").prop('href', akvoDomain + update.absolute_url);
        root.find("div img").prop("src", akvoDomain + update.photo);
        root.find("time").text(update.time.split("T")[0]);
        root.find("em").text("by " + update.user.first_name + " " + update.user.last_name);
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
        for (i=offset; i<offset+updateBatchSize; i++) {
          cloneUpdateDOM(original, i);
        }
      }

      var showUpdates = function() {
        for (i=offset; i<offset+updateBatchSize; i++) {
          $("#update_" + (i)).css("display", "block");
        }
        $("#loadMore").css('display', '');
      }

      $('#loadMore').click(function() {
        createUpdates(offset);
        var path = '/api/v1/project_update/?limit=' +
          updateBatchSize * 2 + '&depth=1&callback=callback_even_more_updates&offset=' + offset;
        callAPI(path);
      });

      createUpdates();
      var path = '/api/v1/project_update/?depth=1&limit=' + updateBatchSize * 2;
      callAPI(path);


    });
  </script>

</div>

<!-- end content -->
<?php get_footer(); ?>
