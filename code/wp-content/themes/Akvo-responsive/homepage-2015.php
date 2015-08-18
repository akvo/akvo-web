<?php
/*
	Template Name: akvoHome_2015
*/
?>
<?php get_header(); ?>
<!--Start of Akvo.org homepage-->

<div id="content" class="floats-in homepage-2015">
  <section class="topIcons wrapper">
    <div class="topIcon capture">
      <a href="topIcon_capture_link">
        <img src="<?php the_field('topIcon_capture_img'); ?>">
      </a>
    </div>
    <div class="topIcon understand">
      <a href="topIcon_understand_link">
        <img src="<?php the_field('topIcon_understand_img'); ?>">
      </a>
    </div>
    <div class="topIcon share">
      <a href="topIcon_share_link">
        <img src="<?php the_field('topIcon_share_img'); ?>">
      </a>
    </div>
    <div class="readMoreContainer">
      <a href="<?php the_field('topIcon_readMoreLink'); ?>">
        <?php the_field('topIcon_readMoreText'); ?>
      </a>
    </div>
  </section>

  <section id="actionHeroBox" class="wrapper">
    <?php query_posts('post_type=new_heroBox&meta_key=hero_box_active&meta_value=1&posts_per_page=4'); ?>
    <?php if (have_posts()) : ?>
      <ul class="bxslider">
        <?php while (have_posts()) : the_post(); ?>
          <li class="<?php the_field('hero_box_color'); ?>">
            <div class="borderTop"></div>
            <div id="image" style="background-image:url(<?php the_field('hero_box_image'); ?>);"></div>
            <div>
            <div id="actionHeroInfo" class="<?php the_field('hero_box_text_position'); ?>">
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
              <a class="actionHeroBtn" href="<?php the_field('hero_box_link'); ?>">Read More</a>
            </div>
            <div class="borderBottom"></div>
            </div>
          </li>
        <?php endwhile; ?>
      </ul>
    <?php endif; wp_reset_query(); ?>
  </section>

  <section class="featuredItems wrapper">
    <div class="row row1">
      <div class="row1 item longItem <?php the_field('fi_row1_long_class'); ?>">
        <a href="<?php the_field('fi_row1_long_link'); ?>">
          <img src="<?php the_field('fi_row1_long_img'); ?>">
        </a>
      </div>
      <div class="row1 item shortItem <?php the_field('fi_row1_short_class'); ?>">
        <a href="<?php the_field('fi_row1_short_link'); ?>">
          <img src="<?php the_field('fi_row1_short_img'); ?>">
        </a>
      </div>   
    </div> 
    <div class="row row2">
      <div class="row2 item shortItem <?php the_field('fi_row2_short_class'); ?>">
        <a href="<?php the_field('fi_row2_short_link'); ?>">
          <img src="<?php the_field('fi_row2_short_img'); ?>">
        </a>
      </div>
      <div class="row2 item longItem <?php the_field('fi_row2_long_class'); ?>">
        <a href="<?php the_field('fi_row2_long_link'); ?>">
          <img src="<?php the_field('fi_row2_long_img'); ?>">
        </a>
      </div>  
    </div>
  </section>

  <section class="smallItems wrapper">
    <div class="item1 <?php the_field('si_item1_class'); ?>">
      <a href="<?php the_field('si_item1_link'); ?>">
        <img src="<?php the_field('si_item1_img'); ?>">
        <h3>
          <?php the_field('si_item1_title'); ?>
        </h3>
        <span class="text">
          <?php the_field('si_item1_text'); ?>
        </span>
      </a>
    </div>
    <div class="item2 <?php the_field('si_item2_class'); ?>">
      <a href="<?php the_field('si_item2_link'); ?>">
        <img src="<?php the_field('si_item2_img'); ?>">
        <h3>
          <?php the_field('si_item2_title'); ?>
        </h3>
        <span class="text">
          <?php the_field('si_item2_text'); ?>
        </span>
      </a>
    </div>
    <div class="item3 <?php the_field('si_item3_class'); ?>">
      <a href="<?php the_field('si_item3_link'); ?>">
        <img src="<?php the_field('si_item3_img'); ?>">
        <h3>
          <?php the_field('si_item3_title'); ?>
        </h3>
        <span class="text">
          <?php the_field('si_item3_text'); ?>
        </span>
      </a>
    </div>
    <div class="item4 <?php the_field('si_item4_class'); ?>">
      <a href="<?php the_field('si_item4_link'); ?>">
        <img src="<?php the_field('si_item4_img'); ?>">
        <h3>
          <?php the_field('si_item4_title'); ?>
        </h3>
        <span class="text">
          <?php the_field('si_item4_text'); ?>
        </span>
      </a>
    </div>            
  </section>
</div>
<!-- end content -->

<script type="text/javascript">    
$(document).ready(function() {
    $('.bxslider').bxSlider();
});
</script>

<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/jquery.bxslider.css">

<?php get_footer(); ?>
    
