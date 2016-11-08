<?php
/*
	Template Name: annualReports
*/
?>
<?php get_header(); ?>

<!--Start of Akvo.org Flow Product page-->

<div id="content" class="floats-in annualReportsPag wrapper">
  <h1 class="backLined"><?php the_title(); ?></h1>
  <!--nav class="anchorNav">
    <h5>menu</h5>
    <div class="mShownCollapse"><a></a></div>
    <ul>
    <?php while( have_rows('year') ): the_row(); ?>
      <li><a href="#annualreport<?php the_sub_field('year'); ?>">Annual report <?php the_sub_field('year'); ?></a></li>
    <?php endwhile; ?>
    </ul>
  </nav-->
    
    <?php while( have_rows('year') ): the_row(); ?>
  <hr class="delicate"/>
  <div class="aReport fullWidthParag" id="annualreport<?php the_sub_field('year'); ?>">
    <h2>Akvo <?php the_sub_field('year'); ?> Annual Report</h2>
    <a href="<?php the_sub_field('image_link'); ?>"> <img src="<?php the_sub_field('image'); ?>" /> </a>
    <?php while( has_sub_field('file') ): ?>
    <p><i>Download the <a href="<?php the_sub_field('url'); ?>"><?php the_sub_field('title'); ?></a></i> (PDF <?php the_sub_field('file_size'); ?> Mbyte)</p>
    <?php endwhile; ?>
  </div>
    <?php endwhile; ?>
</div>
<!-- end content -->

<?php get_footer(); ?>
