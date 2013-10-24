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
  <div class="borderTop"></div>
  <img src="<?php the_field('hero_img'); ?>" class="hero-image" />
  <div class="wrapper">
  <div id="actionHeroInfo">
    <p>
      <?php the_field('product_featured'); ?>
    </p>
    <hgroup>
      <h1>
        <?php the_field('box_title'); ?>
      </h1>
      <h2>
        <?php the_field('box_subtitle'); ?>
      </h2>
    </hgroup>
    <a class="actionHeroBtn moreLink" href="<?php the_field('story_link'); ?>">Read More</a> </div>
  <div class="borderBottom"></div>
  </div>
</section>
<?php include('fourProductWindow.php'); ?>
<section id="moreStuffHome" class="floats-in"> 
  <!--    <h2 class="backLined">Looking for more?</h2>-->
  <div class="fourColumns wrapper">
    <div class="blogIcon">
      <h3><a href="http://akvo.org/blog/">Latest blog</a></h3>
      <hr class="delicateSmall">
      <div>
        <?php
            $args = array( 'numberposts' => 1 );
            $lastposts = get_posts( $args );
            foreach($lastposts as $post) : setup_postdata($post); ?><figure>
  <div> <a href="<?php the_permalink(); ?>"> <?php if ( has_post_thumbnail() ) {
			the_post_thumbnail();
			}  ?></a></div>
           <figcaption> <a href="<?php the_permalink(); ?>">
          <?php the_title(); ?>  &raquo;</a></figcaption>
          </figure>         

        <?php endforeach; ?>
      </div>
      <!--<a href="#" title="" class="seeMore moreLink">See all blog posts</a>--> </div>
    <div class="networkIcon">
      <h3><a href="http://akvo.org/seeithappen/all-rsr-project-updates/">Latest RSR updates</a></h3>
      <hr class="delicateSmall">
      <div>
        <figure> <div><a href="" id="updateUrl"><img id="update_image" src="" alt="" title=""/></a></div>
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
      <!--  <a href="#" title="" class="seeMore moreLink">See all network activity</a>-->
    </div>
    <div class="videoIcon">
      <h3><a href="http://www.youtube.com/user/Akvofoundation">Akvo.tv</a></h3>
      <hr class="delicateSmall">
      <div>
        <figure><div> <a href="http://akvo.tv"> 
			<img src="<?php bloginfo('template_directory'); ?>/images/akvo_tv.jpg" alt="akvo.tv on youtube" title="akvo.tv on youtube"/></a></div>
          <figcaption><a href="http://akvo.tv">Go to akvo.tv  &raquo;</a></figcaption>
        </figure>
      </div></div>
<!--      <a href="#" title="" class="seeMore moreLink">Read more</a> 
-->    <div class="eventIcon">
      <h3><a href="http://us2.campaign-archive2.com/?u=a70e9bedf0f2a0a5db70eb18b&id=b1e3d6160d&e=469389aed8">Latest newsletter</a></h3>
      <hr class="delicateSmall">
      <div>
        <figure><div> <a href="http://us2.campaign-archive2.com/?u=a70e9bedf0f2a0a5db70eb18b&id=b1e3d6160d&e=469389aed8"><img src="<?php bloginfo('template_directory'); ?>/images/newsletter.jpg" alt="" /></a></div>
          <figcaption><a href="http://us2.campaign-archive2.com/?u=a70e9bedf0f2a0a5db70eb18b&id=b1e3d6160d&e=469389aed8">See the newsletter  &raquo;</a></figcaption>
        </figure>
      </div></div>
<!--      <a href="#" title="" class="seeMore moreLink">Read more</a> 
-->  </div>
</section>
<!-- end content -->

<?php get_footer(); ?>
