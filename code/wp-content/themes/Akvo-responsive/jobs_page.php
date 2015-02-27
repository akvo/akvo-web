<?php
/*
Template Name: jobs-page
*/
?>
<?php get_header(); ?>
<!-- #content -->
<!-- #main -->
<div id="content" class="floats-in">
  <!-- /#main -->

    <header>
      <h1 class="backLined">
        <?php the_title(); ?>
      </h1>
    </header>

  <section class="figure">
    <img src="<?php the_field('jobs_img_url'); ?>" class="alignnone size-full" />
  </section>
  <hr class="delicate" />
  <div class="wrapper">
    <p class="fullWidthParag"><?php the_field('jobs_page_intro'); ?>
    Read more about working for Akvo in our 
    <a href="<?php the_field('jobs_handbook_url'); ?>" title= "Akvo Staff Handbook">
    staff handbook</a>.
    </p>
  </div>
  <hr class="delicate" />
  <div class="wrapper">
    <h1 class="backLined">Open positions</h1>
    <ul class="jobList">
      <?php while( have_rows('jobs') ): the_row(); ?>
      <li class="fullWidthParag">
        <h2 class="uncenterED" name="<?php the_sub_field('job_anchor'); ?>"><?php the_sub_field('job_title'); ?></h2>
        <h4>Location: <?php the_sub_field('job_location'); ?></h4>
        <h5>Posted on: <time datetime="DD/MM/YYYY"><?php the_sub_field('job_date'); ?></h5>
        <p><?php the_sub_field('job_Descr'); ?></p>
      </li>
      <hr class="delicate" />
      <?php endwhile; ?>
    </ul>
  </div>
</div>
<!-- /#content -->
<br style="clear:both;">
<?php get_footer(); ?>