<?php
/*
	Template Name: akvoHome_2015
*/
?>
<?php get_header(); ?>
<!--Start of Akvo.org homepage-->

<div id="content" class="floats-in homepage-2015">
	<section class="topIcons wrapper">
		<div class="topIcon capture"><img src="<?php the_field('topIcon_capture_img'); ?>"></div>
		<div class="topIcon understand"><img src="<?php the_field('topIcon_understand_img'); ?>"></div>
		<div class="topIcon share"><img src="<?php the_field('topIcon_share_img'); ?>"></div>
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
				<?php if (get_field('hero_box_slide_type')=='video'): ?>
				<div class="videoSlide <?php the_field('hero_box_slide_type') ?>">
					<div class="videoOverlay" style="background-image: url('<?php the_field('hero_box_image'); ?>')"></div>
					<video preload="auto" muted="muted" loop="loop" autoplay="autoplay">
						<source src="<?php the_field('hero_box_video_mp4'); ?>" type="video/mp4">                  
						<source src="<?php the_field('hero_box_video_ogv'); ?>" type="video/ogg"> 
					</video>
				</div>
				<?php endif ?>
				<div id="image" class="<?php the_field('hero_box_slide_type') ?>" style="background-image:url(<?php the_field('hero_box_image'); ?>);"></div>
				<div>
					<div id="actionHeroInfo" class="<?php the_field('hero_box_text_position'); ?>">
						<p><?php the_field('product_featured'); ?></p>
						<hgroup>
							<a href="<?php the_field('hero_box_link'); ?>">
								<h1><?php the_field('hero_box_title'); ?></h1>
								<h2><?php the_field('hero_box_subtitle'); ?></h2>
							</a>
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

	<!-- In the next two sections, "item" elements must have no whitespace or newlines
	between theme, else they will not wrap properly when widths add up to 100% -->
	<section class="featuredItems wrapper">
		<div class="row row1">
			<div class="row1 item longItem <?php the_field('fi_row1_long_class'); ?>">
				<a href="<?php the_field('fi_row1_long_link'); ?>">
					<img src="<?php the_field('fi_row1_long_img'); ?>">
				</a>
			</div><div class="row1 item shortItem <?php the_field('fi_row1_short_class'); ?>">
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
			</div><div class="row2 item longItem <?php the_field('fi_row2_long_class'); ?>">
				<a href="<?php the_field('fi_row2_long_link'); ?>">
					<img src="<?php the_field('fi_row2_long_img'); ?>">
				</a>
			</div>  
		</div>
	</section>

	<section class="smallItems wrapper">
		<?php $item_post = get_field('si_item_1');?>  
		<div class="item1 latestBlog">
			<a href="<?php _e(get_permalink($item_post->ID)); ?>">
				<?php $feat_image = wp_get_attachment_url( get_post_thumbnail_id($item_post->ID) );?>
				<?php if($feat_image):?><div style="background-image: url('<?php echo $feat_image; ?>')"></div><?php endif;?>
				<h3><?php the_field('si_item_title_1');?></h3>
				<span class="text"><?php _e($item_post->post_title); ?></span>          
			</a>
		</div><div class="item2 latestRSR">
			<a href="" class="update_url">
				<div class="update_img_url"></div>
				<h3>Latest RSR update</h3>
				<span class="text update_title"></span>
			</a>
		</div><div class="item3 <?php the_field('si_item3_class'); ?>">
			<a href="<?php the_field('si_item3_link'); ?>">
				<div style="background-image: url('<?php the_field('si_item3_img'); ?>')"></div>
				<h3><?php the_field('si_item3_title'); ?></h3>
				<span class="text"><?php the_field('si_item3_text'); ?></span>
			</a>
		</div><div class="item4 <?php the_field('si_item4_class'); ?>">
			<a href="<?php the_field('si_item4_link'); ?>">
				<div style="background-image: url('<?php the_field('si_item4_img'); ?>')"></div>
				<h3><?php the_field('si_item4_title'); ?></h3>
				<span class="text"><?php the_field('si_item4_text'); ?></span>
			</a>
		</div>    
	</section>
</div>
<!-- end content -->

<script type="text/javascript"> 
	$(function() {
  		var akvo_domain = 'https://rsr.akvo.org';
  		$.ajax({
    		url: '<?php echo admin_url('admin-ajax.php'); ?>' + '?action=akvo_latest_rsr',
    		dataType: "json",
    		//jsonp: 'callback',
    		//jsonpCallback: 'callback',
    		cache: true,
    		success: function(data) {
    			//console.log(data);
					
      			for (i=0; i<5; i++) {
        			if (data.objects[i].photo === '') {
          				continue;
		        	} 
		        	else {
          				var title, src, absolute_url;
          				src = data.objects[i].photo;
          				title = data.objects[i].title;
          				absolute_url = data.objects[i].absolute_url;
          				$('.update_url').attr('href', akvo_domain + absolute_url);
          				$('.update_img_url').css('background-image', 'url("' + akvo_domain + src + '")')
          				$('.update_title').text(title);
          				break;
        			}
      			}
    		}
  		});
	});   
$(document).ready(function() {
    $('.bxslider').bxSlider();
    respondToWidth();

    function respondToWidth() {
      var vid = $('video');
      if ($(document).width() >= 768) {
        vid.attr('preload', 'auto');
        vid[0].load();
        vid[0].play();
      } else {
        vid.attr('preload', 'none');
      }      
    }

    // Hide the video overlay when the video is ready to play
    $('video').on('canplay', function() {
      $('.videoOverlay').hide();
    });

   $('video').on('error', function() {
      $('.videoOverlay').show();
    });

    $(window).resize( function() {
      if ($(document).width() >= 768) {
        $('video')[0].play();
      }
    })
});
</script>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/jquery.bxslider.css">
<?php get_footer(); ?>