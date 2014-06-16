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
  <li id="updateTemplate" class="rsrUpdate" style="display: none;"><span>RSR Update</span>
    <h2><a></a></h2>
    <ul class="floats-in">
      <li class="upImag">
        <div class="imgWrap"><a><img src=""/></a></div>
      </li>
      <li class="upInfo">
        <div class="authorTime floats-in">
          <time datetime="" class=""></time>
          <em class="">by</em><span class="userName"></span></div>
        <div class="orgAndPlace"><span class="org">Organisation</span><span class="place">Town, Country</span></div>
      </li>
      <li class="upTxt">
        <p></p>
      </li>
      <li class="upMore"><a href="" class=""><span>Read more ></span></a></li>
    </ul>
  </li>
  <section class="wrapper">
    <ul id="updates" class="floats-in">
      <?php
        $shortcode = '[jsondata_feed slug="rsr-many-updates" limit="' . the_field('starting_number_of_updates') . '" offset="0" photo__gte="a"]';
        do_shortcode($shortcode);
      ?>
    </ul>

    <h4 id="loadingCaption" class="backLined" style="display: none;">
      Fetching updates...<br/>
      <img src="<?php bloginfo('template_directory'); ?>/images/loading.gif" title="" alt="" />
    </h4>
    <a id="loadMore" class="btn btn-primary loadMore"">Fetch more updates</a>

    <script type="text/javascript">
      $(function() {
        var server_name = '<?=$_SERVER["SERVER_NAME"];?>';
        var offset = <?php the_field('starting_number_of_updates'); ?>;
        var limit = <?php the_field('number_of_updates_to_add'); ?>;
        selectors = {};

        var populateUpdates = function(data) {
          $("#loadMore").css('display', 'table');
          $("#loadingCaption").css('display', 'none');
          $('#updates').append(data);
        }

        var fetchFailed = function(result) {
          alert(result.status + ' - ' + result.statusText);
          $("#loadMore").css('display', 'table');
          $("#loadingCaption").css('display', 'none');
        }

        var callAPI = function(path) {
          $("#loadMore").css('display', 'none');
          $("#loadingCaption").css('display', 'block');
          $.ajax({
            url: server_name + path,
            dataType: "html",
            success: populateUpdates,
            error: fetchFailed
          });
        }

        var moreUpdates = function() {
          path = "/?page_id=16940&limit=" + limit + "&offset=" + offset;
          callAPI(path);
          offset = offset + limit;
          console.log('offset; ' + offset);
        }

        $('#loadMore').click(function() {
          moreUpdates();
        });

        console.log('offset; ' + offset);
      });
    </script>

  </section>

</div>

<!-- end content -->
<?php get_footer(); ?>
