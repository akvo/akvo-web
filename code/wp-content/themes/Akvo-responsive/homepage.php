<?php
/*
	Template Name: akvoHome
*/
?>
<?php get_header(); ?>
<!--Start of Akvo.org homepage-->

<div id="content" class="floats-in">
<h1 class="akvoDescr wrapper">
  <?php the_field('akvo-tagline'); ?>
</h1>

<section id="actionHeroBox" class="">
  <?php query_posts('post_type=new_heroBox&meta_key=hero_box_active&meta_value=1&posts_per_page=1'); ?>
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <div class="borderTop"></div>
  <img src="<?php the_field('hero_box_image'); ?>" class="hero-image" />
  <div>
  <div id="actionHeroInfo">
    <p>
      <?php the_field('product_featured'); ?>
    </p>
    <hgroup>
      <h1>
        <?php the_field('hero_box_title'); ?>
      </h1>
      <h2>
        <?php the_field('hero_box_subtitle'); ?>
      </h2>
    </hgroup>
    <a class="actionHeroBtn" href="<?php the_field('hero_box_link'); ?>">Read More</a> </div>
  <div class="borderBottom"></div>
  </div>
  <?php endwhile; endif; wp_reset_query(); ?>
</section>

<section id="productWindow" class="floats-in">
  <div class="fourColumns wrapper">
    <div id="rsrBucket"> <a href="/products/rsr/" class="tagLine"> <img src="<?php the_field('rsr_bucket_text'); ?>" title="rsrImg" /> </a> <a href="/products/rsr/" class="moreLink">find out more</a>
      <hgroup> <a href="/products/rsr/">
        <h1>Akvo RSR</h1>
        </a>
        <h2>
          <?php the_field('rsr_bucket_sub'); ?>
        </h2>
      </hgroup>
    </div>
    <div id="flowBucket"> <a href="/products/akvoflow/" class="tagLine"><img src="<?php the_field('flow_bucket_text'); ?>" title="flowImg" /> </a> <a href="/products/akvoflow/" class="moreLink">find out more</a>
      <hgroup> <a href="/products/akvoflow/">
        <h1>Akvo Flow</h1>
        </a>
        <h2>
          <?php the_field('flow_bucket_sub'); ?>
        </h2>
      </hgroup>
    </div>
    <div id="openaidBucket"> <a href="/products/akvoopenaid/" class="tagLine"> <img src="<?php the_field('openaid_bucket_text'); ?>" title="openaidImg" /> </a> <a href="/products/akvoopenaid/" class="moreLink">find out more</a>
      <hgroup> <a href="/products/akvoopenaid/">
        <h1>Akvo OpenAid</h1>
        </a>
        <h2>
          <?php the_field('openaid_bucket_sub'); ?>
        </h2>
      </hgroup>
    </div>
    <div id="akvopedia"> <a href="/products/akvopedia/" class="tagLine"> <img src="<?php the_field('akvopedia_bucket_text'); ?>" title="akvopediaImg" /> </a> <a href="/products/akvopedia/" class="moreLink">find out more</a>
      <hgroup> <a href="/products/akvopedia/">
        <h1>Akvopedia</h1>
        </a>
        <h2>
          <?php the_field('akvopedia_bucket_sub'); ?>
        </h2>
      </hgroup>
    </div>
  </div>
</section>

<section id="moreStuffHome" class="floats-in">
  <!--    <h2 class="backLined">Looking for more?</h2>-->
  <div class="fourColumns wrapper">
    <div class="blogIcon">
      <h3><a href="/blog/">Latest blog</a></h3>
<!--      <hr class="delicateSmall"> -->      
<div>
        <?php
            $args = array( 'numberposts' => 1 );
            $lastposts = get_posts( $args );
            foreach($lastposts as $post) : setup_postdata($post); ?>
        <figure>
          <div> <a href="<?php the_permalink(); ?>">
            <?php if ( has_post_thumbnail() ) {
              			the_post_thumbnail();
              			} ?>
            </a></div>
          <figcaption> <a href="<?php the_permalink(); ?>">
            <?php the_title(); ?>
            &raquo;</a></figcaption>
        </figure>
        <?php endforeach; ?>
      </div>
    </div>
    <div class="networkIcon">
      <h3><a href="/seeithappen/all-rsr-project-updates/">Latest RSR updates</a></h3>
<!--      <hr class="delicateSmall"> -->      
      <div>
        <figure>
          <div><a href="" id="updateUrl"><img id="update_image" src="" alt="" title=""/></a></div>
          <figcaption><a id="update_title" href=""></a></figcaption>
        </figure>
      </div>
      <script type="text/javascript">
        $(function() {
          var akvo_domain = 'http://rsr.akvo.org';
          $.ajax({
            url: akvo_domain + '/api/v1/project_update/?limit=5',
            dataType: "jsonp",
            jsonp: 'callback',
            jsonpCallback: 'callback',
            cache: true,
            success: function(data) {
              for (i=0; i<5; i++) {
                if (data.objects[i].photo === '') {
                  console.log('no photo, moving on');
                  continue;
                } else {
                  console.log('pic!');
                  var title, src, absolute_url;
                  src = data.objects[i].photo;
                  title = data.objects[i].title;
                  absolute_url = data.objects[i].absolute_url;
                  $("#update_image").prop("src", akvo_domain + src);
                  $("#update_title, #updateUrl").prop("href", akvo_domain + absolute_url);
                  $("#update_title").text(title);
                  break;
                }
              }
            }
          });
        });
      </script>
    </div>
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    <div class="videoIcon">
      <h3><a href="http://www.youtube.com/user/Akvofoundation">Akvo.tv</a></h3>
<!--      <hr class="delicateSmall"> -->      
      <div>
        <figure>
          <div> <a href="http://akvo.tv"> <img src="<?php the_field('akvo_tv'); ?>" alt="akvo.tv on youtube" title="akvo.tv on youtube"/></a></div>
          <figcaption><a href="http://akvo.tv">Go to akvo.tv  &raquo;</a></figcaption>
        </figure>
      </div>
    </div>
    <div class="eventIcon">
      <h3><a href="<?php the_field('letter_link'); ?>">Latest newsletter</a></h3>
<!--      <hr class="delicateSmall"> -->      
      <a href="<?php the_field('letter_link'); ?>">
      <div>
        <figure>
          <div> <a href="<?php the_field('letter_link'); ?>"><img src="<?php the_field('letter_img'); ?>" alt="" /></a></div>
          <figcaption><a href="<?php the_field('letter_link'); ?>">See the newsletter  &raquo;</a></figcaption>
        </figure>
      </div>
      </a>
      </div>

 <?php endwhile; // end of the loop. ?>

</section></div></div>
<!-- end content -->

<?php get_footer(); ?>
