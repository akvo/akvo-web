<?php
	/*
		Template Name: New Staff
	*/
get_header(); ?>

<div id="content" role="main" class="floats-in teamPage withSubMenu">
  <h1 class="backLined">Meet our team</h1>
  <p>Akvo stands out because of its people – the quality of the team is outstanding. We take great pride in our people, who are our most valued asset.
    Wanting to work with us? Check out our <a href="#">Jobs page</a>.</p>
  <nav class="anchorNav">
    <h5>menu</h5>
    <div class="mShownCollapse"><a></a></div>
    <ul>
      <li><a href="#partnershipGroup" class="pStaff">partnership</a></li>
      <li><a href="#communicationGroup" class="cStaff">communication &amp; PR</a></li>
      <li><a href="#engineeringGroup" class="eStaff">engineering &amp; design</a></li>
    </ul>
  </nav>
  <section class="wrapper">
    <?php query_posts(array('post_type'=>'new_staffs')); ?>
    <?php $mypost = array( 'post_type' => 'new_staffs' );
	$loop = new WP_Query( $mypost ); ?>
    <!-- Cycle through all posts -->
    <ul class="staff floats-in">
      <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
      <li id="post-<?php the_ID(); ?>" <?php post_class(); ?>> 
        <!-- Display featured image in right-aligned floating div -->
        <div class="imgWrapper">
          <?php the_post_thumbnail('thumbnail'); ?>
        </div>
        <!-- Display Title and Name -->
        <div class="staffName"> <a href="#"><?php echo esc_html( get_post_meta( get_the_ID(), 'staff_name', true ) ); ?></a> </div>
        <p class="staffTitle"><?php echo esc_html( get_post_meta( get_the_ID(), 'staff_title', true ) ); ?></p>
        <?php the_terms( $post->ID, 'new_staffs_team' ,  ' ' ); ?>
        <div class="entry-content hidden"><?php the_content(); ?></div>
        <small>Click for more details.</small>
      </li>
      <?php endwhile; ?>
    </ul>
  </section>
</div>
<?php wp_reset_query(); ?>
<?php get_footer(); ?>
